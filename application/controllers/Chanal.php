<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chanal extends CI_Controller {

  public function __construct(){
		parent::__construct();
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
    $chanal_id = c_number($this->uri->segment(2));
    if($chanal_id===null){
      $this->page->load_page('front_page', array(
        'page_data' => array(
          'title' => 'รายการถ่ายทอดสด | ทั้งหมด',
          'chanal_data' => $this->link_model->load_chanal('*', null)
        )
      ));
    }else{
      $this->stream($chanal_id);
    }
  }

  public function stream($chanal_id){
    $chanal_data = $this->link_model->get_where_chanal('*', array(
      'chanal_id' => $chanal_id
    ));
    if($chanal_data['chanal_status']==='disabled'){
      header('Location:'.base_url().'chanal/');
      die();
    }
    $this->page->load_page('chanal_page', array(
      'page_data' => array(
        'title' => (($chanal_data['name']===null) ? 'รอสัญญาณถ่ายทอดสด':$chanal_data['name']).' | '.$chanal_data['chanal_name'],
        'chanal_data' => $chanal_data,
        'all_chanal_data' => $this->link_model->load_chanal('*', null)
      )
    ));
  }

}
