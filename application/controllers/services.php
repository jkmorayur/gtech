<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Services extends App_Controller {

       public function __construct() {
            parent::__construct();
            /* Load title, css, js etc... */
            $this->page_title = "Dimensional Calibration Dubai / Sharjah, UAE";
            $this->page_meta_description = 'Generaltech materials testing labs in Sharjah, UAE
                    provide testing, inspection, analysis, and consulting for 
                    your materials, parts, equipment and products. 
                    Dimensional inspection services are performed in our 
                    environmentally controlled laboratory under regulated 
                    temperature and humidity conditions.';
            $this->page_meta_keywords = 'dimensional inspection services dubai, dimensional 
                    inspection labs sharjah, dimensional inspection 
                    laboratories uae, metrology uae, dimensional metrology 
                    sharjah, metrology services dubai, metrology and 
                    inspection uae, laser metrology sharjah, optical 
                    metrology services dubai, surface metrology uae, 
                    metrology laboratory dubai, metrology service uae, 
                    metrology inspection dubai, metrology companies uae, 
                    metrology calibration services uae';
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css',
                'meanmenu.css', 'bootstrap.min.css', 'main.css', 'responsive.css',
                'component.css', 'metro.css', 'requesttab.css');
            /* Load title, css, js etc... */
       }

       public function index() {
            //$this->page_title = "Services | General Tech Services LLC -". STATIC_TITLE;

            $this->render_page(strtolower(__CLASS__).'/index');
       }
       
       public function dimensional_inspection_and_valve_setting() {
            $this->render_page(strtolower(__CLASS__).'/dimensional_inspection_and_valve_setting');
       }
       
       public function valve_testing() {
            $this->render_page(strtolower(__CLASS__).'/valve_testing');
       }
       
       public function repairs() {
            $this->render_page(strtolower(__CLASS__).'/repairs');
       }
       public function authorised_service_and_calibration_center() {
            $this->render_page(strtolower(__CLASS__).'/authorised_service_and_calibration_center');
       }
  } 