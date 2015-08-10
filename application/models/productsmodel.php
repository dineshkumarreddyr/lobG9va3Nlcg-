<?php
class Productsmodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_products()
    {
        $query = $this->db->query("SELECT * FROM products LIMIT 0,20");        
        $data = $query->result();
        return $data;
    }

    function get_trending_products()
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
    }
}