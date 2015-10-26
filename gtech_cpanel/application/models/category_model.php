<?php

  if (!defined('BASEPATH'))
       exit('No direct script access allowed');

  class Category_model extends CI_Model {

       public function __construct() {
            parent::__construct();
            $this->load->database();
            $this->table = 'gtech_category';
       }

       public function addNewCategory($datas) {
            if ($this->db->insert($this->table, $datas)) {
                 return true;
            } else {
                 return false;
            }
       }

       public function getCategoryChaild($parent, $idNotin = '') {

            $this->db->select("cat_id, cat_title");
            $this->db->where('cat_parent', $parent);
            if (!empty($idNotin)) {
                 $this->db->where('cat_id !=', $idNotin);
            }
            $result = $this->db->get($this->table)->result_array();
            return $result;
       }

       public function getCategories($id = '') {

            $this->db->select("gcat.cat_image AS cat_image, gcat.cat_parent AS cat_parent, gcat.cat_desc AS category_desc, gcat.cat_title AS category_name, gcat.cat_id AS cat_id, gcat2.cat_title AS parent_category");
            $this->db->from('gtech_category gcat');
            $this->db->join('gtech_category gcat2', 'gcat.cat_parent = gcat2.cat_id', 'left');
            if (!empty($id)) {
                 $this->db->where('gcat.cat_id', $id);
                 return $this->db->get()->row_array();
            } else {
                 return $this->db->get()->result_array();
            }
       }

       public function updateCategory($datas) {
            $this->db->where('cat_id', $datas['cat_id']);
            unset($datas['cat_id']);
            if($this->db->update($this->table, $datas)) {
                 return true;
            } else {
                 return false;
            }
       }
       
       public function deleteCategory($id) {
            $this->db->where('cat_id', $id);
            if($this->db->delete($this->table)) {
                 $this->db->where('cat_parent', $id);
                 $this->db->delete($this->table);
                 return true;
            } else {
                 return false;
            }
       }
       
       public function categoryTree() {
            
            $this->db->select("cat.cat_id AS category_id, cat.cat_title AS category_name, cat2.cat_title AS parent_category_name, cat2.cat_id AS parent_category_id")
                    ->from('gtech_category cat')
                    ->join('gtech_category cat2','cat.cat_parent = cat2.cat_id','LEFT')
                    ->order_by('parent_category_name');
            $tree = $this->db->get()->result_array();
            return $tree;
       }
       
       public function removeCategoryImage($id) {
            if ($id) {
                 $this->db->where('cat_id', $id);
                 $image = $this->db->get($this->table)->result_array();
                 $image = isset($image['0']) ? $image['0'] : array();
                 if (isset($image['cat_image']) && !empty($image['cat_image'])) {
                      if (file_exists('./assets/uploads/category/' . $image['cat_image'])) {
                           unlink('./assets/uploads/category/' . $image['cat_image']);
                      }
                      $this->db->where('cat_id', $id);
                      $this->db->update($this->table, array('cat_image' => ''));
                      return true;
                 }
            }
            return false;
       }
  }