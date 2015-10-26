<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Sitemap extends App_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('home_model');
            $this->load->model('product_model');
            $this->load->model('brand_model');
            $this->load->model('category_model');
            $this->load->model('calibration_model');
            /* Load title, css, js etc... */
            $this->page_title = "General Tech Services LLC - Sitemap";
            $this->page_meta_keywords = '';
            $this->page_meta_description = '';
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css',
                'meanmenu.css', 'responsiveslides.css', 'bootstrap.min.css', 'main.css', 'responsive.css');
            /* Load title, css, js etc... */
       }
       
       function product_site_map() {
            $this->render_page(strtolower(__CLASS__) . '/index');
       }
       
       function all_information_pages() {
            $data['calibration'] = $this->calibration_model->getCalibration();
            $this->render_page(strtolower(__CLASS__) . '/all_information_pages', $data);
       }
  }