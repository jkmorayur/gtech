<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class News_and_events extends App_Controller {

       public function __construct() {

            parent::__construct();
            $this->body_class[] = 'skin-blue';
            $this->page_title = 'General Tech - News and events';
            $this->load->library('form_validation');
            $this->load->model('news_model');
       }

       function index() {
            $data['news'] = $this->news_model->getNews();
            $this->render_page(strtolower(__CLASS__) . '/list', $data);
       }

       public function add() {
            $this->render_page(strtolower(__CLASS__) . '/add');
       }

       function insert() {
            if ($prdId = $this->news_model->addNews($this->input->post('news'))) {

                 $this->load->library('upload');
                 $x1 = $this->input->post('x1');
                 $fileCount = count($x1);
                 $up = array();
                 if ($fileCount) {
                      for ($j = 0; $j < $fileCount; $j++) {
                           /**/
                           $data = array();
                           $angle = array();
                           $newFileName = rand(9999999, 0) . $_FILES['prd_image']['name'][$j];
                           $config['upload_path'] = './assets/uploads/news/';
                           $config['allowed_types'] = 'gif|jpg|png';
                           $config['file_name'] = $newFileName;
                           $this->upload->initialize($config);

                           $angle['x1']['0'] = $_POST['x1'][$j];
                           $angle['x2']['0'] = $_POST['x2'][$j];
                           $angle['y1']['0'] = $_POST['y1'][$j];
                           $angle['y2']['0'] = $_POST['y2'][$j];
                           $angle['w']['0'] = $_POST['w'][$j];
                           $angle['h']['0'] = $_POST['h'][$j];

                           $_FILES['prd_image_tmp']['name'] = $_FILES['prd_image']['name'][$j];
                           $_FILES['prd_image_tmp']['type'] = $_FILES['prd_image']['type'][$j];
                           $_FILES['prd_image_tmp']['tmp_name'] = $_FILES['prd_image']['tmp_name'][$j];
                           $_FILES['prd_image_tmp']['error'] = $_FILES['prd_image']['error'][$j];
                           $_FILES['prd_image_tmp']['size'] = $_FILES['prd_image']['size'][$j];
                           if (!$this->upload->do_upload('prd_image_tmp')) {
                                $up = array('error' => $this->upload->display_errors());
                           } else {
                                $data = array('upload_data' => $this->upload->data());
                                crop($this->upload->data(), $angle);
                                $default = ($j == 0) ? 1 : 0;
                                $this->news_model->addImages(array('nwi_default' => $default, 'nwi_news_id' => $prdId, 'nwi_image' => $data['upload_data']['file_name']));
                           }
                      }
                 }
                 $this->session->set_flashdata('app_success', 'News successfully added!');
            } else {
                 $this->session->set_flashdata('app_error', "Can't add News!");
            }
            redirect(strtolower(__CLASS__));
       }

       public function view($id) {
            $data['news'] = $this->news_model->getNews($id);

            $this->current_section = 'Product edit';
            $this->render_page(strtolower(__CLASS__) . '/view', $data);
       }

       public function update() {
            $prdId = $this->input->post('nws_id');
            if ($this->news_model->updateNews($this->input->post())) {

                 $this->load->library('upload');
                 $x1 = $this->input->post('x1');
                 $fileCount = count($x1);
                 $up = array();
                 if ($fileCount > 0) {
                      for ($j = 0; $j < $fileCount; $j++) {
                           /**/
                           $data = array();
                           $angle = array();
                           $newFileName = rand(9999999, 0) . $_FILES['prd_image']['name'][$j];
                           $config['upload_path'] = './assets/uploads/news/';
                           $config['allowed_types'] = 'gif|jpg|png';
                           $config['file_name'] = $newFileName;
                           $this->upload->initialize($config);

                           $angle['x1']['0'] = $_POST['x1'][$j];
                           $angle['x2']['0'] = $_POST['x2'][$j];
                           $angle['y1']['0'] = $_POST['y1'][$j];
                           $angle['y2']['0'] = $_POST['y2'][$j];
                           $angle['w']['0'] = $_POST['w'][$j];
                           $angle['h']['0'] = $_POST['h'][$j];

                           $_FILES['prd_image_tmp']['name'] = $_FILES['prd_image']['name'][$j];
                           $_FILES['prd_image_tmp']['type'] = $_FILES['prd_image']['type'][$j];
                           $_FILES['prd_image_tmp']['tmp_name'] = $_FILES['prd_image']['tmp_name'][$j];
                           $_FILES['prd_image_tmp']['error'] = $_FILES['prd_image']['error'][$j];
                           $_FILES['prd_image_tmp']['size'] = $_FILES['prd_image']['size'][$j];
                           if (!$this->upload->do_upload('prd_image_tmp')) {
                                $up = array('error' => $this->upload->display_errors());
                           } else {
                                $data = array('upload_data' => $this->upload->data());
                                crop($this->upload->data(), $angle);
                                $this->news_model->addImages(array('nwi_news_id' => $prdId, 'nwi_image' => $data['upload_data']['file_name']));
                           }
                      }
                 }
                 $this->session->set_flashdata('app_success', 'News successfully updated!');
            } else {
                 $this->session->set_flashdata('app_error', "Can't updated news!");
            }
            redirect(strtolower(__CLASS__));
       }
       
       function removeImage($id) {
            
            if ($this->news_model->removeImage($id)) {
                 echo json_encode(array('status' => 'success', 'msg' => 'News image successfully deleted'));
            } else {
                 echo json_encode(array('status' => 'fail', 'msg' => "Can't delete news image"));
            }
       }
       
       function delete($id) {
            
            if ($this->news_model->deleteNews($id)) {
                 echo json_encode(array('status' => 'success', 'msg' => 'News successfully deleted'));
            } else {
                 echo json_encode(array('status' => 'fail', 'msg' => "Can't delete news"));
            }
       }
  } 