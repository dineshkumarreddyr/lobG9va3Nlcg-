<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Looks extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->model('productsmodel', 'products_model');
        $this->load->model('looksmodel', 'looks_model');
        $this->load->model('pcategorymodel', 'pcategory_model');
        $this->load->model('lcategorymodel', 'lcategory_model');
        $this->load->model('providermodel', 'provider_model');
        $this->load->model('brandmodel', 'brand_model');
        $this->load->model('trackingmodel', 'tracking_model');
    }
    
	public function index()
	{
		$data['lcategories'] = $this->lcategory_model->get_lcategories();

		$s = $this->input->get('s');
		$gender = $this->input->get('gender');
		$category = $this->input->get('category');

		$ls = $this->looks_model->s_looks($s, $gender, $category);
		
		$looks = array();
		// $ls = $this->looks_model->get_looks();
		foreach ($ls as $key => $look) {
			$lps = $this->looks_model->get_look_products($look->l_id);
			
			$looks[] = array(
				'l_title' => $look->l_name,
				'l_products' => $lps
			);
		}
		$data['looks'] = $looks;
		// print_r($looks);exit;

		$this->load->view('header');
		$this->load->view('looks/index', $data);
		$this->load->view('footer');
	}

	public function create()
	{
		$uid = $this->session->unset_userdata('uid');
        
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');


		$data['pcategories'] = $this->pcategory_model->get_pcategories();
		$data['lcategories'] = $this->lcategory_model->get_lcategories();
		$data['providers'] = $this->provider_model->get_providers();
		$data['brands'] = $this->brand_model->get_brands();
		$data['products'] = $this->products_model->get_products();

		$this->load->view('header');
		$this->load->view('looks/create', $data);
		$this->load->view('footer');
	}

	public function create_ajax()
	{
		$response = array();
		$l_category = $this->input->post('l_cat');
		$l_name = $this->input->post('l_name');
		$l_pids = $this->input->post('l_pids');
		$lp_count = count(json_decode($l_pids));
		$l_uid = $this->session->userdata('uid');

		// Check look name already exists or not.
		$l_name_check = $this->looks_model->check_look_name($l_category, $l_name);
		if($l_name_check == 0) {
			$l_id = $this->looks_model->create_look($l_category, $l_name, $lp_count, $l_uid);
			if($l_id) {
				$this->looks_model->insert_lproducts($l_id, $l_pids);

				$response['status'] = 'success';
				$response['message'] = $l_id;
			}
		}
		else {
			$response['status'] = 'error';
			$response['message'] = 'This look name already exists.';
		}
		echo json_encode($response);
	}

	/*
	create Products Ajax filter
	*/
	public function f_ajax()
	{
		$f_gen = $this->input->post('f_gen');
		$f_cat = $this->input->post('f_cat');
		$f_prov = $this->input->post('f_prov');
		$f_brd = $this->input->post('f_brd');

		$data = $this->looks_model->f_products($f_gen, $f_cat, $f_prov, $f_brd);
		echo json_encode($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */