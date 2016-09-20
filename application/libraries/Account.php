<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account {
  public function __construct(){
    $this->CI =& get_instance();
    $this->id = $this->CI->session->userdata('user_id');
    $this->class = ($this->CI->session->userdata('user_class')===null) ? 'quest' : $this->CI->session->userdata('user_class');
    $this->default_app_view = $this->class.'_app_view';
  }

  public function login($username, $password){
    $this->CI->load->model('account_model');
    if($this->class!=='quest'){ return 'Login อยู่แล้ว'; }
    $password = $password;
    $data_user = $this->CI->account_model->get_where_user_data('id,password,class', array(
      'user' => $username
    ));
    if(count($data_user)===0){ return 'ไม่พบ ชื่อผู้ใช้งานนี้ในระบบ'; }
    else{
      if($password!==$data_user['password']){ return 'รหัสผ่าน ไม่ถูกต้อง'; }
      else{
        $this->success_login($data_user['id'], $data_user['class']);
        return 'pass';
      }
    }
  }

  public function logout(){
    $this->CI->session->sess_destroy();
    header('Location:'.base_url());
    die();
  }

  private function success_login($user_id, $user_class){
    $this->CI->session->set_userdata(array(
      'user_id' => $user_id,
      'user_class' => $user_class
    ));
  }

}
