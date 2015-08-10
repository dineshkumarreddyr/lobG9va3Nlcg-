<?php
class Lcategorymodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_lcategories()
    {
        $query = $this->db->query("SELECT * FROM l_categories");
        $data = $query->result();
        return $data;
    }
}