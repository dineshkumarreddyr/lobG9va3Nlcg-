<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ratings extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/ratings
	 *	- or -  
	 * 		http://example.com/index.php/ratings/index
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
		$this->load->model('ratingsmodel', 'ratings_model');
	}
	public function index()
	{
		// $this->load->view('header');
		// $this->load->view('welcome_message');
		// $this->load->view('footer');
	}

	public function ajax_post_rating()
	{
		$response = array();
		$type = trim($this->input->post('type'));
		$type_id = trim($this->input->post('type_id'));
		$rating = trim($this->input->post('rating'));
		if(!empty($this->session->userdata('uid'))) {
			$uid = $this->session->userdata('uid');
		}
		else {
			$uid = 0;
		}
		$ip = $this->input->ip_address();
		$createdOn = date('Y-m-d H:i:s');

		if(!is_numeric($type_id)) {
			$response['status'] = 'error';
			$response['message'] = 'Invalid';
		}
		else if(empty(($type))) {
			$response['status'] = 'error';
			$response['message'] = 'Invalid';
		}
		else if(!is_numeric($rating)) {
			$response['status'] = 'error';
			$response['message'] = 'Invalid';
		}
		else {
			$count = $this->ratings_model->check_rating($type, $type_id, $uid, $ip);
			if(!$count) {
				$this->ratings_model->post_rating($type, $type_id, $uid, $ip, $rating, $createdOn);

			}
			else {
				$this->ratings_model->update_rating($type, $type_id, $uid, $ip, $rating, $createdOn);
				// $response['status'] = 'error';
			}
			$final_rating = $this->ratings_model->get_rating('look', 15);
			$response['status'] = 'success';
			$response['result'] = intval($final_rating->rating_rating);
		}
		echo json_encode($response);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */