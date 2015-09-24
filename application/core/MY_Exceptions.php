<?php
// application/core/MY_Exceptions.php
class MY_Exceptions extends CI_Exceptions {

    public function show_404()
    {
    	$seo = array(
			'title' => '404 page',
			'description' => '404 page',
			'keywords' => '404 page'
		);
		$data['seo'] = $seo;

        $CI =& get_instance();
        $CI->load->view('header', $data);
        $CI->load->view('pages/page_404');
        $CI->load->view('footer');
        echo $CI->output->get_output();
        exit;
    }
}