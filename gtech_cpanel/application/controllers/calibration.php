<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Calibration extends App_Controller {

       public function __construct() {
            parent::__construct();
            $this->body_class[] = 'skin-blue';
            $this->page_title = 'General Tech - Calibration';
            $this->load->library('form_validation');
            $this->load->model('calibration_model', 'calibration_model');
       }
       
       public function index() {
            $data['calibration'] = $this->calibration_model->getCalibration();
            $this->current_section = 'Brand';
            $this->render_page(strtolower(__CLASS__) . '/list', $data);
       }
       
       public function add() {
            $data['nextOrder'] = $this->calibration_model->getNextOrder();
            $this->current_section = 'Calibration add';
            $this->render_page(strtolower(__CLASS__) . '/add', $data);
       }
       
       public function insert() {

            /**/
            $data = array();
            $newFileName = rand(9999999, 0) . $_FILES['cal_image']['name'];
            $config['upload_path'] = './assets/uploads/calibration/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $newFileName;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('cal_image')) {
                 array('error' => $this->upload->display_errors());
            } else {
                 $data = array('upload_data' => $this->upload->data());
                 crop($this->upload->data(), $this->input->post());
            }
            /**/
            $_POST['cal_image'] = isset($data['upload_data']['file_name']) ? $data['upload_data']['file_name'] : '';

            if ($this->calibration_model->addNewCalibration($this->input->post())) {
                 $this->session->set_flashdata('app_success', 'Calibration successfully added!');
            } else {
                 $this->session->set_flashdata('app_error', "Can't add calibration!");
            }
            redirect(strtolower(__CLASS__));
       }
       
       public function view($id) {

            $data = $this->calibration_model->getCalibration($id);
            $data['nextOrder'] = $this->calibration_model->getNextOrder();
            $data['calibration'] = isset($data['0']) ? $data['0'] : array();
            $this->current_section = 'Calibration edit';
            $this->render_page(strtolower(__CLASS__) . '/view', $data);
       }
       
       public function removeImage($id) {
            if ($this->calibration_model->removeImage($id)) {
                 echo json_encode(array('status' => 'success', 'msg' => 'Calibration image successfully deleted'));
            } else {
                 echo json_encode(array('status' => 'fail', 'msg' => "Can't delete calibration image"));
            }
       }
       
       public function update() {
            /**/
            if (isset($_FILES['cal_image']['name']) && !empty($_FILES['cal_image']['name'])) {
                 $data = array();
                 $newFileName = rand(9999999, 0) . $_FILES['cal_image']['name'];
                 $config['upload_path'] = './assets/uploads/calibration/';
                 $config['allowed_types'] = 'gif|jpg|png';
                 $config['file_name'] = $newFileName;
                 $this->load->library('upload', $config);

                 if (!$this->upload->do_upload('cal_image')) {
                      array('error' => $this->upload->display_errors());
                 } else {
                      $data = array('upload_data' => $this->upload->data());
                      crop($this->upload->data(), $this->input->post());
                 }
            }
            /**/
            if (isset($data['upload_data']['file_name']) && !empty($data['upload_data']['file_name'])) {
                 $_POST['cal_image'] = $data['upload_data']['file_name'];
            }

            if ($this->calibration_model->updateCalibration($this->input->post())) {
                 $this->session->set_flashdata('app_success', 'Calibration successfully updated!');
            } else {
                 $this->session->set_flashdata('app_error', "Can't update calibration!");
            }
            redirect(strtolower(__CLASS__));
       }
       
       public function delete($id) {
            if($this->calibration_model->deleteCalibration($id)) {
                 echo json_encode(array('status' => 'success', 'msg' => 'Calibration successfully deleted'));
            } else {
                 echo json_encode(array('status' => 'fail', 'msg' => "Can't delete calibration"));
            }
       }
       
       public function calibration_service($calibrationId = '') {
            $data['calibration'] = $this->calibration_model->getCalibration();
            $data['calibrationService'] = $this->calibration_model->getCalibrationService('', $calibrationId);
            $data['calibrationId'] = $calibrationId;
            $this->current_section = 'Calibration Service';
            $this->render_page(strtolower(__CLASS__) . '/calibration_service', $data);
       }

       public function add_calibration_service() {
            $data['calibration'] = $this->calibration_model->getCalibration();
            $this->current_section = 'Add Calibration Service';
            $this->render_page(strtolower(__CLASS__) . '/add_calibration_service', $data);
       }

       public function save_calibration_service() {
            /**/
            if (!empty($_FILES['gcs_image']['name'])) {
                 $data = array();
                 $newFileName = rand(9999999, 0) . $_FILES['gcs_image']['name'];
                 $config['upload_path'] = './assets/uploads/calibration/';
                 $config['allowed_types'] = 'gif|jpg|png';
                 $config['file_name'] = $newFileName;
                 $this->load->library('upload', $config);

                 if (!$this->upload->do_upload('gcs_image')) {
                      array('error' => $this->upload->display_errors());
                 } else {
                      $data = $this->upload->data();
                      crop($this->upload->data(), $this->input->post());
                 }
                 /**/
                 $_POST['calibration_service']['gcs_image'] = isset($data['file_name']) ? $data['file_name'] : '';
            }
            
            if ($this->calibration_model->addNewCalibrationService($this->input->post('calibration_service'))) {
                 $this->session->set_flashdata('app_success', 'Calibration service successfully added!');
            } else {
                 $this->session->set_flashdata('app_error', "Can't add calibration service!");
            }
            redirect(strtolower(__CLASS__.'/calibration_service'));
       }
       
       public function view_calibration_service($id) {
            $data['calibrationService'] = $this->calibration_model->getCalibrationService($id);
            $data['calibration'] = $this->calibration_model->getCalibration();
            $this->render_page(strtolower(__CLASS__) . '/view_calibration_service', $data);
       }
       
       public function removeCalibrationServiceImage($id) {
            if ($this->calibration_model->removeCalibrationServiceImage($id)) {
                 echo json_encode(array('status' => 'success', 'msg' => 'Calibration image successfully deleted'));
            } else {
                 echo json_encode(array('status' => 'fail', 'msg' => "Can't delete calibration image"));
            }
       }
       
       public function edit_calibration_service() {
            /**/
            if (!empty($_FILES['gcs_image']['name'])) {
                 $data = array();
                 $newFileName = rand(9999999, 0) . $_FILES['gcs_image']['name'];
                 $config['upload_path'] = './assets/uploads/calibration/';
                 $config['allowed_types'] = 'gif|jpg|png';
                 $config['file_name'] = $newFileName;
                 $this->load->library('upload', $config);

                 if (!$this->upload->do_upload('gcs_image')) {
                      array('error' => $this->upload->display_errors());
                 } else {
                      $data = $this->upload->data();
                      crop($this->upload->data(), $this->input->post());
                 }
                 /**/
                 $_POST['calibration_service']['gcs_image'] = isset($data['file_name']) ? $data['file_name'] : '';
            }
            
            if ($this->calibration_model->editCalibrationService($this->input->post('calibration_service'))) {
                 $this->session->set_flashdata('app_success', 'Calibration service successfully updated!');
            } else {
                 $this->session->set_flashdata('app_error', "Can't uppdate calibration service!");
            }
            redirect(strtolower(__CLASS__.'/calibration_service'));
       }
       
       public function deleteCalibrationService($id){
            if ($this->calibration_model->deleteCalibrationService($id)) {
                 echo json_encode(array('status' => 'success', 'msg' => 'Calibration service successfully deleted'));
            } else {
                 echo json_encode(array('status' => 'fail', 'msg' => "Can't delete calibration service"));
            }
       }
  } 