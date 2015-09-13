<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Blog extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('admin/blogmodel', 'blog_model');
        $this->login_check();
    }

    public function login_check() {
        $uid = $this->session->userdata('uid');
        $role = $this->session->userdata('role');
        if(!isset($uid) || empty($uid) || $role != 1) {
            redirect("admin/login");
        }
    }
 
    public function index()
    {
        $data['posts'] = $this->blog_model->get_blogs();
        $this->load->view('admin/header');
        $this->load->view('admin/blog/list', $data);
        $this->load->view('admin/footer');
    }

    public function add()
    {
        $err_msg = '';
        $msg = '';

        if($this->input->post('submit')) {
            $name = $this->input->post('name');
            $desc = $this->input->post('desc');
            $status = $this->input->post('status');
            if(empty($name)) {
                $err_msg = 'Name should not be empty..';
            }
            elseif (empty($desc)) {
                $err_msg = 'Description should not be empty..';
            }
            elseif (empty($status)) {
                $err_msg = '';
            }

            if(empty($err_msg)) {
                $blog_id = $this->blog_model->add_blog($name, $desc, $status);
                if($blog_id) {
                    $msg = 'Successfully Added';
                }
            }
        }

        $data['err_msg'] = $err_msg;
        $data['msg'] = $msg;
        $this->load->view('admin/header');
        $this->load->view('admin/blog/add', $data);
        $this->load->view('admin/footer');
    }

    public function edit($blog_id = 0)
    {
        $err_msg = '';
        $msg = '';

        if($this->input->post('submit')) {
            $name = $this->input->post('name');
            $desc = $this->input->post('desc');
            $status = $this->input->post('status');
            if(empty($name)) {
                $this->err_msg = '';
            }
            elseif (empty($desc)) {
                $err_msg = '';
            }
            elseif (empty($status)) {
                $err_msg = '';
            }

            if(empty($err_msg)) {
                
                if($this->blog_model->update_blog($blog_id, $name, $desc, $status)) {
                    $msg = 'Successfully Added';
                }
            }
        }
        $data['post'] = $this->blog_model->get_blog($blog_id)[0];
        
        $data['err_msg'] = $err_msg;
        $data['msg'] = $msg;
        $this->load->view('admin/header');
        $this->load->view('admin/blog/edit', $data);
        $this->load->view('admin/footer');
    }

    public function remove($blog_id)
    {
        if($blog_id) {
            $this->blog_model->remove($blog_id);
            redirect(base_url('admin/blog'), 'refresh');
        }
    }

}
 
/* End of file login.php */
/* Location: ./application/modules/admin/controllers/login.php */