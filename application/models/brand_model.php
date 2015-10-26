<?php

  if (!defined('BASEPATH'))
       exit('No direct script access allowed');

  class Brand_model extends CI_Model {

       public function __construct() {
            parent::__construct();
            $this->load->database();
            $this->table = 'gtech_brand';
       }

       public function getBrands($id = '') {

            if (!empty($id)) {
                 $this->db->select("*");
                 $this->db->from($this->table);
                 $this->db->where('brd_id', $id);
                 $this->db->order_by('brd_title', 'asc');
                 $brands = $this->db->get()->result_array();
            } else {
                 $this->db->select('gtech_brand.*,  count(gtech_products.prd_id) AS prd_count')
                         ->from('gtech_brand')->join('gtech_products','gtech_products.prd_brand = gtech_brand.brd_id','left')
                         ->group_by('gtech_brand.brd_id')->order_by('gtech_brand.brd_title','ASC');
                 $brands = $this->db->get()->result_array();
            }
            return $brands;
       }

       public function getCount() {
            return $this->db->count_all($this->table);
       }

       public function getBrandPagination($perPage, $offset) {
            return $this->db->get($this->table, $perPage, $offset)->result_array();
       }

       /* 22-08-2015 */

       function getBrandByName($name) {
            $name = str_replace('_', ' ', strtolower($name));
            if ($name) {
                 $this->db->select('*')->from($this->table);
                 $this->db->where('brd_title', $name);
                 return $this->db->get()->row_array();
                 //echo $this->db->last_query();
            } else {
                 return null;
            }
       }

       /* 22-08-2015 */
       /* 24-10-2015 */

       function getBrandsAssociatedwithCategory($categoryId) {
            if ($categoryId) {

                 $result = $this->db->query('SELECT GROUP_CONCAT(prd_brand) AS prd_brand FROM (SELECT DISTINCT prd_brand'
                                 . ' FROM gtech_products WHERE prd_category = ' . $categoryId . ') b')->row_array();
                 if (isset($result['prd_brand']) && !empty($result['prd_brand'])) {
                      return explode(',', $result['prd_brand']);
                 } else {
                      return false;
                 }
            } else {
                 return false;
            }
       }

       function getAllBrandsIfProductsExists() {

            $brands = $this->db->select('gtech_brand.brd_id AS brand')
                            ->from('gtech_brand')->join('gtech_products', 'gtech_products.prd_brand = gtech_brand.brd_id')
                            ->group_by('gtech_brand.brd_id')->having('count(gtech_products.prd_id) > 0')->get()->result_array();
            $return = array();
            if (!empty($brands)) {
                 foreach ($brands as $key => $value) {
                      $return[] = $value['brand'];
                 }
            }
            return $return;
       }

       /* 24-10-2015 */
  }
  