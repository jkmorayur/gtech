<style type="text/css">
     .product_listbg{
          width:46%; margin:0px; margin-left:3%; float:right;font-family: 'PT Sans', sans-serif;}
     @media screen and (max-width: 640px) {
          .product_listbg{
               width:45%; margin:0px 2%;}
     }
     @media screen and (max-width: 460px) {
          .product_listbg{
               width:100%; margin:5px 0%;}
     }
</style>
<!--<script src="scripts/jquery-1.11.2.min.js"></script>-->
<script type="text/javascript">
     $(document).ready(function () {
          setTimeout(function () {
               $('.loading').hide();
               $('.resp-tabs-container').fadeIn();
          }
          , 500);
     });
</script>

<div id="inner_wrapper" style="border-bottom:none;">
     <div id="inner_individual">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="<?php echo site_url('product'); ?>"> Products &raquo; </a></li>
                    <li><a href="<?php echo site_url('category/' . str_replace(' ', '_', strtolower(trim($product_details['category_name'])))); ?>"> 
                              <?php echo isset($product_details['category_name']) ? $product_details['category_name'] : '' ?> &raquo; </a>
                    </li>
                    <li><a href="<?php echo site_url('product/' . str_replace(' ', '_', strtolower(trim($product_details['category_name']))) . '/' . str_replace(' ', '_', strtolower(trim($product_details['sub_category_name'])))); ?>"> 
                              <?php echo isset($product_details['sub_category_name']) ? $product_details['sub_category_name'] : '' ?>  &raquo; </a>
                    </li>
                    <li><a href="javascript:void(0);" style="color:#d92523;"> <?php echo isset($product_details['prd_name']) ? $product_details['prd_name'] : '' ?> </a></li>
               </ul>
          </div><!--inner_breadcombmenu-->

          <h1><?php echo isset($product_details['prd_name']) ? $product_details['prd_name'] : '' ?></h1>

          <div class="product_singleimage" style="position:relative;">

               <div class="proimagdis">                        
<!--                    <img id="image2" border="0" src="zoom/zoom.jpg" alt="product">-->
                    <?php $img = isset($product_details['product_image']['0']['pdi_image']) ? $product_details['product_image']['0']['pdi_image'] : ''; ?>
                    <?php echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/product/' . $img, 'id' => 'image2', 'alt' => "product", 'border' => '0')); ?>
               </div>
<!--               <img border="0" src="zoom/zoom.jpg" alt="product" class="proimagdis_2">-->
               <!-- -->
               <div class="prd_logos">
                    <?php if(isset($product_details['prd_type']) && !empty($product_details['prd_type'])) { ?>
                         <img src="images/<?php echo $product_details['prd_type'].'g.jpg'; ?>" alt=""/>
                    <?php } ?>
                    
                    <?php if(isset($product_details['prd_ce']) && !empty($product_details['prd_ce'])) { ?>
                         <img src="images/ce.jpg" alt=""/>
                    <?php } ?>
                         
                    <?php if(isset($product_details['prd_provide_cali_service']) && !empty($product_details['prd_provide_cali_service'])) { ?>
                         <img src="images/csp.jpg" alt=""/>
                    <?php } ?>
                         
                    <?php if(isset($product_details['prd_genuine_product']) && !empty($product_details['prd_genuine_product'])) { ?>
                         <img src="images/gp.jpg" alt=""/>
                    <?php } ?>
                         
                    <?php if(isset($product_details['prd_replacement_guarantee']) && !empty($product_details['prd_replacement_guarantee'])) { ?>
                         <img src="images/prg.jpg" alt=""/>
                    <?php } ?>
                         
                    <?php if(isset($product_details['prd_free_shipping_in_UAE']) && !empty($product_details['prd_free_shipping_in_UAE'])) { ?>
                         <img src="images/ship.jpg" alt=""/>
                    <?php } ?>
               </div>
               <!-- -->
               <div style="clear:both"></div>
          </div>

          <div id="product_singledes">
               <h2>Description</h2>
               <div class="indproduct_name"> <?php echo isset($product_details['prd_name']) ? $product_details['prd_name'] : '' ?> </div>

               <div class="indproduct_brand" style="width:100%;">
                    <span style="margin-top:15px; float:left; font-weight:bold;">
                         Brand : <?php echo isset($product_details['brd_title']) ? $product_details['brd_title'] : '' ?> 
                    </span>
                    <?php echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/brand/' . $product_details['brd_logo'], 'id' => 'imgBrandImage', 'style' => "float:right; height:50px;")); ?>
               </div>

               <div style="float:left; width:100%; border-bottom:1px dotted #c7c7c7; padding-bottom:10px; margin-bottom:10px;">
                    <div class="indproduct_code" style="font-weight:bold;"> Part Number : <span style="color:#d72422;"><?php echo isset($product_details['prd_part_number']) ? $product_details['prd_part_number'] : '' ?>  </span>
                    </div>
                    <div class="indproduct_stock" style="font-weight:bold; "> Stock Status :  
                         <?php if ($product_details['prd_in_stock'] == 1) { ?>
                                <img src="images/stock_in.jpg"> <span> In Stock   </span>
                           <?php } else { ?>
                                <img src="images/stock_out.jpg"> <span> Out of Stock   </span>
                           <?php } ?>
                    </div>
               </div><!---->    

               <div class="indproduct_des"> <?php echo!empty($product_details['prd_desc']) ? $product_details['prd_desc'] : $product_details['prd_desc_new'] ?> </div>

               <form method="get" name="form1" id="form1"  action="cart.html" >
                    <div class="product_des_pricecartbg">
                         <div class="inerdes_formbg" style="font-weight:bold;">
                              Quantity:
                              <input name="txtQty" type="text"  id="txtQty" value="1"  class="innercartfield" placeholder=""/>
                         </div>

                    </div>
                    <div class="indproduct_calibration">  Provide Calibration Services &nbsp;
                         <input type="checkbox" name="vehicle" value="Bike">
                    </div>
                    <input type="button" id="<?php echo $product_details['prd_id']; ?>"   value="ADD TO CART" 
                           name="submit" class="prodect_descart add_to_cart" />  
               </form>   
          </div><!--product_singledes-->
          <div style="clear:both"></div>
     </div><!--inner_individual-->
