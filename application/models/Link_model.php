<?php

class Link_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function add_link($name, $link, $file_name, $owner_id){
        $this->db->insert('live_match',array(
            'name' => $name,
            'link' => $link,
            'image' => $file_name,
            'owner_id' => $owner_id,
            'create_datetime' => date('Y-m-d H:i:s')
        ));
        return $this->db->insert_id();
    }
    public function add_movie($name, $link, $file_name, $owner_id){
        $this->db->insert('live_movie',array(
            'name' => $name,
            'link' => $link,
            'image' => $file_name,
            'owner_id' => $owner_id,
            'create_datetime' => date('Y-m-d H:i:s')
        ));
        return $this->db->insert_id();
    }
    public function add_team($name,$file_name){
        $this->db->insert('live_team',array(
            'name' => $name,
            'image' => $file_name
        ));
        return $this->db->insert_id();
    }
    public function add_soccer($code,$home,$away,$datetime){
        $this->db->insert('live_soccer',array(
            'code' => $code,
            'team1' => $home,
            'team2' => $away,
            'datetime' => $datetime
        ));
        return $this->db->insert_id();
    }
    public function edit_link($id, $array_update){
        $this->db->where('id', $id)
            ->limit(1)
            ->update('live_match', $array_update); // $array_data = array('field'=>'value');
    }
    public function edit_link_movie($id, $array_update){
        $this->db->where('id', $id)
            ->limit(1)
            ->update('live_movie', $array_update); // $array_data = array('field'=>'value');
    }
    public function edit_chanal($id, $array_update){
        $this->db->where('chanal_id', $id)
            ->limit(1)
            ->update('live_chanal', $array_update); // $array_data = array('field'=>'value');
    }
    public function load_link($str_select, $array_where=false){
        return $this->db->select($str_select)
            // ->where($array_where)
            ->order_by('id','asc')
            ->get('live_match')->result_array();
    }
    public function load_movie_link($str_select, $array_where=false){
        return $this->db->select($str_select)
            // ->where($array_where)
            ->order_by('id','asc')
            ->get('live_movie')->result_array();
    }
    public function load_chanal($str_select, $array_where=false){
        return $this->db->select($str_select)
            ->join('live_match','live_chanal.match_id=live_match.id','left')
            ->get('live_chanal')->result_array();
    }
    public function get_where_link($str_select, $array_where){
        return $this->db->select($str_select)
            ->where($array_where)
            ->join('live_chanal','live_chanal.match_id=live_match.id','left')
            ->limit(1)
            ->get('live_match')->row_array();
    }
    public function get_where_movie_link($str_select, $array_where){
        return $this->db->select($str_select)
            ->where($array_where)
            ->join('live_chanal','live_chanal.match_id<0','left')
            ->limit(1)
            ->get('live_movie')->row_array();
    }
    public function get_where_chanal($str_select, $array_where){
        return $this->db->select($str_select)
            ->where($array_where)
            ->join('live_match','live_chanal.match_id=live_match.id','left')
            ->limit(1)
            ->get('live_chanal')->row_array();
    }
    public function load_link_admin($str_select, $array_where=false){
        return $this->db->select($str_select)
            ->where(array(
                'status'=>'active'
            ))
            ->order_by('id','desc')
            ->get('live_match')->result_array();
    }
    public function load_movie_link_admin($str_select, $array_where=false){
        return $this->db->select($str_select)
            // ->where($array_where)
            ->order_by('id','desc')
            ->get('live_movie')->result_array();
    }
    public function load_team_admin(){
        return $this->db->select('*')
            ->order_by('name','asc')
            ->get('live_team')->result_array();
    }
    public function load_soccer_admin(){
        $date = new DateTime('-2 hour');
        return $this->db->select('*')
            ->where(array(
                'datetime >' => $date->format('Y-m-d H:i:s')
            ))
            ->order_by('datetime','asc')
            ->get('live_soccer')->result_array();
    }
    public function same_code_soccer($code){
        $data = $this->db->select('code')
            ->where(array(
                'code' => $code
            ))
            ->limit(1)
            ->get('live_soccer')->result_array();
        if(count($data)===0){ return false; }
        else{ return true; }
    }

}
