<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Coupon extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('admin/couponmodel', 'coupon_model');
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
        $data['coupons'] = $this->coupon_model->get_coupons();
        $this->load->view('admin/header');
        $this->load->view('admin/coupon/list', $data);
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

    public function edit($brand_id = 0)
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
                
                if($this->brand_model->update_brand($brand_id, $name, $desc, $status)) {
                    $msg = 'Successfully Added';
                }
            }
        }
        $data['brand'] = $this->brand_model->get_brand($brand_id)[0];
        
        $data['errr_msg'] = $errr_msg;
        $data['msg'] = $msg;
        $this->load->view('admin/header');
        $this->load->view('admin/brand/edit', $data);
        $this->load->view('admin/footer');
    }

    public function remove($coupon_id)
    {
        if($coupon_id) {
            $this->coupon_model->remove($coupon_id);
            redirect(base_url('admin/coupon'), 'refresh');
        }
    }

    public function import() {
        $errr_msg = '';
        $msg = '';

        //Upload File
        if (isset($_POST['submit'])) {
            if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
                // echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
                // echo "<h2>Displaying contents:</h2>";
                // // readfile($_FILES['filename']['tmp_name']);
            }

            //Import uploaded file to Database
            $handle = fopen($_FILES['filename']['tmp_name'], "r");

            $provider = $_POST['provider'];

            $i = 0;
            if($provider == 'OMG') {
                while (($data = fgetcsv($handle, 99000, ",")) !== FALSE) {
                    if($i) {
                        // omg
                        $VoucherCodeId = $data[0];
                        $Code = $data[1];
                        $Title = addslashes(str_replace(array("<![CDATA[","]]>"),"",$data[2]));
                        $Description = addslashes(str_replace(array("<![CDATA[","]]>"),"",$data[3]));
                        $ActivationDate = date('Y-m-d H:i:s', strtotime($data[4]));
                        $ExpiryDate = date('Y-m-d H:i:s', strtotime($data[5]));
                        $TrackingUrl = $data[6];
                        $CategoryName = $data[7];
                        if($data[8] == 'Active') {
                            $Status = '1';
                        }
                        else {
                            $Status = '0';
                        }
                        
                        $Merchant = $data[10];
                        $Product = $data[11];
                        $Type = $data[12];
                        $Discount = $data[13];

                        try {
                            
                        $import="INSERT into coupons(`c_VoucherCodeId`, `c_code`, `c_title`, `c_description`, `c_activatioinDate`, `c_expiryDate`, `c_url`, `c_category`, `c_status`, `c_merchant`, `c_product`, `c_type`, `c_discount`, `c_provider`, `createdOn`) values('$VoucherCodeId', '$Code', '$Title', '$Description', '$ActivationDate', '$ExpiryDate', '$TrackingUrl', '$CategoryName', '$Status', '$Merchant', '$Product', '$Type', '$Discount', '$provider', now())";

                        mysql_query($import);

                        } catch (Exception $e) {
                            
                        }
                        $i++;
                    }
                    else {
                        $i++;
                    }
                     // or die(mysql_error());
                }
            }

            fclose($handle);

            $msg = $i." Coupons Imported";

            //view upload form
        }
        $data['errr_msg'] = $errr_msg;
        $data['msg'] = $msg;


        $this->load->view('admin/header');
        $this->load->view('admin/coupon/import', $data);
        $this->load->view('admin/footer');
    }

}
 
/* End of file login.php */
/* Location: ./application/modules/admin/controllers/login.php */