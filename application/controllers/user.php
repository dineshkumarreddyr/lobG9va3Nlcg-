<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->load->model('usermodel', 'user_model');
		$this->load->model('looksmodel', 'looks_model');
		$this->load->model('followersmodel', 'followers_model');
	}

	public function index($did = 0)
	{
		if($did == 0) {
        show_404(); // This seems to display within the template when what I want is for it to redirect
		}
		$data['designer_details'] = $this->user_model->get_designer($did);
		if(count($data['designer_details']) == 0 || $data['designer_details']->user_role != 2) {
        show_404(); // If designer not there return 404 page
		}
		$data['d_followers'] = $this->followers_model->get_followers_count($did);
		$data['d_views'] = $this->user_model->get_designer_views($did);

		$ls = $this->looks_model->get_designer_looks(intval($did));
		
		$looks = array();
		foreach ($ls as $key => $look) {
			$lps = $this->looks_model->get_look_products($look->l_id);
			
			$looks[] = array(
				'l_title' => $look->l_name,
				'l_products' => $lps,
				'l_id' => $look->l_id
			);
		}
		$data['d_looks'] = $looks;
		$data['did'] = $did;
		// print_r($looks);
		
		$seo = array(
			'title' => $data['designer_details']->user_fname,
			'description' => $data['designer_details']->user_fname,
			'keywords' => $data['designer_details']->user_fname
		);
		$data['seo'] = $seo;

		$this->load->view('header', $data);
		$this->load->view('user/view', $data);
		$this->load->view('footer');
	}

	/*
	 * Edit designer profile
	 */
	public function edit($did = 0)
	{
		$uid = $this->session->userdata('uid');
	    $role = $this->session->userdata('role');
	    if(!isset($uid) || empty($uid) || $role != 2) {
	        // redirect(base_url());
        	show_404(); // This seems to display within the template when what I want is for it to redirect
	    }
		
		if($did == 0) {
        show_404(); // This seems to display within the template when what I want is for it to redirect
		}
		$data['designer_details'] = $this->user_model->get_designer($did);
		if(count($data['designer_details']) == 0 || $data['designer_details']->user_role != 2) {
        	show_404(); // If designer not there return 404 page
		}
		$data['d_followers'] = $this->followers_model->get_followers_count($did);
		$data['d_views'] = $this->user_model->get_designer_views($did);

		$ls = $this->looks_model->get_designer_looks(intval($did));
		
		$looks = array();
		foreach ($ls as $key => $look) {
			$lps = $this->looks_model->get_look_products($look->l_id);
			
			$looks[] = array(
				'l_title' => $look->l_name,
				'l_products' => $lps,
				'l_id' => $look->l_id
			);
		}
		$data['d_looks'] = $looks;
		$data['did'] = $did;
		// print_r($looks);
		
		$seo = array(
			'title' => $data['designer_details']->user_fname,
			'description' => $data['designer_details']->user_fname,
			'keywords' => $data['designer_details']->user_fname
		);
		$data['seo'] = $seo;

		$this->load->view('header', $data);
		$this->load->view('user/edit', $data);
		$this->load->view('footer');
	}

	public function get_designers()
	{
		$data['designers'] = $this->user_model->get_designers();
		$seo = array(
			'title' => 'Designers',
			'description' => 'Designers',
			'keywords' => 'Designers'
		);
		$data['seo'] = $seo;

		$this->load->view('header', $data);
		$this->load->view('user/designers', $data);
		$this->load->view('footer');
	}

	public function login()
	{
		$this->login_check();
		$errr_msg = '';
		$msg = '';

		if($this->input->post('login')) {
			$email = $this->input->post('email');
			$pass = $this->input->post('pass');

			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errr_msg = 'Invalid Email-Id';
			}
			elseif ($pass == '') {
				$errr_msg = 'Invalid Password';
			}
			else {
				$pass = sha1($pass);

				$data = $this->user_model->login($email, $pass);
				if(count($data) && $data->user_status == 1) {

					$this->session->set_userdata('uid', $data->user_id);
					$this->session->set_userdata('name', $data->user_fname);
          			$this->session->set_userdata('email', $data->user_email);
          			$this->session->set_userdata('role', $data->user_role);

					redirect($this->uri->uri_string());
				}
				else {
					$errr_msg = 'Invalid Email-Id / Password';
				}
			}
		}

		$data['errr_msg'] = $errr_msg;
    	$data['msg'] = $msg;

    	$seo = array(
			'title' => 'Login',
			'description' => 'Login',
			'keywords' => 'Login'
		);
		$data['seo'] = $seo;

		$this->load->view('header', $data);
		$this->load->view('user/login', $data);
		$this->load->view('footer');
	}

	public function register()
	{
		$this->login_check();

		$seo = array(
			'title' => 'Register',
			'description' => 'Register',
			'keywords' => 'Register'
		);
		$data['seo'] = $seo;
		
		$this->load->view('header', $data);
		$this->load->view('user/register');
		$this->load->view('footer');
	}

	public function ajax_login()
	{
		$response = array();
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$response['status'] = 'error';
			$response['message'] = 'Invalid Email-Id';
		}
		elseif ($pass == '') {
			$response['status'] = 'error';
			$response['message'] = 'Invalid Password';
		}
		else {
			$pass = sha1($pass);

			$data = $this->user_model->login($email, $pass);
			if(count($data) && $data->user_status == 1) {

				$this->session->set_userdata('uid', $data->user_id);
                $this->session->set_userdata('name', $data->user_fname);
                $this->session->set_userdata('email', $data->user_email);
                $this->session->set_userdata('role', $data->user_role);

				$response['status'] = 'success';
			}
			else {
				$response['status'] = 'error';
				$response['message'] = 'Invalid Email-Id / Password';
			}
		}
		echo json_encode($response);
	}

	public function subscription()
	{
		$response = array();
		$email = $this->input->post('email');

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$response['status'] = 'error';
			$response['message'] = 'Invalid Email-Id';
		}
		else {
			$count = $this->user_model->check_subscription($email);
			if(!$count) {
				$data = $this->user_model->subscription($email);
				$response['status'] = 'success';
			}
			else {
				$response['status'] = 'error';
			}
		}
		echo json_encode($response);
	}

	public function logout() {
		$this->session->unset_userdata('uid');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        redirect(base_url(), 'refresh');
	}

	public function login_check() {
	    $uid = $this->session->userdata('uid');
	    if(isset($uid) && !empty($uid)) {
	        redirect(base_url());
	    }
	}

	/*
	 * update designer profile details ajax_update_profile
	 */

	public function ajax_update_profile()
	{
		$uid = $this->session->userdata('uid');
		$response = array();
		$name = $this->input->post('name');
		$about = $this->input->post('about');
		$email = $this->input->post('email');
		$location = $this->input->post('location');
		$state = $this->input->post('state');
		$mobile = $this->input->post('mobile');
		$institution = $this->input->post('institution');
		$experience = $this->input->post('experience');
		$website = $this->input->post('website');
		
		if(empty($name)) {
			$response['status'] = 'error';
			$response['message'] = 'Name should not empty';
		}
		elseif(empty($about)) {
			$response['status'] = 'error';
			$response['message'] = 'About should not empty';
		}
		elseif(empty($location)) {
			$response['status'] = 'error';
			$response['message'] = 'Location should not empty';
		}
		elseif(empty($state)) {
			$response['status'] = 'error';
			$response['message'] = 'State should not empty';
		}
		elseif(empty($mobile)) {
			$response['status'] = 'error';
			$response['message'] = 'Mobile should not empty';
		}
		else {

			$data = $this->user_model->profile_update($uid, $name, $about, $location, $state, $mobile, $institution, $experience, $website);

			if($data) {
				$response['status'] = 'success';
				$response['message'] = 'Successfully Updated.';
			}
			else {
				$response['status'] = 'error';
				$response['message'] = 'Unablel to update please try again later.';
			}
		}
		echo json_encode($response);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */