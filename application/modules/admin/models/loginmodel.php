<?php
class Loginmodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function login_check($email, $password)
    {
        $query = $this->db->get_where('users', array('user_email' => mysql_real_escape_string($email), 'user_password' => sha1(mysql_real_escape_string($password)), 'user_status' => '1'));
        
        $data = $query->row_array();
        $count = $query->num_rows();
        if($count>0)
            return $data;
        else
            return false;
    }
}