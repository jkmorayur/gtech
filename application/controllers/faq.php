<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Faq extends App_Controller {

       public function __construct() {
            parent::__construct();
       }

       public function index() {
            $this->data['valid_captcha'] = getCaptcha();
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css', 'component.css',
                'meanmenu.css', 'bootstrap.min.css', 'main.css', 'responsive.css','faq.css');

            $this->assets_js = array('easyResponsiveTabs.js');
            
            $this->page_title = "FAQ | General Tech Services LLC -". STATIC_TITLE;
            $this->current_section = 'contactus';
            $this->render_page(strtolower(__CLASS__) . '/index', $this->data);
       }
  }  