<script type="text/javascript" src="scripts/jquery.easing.min.js"></script>
<script type="text/javascript" src="scripts/jquery.easy-ticker.js"></script>

<script type="text/javascript">
     $(document).ready(function () {

          var dd = $('.vticker').easyTicker({
               direction: 'up',
               easing: 'swing',
               speed: 'slow',
               interval: 3500,
               height: 'auto',
               visible: 1,
               mousePause: 1,
               controls: {
                    up: '.up',
                    down: '.down',
                    toggle: '.toggle',
                    stopText: 'Stop !!!'
               }
          }).data('easyTicker');

          cc = 1;
          $('.aa').click(function () {
               $('.vticker ul').append('<li>' + cc + ' Triangles can be made easily using CSS also without any images. This trick requires only div tags and some</li>');
               cc++;
          });

          $('.vis').click(function () {
               dd.options['visible'] = 2;

          });

          $('.visall').click(function () {
               dd.stop();
               dd.options['visible'] = 0;
               dd.start();
          });
     });
</script>

<!--HOME-->
<div id="home_wrapper">
     <div id="home_inner">
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

          <div id="home_contentrapper">

               <div id="home_bannerbg">

                    <div class="bannerbg">
                         <div class="slider">
                              <div class="callbacks_container">
                                   <ul class="rslides" id="slider">

                                        <li><a href="<?php echo site_url('product/product_details/197/hioki/hioki_pw_3198_-_power_quality_analyser'); ?>"><img src="images/slider_1.jpg" class="img-responsive" alt=""/>
                                                  <div class="banner_desc">
                                                       <h1>Total Solution for Measurement, Calibration & Industrial Supply</h1>
                                                  </div>
                                             </a>
                                        </li>
                                        <li><a href="<?php echo site_url('product/brand/mitutoyo'); ?>"><img src="images/slider_2.jpg" class="img-responsive" alt=""/>
                                                  <div class="banner_desc">
                                                       <h1>Total Solution for Measurement, Calibration & Industrial Supply</h1>
                                                  </div>
                                             </a>
                                        </li>
                                        <li><a href="<?php echo site_url('services/#service3'); ?>"><img src="images/slider_3.jpg" class="img-responsive" alt=""/>
                                                  <div class="banner_desc">
                                                       <h1>Total Solution for Measurement, Calibration & Industrial Supply</h1>
                                                  </div>
                                             </a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                    </div><!--bannerbg-->
               </div><!--home_bannerbg-->  
               <div id="home_productbg">

                    <h1>Featured <span style="color:#fd0505; font-weight:bold;">Products</span></h1>
                    <a href="<?php echo site_url('product/featured_products'); ?>" class="home_view">VIEW ALL</a>
                    <?php if (!empty($featuredProducts['product_details'])) {  // debug($featuredProducts); ?>
                           <div class="pro_list">
                                <?php
                                foreach ($featuredProducts['product_details'] as $key => $value) {
                                     if ($key <= 2) {
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
                                                    <img src="images/view.png" alt="" style="margin-right:5px;"/>VIEW
                                               </a>
                                               <a href="javascript:void(0);" id="<?php echo $value['prd_id']; ?>" class="product_listcart add_to_cart">
                                                    ADD TO CART<img src="images/cart.png" alt="" style="margin-left:5px;"/>
                                               </a>
                                          </div><!--product_listbg-->                 
                                          <?php
                                     }
                                }
                                ?>
                           </div><!--pro_list-->
                      <?php } ?>
               </div><!--home_productbg-->
               <div style="clear:both"></div>
          </div><!--home_contentrapper-->
          <div style="clear:both"></div>
     </div><!--home_inner-->
