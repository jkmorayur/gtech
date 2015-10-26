<style type="text/css">
     .product_listbg{
          margin-bottom:20px;
     }
</style>
<div id="inner_wrapper">
     <div id="inner_inner">

          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="javascript:void(0);"> Home &raquo; </a></li>
                    <li><a href="<?php echo site_url('product'); ?>"> Products &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;"> <?php echo isset($mainCategoryName['cat_title']) ? $mainCategoryName['cat_title'] : ''; ?> </a></li>
               </ul>
          </div><!--inner_breadcombmenu-->

          <div id="home_prodectlistbg">
               <h2>Products CATEGORIES</h2>

               <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="sr-only"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                    </button>
               </div>
               <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                         <?php echo getLefPanel(0, $parentCateId); ?>
                    </ul>
               </div>
               <div style="clear:both"></div>
          </div><!--home_prodectlistbg-->

          <div id="inner_contentrapper">
               <div id="inner_productbg">
                    <h1><?php echo isset($mainCategoryName['cat_title']) ? $mainCategoryName['cat_title'].' - Subcategories' : ''; ?></h1>
                    <div class="pro_list">
                         <?php if(!empty($categories)) { foreach ($categories as $key => $value) { ?>
                         <?php
                                if(empty($value['cat_subcate_count']) || $value['cat_subcate_count'] == 0) {
                                     //$viewAll =  site_url('product/cat/' . $value['cat_id']) . "/0/0";
                                     //$viewAll = site_url('product/cat/' . str_replace(' ', '_', strtolower(trim($value['cat_title']))));
                                     $viewAll = site_url('product/' . str_replace(' ', '_', strtolower(trim($value['cat_parent']['cat_title'])))
                                                  . '/' .str_replace(' ', '_', strtolower(trim($value['cat_title']))));     
                                } else {
                                     $viewAll =  site_url('category/view_all_categories/' . $this->uri->segment(3) . '/' . $value['cat_id']) . "/0";
                                }
                         ?>
                         <div class="product_listbg">
                              <div class="product_listimage">
                                   <!--<a href="#"><img src="images/product_1.jpg" alt=""></a>-->
                                   <a href="<?php echo $viewAll; ?>"><?php
                                     $img = isset($value['cat_image']) ?
                                             $value['cat_image'] : '';

                                     echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/category/' .
                                         $img, 'id' => 'imgBrandImage'));?>
                                   </a>
                              </div>
                              <div class="productcat_listdes">
                                   <span class="productcat_name"> <?php echo $value['cat_title'] ?> </span>
                              </div>
                              <a href="<?php echo $viewAll; ?>" class="productcat_count">
                                   <?php echo isset($value['product_count']) ? $value['product_count'] : '0'; ?> Products
                              </a>
                              
                              <a href="<?php echo $viewAll; ?>" class="productcat_viewall">
                                   <img src="images/view.png" alt="" style="margin-right:5px;">VIEW ALL
                              </a>
                         </div>
                         <?php } } ?>
                         <div style="margin-right:2.5%;">
                         <?php echo $links; ?>
                    </div>
               </div>
               <div style="clear:both"></div>
          </div>
          <div style="clear:both"></div>
     </div>
</div>