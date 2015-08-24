<?php
class Usermodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function login($email = '',$pass = '')
    {
        $data = array();
        $query = $this->db->query("SELECT * FROM users WHERE user_email = '".$email."' AND user_password = '".$pass."'");
        if ($query->num_rows() > 0) {
            $data = $query->first_row();
        }
        return $data;
    }

    function get_designer($did = 0)
    {
        $data = array();
        $query = $this->db->query("SELECT u.*, ud.* FROM users u, user_details ud WHERE u.user_id = ud.ud_uid AND u.user_id = '".$did."' LIMIT 10");
        if ($query->num_rows() > 0) {
            $data = $query->first_row();
        }
        return $data;        
    }

    function get_designer_views($did = 0) {
        $query = $this->db->query("SELECT f_id as followers FROM followers WHERE f_did = '".$did."'");
        return $query->num_rows();
    }

    function get_designers()
    {
        $data = array();
        $query = $this->db->query("SELECT u.user_id, u.user_fname, u.user_lname, count(l.l_id) as l_count FROM users u, looks l WHERE u.user_id = l.l_uid AND l.l_status = '1' AND u.user_status = '1' AND u.user_role = 2");
        $data = $query->result();
        return $data;        
    }

    function get_top_designers()
    {
        $data = array();
        $query = $this->db->query("SELECT u.user_id, u.user_fname, u.user_lname, count(l.l_id) as l_count FROM users u, looks l WHERE u.user_id = l.l_uid AND l.l_status = '1' AND u.user_status = '1' AND u.user_role = 2");
        $data = $query->result();
        return $data;        
    }

    function subscription($email) {
        $data = array(
           's_email' => $email,
           's_ip' => $this->input->ip_address()
        );

        $this->db->insert('subscriptions', $data);            
    }

    function check_subscription($email) {
        $data = array(
           's_email' => $email
        );
        $query = $this->db->get_where('subscriptions', array('s_email' => $email));
        return $query->num_rows();  
    }

    function profile_update($uid, $name, $about, $location, $state, $mobile, $institution, $experience, $website) {
        
        $data = array(
           'user_fname' => $name
        );

        $this->db->where('user_id', $uid);
        $this->db->update('users', $data);

        $data = array(
           'user_about' => $about,
           'user_location' => $location,
           'user_state' => $state,
           'user_mobile' => $mobile,
           'user_institution' => $institution,
           'user_experience' => $experience,
           'user_website' => $website
        );

        $this->db->where('ud_uid', $uid);
        $this->db->update('user_details', $data);

        return TRUE; 
    }
}