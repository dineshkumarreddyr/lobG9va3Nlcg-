<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Home extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        // $this->load->model('admin/homemodel', 'home_model');
        $this->login_check();
    }

    public function login_check() {
        $uid = $this->session->userdata('uid');
        if(!isset($uid) || empty($uid)) {
            redirect("admin/login");
        }
    }
 
    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }

}
 
/* End of file login.php */
/* Location: ./application/modules/admin/controllers/login.php */