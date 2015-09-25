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
    $this->db->cache_on();
      $query = $this->db->query("SELECT * FROM coupons WHERE c_status = '1'");
      $data = $query->result();
      return $data;
  }

  function view_coupon($c_id = 0)
  {
    $this->db->cache_on();
      $query = $this->db->query("SELECT * FROM coupons WHERE c_id = ".intval($c_id));
      $data = $query->result();
      return $data;
  }
}