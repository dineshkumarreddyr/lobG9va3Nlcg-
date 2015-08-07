<?php
class Productmodel extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_products()
    {
        $query = $this->db->query("SELECT p.p_id, p.p_storeId, p.p_name, p.p_status, pc.pc_name FROM products p, p_categories pc WHERE p.p_category = pc.pc_id");
        $data = $query->result();
        return $data;
    }

    function add($storeid = '', $name = '', $desc = '', $category = '0', $brand = '0', $provider = '0', $image = '', $url = '', $mrp = '0', $price = '0', $status = '0')
    {
        $data = array(
            'p_storeId' => $storeid,
            'p_name' => $name ,
            'p_desc' => $desc,
            'p_image' => $image,
            'p_url' => $url,
            'p_mrp' => $mrp,
            'p_price' => $price,
            'p_category' => $category,
            'p_brand' => $brand,
            'p_provider' => $provider,
            'p_status' => $status
            );
        $this->db->insert('products', $data);
        $product_id = $this->db->insert_id();
        return $product_id;
    }
}