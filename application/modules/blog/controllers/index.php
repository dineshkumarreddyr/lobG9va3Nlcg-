<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Index extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('blog/postsmodel', 'posts_model');
    }
 
    public function index()
    {
        $data['posts'] = $this->posts_model->get_active_posts();

        $seo = array(
            'title' => 'Blog',
            'description' => 'Blog',
            'keywords' => 'Blog'
        );
        $data['seo'] = $seo;


        $this->load->view('header', $data);
        $this->load->view('blog/index', $data);        
        $this->load->view('footer', $data);
    }

    public function view($post_id = 0)
    {
        $data['post'] = $this->posts_model->get_post($post_id)[0];

        $seo = array(
            'title' => $data['post']->title .' - by ' . $data['post']->postedBy,
            'description' => substr(strip_tags($data['post']->content), 0, 200) ,
            'keywords' => $data['post']->title .' - by ' . $data['post']->postedBy
        );
        $data['seo'] = $seo;


        $this->load->view('header', $data);
        $this->load->view('blog/view', $data);        
        $this->load->view('footer', $data);
    }

    public function add()
    {
        $uid = $this->session->userdata('uid');
        $role = $this->session->userdata('role');
        if($role != 2) {
            show_404(); // Redundant, I know, just added for this example
        }

        $errr_msg = '';
        $msg = '';

        if($this->input->post('submit')) {
            $title = $this->input->post('title');
            $content = $this->input->post('content');
            $courtesy = $this->input->post('courtesy');
            // $status = $this->input->post('status');
            $status = '0';
            if(empty($title)) {
                $errr_msg = 'Title is required';
            }
            elseif (empty($content)) {
                $errr_msg = 'Content is required';
            }
            elseif (empty($status)) {
                $errr_msg = '';
            }

            if(empty($errr_msg)) {
                $post_id = $this->posts_model->add_post($title, $content, $courtesy, $status, $uid);
                if($post_id) {
                    $msg = 'Successfully Added, administrator will review it and publish it.';
                }
            }
        }

        $data['err_msg'] = $errr_msg;
        $data['msg'] = $msg;

        $seo = array(
            'title' => 'Add blog post',
            'description' => 'Add blog post',
            'keywords' => 'Add blog post'
        );
        $data['seo'] = $seo;


        $this->load->view('header', $data);
        $this->load->view('blog/add', $data);        
        $this->load->view('footer', $data);
    }

    public function edit($post_id = 0)
    {
        $uid = $this->session->userdata('uid');
        $role = $this->session->userdata('role');
        if($role != 2) {
            show_404(); // Redundant, I know, just added for this example
        }

        $err_msg = '';
        $msg = '';

        if($this->input->post('submit')) {
            $title = $this->input->post('title');
            $content = $this->input->post('content');
            $courtesy = $this->input->post('courtesy');
            if(empty($title)) {
                $err_msg = 'Title is required';
            }
            elseif (empty($content)) {
                $err_msg = 'Content is required';
            }

            if(empty($err_msg)) {
                $insert_id = $this->posts_model->update_post($post_id, $title, $content, $courtesy);
                if($insert_id) {
                    $msg = 'Successfully Updated.';
                }
            }
        }

        $data['err_msg'] = $err_msg;
        $data['msg'] = $msg;

        $data['post'] = $this->posts_model->get_own_post($uid, $post_id)[0];

        $seo = array(
            'title' => 'Edit blog post',
            'description' => 'Edit blog post',
            'keywords' => 'Edit blog post'
        );
        $data['seo'] = $seo;


        $this->load->view('header', $data);
        $this->load->view('blog/edit', $data);        
        $this->load->view('footer', $data);
    }
}
 
/* End of file index.php */
/* Location: ./application/modules/blog/controllers/index.php */