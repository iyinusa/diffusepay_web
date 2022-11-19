<?php

namespace App\Models;

use CodeIgniter\Model;

class Crud extends Model {

    public function __construct() {
       
    }

    //////////////////// C - CREATE ///////////////////////
	public function create($table, $data) {
		$db = db_connect();
        $builder = $db->table($table);

        $builder->insert($data);

        return $db->InsertID();
        $db->close();
	}
	
	//////////////////// R - READ /////////////////////////
	public function read($table, $limit='', $offset='') {
        $db = db_connect();
        $builder = $db->table($table);

		$builder->orderBy('id', 'DESC');
		
        // limit query
        if($limit && $offset) {
			$query = $builder->get($limit, $offset);
		} else if($limit) {
			$query = $builder->get($limit);
		} else {
            $query = $builder->get();
        }

        // return query
        return $query->getResult();
        $db->close();
	}

    public function read_order($table, $field, $type, $limit='', $offset='') {
        $db = db_connect();
        $builder = $db->table($table);

		$builder->orderBy($field, $type);
		
        // limit query
        if($limit && $offset) {
			$query = $builder->get($limit, $offset);
		} else if($limit) {
			$query = $builder->get($limit);
		} else {
            $query = $builder->get();
        }

        // return query
        return $query->getResult();
        $db->close();
	}

    public function read_single($field, $value, $table, $limit='', $offset='') {
		$db = db_connect();
        $builder = $db->table($table);

		$builder->orderBy('id', 'DESC');
        $builder->where($field, $value);

        // limit query
        if($limit && $offset) {
			$query = $builder->get($limit, $offset);
		} else if($limit) {
			$query = $builder->get($limit);
		} else {
            $query = $builder->get();
        }

        // return query
        return $query->getResult();
        $db->close();
	}

    public function read_single_order($field, $value, $table, $or_field, $or_value, $limit='', $offset='') {
		$db = db_connect();
        $builder = $db->table($table);

		$builder->orderBy($or_field, $or_value);
        $builder->where($field, $value);

        // limit query
        if($limit && $offset) {
			$query = $builder->get($limit, $offset);
		} else if($limit) {
			$query = $builder->get($limit);
		} else {
            $query = $builder->get();
        }

        // return query
        return $query->getResult();
        $db->close();
	}

    public function read2($field, $value, $field2, $value2, $table, $or_field='id', $or_value='DESC', $limit='', $offset='') {
		$db = db_connect();
        $builder = $db->table($table);

		$builder->orderBy($or_field, $or_value);
        $builder->where($field, $value);
        $builder->where($field2, $value2);

        // limit query
        if($limit && $offset) {
			$query = $builder->get($limit, $offset);
		} else if($limit) {
			$query = $builder->get($limit);
		} else {
            $query = $builder->get();
        }

        // return query
        return $query->getResult();
        $db->close();
	}

    public function read3($field, $value, $field2, $value2, $field3, $value3, $table, $limit='', $offset='') {
		$db = db_connect();
        $builder = $db->table($table);

		$builder->orderBy('id', 'DESC');
        $builder->where($field, $value);
        $builder->where($field2, $value2);
        $builder->where($field3, $value3);

        // limit query
        if($limit && $offset) {
			$query = $builder->get($limit, $offset);
		} else if($limit) {
			$query = $builder->get($limit);
		} else {
            $query = $builder->get();
        }

        // return query
        return $query->getResult();
        $db->close();
	}
    

    public function read_field($field, $value, $table, $call) {
		$return_call = '';
		$getresult = $this->read_single($field, $value, $table);
		if(!empty($getresult)) {
			foreach($getresult as $result)  {
				$return_call = $result->$call;
			}
		}
		return $return_call;
	}

    public function read_field2($field, $value, $field2, $value2, $table, $call) {
		$return_call = '';
		$getresult = $this->read2($field, $value, $field2, $value2, $table);
		if(!empty($getresult)) {
			foreach($getresult as $result)  {
				$return_call = $result->$call;
			}
		}
		return $return_call;
	}

    public function read_field3($field, $value, $field2, $value2, $field3, $value3, $table, $call) {
		$return_call = '';
		$getresult = $this->read3($field, $value, $field2, $value2, $field3, $value3, $table);
		if(!empty($getresult)) {
			foreach($getresult as $result)  {
				$return_call = $result->$call;
			}
		}
		return $return_call;
	}

