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
				'l_products' => $lps
			);
		}
		$data['d_looks'] = $looks;
		$data['did'] = $did;
		// print_r($looks);
		
		$this->load->view('header');
		$this->load->view('user/view', $data);
		$this->load->view('footer');
	}

	public function get_designers()
	{
		$this->load->view('header');
		$this->load->view('user/designers');
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

		$this->load->view('header');
		$this->load->view('user/login', $data);
		$this->load->view('footer');
	}

	public function register()
	{
		$this->login_check();
		
		$this->load->view('header');
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */