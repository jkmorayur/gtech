
<!--FOOTER-->
<div id="footer_wrapper">
     <div id="footer_inner">

          <div class="footer_innerbg">

               <div class="footer_links">
                    <h1>LINKS</h1>
                    <div class="menu_div">  
                         <ul>
                              <li><a href="<?php echo site_url(); ?>">Home</a></li>
                              <li><a href="<?php echo site_url('aboutus'); ?>">About us</a></li>
                              <li><a href="<?php echo site_url('contactus'); ?>">Contact us </a></li>
                              <li><a href="<?php echo site_url('services/dimensional_inspection'); ?>">Services</a></li>
                              <li><a href="<?php echo site_url('product'); ?>">Products</a></li>
                              <li><a href="<?php echo site_url('calibration'); ?>">Calibration</a></li>
                         </ul>            
                    </div>

                    <div class="menu_div">  
                         <ul>
                              <?php if(!isset($logged_username) && empty($logged_username)) { ?>
                              <li><a href="<?php echo site_url('user/register'); ?>">Register</a></li>
                              <li><a href="<?php echo site_url('user/login'); ?>">Login</a></li>
                              <?php } ?>
                              
                              <li><a href="<?php echo site_url('user/myaccount'); ?>">My Account  </a></li>
                              <li><a href="<?php echo site_url('cart/checkout'); ?>">Checkout</a></li>
                              <li><a href="<?php echo site_url('cart'); ?>">Shopping Cart</a></li>
                              <li><a href="<?php echo site_url('faq'); ?>">FAQ</a></li>
                              <li><a href="<?php echo site_url('sitemap/all_information_pages'); ?>">Sitemap</a></li>
                         </ul>            
                    </div>
               </div><!--footer_links-->

               <div class="footer_adress">
                    <h1>ADDRESS</h1>
                    <p>General Tech Services L.L.C<br />
                         Head Office:<br />
                         P.O. Box: 25898<br />
                         Sharjah, U A E<br />
                         Tel: +971 6 5436933<br />
                         Fax: +971 6 5437077<br />
                         Email: gentech@eim.ae<br />
                         Website: www.generaltechuae.com</p>
               </div><!--footer_adress-->
               <div style="clear:both"></div>
          </div><!--footer_innerbg-->
          <div class="footer_logobg">
               <img src="images/footerlogo.jpg" alt="" style="float:left;width:100%;"/>
               <div class="footer_social">
                    <img src="images/facebook.png" alt=""/>
                    <img src="images/twitter.png" alt=""/>
                    <img src="images/lin.png" alt=""/>
                    <img src="images/gplus.png" alt=""/>
               </div><!--footer_social-->
          </div><!--footer_logobg-->
          <div style="clear:both"></div>
     </div><!--footer_inner-->
</div><!--footer_wrapper-->

<!--FOOTER COPY-->
<div id="footercopy_wrapper">
     <div id="footercopy_inner">

          <p>© 2015 General Tech Services LLC. All Rights Reserved.</p>

          <div style="clear:both"></div>
     </div><!--footercopy_inner-->
</div><!--footercopy_wrapper-->