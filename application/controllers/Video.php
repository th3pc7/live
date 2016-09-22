<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

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
    $chanal_data = $this->link_model->get_where_link('*', array(
      'id' => $chanal_id
    ));
    if($chanal_data['status']==='remove'){
      header('Location:'.base_url().'chanal/9999/');
      die();
    }
    $this->page->load_page('chanal_page', array(
      'page_data' => array(
        'title' => (($chanal_data['name']===null) ? 'ไม่พบข้อมูล':$chanal_data['name']),
        'chanal_data' => $chanal_data,
        'all_chanal_data' => $this->link_model->load_chanal('*', null),
        'all_link' => $this->link_model->load_link('*', null)
      )
    ));
  }

}
