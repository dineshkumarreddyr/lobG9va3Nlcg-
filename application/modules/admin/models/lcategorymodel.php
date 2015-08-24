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

    function parent_lcategories()
    {
        $query = $this->db->query("SELECT * FROM l_categories WHERE lc_pid = 0");
        $data = $query->result();
        return $data;
    }

    function get_lcategory($lc_id = 0)
    {
        $query = $this->db->query("SELECT * FROM l_categories WHERE lc_id = ".intval($lc_id));
        $data = $query->result();
        return $data;
    }

    function get_active_lcategories()
    {
        $query = $this->db->query("SELECT * FROM l_categories WHERE lc_status = '1'");
        $data = $query->result();
        return $data;
    }

    function add_lcategory($parent = 0, $name = '', $desc = '', $status = '0')
    {
        $data = array(
           'lc_pid' => $parent ,
           'lc_name' => $name ,
           'lc_desc' => $desc,
           'lc_status' => $status
        );
        $this->db->insert('l_categories', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update_lcategory($lc_id = 0, $parent = 0, $name = '', $desc = '', $status = '0')
    {
        $data = array(
           'lc_pid' => $parent,
           'lc_name' => $name ,
           'lc_desc' => $desc,
           'lc_status' => $status
        );
        $this->db->where('lc_id', $lc_id);
        $updated_id = $this->db->update('l_categories', $data);
        return $updated_id;
    }

    function remove($lc_id = 0)
    {
        $this->db->delete('l_categories', array('lc_id' => $lc_id)); 
    }
}