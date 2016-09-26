<?php

class Account_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function add_new_account($main_user_id, $username, $password, $name, $class, $agent_map, $credit, $percent){ // insert -> Account ใหม่ และ return insert id;
        $this->db->insert('sys_user',array(
            'main_user_id' => $main_user_id,
            'user' => $username,
            'password' => $password,
            'name' => $name,
            'class' => $class,
            'credit' => $credit,
            'percent' => $percent,
            'datetime' => date('Y-m-d H:i:s')
        ));
        $insert_id = $this->db->insert_id();
        $this->db->where('id', $insert_id)
            ->update('sys_user',array(
                'user_map' => $agent_map.$insert_id.','
            ));
        return $insert_id;
    }
    public function add_cal_setting($user_id, $type, $discount, $reward){ // insert -> ข้อมูลคิดหวย และ return insert id;
        $this->db->insert('cal_setting',array(
            'user_id' => $user_id,
            'lotto_type_id' => $type,
            'discount' => $discount,
            'reward' => $reward
        ));
        return $this->db->insert_id();
    }
    public function add_limit_lotto($user_id, $type, $number, $value){ // insert -> เลขอั้น และ return insert id;
        $this->db->insert('limit_lotto',array(
            'type_id' => $type,
            'number' => $number,
            'user_id' => $user_id,
            'price' => $value
        ));
        return $this->db->insert_id();
    }
    public function del_limit_lotto($user_id, $type, $number){ // delete -> เลขอั้น limit 1;
        $this->db->limit(1)->delete('limit_lotto',array(
            'type_id'=>$type,
            'number'=>$number,
            'user_id'=>$user_id
        ));
    }
    public function set_user_data($user_id, $array_update){ // update -> ข้อมูล Account แบบ limit 1;
        $this->db->where('id', $user_id)
            ->limit(1)
            ->update('sys_user', $array_update); // $array_data = array('field'=>'value');
    }
    public function get_user_data($user_id, $str_select){ // select -> ข้อมูล Account แบบ limit 1;
        return $this->db->select($str_select)
            ->where('id',$user_id)
            ->limit(1)
            ->get('sys_user')->result();
    }
    public function get_where_user_data($str_select, $array_where){ // select -> ข้อมูล Account แบบมีเงื่อนไขตาม $str_select และ $array_where แบบ limit 1;
        return $this->db->select($str_select)
            ->where($array_where)
            ->limit(1)
            ->get('sys_user')->row_array();
    }
    public function load_where_user_data($str_select, $array_where){ // select -> ข้อมูล Account แบบมีเงื่อนไขตาม $str_select และ $array_where;
        return $this->db->select($str_select)
            ->where($array_where)
            ->get('sys_user')->result_array();
    }
    public function append_balance($user_id, $value){ // update(แบบเพิ่มค่า) -> ข้อมูล balance ของ user
        $this->db->set('balance', 'balance + '.$value, FALSE)
            ->where('id', $user_id)
            ->limit(1)
            ->update('sys_user');
    }
    public function update_percent($user_id, $value){ // update -> เปอร์เซ็นของ Account และ Customer ของ Account ที่ถือเปอร์เซ็นเกิน ค่าใหม่
        $this->db->where('id', $user_id)
            ->limit(1)
            ->update('sys_user',array(
                'percent' => $value
            ));
        $this->db->like('user_map', ','.$user_id.',')
            ->where('percent >',$value)
            ->update('sys_user',array(
                'percent' => $value
            ));
    }
    public function added_action($user_id, $action){
        $allow_action = array('add_link','edit','edit_st','edit_ch','edit_ch_st','add_movie','edit_mv','edit_mv_st');
        if(!array_search($action,$allow_action)){ return; }
        $this->db->insert('live_admin_action',array(
            'admin_id' => $user_id,
            'action_name' => $action,
            'datetime' => date('Y-m-d H:i:s')
        ));
        return $this->db->insert_id();
    }

}
