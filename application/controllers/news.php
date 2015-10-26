<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class News extends App_Controller {

       public function __construct() {
            parent::__construct();
            $this->load->model('news_model');
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css',
                'meanmenu.css', 'responsiveslides.css', 'bootstrap.min.css', 'main.css', 'responsive.css');
       }

       function index($news = '') {
            if (empty($news)) {
                 $this->page_title = "Calibration services in Sharjah / Dubai, UAE - General Tech Calibration Services";
                 $data['news'] = $this->news_model->getNews();
                 $this->render_page('news/index', $data);
            } else {
                 $this->page_title = "News - ".$news;
                 $news = get_url_remaker($news);
                 $data['news'] = $this->news_model->getNews($news);
                 $this->render_page('news/news_details', $data);
            }
       }

  }
  