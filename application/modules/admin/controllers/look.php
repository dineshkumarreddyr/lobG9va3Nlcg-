<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Look extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('admin/lookmodel', 'look_model');
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
    	$data['looks'] = $this->look_model->get_looks();
        
        $this->load->view('admin/header');
        $this->load->view('admin/look/list', $data);
        $this->load->view('admin/footer');
    }

    public function edit($look_id = 0)
    {
        $errr_msg = '';
        $msg = '';

        if($this->input->post('submit')) {
            $name = $this->input->post('name');
            $category = $this->input->post('category');
            $status = $this->input->post('status');
            if(empty($name)) {
                $this->errr_msg = '';
            }
            elseif (empty($category)) {
                $errr_msg = '';
            }
            elseif (empty($status)) {
                $errr_msg = '';
            }

            if(empty($errr_msg)) {
                if($this->look_model->update($look_id, $name, $category, $status)) {
                    $msg = 'Successfully Updated';
                }
            }
        }

        $data['look'] = $this->look_model->get_look($look_id)[0];
        $data['lcategories'] = $this->lcategory_model->parent_lcategories();
        
        $data['errr_msg'] = $errr_msg;
        $data['msg'] = $msg;
        $this->load->view('admin/header');
        $this->load->view('admin/look/edit', $data);
        $this->load->view('admin/footer');
    }

    public function remove($look_id)
    {
        if($look_id) {
            $this->look_model->remove($look_id);
            redirect(base_url('admin/look'), 'refresh');
        }
    }

}
 
/* End of file login.php */
/* Location: ./application/modules/admin/controllers/login.php */