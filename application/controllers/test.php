<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Test extends App_Controller {

       public function __construct() {
            parent::__construct();
       }

       public function index() {
            
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.kodaikanaltoday.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'kodaikanal';
            $config['smtp_pass'] = 'Kodaikanal#@1';
            $config['charset'] = 'utf-8';
            $config['mailtype'] = 'html';
            $config['newline'] = "\r\n";
            $this->load->library('email');

            $this->email->from('<from mail>', '<from name>');
            $this->email->to('<tomail>');
            $this->email->subject('Subject');
            $this->email->message('Message');

            $this->email->send();
            echo $this->email->print_debugger();
       }

  }
  