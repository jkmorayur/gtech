
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
            $this->db->order_by('cal_order', 'asc');
            
            if (!empty($id)) {
                 $this->db->where('cal_id', $id);
                 $calibration = $this->db->get()->row_array();
            } else {
                 $calibration = $this->db->get()->result_array();
            }
            
            return $calibration;
       }
       
       public function getCount() {
            return $this->db->count_all($this->table);
       }
       
       public function getCalibrationPagination($perPage, $offset) {
            return $this->db->get($this->table, $perPage, $offset)->result_array();
       }
       
       function getCalibrationService($id = '', $calibrationId = '') {
            $this->db->select("gtech_calibration_services.*,gtech_calibration.*");
            $this->db->from('gtech_calibration_services');
            $this->db->order_by('gtech_calibration_services.gcs_id', 'desc');
            $this->db->join('gtech_calibration','gtech_calibration.cal_id = gtech_calibration_services.gcs_cal_id');
            if($calibrationId) {
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
       
       /* 22-08-2015 */

       function getCalibrationServiceByName($name) {
            $name = str_replace('_', ' ', strtolower($name));
            if ($name) {
                 $this->db->select('*')->from($this->table);
                 $this->db->where('cal_title', $name);
                 return $this->db->get()->row_array();
            } else {
                 return null;
            }
       }

       /* 22-08-2015 */
  }
  ?>