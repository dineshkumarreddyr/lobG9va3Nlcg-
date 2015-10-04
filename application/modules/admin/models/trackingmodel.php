<?php
class Trackingmodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_track_product_count()
    {
        $query = $this->db->get('p_views');
        return $query->num_rows(); 
    }

    function get_track_look_count()
    {
        $query = $this->db->get('l_views');
        return $query->num_rows(); 
    }

    function get_categories_count() {
        $query = $this->db->query("SELECT l.l_category as id, lc.lc_name as name, count(l.l_category) as count FROM looks l, l_categories lc, l_views lv WHERE l.l_id = lv.lv_lookId AND l.l_category = lc.lc_id GROUP BY l.l_category");
        return $query->result();
    }
    
}