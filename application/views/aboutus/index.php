<div id="contentmatter_wrapper">
     <div class="about_imagebg">
          <div id="about_inner">
               <div id="inner_breadcombmenu">
                    <ul>
                         <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                         <li><a href="javascript:void(0);" style="color:#d92523;"> About Us </a></li>
                    </ul>
               </div><!--inner_breadcombmenu-->
               <h1>About Us</h1>
               <img src="images/aboutlogo.png" alt=""  class="aboutlogo">
               <h3><span>Our </span> History</h3>
               <div class="welcome_content">
                    With over 30 years of experience in engineering, testing and calibration, Mr. John Mathew established General Tech in 1998.<br>
                    After being appointed as the authorized distributor for Mitutoyo, we further partnered with several global brands to help us achieve what we are today. Over the years, we've grown from a small company with 3 employees in 1998 to over 55 people - our true strength who've been instrumental in improving our turnover steadily over the years.	
               </div>
               <div style="clear:both"></div>
          </div><!--about_inner-->
     </div>
</div><!--contentmatter_wrapper-->

<div id="about_teamimage">
     <img src="images/team.jpg" alt="">
     <div class="about_teamimagedot">
          <h1>Our Team</h1>
     </div>
</div><!--about_teamimage-->

<!--INNER-->
<div id="contentmatter_wrapper">
     <div class="about_imagebgb">
          <div id="about_inner">
               <div class="welcome_content">
                    <p>Our People are our Greatest Asset</p>

                    <p>General Tech has state-of-the-art technology and capabilities, but we are great at what we do because the staff members who work here genuinely care about our customers. This makes them deliver quality work every single day. </p>
                    <p>Our company was built and continues to grow due to our team and their hard work.  Our greatest asset is our human resource.  With over 55 people including our strong technical team of 30 working at General Tech ensures that you have the right answer to all your technical queries.</p>
               </div>


               <h3><span>Why </span>choose Us</h3>

               <div class="welcome_whychoosebg">
                    <p style="text-align:left; margin-bottom:0px; line-height:18px;"> 1- We offer calibration services satisfying the following standards: </p>
                    <ul class="about">
                         <li>ISO/IEC 17025</li>
                         <li>ANSI Z-540</li>
                         <li>ISO 9001</li>
                         <li>ISO/TS16949</li>
                         <li>API Ql9th edition</li>
                         <li>ISO 10012</li>
                         <li>Pharmaceutical Industry Standards</li>
                    </ul>
                    <p style="text-align:left;line-height:18px;"> 2 - We provide traceability for all our master equipment: DAC/UKAS/NABL/DAKKS</p>
                    <p style="text-align:left;margin-bottom:0px;line-height:18px;"> 3 - We at GCLC offer the following features and value-added benefits:</p>
                    <ul class="about" style="margin-bottom:30px;">
                         <li>Continual DAC accreditation and improvements in the scope</li>
                         <li>Calibration management solutions</li>
                         <li>Maintenance of equipment inventory</li>
                         <li>Instrument recall service with auto reminders for calibration-due items</li>
                         <li>Fixed price quotations, service-level agreements and service contracts</li>
                         <li>Fast and efficient service</li>
                         <li>Technical investigations</li>
                         <li>World-class expertise</li>
                         <li>Leading edge equipment</li>
                         <li>Test reports, Certificates of Traceability and full service reports</li>
                         <li>On-site testing and calibration </li>
                         <li>Customised turnaround time, including urgent same-day service</li>
                         <li>Optional pick-up and delivery service, including door-to-door delivery</li>
                         <li>Calibration training and consultancy</li>
                         <li>Dedicated staff of engineers, scientists and specialist technicians</li>
                    </ul>


                    <div style="clear:both"></div>
               </div><!--welcome_whychoosebg-->

               <img src="images/certifi_2.jpg" alt="" class="aboutcer" >



               <div style="clear:both"></div>
          </div><!--about_inner-->

     </div>
</div><!--contentmatter_wrapper-->

<!--SUB LINK-->
<div id="innersublink_wrapper">
     <div id="innersublink_inner">
          <a href="<?php echo site_url('product'); ?>"><img src="images/sublink_1.jpg" alt=""></a>
          <a href="<?php echo site_url('calibration'); ?>"><img src="images/sublink_2.jpg" alt=""></a>
          <div style="clear:both"></div>
     </div><!--innersublink_inner-->
</div><!--innersublink_wrapper-->	  

<!--home_brand_wrapper-->
<div id="home_brand_wrapper">
     <div id="home_brand_inner">
          <h1>Shop By <span style="color:#fd0505; font-weight:bold;">Brand</span></h1>
          
           <div id="home_shopbybrand">
           
                    <?php if (!empty($brands)) { ?>
                           <?php foreach ($brands as $key => $value) { 
                                if(check_if_product_in_brand($value['brd_id'])) {
                                     $url = site_url('product/brand/' . str_replace(' ', '_', strtolower(trim($value['brd_title']))));
                                } else {
                                     $url = site_url('brands/brand_details/' . str_replace(' ', '_', strtolower(trim($value['brd_title']))));
                                }
                                ?>
                                     <a href="<?php echo $url; ?>">
                                          <?php echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/brand/' . $value['brd_logo'], 'id' => 'imgBrandImage')); ?>
                                     </a>
                           <?php }
                      } ?>
               </div><!--home_shopbybrand-->
               
          <div style="clear:both"></div>
     </div><!--home_brand_inner-->
</div><!--home_brand_wrapper-->

<script type="text/javascript">
     $(document).ready(function () {
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