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
        $this->load->model('admin/providermodel', 'provider_model');
        $this->load->model('trackingmodel', 'tracking_model');
        $this->load->model('usermodel', 'user_model');
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
			$s_pcategories = $this->pcategory_model->get_pcategories($category);
			$data['s_pcategories'] = $s_pcategories;
			foreach ($s_pcategories as $key => $s_pcategory) {
				$s_cat[] = $s_pcategory->pc_id;
			}
		}

		$data['products'] = $this->products_model->s_products($s, $gender, $s_cat);
		// print_r($data['products']);exit;

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
		$f_cat = $this->input->post('f_cat');
		$f_prov = $this->input->post('f_prov');
	
		$data = $this->products_model->pf_products($f_cat, $f_prov);
		echo json_encode($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */