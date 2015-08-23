<?php
class Usermodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function login($email = '',$pass = '')
    {
        $data = array();
        $query = $this->db->query("SELECT * FROM users WHERE user_email = '".$email."' AND user_password = '".$pass."'");
        if ($query->num_rows() > 0) {
            $data = $query->first_row();
        }
        return $data;
    }

    function get_designer($did = 0)
    {
        $data = array();
        $query = $this->db->query("SELECT * FROM users WHERE user_id = '".$did."' LIMT 10");
        if ($query->num_rows() > 0) {
            $data = $query->first_row();
        }
        return $data;        
    }

    function get_designer_views($did = 0) {
        $query = $this->db->query("SELECT f_id as followers FROM followers WHERE f_did = '".$did."'");
        return $query->num_rows();
    }

    function get_top_designers()
    {
        $data = array();
        $query = $this->db->query("SELECT user_fname, user_lname FROM users WHERE user_status = '1' AND user_role = 2");
        $data = $query->result();
        return $data;        
    }
}