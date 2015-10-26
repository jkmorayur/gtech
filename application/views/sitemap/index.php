<style>
     .sitemapbg{
          height:auto;
          min-height:200px;
          float:left;
          margin-bottom:30px;
          margin-left:30px;
     }
     ul.sitemapgt  {
          margin-top:5px;
          font-size:14px;
          color:#616161;
          margin-left:5%;
          float:left;
          margin-top:20px;
     }
     ul.sitemapgt a {
          font-size:14px;
          color:#616161;
          text-decoration:none;
     }
     ul.sitemapgt a:hover{
          color:#e2010f;
          text-decoration:underline;
     }
     ul.sitemapgt li{
          list-style-image:url(images/bullet2.png);
          clear:both;
          line-height:25px;
     }

     ul.sitemapgt ul{
          margin-left:4%;
     }
</style>
<div id="sectionb_wrapper">
     <div id="sectionb_inner">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="<?php echo site_url('sitemap/product_site_map'); ?>"> Site map &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;"> Product sitemap</a></li>
               </ul>
          </div><!--inner_breadcombmenu-->
          <h2>Product sitemap</h2>
          <div style="clear:both"></div>
          
     </div><!--sectionb_inner-->
</div><!--sectionb_wrapper-->

<div id="contentmatter_wrapper">
          <div id="servicetmatter_inner" style="min-height: 0px !important;">
          
               <div class="quickmatter" style="margin-bottom:10px;">
                    <nav>
                         <ul>
                              <li><a href="<?php echo site_url('sitemap/product_site_map'); ?>"  style="color:#F00;">Product sitemap</a></li>
                              <li><a href="<?php echo site_url('sitemap/all_information_pages'); ?>">All Information Pages</a></li>
                         </ul>
                    </nav>
               </div>
               
               
          
             <div class="sitemapbg">
                  <ul class="sitemapgt">
                       <?php
                         $CI = get_instance();
                         ini_set('memory_limit', '128M');
                         echo buildMenu(0);
        
                         function buildMenu($parent) {
                              global $CI;
                              if (!isset($build)) {
                                   $build = '';
                              }
                              $menu = $CI->category_model->getSubCategories($parent);
                              if (count($menu) > 0) {
                                   foreach ($menu as $row) {
                                        $url = ($row['cat_parent'] == 0) ? site_url('category/index/' . $row['cat_id']) : site_url('product/cat/' . $row['cat_id'] . '/0/0');
                                        $build .= '<li><a href="' . $url . '">' . $row['cat_title'] . '-' . $row['cat_id'] . '</a>';
                                        $submenu = $CI->category_model->getSubCategories($row['cat_id']); //getSubcategory($row['cat_id']);
                                        if (!empty($submenu)) {
                                             $build .= '<ul>';
                                             $build .= buildMenu($row['cat_id']);
                                             $build .= '</ul>';
                                        }
                                        $build .= getProduct($row['cat_id']);
                                        $build .= '</li>';
                                   }
                              }
                              return $build;
                         }
                       ?>
                  </ul>
             </div>
             
 </div><!--servicetmatter_inner-->
</div><!--contentmatter_wrapper-->
<?php

  function getProduct($id) {
       global $CI;
       $build = '';
       $menu = $CI->product_model->getProductsByCategoryForSitemap($id);

       if (!empty($menu)) {
            $build = '<ul>';
            foreach ($menu as $key => $value) {
                 $build .= '<li><a href="' . site_url('product/product_details/' . $value['prd_id']) . '">' . $value['prd_name'] . '</a></li>';
            }
            $build .= '</ul>';
       }
       return $build;
  }
?>
<!-- -->