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
            $gender = $this->input->post('gender');
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
                $product_id = $this->product_model->add($storeid, $name, $desc, $category, $brand, $provider, $image, $url, $mrp, $price, $status, $gender);
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
            $gender = $this->input->post('gender');
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
                $product_id = $this->product_model->update($product_id, $storeid, $name, $desc, $category, $brand, $provider, $image, $url, $mrp, $price, $status, $gender);
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

    public function import() {
        $errr_msg = '';
        $msg = '';

        $brands = $this->brand_model->get_active_brands();
        $pcategories = $this->pcategory_model->get_active_pcategories();

        $f_brands = array();
        foreach ($brands as $key => $brand) {
            $f_brands[$brand->brand_name] = $brand->brand_id;
        }
        // print_r($f_brands);

        $f_cat = array();
        foreach ($pcategories as $key => $pcategory) {
            $f_cat[$pcategory->pc_name] = $pcategory->pc_id;
        }
        // print_r($f_cat);


        //Upload File
        if (isset($_POST['submit'])) {
            if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
                // echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
                // echo "<h2>Displaying contents:</h2>";
                // // readfile($_FILES['filename']['tmp_name']);
            }

            //Import uploaded file to Database
            $handle = fopen($_FILES['filename']['tmp_name'], "r");

            while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
                $storeId = $data[0];
                $name = addslashes($data[1]);
                $desc = addslashes($data[2]);
                $imgs = explode(';', $data[3]);
                $image = '';
                $oimage = '';
                foreach ($imgs as $key => $img) {
                    if(stripos($img, 'original')) {
                        $oimage = $img;
                        // break;
                    }
                    if(stripos($img, '180x240')) {
                        $image = $img;
                        // break;
                    }
                }
                $mrp = $data[4];
                $price = $data[5];
                $url = $data[6];
                
                $cats = explode('>', $data[7]);
                $cat = end($cats);
                if(array_key_exists($cat, $f_cat)) {
                    $category = $f_cat[$cat];
                }
                else {
                    $cat_id = $this->pcategory_model->add_pcategory('0', $cat, '', '1');
                    $f_cat[$cat] = $cat_id;
                    $category = $cat_id;
                }

                $brand = $data[8];
                if(array_key_exists($brand, $f_brands)) {
                    $brand = $f_brands[$brand];
                }
                else {
                    $brand_id = $this->brand_model->add_brand($brand, '', '1');
                    $f_brands[$brand] = $brand_id;
                    $brand = $brand_id;
                }

                $provider = $_POST['provider'];
                $gender = $_POST['gender'];


                $import="INSERT into products(p_storeId, p_name, p_desc, p_image, p_oimage, p_url, p_mrp, p_price, p_category, p_brand, p_provider, p_gender, p_status) values('$storeId', '$name', '$desc', '$image', '$oimage', '$url', '$mrp', '$price', '$category', '$brand', '$provider', '$gender', '1')";

                mysql_query($import) or die(mysql_error());
            }

            fclose($handle);

            $msg = "Import done";

            //view upload form
        }
        $data['providers'] = $this->provider_model->get_active_providers();
        $data['errr_msg'] = $errr_msg;
        $data['msg'] = $msg;


        $this->load->view('admin/header');
        $this->load->view('admin/product/import', $data);
        $this->load->view('admin/footer');
    }

}
 
/* End of file login.php */
/* Location: ./application/modules/admin/controllers/login.php */