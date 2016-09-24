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
    $this->load->model('account_model');
    $action_name = $this->input->post('action');
		if($action_name===null){ die(); }
    $this->account_model->added_action($this->account->id, $this->input->post('action'));
		switch($action_name){ /// ถ้าเพิ่ม action อย่าลืม add action allow ใน model account
			case 'add_link':
        $this->add_match();
				break;
      case 'edit':
        $this->load->model('link_model');
        $this->link_model->edit_link($this->input->post('id'), array(
          $this->input->post('type') => $this->input->post('value')
        ));
        echo 'pass';
        break;
      case 'edit_st':
        $this->load->model('link_model');
        $this->link_model->edit_link($this->input->post('id'), array(
          'status' => $this->input->post('value')
        ));
        echo 'pass';
        break;
      case 'ref_table':
        $this->load->model('link_model');
        $this->page->load_tmp('table_link_tmp', array(
          'page_data' => array(
            'links_data' => $this->link_model->load_link_admin('*', null)
        )));
        break;
      case 'ref_table_2':
        $this->load->model('link_model');
        $this->page->load_tmp('table_chanal_tmp', array(
          'page_data' => array(
            'chanal_data' => $this->link_model->load_chanal('*', null)
        )));
        break;
      case 'edit_ch':
        $this->load->model('link_model');
        $this->link_model->edit_chanal($this->input->post('id'), array(
          $this->input->post('field') => $this->input->post('value')
        ));
        echo 'pass';
        break;
      case 'edit_ch_st':
        $this->load->model('link_model');
        $this->link_model->edit_chanal($this->input->post('id'), array(
          $this->input->post('field') => $this->input->post('value')
        ));
        echo 'pass';
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
        'links_data' => $this->link_model->load_link_admin('*', null),
        'chanal_data' => $this->link_model->load_chanal('*', null)
      )
    ));
  }

  private function add_match(){
    $this->load->model('link_model');
    $this->load->library('upload_pp');
    $name = c_text($this->input->post('name'));
    $link = $this->input->post('link');
    $name_file_upload = $this->upload_pp->get_upload('file','./match_image/');
    $this->link_model->add_link($name, $link, base_url().'match_image/'.$name_file_upload, $this->account->id);
    echo 'pass';
  }

}
