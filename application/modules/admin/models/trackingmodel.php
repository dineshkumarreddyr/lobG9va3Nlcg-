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
    
}