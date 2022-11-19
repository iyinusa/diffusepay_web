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

		$this->token = 'EAACva1Mk73MBAPCKAh12445IAxF01sWkiFYAwcViL6MXEi';

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
				// $role_id = $this->Crud->read_field('name', 'Customer', 'access_role', 'id');
				$ins['fullname'] = $fullname;
				$ins['email'] = $email;
				$ins['password'] = md5($password);
				$ins['phone'] = $phone;
				// $ins['country_id'] = $this->Crud->read_field('name', $country, 'country', 'id');
				// $ins['role_id'] = $role_id;
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
			// $msg = 'Missing field.';
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
					$data['fullname'] = strtoupper($q->title.' '.$q->firstname);
					$data['email'] = $q->email;
					$data['image'] = site_url($this->Crud->image($q->img_id, 'big'));
					$data['reg_date'] = date('M d, Y h:i A', strtotime($q->reg_date));
				}
		    }
		}
		
		echo json_encode(array('status'=>$status, 'msg'=>$msg, 'data'=>$data));
		die;
	}

	//// others //////
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
