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

    // get all looks by designer
    function get_designer_looks($did = 0)
    {
        $query = $this->db->query("SELECT * FROM looks WHERE l_status = '1' AND l_uid = ". intval($did));
        $data = $query->result();
        return $data;
    }

    // get look details by look id
    function look_details($lid = 0)
    {
        $query = $this->db->query("SELECT l.*, lc.lc_name, u.user_id, u.user_fname, ud.user_image, count(DISTINCT(lv.lv_ip)) as lv_count FROM looks l, l_categories lc, users u, user_details ud, l_views lv WHERE lv.lv_lookId = l.l_id AND u.user_id = l.l_uid AND u.user_id = ud.ud_uid AND l.l_category = lc.lc_id AND l.l_status = '1' AND l.l_id = ". intval($lid) ." ");
        $data = $query->result();
        return $data;
    }

    // get looks by popular designer
    function by_popular_designers()
    {
        $query = $this->db->query("SELECT l.*, u.user_fname, ud.user_image FROM looks l, users u, user_details ud WHERE u.user_id = l.l_uid AND u.user_id = ud.ud_uid AND l.l_status = '1' LIMIT 8");
        $data = $query->result();
        return $data;
    }

    // get look products by look id
    function get_look_products($l_id = 0)
    {
        $query = $this->db->query("SELECT p.p_id, p.p_image, p.p_name, p.p_mrp, p.p_price, p.p_url FROM l_products lp, products p WHERE lp.lp_pid = p.p_id AND lp_lid = ".intval($l_id));
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
    function create_look($l_category = 0, $l_name = '', $l_grid = 0, $l_uid = 0, $l_price = 0, $l_gender = '')
    {
        $data = array(
           'l_name' => $l_name ,
           'l_category' => $l_category,
           'l_gender' => $l_gender,
           'l_grid' => $l_grid,
           'l_uid' => $l_uid,
           'l_price' => $l_price,
           'l_status' => '1'
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

    function s_looks($look = '', $gender = '', $category = 0)
    {
        $condition = array();
        if($look != '') {
            $condition[] = " l.l_name LIKE '%".$look."%' "; 
        }
        else {
            $condition[] = " l.l_name != ''";
        }
        if($gender != '') {
            $condition[] = " l.l_gender = '".$gender."' "; 
        }
        if($category != '') {
            $condition[] = " l.l_category = ".$category." "; 
        }
        $condition[] = " l.l_status = '1' ";
        $condition = implode(' AND ', $condition);

        $query = "SELECT l.* FROM looks l WHERE " .$condition;
        $query = $this->db->query($query);
        $data = $query->result();
        return $data;
    }

    function f_products($gen = '', $cat = array(), $prov = 0, $brd = 0, $name = '', $dis = '')
    {
        $condition = array();
        if($name != '') {            
            $condition[] = " p.p_name LIKE '%".$name."%'";
        } else {
            $condition[] = " p.p_name != ''";
        }
        if($gen != '') {
            $condition[] = " p.p_gender LIKE '".$gen."' "; 
        }
        if(count($cat)) {
            $condition[] = " p.p_category in (".implode(',', $cat).") "; 
        }
        if($prov != '') {
            $condition[] = " p.p_provider = ".$prov." "; 
        }
        if($brd != '') {
            $condition[] = " p.p_brand = ".$brd." "; 
        }
        if($dis != '') {
            $dis = explode('-', $dis);
            $condition[] = " ((p.p_price/p.p_mrp)*100 > ".$dis[0]." AND (p.p_price/p.p_mrp)*100 < ".$dis[1].") "; 
        }
        $condition = implode(' AND ', $condition);

        $query = "SELECT p.p_id, p.p_name, p.p_image, p.p_mrp, p.p_price, p.p_category FROM products p WHERE " .$condition. " ORDER BY RAND() ";
        $query = $this->db->query($query);
        $data = $query->result();
        return $data;
    }

    function lf_looks($l_cat = array())
    {
        $condition = array();
        $condition[] = " l.l_name != ''";
        if(count($l_cat) && is_array($l_cat)) {
            $condition[] = " l.l_category in (".implode(',', $l_cat).") "; 
        }
        $condition[] = " l.l_status = '1' ";
        $condition = implode(' AND ', $condition);

        $query = "SELECT l.* FROM looks l WHERE " .$condition;
        $query = $this->db->query($query);
        $data = $query->result();
        return $data;
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