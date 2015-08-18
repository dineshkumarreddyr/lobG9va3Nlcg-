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
        $this->load->model('admin/pcategorymodel', 'pcategory_model');
        $this->load->model('admin/providermodel', 'provider_model');
        $this->load->model('trackingmodel', 'tracking_model');
    }

	public function index()
	{
		$data['pcategories'] = $this->pcategory_model->get_pcategories();
		$data['providers'] = $this->provider_model->get_providers();
		// $data['products'] = $this->products_model->get_products();

		$s = $this->input->get('s');
		$gender = $this->input->get('gender');
		$category = $this->input->get('category');

		$data['products'] = $this->products_model->s_products($s, $gender, $category);
		// print_r($data['products']);exit;

		$this->load->view('header');
		$this->load->view('products', $data);
		$this->load->view('footer');
	}

	public function view($product_id = 0)
	{
		$data['pcategories'] = $this->pcategory_model->get_pcategories();
		$data['providers'] = $this->provider_model->get_providers();
		$data['product'] = $this->products_model->get_product($product_id);
		$this->tracking_model->track_product($product_id);


		$this->load->view('header');
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */