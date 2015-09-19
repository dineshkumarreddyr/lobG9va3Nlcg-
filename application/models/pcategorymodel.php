<?php
class Pcategorymodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_pcategories($pid = 0, $gender = '')
    {
    	if($gender == '') {
        $query = $this->db->query("SELECT * FROM p_categories WHERE pc_pid = ".$pid);
        }
        else {
        $query = $this->db->query("SELECT DISTINCT(pc.pc_id) as pc_id, pc.* FROM p_categories pc, products p WHERE p.p_category = pc.pc_id AND p.p_status = '1' AND p.p_gender = '".$gender."' AND  pc.pc_pid = ".$pid);
        }
        $data = $query->result();
        return $data;
    }
}