	public function read_group($table, $group, $limit='', $offset='') {
		$db = db_connect();
		$db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $builder = $db->table($table);

		$builder->orderBy('id', 'DESC');
		$builder->groupBy($group);

        // limit query
        if($limit && $offset) {
			$query = $builder->get($limit, $offset);
		} else if($limit) {
			$query = $builder->get($limit);
		} else {
            $query = $builder->get();
        }

        // return query
        return $query->getResult();
        $db->close();
	}

	public function read_single_group($field, $value, $table, $group, $limit='', $offset='') {
		$db = db_connect();
		$db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $builder = $db->table($table);

		$builder->orderBy('id', 'DESC');
        $builder->where($field, $value);
		$builder->groupBy($group);

        // limit query
        if($limit && $offset) {
			$query = $builder->get($limit, $offset);
		} else if($limit) {
			$query = $builder->get($limit);
		} else {
            $query = $builder->get();
        }

        // return query
        return $query->getResult();
        $db->close();
	}

    public function check($field, $value, $table){
		$db = db_connect();
        $builder = $db->table($table);
        
        $builder->where($field, $value);

        return $builder->countAllResults();
        $db->close();
	}

    public function check2($field, $value, $field2, $value2, $table){
		$db = db_connect();
        $builder = $db->table($table);
        
        $builder->where($field, $value);
        $builder->where($field2, $value2);

        return $builder->countAllResults();
        $db->close();
	}

    public function check3($field, $value, $field2, $value2, $field3, $value3, $table){
		$db = db_connect();
        $builder = $db->table($table);
        
        $builder->where($field, $value);
        $builder->where($field2, $value2);
        $builder->where($field3, $value3);

        return $builder->countAllResults();
        $db->close();
	}

    //////////////////// U - UPDATE ///////////////////////
	public function updates($field, $value, $table, $data) {
		$db = db_connect();
        $builder = $db->table($table);

        $builder->where($field, $value);
        $builder->update($data);
        
        return $db->affectedRows();
        $db->close();
	}
	
	//////////////////// D - DELETE ///////////////////////
	public function deletes($field, $value, $table) {
		$db = db_connect();
        $builder = $db->table($table);

        $builder->where($field, $value);
        $builder->delete();
        
        return $db->affectedRows();
        $db->close();
	}
	public function deletes2($field, $value, $field2, $value2, $table) {
		$db = db_connect();
        $builder = $db->table($table);

        $builder->where($field, $value);
        $builder->where($field2, $value2);
        $builder->delete();
        
        return $db->affectedRows();
        $db->close();
	}
	//////////////////// END DATABASE CRUD ///////////////////////

