<style>
     .sitemapbg{
          width:40%;
          height:auto;
          min-height:200px;
          float:left;
          margin-bottom:60px;
          margin-left: 30px;
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
          margin-left:14%;
     }
	 @media screen and (max-width: 560px) {
		 .sitemapbg{
          width:95%;margin-bottom:10px;}
	 }
</style>
<div id="sectionb_wrapper">
     <div id="sectionb_inner">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="<?php echo site_url('sitemap/all_information_pages'); ?>"> Site map &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;"> All Information Pages</a></li>
               </ul>
          </div><!--inner_breadcombmenu-->
          <h2>All Information Pages</h2>
          
          <div style="clear:both"></div>
     </div><!--sectionb_inner-->
</div><!--sectionb_wrapper-->


	<div id="contentmatter_wrapper">
        <div id="servicetmatter_inner" style="min-height:0px !important;">
          
               <div class="quickmatter" style="margin-bottom:10px;">
                    <nav>
                         <ul>
                              <li><a href="<?php echo site_url('sitemap/product_site_map'); ?>">Product sitemap</a></li>
                              <li><a href="<?php echo site_url('sitemap/all_information_pages'); ?>" style="color:#F00;">All Information Pages</a></li>
                         </ul>
                    </nav>
               </div>
         

             <div class="sitemapbg">
                  <ul class="sitemapgt">
                       <li><a href="<?php echo site_url(); ?>">Home</a></li>
                       <li><a href="<?php echo site_url('aboutus'); ?>">About us</a></li>
                       <li>
                            <a href="javascript:void(0);">Services</a>
                            <ul>
                                 <li><a href="<?php echo site_url('services/dimensional_inspection_and_valve_setting'); ?>">Dimensional Inspection And Valve setting</a></li>
                                 <li><a href="<?php echo site_url('services/repairs'); ?>">Repairs</a></li>
                                 <li><a href="<?php echo site_url('services/authorised_service_and_calibration_center'); ?>">Authorised Service and Calibration Center</a></li>
                            </ul>
                       </li>
        
                       <li><a href="<?php echo site_url('contactus'); ?>">Contact us</a></li>
                       <li><a href="<?php echo site_url('faq'); ?>">Faq</a></li>
                       <li><a href="<?php echo site_url('requestquote'); ?>">Request quote</a></li>
                       <li><a href="<?php echo site_url('user/register'); ?>">Register</a></li>
                       <li><a href="<?php echo site_url('user/login'); ?>">login</a></li>
                       <li><a href="<?php echo site_url('user/myaccount'); ?>">My account</a></li>
                       <li><a href="<?php echo site_url('cart/checkout'); ?>">Checkout</a></li>
                       <li><a href="<?php echo site_url('cart'); ?>">Shopping cart</a></li>
                  </ul>
             </div>
             
             <div class="sitemapbg">
                  <ul class="sitemapgt">
                       <li>
                            <a href="javascript:void(0);">Calibration</a>
                            <ul>
                                 <?php if (!empty($calibration)) { ?>
                                        <?php foreach ($calibration as $key => $value) { ?>
                                             <li><a href="<?php echo site_url('calibration/calibration_service/' . $value['cal_id']); ?>"><?php echo $value['cal_title']; ?></a></li>
                                        <?php } ?>
                                   <?php } ?>
                            </ul>
                       </li>
                       <li>
                            <a href="javascript:void(0);">Calibration Service</a>
                            <ul>
                                 <li><a href="<?php echo site_url('calibration/calibration_lab'); ?>">Calibration Lab</a></li>
                                 <li><a href="<?php echo site_url('calibration/calibration_on_site'); ?>">On-site Calibration</a></li>
                            </ul>
                       </li>
                  </ul>
             </div>
             
 </div><!--servicetmatter_inner-->
</div><!--contentmatter_wrapper-->             
