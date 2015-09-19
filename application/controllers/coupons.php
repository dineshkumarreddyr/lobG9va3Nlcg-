<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coupons extends CI_Controller {

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
        $this->load->model('couponsmodel', 'coupons_model');
    }

	public function index()
	{
		$data['coupons'] = $this->coupons_model->get_coupons();

		$seo = array(
			'title' => 'Coupons and offers',
			'description' => 'Coupons and offers',
			'keywords' => 'Coupons and offers'
		);
		$data['seo'] = $seo;

		$this->load->view('header', $data);
		$this->load->view('pages/coupons', $data);
		$this->load->view('footer');

	}

	public function ajax_view()
	{
		$c_id = $this->input->post('c_id');
		$data['coupon'] = $this->coupons_model->view_coupon($c_id)[0];

		$this->load->view('pages/coupon_view', $data);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */