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
		$this->load->model('favouritesmodel', 'favourites_model');
		$this->load->model('blog/postsmodel', 'posts_model');
	}

	public function myaccount() {
		$seo = array(
			'title' => '',
			'description' => '',
			'keywords' => ''
		);
		$data['seo'] = $seo;
		$this->load->view('header', $data);
		// $this->load->view('user/view');
		$this->load->view('footer');
	}

	public function myfollowings() {
		$uid = $this->session->userdata('uid');
		$data['designers'] = $this->followers_model->get_followings($uid);
		$seo = array(
			'title' => '',
			'description' => '',
			'keywords' => ''
		);
		$data['seo'] = $seo;
		$this->load->view('header', $data);
		$this->load->view('user/followings', $data);
		$this->load->view('footer');
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
		if($this->session->userdata('uid') && $this->session->userdata('uid') != $did) {
			$data['d_follow'] = $this->followers_model->check_follow($did, $this->session->userdata('uid'));
		}
		$data['d_followers'] = $this->followers_model->get_followers_count($did);
		$data['d_views'] = $this->user_model->get_designer_views($did);

		$ls = $this->looks_model->get_designer_looks(intval($did));
		
		$looks = array();
		foreach ($ls as $key => $look) {
			$lps = $this->looks_model->get_look_products($look->l_id);
			
			$looks[] = array(
				'l_title' => $look->l_name,
				'l_mrp' => $look->l_mrp,
				'l_price' => $look->l_price,
				'l_products' => $lps,
				'l_id' => $look->l_id
			);
		}
		$data['d_looks'] = $looks;
		$data['did'] = $did;
		// print_r($looks);
		$data['posts'] = $this->posts_model->get_own_posts($did);
		// print_r($data['posts']);
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
	    if(!isset($uid) || empty($uid) || $role != 2 || $did != $uid) {
	        // redirect(base_url());
        	show_404(); // This seems to display within the template when what I want is for it to redirect
	    }
		
		if($did == 0) {
        show_404(); // This seems to display within the template when what I want is for it to redirect
		}

		// change profile pic
		if($this->input->post('change_pic')) {
			if(isset($_FILES["fileToUpload"]["name"]) && !empty($_FILES["fileToUpload"]["name"])) {
			$target_dir = "uploads/designers/";
			$name = explode('.', basename($_FILES["fileToUpload"]["name"]));
			$pic_name = $did .'.'. $name[1];
			$target_file = $target_dir . $pic_name;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        // echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "<script>alert('File is not an image.');</script>";
		        $uploadOk = 0;
		    }

		    // Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "<script>alert('Sorry, your file is too large.');</script>";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    // echo "<script>alert('Sorry, your file was not uploaded.');</script>";

			    if($this->input->post('avatar')) {
			    	$this->user_model->update_user_pic($did, $this->input->post('avatar'));
			    }
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					$this->user_model->update_user_pic($did, $pic_name);
			    } else {
			    	if($this->input->post('avatar')) {
				    	$this->user_model->update_user_pic($did, $this->input->post('avatar'));
				    }
			        echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
			    }
			}
			} else {
				if($this->input->post('avatar')) {
			    	$this->user_model->update_user_pic($did, $this->input->post('avatar'));
			    }
			}
		}

		// change profile pic


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
				'l_mrp' => $look->l_mrp,
				'l_price' => $look->l_price,
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

		/**
		* Login with facebook
		**/
		$this->load->library('facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this
        //$this->load->library('facebook', array(
        //    'appId' => 'APP_ID',
        //    'secret' => 'SECRET',
        //    ));

		$user = $this->facebook->getUser();
        
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me?fields=id,first_name,last_name,name,email');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }

        if ($user) {
        	$name = $data['user_profile']['name'];
        	$email = $data['user_profile']['email'];
        	$pass = sha1('LO' . date('Ymdhis'));
        	$role = 1;
        	$status = 1;
        	$uid = $this->user_model->register($name, $email, $pass, $role, $status);
        	if($uid) {
				$this->session->set_userdata('uid', $uid);
				$this->session->set_userdata('name', $name);
	  			$this->session->set_userdata('email', $email);
	  			$this->session->set_userdata('role', $role);        		
        	}
        	else {
        		$user_data = $this->user_model->fb_login($email);
				if(count($user_data) && $user_data->user_status == 1) {

					$this->session->set_userdata('uid', $user_data->user_id);
					$this->session->set_userdata('name', $user_data->user_fname);
          			$this->session->set_userdata('email', $user_data->user_email);
          			$this->session->set_userdata('role', $user_data->user_role);
          		}
        	}

            $data['logout_url'] = site_url('logout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('login'), 
                'scope' => array("email") // permissions here
            ));
        }
        // login with facebook end

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

	public function forgotpassword()
	{
		$this->login_check();
		$errr_msg = '';
		$msg = '';

		if($this->input->post('fg_pass')) {
			$email = $this->input->post('email');
			
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errr_msg = 'Invalid Email-Id';
			}
			else {
			
				$status = $this->user_model->check_email($email);
				if($status) {

					$msg = 'Please check your email to reset your password';

					$html = read_file(APPPATH.'views/email/forgotpassword.php');

					$hash = base64_encode($status.'*'.$email);

					$replacements = array(
						'USER_NAME' => '',
					    'CONFIRM_LINK' => base_url('reset-password?hash='.$hash),
					);

					foreach($replacements as $find => $replace)
					{
					    $html = preg_replace('/\{\{' . preg_quote($find, '/') . '\}\}/', $replace, $html);
					}

					// Loads the email library
			        $this->load->library('email');
			        // FCPATH refers to the CodeIgniter install directory
			        // Specifying a file to be attached with the email
			        // if u wish attach a file uncomment the script bellow:
			        //$file = FCPATH . 'yourfilename.txt';
			        // Defines the email details
			        $this->email->from('mail@lookser.com', 'Lookser');
			        $this->email->to($email);
			        $this->email->subject('Lookser | Forgot Password');
			        $this->email->message($html);
			        //also this script
			        //$this->email->attach($file);
			        // The email->send() statement will return a true or false
			        // If true, the email will be sent
			        if ($this->email->send()) {
			            $msg = 'Please check your email to reset your password';
			        }
			        else {
			            // echo $this->email->print_debugger();
			            $errr_msg = 'Due to technical problem we are unable to send email. Please try again later.';
			        }
				}
				else {
					$errr_msg = 'This email not registered with us';
				}
			}
		}

		$data['errr_msg'] = $errr_msg;
    	$data['msg'] = $msg;

    	$seo = array(
			'title' => 'Forgot password',
			'description' => 'Forgot password',
			'keywords' => 'Forgot password'
		);
		$data['seo'] = $seo;

		$this->load->view('header', $data);
		$this->load->view('user/forgotpassword', $data);
		$this->load->view('footer');
	}

	// reset password

	public function resetpassword()
	{
		$this->login_check();
		$errr_msg = '';
		$msg = '';

		$data['errr_msg'] = $errr_msg;
    	$data['msg'] = $msg;

    	$seo = array(
			'title' => 'Reset password',
			'description' => 'Reset password',
			'keywords' => 'Reset password'
		);
		$data['seo'] = $seo;

		$this->load->view('header', $data);
		$this->load->view('user/resetpassword', $data);
		$this->load->view('footer');
	}

	public function register()
	{

		/**
		* Login with facebook
		**/
		$this->load->library('facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this
        //$this->load->library('facebook', array(
        //    'appId' => 'APP_ID',
        //    'secret' => 'SECRET',
        //    ));

		$user = $this->facebook->getUser();
        
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me?fields=id,first_name,last_name,name,email');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }

        if ($user) {
        	$name = $data['user_profile']['name'];
        	$email = $data['user_profile']['email'];
        	$pass = sha1('LO' . date('Ymdhis'));
        	$role = 1;
        	$status = 1;
        	$uid = $this->user_model->register($name, $email, $pass, $role, $status);
        	if($uid) {
				$this->session->set_userdata('uid', $uid);
				$this->session->set_userdata('name', $name);
	  			$this->session->set_userdata('email', $email);
	  			$this->session->set_userdata('role', $role);        		
        	}
        	else {
        		$user_data = $this->user_model->fb_login($email);
				if(count($user_data) && $user_data->user_status == 1) {

					$this->session->set_userdata('uid', $user_data->user_id);
					$this->session->set_userdata('name', $user_data->user_fname);
          			$this->session->set_userdata('email', $user_data->user_email);
          			$this->session->set_userdata('role', $user_data->user_role);
          		}
        	}

            $data['logout_url'] = site_url('logout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('login'), 
                'scope' => array("email") // permissions here
            ));
        }
        // login with facebook end

		$this->login_check();

		$errr_msg = '';
		$msg = '';

		if($this->input->post('register')) {
			$name = $this->input->post('name');
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

				$status = $this->user_model->register($name, $email, $pass);
				if($status) {
					
					$msg = 'Successfully Registered';

					$html = read_file(APPPATH.'views/email/ur_register.php');

					$hash = base64_encode($status.'*'.$email);

					$replacements = array(
					    'USER_NAME' => $name,
					    'USER_EMAIL' => $email,
					    'CONFIRM_LINK' => base_url('confirm-registration?hash='.$hash),
					);

					foreach($replacements as $find => $replace)
					{
					    $html = preg_replace('/\{\{' . preg_quote($find, '/') . '\}\}/', $replace, $html);
					}

					// Loads the email library
			        $this->load->library('email');
			        // FCPATH refers to the CodeIgniter install directory
			        // Specifying a file to be attached with the email
			        // if u wish attach a file uncomment the script bellow:
			        //$file = FCPATH . 'yourfilename.txt';
			        // Defines the email details
			        $this->email->from('mail@lookser.com', 'Lookser');
			        $this->email->to($email);
			        $this->email->subject('Lookser Email');
			        $this->email->message($html);
			        //also this script
			        //$this->email->attach($file);
			        // The email->send() statement will return a true or false
			        // If true, the email will be sent
			        if ($this->email->send()) {
			            // echo "you are luck!";
			        }
			        else {
			            // echo $this->email->print_debugger();
			        }
				}
				else {
					$errr_msg = 'This email already registered';
				}
			}
		}

		$data['errr_msg'] = $errr_msg;
    	$data['msg'] = $msg;

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

                $favourites_count = $this->favourites_model->get_user_favourites_count($data->user_id);
                $this->session->set_userdata('fav_count', $favourites_count);

                $followers_count = $this->followers_model->get_user_followers_count($data->user_id);
                $this->session->set_userdata('follow_count', $followers_count);

				$response['status'] = 'success';
			}
			else {
				$response['status'] = 'error';
				$response['message'] = 'Invalid Email-Id / Password';
			}
		}
		echo json_encode($response);
	}

	public function ajax_ur_register()
	{
		$response = array();
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');

		if(empty($name) || !isset($name)) {
			$response['status'] = 'error';
			$response['message'] = 'Invalid Name';
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$response['status'] = 'error';
			$response['message'] = 'Invalid Email-Id';
		}
		elseif ($pass == '') {
			$response['status'] = 'error';
			$response['message'] = 'Invalid Password';
		}
		else {
			$pass = sha1($pass);

			$status = $this->user_model->register($name, $email, $pass);
			if($status) {
				$response['status'] = 'success';
				$response['message'] = 'Successfully Registered';
				
				// Loads the email library
		        $this->load->library('email');
		        // FCPATH refers to the CodeIgniter install directory
		        // Specifying a file to be attached with the email
		        // if u wish attach a file uncomment the script bellow:
		        //$file = FCPATH . 'yourfilename.txt';
		        // Defines the email details
		        $this->email->from('udayakumarswamy@gmail.com', 'Uday');
		        $this->email->to('udayakumarswamy@gmail.com');
		        $this->email->subject('Lookser Email');
		        $this->email->message('Good content.');
		        //also this script
		        //$this->email->attach($file);
		        // The email->send() statement will return a true or false
		        // If true, the email will be sent
		        if ($this->email->send()) {
		            // echo "you are luck!";
		        }
		        else {
		            // echo $this->email->print_debugger();
		        }
			}
			else {
				$response['status'] = 'error';
				$response['message'] = 'This email already registered';
			}
		}
		echo json_encode($response);
	}

	// Designer Registration

	public function ajax_dr_register()
	{
		$response = array();
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');

		if(empty($name) || !isset($name)) {
			$response['status'] = 'error';
			$response['message'] = 'Invalid Name';
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$response['status'] = 'error';
			$response['message'] = 'Invalid Email-Id';
		}
		elseif ($pass == '') {
			$response['status'] = 'error';
			$response['message'] = 'Invalid Password';
		}
		else {
			$pass = sha1($pass);

			$status = $this->user_model->register($name, $email, $pass, '2');
			if($status) {
				$response['status'] = 'success';
				$response['message'] = 'Successfully Registered';
				
				// Loads the email library
		        $this->load->library('email');
		        // FCPATH refers to the CodeIgniter install directory
		        // Specifying a file to be attached with the email
		        // if u wish attach a file uncomment the script bellow:
		        //$file = FCPATH . 'yourfilename.txt';
		        // Defines the email details
		        $this->email->from('udayakumarswamy@gmail.com', 'Uday');
		        $this->email->to('udayakumarswamy@gmail.com');
		        $this->email->subject('Lookser Email');
		        $this->email->message('Good content.');
		        //also this script
		        //$this->email->attach($file);
		        // The email->send() statement will return a true or false
		        // If true, the email will be sent
		        if ($this->email->send()) {
		            // echo "you are luck!";
		        }
		        else {
		            // echo $this->email->print_debugger();
		        }
			}
			else {
				$response['status'] = 'error';
				$response['message'] = 'This email already registered';
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

	public function follow()
	{
		$response = array();
		$did = $this->input->post('did');
		$uid = $this->session->userdata('uid');
		$createdOn = date('Y-m-d H:i:s');

		if(!is_numeric($did)) {
			$response['status'] = 'error';
			$response['message'] = 'Invalid Designer';
		}
		else {
			$count = $this->followers_model->check_follow($did, $uid);
			if(!$count) {
				$data = $this->followers_model->follow($did, $uid, $createdOn);

                $followers_count = $this->session->userdata('follow_count') + 1;
                $this->session->set_userdata('follow_count', $followers_count);

				$response['status'] = 'success';
			}
			else {
				$response['status'] = 'error';
			}
		}
		echo json_encode($response);
	}

	public function add_to_favourites()
	{
		$response = array();
		$id = $this->input->post('id');
		$type = $this->input->post('type');
		$uid = $this->session->userdata('uid');
		$createdOn = date('Y-m-d H:i:s');

		if(!is_numeric($id)) {
			$response['status'] = 'error';
			$response['message'] = 'Invalid Designer';
		}
		else {
			$count = $this->favourites_model->check_favourites($id, $type, $uid);
			if(!$count) {
				$data = $this->favourites_model->add_to_favourites($id, $type, $uid, $createdOn);

				$favourites_count = $this->session->userdata('fav_count') + 1;
                $this->session->set_userdata('fav_count', $favourites_count);
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
        $this->session->unset_userdata('fav_count');
        $this->session->unset_userdata('follow_count');
        
        
        $this->load->library('facebook');
        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.
        
        
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
		$gender = $this->input->post('gender');
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

			$data = $this->user_model->profile_update($uid, $name, $about, $gender, $location, $state, $mobile, $institution, $experience, $website);

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
	public function fb_login()
	{
		/**
		* Login with facebook
		**/
		$this->load->library('facebook'); // Automatically picks appId and secret from config
	    // OR
	    // You can pass different one like this
	    //$this->load->library('facebook', array(
	    //    'appId' => 'APP_ID',
	    //    'secret' => 'SECRET',
	    //    ));

		$user = $this->facebook->getUser();
	    
	    if ($user) {
	        try {
	            $data['user_profile'] = $this->facebook->api('/me?fields=id,first_name,last_name,name,email');
	        } catch (FacebookApiException $e) {
	            $user = null;
	        }
	    }else {
	        // Solves first time login issue. (Issue: #10)
	        //$this->facebook->destroySession();
	    }

	    if ($user) {
	    	$name = $data['user_profile']['name'];
	    	$email = $data['user_profile']['email'];
	    	$pass = sha1('LO' . date('Ymdhis'));
	    	$role = 1;
	    	$status = 1;
	    	$uid = $this->user_model->register($name, $email, $pass, $role, $status);
	    	if($uid) {
				$this->session->set_userdata('uid', $uid);
				$this->session->set_userdata('name', $name);
	  			$this->session->set_userdata('email', $email);
	  			$this->session->set_userdata('role', $role);

	  			$favourites_count = $this->favourites_model->get_user_favourites_count($uid);
                $this->session->set_userdata('fav_count', $favourites_count);

                $followers_count = $this->followers_model->get_user_followers_count($uid);
                $this->session->set_userdata('follow_count', $followers_count);
	    	}
	    	else {
	    		$user_data = $this->user_model->fb_login($email);
				if(count($user_data) && $user_data->user_status == 1) {

					$this->session->set_userdata('uid', $user_data->user_id);
					$this->session->set_userdata('name', $user_data->user_fname);
	      			$this->session->set_userdata('email', $user_data->user_email);
	      			$this->session->set_userdata('role', $user_data->user_role);

	      			$favourites_count = $this->favourites_model->get_user_favourites_count($user_data->user_id);
	                $this->session->set_userdata('fav_count', $favourites_count);

	                $followers_count = $this->followers_model->get_user_followers_count($user_data->user_id);
	                $this->session->set_userdata('follow_count', $followers_count);
	      		}
	    	}

	        $data['logout_url'] = site_url('logout'); // Logs off application
	        // OR 
	        // Logs off FB!
	        // $data['logout_url'] = $this->facebook->getLogoutUrl();

	    } else {
	        $data['login_url'] = $this->facebook->getLoginUrl(array(
	            'redirect_uri' => site_url('login'), 
	            'scope' => array("email") // permissions here
	        ));
	    }
	    // login with facebook end

		$this->login_check();
	    $this->load->view('user/login_fb', $data);

	}

	public function gp_login()
	{
		// Start session
		session_start();

		// Include two files from google-php-client library in controller
		include_once APPPATH . "libraries/google-api-php-client-master/src/Google/autoload.php";
		include_once APPPATH . "libraries/google-api-php-client-master/src/Google/Client.php";
		include_once APPPATH . "libraries/google-api-php-client-master/src/Google/Service/Oauth2.php";

// Store values in variables from project created in Google Developer Console
		$client_id = '659936846526-2gqt7pcknbquvjpdfnbal0jt1dd5k9aq.apps.googleusercontent.com';
		$client_secret = 'TJTwzth8FvNm8561DpevlvF-';
		$redirect_uri = base_url('user/gp_login');
		$simple_api_key = 'AIzaSyBvqIS6vI7c4bJmGssWHKBGSBUMwA7wQmE';

// Create Client Request to access Google API
		$client = new Google_Client();
		$client->setApplicationName("PHP Google OAuth Login Example");
		$client->setClientId($client_id);
		$client->setClientSecret($client_secret);
		$client->setRedirectUri($redirect_uri);
		$client->setDeveloperKey($simple_api_key);
		$client->addScope("https://www.googleapis.com/auth/userinfo.email");

// Send Client Request
		$objOAuthService = new Google_Service_Oauth2($client);

// Add Access Token to Session
		if (isset($_GET['code'])) {
			$client->authenticate($_GET['code']);
			$_SESSION['access_token'] = $client->getAccessToken();
			header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
		}

// Set Access Token to make Request
		if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
			$client->setAccessToken($_SESSION['access_token']);
		}

// Get User Data from Google and store them in $data
		if ($client->getAccessToken()) {
			$userData = $objOAuthService->userinfo->get();
			$data['userData'] = $userData;
			$_SESSION['access_token'] = $client->getAccessToken();

	    	$name = $userData->given_name;
	    	$email = $userData->email;
	    	$pass = sha1('LO' . date('Ymdhis'));
	    	$role = 1;
	    	$status = 1;
	    	$uid = $this->user_model->register($name, $email, $pass, $role, $status);
	    	if($uid) {
				$this->session->set_userdata('uid', $uid);
				$this->session->set_userdata('name', $name);
	  			$this->session->set_userdata('email', $email);
	  			$this->session->set_userdata('role', $role);

	  			$favourites_count = $this->favourites_model->get_user_favourites_count($uid);
                $this->session->set_userdata('fav_count', $favourites_count);

                $followers_count = $this->followers_model->get_user_followers_count($uid);
                $this->session->set_userdata('follow_count', $followers_count);
	    	}
	    	else {
	    		$user_data = $this->user_model->fb_login($email);
				if(count($user_data) && $user_data->user_status == 1) {

					$this->session->set_userdata('uid', $user_data->user_id);
					$this->session->set_userdata('name', $user_data->user_fname);
	      			$this->session->set_userdata('email', $user_data->user_email);
	      			$this->session->set_userdata('role', $user_data->user_role);

	      			$favourites_count = $this->favourites_model->get_user_favourites_count($user_data->user_id);
	                $this->session->set_userdata('fav_count', $favourites_count);

	                $followers_count = $this->followers_model->get_user_followers_count($user_data->user_id);
	                $this->session->set_userdata('follow_count', $followers_count);
	      		}
	    	}

		} else {
			$authUrl = $client->createAuthUrl();
			$data['authUrl'] = $authUrl;
		}

		$this->login_check();

// Load view and send values stored in $data
		$this->load->view('user/login_gp', $data);
	}
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */