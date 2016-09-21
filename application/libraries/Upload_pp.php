<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_pp {
  public function __construct(){
    $this->CI =& get_instance();
  }

  public function get_upload($name_field_upload, $path='../XXXXXX/'){
    $new_name = time().'.'.end((explode(".", $_FILES[$name_field_upload]['name'])));
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 2048000;
    $config['max_width'] = 2000;
    $config['max_height'] = 2000;
    $config['file_name'] = $new_name;
    $this->CI->load->library('upload', $config);
    if(!$this->CI->upload->do_upload($name_field_upload)){
      echo 'อัพโหลดรูปภาพล้มเหลว';
      die();
    }
    else {
      return $new_name;
    }
  }

}
