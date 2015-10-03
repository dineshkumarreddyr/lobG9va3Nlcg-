<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tracking extends CI_Controller {

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
        $this->load->model('trackingmodel', 'tracking_model');
    }

	public function ajax_product_buy_click()
	{
		// print_r($this->input->post());
		$id = $this->input->post('id');
		$url = $this->input->post('url');
		$source = $this->input->post('source');
		$ip = $this->input->post('ip');

		$this->tracking_model->product_buy_click($id, $url, $source, $ip);

		// $this->load->view('pages/coupon_view', $data);

	}

	public function ajax_look_buy_click()
	{
		// print_r($this->input->post());
		$id = $this->input->post('id');
		$url = $this->input->post('url');
		$source = $this->input->post('source');
		$ip = $this->input->post('ip');

		$this->tracking_model->look_buy_click($id, $url, $source, $ip);

		// $this->load->view('pages/coupon_view', $data);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */