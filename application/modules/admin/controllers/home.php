<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Home extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('admin/productmodel', 'product_model');
        $this->load->model('admin/brandmodel', 'brand_model');
        $this->load->model('admin/pcategorymodel', 'pcategory_model');
        $this->load->model('admin/providermodel', 'provider_model');
        $this->load->model('admin/usermodel', 'user_model');
        $this->load->model('admin/lcategorymodel', 'lcategory_model');
        $this->load->model('admin/lookmodel', 'look_model');
        $this->load->model('admin/blogmodel', 'blog_model');
        $this->load->model('admin/couponmodel', 'coupon_model');
        $this->load->model('admin/trackingmodel', 'tracking_model');
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
        $data['total_users'] = $this->user_model->get_users_count();
        $data['total_products'] = $this->product_model->get_products_count();
        $data['total_categories'] = $this->pcategory_model->get_categories_count();
        $data['total_providers'] = $this->provider_model->get_providers_count();
        $data['total_brands'] = $this->brand_model->get_brands_count();
        $data['total_lcategories'] = $this->lcategory_model->get_lcategories_count();
        $data['total_looks'] = $this->look_model->get_looks_count();
        $data['total_blogs'] = $this->blog_model->get_blogs_count();
        $data['total_coupons'] = $this->coupon_model->get_coupons_count();
        $data['total_track_look'] = $this->tracking_model->get_track_look_count();
        $data['total_track_product'] = $this->tracking_model->get_track_product_count();
        $data['l_category_report'] = $this->tracking_model->get_categories_count();

        $this->load->view('admin/header');
        $this->load->view('admin/home', $data);
        $this->load->view('admin/footer');
    }


    public function flush_db_cache()
    {

        $directory = explode("application", __dir__);
        $dir = $directory[0].'application/cache/dbcache';
        

        $dh = opendir($dir);
         if ($dh) {
          while($file = readdir($dh)) {
           if (!in_array($file, array('.', '..'))) {
            if (is_file($dir.'/'.$file)) {
             unlink($dir.'/'.$file);
            }
            else if (is_dir($dir.'/'.$file)) {

            $dir1 = $dir.'/'.$file;

            $dh1 = opendir($dir1);
             if ($dh1) {
              while($file1 = readdir($dh1)) {
               if (!in_array($file1, array('.', '..'))) {
                if (is_file($dir1.'/'.$file1)) {
                 unlink($dir1.'/'.$file1);
                }
               }
              }
              rmdir($dir1);
             }

            }
           }
          }
         }

         redirect(base_url('admin/home'), 'refresh');
    }

}
 
/* End of file login.php */
/* Location: ./application/modules/admin/controllers/login.php */