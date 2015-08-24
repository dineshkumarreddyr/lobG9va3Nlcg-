<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Lcategory extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('admin/lcategorymodel', 'lcategory_model');
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
        $data['lcategories'] = $this->lcategory_model->get_lcategories();
        
        $this->load->view('admin/header');
        $this->load->view('admin/lcategory/list', $data);
        $this->load->view('admin/footer');
    }

    public function add()
    {
        $errr_msg = '';
        $msg = '';

        if($this->input->post('submit')) {
            $parent = $this->input->post('parent');
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
                $lcategory_id = $this->lcategory_model->add_lcategory($parent, $name, $desc, $status);
                if($lcategory_id) {
                    $msg = 'Successfully Added';
                }
            }
        }

        $data['errr_msg'] = $errr_msg;
        $data['msg'] = $msg;
        $data['lcategories'] = $this->lcategory_model->parent_lcategories();
        $this->load->view('admin/header');
        $this->load->view('admin/lcategory/add', $data);
        $this->load->view('admin/footer');
    }

    public function edit($lc_id = 0)
    {
        $errr_msg = '';
        $msg = '';

        if($this->input->post('submit')) {
            $parent = $this->input->post('parent');
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
                if($this->lcategory_model->update_lcategory($lc_id, $parent, $name, $desc, $status)) {
                    $msg = 'Successfully Updated';
                }
            }
        }

        $data['lcategory'] = $this->lcategory_model->get_lcategory($lc_id)[0];
        $data['lcategories'] = $this->lcategory_model->parent_lcategories();
        
        $data['errr_msg'] = $errr_msg;
        $data['msg'] = $msg;
        $this->load->view('admin/header');
        $this->load->view('admin/lcategory/edit', $data);
        $this->load->view('admin/footer');
    }

    public function remove($lc_id)
    {
        if($lc_id) {
            $this->lcategory_model->remove($lc_id);
            redirect(base_url('admin/lcategory'), 'refresh');
        }
    }

}
 
/* End of file login.php */
/* Location: ./application/modules/admin/controllers/login.php */