<?php

  if (!defined('BASEPATH'))
       exit('No direct script access allowed');

  class Calibration_model extends CI_Model {

       public function __construct() {
            parent::__construct();
            $this->load->database();
            $this->table = 'gtech_calibration';
       }

       public function getCalibration($id = '') {
            $this->db->select("*");
            $this->db->from($this->table);
            if (!empty($id)) {
                 $this->db->where('cal_id', $id);
            }
            $this->db->order_by('cal_id', 'desc');
            $calibration = $this->db->get()->result_array();
            return $calibration;
       }

       public function addNewCalibration($datas) {
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

       public function removeImage($id) {
            if ($id) {
                 $this->db->where('cal_id', $id);
                 $data = $this->db->get($this->table)->result_array();
                 $data = isset($data['0']) ? $data['0'] : array();
                 if (isset($data['cal_image']) && !empty($data['cal_image'])) {
                      if (file_exists('./assets/uploads/calibration/' . $data['cal_image'])) {
                           unlink('./assets/uploads/calibration/' . $data['cal_image']);
                      }
                      $this->db->where('cal_id', $id);
                      $this->db->update($this->table, array('cal_image' => ''));
                      return true;
                 }
            }
            return false;
       }

       public function updateCalibration($datas) {
            unset($datas['x1']);
            unset($datas['x2']);
            unset($datas['y1']);
            unset($datas['y2']);
            unset($datas['h']);
            unset($datas['w']);

            $this->db->where('cal_id', $datas['cal_id']);
            unset($datas['cal_id']);
            if ($this->db->update($this->table, $datas)) {
                 return true;
            } else {
                 return false;
            }
       }

       public function deleteCalibration($id) {
            $this->db->where('cal_id', $id);
            $data = $this->db->get($this->table)->result_array();
            $data = isset($data['0']) ? $data['0'] : array();
            if (isset($data['cal_image']) && !empty($data['cal_image'])) {
                 if (file_exists('./assets/uploads/calibration/' . $data['cal_image'])) {
                      unlink('./assets/uploads/calibration/' . $data['cal_image']);
                 }
            }
            $this->db->where('cal_id', $id);
            if ($this->db->delete($this->table)) {
                 return true;
            } else {
                 return false;
            }
       }

       function addNewCalibrationService($datas) {

            if (!empty($datas) && $this->db->insert('gtech_calibration_services', $datas)) {
                 return true;
            } else {
                 return false;
            }
       }

       function getCalibrationService($id = '', $calibrationId = '') {
            $this->db->select("gtech_calibration_services.*,gtech_calibration.*");
            $this->db->from('gtech_calibration_services');
            $this->db->order_by('gtech_calibration_services.gcs_id', 'desc');
            $this->db->join('gtech_calibration', 'gtech_calibration.cal_id = gtech_calibration_services.gcs_cal_id');
            if ($calibrationId) {
                 $this->db->where('gtech_calibration_services.gcs_cal_id', $calibrationId);
            }
            if (!empty($id)) {
                 $this->db->where('gtech_calibration_services.gcs_id', $id);
                 $calibration = $this->db->get()->row_array();
            } else {
                 $calibration = $this->db->get()->result_array();
            }
            return $calibration;
       }

       function removeCalibrationServiceImage($id) {
            if ($id) {
                 $this->db->where('gcs_id', $id);
                 $data = $this->db->get('gtech_calibration_services')->result_array();
                 $data = isset($data['0']) ? $data['0'] : array();
                 if (isset($data['gcs_image']) && !empty($data['gcs_image'])) {
                      if (file_exists('./assets/uploads/calibration/' . $data['gcs_image'])) {
                           unlink('./assets/uploads/calibration/' . $data['gcs_image']);
                      }
                      $this->db->where('gcs_id', $id);
                      $this->db->update('gtech_calibration_services', array('gcs_image' => ''));
                      return true;
                 }
            }
            return false;
       }

       function editCalibrationService($datas) {
            $datas['gcs_is_accordion'] = isset($datas['gcs_is_accordion']) ? $datas['gcs_is_accordion'] : 0;

            $datas['gcs_is_cont_after_accordion'] = isset($datas['gcs_is_cont_after_accordion']) ? $datas['gcs_is_cont_after_accordion'] : 0;

            $datas['gcs_is_baner_text'] = isset($datas['gcs_is_baner_text']) ? $datas['gcs_is_baner_text'] : 0;

            $this->db->where('gcs_id', $datas['gcs_id']);
            unset($datas['gcs_id']);
            if ($this->db->update('gtech_calibration_services', $datas)) {
                 return true;
            } else {
                 return false;
            }
       }

       function deleteCalibrationService($id) {
            $this->db->where('gcs_id', $id);
            $data = $this->db->get('gtech_calibration_services')->result_array();
            $data = isset($data['0']) ? $data['0'] : array();
            if (isset($data['gcs_image']) && !empty($data['gcs_image'])) {
                 if (file_exists('./assets/uploads/calibration/' . $data['gcs_image'])) {
                      unlink('./assets/uploads/calibration/' . $data['gcs_image']);
                 }
            }
            $this->db->where('gcs_id', $id);
            if ($this->db->delete('gtech_calibration_services')) {
                 return true;
            } else {
                 return false;
            }
       }

       function getNextOrder() {
            $this->db->from('gtech_calibration');
            return $this->db->count_all_results() + 1;
       }
  } 