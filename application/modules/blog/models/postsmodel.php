<?php
class Postsmodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_active_posts()
    {
        $query = $this->db->query("SELECT bp.post_id as id, bp.post_title as title, bp.post_content as content, bp.createdOn as postedOn, u.user_fname as postedBy FROM blog_posts bp, users u WHERE bp.post_by = u.user_id AND bp.post_status = '1'");
        $data = $query->result();
        return $data;
    }

    function get_post($post_id = 0)
    {
        $query = $this->db->query("SELECT bp.post_id as id, bp.post_title as title, bp.post_content as content, bp.createdOn as postedOn, u.user_fname as postedBy FROM blog_posts bp, users u WHERE bp.post_by = u.user_id AND bp.post_status = '1' AND bp.post_id =".intval($post_id));
        $data = $query->result();
        return $data;
    }
}