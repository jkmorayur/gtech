<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Aboutus extends App_Controller {

       public function __construct() {
            parent::__construct();

            $this->load->model('brand_model');
            $this->data['brands'] = $this->brand_model->getBrands();

            /* Load title, css, js etc... */
            $this->page_title = "Calibration Service and repair Dubai / Sharjah, UAE";
            $this->page_meta_description = 'General Tech UAE, provides calibration and repair 
                    services for Electrical and Temperature parameters including Oven, Furnace, Compression machine, Multimeter, 
                    Weigh balance and Dimensional instrument in Sharjah, Dubai, UAE';
            $this->page_meta_keywords = 'Dimensional instrument repair uae, oven repairing service dubai, 
                 furnace repair sharjah, compression machine repairing uae, Multimeter repairing dubai, Weigh balance repairing uae';
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css',
                'meanmenu.css', 'responsiveslides.css', 'bootstrap.min.css', 'main.css', 'responsive.css');
            $this->assets_js = array('responsiveslides.min.js',
                'jquery.carouFredSel-6.0.4-packed.js', 'jquery.meanmenu.js', 'bootstrap.min.js', 'my.script.min.js', 'jquery.simple.select.js');
            /* Load title, css, js etc... */
       }

       public function index() {
            $this->body_class[] = 'home';
            $this->current_section = 'about';
            $this->render_page(strtolower(__CLASS__) . '/index', $this->data);
       }
  } 