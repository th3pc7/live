<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct(){
		parent::__construct();
		if($this->account->class!=='admin'){
      echo 'Fail permission.';
			die();
		}
	}

  public function action(){
    $action_name = $this->input->post('action');
		if($action_name===null){ die(); }
		switch($action_name){
			case 'add_link':
				break;
			default:
				die();
		}
  }

	public function index(){
    $this->load->model('link_model');
    $this->page->load_page('admin_page', array(
      'page_data' => array(
        'title' => 'staff | stream',
        'links_data' => array()
      )
    ));
  }

}
