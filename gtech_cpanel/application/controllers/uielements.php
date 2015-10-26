<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Uielements extends App_Controller {

       public function __construct() {
            parent::__construct();
       }

       public function dashboard() {
            
            $this->body_class[] = 'skin-blue';
            $this->page_title = 'Welcome!';
            $this->current_section = 'home';
            $this->render_page('ui_elements/dashboard');
       }
  }