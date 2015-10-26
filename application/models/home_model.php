<?php

  if (!defined('BASEPATH'))
       exit('No direct script access allowed');

  class Home_model extends CI_Model {

       public function __construct() {
            parent::__construct();
            $this->load->database();
            $this->table = 'gtech_category';
       }
       
       public function getCategories($id = '') {

            $this->db->select("gcat.cat_parent AS cat_parent, gcat.cat_desc AS category_desc, gcat.cat_title AS category_name, gcat.cat_id AS cat_id, gcat2.cat_title AS parent_category");
            $this->db->from('gtech_category gcat');
            $this->db->join('gtech_category gcat2', 'gcat.cat_parent = gcat2.cat_id', 'left');
            if (!empty($id)) {
                 $this->db->where('gcat.cat_id', $id);
            }
            $categories = $this->db->get()->result_array();
            return $categories;
       }
       
       public function getParentCategories($id = '') {
            $this->db->select('*')->from($this->table);
            $this->db->where('cat_parent' , 0);
            if($id) {
                 $this->db->where('cat_id', $id);
                 return $this->db->get()->row_array();
            } else {
                 return $this->db->get()->result_array();
            }
       }
       
       public function search($key, $limit = '', $start = '') {
            /* Search on category */
            $matchingCategories = $this->db->select('GROUP_CONCAT(cat_id) as cat_id', false)->from('gtech_category')->like('cat_title', $key, 'both')->get()->row_array();
            /* Search on category */
            
            $products = array();
            $this->db->select('gtech_products.*, gtech_category.cat_id AS sub_category,gtech_category.cat_title AS sub_category_name , gtech_brand.*, '
                    . 'cat1.cat_id AS category_id, cat1.cat_title AS category_name')->from('gtech_products');
            $this->db->join('gtech_brand', 'gtech_brand.brd_id = gtech_products.prd_brand', 'left');
            $this->db->join('gtech_category', 'gtech_category.cat_id = gtech_products.prd_category ', 'left');
            $this->db->join('gtech_category cat1', 'cat1.cat_id = ' . 'gtech_category.cat_parent ', 'left');
            if ($key) {
                 $this->db->like('gtech_products.prd_name', $key, 'both'); 
                 $this->db->or_like('gtech_products.prd_part_number', $key, 'both'); 
            }
            if(isset($matchingCategories['cat_id']) && !empty($matchingCategories['cat_id'])) {
                 $this->db->or_where_in('gtech_products.prd_category', $matchingCategories['cat_id']);
            }
            if (!empty($limit)) {
                 $this->db->limit($limit, $start);
            }
            $this->db->get()->result_array();
            $qry = $this->db->last_query();
            $finalQuery = str_replace('AND', 'OR', $qry);
            $productsArray = $this->db->query($finalQuery)->result_array();  
            
            
            if (!empty($productsArray)) {
                 foreach ($productsArray as $key => $value) {
                      $prodImages = $this->db->get_where('gtech_prod_images', array('pdi_prod_id' => $value['prd_id']))->result_array();
                      $prodSpecifications = $this->db->get_where('gtech_prod_specifications', array('spe_prod_id' => $value['prd_id']))->result_array();
                      $value['product_image'] = $prodImages;
                      $value['product_specification'] = $prodSpecifications;
                      $products['product_details'][] = $value;
                 }
            }
            return $products;
       }
       
       public function getSubCategories($id = '') {
            $this->db->select('*')->from($this->table);
            $this->db->where('cat_parent', $id);
            return $this->db->get()->result_array();
       }
       
        function newsletter($email) {
            if(!empty($email)) {
                 $this->db->insert('gtech_newsletter', array('nltr_email' => $email));
                 return true;
            } else {
                 return false;
            }
       }
  } 