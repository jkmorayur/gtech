<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Product extends App_Controller {

       public function __construct() {
            parent::__construct();
            $this->load->model('product_model');
            $this->load->model('category_model');
            $this->load->model('brand_model');
            $this->load->model('home_model');
            $this->load->library("pagination");
            $this->data['breadcrumb'] = 'Product';
            $this->data['brands'] = $this->brand_model->getBrands();

            /* Load title, css, js etc... */
            $this->page_title = "General Tech Services LLC -" . STATIC_TITLE;
            $this->page_meta_keywords = '';
            $this->page_meta_description = '';
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css',
                'meanmenu.css', 'responsiveslides.css', 'bootstrap.min.css', 'main.css', 'responsive.css');
            $this->assets_js = array('jquery-1.11.2.min.js', 'responsiveslides.min.js',
                'jquery.carouFredSel-6.0.4-packed.js', 'jquery.meanmenu.js', 'bootstrap.min.js', 'my.script.min.js', 'jquery.simple.select.js');
            /* Load title, css, js etc... */
       }

       public function index($parentCat = '', $name = '', $brandName = '', $page = 0) {
            
            $segmentCount = count($this->uri->segment_array());
            if ($segmentCount > 2) {

                 $brandDetails = $this->brand_model->getBrandByName($brandName);
                 $brand = isset($brandDetails['brd_id']) ? $brandDetails['brd_id'] : '';
                 
                 $pCate = $this->category_model->getCategoryByName($parentCat);
                 $parenrId = isset($pCate['cat_id']) ? $pCate['cat_id'] : '';

                 $cateDetails = $this->category_model->getCategoryByName($name, false, $parenrId);
                 $id = isset($cateDetails['cat_id']) ? $cateDetails['cat_id'] : '';
                 $this->data['brand_array'] = $this->brand_model->getBrandsAssociatedwithCategory($id);
                 $this->page_title = ucfirst(get_original_name_for_url($parentCat)) . ' | ' .
                         ucfirst(get_original_name_for_url($name)) . ' | General Tech Services LLC -' . STATIC_TITLE;
                 $this->current_section = 'Product';
                 $config = getPaginationDesign();
                 $productDetails = $this->product_model->getProductsByCategory($id, $brand);
                 
                 if (!is_numeric($brandName)) {
                      $config["base_url"] = site_url() . strtolower(__CLASS__) . '/' . $parentCat . '/' . $name . '/' . $brandName . '/';
                      $config["uri_segment"] = 5;
                 } else {
                      $config["base_url"] = site_url() . strtolower(__CLASS__) . '/' . $parentCat . '/' . $name;
                      $config["uri_segment"] = 4;
                 }
                 
                 $config["total_rows"] = isset($productDetails['product_details']) ? count($productDetails['product_details']) : 0;
                 $config["per_page"] = 9;
                 
                 $this->pagination->initialize($config);
                 $this->data['products'] = $this->product_model->getProductsByCategory($id, $brand, $config["per_page"], $page);

                 $this->data["links"] = $this->pagination->create_links();
                 $this->data['catId'] = $id;
                 $this->data['cateName'] = $this->home_model->getCategories($id);
                 $this->data['brandId'] = $brand;
                 $this->data['subCatId'] = '';

                 $categoryList = $this->category_model->getRootCategory($id);
                 $this->data['parentCateId'] = isset($categoryList[count($categoryList) - 1]) ?
                         $categoryList[count($categoryList) - 1] : '';

                 $catTitle = isset($this->data['cateName'][0]['category_name']) ? $this->data['cateName'][0]['category_name'] : '';

                 $parent = isset($this->data['cateName'][0]['cat_parent']) ? $this->data['cateName'][0]['cat_parent'] : '';
                 $parent = $this->category_model->getCategories($parent);
                 $parent = isset($parent['cat_title']) ? $parent['cat_title'] : '';

                 $this->data['breadcrumb'] = '<li><a href="' . site_url('product') . '"> Products &raquo; </a></li>
                 <li><a href="' . site_url('category/') . '/' . str_replace(' ', '_', strtolower(trim($parent))) . '"> ' . $parent . ' &raquo; </a></li>
                 <li><a href="javascript:void(0);" style="color:#d92523;"> ' . $catTitle . '</a></li>';
                 $this->data['subcateName'] = $catTitle . ' - Product List';
                 $this->render_page(strtolower(__CLASS__) . '/index', $this->data);

            } else {

                 $page = empty($parentCat) ? 0 : $parentCat;
                 $this->page_title = 'Products - General Tech Services LLC -' . STATIC_TITLE;
                 $this->current_section = 'Product';
                 $this->data['breadcrumb'] = '<li><a href="' . site_url('product') . '" style="color:#d92523;"> Products </a></li>';
                 $config = getPaginationDesign();
                 $productDetails = $this->product_model->getProducts();
                 $this->data['brand_array'] = $this->brand_model->getAllBrandsIfProductsExists();
                 $config["base_url"] = site_url() . strtolower(__CLASS__);
                 $config["total_rows"] = isset($productDetails['product_details']) ? count($productDetails['product_details']) : 0;
                 $config["per_page"] = 9;
                 $config["uri_segment"] = 2;
                 $this->pagination->initialize($config);
                 $this->data['products'] = $this->product_model->getProducts('', false, $config["per_page"], $page);

                 $this->data["links"] = $this->pagination->create_links();
                 $this->data['catId'] = '';
                 $this->data['cateName'] = '';
                 $this->data['subcateName'] = 'Product List';
                 $this->data['subCatId'] = '';
                 $this->data['parentCateId'] = '';
                 $this->render_page(strtolower(__CLASS__) . '/index', $this->data);
            }
       }

       public function subcat($id) {
            $this->body_class[] = 'home';
            $this->page_title = 'Product';
            $this->current_section = 'Product';
            $this->data['products'] = $this->product_model->getProductsBySubCategory($id);
            $this->data['subCatId'] = $id;
            $this->data['catId'] = '';
            $this->render_page(strtolower(__CLASS__) . '/index', $this->data);
       }

       public function brand($brandName='', $page = 0) {
            
            $brandDetails = $this->brand_model->getBrandByName($brandName);
            $id = isset($brandDetails['brd_id']) ? $brandDetails['brd_id'] : '';

            $this->body_class[] = 'home';
            $this->page_title = 'Brand - ' . $brandName;

            $this->page_title = $brandDetails['brd_title'] . ' | General Tech Services LLC -' . STATIC_TITLE;

            $this->data['breadcrumb'] = 'brand';
            $this->current_section = 'Product';
            $products = $this->product_model->getProductsByBrand($id);
            $config = getPaginationDesign();
            $config["base_url"] = site_url() . '/' . strtolower(__CLASS__) . '/brand/' . $brandName . '/';
            $config["total_rows"] = !empty($products['product_details']) ? count($products['product_details']) : 0;
            $config["per_page"] = 9;
            $config["uri_segment"] = 4;
            $this->pagination->initialize($config);
            $this->data['products'] = $this->product_model->getProductsByBrand($id, $config["per_page"], $page);
            $this->data['parentCateId'] = '';
            if (isset($this->data['products']['product_details']['0']['prd_category'])) {
                 $root = $this->category_model->getRootCategory($this->data['products']['product_details']['0']['prd_category']);
                 $this->data['parentCateId'] = isset($root[count($root) - 1]) ? $root[count($root) - 1] : '';
            }
            $this->data['catId'] = '';
            $this->data['subCatId'] = '';
            $this->data['brandId'] = $id;
            $brand = isset($this->data['products']['product_details']['0']['brd_title']) ?
                    $this->data['products']['product_details']['0']['brd_title'] : '';
            $this->data['breadcrumb'] = '<li><a href="' . site_url('product') . '"> Products &raquo; </a></li>
                 <li><a href="javascript:void(0);" style="color:#d92523;"> ' . $brand . ' </a></li>';
            $this->data['subcateName'] = 'Product list';
            $this->data["links"] = $this->pagination->create_links();
            $this->render_page(strtolower(__CLASS__) . '/brand', $this->data);
       }

       public function product_details($id, $brand = '', $name = '', $name1 = '') {
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css',
                'meanmenu.css', 'responsiveslides.css', 'bootstrap.min.css', 'main.css', 'responsive.css', 'easy-responsive-tabs.css', 'zoom/multizoom.css');

            $this->assets_js = array('my.script.min.js');
            $this->data['featuredProducts'] = $this->product_model->getFeaturedProducts();

            $productDetails = $this->product_model->getProducts($id);
            $productDetails = isset($productDetails['product_details']['0']) ? $productDetails['product_details']['0'] : array();
            $this->data['product_details'] = $productDetails;
            if (isset($this->data['product_details']['prd_page_title']) && !empty($this->data['product_details']['prd_page_title'])) {
                 $this->page_title = 'General Tech Services LLC | ' . $this->data['product_details']['prd_page_title'];
            } else {
//                 $this->page_title = $productDetails['prd_part_number'] . ' | ' . $productDetails['brd_title'] . ' | ' . $productDetails['prd_name'] .
//                         ' | General Tech Services LLC - Calibration Services Dubai | Calibration Services Sharjah | '
//                         . 'Calibration Services UAE | Calibration Services Oman | Calibration Services Saudi | '
//                         . $productDetails['brd_title'] . ' Dubai | ' . $productDetails['brd_title'] . ' UAE | '
//                         . $productDetails['brd_title'] . ' Sharjah | ' . $productDetails['brd_title'] . ' Abu Dhabi | '
//                         . $productDetails['brd_title'] . ' Oman | ' . $productDetails['brd_title'] . ' Qatar | '
//                         . $productDetails['brd_title'] . ' Saudi';
                 $this->page_title = $productDetails['prd_part_number'] . ' | ' . $productDetails['brd_title'] . ' | ' . $productDetails['prd_name'] .
                         ' | General Tech Services LLC - ' . STATIC_TITLE;
            }
            if (isset($this->data['product_details']['prd_page_keyword']) && !empty($this->data['product_details']['prd_page_keyword'])) {
                 $this->page_meta_keywords = $this->data['product_details']['prd_page_keyword'];
            } else {
                 $this->page_meta_keywords = $productDetails['prd_name'] . ', ' .
                         $productDetails['prd_part_number'] . ', ' .
                         $productDetails['brd_title'] . ' uae';
            }

            if (isset($this->data['product_details']['prd_page_desc']) && !empty($this->data['product_details']['prd_page_desc'])) {
                 $this->page_meta_description = $this->data['product_details']['prd_page_desc'];
            } else {
                 $this->page_meta_description = $productDetails['prd_name'] . ', ' .
                         $productDetails['prd_part_number'] . ', ' .
                         $productDetails['brd_title'] . ' uae';
            }

            $this->data['relatedProducts'] = $this->product_model->relatedProducts($productDetails['prd_category'], '', $id, 2);
            $this->render_page(strtolower(__CLASS__) . '/product_view', $this->data);
       }

       public function featured_products($brand = 0, $page = 0) {

            $this->body_class[] = 'home';
            $this->page_title = 'Featured Products | General Tech Services LLC - ' . STATIC_TITLE;
            $this->data['breadcrumb'] = 'brand';
            $this->current_section = 'Product';
            $products = $this->product_model->getFeaturedProducts('', $brand);

            $config = getPaginationDesign();
            $config["base_url"] = site_url() . '/' . strtolower(__CLASS__) . '/all_featured_products/' . $brand . '/';
            $config["total_rows"] = !empty($products['product_details']) ? count($products['product_details']) : 0;
            $config["per_page"] = 9;
            $config["uri_segment"] = 4;
            $this->pagination->initialize($config);
            $this->data['products'] = $this->product_model->getFeaturedProducts('', $brand, $config["per_page"], $page);
            $this->data['catId'] = '';
            $this->data['subCatId'] = '';
            $this->data['brandId'] = $brand;

            $brand = isset($this->data['products']['product_details']['0']['brd_title']) ?
                    $this->data['products']['product_details']['0']['brd_title'] : '';

            $this->data['breadcrumb'] = '<li><a href="' . site_url('product') . '"> Products &raquo; </a></li>
                 <li><a href="javascript:void(0);" style="color:#d92523;">Featured Products</a></li>';
            $this->data["links"] = $this->pagination->create_links();
            $this->render_page(strtolower(__CLASS__) . '/featured_products', $this->data);
       }

  }
  