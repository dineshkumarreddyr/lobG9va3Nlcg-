<?php
class Followersmodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_followers_count($did = 0)
    {
        $query = $this->db->query("SELECT f_id as followers FROM followers WHERE f_did = '".$did."'");
        return $query->num_rows();
    }

    function get_followings($uid = 0) {
      $query = $this->db->query("SELECT u.user_id, u.user_fname, u.user_lname, ud.user_image, ud.user_gender, ud.user_about, count(l.l_id) as l_count FROM users u INNER JOIN user_details ud ON u.user_id = ud.ud_uid AND u.user_role = 2  AND u.user_status = '1' INNER JOIN followers f ON f.f_did = u.user_id AND f.f_uid = ".$uid." LEFT JOIN looks l ON u.user_id = l.l_uid  AND  l.l_status = '1' GROUP BY u.user_id");
      return $query->result();
    }

    function get_user_followers_count($uid = 0) {
      $data = array(
       'f_uid' => $uid
      );
      $query = $this->db->get_where('followers', $data);
      return $query->num_rows();
    }

    function follow($did = 0, $uid = 0, $createdOn) {
        $data = array(
           'f_did' => $did,
           'f_uid' => $uid,
           'f_status' => '1',
           'createdOn' => $createdOn           
        );

        $this->db->insert('followers', $data);            
    }

    function check_follow($did = 0, $uid = 0) {
        $data = array(
           'f_did' => $did,
           'f_uid' => $uid
        );
        $query = $this->db->get_where('followers', $data);
        return $query->num_rows();  
    }



}