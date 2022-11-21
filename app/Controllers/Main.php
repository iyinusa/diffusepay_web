<?php

namespace App\Controllers;

class Main extends BaseController {
    public function index() {
        $data['title'] = 'Welcome to '.app_name;
        $data['page'] = 'main';
        return view('main', $data);
    }

    public function pay($id, $amount, $mtoken='') {
        $pay_script = '';
        $msg = '';

        if($id) {
            $fullname = $this->Crud->read_field('id', $id, 'user', 'fullname');
            $email = $this->Crud->read_field('id', $id, 'user', 'email');
            $phone = $this->Crud->read_field('id', $id, 'user', 'phone');
        }
        
        $ref = $this->request->getGet('linkingreference');
        $pay_ref = $this->request->getGet('reference');
        $message = $this->request->getGet('message');

        // payment status
        $success = false;
        if($ref && $pay_ref && $message && $id) {
            if($message != 'Successful') {
                $msg = 'Payment Failed!';
            } else {
                $success = true;
                $msg = 'Payment Successful!';
            }

            // save transaction
            $trans = $this->Crud->seerbit_save($id, $ref, $pay_ref);
            if($trans->id > 0) {
                $this->process($trans->id, $mtoken);
            }
        }

        if(!$success) {
            if($amount) {
                $redir = site_url('main/pay/'.$id.'/'.$amount);
                if(!empty($mtoken)) $redir .= '/'.$mtoken; // the mtoken us used for callback if payment is from mobile app

                $curr = 'NGN';
                $country = 'NG';
                $customize['theme'] = array('border_color'=>'0000', 'background_color'=>'ECECEC', 'button_color'=>'052272');
                $customize['payment_method'] = ["card", "account", "transfer", "wallet", "ussd"];
                $customize['confetti'] = true;
                $customize['logo'] = site_url('assets/images/icon.png');

                $pay_script = $this->Crud->seerbit_inline($redir, $customize, $amount, $fullname, $email, $country, $curr);
            }
        }

        $data['pay_script'] = $pay_script;
        $data['success'] = $success;
        $data['msg'] = $msg;

        $data['title'] = 'Fund Vault - '.app_name;
        $data['page'] = 'pay';
        return view('main', $data);
    }

    public function merchant() {
        $data['title'] = 'Merchant Store - '.app_name;
        $data['page'] = 'merchant';
        return view('main', $data);
    }

    public function process($trans_id, $mtoken='') {
        // check transaction status
        $user_id = $this->Crud->read_field('id', $trans_id, 'transaction', 'user_id');
        $ref = $this->Crud->read_field('id', $trans_id, 'transaction', 'ref');
        $code = $this->Crud->read_field('id', $trans_id, 'transaction', 'code');
        $amount = $this->Crud->read_field('id', $trans_id, 'transaction', 'amount');
        $status = $this->Crud->read_field('id', $trans_id, 'transaction', 'status');
        if($status != 'SUCCESS') {
            // verify payment again
            $trans = $this->Crud->seerbit_save($user_id, $ref, $code);
            $status = $trans->status;
        }
        
        // now give value to user
        if($status == 'SUCCESS') {
            // check if value not already given
            if($this->Crud->check('trans_id', $trans_id, 'vault') <= 0) {
                // give value
                $ins['user_id'] = $user_id;
                $ins['amount'] = $amount;
                $ins['remark'] = 'Vault Funding';
                $ins['trans_id'] = $trans_id;
                if(!empty($mtoken)) $ins['mtoken'] = $mtoken; // used to track payment from mobile app
                $ins['reg_date'] = date(fdate);
                $ins_id = $this->Crud->create('vault', $ins);
                if($ins_id > 0) $this->Crud->updates('id', $trans_id, 'transaction', array('item_id'=>$ins_id));
            }
        }
    }

    public function verify() {
        $status = false;
        $msg = '';

        $token = $this->request->getPost('token');
        $amt = (float)$this->request->getPost('amt');
        if(!$token) {
            $msg = '<b class="text-danger">Please Provide VToken</b>';
        } else {
            // check if token exist and not used
            $token_id = $this->Crud->read_field2('token', $token, 'used', 0, 'token', 'id');
            if(empty($token_id)) {
                $msg = '<b class="text-danger">Invalid/Used VToken</b>';
            } else {
                // check amount
                $token_amt = (float)$this->Crud->read_field('id', $token_id, 'token', 'amount');
                if($token_amt < $amt) {
                    $msg = '<b class="text-danger">VToken Value Not Sufficient</b>';
                } else {
                    $status = true;
                }
            }
        }

        echo json_encode(array('status'=>$status, 'msg'=>$msg));
    }

    public function approve() {
        $status = false;
        $msg = '';

        $token = $this->request->getPost('token');
        $amt = (float)$this->request->getPost('amt');
        $pin = $this->request->getPost('pin');
        if(!$pin) {
            $msg = '<b class="text-danger">Please Provide VToken PIN</b>';
        } else {
            // check if token pin is correct
            $token_id = $this->Crud->read_field2('token', $token, 'pin', $pin, 'token', 'id');
            if(empty($token_id)) {
                $msg = '<b class="text-danger">Invalid VToken PIN</b>';
            } else {
                $status = true;
                $msg = '<b class="text-success">Congratulations! Transaction Completed</b>';

                // update token
                $this->Crud->updates('id', $token_id, 'token', array('used'=>1, 'used_date'=>date(fdate), 'partner_id'=>2, 'remark'=>'Purchased of Casio Wrist Watches from Sample Store'));
            }
        }

        echo json_encode(array('status'=>$status, 'msg'=>$msg));
    }   
}
