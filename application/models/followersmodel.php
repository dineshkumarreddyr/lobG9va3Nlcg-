<?php
class Followersmodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_followers_count($did = 0)
    {
        $query = $this->db->query("SELECT f_id as followers FROM followers WHERE f_did = '".$did."'");
        return $query->num_rows();
    }

}