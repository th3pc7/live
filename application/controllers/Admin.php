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
      case 'ref_table_movie':
        $this->load->model('link_model');
        $this->page->load_tmp('table_link_tmp', array(
          'page_data' => array(
            'links_data' => $this->link_model->load_movie_link_admin('*', null)
        )));
        break;
      case 'add_team':
        $this->add_team();
        break;
      case 'add_soccer':
        $this->add_soccer();
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
			case 'add_movie':
        $this->add_movie();
				break;
      case 'edit_mv':
        $this->load->model('link_model');
        $this->link_model->edit_link_movie($this->input->post('id'), array(
          $this->input->post('type') => $this->input->post('value')
        ));
        echo 'pass';
        break;
      case 'edit_mv_st':
        $this->load->model('link_model');
        $this->link_model->edit_link_movie($this->input->post('id'), array(
          'status' => $this->input->post('value')
        ));
        echo 'pass';
        break;
      case 'ref_tmp_soccer':
        $this->load->model('link_model');
        $this->page->load_tmp('add_soccer_tmp', array(
          'page_data' => array(
            'team_data' => $this->link_model->load_team_admin(),
            'soccer_data' => $this->link_model->load_soccer_admin()
        )));
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
        'chanal_data' => $this->link_model->load_chanal('*', null),
        'team_data' => $this->link_model->load_team_admin(),
        'soccer_data' => $this->link_model->load_soccer_admin()
      )
    ));
  }
  public function movie(){
    $this->load->model('link_model');
    $this->page->load_page('admin_movie_page', array(
      'page_data' => array(
        'title' => 'staff | stream',
        'links_data' => $this->link_model->load_movie_link_admin('*', null)
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
  private function add_movie(){
    $this->load->model('link_model');
    $this->load->library('upload_pp');
    $name = c_text($this->input->post('name'));
    $link = $this->input->post('link');
    $name_file_upload = $this->upload_pp->get_upload('file','./match_image/');
    $this->link_model->add_movie($name, $link, base_url().'match_image/'.$name_file_upload, $this->account->id);
    echo 'pass';
  }
  private function add_team(){
    $this->load->model('link_model');
    $this->load->library('upload_pp');
    $team = c_text($this->input->post('team'));
    $name_file_upload = $this->upload_pp->get_upload('file','./match_image/');
    $this->link_model->add_team($team,base_url().'match_image/'.$name_file_upload);
    echo 'pass';
  }
  private function add_soccer(){
    $this->load->model('link_model');
    $code = $this->get_new_code();
    $home = c_text($this->input->post('home'));
    $away = c_text($this->input->post('away'));
    if($home===null||$away===null){
      echo 'กรุณาเลือกทีมการแข่งขัน';
      die();
    }
    $datetime = c_text($this->input->post('start_time'));
    $this->link_model->add_soccer($code,$home,$away,$datetime);
    echo 'pass';
  }
  private function get_new_code(){
    $ret = $this->generateRandomString(8);
    while($this->link_model->same_code_soccer($ret)===true){
      $ret = $this->generateRandomString(8);
    }
    return $ret;
  }
  private function generateRandomString($length=10){
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i=0;$i<$length;$i++){
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }

}
