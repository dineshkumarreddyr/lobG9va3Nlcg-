<?php
class Blogmodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_blogs()
    {
        $query = $this->db->query("SELECT * FROM blog_posts");
        $data = $query->result();
        return $data;
    }

    function get_blog($post_id = 0)
    {
        $query = $this->db->get_where('blog_posts', array('post_id' => $post_id));
        $data = $query->result();
        return $data;
    }

    // function get_active_blogs()
    // {
    //     $query = $this->db->query("SELECT * FROM blogs WHERE blog_status = '1'");
    //     $data = $query->result();
    //     return $data;
    // }

    function add_blog($name = '', $desc = '', $status = '0')
    {
        $data = array(
           'post_title' => $name ,
           'post_content' => $desc,
           'post_status' => $status
        );
        $this->db->insert('blog_posts', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update_blog($post_id = 0, $name = '', $desc = '', $status = '0')
    {
        $data = array(
           'post_title' => $name ,
           'post_content' => $desc,
           'post_status' => $status
        );
        $this->db->where('post_id', $post_id);
        $updated_id = $this->db->update('blog_posts', $data);
        return $updated_id;
    }

    function remove($blog_id = 0)
    {
        $this->db->delete('blog_posts', array('post_id' => $blog_id)); 
    }
}