</div><!--home_wrapper-->

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
<!--NEWSlETTER-->
<div id="welcome_wrapper">
     <div id="hwelcome_inner">

          <img src="images/home_about.jpg" alt="" class="haboutimg">

          <div class="welcomeinnerbg">
               <h1>Welcome to <br><span style="color:#fd0505; font-weight:bold;"> General Tech Services </span></h1>
               <p>With over 30 years of experience in engineering, testing and calibration, Mr. John Mathew established General tech in 1998. After being appointed as the authorized distributor for Mitutoyo, we further partnered with several global brands to help us achieve what we are today. Over the years, we've grown from a small company with 3 employees in 1998 to over 55 people - our true strength who've been instrumental in improving our turnover steadily over the years.</p>
               <a href="#" class="welcomemore">Read More &raquo; </a>
          </div><!--welcomeinnerbg-->


          <div id="homenewsbg">

               <h1><span style="color:#fd0505; font-weight:bold;"> Latest News </span></h1>


               <div class="vticker">
                    <ul>
                         <?php if (!empty($news)) { ?>
       <?php foreach ($news as $key => $value) { ?>
                                     <li> <div class="homenewsbg">
                                               <h5><?php echo $value['nws_title'] ?></h5>
                                               <span class="homenewsdate"><?php echo date('F d, Y', strtotime($value['nws_date'])); ?></span>
                                               <a href="<?php echo site_url('news') . '/' . get_url_maker($value['nws_title']); ?>">
                                                    <?php
                                                    if (isset($value['default_images']['nwi_image']) &&
                                                            !empty($value['default_images']['nwi_image'])) {
                                                         $img = $value['default_images']['nwi_image'];
                                                    } else {
                                                         $img = isset($value['other_images'][0]['nwi_image']) ?
                                                                 $value['other_images'][0]['nwi_image'] : '';
                                                    }
                                                    ?>
                                                    <img src="<?php echo '../' . ADMIN_FOLDER . '/assets/uploads/news/' . $img; ?>" 
                                                         alt="" style="float:left; margin-right:10px; width:100px;">
                                               </a>
            <?php echo substr(strip_tags($value['nws_desc']), 0, 75) . '...'; ?>
                                               <a href="<?php echo site_url('news') . '/' . get_url_maker($value['nws_title']); ?>" class="newsmore"> [ Read More ]</a>
                                          </div>
                                     </li>
                                <?php } ?>
  <?php } ?>
                    </ul>
               </div><!--vticker-->
          </div><!--homenewsbg-->
          <div style="clear:both"></div>
     </div><!--hwelcome_inner-->
</div>
<div id="newsletter_wrapper">
     <div id="newsletter_inner">

          <div class="newsletter_title">
               <img src="images/newsletter.jpg" alt=""  class="nlettericon">
               <h1>Sign Up to Receive Our Newsletter</h1>
          </div>	<!--newsletter_title-->

          <div class="newsletter_form">
               <form method="post" name="frmNewsletter" id="frmNewsletter"  action="" >
                    <input name="nltr_email" type="text"  id="nltr_email" value="" style="position: relative;"
                           class="newsletter" placeholder="Enter your email id..." />
                    <input type="submit"  id="submit_form"   value="SUBMIT" name="submit" class="newsletterbtn"   />
               </form>
          </div>

          <div style="clear:both"></div>
     </div><!--newsletter_inner-->
</div><!--newsletter_wrapper-->
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
                         max: 6
                    }
               }
          });
          $("#frmNewsletter").submit(function (e) {
               e.preventDefault();
          }).validate({
               rules: {
                    nltr_email: {
                         required: true,
                         email: true
                    }
               },
               messages: {
                    nltr_email: {
                         required: '<img title="Please enter email" class="newsletter_error" src="images/red_warning.png"/>',
                         email: '<img title="Please enter valid email" class="newsletter_error" src="images/red_warning.png"/>'
                    }
               },
               submitHandler: function (form) {
                    $.ajax({
                         type: 'post',
                         url: 'http://www.generaltechuae.com/contactus/newsletter',
                         data: {email: $('#nltr_email').val()},
                         dataType: 'json',
                         success: function (resp) {
                              messageBox(resp);
                              $('#nltr_email').val('');
                         }
                    });
               }
          });
     });
</script>