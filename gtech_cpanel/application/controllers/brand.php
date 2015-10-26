<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Brand extends App_Controller {

       public function __construct() {

            parent::__construct();
            $this->body_class[] = 'skin-blue';
            $this->page_title = 'General Tech - Brand';
            $this->load->library('form_validation');
            $this->load->model('Brand_model', 'brand_model');
       }

       public function index() {
            $brand['brand'] = $this->brand_model->getBrands();
            $this->current_section = 'Brand';
            $this->render_page(strtolower(__CLASS__) . '/list', $brand);
       }

       public function add() {
            $this->current_section = 'Brand add';
            $this->render_page(strtolower(__CLASS__) . '/add');
       }

       public function insert() {

            /**/
            $data = array();
            $newFileName = rand(9999999, 0) . $_FILES['brd_logo']['name'];
            $config['upload_path'] = './assets/uploads/brand/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $newFileName;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('brd_logo')) {
                 array('error' => $this->upload->display_errors());
            } else {
                 $data = array('upload_data' => $this->upload->data());
                 crop($this->upload->data(), $this->input->post());
            }
            /**/
            $_POST['brd_logo'] = isset($data['upload_data']['file_name']) ? $data['upload_data']['file_name'] : '';
            /**/
            $data = array();
            $newFileName = rand(9999999, 0) . $_FILES['brd_banner']['name'];
            $config['upload_path'] = './assets/uploads/brand/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $newFileName;
            $this->load->library('upload', $config);
            $f = array();
            if (!$this->upload->do_upload('brd_banner')) {
                 $f = array('error' => $this->upload->display_errors());
            } else {
                 $data = array('upload_data' => $this->upload->data());
                 //crop($this->upload->data(), $this->input->post());
            }
            //debug($data);
            $_POST['brd_banner'] = isset($data['upload_data']['file_name']) ? $data['upload_data']['file_name'] : '';
            /**/
            if ($this->brand_model->addNewBrand($_POST)) {
                 $this->session->set_flashdata('app_success', 'Brand successfully added!');
            } else {
                 $this->session->set_flashdata('app_error', "Can't add Brand!");
            }
            redirect(strtolower(__CLASS__));
       }

       public function view($id) {

            $brand = $this->brand_model->getBrands($id);
            $brand['brand'] = isset($brand['0']) ? $brand['0'] : array();
            $this->current_section = 'Brand edit';
            $this->render_page(strtolower(__CLASS__) . '/view', $brand);
       }

       public function removeImage($id) {
            if ($this->brand_model->removeBrandImage($id)) {
                 echo json_encode(array('status' => 'success', 'msg' => 'Brand logo successfully deleted'));
            } else {
                 echo json_encode(array('status' => 'fail', 'msg' => "Can't delete brand logo"));
            }
       }
       public function removeBrandBanner($id) {
            if ($this->brand_model->removeBrandBanner($id)) {
                 echo json_encode(array('status' => 'success', 'msg' => 'Brand banner successfully deleted'));
            } else {
                 echo json_encode(array('status' => 'fail', 'msg' => "Can't delete brand banner"));
            }
       }
       public function update() {
            /**/
            if (isset($_FILES['brd_logo']['name']) && !empty($_FILES['brd_logo']['name'])) {
                 $data = array();
                 $newFileName = rand(9999999, 0) . $_FILES['brd_logo']['name'];
                 $config['upload_path'] = './assets/uploads/brand/';
                 $config['allowed_types'] = 'gif|jpg|png';
                 $config['file_name'] = $newFileName;
                 $this->load->library('upload', $config);

                 if (!$this->upload->do_upload('brd_logo')) {
                      array('error' => $this->upload->display_errors());
                 } else {
                      $data = array('upload_data' => $this->upload->data());
                      crop($this->upload->data(), $this->input->post());
                 }
            }
            /**/
            if (isset($data['upload_data']['file_name']) && !empty($data['upload_data']['file_name'])) {
                 $_POST['brd_logo'] = $data['upload_data']['file_name'];
            }
            
            /**/
            if (isset($_FILES['brd_banner']['name']) && !empty($_FILES['brd_banner']['name'])) {
                 $data = array();
                 $newFileName = rand(9999999, 0) . $_FILES['brd_banner']['name'];
                 $config['upload_path'] = './assets/uploads/brand/';
                 $config['allowed_types'] = 'gif|jpg|png';
                 $config['file_name'] = $newFileName;
                 $this->load->library('upload', $config);

                 if (!$this->upload->do_upload('brd_banner')) {
                      array('error' => $this->upload->display_errors());
                 } else {
                      $data = array('upload_data' => $this->upload->data());
                      crop($this->upload->data(), $this->input->post());
                 }
            }
            if (isset($data['upload_data']['file_name']) && !empty($data['upload_data']['file_name'])) {
                 $_POST['brd_banner'] = $data['upload_data']['file_name'];
            }
            /**/
            
            if ($this->brand_model->updateBrand($_POST)) {
                 $this->session->set_flashdata('app_success', 'Brand successfully added!');
            } else {
                 $this->session->set_flashdata('app_error', "Can't add Brand!");
            }
            redirect(strtolower(__CLASS__));
       }

       public function delete($id) {
            if($this->brand_model->deleteBrand($id)) {
                 echo json_encode(array('status' => 'success', 'msg' => 'Brand successfully deleted'));
            } else {
                 echo json_encode(array('status' => 'fail', 'msg' => "Can't delete brand"));
            }
       }
  } 