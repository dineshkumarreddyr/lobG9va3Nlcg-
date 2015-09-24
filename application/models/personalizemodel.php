<?php
class Personalizemodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function add_new($name = '', $gender = '', $occasion = 0, $bodytype = '', $bodytone = '', $budget = '', $height = '', $specifications = '', $pic_name = '', $designer = 0, $uid = 0)
    {
        $data = array();
        $data['p_name'] = $name;
        $data['p_gender'] = $gender;
        $data['p_occasion'] = $occasion;
        $data['p_bodytype'] = $bodytype;
        $data['p_bodytone'] = $bodytone;
        $data['p_budget'] = $budget;
        $data['p_height'] = $height;
        $data['p_specifications'] = $specifications;
        $data['p_image'] = $pic_name;
        $data['p_designer'] = $designer;
        $data['p_uid'] = $uid;
        $query = $this->db->insert('personalize', $data);
        $pid = $this->db->insert_id();
        return $pid;
    }
}