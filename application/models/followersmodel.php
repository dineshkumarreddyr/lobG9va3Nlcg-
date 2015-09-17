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