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

  function get_fav_products($uid = 0)
  {
      $query = $this->db->query("SELECT p.* FROM products p, favourites f WHERE f.f_type = 'product' AND f.f_typeid = p.p_id AND f.f_uid = '".$uid."' AND p.p_status = '1' ORDER BY RAND() LIMIT 0,8");        
      $data = $query->result();
      return $data;
  }

  function get_fav_looks($uid = 0)
  {
      $query = $this->db->query("SELECT l.*, u.user_fname, ud.user_image FROM looks l, users u, user_details ud,  favourites f WHERE u.user_id = l.l_uid AND u.user_id = ud.ud_uid AND f.f_type = 'look' AND f.f_typeid = l.l_id AND  l.l_status = '1' AND f.f_uid = '".$uid."'");        
      $data = $query->result();
      return $data;
  }

}