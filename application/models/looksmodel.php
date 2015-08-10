<?php
class Looksmodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    // get all looks
    function get_looks()
    {
        $query = $this->db->query("SELECT * FROM looks WHERE l_status = '1'");
        $data = $query->result();
        return $data;
    }

    // get look products by look id
    function get_look_products($l_id = 0)
    {
        $query = $this->db->query("SELECT p.p_image FROM l_products lp, products p WHERE lp.lp_pid = p.p_id AND lp_lid = ".intval($l_id));
        $data = $query->result();
        return $data;
    }

    // check look name is already exists or not
    function check_look_name($l_category = 0, $l_name = '')
    {
        $query = $this->db->query("SELECT * FROM looks WHERE l_category = ".$l_category." AND l_name = '".$l_name."'");
        $data = $query->num_rows();
        return $data;
    }
    
    // create look with basic details look name, category, grid based on products
    function create_look($l_category = 0, $l_name = '', $l_grid = 0, $l_uid = 0)
    {
        $data = array(
           'l_name' => $l_name ,
           'l_category' => $l_category,
           'l_grid' => $l_grid,
           'l_uid' => $l_uid
        );
        $this->db->insert('looks', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function insert_lproducts($l_id = 0, $l_pids = '') {
        $l_pids = json_decode($l_pids);
        $data = array();
        
        foreach ($l_pids as $key => $l_pid) {
            $data[] = array(
                'lp_lid' => $l_id,
                'lp_pid' => $l_pid,
                'lp_status' => '1'
            );
        }
        $this->db->insert_batch('l_products', $data);
    }

    /*function get_trending_products()
    {
        $query = $this->db->query("SELECT * FROM products LIMIT 0,8");        
        $data = $query->result();
        return $data;
    }

    function get_product($product_id = 0)
    {
        $query = $this->db->query("SELECT p.p_id, p.p_storeId, p.p_name, p.p_desc, p.p_image, p.p_url, p.p_mrp, p.p_price, p.p_category, pc.pc_name, b.brand_name, pro.provider_name FROM products p, p_categories pc, brands b, providers pro WHERE p.p_category = pc.pc_id AND p.p_brand = b.brand_id AND p.p_provider = pro.provider_id AND p.p_id = ".$product_id);
        $data = $query->row_array();
        return $data;
    }*/
}