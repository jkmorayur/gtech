<script>
     $(function () {
          $('.smoothscroll').click(function () {
               var source = $(this).attr('source');
               $('html,body').animate({
                    scrollTop: $('#'+source).offset().top
               }, 2000);
               return false;
          });
     });
</script>
<!--headertop_wrapper-->
<div id="headertop_wrapper">
     <div id="headertop_inner">
          <nav class="cl-effect-5">
               <?php if (isset($logged_username) && !empty($logged_username)) { ?>
                      <a href="javascript:void(0);">
                           <span data-hover="<?php echo 'Welcome, ' . $logged_username; ?>"><?php echo 'Welcome, ' . $logged_username; ?> </span>
                      </a>
                      <a href="<?php echo site_url('user/logout'); ?>"><span data-hover="Logout">Logout</span></a>
                 <?php } else { ?>
                      <a href="<?php echo site_url('user/register'); ?>"><span data-hover="Register">Register </span></a>
                      <a href="<?php echo site_url('user/login'); ?>"><span data-hover="Login">Login</span></a>
                 <?php } ?>

               <a href="<?php echo site_url('user/myaccount'); ?>"><span data-hover="My&nbsp;Account ">My Account </span></a>
               <a href="<?php echo site_url('cart/checkout'); ?>" style="border:none; padding-right:0px;"><span data-hover="Checkout">Checkout</span></a>
          </nav>
          <div style="clear:both"></div>
     </div><!--headertop_inner-->
</div><!--headertop_wrapper-->

<!--HEADER-->
<div id="header_wrapper">
     <div id="header_inner">

          <div class="header_logobg">
               <a href="<?php echo site_url(); ?>"><img src="images/logo.png" alt="logo"/></a>
          </div><!--header_logobg-->

          <div class="header_cartbg">
               <a href="<?php echo site_url('cart'); ?>" class="home_cart">
                    <span id="cart_count"><?php echo count($this->cart->contents()); ?></span>
               </a>
               <h5>Shopping Cart</h5>
          </div><!--header_cartbg-->

          <div class="header_searchbg">
               <a href="tel:+971 6 5436933"  class="h_contact">
                    <img src="images/iconph.png" alt="iconph" >+971 6 5436933
               </a>

               <a href="mailto:gentech@eim.ae" class="h_contact_mail">
                    <img src="images/iconmail.png" alt="iconmail" >gentech@eim.ae
               </a>

               <form method="post" name="form1" id="form1"  action="<?php echo site_url('home/search'); ?>" >
                    <input name="search" type="text"  id="tags" value="<?php echo (isset($key) && !empty($key)) ? $key : ''; ?>"  class="search" placeholder="Search Products..."/>
                    <input type="submit"  id="submit_form"   value="Search " name="submit" class="searchbtn"   />
               </form>

          </div><!--header_searchbg-->

          <div style="clear:both"></div>
     </div><!--header_inner-->
</div><!--header_wrapper-->


<!--MENU-->
<div id="menu_wrapper">
     <div id="menu_inner">

          <header>
               <nav>
                    <ul>                                         
                         <li style="<?php echo ($controller == 'home') ? 'background:#d72422;' : ''; ?>"><a href="<?php echo site_url(); ?>"><img src="images/home.png"/></a></li>
                         <li style="<?php echo ($controller == 'aboutus') ? 'background:#d72422;' : ''; ?>"><a href="<?php echo site_url('aboutus'); ?>">About Us</a></li>
                         <li style="<?php echo ($controller == 'product' || $controller == 'category') ? 'background:#d72422;' : ''; ?>"><a href="<?php echo site_url('product'); ?>">PRODUCTS</a></li>
                         <li style="<?php echo ($controller == 'services') ? 'background:#d72422;' : ''; ?>">
                              <a href="<?php echo site_url('services'); ?>">Services</a>
                              <ul> 
                                   <li><a source="service1" class="smoothscroll" href="<?php echo site_url('services/#service1'); ?>">Dimensional Inspection </a></li>
                                   <li><a source="service2" class="smoothscroll" href="<?php echo site_url('services/#service2'); ?>">Valve Testing </a></li>
                                   <li><a source="service3" class="smoothscroll" href="<?php echo site_url('services/#service3'); ?>">Repairs</a></li>
                                   <li><a source="service4" class="smoothscroll" href="<?php echo site_url('services/#service4'); ?>">Authorised Service & Calibration Center</a></li>

<!--                                   <li><a href="<?php echo site_url('services/dimensional_inspection_and_valve_setting'); ?>">Dimensional Inspection & Valve Testing  </a></li>
<li><a href="<?php echo site_url('services/repairs'); ?>">Repairs</a></li>
<li><a href="<?php echo site_url('services/authorised_service_and_calibration_center'); ?>">Authorised Service and Calibration Center</a></li>-->
                              </ul>
                         </li>  
                         <li style="<?php echo ($controller == 'calibration') ? 'background:#d72422;' : ''; ?>"><a href="<?php echo site_url('calibration'); ?>">calibration</a></li>
                         <li style="<?php echo ($controller == 'news') ? 'background:#d72422;' : ''; ?>"><a href="<?php echo site_url('news'); ?>">news</a></li>
                         <li style="<?php echo ($controller == 'contactus') ? 'background:#d72422;' : ''; ?>"><a href="<?php echo site_url('contactus'); ?>" class="bordern">Contact Us</a></li>
                         <li style="<?php echo ($controller == 'faq') ? 'background:#d72422;' : ''; ?>"><a href="<?php echo site_url('faq'); ?>" class="bordern">FAQ </a></li>
                    </ul>
               </nav>
          </header> 


          <a href="<?php echo site_url('requestquote'); ?>" class="askexpertbg">
               <img src="images/cover.png" >
               <div style="float:right;margin-top:10px;">
                    <img src="images/ask.png" style="margin-right:10px;"/>Request Quote
               </div>
          </a> <!-- askexpertbg-->



          <div style="clear:both"></div>
     </div><!--menu_inner-->
</div><!--menu_wrapper-->

<a href="<?php echo site_url('requestquote'); ?>" class="askexpertbg_2">
     <div style="float:right;margin-top:10px;">
          <img src="images/ask.png" style="margin-right:10px;"/>Request Quote
     </div>
</a> <!-- askexpertbg-->