<!--CONTACT-->
<div id="sectionb_wrapper">
     <div id="sectionb_inner" style="min-height:50px;">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="<?php echo site_url('calibration'); ?>"> Calibration &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;">Why choose us </a></li>
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
                              <li><a href="<?php echo site_url('calibration/calibration_lab'); ?>" >Calibration Lab</a></li>
                              <li><a href="<?php echo site_url('calibration/calibration_whychooseus'); ?>" style="color:#F00;">Why Choose Us</a></li>
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

               <p><strong> 1 -</strong> We offer calibration services satisfying the following standards: </p>
                
                	<div class="caliinner">
                        <ul>
                            <li>ISO/IEC 17025</li>
                            <li>ANSI Z-540</li>
                            <li>ISO 9001</li>
                            <li>ISO/TS16949</li>
                            <li>API Ql9th edition</li>
                            <li>ISO 10012</li>
                            <li>Pharmaceutical Industry Standards</li>
                        </ul>
                    </div> 
        
                        <p><strong> 2 -</strong> We provide traceability for all our master equipment: DAC/UKAS/NABL/DAKKS</p>
        
                        <p><strong> 3 -</strong> We at GCLC offer the following features and value-added benefits:</p>
        
        			<div class="caliinner">
                            <ul>
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
                    
                    </div>
                    
          </div><!--  cali_ser_right-->
          
          
          <div style="clear:both"></div>
     </div><!--servicetmatter_inner-->
</div><!--contentmatter_wrapper-->



