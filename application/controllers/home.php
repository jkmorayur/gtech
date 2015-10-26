<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Home extends App_Controller {

       public function __construct() {
            parent::__construct();
            $this->load->model('home_model');
            $this->load->model('product_model');
            $this->load->model('brand_model');
            $this->load->model('category_model');
            $this->load->model('news_model');
            $this->data['featuredProducts'] = $this->product_model->getFeaturedProducts();
            $this->data['brands'] = $this->brand_model->getBrands();

            /* Load title, css, js etc... */
           $this->page_meta_keywords = 'dimensional calibration uae, electrical calibration sharjah, pressure calibration dubai, 
               temperature calibration uae, humidity calibration dubai, torque calibration sharjah, mass 
               calibration uae, volumetric calibration sharjah, flow calibration dubai, force calibration uae';
            
            $this->page_meta_description = 'Generaltech established with the primary objective of providing top quality calibration services including 
               equipment calibration, instrument calibration, meter calibration, pressure gage calibration, electrical 
               calibration, laboratory calibration, dimensional calibration to their reputed customers in Dubai, Sharjah, UAE and Middle East.';
            
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css',
                'meanmenu.css', 'responsiveslides.css', 'bootstrap.min.css', 'main.css', 'responsive.css');
            $this->assets_js = array('responsiveslides.min.js',
                'jquery.carouFredSel-6.0.4-packed.js', 'bootstrap.min.js','jquery.validate.min.js', 'my.script.min.js');
            /* Load title, css, js etc... */
       }

       public function index() {
            $this->current_section = 'home';
            $this->page_title = "Calibration services in Sharjah / Dubai, UAE - General Tech Calibration Services";
            $this->data['news'] = $this->news_model->getNews();
            $this->render_page('home/index', $this->data);
       }

       public function search($skey = '', $page = 0) {
            $this->load->library("pagination");
            $searchString = trim($this->input->post('search'));
            if (empty($searchString)) {
                 $key = $skey;
            } else {
                 $key = $searchString;
            }
            $this->page_title = $searchString . " | General Tech Services LLC -" . STATIC_TITLE;
            if ($key) {
                 $this->page_title = $key . " | General Tech Services LLC -" . STATIC_TITLE;

                 $this->current_section = 'Product';
                 $this->data['breadcrumb'] = '<li><a href="javascript:void(0);"> Search &raquo; </a></li>'
                         . '<li><a href="javascript:void(0);" style="color:#d92523;"> ' . $key . '</a></li>';
                 $config = getPaginationDesign();
                 $productDetails = $this->home_model->search($key);
                 $config["base_url"] = site_url() . '/' . strtolower(__CLASS__) . '/search/' . $key . '/';
                 $config["total_rows"] = isset($productDetails['product_details']) ? count($productDetails['product_details']) : 0;
                 $config["per_page"] = 9;
                 $config["uri_segment"] = 4;
                 $this->pagination->initialize($config);
                 $this->data['products'] = $this->home_model->search($key, $config["per_page"], $page);
                 $this->data["links"] = $this->pagination->create_links();
                 $this->data['catId'] = '';
                 $this->data['cateName'] = '';
                 $this->data['key'] = $key;
                 $this->data['subCatId'] = '';

                 $this->data['parentCateId'] = '';
                 if (isset($this->data['products']['product_details']['0']['prd_category'])) {
                      $root = $this->category_model->getRootCategory($this->data['products']['product_details']['0']['prd_category']);
                      $this->data['parentCateId'] = isset($root[count($root) - 1]) ? $root[count($root) - 1] : '';
                 }
            } else {
                 $this->page_title = "General Tech Services LLC -".STATIC_TITLE;

                 $this->data['breadcrumb'] = '<li><a href="javascript:void(0);" style="color:#d92523;"> Search &raquo; </a></li>';
                 $this->data['message'] = 'No product found';
            }
            $this->render_page(strtolower(__CLASS__) . '/search', $this->data);
       }

       function getAutocompleteForSearch() {
            $searchkey = $this->input->get('term');
            $searchResult = $this->home_model->search($searchkey, 10, 0);
            $final = array();
            if (!empty($searchResult['product_details'])) {
                 foreach ($searchResult['product_details'] as $key => $value) {
                      if (is_numeric($searchkey)) {
                           $tmp["value"] = $value['prd_part_number'];
                           $tmp["label"] = $value['prd_part_number'];
                           array_push($final, $tmp);
                      } else {
                           $tmp["value"] = $value['prd_name'];
                           $tmp["label"] = $value['prd_name'];
                           array_push($final, $tmp);
                      }
                 }
            }
            echo json_encode($final);
       }

  }
  