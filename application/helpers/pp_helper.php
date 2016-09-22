<?php

function c_text($str){
    $str = trim($str);
    if($str===''){ return null; }
    else{ return htmlspecialchars($str); }
}

function c_number($str_number,$point=2){
    if(is_numeric($str_number)){ return round(floatval($str_number),$point); }
    else{ return null; }
}

function get_video_data_from_youtube($my_id){
  $my_video_info = 'http://www.youtube.com/get_video_info?&video_id='.$my_id.'&asv=3&el=detailpage&hl=en_US';
  $ch_load = curl_init();
  curl_setopt($ch_load, CURLOPT_URL, $my_video_info);
  curl_setopt($ch_load, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch_load, CURLOPT_CONNECTTIMEOUT, 3);
  $my_video_info = curl_exec($ch_load);
  curl_close($ch_load);
  $url_encoded_fmt_stream_map = '';
  $thumbnail_url = '';
  $title = '';
  $type = '';
  $url = '';
  parse_str($my_video_info);
  if(isset($url_encoded_fmt_stream_map)){ $my_formats_array = explode(',',$url_encoded_fmt_stream_map); }
  else { return false; }
  if(count($my_formats_array)===0){ return false; }
  $all_vdo_format[] = '';
  $quality = '';
  $ipbits = '';
  $itag = '';
  $sig = '';
  $ip = '';
  $i = -1;
  foreach($my_formats_array as $format){
    $i = $i + 1;
    parse_str($format);
    $all_vdo_format[$i]['itag'] = $itag;
    $all_vdo_format[$i]['quality'] = $quality;
    $type = explode(';',$type);
    $all_vdo_format[$i]['type'] = $type[0];
    $all_vdo_format[$i]['url'] = urldecode($url).'&signature='.$sig;
    parse_str(urldecode($url));
    $all_vdo_format[$i]['expires'] = time();
    $all_vdo_format[$i]['ipbits'] = $ipbits;
    $all_vdo_format[$i]['ip'] = $ip;
  }
  return $all_vdo_format;
}