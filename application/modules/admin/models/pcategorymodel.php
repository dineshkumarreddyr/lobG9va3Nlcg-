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

    function get_active_pcategories()
    {
        $query = $this->db->query("SELECT * FROM p_categories WHERE pc_status = '1'");
        $data = $query->result();
        return $data;
    }

    function add_pcategory($name = '', $desc = '', $status = '0')
    {
        $data = array(
           'pc_name' => $name ,
           'pc_desc' => $desc,
           'pc_status' => $status
        );
        $this->db->insert('p_categories', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
}