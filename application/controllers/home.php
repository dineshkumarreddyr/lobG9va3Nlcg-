<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->load->model('usermodel', 'user_model');
        $this->load->model('admin/providermodel', 'provider_model');
    }

	public function index()
	{
		// $data['providers'] = $this->provider_model->get_providers();
		$data['tproducts'] = $this->products_model->get_trending_products();
		$ls = $this->looks_model->by_popular_designers();
		
		$looks = array();
		foreach ($ls as $key => $look) {
			$lps = $this->looks_model->get_look_products($look->l_id);
			
			$looks[] = array(
				'l_title' => $look->l_name,
				'l_products' => $lps,
				'l_user' => $look->user_fname,
				'l_uid' => $look->l_uid,
				'l_mrp' => $look->l_mrp,
				'l_price' => $look->l_price,
				'l_id' => $look->l_id
			);
		}
		$data['pbd_looks'] = $looks;

		$data['tdesigners'] = $this->user_model->get_top_designers();

		$seo = array(
			'title' => 'Home page',
			'description' => 'Home page',
			'keywords' => 'Home page'
		);
		$data['seo'] = $seo;

		$this->load->view('header', $data);
		$this->load->view('home', $data);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */