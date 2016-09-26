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
    $type_view = c_text($this->uri->segment(1));
    $view_id = c_number($this->uri->segment(2));
    if($view_id===null||$type_view===null){
      header('Location:'.base_url().'video/1/');
      die();
      $this->page->load_page('chanal_page', array(
        'page_data' => array(
          'title' => 'รายการทั้งหมด | kan-eng.com',
          'chanal_data' => null,
          'all_chanal_data' => $this->link_model->load_chanal('*', null),
          'all_link' => $this->link_model->load_link('*', null),
          'all_movie_link' => $this->link_model->load_movie_link('*', null)
        )
      ));
    }else{
      if($type_view==='chanal'){
        $this->get_stream($view_id);
      }
      elseif($type_view==='video'){
        $this->get_vdo($view_id);
      }
      elseif($type_view==='movie'){
        $this->get_vdo_movie($view_id);
      }
      else{ echo 'zPadidaSz'; die(); }
    }
  }

  private function get_stream($view_id){
    $chanal_data = $this->link_model->get_where_chanal('*', array(
      'chanal_id' => $view_id
    ));
    $chanal_data = $this->modifi_link($chanal_data);
    if($chanal_data===null||$chanal_data['chanal_status']==='disabled'){
      header('Location:'.base_url().'video/1/');
      die();
    }
    $this->page->load_page('chanal_page', array(
      'page_data' => array(
        'title' => $chanal_data['name'].' | '.$chanal_data['chanal_name'],
        'chanal_data' => $chanal_data,
        'all_chanal_data' => $this->link_model->load_chanal('*', null),
        'all_link' => $this->link_model->load_link('*', null),
        'all_movie_link' => $this->link_model->load_movie_link('*', null)
      )
    ));
  }

  private function get_vdo($view_id){
    $chanal_data = $this->link_model->get_where_link('*', array(
      'id' => $view_id
    ));
    $chanal_data = $this->modifi_link($chanal_data);
    if($chanal_data===null||$chanal_data['status']==='remove'){
      header('Location:'.base_url().'video/1/');
      die();
    }
    $this->page->load_page('chanal_page', array(
      'page_data' => array(
        'title' => $chanal_data['name'],
        'chanal_data' => $chanal_data,
        'all_chanal_data' => $this->link_model->load_chanal('*', null),
        'all_link' => $this->link_model->load_link('*', null),
        'all_movie_link' => $this->link_model->load_movie_link('*', null)
      )
    ));
  }

  private function get_vdo_movie($view_id){
    $chanal_data = $this->link_model->get_where_movie_link('*', array(
      'id' => $view_id
    ));
    $chanal_data = $this->modifi_link($chanal_data);
    if($chanal_data===null||$chanal_data['status']==='remove'){
      header('Location:'.base_url().'video/1/');
      die();
    }
    $this->page->load_page('chanal_page', array(
      'page_data' => array(
        'title' => $chanal_data['name'],
        'chanal_data' => $chanal_data,
        'all_chanal_data' => $this->link_model->load_chanal('*', null),
        'all_link' => $this->link_model->load_link('*', null),
        'all_movie_link' => $this->link_model->load_movie_link('*', null)
      )
    ));
  }

  private function modifi_link($chanal_data){
    return $chanal_data;
  }

}
