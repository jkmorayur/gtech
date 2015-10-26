<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Calibration extends App_Controller {

       public function __construct() {
            parent::__construct();
            $this->load->model('calibration_model');
            $this->load->library('pagination');
            /* Load title, css, js etc... */
            $this->page_title = "General Tech Services LLC -". STATIC_TITLE;
            $this->page_meta_keywords = '';
            $this->page_meta_description = '';
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css',
                'meanmenu.css', 'bootstrap.min.css', 'main.css', 'responsive.css',
                'component.css', 'metro.css', 'requesttab.css');

            $this->assets_js = array('easyResponsiveTabs.js', 'jquery.validate.min.js', 'my.script.min.js');
            /* Load title, css, js etc... */
       }

//       public function index($offset = 0) {
//            $this->body_class[] = 'home';
//            $this->page_title = 'Calibration';
//            $this->current_section = 'calibration';
//            
//            $num_rows = $this->calibration_model->getCount();
//            $config = getPaginationDesign();
//            $config['base_url'] = base_url() . 'index.php/calibration/index';
//            $config['total_rows'] = $num_rows;
//            $config['per_page'] = 3;
//            $config['num_links'] = $num_rows;
//            $config['use_page_numbers'] = TRUE;
//
//            $this->pagination->initialize($config);
//            $data['calibration'] = $this->calibration_model->getCalibrationPagination($config['per_page'], $offset);
//            $this->render_page(strtolower(__CLASS__) . '/index', $data);
//       }

       public function index() {
            $this->body_class[] = 'home';
            $this->page_title = 'Calibration | General Tech Services LLC -'. STATIC_TITLE;
            $this->current_section = 'calibration';
            $data['calibration'] = $this->calibration_model->getCalibration();
            $this->render_page(strtolower(__CLASS__) . '/index', $data);
       }

       public function calibration_service($serviceName) {
            $calService = $this->calibration_model->getCalibrationServiceByName($serviceName);
            $id = isset($calService['cal_id']) ? $calService['cal_id'] : '';
            
            $data['calibration'] = $this->calibration_model->getCalibration($id);
            
            $this->page_title = $data['calibration']['cal_title'].' | General Tech Services LLC -'. STATIC_TITLE;
            
            $this->page_meta_keywords  = 'calibration, '.$data['calibration']['cal_title'].' uae';
            $this->page_meta_description  = 'calibration, '.$data['calibration']['cal_title'].' uae';
            
            $data['calibrationService'] = $this->calibration_model->getCalibrationService('', $id);
            $data['allCalibration'] = $this->calibration_model->getCalibration();
            $data['calibrationId'] = $id;
            $this->render_page(strtolower(__CLASS__) . '/calibration_service', $data);
       }

       public function calibration_lab() {
            
            $this->page_title = 'Calibration Lab | General Tech Services LLC -'. STATIC_TITLE;
            
            $data['allCalibration'] = $this->calibration_model->getCalibration();
            $this->render_page(strtolower(__CLASS__) . '/calibration_lab', $data);
       }

       public function calibration_whychooseus() {
            $this->page_title = 'Calibration Why Choose Us | General Tech Services LLC -'. STATIC_TITLE;
            
            $data['allCalibration'] = $this->calibration_model->getCalibration();
            $this->render_page(strtolower(__CLASS__) . '/calibration_whychooseus', $data);
       }

       public function calibration_on_site() {
            $this->page_title = 'Calibration On Site | General Tech Services LLC -'. STATIC_TITLE;
            
            $data['allCalibration'] = $this->calibration_model->getCalibration();
            $this->render_page(strtolower(__CLASS__) . '/calibration_on_site', $data);
       }
  }