</div><!--inner_wrapper-->
<!--PRO FEATURS-->
<div id="profeaters_wrapper">
     <div id="profeaters_inner">
          <div class="hinner_tabbg">
               <!--Horizontal Tab-->
               <div id="horizontalTab">
                    <ul class="resp-tabs-list">
                         <!--<li>Description</li>-->
                         <li>Features</li>
                         <li>Specification </li>
                         <li>Downloads </li>
                    </ul>

                    <div class='loading'>
                         <img src="images/loader.GIF" />
                    </div>
                    <div class="resp-tabs-container" style="display:none;">
                         <div>
                              <?php
                                echo (isset($product_details['prd_features']) && !empty($product_details['prd_features'])) ?
                                        $product_details['prd_features'] : 'No Features'
                              ?>
                              <div style="clear:both;"></div>
                         </div>
                         <!--                         <div>
                                                       <p>
                         <?php echo!empty($product_details['prd_desc']) ? $product_details['prd_desc'] : $product_details['prd_desc_new'] ?>
                                                       </p>
                                                       <div style="clear:both;"></div>
                                                  </div>-->

                         <div>
                              <?php if (!empty($product_details['product_specification'])) { ?>
                                     <div class="specificationsbg">
                                          <div class="specifywrapper">
                                               <div class="specifications_head">Specifications</div>
                                               <div class="specifications_head">Specifications Details</div>
                                          </div>
                                          <?php foreach ($product_details['product_specification'] as $key => $value) { ?>
                                               <div class="specifywrapper">
                                                    <div class="specifications_des"><?php echo $value['spe_specification']; ?></div>
                                                    <div class="specifications_des"><?php echo $value['spe_specification_detail']; ?></div>
                                               </div>
                                          <?php } ?>
                                     </div><!--specificationsbg-->
                                <?php } else { ?>
                                     No Specification
                                <?php } ?>
                              <div style="clear:both;"></div>
                         </div>
                         <div>
                              <?php foreach ($product_details['product_docs'] as $key => $value) { ?>

                                     <div style="float:left; width:100%; padding-bottom:10px; margin-top:5px; border-bottom:1px dotted #CCC;">
                                          <a class="pdfdownload" download href="<?php echo '../' . ADMIN_FOLDER . '/assets/uploads/product_docs/' . $value['pdc_title']; ?>">
                                               <img src="images/pdfd.png" />      
                                               <?php echo $value['pdc_title']; ?>
                                               &nbsp;<img src="images/down.png"/>
                                          </a>
                                     </div>
                                <?php } ?>
                         </div>
                    </div><!--resp-tabs-container-->
               </div><!--Horizontal Tab-->
          </div><!--hinner_tabbg--> 

          <div class="related_productbg">
               <h1>Similar <span style="color:#fd0505; font-weight:bold;">Products</span></h1>
               <div class="pro_realtedlist"> 
                    <?php
                      if (!empty($relatedProducts['product_details'])) {
                           foreach ($relatedProducts['product_details'] as $key => $value) {
                                if ($key < 2) {
                                     ?>
                                     <div class="product_listbg">
                                          <div class="product_listimage">
                                               <a href="<?php
                                               echo site_url('product/product_details') . '/' . $value['prd_id']
                                               . '/' . strtolower(trim($value['brd_title'])) . '/' . str_replace(' ', '_', strtolower(trim($value['prd_name'])));
                                               ?>">
                                                       <?php
                                                       $img = isset($value['product_image']['0']['pdi_image']) ?
                                                               $value['product_image']['0']['pdi_image'] : '';
                                                       echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/product/' . $img, 'id' => 'imgBrandImage'));
                                                       ?>
                                               </a>
                                          </div>
                                          <div class="product_listbrand">
                                               <?php echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/brand/' . $value['brd_logo'], 'id' => 'imgBrandImage', 'style' => "height:50px;")); ?>
                                          </div>
                                          <div class="product_listdes">
                                               <span class="product_no"> Part Number : <?php echo $value['prd_part_number']; ?></span>
                                               <span class="product_name"> <?php echo $value['prd_name']; ?> </span>
                                          </div>
                                          <a href="<?php
                                          echo site_url('product/product_details') . '/' . $value['prd_id']
                                          . '/' . strtolower(trim($value['brd_title'])) . '/' . str_replace(' ', '_', strtolower(trim($value['prd_name'])));
                                          ?>" class="product_listview">
                                               <img src="images/view.png" alt="" style="margin-right:5px;">VIEW
                                          </a>
                                          <a href="javascript:void(0);" id="<?php echo $value['prd_id']; ?>" class="product_listcart add_to_cart">
                                               ADD TO CART<img src="images/cart.png" alt="" style="margin-left:5px;">
                                          </a>
                                     </div>
                                     <?php
                                }
                           }
                      }
                    ?>
               </div>
          </div>
          <div style="clear:both"></div>
     </div>
