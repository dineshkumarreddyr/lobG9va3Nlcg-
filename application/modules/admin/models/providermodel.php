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
        $query = $this->db->query("SELECT * FROM providers");
        $data = $query->result();
        return $data;
    }

    function get_active_providers()
    {
        $query = $this->db->query("SELECT * FROM providers WHERE provider_status = '1'");
        $data = $query->result();
        return $data;
    }

    function add_provider($name = '', $image = '', $desc = '', $status = '0')
    {
        $data = array(
           'provider_name' => $name ,
           'provider_image' => $image ,
           'provider_desc' => $desc,
           'provider_status' => $status
        );
        $this->db->insert('providers', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
}