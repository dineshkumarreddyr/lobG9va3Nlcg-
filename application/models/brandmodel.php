<?php
class Brandmodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_brands()
    {
        $query = $this->db->query("SELECT * FROM brands WHERE brand_status = '1'");
        $data = $query->result();
        return $data;
    }
}