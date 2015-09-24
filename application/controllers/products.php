<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

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
        $this->load->model('pcategorymodel', 'pcategory_model');
        $this->load->model('providermodel', 'provider_model');
        $this->load->model('trackingmodel', 'tracking_model');
        $this->load->model('usermodel', 'user_model');
        $this->load->model('favouritesmodel', 'favourites_model');
    }

	public function index()
	{
		$data['pcategories'] = $this->pcategory_model->get_pcategories(0);
		$data['providers'] = $this->provider_model->get_providers();
		$data['tdesigners'] = $this->user_model->get_top_designers();
		// $data['products'] = $this->products_model->get_products();

		$s = $this->input->get('s');
		$gender = $this->input->get('gender');
		$category = intval($this->input->get('category'));
		
		$s_cat = array();
		$data['s_pcategories'] = array();
		if($category){
			$s_pcategories = $this->pcategory_model->get_pcategories($category, $gender);
			$data['s_pcategories'] = $s_pcategories;
			foreach ($s_pcategories as $key => $s_pcategory) {
				$s_cat[] = $s_pcategory->pc_id;
			}
			$s_cat[] = $category;
		}

		$data['products'] = $this->products_model->s_products($s, $gender, $s_cat);
		// print_r($data['products']);exit;

		$cat_tree = $this->tree_category($gender);
		$data['cat_list'] = $cat_tree['total_cat'];
		$data['cat_gender_list'] = $cat_tree['total_cat_gender'];
		$data['cat_tree'] = $cat_tree['cat_tree'];
		$data['cat_gender_tree'] = $cat_tree['cat_gender_tree'];
		// print_r($cat_tree);exit;

		$seo = array(
			'title' => 'Products',
			'description' => 'Products',
			'keywords' => 'Products'
		);
		$data['seo'] = $seo;

		$this->load->view('header', $data);
		$this->load->view('products', $data);
		$this->load->view('footer');
	}

	public function view($product_id = 0)
	{
		$data['product'] = $this->products_model->get_product($product_id);
		if(!count($data['product'])) {
			show_404();
		}
		// $data['providers'] = $this->provider_model->get_providers();
		$this->tracking_model->track_product($product_id);
		$data['pcategories'] = $this->pcategory_model->get_pcategories();
		$data['rproducts'] = $this->products_model->get_rproducts($data['product']['p_category']);
		$data['favourite'] = $this->favourites_model->check_favourites($product_id, 'product', $this->session->userdata('uid'));

		$seo = array(
			'title' => $data['product']['p_name'],
			'description' => $data['product']['p_desc'],
			'keywords' => $data['product']['p_name'],
			'image' =>$data['product']['p_oimage']
		);
		$data['seo'] = $seo;

		$this->load->view('header', $data);
		$this->load->view('product_view', $data);
		$this->load->view('footer');
	}

	/*
	Products Ajax search
	*/
	public function s_ajax()
	{
		$s_pdt = $this->input->post('s_pdt');
		$s_gen = $this->input->post('s_gen');
		$s_cat = $this->input->post('s_cat');

		$data = $this->products_model->s_products($s_pdt, $s_gen, $s_cat);
		echo json_encode($data);
	}

	/*
	Products filter Ajax search
	*/
	public function pf_ajax()
	{
		$f_gen = $this->input->post('f_gen');
		$f_cat = $this->input->post('f_cat');
		$f_prov = $this->input->post('f_prov');
		$f_size = $this->input->post('f_size');
		$f_dis = $this->input->post('f_dis');

		$cat_tree = $this->tree_category($f_gen)['cat_tree'];
		// print_r($cat_tree);
		$total_cat = array();
		if(isset($f_cat) && !empty($f_cat)) {
			foreach ($f_cat as $key => $f_c) {
				// $total_cat[] = 
				if(array_key_exists($f_c, $cat_tree)) {
					if(!count(array_intersect($cat_tree[$f_c], $f_cat))) {
						foreach ($cat_tree[$f_c] as $key => $cat) {
							$total_cat[$cat] = $cat;
						}
					}
				}
				else {
					$total_cat[$f_c] = $f_c;
				}
			}
			$f_cat = $total_cat;
		}
	
		$data = $this->products_model->pf_products($f_cat, $f_prov, $f_dis, $f_size, $f_gen);
		echo json_encode($data);
	}

	public function tree_category($gender = '') {
		$all_cat = $this->pcategory_model->get_cat_list($gender);
		$all_cat_gender = $this->pcategory_model->get_cat_list_by_gender($gender);

		$total_cat = array();
		$total_pcat = array();
		$final = array();

		$total_cat_gender = array();
		$total_pcat_gender = array();
		$final_gender = array();

		foreach ($all_cat as $key => $cat) {
			$total_cat[$cat->pc_id] = $cat->pc_name;
			$total_pcat[$cat->pc_id] = $cat->pc_pid;
		}

		foreach ($all_cat_gender as $key => $cat_gender) {
			$total_cat_gender[$cat_gender->pc_id] = $cat_gender->pc_name;
			$total_pcat_gender[$cat_gender->pc_id] = $cat_gender->pc_pid;
		}
		// echo '<pre>';
		// print_r($all_cat_by_gender);exit;
		// print_r($total_cat);
		// print_r($total_pcat);
		// print_r(array_keys($total_pcat, '0'));
		$total_pcat_uq = array_unique($total_pcat);
		$total_pcat_gender_uq = array_unique($total_pcat_gender);

		foreach ($total_pcat_uq as $key => $pcat_uq) {
			// echo $pcat_uq;
			// print_r(array_keys($total_pcat, $pcat_uq));
			$final[$pcat_uq] = array_keys($total_pcat, $pcat_uq);
		}

		foreach ($total_pcat_gender_uq as $key => $pcat_gender_uq) {
			// echo $pcat_uq;
			// print_r(array_keys($total_pcat, $pcat_uq));
			$final_gender[$pcat_gender_uq] = array_keys($total_pcat_gender, $pcat_gender_uq);
		}
		// print_r($final_gender);

		foreach ($all_cat as $key => $cat) {
			$total_cat[$cat->pc_id] = $cat->pc_name;
		}

		foreach ($all_cat_gender as $key => $cat_gender) {
			$total_cat_gender[$cat_gender->pc_id] = $cat_gender->pc_name;
		}
		// print_r($total_cat_gender);
		// echo '</pre>';

		$output_cat = array(
			'total_cat' => $total_cat,
			'total_cat_gender' => $total_cat_gender,
			'cat_tree' => $final,
			'cat_gender_tree' => $final_gender
			);

		return $output_cat;

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */