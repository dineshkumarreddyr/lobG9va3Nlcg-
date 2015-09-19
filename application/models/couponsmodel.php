<?php
class Couponsmodel extends CI_Model {


  function __construct()
  {
        // Call the Model constructor
    parent::__construct();
    $this->load->database();
  }

  function get_coupons()
  {
      $query = $this->db->query("SELECT * FROM coupons WHERE c_status = '1'");
      $data = $query->result();
      return $data;
  }
}