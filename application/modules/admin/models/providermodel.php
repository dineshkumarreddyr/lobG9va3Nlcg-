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

    function get_providers_count() {
        $query = $this->db->query("SELECT * FROM providers");
        return $query->num_rows();
    }

    function get_provider($provider_id = 0)
    {
        $query = $this->db->query("SELECT * FROM providers WHERE provider_id = ".intval($provider_id));
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

    function update_provider($provider_id =0, $name = '', $image = '', $desc = '', $status = '0')
    {
        $data = array(
           'provider_name' => $name ,
           'provider_image' => $image ,
           'provider_desc' => $desc,
           'provider_status' => $status
        );
        $this->db->where('provider_id', $provider_id);
        $updated_id = $this->db->update('providers', $data);
        return $updated_id;
    }

    function remove($provider_id)
    {
        $this->db->delete('providers', array('provider_id' => $provider_id)); 
    }
}