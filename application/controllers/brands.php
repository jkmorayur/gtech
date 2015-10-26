<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Brands extends App_Controller {

       public function __construct() {
            parent::__construct();
            $this->load->model('brand_model');
            $this->load->library('pagination');
            
            /* Load title, css, js etc... */
            $this->page_title = "General Tech Services LLC -". STATIC_TITLE;
            $this->page_meta_keywords = '';
            $this->page_meta_description = '';
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css',
                'meanmenu.css', 'responsiveslides.css', 'bootstrap.min.css', 'main.css', 'responsive.css');
            $this->assets_js = array('responsiveslides.min.js',
                'jquery.carouFredSel-6.0.4-packed.js', 'bootstrap.min.js', 'my.script.min.js');
            /* Load title, css, js etc... */
            $this->data['brands'] = $this->brand_model->getBrands();
       }

       public function index($offset = 0) {
            $this->body_class[] = 'home';
            $this->page_title = 'Brands';
            $this->current_section = 'brands';
            /**/
            $num_rows = $this->brand_model->getCount();
            $config['base_url'] = base_url() . 'index.php/brands/index';
            $config['total_rows'] = $num_rows;
            $config['per_page'] = 12;
            $config['num_links'] = $num_rows;
            $config['use_page_numbers'] = TRUE;
            /**/
            $config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationA tsc_paginationA01">';
            $config['full_tag_close'] = '</ul>';
            $config['prev_link'] = '&lt;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&gt;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="current"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['first_link'] = '&lt;&lt;';
            $config['last_link'] = '&gt;&gt;';
            
            $this->pagination->initialize($config);
            $this->data['brands'] = $this->brand_model->getBrandPagination($config['per_page'], $offset);
            $this->render_page(strtolower(__CLASS__).'/index', $this->data);
       }
       
       function brand_details($brand) {
            $this->data['brandDetails'] = $this->brand_model->getBrandByName($brand);
            
            $this->page_title = $this->data['brandDetails']['brd_title'] . " | General Tech Services LLC -". STATIC_TITLE;
            
            $this->render_page(strtolower(__CLASS__) . '/brand_details', $this->data);
       }
  } 