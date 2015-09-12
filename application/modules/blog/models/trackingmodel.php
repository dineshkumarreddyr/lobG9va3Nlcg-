<?php
class Trackingmodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function track_post($post_id = 0)
    {
        if($this->check_track_post($post_id)) {
            $this->db->query("UPDATE b_views SET `bv_count`=(`bv_count`+1) WHERE `bv_postId` = '".$post_id."'"); 
        }
        else {
            $data = array(
                'bv_postId' => $post_id,
                'bv_status' => '1',
                'bv_source' => $this->agent->referrer(),
                'createdOn' => date('Y-m-d H:i:s'),
                'bv_ip' => $this->input->ip_address()
            );
            $this->db->insert('b_views', $data);
        }
    }

    function check_track_post($post_id = 0)
    {
        $data = array(
            'bv_postId' => $post_id,
            'bv_ip' => $this->input->ip_address()
        );
        $query = $this->db->get_where('b_views', $data);
        return $query->num_rows(); 
    }
    
}