<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Provider extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('admin/providermodel', 'provider_model');
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
        $data['providers'] = $this->provider_model->get_providers();
        
        $this->load->view('admin/header');
        $this->load->view('admin/provider/list', $data);
        $this->load->view('admin/footer');
    }

    public function add()
    {
        $errr_msg = '';
        $msg = '';

        if($this->input->post('submit')) {
            $name = $this->input->post('name');
            $image = $this->input->post('image');
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
                $brand_id = $this->provider_model->add_provider($name, $image, $desc, $status);
                if($brand_id) {
                    $msg = 'Successfully Added';
                }
            }
        }

        $data['errr_msg'] = $errr_msg;
        $data['msg'] = $msg;
        $this->load->view('admin/header');
        $this->load->view('admin/provider/add', $data);
        $this->load->view('admin/footer');
    }

    public function edit($provider_id = 0)
    {
        $errr_msg = '';
        $msg = '';

        if($this->input->post('submit')) {
            $name = $this->input->post('name');
            $image = $this->input->post('image');
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
                if($this->provider_model->update_provider($provider_id, $name, $image, $desc, $status)) {
                    $msg = 'Successfully Updated';
                }
            }
        }

        $data['provider'] = $this->provider_model->get_provider($provider_id)[0];

        $data['errr_msg'] = $errr_msg;
        $data['msg'] = $msg;
        $this->load->view('admin/header');
        $this->load->view('admin/provider/edit', $data);
        $this->load->view('admin/footer');
    }

    public function remove($provider_id)
    {
        if($provider_id) {
            $this->provider_model->remove($provider_id);
            redirect(base_url('admin/provider'), 'refresh');
        }
    }

}

/* End of file login.php */
/* Location: ./application/modules/admin/controllers/login.php */