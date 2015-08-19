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
	}

	public function index($did = 0)
	{
		$data['designer_details'] = $this->user_model->get_designer($did);
		print_r($data);
		$this->load->view('header');
		$this->load->view('user/view');
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
		$this->load->view('header');
		$this->load->view('user/login');
		$this->load->view('footer');
	}

	public function register()
	{
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
        redirect('/', 'refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */