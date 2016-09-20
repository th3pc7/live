<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct(){
		parent::__construct();
		if($this->account->class!=='quest'){
      header('Location:'.base_url().$this->account->class.'/');
			die();
		}
	}

  public function action(){
    $action_name = $this->input->post('action');
		if($action_name===null){ die(); }
		switch($action_name){
			case 'login':
        echo $this->account->login($this->input->post('u'), $this->input->post('p'));
				break;
			default:
				die();
		}
  }

	public function index(){
    $this->page->load_page('login_page', array(
      'page_data' => array(
        'title' => 'Login'
      )
    ));
  }

}
