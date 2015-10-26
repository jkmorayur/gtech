<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Order extends App_Controller {

       public function __construct() {

            parent::__construct();
            $this->body_class[] = 'skin-blue';
            $this->page_title = 'General Tech - Orders';
            $this->load->library('form_validation');
            $this->load->model('Order_model', 'order_model');
       }

       function index() {
            $data['allOrders'] = $this->order_model->getOrder();
            $data['orderStatus'] = $this->order_model->getOrderStatus();

            $this->render_page(strtolower(__CLASS__) . '/index', $data);
       }

       function changeStatus() {
            $status = $this->input->post('status');
            $order = $this->input->post('order');
            if ($this->order_model->changeOrderStatus($status, $order)) {
                 echo json_encode(array('status' => 'success', 'msg' => 'Order status changed!'));
            } else {
                 echo json_encode(array('status' => 'fail', 'msg' => "Can't change order status!"));
            }
       }

       function order_details($id) {
            
            $orderDetails = $this->order_model->getOrder('', $id);
            $data['orderDetails'] = isset($orderDetails['0']) ? $orderDetails['0'] : array();
            $data['orderStatus'] = $this->order_model->getOrderStatus();
            $this->render_page(strtolower(__CLASS__) . '/order_details', $data);
       }
  }
  