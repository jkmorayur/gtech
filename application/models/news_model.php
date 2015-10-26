<?php

  if (!defined('BASEPATH'))
       exit('No direct script access allowed');

  class News_model extends CI_Model {

       public function __construct() {
            parent::__construct();
            $this->load->database();
            $this->table = 'gtech_news_events';
       }
       
       function getNews($title = '') {
            $this->db->select('*')->from($this->table);
            if ($title) {
                 $this->db->like('nws_title', $title);
            }
            $this->db->order_by('nws_date','desc');
            $newsArray = $this->db->get()->result_array();
            $news = array();
            if (!empty($newsArray)) {
                 foreach ($newsArray as $key => $value) {
                      $defaultImages = $this->db->get_where('gtech_news_images', array('nwi_default = ' => 1, 'nwi_news_id' => $value['nws_id']))->row_array();
                      $otherImages = $this->db->get_where('gtech_news_images', array('nwi_default != ' => 1, 'nwi_news_id' => $value['nws_id']))->result_array();
                      $value['default_images'] = $defaultImages;
                      $value['other_images'] = $otherImages;
                      if ($title) {
                           $news = $value;
                      } else {
                           $news[] = $value;
                      }
                 }
            }
            return $news;
       }
  }