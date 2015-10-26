<?php

  /**
   * Function for crop image with jcrop
   * @param array $upload_data
   * @param array $postDatas
   * @return boolean
   */
  function crop($upload_data, $postDatas) {
       $CI = & get_instance();

       $x1 = $postDatas['x1'];
       $x1 = isset($x1['0']) ? $x1['0'] : '';

       $x2 = $postDatas['x2'];
       $x2 = isset($x2['0']) ? $x2['0'] : '';

       $y1 = $postDatas['y1'];
       $y1 = isset($y1['0']) ? $y1['0'] : '';

       $y2 = $postDatas['y2'];
       $y2 = isset($y2['0']) ? $y2['0'] : '';

       $w = $postDatas['w'];
       $w = isset($w['0']) ? $w['0'] : '';

       $h = $postDatas['h'];
       $h = isset($h['0']) ? $h['0'] : '';

       $CI->load->library('image_lib');

       $image_config['image_library'] = 'gd2';
       $image_config['source_image'] = $upload_data["file_path"] . $upload_data["file_name"];
       $image_config['new_image'] = $upload_data["file_path"] . $upload_data["file_name"];
       $image_config['quality'] = "100%";
       $image_config['maintain_ratio'] = FALSE;
       $image_config['x_axis'] = $x1;
       $image_config['y_axis'] = $y1;
       $image_config['width'] = $w;
       $image_config['height'] = $h;

       $CI->image_lib->initialize($image_config);

       if (!$CI->image_lib->crop()) {
            return true;
       } else {
            return false;
       }
  }

  function get_options($array, $parent = 0, $indent = "") {
       $return = array();
       foreach ($array as $key => $val) {
            if ($val["parent_category_id"] == $parent) {
                 $return["x" . $val["category_id"]] = $indent . $val["category_name"];
                 $return = array_merge($return, get_options($array, $val["category_id"], $indent . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"));
            }
       }
       return $return;
  }
  
  function debug($array, $ex = 0) {
       echo '<pre>';
       print_r($array);
       if($ex == 0) 
            exit;
  }

?>