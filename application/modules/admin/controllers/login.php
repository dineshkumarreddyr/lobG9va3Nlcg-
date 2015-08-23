<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('admin/loginmodel', 'login_model');
    }
 
    public function index()
    {
        $uid = $this->session->userdata('uid');
        $role = $this->session->userdata('role');
        if(isset($uid) && !empty($uid) && $role == 1) {
            redirect("admin/home");
        }
        if($this->input->post('submit')) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $data = $this->login_model->login_check($email, $password);

            if($data) {
                $this->session->set_userdata('uid', $data["user_id"]);
                $this->session->set_userdata('name', $data["user_fname"]);
                $this->session->set_userdata('email', $data["user_email"]);
                $this->session->set_userdata('role', $data["user_role"]);

                redirect("admin/home");
            }
        }
        $this->load->view('admin/login');
    }

    public function logout()
    {
        $this->session->unset_userdata('uid');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');

        redirect("admin/login");
    }

}
 
/* End of file login.php */
/* Location: ./application/modules/admin/controllers/login.php */