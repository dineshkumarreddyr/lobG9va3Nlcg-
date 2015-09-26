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
        $this->load->model('usermodel', 'user_model');
        $this->load->model('trackingmodel', 'tracking_model');
        $this->load->model('favouritesmodel', 'favourites_model');
        $this->load->model('ratingsmodel', 'ratings_model');
    }
    
	public function index()
	{
		$data['lcategories'] = $this->lcategory_model->get_lcategories();
		$data['providers'] = $this->provider_model->get_providers();
		$data['tdesigners'] = $this->user_model->get_top_designers();

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
				'l_products' => $lps,
				'l_id' => $look->l_id,
				'l_mrp' => $look->l_mrp,
				'l_price' => $look->l_price
			);
		}
		$data['looks'] = $looks;
		
		$seo = array(
			'title' => 'Looks',
			'description' => 'Looks',
			'keywords' => 'Looks'
		);
		$data['seo'] = $seo;

		$this->load->view('header', $data);
		$this->load->view('looks/index', $data);
		$this->load->view('footer');
	}

	public function view($lid = 0)
	{
		if($lid == 0) {
			show_404();
		}

		$this->tracking_model->track_look($lid);

		$ls = $this->looks_model->look_details($lid);
		if(count($ls) == 0 || $ls[0]->l_id == '') {
			show_404();
		}
		
		$l_category = 0;
		$l_gender = '';
		$looks = array();
		foreach ($ls as $key => $look) {
			$lps = $this->looks_model->get_look_products($look->l_id);
			$l_category = $look->l_category;
			$l_gender = $look->l_gender;

			$looks[] = array(
				'l_id' => $look->l_id,
				'l_category' => $look->l_category,
				'lc_name' => $look->lc_name,
				'l_title' => $look->l_name,
				'l_products' => $lps,
				'l_user' => $look->user_fname,
				'l_user_image' => $look->user_image,
				'l_uid' => $look->user_id,
				'l_mrp' => $look->l_mrp,
				'l_price' => $look->l_price,
				'l_views' => $look->lv_count
			);
		}
		$data['look'] = $looks[0];
		$data['favourite'] = $this->favourites_model->check_favourites($lid, 'look', $this->session->userdata('uid'));

		$sl = $this->looks_model->similar_looks('', $l_gender, $l_category);
		
		$slooks = array();
		// $ls = $this->looks_model->get_looks();
		foreach ($sl as $key => $look) {
			$lps = $this->looks_model->get_look_products($look->l_id);
			
			$slooks[] = array(
				'l_title' => $look->l_name,
				'l_products' => $lps,
				'l_id' => $look->l_id,
				'l_mrp' => $look->l_mrp,
				'l_price' => $look->l_price
			);
		}
		$data['slooks'] = $slooks;
		$final_rating = $this->ratings_model->get_rating('look', $lid);
		$data['rating'] = intval($final_rating->rating_rating);

		$seo = array(
			'title' => $look->l_name,
			'description' => $look->l_name,
			'keywords' => $look->l_name
		);
		$data['seo'] = $seo;

		$this->load->view('header', $data);
		$this->load->view('looks/view', $data);
		$this->load->view('footer');
	}

	public function create()
	{
		$uid = $this->session->userdata('uid');
		$role = $this->session->userdata('role');
		// if($role != 2) {
		// 	show_404(); // Redundant, I know, just added for this example
		// }
		
		$data['pcategories'] = $this->pcategory_model->get_pcategories();
		$data['lcategories'] = $this->lcategory_model->get_lcategories();
		$data['providers'] = $this->provider_model->get_providers();
		$data['brands'] = $this->brand_model->get_brands();
		$data['products'] = $this->products_model->get_products();

		$seo = array(
			'title' => 'Create look',
			'description' => 'Create look',
			'keywords' => 'Create look'
		);
		$data['seo'] = $seo;

		$this->load->view('header', $data);
		$this->load->view('looks/create', $data);
		// $this->load->view('footer');
	}

	public function edit($lid = 0)
	{
		$uid = $this->session->userdata('uid');
		$role = $this->session->userdata('role');
		// if($role != 2) {
		// 	show_404(); // Redundant, I know, just added for this example
		// }

		$ls = $this->looks_model->look_details($lid);
		if(count($ls) == 0 || $ls[0]->l_id == '') {
			show_404();
		}
		
		$l_category = 0;
		$l_gender = '';
		$looks = array();
		foreach ($ls as $key => $look) {
			$lps = $this->looks_model->get_look_products($look->l_id);
			$l_category = $look->l_category;
			$l_gender = $look->l_gender;

			$looks[] = array(
				'l_id' => $look->l_id,
				'l_category' => $look->l_category,
				'lc_name' => $look->lc_name,
				'l_title' => $look->l_name,
				'l_products' => $lps,
				'l_user' => $look->user_fname,
				'l_user_image' => $look->user_image,
				'l_uid' => $look->user_id,
				'l_mrp' => $look->l_mrp,
				'l_price' => $look->l_price,
				'l_gender' => $look->l_gender,
				'l_views' => $look->lv_count
			);
		}
		$data['look'] = $looks[0];

		$data['pcategories'] = $this->pcategory_model->get_pcategories();
		$data['lcategories'] = $this->lcategory_model->get_lcategories();
		$data['providers'] = $this->provider_model->get_providers();
		$data['brands'] = $this->brand_model->get_brands();
		$data['products'] = $this->products_model->get_products();

		$seo = array(
			'title' => 'Edit look',
			'description' => 'Edit look',
			'keywords' => 'Edit look'
		);
		$data['seo'] = $seo;

		$this->load->view('header', $data);
		$this->load->view('looks/edit', $data);
		// $this->load->view('footer');
	}

	public function create_ajax()
	{
		$response = array();
		$l_category = $this->input->post('l_cat');
		$l_gender = $this->input->post('l_gender');
		$l_name = $this->input->post('l_name');
		$l_pids = $this->input->post('l_pids');
		$l_mrp = $this->input->post('l_mrp');
		$l_price = $this->input->post('l_price');
		$lp_count = count(json_decode($l_pids));
		$l_uid = $this->session->userdata('uid');

		// Check look name already exists or not.
		$l_name_check = $this->looks_model->check_look_name($l_category, $l_name);
		if($l_name_check == 0) {
			$l_id = $this->looks_model->create_look($l_category, $l_name, $lp_count, $l_uid, $l_mrp, $l_price, $l_gender);
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

	public function update_ajax()
	{
		$response = array();
		if($this->input->post('l_uid') != $this->session->userdata('uid')) {
			$response['status'] = 'error';
			$response['message'] = 'Invalid.';
		}
		else {
			$l_id = $this->input->post('l_id');
			$l_category = $this->input->post('l_cat');
			$l_gender = $this->input->post('l_gender');
			$l_name = $this->input->post('l_name');
			$l_pids = $this->input->post('l_pids');
			$l_mrp = $this->input->post('l_mrp');
			$l_price = $this->input->post('l_price');
			$lp_count = count(json_decode($l_pids));
			$l_uid = $this->session->userdata('uid');

			// Check look name already exists or not.
			$l_name_check = $this->looks_model->check_look_name($l_category, $l_name, $l_id);
			if($l_name_check == 0) {
				$l_id = $this->looks_model->update_look($l_id, $l_category, $l_name, $lp_count, $l_uid, $l_mrp, $l_price, $l_gender);
				if($l_id) {
					$this->looks_model->update_lproducts($l_id, $l_pids);

					$response['status'] = 'success';
					$response['message'] = $l_id;
				}
			}
			else {
				$response['status'] = 'error';
				$response['message'] = 'This look name already exists.';
			}
		}
		echo json_encode($response);
	}

	/*
	create Products Ajax filter
	*/
	public function f_ajax()
	{
		$f_name = addslashes($this->input->post('f_name'));
		$f_gen = addslashes($this->input->post('f_gen'));
		$f_cat = addslashes($this->input->post('f_cat'));
		$f_prov = $this->input->post('f_prov');
		$f_brd = $this->input->post('f_brd');
		$f_dis = $this->input->post('f_dis');

		$s_cat = array();
		if($f_cat){
			$s_pcategories = $this->pcategory_model->get_pcategories($f_cat);
			foreach ($s_pcategories as $key => $s_pcategory) {
				$s_cat[] = $s_pcategory->pc_id;
			}
			$s_cat[] = $f_cat;
		}

		$data = $this->looks_model->f_products($f_gen, $s_cat, $f_prov, $f_brd, $f_name, $f_dis);
		echo json_encode($data);
	}

	/*
	 * Looks Ajax filter
	 */
	public function lf_ajax()
	{
		$f_cat = $this->input->post('f_cat');
		$f_prov = $this->input->post('f_prov');
		$f_prod = $this->input->post('f_prod');

		$ls = $this->looks_model->lf_looks($f_cat, $f_prov, $f_prod);

		$looks = array();
		foreach ($ls as $key => $look) {
			$lps = $this->looks_model->get_look_products($look->l_id);
			
			$looks[] = array(
				'l_id' => $look->l_id,
				'l_category' => $look->l_category,
				'l_title' => $look->l_name,
				'l_products' => $lps,
				'l_mrp' => $look->l_mrp,
				'l_price' => $look->l_price,
			);
		}

		echo json_encode($looks);
	}

	/*
	 * Get list of categories by parent category
	 */
	public function f_pcategories($pc_id = 0, $gender = '') {
		$pcategories= $this->pcategory_model->get_pcategories($pc_id, $gender);
		$f_pcategories = array();
		foreach ($pcategories as $key => $pcategory) {
			$f_pcategories[$pcategory->pc_id] = $pcategory->pc_name; 
		}

		echo json_encode($f_pcategories);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */