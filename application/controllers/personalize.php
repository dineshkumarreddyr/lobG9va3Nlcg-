<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personalize extends CI_Controller {

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
		$this->load->model('followersmodel', 'followers_model');
		$this->load->model('personalizemodel', 'personalize_model');
		$this->load->model('lcategorymodel', 'lcategory_model');
	}

	public function login_check() {
	    $uid = $this->session->userdata('uid');
	    if(!isset($uid) || empty($uid)) {
	        redirect(base_url('login'));
	    }
	}

	public function index()
	{
		$this->login_check();
		$uid = $this->session->userdata('uid');

		// change profile pic
		if($this->input->post('submit_request')) {

			$name = addslashes(strip_tags($this->input->post('name')));
			$gender = addslashes(strip_tags($this->input->post('gender')));
			$occasion = addslashes(strip_tags($this->input->post('occasion')));
			$bodytype = addslashes(strip_tags($this->input->post('bodytype')));
			$bodytone = addslashes(strip_tags($this->input->post('bodytone')));
			$designer = addslashes(strip_tags($this->input->post('designer')));
			$budget = addslashes(strip_tags($this->input->post('budget')));
			$height = addslashes(strip_tags($this->input->post('height')));
			$specifications = addslashes(strip_tags($this->input->post('specifications')));


			if(isset($_FILES["fileToUpload"]["name"]) && !empty($_FILES["fileToUpload"]["name"])) {
				$target_dir = "uploads/personalize/";
				$pic_name = explode('.', basename($_FILES["fileToUpload"]["name"]));
				$pic_name = rand(0000, 9999) .'.'. $pic_name[1];
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

						$this->personalize_model->add_new($name, $gender, $occasion, $bodytype, $bodytone, $budget, $height, $specifications, $pic_name, $designer, $uid);
					} else {
						echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
					}
				}
			}
		}

		$followings = $this->followers_model->get_followings($uid);
		$designers_list = array();
		foreach ($followings as $key => $following) {
			$temp = array();
			$temp['text'] = $following->user_fname;
			$temp['value'] = $following->user_id;
			$temp['selected'] = 'false';
			$temp['description'] = '';
			$temp['imageSrc'] = base_url().'uploads/designers/'.$following->user_image;
			$designers_list[] = $temp;
		}

		$data['followings'] = json_encode($designers_list);
		$data['lcategories'] = $this->lcategory_model->get_lcategories();

		$seo = array(
			'title' => 'Personalize me',
			'description' => 'Personalize me',
			'keywords' => 'Personalize me'
			);
		$data['seo'] = $seo;

		$this->load->view('header', $data);
		$this->load->view('personalize/index', $data);
		$this->load->view('footer');
		
	}

}


/* End of file personalize.php */
/* Location: ./application/controllers/personalize.php */