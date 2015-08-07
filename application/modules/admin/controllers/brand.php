<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Brand extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('admin/brandmodel', 'brand_model');
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
        $data['brands'] = $this->brand_model->get_brands();
        
        $this->load->view('admin/header');
        $this->load->view('admin/brand/list', $data);
        $this->load->view('admin/footer');
    }

    public function add()
    {
        $errr_msg = '';
        $msg = '';

        if($this->input->post('submit')) {
            $name = $this->input->post('name');
            $desc = $this->input->post('desc');
            $status = $this->input->post('status');
            if(empty($name)) {
                $this->errr_msg = '';
            }
            elseif (empty($desc)) {
                $errr_msg = '';
            }
            elseif (empty($status)) {
                $errr_msg = '';
            }

            if(empty($errr_msg)) {
                $brand_id = $this->brand_model->add_brand($name, $desc, $status);
                if($brand_id) {
                    $msg = 'Successfully Added';
                }
            }
        }

        $data['errr_msg'] = $errr_msg;
        $data['msg'] = $msg;
        $this->load->view('admin/header');
        $this->load->view('admin/brand/add', $data);
        $this->load->view('admin/footer');
    }

}
 
/* End of file login.php */
/* Location: ./application/modules/admin/controllers/login.php */