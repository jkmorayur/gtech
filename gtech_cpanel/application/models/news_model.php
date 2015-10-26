<?php

  if (!defined('BASEPATH'))
       exit('No direct script access allowed');

  class News_model extends CI_Model {

       public function __construct() {
            parent::__construct();
            $this->load->database();
            $this->table = 'gtech_news_events';
       }
       
       function getNews($id = '') {
            $this->db->select('*')->from($this->table);
            if ($id) {
                 $this->db->where('nws_id', $id);
            }
            $newsArray = $this->db->get()->result_array();
            $news = array();
            if (!empty($newsArray)) {
                 foreach ($newsArray as $key => $value) {
                      $defaultImages = $this->db->get_where('gtech_news_images', array('nwi_default = ' => 1, 'nwi_news_id' => $value['nws_id']))->row_array();
                      $otherImages = $this->db->get_where('gtech_news_images', array('nwi_default != ' => 1, 'nwi_news_id' => $value['nws_id']))->result_array();
                      $value['default_images'] = $defaultImages;
                      $value['other_images'] = $otherImages;
                      if ($id) {
                           $news = $value;
                      } else {
                           $news[] = $value;
                      }
                 }
            }
            return $news;
       }
               
       function addNews($data) {
            if(!empty($data)) {
                 $this->db->insert($this->table, $data);
                 return $this->db->insert_id();
            } else {
                 return false;
            }
       }
       
       function addImages($image) {
            if ($this->db->insert('gtech_news_images', $image)) {
                 return true;
            } else {
                 return false;
            }
       }
       
       function updateNews($data) {
            if($data) {
                 $this->db->where('nws_id', $data['nws_id']);
                 $this->db->update('gtech_news_events', $data['news']);
                 return true;
            } else {
                 return false;
            }
       }
       
       public function removeImage($id) {
            if ($id) {
                 $this->db->where('nwi_id', $id);
                 $image = $this->db->get('gtech_news_images')->row_array();

                 if (!empty($image) && isset($image['nwi_image']) && !empty($image['nwi_image'])) {
                      if (file_exists('./assets/uploads/news/' . $image['nwi_image'])) {
                           unlink('./assets/uploads/news/' . $image['nwi_image']);
                      }
                      $this->db->where('nwi_id', $id);
                      $this->db->delete('gtech_news_images');
                      return true;
                 }
            }
            return false;
       }
       
       function deleteNews($id) {
            if (!empty($id)) {

                 $this->db->where('nwi_news_id', $id);
                 $images = $this->db->get('gtech_news_images')->result_array();
                 
                 $this->db->delete('gtech_news_images', array('nwi_news_id' => $id)); 
                 $this->db->delete('gtech_news_events', array('nws_id' => $id)); 
                 
                 if (!empty($images)) {
                      foreach ($images as $key => $value) {
                           if (file_exists('./assets/uploads/news/' . $value['nwi_image'])) {
                                unlink('./assets/uploads/news/' . $value['nwi_image']);
                           }
                      }
                 }
                 return true;
            } else {
                 return false;
            }
       }
  }