    //////////////////// DATATABLE AJAX CRUD ///////////////////////
	public function datatable_query($builder, $table, $column_order, $column_search, $order, $where='') {
		// where clause
		if(!empty($where)) {
			foreach($where as $key=>$value) {
		        $builder->where($key, $value);
		    }
		}
 
		// here combine like queries for search processing
		$i = 0;
		if($_POST['search']['value']) {
			foreach($column_search as $item) {
				if($i == 0) {
					$builder->like($item, $_POST['search']['value']);
				} else {
					$builder->orLike($item, $_POST['search']['value']);
				}
				
				$i++;
			}
		}
		 
		// here order processing
		if(isset($_POST['order'])) { // order by click column
			$builder->orderBy($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else { // order by default defined
			$builder->orderBy(key($order), $order[key($order)]);
		}
	}
 
	public function datatable_load($table, $column_order, $column_search, $order, $where='') {
        $db = db_connect();
        $builder = $db->table($table);

		$this->datatable_query($builder, $table, $column_order, $column_search, $order, $where);
		
		if($_POST['length'] != -1) {
			$builder->limit($_POST['length'], $_POST['start']);
		}
		
		$query = $builder->get();
		return $query->getResult();
        $db->close();
	}
 
	public function datatable_filtered($table, $column_order, $column_search, $order, $where='') {
        $db = db_connect();
        $builder = $db->table($table);

		$this->datatable_query($builder, $table, $column_order, $column_search, $order, $where);
		// $query = $builder->get();
		// return $query->num_rows();
        return $builder->countAllResults();
        $db->close();
	}
 
	public function datatable_count($table, $where='') {
		$db = db_connect();
        $builder = $db->table($table);
        
		// where clause
		if(!empty($where)) {
			$builder->where($field, $value);
		}

        return $builder->countAllResults();
        $db->close();
	} 
	//////////////////// END DATATABLE AJAX CRUD ///////////////////


    //////////////////// NOTIFICATION CRUD ///////////////////////
	public function msg($type = '', $text = ''){
		if($type == 'success'){
			$icon = 'anticon anticon-check-circle';
			$icon_text = 'Successful!';
		} else if($type == 'info'){
			$icon = 'anticon anticon-info-circle';
			$icon_text = 'Head up!';
		} else if($type == 'warning'){
			$icon = 'anticon anticon-exclamation-circle';
			$icon_text = 'Please check!';
		} else if($type == 'danger'){
			$icon = 'anticon anticon-close-circle';
			$icon_text = 'Oops!';
		}
		
		return '
			<div class="alert alert-'.$type.' alert-dismissible">
				<div class="d-flex justify-content-start">
					<span class="alert-icon m-r-20 font-size-30">
						<i class="'.$icon.'"></i>
					</span>
					<div>
						<div class="alert-heading"><b>'.$icon_text.'</b></div>
						<p>'.$text.'</p>
					</div>
				</div>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  			<span aria-hidden="true">×</span>
				</button>
			</div>
		';	
	}
	//////////////////// END NOTIFICATION CRUD ///////////////////////

	//////////////////// SEERBIT //////////////////
	public function seerbit_url($server='') {
		if($server == 'test') return 'https://seerbitapi.com/api/v2/';
		return 'https://seerbitapi.com/api/v2/';
	}

	public function seerbit_key($type='') {
		$server = $this->read_field('name', 'seerbit_server', 'setting', 'value');
		return $this->read_field('name', $server.'_'.$type.'_key', 'setting', 'value');
	}

	public function seerbit_post($link) {
		$server = $this->read_field('name', 'seerbit_server', 'setting', 'value');

		// create a new cURL resource
		$curl = curl_init();

		$link = $this->seerbit_url($server).$link;
		$skey = $this->seerbit_key('secret');
		$pkey = $this->seerbit_key('public');
		$data = array('key'=>$skey.'.'.$pkey);

		// return json_encode($data);
		
		$chead = array();
		$chead[] = 'Content-Type: application/json';

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'OPTIONS');
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

		// grab URL and pass it to the browser
		$result = curl_exec($curl);
		
		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}

	public function seerbit_get($link) {
		$server = $this->read_field('name', 'seerbit_server', 'setting', 'value');

		// create a new cURL resource
		$curl = curl_init();

		$link = $this->seerbit_url($server).$link;
		
		// get encryption key
		$resp = $this->seerbit_post('encrypt/keys');
		$resp = json_decode($resp);
		if(!empty($resp) && $resp->status == 'SUCCESS') {
			$ekey = $resp->data->EncryptedSecKey->encryptedKey;
		} else {
			return;
		}
		
		$chead = array();
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'Authorization: Bearer '.$ekey;

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}

	public function seerbit_inline($redir='', $customize='', $amount=0, $fullname='', $email='', $country='NG', $curr='NGN') {
		$server = $this->read_field('name', 'seerbit_server', 'setting', 'value');
		$publicKey = $this->seerbit_key('public', $server);
		$txref = 'DP-'.time().rand();
		$amount = $this->to_number($amount);

		return '
			<script src="https://checkout.seerbitapi.com/api/v2/seerbit.js"></script>
			<script>
				function paywithSeerbit() {
					SeerbitPay({
						"public_key": "'.$publicKey.'",
						"tranref": "'.$txref.'",
						"amount": "'.$amount.'",
						"currency": "'.$curr.'",
						"country": "'.$country.'",
						"callbackurl": "'.$redir.'",
						"full_name": "'.$fullname.'",
						"email": "'.$email.'",
						"Customization": '.json_encode($customize).',
					});
				}
			</script>
		';
	}

	public function seerbit_save($user_id, $ref, $code) {
		$trans_id = 0;
		$status = '';

		$resps = $this->seerbit_get('payments/query/'.$code);
		$resp = json_decode($resps);
		if(!empty($resp->status) && $resp->status == 'SUCCESS') {
			$status = $resp->status;
			$message = $resp->data->message;

			$ins['amount'] = (float)$resp->data->payments->amount - (float)$resp->data->payments->fee;
			$ins['fee'] = $resp->data->payments->fee;
			$ins['msg'] = $message;

			// check transaction
			if($this->check('ref', $ref, 'transaction') > 0) {
				$trans_id = $this->read_field('ref', $ref, 'transaction', 'id');
				$this->updates('ref', $ref, 'transaction', $ins);
			} else {
				$ins['user_id'] = $user_id;
				$ins['code'] = $code;
				$ins['item'] = $resps;
				$ins['ref'] = $ref;
				$ins['status'] = $status;
				$ins['reg_date'] = date(fdate);
				$trans_id = $this->create('transaction', $ins);
			}
		}

		return (object)array('id'=>$trans_id, 'status'=>$status);
	}
	//////////////////// END SEERBIT //////////////////

    //////////////////// FILE UPLOAD //////////////////
    public function file_validate() {
        $validationRule = [
            'pics' => [
                'rules' => 'uploaded[pics]'
                    . '|is_image[pics]'
                    . '|mime_in[pics,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[pics,100]',
            ],
        ];

        if (!$this->validate($validationRule)) {
            return false;
        } else {
            return true;
        }
    }

    public function img_upload($path, $file, $width=0, $height=0, $ratio=true, $ration_by='width') {
        // file data
        $name = $file->getName();
        $type = $file->getClientMimeType();
        $filename = $file->getRandomName();

        if(empty($width)) $width = 400;
        if(empty($height)) $height = 400;

        // if directory not exit
        if (!is_dir($path)) mkdir($path, 0755);

        $image = \Config\Services::image()
            ->withFile($file)
            ->resize($width, $height, $ratio, $ration_by)
            ->save($path.$filename);

        $resp_data['path'] = $path.$filename;
        $resp_data['name'] = $name;
        $resp_data['type'] = $type;
        return (object)$resp_data;
    }

    public function save_image($log_id, $path, $name='', $type='') {
        $reg_data['user_id'] = $log_id;
        $reg_data['pics'] = $path;
        $reg_data['pics_small'] = $path;
        $reg_data['pics_square'] = $path;
        $reg_data['reg_date'] = date(fdate);
        return $this->create('image', $reg_data);
    }

	public function file_upload($path, $file, $width=0, $height=0, $ratio=true, $ration_by='width') {
        // file data
        $name = $file->getName();
        $type = $file->getClientMimeType();
        $filename = $file->getRandomName();
		$size = $file->getSize();
		$ext = $file->guessExtension();

        // if directory not exit
        if (!is_dir($path)) mkdir($path, 0755);
		$file->move($path, $filename);

        $resp_data['path'] = $path.$filename;
        $resp_data['name'] = $name;
        $resp_data['type'] = $type;
		$resp_data['size'] = $size;
		$resp_data['ext'] = $ext;
        return (object) $resp_data;
    }

	public function save_file($log_id, $path, $ext='txt', $size=0) {
        $reg_data['user_id'] = $log_id;
        $reg_data['path'] = $path;
        $reg_data['ext'] = $ext;
        $reg_data['size'] = $size;
        $reg_data['reg_date'] = date(fdate);
        return $this->create('file', $reg_data);
    }
    //////////////////// END FILE UPLOAD //////////////////

    //////////////////// DATETIME ///////////////////////
	public function date_diff($now, $end, $type='days') {
		$now = new \DateTime($now);
		$end = new \DateTime($end);
		$date_left = $end->getTimestamp() - $now->getTimestamp();
		
		if($type == 'seconds') {
			if($date_left <= 0){$date_left = 0;}
		} else if($type == 'minutes') {
			$date_left = $date_left / 60;
			if($date_left <= 0){$date_left = 0;}
		} else if($type == 'hours') {
			$date_left = $date_left / (60*60);
			if($date_left <= 0){$date_left = 0;}
		} else if($type == 'days') {
			$date_left = $date_left / (60*60*24);
			if($date_left <= 0){$date_left = 0;}
		} else {
			$date_left = $date_left / (60*60*24*365);
			if($date_left <= 0){$date_left = 0;}
		}	
		
		return $date_left;
	}
	//////////////////// END DATETIME ///////////////////////

	//////////////////// IMAGE DATA //////////////////
	public function image($id, $size='small') {
		if($id) {
			if($size == 'small') {
				$path = $this->read_field('id', $id, 'image', 'pics_small');
			} else if($size == 'big') {
				$path = $this->read_field('id', $id, 'image', 'pics');
			} else {
				$path = $this->read_field('id', $id, 'image', 'pics_square');
			}
		} 

		if(empty($path) || !file_exists($path)) {
			$path = 'assets/images/avatar.png';
		}

		return $path;
	}
	//////////////////// END /////////////////

	//////////////////// IMAGE DATA //////////////////
	public function file($id) {
		if($id) {
			$ext = $this->read_field('id', $id, 'file', 'ext');
			$ext = str_replace('x', '', $ext);
			$path = 'assets/backend/images/docs/'.$ext.'-128.png';
		} 

		if(empty($path) || !file_exists($path)) {
			$path = 'assets/backend/images/docs/txt-128.png';
		}

		return $path;
	}
	//////////////////// END /////////////////

	//////////////////// SEND EMAIL //////////////////
	public function send_email($to, $subject, $body, $bcc='') {
		$emailServ = \Config\Services::email();

		$config['charset']  = 'iso-8859-1';
		$config['mailType'] = 'html';
		$config['wordWrap'] = true;
		$emailServ->initialize($config);

		$emailServ->setFrom(push_email, app_name);
		$emailServ->setTo($to);
		if(!empty($bcc)) $emailServ->setBCC($bcc);

		$emailServ->setSubject($subject);
		$temp['body'] = $body;

		$template = view('designs/email', $temp);
		$emailServ->setMessage($template);

		if($emailServ->send()) return true;
		return false;
	}
	//////////////////// END SEND EMAIL //////////////////

	public function title() {
		return array(
			'Mr',
			'Mrs',
			'Miss',
			'Master',
			'Chief',
			'Engineer',
			'Doctor',
			'Barrister',
			'Pastor',
			'Alhaji',
			'Alhaja',
			'Otunba',
			'Junior',
			'Professor',
			'Honorable',
			'Excellency',
			'Elder',
			'Clergyman',
		);
	}

	public function color() {
		return array(
			'White',
			'Black',
			'Gray',
			'Silver',
			'Red',
			'Blue',
			'Brown',
			'Green',
			'Beige',
			'Orange',
			'Gold',
			'Yellow',
			'Purple',
		);
	}

    public function to_number($text) {
		$number = preg_replace('/\s+/', '', $text); // remove all in between white spaces
		$number = str_replace(',', '', $number); // remove money format
		$number = floatval($number);
		return $number;
	}

	public function to_word(float $number) {
		$decimal = round($number - ($no = floor($number)), 2) * 100;
		$hundred = null;
		$digits_length = strlen($no);
		$i = 0;
		$str = array();

		$words = array(0 => '', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine', 10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen', 19 => 'nineteen', 20 => 'twenty', 30 => 'thirty', 40 => 'forty', 50 => 'fifty', 60 => 'sixty', 70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
	
		$digits = array('', 'hundred', 'thousand', 'million', 'billion');
		while( $i < $digits_length ) {
			$divider = ($i == 2) ? 10 : 100;
			$number = floor($no % $divider);
			$no = floor($no / $divider);
			$i += $divider == 10 ? 1 : 2;
			if ($number) {
				$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
				$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
				$str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
			} else $str[] = null;
		}
		
		$naira = implode('', array_reverse($str));
		$kobo = ($decimal > 0) ? " " . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' kobo' : '';
	
		return ($naira ? $naira . 'naira' : '') . $kobo;
	}


    //////////////////// MODULE ///////////////////////
	public function module($role, $module, $type) {
		$result = 0;
		
		$mod_id = $this->read_field('link', $module, 'access_module', 'id');
		$crud = $this->read_field('role_id', $role, 'access', 'crud');
		if($mod_id) {
			if(!empty($crud)) {
				$crud = json_decode($crud);
				foreach($crud as $cr) {
					$cr = explode('.', $cr);
					if($mod_id == $cr[0]) {
						if($type == 'create'){$result = $cr[1];}
						if($type == 'read'){$result = $cr[2];}
						if($type == 'update'){$result = $cr[3];}
						if($type == 'delete'){$result = $cr[4];}
						break;
					}
				}
			}
		}
		
		return $result;
	}
	public function mod_read($role, $module) {
		$rs = $this->module($role, $module, 'read');
		return $rs;
	}
	//////////////////// END MODULE ///////////////////////

}