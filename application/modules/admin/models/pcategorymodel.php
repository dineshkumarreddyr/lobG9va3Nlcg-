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
    function get_categories_count() {
        $query = $this->db->query("SELECT * FROM p_categories");
        return $query->num_rows();
    }

    function parent_pcategories()
    {
        $query = $this->db->query("SELECT * FROM p_categories WHERE pc_pid = 0");
        $data = $query->result();
        return $data;
    }

    function get_pcategory($pc_id = 0)
    {
        $query = $this->db->query("SELECT * FROM p_categories WHERE pc_id = ".intval($pc_id));
        $data = $query->result();
        return $data;
    }

    function get_active_pcategories()
    {
        $query = $this->db->query("SELECT * FROM p_categories WHERE pc_status = '1'");
        $data = $query->result();
        return $data;
    }

    function add_pcategory($parent = 0, $name = '', $desc = '', $status = '0')
    {
        $data = array(
           'pc_pid' => $parent ,
           'pc_name' => $name ,
           'pc_desc' => $desc,
           'pc_status' => $status
        );
        $this->db->insert('p_categories', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update_pcategory($pc_id = 0, $parent = 0, $name = '', $desc = '', $status = '0')
    {
        $data = array(
           'pc_pid' => $parent,
           'pc_name' => $name ,
           'pc_desc' => $desc,
           'pc_status' => $status
        );
        $this->db->where('pc_id', $pc_id);
        $updated_id = $this->db->update('p_categories', $data);
        return $updated_id;
    }

    function remove($pc_id = 0)
    {
        $this->db->delete('p_categories', array('pc_id' => $pc_id)); 
    }

    function get_cat_list($gender = '') {
        if($gender == '') {
            $query = $this->db->query("SELECT DISTINCT(pc_id) as pc_id, pc_pid, pc_name FROM p_categories");
        }
        else {
            $query = $this->db->query("SELECT DISTINCT(pc.pc_id) as pc_id, pc.pc_pid, pc.pc_name FROM p_categories pc, products p WHERE p.p_category = pc.pc_id AND p.p_status = '1' AND p.p_gender = '".$gender."'");
        }
        $data = $query->result();
        return $data;
    }
}