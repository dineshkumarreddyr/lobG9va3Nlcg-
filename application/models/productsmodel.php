<?php
class Productsmodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_products()
    {
        $query = $this->db->query("SELECT * FROM products LIMIT 0,20");        
        $data = $query->result();
        return $data;
    }
}