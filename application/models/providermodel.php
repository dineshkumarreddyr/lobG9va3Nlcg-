<?php
class Providermodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_providers()
    {
        $this->db->cache_on();
        $query = $this->db->query("SELECT * FROM providers WHERE provider_status = '1'");
        $data = $query->result();
        return $data;
    }
}