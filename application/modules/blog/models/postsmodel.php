<?php
class Postsmodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Get active blog posts details
     */
    function get_active_posts()
    {
        $query = $this->db->query("SELECT 
            bp.post_id as id,
            bp.post_title as title,
            bp.post_content as content,
            bp.post_courtesy as courtesy,
            bp.createdOn as postedOn,
            u.user_fname as postedBy,
            u.user_id as uid,
            SUM(bv.bv_count) as total_views
        FROM blog_posts bp 
        LEFT JOIN b_views bv ON bp.post_id = bv.bv_postId AND bp.post_status = '1'
        LEFT JOIN users u ON bp.post_by = u.user_id
        GROUP BY bp.post_id");
        $data = $query->result();
        return $data;
    }

    /**
     * Get blog post details by post id
     */
    function get_post($post_id = 0)
    {
        $query = $this->db->query("SELECT bp.post_id as id, bp.post_title as title, bp.post_content as content, bp.post_courtesy as courtesy, bp.post_by as post_by, bp.createdOn as postedOn, u.user_fname as postedBy, u.user_id as uid FROM blog_posts bp, users u WHERE bp.post_by = u.user_id AND bp.post_status = '1' AND bp.post_id =".intval($post_id));
        $data = $query->result();
        return $data;
    }

    /**
     * Get blog post details by post by and post id
     */
    function get_own_post($uid = 0, $post_id = 0)
    {
        $query = $this->db->query("SELECT bp.post_id as id, bp.post_title as title, bp.post_content as content, bp.post_courtesy as courtesy, bp.createdOn as postedOn, u.user_fname as postedBy FROM blog_posts bp, users u WHERE bp.post_by = u.user_id AND bp.post_by = '".$uid."' AND bp.post_id =".intval($post_id));
        $data = $query->result();
        return $data;
    }

    /**
     * Get blog posts details by post by and post id
     */
    function get_own_posts($uid = 0)
    {
        $query = $this->db->query("SELECT bp.post_id as id, bp.post_title as title, bp.post_content as content, bp.post_courtesy as courtesy, bp.createdOn as postedOn, u.user_fname as postedBy FROM blog_posts bp, users u WHERE bp.post_by = u.user_id AND bp.post_status = '1' AND bp.post_by = '".$uid."'");
        $data = $query->result();
        return $data;
    }

    /**
     * Add blog post by post by and return post id
     */
    function add_post($title = '', $content = '', $courtesy = '', $status = '0', $post_by = '0')
    {
        $data = array(
           'post_title' => addslashes($title),
           'post_content' => addslashes($content),
           'post_courtesy' => addslashes($courtesy),
           'post_status' => $status,
           'post_by' => $post_by
        );
        $this->db->insert('blog_posts', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    /**
     * Update blog post by post by and post id
     */
    function update_post($id = 0, $title = '', $content = '', $courtesy = '')
    {
        $data = array(
           'post_title' => addslashes($title),
           'post_content' => addslashes($content),
           'post_courtesy' => addslashes($courtesy)
        );
        $this->db->where('post_id', $id);
        $this->db->update('blog_posts', $data);
        return true;
    }
}