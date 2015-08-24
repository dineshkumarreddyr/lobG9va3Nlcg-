<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Product extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('admin/productmodel', 'product_model');
        $this->load->model('admin/brandmodel', 'brand_model');
        $this->load->model('admin/pcategorymodel', 'pcategory_model');
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
        $data['products'] = $this->product_model->get_products();
        
        $this->load->view('admin/header');
        $this->load->view('admin/product/list', $data);
        $this->load->view('admin/footer');
    }

    public function add()
    {
        $errr_msg = '';
        $msg = '';

        if($this->input->post('submit')) {
            $storeid = $this->input->post('storeid');
            $name = $this->input->post('name');
            $desc = $this->input->post('desc');
            $category = $this->input->post('category');
            $brand = $this->input->post('brand');
            $provider = $this->input->post('provider');
            $image = $this->input->post('image');
            $url = $this->input->post('url');
            $mrp = $this->input->post('mrp');
            $price = $this->input->post('price');
            $status = $this->input->post('status');
            if(empty($storeid)) {
                $this->errr_msg = '';
            }
            elseif (empty($name)) {
                $errr_msg = '';
            }
            elseif (empty($desc)) {
                $errr_msg = '';
            }
            elseif (empty($category)) {
                $errr_msg = '';
            }
            elseif (empty($brand)) {
                $errr_msg = '';
            }
            elseif (empty($provider)) {
                $errr_msg = '';
            }
            elseif (empty($image)) {
                $errr_msg = '';
            }
            elseif (empty($url)) {
                $errr_msg = '';
            }
            elseif (empty($mrp)) {
                $errr_msg = '';
            }
            elseif (empty($price)) {
                $errr_msg = '';
            }
            elseif (empty($status)) {
                $errr_msg = '';
            }

            if(empty($errr_msg)) {
                $product_id = $this->product_model->add($storeid, $name, $desc, $category, $brand, $provider, $image, $url, $mrp, $price, $status);
                if($product_id) {
                    $msg = 'Successfully Added';
                }
            }
        }

        $data['errr_msg'] = $errr_msg;
        $data['msg'] = $msg;
        $data['brands'] = $this->brand_model->get_active_brands();
        $data['pcategories'] = $this->pcategory_model->get_active_pcategories();
        $data['providers'] = $this->provider_model->get_active_providers();
        $this->load->view('admin/header');
        $this->load->view('admin/product/add', $data);
        $this->load->view('admin/footer');
    }

    public function edit($product_id = 0)
    {
        $errr_msg = '';
        $msg = '';

        if($this->input->post('submit')) {
            $storeid = $this->input->post('storeid');
            $name = $this->input->post('name');
            $desc = $this->input->post('desc');
            $category = $this->input->post('category');
            $brand = $this->input->post('brand');
            $provider = $this->input->post('provider');
            $image = $this->input->post('image');
            $url = $this->input->post('url');
            $mrp = $this->input->post('mrp');
            $price = $this->input->post('price');
            $status = $this->input->post('status');
            if(empty($storeid)) {
                $this->errr_msg = '';
            }
            elseif (empty($name)) {
                $errr_msg = '';
            }
            elseif (empty($desc)) {
                $errr_msg = '';
            }
            elseif (empty($category)) {
                $errr_msg = '';
            }
            elseif (empty($brand)) {
                $errr_msg = '';
            }
            elseif (empty($provider)) {
                $errr_msg = '';
            }
            elseif (empty($image)) {
                $errr_msg = '';
            }
            elseif (empty($url)) {
                $errr_msg = '';
            }
            elseif (empty($mrp)) {
                $errr_msg = '';
            }
            elseif (empty($price)) {
                $errr_msg = '';
            }
            elseif (empty($status)) {
                $errr_msg = '';
            }

            if(empty($errr_msg)) {
                $product_id = $this->product_model->update($product_id, $storeid, $name, $desc, $category, $brand, $provider, $image, $url, $mrp, $price, $status);
                if($product_id) {
                    $msg = 'Successfully Updated';
                }
            }
        }

        $data['errr_msg'] = $errr_msg;
        $data['msg'] = $msg;
        $data['product'] = $this->product_model->get_product($product_id)[0];

        $data['brands'] = $this->brand_model->get_active_brands();
        $data['pcategories'] = $this->pcategory_model->get_active_pcategories();
        $data['providers'] = $this->provider_model->get_active_providers();
        $this->load->view('admin/header');
        $this->load->view('admin/product/edit', $data);
        $this->load->view('admin/footer');
    }

    public function remove($product_id)
    {
        if($product_id) {
            $this->product_model->remove($product_id);
            redirect(base_url('admin/product'), 'refresh');
        }
    }

}
 
/* End of file login.php */
/* Location: ./application/modules/admin/controllers/login.php */