<?php
class Lookmodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_looks()
    {
        $query = $this->db->query("SELECT l.l_id, l.l_name, l.l_status, lc.lc_name FROM looks l, l_categories lc WHERE l.l_category = lc.lc_id");
        $data = $query->result();
        return $data;
    }

    function get_looks_count()
    {
        $query = $this->db->query("SELECT l.l_id, l.l_name, l.l_status, lc.lc_name FROM looks l, l_categories lc WHERE l.l_category = lc.lc_id");
        $data = $query->num_rows();
        return $data;
    }

    function get_look($look_id = 0)
    {
        $query = $this->db->query("SELECT l.* FROM looks l WHERE l.l_id = ".intval($look_id));
        $data = $query->result();
        return $data;
    }

    function update($look_id = 0, $name = '', $category = '0', $status = '0')
    {
        $data = array(
            'l_name' => $name,
            'l_category' => $category ,
            'l_status' => $status
            );
        $this->db->where('l_id', $look_id);
        $look_id = $this->db->update('looks', $data);
        return $look_id;
    }

    function remove($look_id)
    {
        $this->db->delete('looks', array('l_id' => $look_id)); 
    }
}