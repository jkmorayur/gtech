<style type="text/css">
     .product_listbg{
          margin-bottom:20px;
     }
</style>
<div id="inner_wrapper">
     <div id="inner_inner">

          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <?php echo $breadcrumb; ?>
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
                    <ul class="nav navbar-nav collapse navbar-collapse">
                         <?php getLefPanel(0, $parentCateId, $catId); ?>
                    </ul>
               </div>

               <div style="clear:both"></div>
          </div><!--home_prodectlistbg-->


          <div id="inner_contentrapper">

               <div id="inner_productbg">

                    <h1><?php echo isset($subcateName) ? $subcateName : ''; ?></h1>

                    <div>
                         <select id="cmbBrand">
                              <option value="0">Filter by Brands</option>
                              <?php if (!empty($brands)) { ?>
                                     <?php
                                     foreach ($brands as $key => $value) {
                                          if ($value['prd_count'] != 0) {
                                               ?>
                                               <option prod_in_brand="<?php echo (check_if_product_in_brand($value['brd_id'])) ? "1" : "0"; ?>"
                                                       <?php echo ((isset($brandId)) && $brandId == $value['brd_id']) ? "selected='selected'" : ''; ?>
                                                       value="<?php echo $value['brd_id']; ?>"><?php echo $value['brd_title']; ?></option>
                                                       <?php
                                                  }
                                             }
                                        }
                                      ?>
                         </select>
                    </div> 

                    <div class="pro_list">
                         <?php
                           if (!empty($products)) {

                                foreach ($products['product_details'] as $key => $value) {
                                     ?>
                                     <div class="product_listbg">
                                          <div class="product_listimage">

                                               <a href="<?php
                                               echo site_url('product/product_details') . '/' . $value['prd_id']
                                               . '/' . strtolower(trim($value['brd_title'])) . '/' . str_replace(' ', '_', strtolower(trim($value['prd_name'])));
                                               ?>">
                                                       <?php
                                                       $img = isset($value['product_image'][0]['pdi_image']) ?
                                                               $value['product_image'][0]['pdi_image'] : '';

                                                       echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/product/' .
                                                           $img, 'id' => 'imgBrandImage'));
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
                                               ADD TO CART<img src="images/cart.png" alt="" style="margin-left:5px;"/>
                                          </a>
                                     </div>
                                     <!-- -->
                                     <?php
                                }
                           } else {
                                ?>
                                <div class="empty_message">There is no product available.</div>
  <?php } ?>
                    </div><!--pro_list-->
                    <div style="margin-right:2.5%;">
<?php echo $links; ?>
                    </div>
                    <!--                    <div style="margin-right:2.5%;">
                                             <a href='#' class='button'> Next </a>
                                             <ul class='page'>
                                                  <li class='current'>1</li>
                                                  <li><a href='#'>2</a></li>
                                                  <li><a href='#'>3</a></li>
                                                  <li><a href='#'>4</a></li>
                                             </ul>
                                             <a href='#' class='button' style="margin-right:3px;"> Previous </a>                   
                                        </div>-->
               </div><!--inner_productbg-->
               <div style="clear:both"></div>
          </div><!--inner_contentrapper-->
          <div style="clear:both"></div>
     </div><!--inner_inner-->
</div><!--inner_wrapper-->

<!--home_brand_wrapper-->
<div id="home_brand_wrapper">
     <div id="home_brand_inner">

          <h1>Shop By <span style="color:#fd0505; font-weight:bold;">Brand</span></h1>

          <div id="home_shopbybrand">

               <?php if (!empty($brands)) { ?>
                      <?php
                      foreach ($brands as $key => $value) {
                           if (check_if_product_in_brand($value['brd_id'])) {
                                $url = site_url('product/brand/' . str_replace(' ', '_', strtolower(trim($value['brd_title']))));
                           } else {
                                $url = site_url('brands/brand_details/' . str_replace(' ', '_', strtolower(trim($value['brd_title']))));
                           }
                           ?>

                           <a href="<?php echo $url; ?>">
                                <?php
                                echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/brand/' .
                                    $value['brd_logo'], 'id' => 'imgBrandImage'));
                                ?>
                           </a>
                      <?php } ?>
  <?php } ?>
          </div><!--home_shopbybrand-->

          <div style="clear:both"></div>
     </div><!--home_brand_inner-->
</div><!--home_brand_wrapper-->	

<script type="text/javascript">
     $(document).ready(function () {
          $('select').selectBoxes();
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
          /*Product brand change*/
          $('#cmbBrand').change(function () {
               var url = '';
               var brandName = $('#cmbBrand').find('option:selected').text().toLowerCase();
               var brandName = brandName.replace(/\ /g, '_');
               if (brandName != 'filter_by_brands') {
                    var prod_in_brand = $('option:selected', this).attr('prod_in_brand');
                    if (prod_in_brand == 1) {
                         url = base_url + 'product/brand/' + brandName;
                    } else {
                         url = base_url + 'brands/brand_details/' + brandName;
                    }
                    window.location = url;
               } else {
                    window.location = base_url + 'product/brand/';
               }
          });
     });
</script>