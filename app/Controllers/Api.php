<?php 

namespace App\Controllers;

class Api extends BaseController {
	private $token;
	private $db;

	public function __construct() {
		$this->db = \Config\Database::connect();

		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding, Authorization");
		header("Content-Type: application/json; charset=UTF-8");

		$this->token = 'EAACva1Mk73MBAPCKAh12445IAxF01sWkiFYAwcViL6MXEiV';

		// check token
		$token = null;
		$headers = apache_request_headers();
		if(isset($headers['Authorization'])){
			$token = $headers['Authorization'];
			$token = explode(' ', $token)[1];
		}

		if($this->token != $token) {
			echo json_encode(array('status' => false, 'msg' => 'Invalid Token'));
			die;
		}
    }
	
	public function index() { }

	// register
	public function register() {
	    $status = false;
		$data = array();
		$msg = '';
		
		// collect call paramters
		$call = json_decode(file_get_contents("php://input"));
		$fullname = $call->fullname;
		$email = $call->email;
		$password = $call->password;
		$phone = $call->phone;
		
		if($fullname && $email && $password && $phone) {
			// check if email already exists
			if($this->Crud->check('email', $email, 'user') > 0 || $this->Crud->check('phone', $phone, 'user') > 0) {
				$msg = 'Email and/or Phone Taken! Please choose another.';
			} else {
				$ins['fullname'] = $fullname;
				$ins['email'] = $email;
				$ins['password'] = md5($password);
				$ins['phone'] = $phone;
				$ins['reg_date'] = date(fdate);
				$user_id = $this->Crud->create('user', $ins);
				if($user_id > 0) {
					$status = true;
					$msg = 'Successful!';
					$data['id'] = $user_id;
				} else {
					$msg = 'Oops! Try later';
				}
			}
		} else {
			$msg = 'Missing field.';
		}
		
		echo json_encode(array('status'=>$status, 'msg'=>$msg, 'data'=>$data));
		die;
	}
	
	// login
	public function login() {
	    $status = false;
		$data = array();
		$msg = '';
		
		// collect call paramters
		$call = json_decode(file_get_contents("php://input"));
		$email = $call->email;
		$password = md5($call->password);
		
		if($email && $password) {
		    $query = $this->Crud->read2('email', $email, 'password', $password, 'user');
		    if(empty($query)) {
		        $msg = 'Invalid Authentication!';
		    } else {
				$status = true;
				$msg = 'Login Successfully!';

		        foreach($query as $q) {
					$data['id'] = $q->id;
					$data['fullname'] = $q->fullname;
					$data['email'] = $q->email;
					$data['phone'] = $q->phone;
					$data['image'] = site_url($this->Crud->image($q->img_id, 'big'));
					$data['reg_date'] = date('M d, Y h:i A', strtotime($q->reg_date));
				}
		    }
		}
		
		echo json_encode(array('status'=>$status, 'msg'=>$msg, 'data'=>$data));
		die;
	}

	// token
	public function token($type='get') {
	    $status = false;
		$msg = '';
		$total = 0;
		$used = 0;
		$balance = 0;
		$bal = 0;
		$data = array();
		
		// get 
		if($type == 'get') {
		    $call = json_decode(file_get_contents("php://input"));
		    $user_id = $call->user_id;
		    
		    if(!empty($user_id)) {
		        $query = $this->Crud->read_single('user_id', $user_id, 'token');
		        if(!empty($query)) {
		            $status = true;
		            $msg = 'Successful';
		            foreach($query as $q) {
		                $item = array();
		                
		                if($q->used) $used += (float)$q->amount;
						$total += (float)$q->amount;
		                
		                $item['id'] = $q->id;
		                $item['token'] = $q->token;
						$item['pin'] = $q->pin;
		                $item['remark'] = $q->remark;
		                $item['amount'] = (float)$q->amount;
						$item['used'] = $q->used;
		                $item['used_date'] = date('M d, Y h:s A', strtotime($q->used_date));
						$item['date'] = date('M d, Y h:s A', strtotime($q->reg_date));
		                
		                $data[] = $item;
		            }
		            
		            $balance = $total - $used;
		            
		            $total = $total;
		            $used = $used;
					$balance = $balance;
		        }
		    }
		    
		}
		
		// generate
		if($type == 'generate') {
		    $call = json_decode(file_get_contents("php://input"));
		    $user_id = $call->user_id;
		    $amount = $call->amount;
			$pin = $call->pin;
		    
		    if(!empty($user_id) && !empty($amount)) {
				// check if vault is enough
				$vault = $this->vaultStats($user_id);
				if($amount > $vault->balance) {
					$msg = 'Insufficient Vault Balance! Please top up your Vault';
				} else {
					$rands = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$code = substr(str_shuffle($rands), 0, 8);

					$v_ins['user_id'] = $user_id;
					$v_ins['amount'] = $this->Crud->to_number($amount);
					$v_ins['token'] = $code;
					$v_ins['pin'] = $pin;
					$v_ins['reg_date'] = date(fdate);
					
					$w_id = $this->Crud->create('token', $v_ins);
					if($w_id > 0) {
						$status = true;
						$msg = 'VToken Generated Successfully!';
						$data['id'] = $w_id;

						$fullname = $this->Crud->read_field('id', $user_id, 'user', 'fullname');
						$email = $this->Crud->read_field('id', $user_id, 'user', 'email');

						// add notification
						$u_content = 'You generated a vault with N'.number_format($amount);
						$this->notify(0, $user_id, $u_content, 'vault', $w_id);
						if($email) {
							$u_body = 'Dear '.$fullname.',<br/><br/>Your vault is generated with N'.number_format($amount).'.<br/><br/>Thank you.';
							$this->send_email($email, 'Vault Generated', $u_body);
						}
					} else {
						$msg = 'Failed! - Please Contact Support.';
					}
				}
		    }
		}
		
		echo json_encode(array('status'=>$status, 'msg'=>$msg, 'total'=>$total, 'used'=>$used, 'balance'=>$balance, 'data'=>$data));
		die;
	}

