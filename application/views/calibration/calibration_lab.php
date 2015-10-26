<!--CONTACT-->
<div id="sectionb_wrapper">
     <div id="sectionb_inner" style="min-height:50px;">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="<?php echo site_url('calibration'); ?>"> Calibration &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;">Calibration Lab </a></li>
               </ul>
          </div><!--inner_breadcombmenu-->
          <div style="clear:both"></div>
     </div><!--sectionb_inner-->
</div><!--sectionb_wrapper-->
<!--INNER-->
<div id="contentmatter_wrapper">
     <div id="servicetmatter_inner">
          <div class="cali_ser_left">

               <h5 style="border-bottom:1px solid #333; padding-bottom:5px;"> PARAMETERS</h5>

               <ul class="calileft">
                    <?php if (!empty($allCalibration)) { ?>
                           <?php foreach ($allCalibration as $key => $value) { ?>
                                <li><a href="<?php echo site_url('calibration/calibration_service') . '/' . $value['cal_id']; ?>"><?php echo $value['cal_title']; ?></a></li>
                           <?php } ?>
                      <?php } ?>
               </ul> 

          </div><!--cali_ser_left-->
          
          <div class="cali_ser_right">
               <div class="quickmatter">
                    <nav>
                         <ul>
                              <li><a href="<?php echo site_url('calibration/calibration_lab'); ?>" style="color:#F00;">Calibration Lab</a></li>
                              <!--<li><a href="<?php echo site_url('calibration/calibration_whychooseus'); ?>">Why Choose Us</a></li>-->
                              <li><a href="<?php echo site_url('calibration/calibration_on_site'); ?>">On-site Calibration</a></li>
                         </ul>
                    </nav>
               </div>

               <div class="caliright_bannerbg">
                    <div class="caliright_bannerimage">
                         <img src="images/IMG_2968.JPG" alt="" class="calibannerimage">
                    </div>
                    <div class="cali_bannertext">
                         Welcome to General Construction Lab Calibration, one of the largest, most diversified and comprehensive calibration laboratories in the nation
                    </div>
               </div><!--caliright_bannerbg-->

               <p>Since 1998, General Tech has been in the calibration business with more than 50 employees, serving customers across the UAE and Saudi Arabia. We maintain a fleet of over 20 service vehicles to provide calibration services on the field. Our 10,000 square foot facility provides a quality environment where we offer a vast array of calibration services. Established as one of the largest, single source calibration facility in the UAE, our commitment to quality has earned us one of the largest DAC scopes of accreditation in the nation and we pride ourselves in providing the highest standard of service in the industry.</p> 
               <p>Also being the authorised distributors of Mitutoyo, Hioki, WIKA, Raytek, Nabertherm, Rotronic Torque leader and Norbar, we can supply for all your product requirements.</p>
               <p>We at General Tech are proud to offer you one-stop solutions for all of your calibration services and new tool requirements.</p>
               <p>&nbsp; </p>
               <div class="caliinnerpage_top">
                    <p>General Construction Lab is only Lab in the UAE with a Premium Calibration System, 
                         Co-ordinate Measuring Machine and the Universal Length Measuring System.</p>
                    <img src="images/cali_inner.jpg" class="imagecali" >
                    <div class="caliinnerpage_half">
                         <h1>UNIVERSAL LENGTH MEASURING SYSTEM: DMS 680</h1>
                         <p>Armed with one the best machinery and equipment in the industry. our Calibration team  has the 
                              capacity to calibrate Ring, Plug, Snap & Thread gauges, Gauge blocks, and Micrometers with an accuracy of 0.23microns. This Universal Length Measuring system can comfortably calibrate a measurement ranging  from 4mm to 680 mm with precision and accuracy.</p> 
                    </div><!--caliinnerpage_half-->
               </div><!--caliinnerpage_top-->
          </div><!--  cali_ser_right-->
     </div>
</div>