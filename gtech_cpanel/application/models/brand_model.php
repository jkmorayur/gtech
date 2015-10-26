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
            $this->db->select("*");
            $this->db->from($this->table);
            if (!empty($id)) {
                 $this->db->where('brd_id', $id);
            }
            $this->db->order_by('brd_id', 'desc');
            $brands = $this->db->get()->result_array();
            return $brands;
       }

       public function addNewBrand($datas) {
            unset($datas['x1']);
            unset($datas['x2']);
            unset($datas['y1']);
            unset($datas['y2']);
            unset($datas['h']);
            unset($datas['w']);

            if ($this->db->insert($this->table, $datas)) {
                 return true;
            } else {
                 return false;
            }
       }

       public function removeBrandImage($id) {
            if ($id) {
                 $this->db->where('brd_id', $id);
                 $brand = $this->db->get($this->table)->result_array();
                 $brand = isset($brand['0']) ? $brand['0'] : array();
                 if (isset($brand['brd_logo']) && !empty($brand['brd_logo'])) {
                      if (file_exists('./assets/uploads/brand/' . $brand['brd_logo'])) {
                           unlink('./assets/uploads/brand/' . $brand['brd_logo']);
                      }
                      $this->db->where('brd_id', $id);
                      $this->db->update($this->table, array('brd_logo' => ''));
                      return true;
                 }
            }
            return false;
       }

       public function updateBrand($datas) {

            unset($datas['x1']);
            unset($datas['x2']);
            unset($datas['y1']);
            unset($datas['y2']);
            unset($datas['h']);
            unset($datas['w']);

            $this->db->where('brd_id', $datas['brd_id']);
            unset($datas['brd_id']);
            if ($this->db->update($this->table, $datas)) {
                 return true;
            } else {
                 return false;
            }
       }

       public function deleteBrand($id) {
            $this->db->where('brd_id', $id);
            $brand = $this->db->get($this->table)->result_array();
            $brand = isset($brand['0']) ? $brand['0'] : array();
            if (isset($brand['brd_logo']) && !empty($brand['brd_logo'])) {
                 if (file_exists('./assets/uploads/brand/' . $brand['brd_logo'])) {
                      unlink('./assets/uploads/brand/' . $brand['brd_logo']);
                 }
            }
            $this->db->where('brd_id', $id);
            if ($this->db->delete($this->table)) {
                 return true;
            } else {
                 return false;
            }
       }
       
       public function removeBrandBanner($id) {
            if ($id) {
                 $this->db->where('brd_id', $id);
                 $brand = $this->db->get($this->table)->result_array();
                 $brand = isset($brand['0']) ? $brand['0'] : array();
                 if (isset($brand['brd_banner']) && !empty($brand['brd_banner'])) {
                      if (file_exists('./assets/uploads/brand/' . $brand['brd_banner'])) {
                           unlink('./assets/uploads/brand/' . $brand['brd_banner']);
                      }
                      $this->db->where('brd_id', $id);
                      $this->db->update($this->table, array('brd_banner' => ''));
                      return true;
                 }
            }
            return false;
       }
  } 