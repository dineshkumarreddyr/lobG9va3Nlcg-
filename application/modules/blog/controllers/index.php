<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Index extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
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

}
 
/* End of file index.php */
/* Location: ./application/modules/blog/controllers/index.php */