	// vault
	public function vault($type='get') {
	    $status = false;
		$msg = '';
		$total = 0;
		$used = 0;
		$balance = 0;
		$data = array();
		
		// get 
		if($type == 'get') {
		    $call = json_decode(file_get_contents("php://input"));
		    $user_id = $call->user_id;
		    
		    if(!empty($user_id)) {
				$vault = $this->vaultStats($user_id);
				$balance = $vault->balance;

		        $query = $this->Crud->read_single('user_id', $user_id, 'vault');
		        if(!empty($query)) {
		            $status = true;
		            $msg = 'Successful';
		            foreach($query as $q) {
		                $item = array();

						$total += (float)$q->amount;
		                
		                $item['id'] = $q->id;
		                $item['amount'] = (float)$q->amount;
		                $item['remark'] = $q->remark;
						$item['date'] = date('M d, Y h:s A', strtotime($q->reg_date));
		                
		                $data[] = $item;
		            }
		        }

				$used = $total - $balance;
		    }
		    
		}

		// check
		if($type == 'check') {
		    $call = json_decode(file_get_contents("php://input"));
		    $user_id = $call->user_id;
		    $token = $call->token;
		    
		    if(!empty($user_id) && !empty($token)) {
		        $check = $this->Crud->check2('user_id', $user_id, 'mtoken', $token, 'vault');
				if($check > 0) $status = true;
		    }
		    
		}
		
		echo json_encode(array('status'=>$status, 'msg'=>$msg, 'total'=>$total, 'used'=>$used, 'balance'=>$balance, 'data'=>$data));
		die;
	}

	//// others //////
	private function vaultStats($user_id) {
		$total_vault = 0;
		$total_token = 0;
		$balance = 0;

		$tvault = $this->Crud->read_single('user_id', $user_id, 'vault');
		if(!empty($tvault)) {
			foreach($tvault as $tv) {
				$total_vault += (float)$tv->amount;
			}
		}

		$ttoken = $this->Crud->read_single('user_id', $user_id, 'token');
		if(!empty($ttoken)) {
			foreach($ttoken as $tt) {
				$total_token += (float)$tt->amount;
			}
		}
		
		$balance = $total_vault - $total_token;

		return (object)array('total_vault'=>$total_vault, 'total_token'=>$total_token, 'balance'=>$balance);
	}

	private function notify($from, $to, $content, $item, $item_id) {
	    $ins['from_id'] = $from;
	    $ins['to_id'] = $to;
	    $ins['content'] = $content;
	    $ins['item'] = $item;
	    $ins['item_id'] = $item_id;
	    $ins['new'] = 1;
	    $ins['reg_date'] = date(fdate);
	    
	    $this->Crud->create('notify', $ins);
	}
	
	private function send_email($to, $subject, $body) {
		$from = push_email;
		$name = app_name;
		$subhead = 'Notification';
		$this->Crud->send_email($to, $from, $subject, $body, $name, $subhead);
	}
}
