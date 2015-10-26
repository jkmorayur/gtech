<?php

  if (!defined('BASEPATH'))
       exit('No direct script access allowed');

  class Product_model extends CI_Model {

       public function __construct() {
            parent::__construct();
            $this->load->database();
            $this->table = 'gtech_products';
            $this->children = array();
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

       public function getProducts($id = '', $homePageProduct = false, $limit = '', $start = '') {
            $products = array();
            
            $this->db->select($this->table . '.*, gtech_category.cat_id AS sub_category,gtech_category.cat_title AS sub_category_name , gtech_brand.*, '
                    . 'cat1.cat_id AS category_id, cat1.cat_title AS category_name')->from($this->table);
            $this->db->join('gtech_brand', 'gtech_brand.brd_id = ' . $this->table . '.prd_brand', 'left');
            $this->db->join('gtech_category', 'gtech_category.cat_id = ' . $this->table . '.prd_category ', 'left');
            $this->db->join('gtech_category cat1', 'cat1.cat_id = ' . 'gtech_category.cat_parent ', 'left');
            if ($id) {
                 $this->db->where($this->table . '.prd_id', $id);
            }
            if ($homePageProduct) {
                 $this->db->where($this->table . '.prd_show_on_home', 1);
            }
            if (!empty($limit)) {
                 $this->db->limit($limit, $start);
            }
            $productsArray = $this->db->get()->result_array();

            if (!empty($productsArray)) {
                 foreach ($productsArray as $key => $value) {
                      $prodImages = $this->db->get_where('gtech_prod_images', array('pdi_prod_id' => $value['prd_id']))->result_array();
                      $prodSpecifications = $this->db->order_by("spe_id", "asc")->get_where('gtech_prod_specifications', array('spe_prod_id' => $value['prd_id']))->result_array();
                      $value['product_image'] = $prodImages;
                      $value['product_specification'] = $prodSpecifications;
                      $prodDocs = $this->db->get_where('gtech_prod_docs', array('pdc_prod_id' => $value['prd_id']))->result_array();
                      $value['product_docs'] = $prodDocs;
                      $products['product_details'][] = $value;
                 }
            }
            return $products;
       }

       public function getProductsBySubCategory($catId) {
            $products = array();
            $this->db->select($this->table . '.*, gtech_category.cat_id AS sub_category,gtech_category.cat_title AS sub_category_name , gtech_brand.*, '
                    . 'cat1.cat_id AS category_id, cat1.cat_title AS category_name')->from($this->table);
            $this->db->join('gtech_brand', 'gtech_brand.brd_id = ' . $this->table . '.prd_brand', 'left');
            $this->db->join('gtech_category', 'gtech_category.cat_id = ' . $this->table . '.prd_category ', 'left');
            $this->db->join('gtech_category cat1', 'cat1.cat_id = ' . 'gtech_category.cat_parent ', 'left');
            if ($catId) {
                 $this->db->where($this->table . '.prd_category', $catId);
            }

            $productsArray = $this->db->get()->result_array();

            if (!empty($productsArray)) {
                 foreach ($productsArray as $key => $value) {
                      $prodImages = $this->db->get_where('gtech_prod_images', array('pdi_prod_id' => $value['prd_id']))->result_array();
                      $prodSpecifications = $this->db->get_where('gtech_prod_specifications', array('spe_prod_id' => $value['prd_id']))->result_array();
                      $value['product_image'] = $prodImages;
                      $value['product_specification'] = $prodSpecifications;
                      $prodDocs = $this->db->get_where('gtech_prod_docs', array('pdc_prod_id' => $value['prd_id']))->result_array();
                      $value['product_docs'] = $prodDocs;
                      $products['product_details'][] = $value;
                 }
            }
            return $products;
       }

       public function getProductsByCategory($catId, $brandId = 0, $limit = '', $start = '') {
            $products = array();
            
            if (!empty($catId)) {
                 $childrens = $this->getAllSubCategories($catId);
                 $childrens[] = $catId;
                 $products = array();
                 $this->db->select($this->table . '.*, gtech_category.cat_id AS sub_category,gtech_category.cat_title AS sub_category_name , gtech_brand.*, '
                         . 'cat1.cat_id AS category_id, cat1.cat_title AS category_name')->from($this->table);
                 $this->db->join('gtech_brand', 'gtech_brand.brd_id = ' . $this->table . '.prd_brand', 'left');
                 $this->db->join('gtech_category', 'gtech_category.cat_id = ' . $this->table . '.prd_category ', 'left');
                 $this->db->join('gtech_category cat1', 'cat1.cat_id = ' . 'gtech_category.cat_parent ', 'left');
                 if ($catId) {
                      $this->db->where_in($this->table . '.prd_category', $childrens);
                 }
                 if (!empty($brandId) && $brandId != 0) {
                      $this->db->where($this->table . '.prd_brand', $brandId);
                 }
                 if (!empty($limit)) {
                      $this->db->limit($limit, $start);
                 }

                 $productsArray = $this->db->get()->result_array();
                 
                 if (!empty($productsArray)) {
                      foreach ($productsArray as $key => $value) {
                           $prodImages = $this->db->get_where('gtech_prod_images', array('pdi_prod_id' => $value['prd_id']))->result_array();
                           $prodSpecifications = $this->db->get_where('gtech_prod_specifications', array('spe_prod_id' => $value['prd_id']))->result_array();
                           $value['product_image'] = $prodImages;
                           $value['product_specification'] = $prodSpecifications;
                           $prodDocs = $this->db->get_where('gtech_prod_docs', array('pdc_prod_id' => $value['prd_id']))->result_array();
                           $value['product_docs'] = $prodDocs;
                           $products['product_details'][] = $value;
                      }
                 }
            }
            return $products;
       }

       function getAllSubCategories($catid) {

            if ($catid) {
                 $data = $this->db->select('*')->where('cat_parent', $catid)->get('gtech_category')->result_array();
                 if (!empty($data)) {
                      $this->getAllSubCategories($data['0']['cat_id']);
                      $this->children[] = $data['0']['cat_id'];
                 }
            }
            return $this->children;
       }

       function getProductsByBrand($brandId, $limit = '', $start = '') {
//            $products['product_details'] = array();
//            if($brandId) {
//                 $products['product_details'] = $this->db->select('*')->
//                         from($this->table)->where('prd_brand', $brandId)->get()->
//                         result_array();
//            }
//            return $products;
            $products = array();
            $this->db->select($this->table . '.*, gtech_category.cat_id AS sub_category,gtech_category.cat_title AS sub_category_name , gtech_brand.*, '
                    . 'cat1.cat_id AS category_id, cat1.cat_title AS category_name')->from($this->table);
            $this->db->join('gtech_brand', 'gtech_brand.brd_id = ' . $this->table . '.prd_brand', 'left');
            $this->db->join('gtech_category', 'gtech_category.cat_id = ' . $this->table . '.prd_category ', 'left');
            $this->db->join('gtech_category cat1', 'cat1.cat_id = ' . 'gtech_category.cat_parent ', 'left');

            if (!empty($brandId) && $brandId != 0) {
                 $this->db->where($this->table . '.prd_brand', $brandId);
            }
            if (!empty($limit)) {
                 $this->db->limit($limit, $start);
            }
            $productsArray = $this->db->get()->result_array();
            $this->db->last_query();
            if (!empty($productsArray)) {
                 foreach ($productsArray as $key => $value) {
                      $prodImages = $this->db->get_where('gtech_prod_images', array('pdi_prod_id' => $value['prd_id']))->result_array();
                      $prodSpecifications = $this->db->get_where('gtech_prod_specifications', array('spe_prod_id' => $value['prd_id']))->result_array();
                      $value['product_image'] = $prodImages;
                      $value['product_specification'] = $prodSpecifications;
                      $prodDocs = $this->db->get_where('gtech_prod_docs', array('pdc_prod_id' => $value['prd_id']))->result_array();
                      $value['product_docs'] = $prodDocs;
                      $products['product_details'][] = $value;
                 }
            }
            return $products;
       }

//       public function getFeaturedProducts($id = '', $featuredProduct = false) {
//            $products = array();
//            $this->db->select($this->table . '.*, gtech_category.cat_id AS sub_category,gtech_category.cat_title AS sub_category_name , gtech_brand.*, '
//                    . 'cat1.cat_id AS category_id, cat1.cat_title AS category_name')->from($this->table);
//            $this->db->join('gtech_brand', 'gtech_brand.brd_id = ' . $this->table . '.prd_brand', 'left');
//            $this->db->join('gtech_category', 'gtech_category.cat_id = ' . $this->table . '.prd_category ', 'left');
//            $this->db->join('gtech_category cat1', 'cat1.cat_id = ' . 'gtech_category.cat_parent ', 'left');
//            if ($id) {
//                 $this->db->where($this->table . '.prd_id', $id);
//            }
//            if ($featuredProduct) {
//                 $this->db->where($this->table . '.prd_is_featured', 1);
//            }
//            $productsArray = $this->db->get()->result_array();
//
//            if (!empty($productsArray)) {
//                 foreach ($productsArray as $key => $value) {
//                      $prodImages = $this->db->get_where('gtech_prod_images', array('pdi_prod_id' => $value['prd_id']))->result_array();
//                      $prodSpecifications = $this->db->get_where('gtech_prod_specifications', array('spe_prod_id' => $value['prd_id']))->result_array();
//                      $value['product_image'] = $prodImages;
//                      $value['product_specification'] = $prodSpecifications;
//                      $products['product_details'][] = $value;
//                 }
//            }
//            return $products;
//       }
       public function getFeaturedProducts($id = '', $brandId = '', $limit = '', $start = '') {
            $products = array();
            $this->db->select($this->table . '.*, gtech_category.cat_id AS sub_category,gtech_category.cat_title AS sub_category_name , gtech_brand.*, '
                    . 'cat1.cat_id AS category_id, cat1.cat_title AS category_name')->from($this->table);
            $this->db->join('gtech_brand', 'gtech_brand.brd_id = ' . $this->table . '.prd_brand', 'left');
            $this->db->join('gtech_category', 'gtech_category.cat_id = ' . $this->table . '.prd_category ', 'left');
            $this->db->join('gtech_category cat1', 'cat1.cat_id = ' . 'gtech_category.cat_parent ', 'left');
            if ($id) {
                 $this->db->where($this->table . '.prd_id', $id);
            }
            if (!empty($brandId) && $brandId != 0) {
                 $this->db->where($this->table . '.prd_brand', $brandId);
            }
            $this->db->where($this->table . '.prd_is_featured', 1);
            if (!empty($limit)) {
                 $this->db->limit($limit, $start);
            }
            $productsArray = $this->db->get()->result_array();

            if (!empty($productsArray)) {
                 foreach ($productsArray as $key => $value) {
                      $prodImages = $this->db->get_where('gtech_prod_images', array('pdi_prod_id' => $value['prd_id']))->result_array();
                      $prodSpecifications = $this->db->get_where('gtech_prod_specifications', array('spe_prod_id' => $value['prd_id']))->result_array();
                      $value['product_image'] = $prodImages;
                      $value['product_specification'] = $prodSpecifications;
                      $prodDocs = $this->db->get_where('gtech_prod_docs', array('pdc_prod_id' => $value['prd_id']))->result_array();
                      $value['product_docs'] = $prodDocs;
                      $products['product_details'][] = $value;
                 }
            }
            return $products;
       }

       public function relatedProducts($catId, $brand = 0, $prodId = 0, $limit = '', $start = '') {
            $products = array();
            if (!empty($catId)) {
                 $childrens = $this->getAllSubCategories($catId);
                 $childrens[] = $catId;
                 $products = array();
                 $this->db->select($this->table . '.*, gtech_category.cat_id AS sub_category,gtech_category.cat_title AS sub_category_name , gtech_brand.*, '
                         . 'cat1.cat_id AS category_id, cat1.cat_title AS category_name')->from($this->table);
                 $this->db->join('gtech_brand', 'gtech_brand.brd_id = ' . $this->table . '.prd_brand', 'left');
                 $this->db->join('gtech_category', 'gtech_category.cat_id = ' . $this->table . '.prd_category ', 'left');
                 $this->db->join('gtech_category cat1', 'cat1.cat_id = ' . 'gtech_category.cat_parent ', 'left');
                 if ($catId) {
                      $this->db->where_in($this->table . '.prd_category', $childrens);
                 }
                 if ($prodId) {
                      $this->db->where($this->table . '.prd_id !=', $prodId);
                 }
                 if (!empty($brand) && $brand != 0) {
                      $this->db->where($this->table . '.prd_brand', $brand);
                 }
                 if (!empty($limit)) {
                      $this->db->limit($limit, $start);
                 }
                 $productsArray = $this->db->get()->result_array();

                 if (!empty($productsArray)) {
                      foreach ($productsArray as $key => $value) {
                           $prodImages = $this->db->get_where('gtech_prod_images', array('pdi_prod_id' => $value['prd_id']))->result_array();
                           $prodSpecifications = $this->db->get_where('gtech_prod_specifications', array('spe_prod_id' => $value['prd_id']))->result_array();
                           $value['product_image'] = $prodImages;
                           $value['product_specification'] = $prodSpecifications;
                           $prodDocs = $this->db->get_where('gtech_prod_docs', array('pdc_prod_id' => $value['prd_id']))->result_array();
                           $value['product_docs'] = $prodDocs;
                           $products['product_details'][] = $value;
                      }
                 }
            }
            return $products;
       }

       function getProductsByCategoryForSitemap($catid) {

            $this->db->select('*')->from($this->table);
            if ($catid) {
                 $this->db->where('prd_category', $catid);
            }
            return $this->db->get()->result_array();
       }
} 