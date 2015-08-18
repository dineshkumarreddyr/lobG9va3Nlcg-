<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class User extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('admin/usermodel', 'user_model');
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
        $data['users'] = $this->user_model->get_users();
        $this->load->view('admin/header');
        $this->load->view('admin/user/list', $data);
        $this->load->view('admin/footer');
    }

    /*
    * designers list
    */
    public function designers()
    {
        $data['designers'] = $this->user_model->get_designers();
        $this->load->view('admin/header');
        $this->load->view('admin/user/designers_list', $data);
        $this->load->view('admin/footer');
    }

}
 
/* End of file login.php */
/* Location: ./application/modules/admin/controllers/login.php */