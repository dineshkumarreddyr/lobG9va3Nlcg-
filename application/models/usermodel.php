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
    
    function fb_login($email = '')
    {
        $data = array();
        $query = $this->db->query("SELECT * FROM users WHERE user_email = '".$email."'");
        if ($query->num_rows() > 0) {
            $data = $query->first_row();
        }
        return $data;
    }

    function register($name = '', $email = '',$pass = '', $role = 1)
    {
        if($this->check_email($email)) {
            return FALSE;
        }
        else {
            $data = array();
            $data['user_fname'] = $name;
            $data['user_email'] = $email;
            $data['user_password'] = $pass;
            $data['user_role'] = $role;
            $query = $this->db->insert('users', $data);
            $uid = $this->db->insert_id();

            // inserting user details (creating blank record)
            $data = array('ud_uid' => $uid);
            $this->db->insert('user_details', $data);
            return $uid;
        }
    }

    function check_email($email = '') {
        $data = array();
        $query = $this->db->query("SELECT * FROM users WHERE user_email = '".$email."'");
        return $query->num_rows();
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
        $this->db->cache_on();
        $data = array();
        $query = $this->db->query("SELECT u.user_id, u.user_fname, u.user_lname, ud.user_image, ud.user_gender, ud.user_about, count(l.l_id) as l_count FROM users u INNER JOIN user_details ud ON u.user_id = ud.ud_uid AND u.user_role = 2 LEFT JOIN looks l ON u.user_id = l.l_uid  AND  l.l_status = '1' AND u.user_status = '1' GROUP BY u.user_id");
        $data = $query->result();
        return $data;        
    }

    function get_top_designers()
    {
        $this->db->cache_on();
        $data = array();
        $query = $this->db->query("SELECT u.user_id, u.user_fname, u.user_lname, ud.user_image, count(l.l_id) as l_count FROM users u, user_details ud, looks l WHERE u.user_id = l.l_uid AND u.user_id = ud.ud_uid AND l.l_status = '1' AND u.user_status = '1' AND u.user_role = 2 GROUP BY u.user_id LIMIT 4");
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

    function profile_update($uid, $name, $about, $gender, $location, $state, $mobile, $institution, $experience, $website) {
        
        $data = array(
           'user_fname' => $name
        );

        $this->db->where('user_id', $uid);
        $this->db->update('users', $data);

        $data = array(
           'user_about' => $about,
           'user_gender' => $gender,
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

    function update_user_basic_details($uid = 0, $first_name = '', $last_name = '', $dob = '', $address1 = '', $address2 = '', $location = '', $state = '', $pincode = '', $mobile = '') {
        
        $data = array(
           'user_fname' => $first_name,
           'user_lname' => $last_name
        );

        $this->db->where('user_id', $uid);
        $this->db->update('users', $data);

        $data = array(
           'user_dob' => date('Y-m-d', strtotime($dob)),
           'user_address1' => $address1,
           'user_address2' => $address2,
           'user_location' => $location,
           'user_state' => $state,
           'user_pincode' => $pincode,
           'user_mobile' => $mobile
        );

        $this->db->where('ud_uid', $uid);
        $this->db->update('user_details', $data);

        return TRUE; 
    }

    function update_user_full_details($uid = 0, $marital_status = '', $gender = '', $special_date = '', $shopping = '', $bill = '', $interests = '', $came_from = '') {
        
        $data = array(
           'user_marital_status' => $marital_status,
           'user_gender' => $gender,
           'user_special_date' => date('Y-m-d', strtotime($special_date)),
           'user_shop_online' => $shopping,
           'user_avg_bill' => $bill,
           'user_interests' => $interests,
           'user_came_from' => $came_from
        );

        $this->db->where('ud_uid', $uid);
        $this->db->update('user_details', $data);

        return TRUE; 
    }

    function update_user_pic($uid = 0, $pic_name = '') {
        $data = array(
           'user_image' => $pic_name
        );

        $this->db->where('ud_uid', $uid);
        $this->db->update('user_details', $data);

        return TRUE;
    }
}