<style type="text/css">
     #inner_contentrapper p{
          margin-bottom:10px;
     }
</style>
<div id="inner_wrapper">
     <div id="inner_inner">

          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="javascript:void(0);"> Brand &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;"><?php echo $brandDetails['brd_title']; ?> </a></li>
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
                         <?php getLefPanel(0); ?>
                    </ul>
               </div>

               <div style="clear:both"></div>
          </div><!--home_prodectlistbg-->


          <div id="inner_contentrapper">

               <div class="brandwrapper">
                    <?php
                      echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/brand/' .
                          $brandDetails['brd_banner'], 'class' => 'brandbanner'));
                    ?>
<!--                    <img src="images/brandbanner.jpg" alt="" class="brandbanner" >-->

                    <h1 style="margin-left:0px; margin-top:20px;"><?php echo $brandDetails['brd_title']; ?>  </h1>

                    <?php
                      echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/brand/' .
                          $brandDetails['brd_logo'], 'class' => 'brandbanner', 'style' => 'float:right;width:140px;'));
                    ?>
<!--                    <img src="images/Wika.png" alt="" style="float:right;width:100px; ">-->

                    <div class="brandwrapper" style="text-align:justify;">

                         <?php echo $brandDetails['brd_desc']; ?> 
                    </div>

               </div><!--brandwrapper-->



               <div style="clear:both"></div>
          </div><!--inner_contentrapper-->



          <div style="clear:both"></div>
     </div><!--inner_inner-->
</div><!--inner_wrapper-->
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
          $("#slider").responsiveSlides({
               auto: true,
               nav: true,
               speed: 800,
               namespace: "callbacks",
               pager: true
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