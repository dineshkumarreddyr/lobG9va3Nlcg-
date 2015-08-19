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

    public function get_designer($did = 0)
    {
        echo "string";
    }
}