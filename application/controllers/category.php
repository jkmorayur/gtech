<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Category extends App_Controller {

       public function __construct() {
            parent::__construct();
            /* Load title, css, js etc... */
            $this->page_title = "General Tech Services LLC - ". STATIC_TITLE;
            $this->page_meta_keywords = '';
            $this->page_meta_description = '';
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css',
                'meanmenu.css', 'responsiveslides.css', 'bootstrap.min.css', 'main.css', 'responsive.css');
            $this->assets_js = array('jquery-1.11.2.min.js', 'responsiveslides.min.js',
                'jquery.carouFredSel-6.0.4-packed.js', 'jquery.meanmenu.js', 'bootstrap.min.js', 'my.script.min.js', 'jquery.simple.select.js');
            /* Load title, css, js etc... */
            $this->load->model('product_model');
            $this->load->model('category_model');
            $this->load->library("pagination");
       }

       public function index($name, $page = 0) {
            $config = getPaginationDesign();
            $this->page_title = ucfirst($name) . " | General Tech Services LLC - ". STATIC_TITLE;
            $cateDetails = $this->category_model->getCategoryByName($name, true);
            $id = isset($cateDetails['cat_id']) ? $cateDetails['cat_id'] : '';

            $categories = $this->category_model->getParentCategory($id);
            $config["base_url"] = site_url() . '/' . strtolower(__CLASS__) . '/' . $name . '/';
            $config["total_rows"] = isset($categories) ? count($categories) : 0;
            $config["per_page"] = 9;
            $config["uri_segment"] = 3;
            $this->data['parentCateId'] = $id;
            $this->pagination->initialize($config);

            $this->data['categories'] = $this->category_model->getParentCategory($id, $config["per_page"], $page);
            $this->data["links"] = $this->pagination->create_links();
            $this->data['mainCategoryName'] = $this->category_model->getCategories($id);
            $this->render_page('category/index', $this->data);
       }

       public function view_all_categories($parentId, $catId, $page = 0) {
            $config = getPaginationDesign();
            $categories = $this->category_model->getParentCategory($catId);

            $config["base_url"] = site_url() . '/' . strtolower(__CLASS__) . '/index/' . $parentId . '/' . $catId . '/';
            $config["total_rows"] = isset($categories) ? count($categories) : 0;
            $config["per_page"] = 9;
            $config["uri_segment"] = 4;
            $this->pagination->initialize($config);

            $this->data['categories'] = $this->category_model->getParentCategory($catId, $config["per_page"], $page);
            $this->data["links"] = $this->pagination->create_links();
            $this->data['mainCategoryName'] = $this->category_model->getSingleCategory($catId);
            $this->render_page('category/view_all_categories', $this->data);
       }

  }

?>