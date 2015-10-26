<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Dashboard extends App_Controller {

       public function __construct() {
            
            parent::__construct();
            $this->body_class[] = 'skin-blue';
            $this->page_title = 'Welcome!';
       }

       public function index() {
            
            $this->render_page('dashboard/index');
       }
  } 