</div>


<!--home_brand_wrapper-->
<div id="home_brand_wrapper">
     <div id="home_brand_inner">

          <h1>Shop By <span style="color:#fd0505; font-weight:bold;">Brand</span></h1>

          <div id="home_shopbybrand">
               <?php
                 if (!empty($brands)) {
                      foreach ($brands as $key => $value) {
                           if (check_if_product_in_brand($value['brd_id'])) {
                                $url = site_url('product/brand/' . str_replace(' ', '_', strtolower(trim($value['brd_title']))));
                           } else {
                                $url = site_url('brands/brand_details/' . str_replace(' ', '_', strtolower(trim($value['brd_title']))));
                           }
                           ?>
                           <a href="<?php echo $url; ?>">
                                <?php echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/brand/' . $value['brd_logo'], 'id' => 'imgBrandImage')); ?>
                           </a>
                           <?php
                      }
                 }
               ?>
          </div>
     </div><!--home_shopbybrand-->

     <div style="clear:both"></div>
</div><!--home_brand_inner-->
</div><!--home_brand_wrapper-->	

<script type="text/javascript" src="zoom/multizoom.js"></script>	 
<script >
     jQuery(document).ready(function ($) {
          $('#image2').addimagezoom() // single image zoom with default options
     })
</script>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script src="scripts/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
     $(document).ready(function () {
          $('#horizontalTab').easyResponsiveTabs({
               type: 'default', //Types: default, vertical, accordion           
               width: 'auto', //auto or any width like 600px
               fit: true, // 100% fit in a container
               closed: 'accordion', // Start closed if in accordion view
               activate: function (event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
               }
          });
          $('#carousel').carouFredSel({
               responsive: true,
               scroll: 1,
               items: {
                    width: 140,
                    height: 80,
                    visible: {
                         min: 1,
                         max: 7
                    }
               }
          });
     });

</script> 

<!--<script src="scripts/jquery.meanmenu.js"></script> 
<script>
        jQuery(document).ready(function () {
                jQuery('header nav').meanmenu();
        });
</script>-->

<script src="scripts/bootstrap.min.js"></script>   	

<!-- -->
<script src="scripts/jquery.carouFredSel-6.0.4-packed.js" type="text/javascript"></script>
<!-- -->