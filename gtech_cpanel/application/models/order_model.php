<?php

  if (!defined('BASEPATH'))
       exit('No direct script access allowed');

  class Order_model extends CI_Model {

       public function __construct() {
            parent::__construct();
            $this->load->database();
            $this->table = 'gtech_orders';
       }

       function getOrder($userId = '', $orderId = '') {

            $this->db->select($this->table . '.*, gtech_users.*')->from($this->table)
                    ->join('gtech_users', $this->table . '.ord_user_id = gtech_users.id');
            if ($userId) {
                 $this->db->where($this->table . '.ord_user_id', $userId);
            }
            if ($orderId) {
                 $this->db->where($this->table . '.odr_serial', $orderId);
            }
            $order = $this->db->get()->result_array();
            
            if (!empty($order)) {
                 foreach ($order as $key => $value) {

                      $productInfo = $this->db->select('gtech_orders_products.*, gtech_products.*, gtech_brand.*')
                                      ->from('gtech_orders_products')
                                      ->join('gtech_products', 'gtech_products.prd_id = gtech_orders_products.orp_prod_id', 'left')
                                      ->join('gtech_brand', 'gtech_products.prd_brand = gtech_brand.brd_id', 'left')
                                      ->where('orp_order_id', $value['odr_serial'])
                                      ->get()->result_array();
                      
                      if (!empty($productInfo)) {
                           foreach ($productInfo as $prdInfo) {

                                $prdInfo['product_images'] = $this->db->select('*')->from('gtech_prod_images')
                                                ->where('pdi_prod_id', $prdInfo['orp_prod_id'])->get()->result_array();

                                $order[$key]['product_info'][] = $prdInfo;
                           }
                      }
                      
                      $order[$key]['shipping_address'] = $this->db->select('gtech_address_book.*, gtech_address_book.id as add_id, gtech_country.*, gtech_state_province.*')
                                      ->from('gtech_address_book')->join('gtech_country', 'gtech_country.ctr_id = gtech_address_book.country', 'left')
                                      ->join('gtech_state_province', 'gtech_state_province.id = gtech_address_book.state', 'left')
                                      ->where('gtech_address_book.id', $value['ord_shipping_id'])
                                      ->get()->row_array();

                      $order[$key]['billing_address'] = $this->db->select('gtech_address_book.*, gtech_address_book.id as add_id, gtech_country.*, gtech_state_province.*')
                                      ->from('gtech_address_book')->join('gtech_country', 'gtech_country.ctr_id = gtech_address_book.country', 'left')
                                      ->join('gtech_state_province', 'gtech_state_province.id = gtech_address_book.state', 'left')
                                      ->where('gtech_address_book.id', $value['ord_billing_id'])
                                      ->get()->row_array();
                 }
            }
            
            return $order;
       }
       
       function getOrderStatus($id = '') {
            $this->db->select('*')->from('gtech_orders_status');
            $status = array();
            if($id) {
                 $status = $this->db->where('ost_id', $id)->get()->row_array();
            } else {
                 $status = $this->db->get()->result_array();
            }
            return $status;
       }
       
       function changeOrderStatus($status, $order) {
            if(!empty($status) && !empty($order)) {
                 $this->db->where('odr_serial', $order);
                 $this->db->update($this->table, array('ord_status' => $status));
                 return true;
            } else {
                 return false;
            }
       }
  }