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
        $query = $this->db->query("SELECT * FROM products ORDER BY RAND() LIMIT 0,20");        
        $data = $query->result();
        return $data;
    }

    function get_trending_products()
    {
        $query = $this->db->query("SELECT * FROM products ORDER BY RAND() LIMIT 0,8");        
        $data = $query->result();
        return $data;
    }

    function get_rproducts($cat = 0) {
        $query = $this->db->query("SELECT * FROM products WHERE p_category = ".$cat." ORDER BY RAND() LIMIT 0,8");        
        $data = $query->result();
        return $data;
    }

    function get_product($product_id = 0)
    {
        $query = "SELECT p.p_id, p.p_storeId, p.p_name, p.p_desc, p.p_image, p.p_size, p.p_oimage, p.p_url, p.p_mrp, p.p_price, p.p_category, pc.pc_name, b.brand_name, pro.provider_name FROM products p, p_categories pc, brands b, providers pro WHERE p.p_category = pc.pc_id AND p.p_brand = b.brand_id AND p.p_provider = pro.provider_id AND p.p_id = ".$product_id;
        $query = $this->db->query($query);
        $data = $query->row_array();
        return $data;
    }

    function s_products($pdt = '', $gen = '', $cat = array())
    {
        $condition = array();
        if($pdt != '') {
            $condition[] = " p.p_name LIKE '%".$pdt."%' "; 
        }
        else {
            $condition[] = " p.p_name != '' "; 
        }
        if($gen != '') {
            $condition[] = " p.p_gender = '".$gen."' "; 
        }
        if(count($cat)) {
            $condition[] = " p.p_category in (".implode(',', $cat).") "; 
        }
        $condition = implode(' AND ', $condition);

        $query = "SELECT p.p_id, p.p_name, p.p_image, p.p_mrp, p.p_price, p.p_category FROM products p WHERE " .$condition. " ORDER BY RAND()";
        $query = $this->db->query($query);
        $data = $query->result();
        return $data;
    }

    function pf_products($f_cat = array(), $f_prov = array())
    {
        $condition = array();
        $condition[] = " p.p_name != '' "; 

        if(count($f_cat) && is_array($f_cat)) {
            $condition[] = " p.p_category in (".implode(',', $f_cat).") "; 
        }
        if(count($f_prov) && is_array($f_prov)) {
            $condition[] = " p.p_provider in (".implode(',', $f_prov).") "; 
        }
        $condition = implode(' AND ', $condition);

        $query = "SELECT p.p_id, p.p_name, p.p_image, p.p_mrp, p.p_price, p.p_category FROM products p WHERE " .$condition." ORDER BY RAND()";
        $query = $this->db->query($query);
        $data = $query->result();
        return $data;
    }
}