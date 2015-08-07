<?php
class Pcategorymodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_pcategories()
    {
        $query = $this->db->query("SELECT * FROM p_categories");
        $data = $query->result();
        return $data;
    }
}