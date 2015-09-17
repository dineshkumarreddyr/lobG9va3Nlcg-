<?php
class Favouritesmodel extends CI_Model {


  function __construct()
  {
        // Call the Model constructor
    parent::__construct();
    $this->load->database();
  }

  function add_to_favourites($id = 0, $type = '', $uid = 0, $createdOn) {
    $data = array(
     'f_type' => $type,
     'f_typeid' => $id,
     'f_uid' => $uid,
     'f_status' => '1',
     'createdOn' => $createdOn           
     );

    $this->db->insert('favourites', $data);            
  }

  function check_favourites($id = 0, $type = '', $uid = 0) {
    $data = array(
     'f_type' => $type,
     'f_typeid' => $id,
     'f_uid' => $uid
     );
    $query = $this->db->get_where('favourites', $data);
    return $query->num_rows();  
  }

  function get_user_favourites_count($uid) {
     $data = array(
     'f_uid' => $uid
     );
    $query = $this->db->get_where('favourites', $data);
    return $query->num_rows();
  }

}