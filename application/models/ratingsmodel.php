<?php
class Ratingsmodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function get_rating($type = '', $type_id = 0) {

      $this->db->cache_off();
      $data = array(
        'rating_type' => $type,
        'rating_type_id' => $type_id
      );
      $this->db->select_avg('rating_rating');
      $query = $this->db->get_where('ratings', $data);
      
      return $query->row();  
    }

    function check_rating($type = '', $type_id = 0, $uid = 0, $ip = '') {
      $data = array(
        'rating_type' => $type,
        'rating_type_id' => $type_id,
        'rating_uid' => $uid,
        'rating_ip' => $ip
      );
      $query = $this->db->get_where('ratings', $data);
      return $query->num_rows();  
    }

    function post_rating($type = '', $type_id = 0, $uid = 0, $ip = '', $rating = 0, $createdOn = '') {
      $data = array(
        'rating_type' => $type,
        'rating_type_id' => $type_id,
        'rating_uid' => $uid,
        'rating_ip' => $ip,
        'rating_rating' => $rating,
        'rating_status' => '1',
        'createdOn' => $createdOn
      );
      $this->db->insert('ratings', $data);
    }

    function update_rating($type = '', $type_id = 0, $uid = 0, $ip = '', $rating = 0, $updatedOn = '') {
      $where = array(
        'rating_type' => $type,
        'rating_type_id' => $type_id,
        'rating_uid' => $uid,
        'rating_ip' => $ip
      );

      $data = array(
        'rating_rating' => $rating,
        'updatedOn' => $updatedOn
      );
      $this->db->where($where);
      $this->db->update('ratings', $data);
    }
}