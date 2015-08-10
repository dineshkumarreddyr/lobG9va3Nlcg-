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
        $this->load->model('pcategorymodel', 'pcategory_model');
        $this->load->model('providermodel', 'provider_model');
        $this->load->model('brandmodel', 'brand_model');
        $this->load->model('trackingmodel', 'tracking_model');
    }
    
	public function index()
	{
		$this->load->view('header');
		$this->load->view('looks/index');
		$this->load->view('footer');
	}

	public function create()
	{
		$data['pcategories'] = $this->pcategory_model->get_pcategories();
		$data['providers'] = $this->provider_model->get_providers();
		$data['brands'] = $this->brand_model->get_brands();
		$data['products'] = $this->products_model->get_products();

		$this->load->view('header');
		$this->load->view('looks/create', $data);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */