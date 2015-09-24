<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pcategory extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('admin/pcategorymodel', 'pcategory_model');
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
        $data['pcategories'] = $this->pcategory_model->get_pcategories();
        
        $this->load->view('admin/header');
        $this->load->view('admin/pcategory/list', $data);
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
                $brand_id = $this->pcategory_model->add_pcategory($parent, $name, $desc, $status);
                if($brand_id) {
                    $msg = 'Successfully Added';
                }
            }
        }

        $data['errr_msg'] = $errr_msg;
        $data['msg'] = $msg;
        // $data['pcategories'] = $this->pcategory_model->parent_pcategories();
        if(isset($_GET['gender']) && !empty($_GET['gender'])) {
            $gender = stripslashes(strip_tags($_GET['gender']));
        }
        else {
            $gender = '';
        }
        $cat_tree = $this->tree_category($gender);
        $data['cat_list'] = $cat_tree['total_cat'];
        $data['cat_tree'] = $cat_tree['cat_tree'];

        $this->load->view('admin/header');
        $this->load->view('admin/pcategory/add', $data);
        $this->load->view('admin/footer');
    }

    public function edit($pc_id = 0)
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
                if($this->pcategory_model->update_pcategory($pc_id, $parent, $name, $desc, $status)) {
                    $msg = 'Successfully Updated';
                }
            }
        }

        $data['pcategory'] = $this->pcategory_model->get_pcategory($pc_id)[0];
        // $data['pcategories'] = $this->pcategory_model->parent_pcategories();
        if(isset($_GET['gender']) && !empty($_GET['gender'])) {
            $gender = stripslashes(strip_tags($_GET['gender']));
        }
        else {
            $gender = '';
        }
        $cat_tree = $this->tree_category($gender);
        $data['cat_list'] = $cat_tree['total_cat'];
        $data['cat_tree'] = $cat_tree['cat_tree'];
        
        $data['errr_msg'] = $errr_msg;
        $data['msg'] = $msg;
        $this->load->view('admin/header');
        $this->load->view('admin/pcategory/edit', $data);
        $this->load->view('admin/footer');
    }

    public function remove($pc_id)
    {
        if($pc_id) {
            $this->pcategory_model->remove($pc_id);
            redirect(base_url('admin/pcategory'), 'refresh');
        }
    }

    public function tree_category($gender = '') {
        $all_cat = $this->pcategory_model->get_cat_list($gender);

        $total_cat = array();
        $total_pcat = array();
        $final = array();

        foreach ($all_cat as $key => $cat) {
            $total_cat[$cat->pc_id] = $cat->pc_name;
            $total_pcat[$cat->pc_id] = $cat->pc_pid;
        }
        // echo '<pre>';
        // print_r($total_cat);
        // print_r($total_pcat);
        // print_r(array_keys($total_pcat, '0'));
        $total_pcat_uq = array_unique($total_pcat);

        foreach ($total_pcat_uq as $key => $pcat_uq) {
            // echo $pcat_uq;
            // print_r(array_keys($total_pcat, $pcat_uq));
            $final[$pcat_uq] = array_keys($total_pcat, $pcat_uq);
        }
        // print_r($final);

        foreach ($all_cat as $key => $cat) {
            $total_cat[$cat->pc_id] = $cat->pc_name;
        }
        // echo '</pre>';

        $output_cat = array(
            'total_cat' => $total_cat,
            'cat_tree' => $final
            );

        return $output_cat;

    }

}
 
/* End of file login.php */
/* Location: ./application/modules/admin/controllers/login.php */