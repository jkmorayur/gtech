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
                    <li><a href="javascript:void(0);"> Products &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;"> <?php echo isset($mainCategoryName['cat_title']) ? $mainCategoryName['cat_title'] : ''; ?> </a></li>
               </ul>
          </div>

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
                    <?php
                      $mainCategories = getParentCategories();
                      if (!empty($mainCategories)) {
                           ?>
                           <ul class="nav navbar-nav collapse navbar-collapse">
       <?php foreach ($mainCategories as $key => $value) { ?>

                                <li>
                                     <a class="<?php echo ($value['cat_id'] == $this->uri->segment(3)) ? 'active' : ''; ?>" 
                                        href='<?php echo site_url('category/index/' . $value['cat_id']); ?>/0'>
                                          <?php echo $value['cat_title']; ?></a>
                                </li>
                           <?php } ?>
                           </ul>
  <?php } ?>
               </div>
               <div style="clear:both"></div>
          </div>


          <div id="inner_contentrapper">

               <div id="inner_productbg">
                    <h1><?php echo isset($mainCategoryName['cat_title']) ? $mainCategoryName['cat_title'] : ''; ?></h1>

                    <div class="pro_list">
                         <?php if(!empty($categories)) { foreach ($categories as $key => $value) { ?>
                                     
                         <div class="product_listbg">
                              <div class="product_listimage">
                                   <a href="javascript:void(0);"><?php
                                     $img = isset($value['cat_image']) ?
                                             $value['cat_image'] : '';

                                     echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/category/' .
                                         $img, 'id' => 'imgBrandImage'));
                                     ?></a>
                              </div>
                              <div class="productcat_listdes">
                                   <span class="productcat_name"> <?php echo $value['cat_title'] ?> </span>
                              </div>
                              <a href="javascript:void(0);" class="productcat_count">
                                   <?php echo isset($value['cat_subcate_count']) ? $value['cat_subcate_count'] : '0'; ?> Categories
                              </a>
                              <a href="<?php echo site_url('product/cat/' . $value['cat_id']); ?>/0/0" class="productcat_viewall">
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