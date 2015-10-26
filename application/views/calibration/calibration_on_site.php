<!--CONTACT-->
<div id="sectionb_wrapper">
     <div id="sectionb_inner" style="min-height:50px;">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="<?php echo site_url('calibration'); ?>"> Calibration &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;">On-site Calibration</a></li>
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
                              <li><a href="<?php echo site_url('calibration/calibration_lab'); ?>">Calibration Lab</a></li>
                              <!--<li><a href="<?php echo site_url('calibration/calibration_whychooseus'); ?>">Why Choose Us</a></li>-->
                              <li><a href="<?php echo site_url('calibration/calibration_on_site'); ?>" style="color:#F00;">On-site Calibration</a></li>
                         </ul>
                    </nav>
               </div>

               <div class="caliright_bannerbg">
                    <div class="caliright_bannerimage">
                         <img src="images/onsite.jpg" alt="" class="calibannerimage">
                    </div>
                    <div class="cali_bannertext">
                         Welcome to General Construction Lab Calibration, one of the largest, most diversified and comprehensive calibration laboratories in the nation
                    </div>
               </div><!--caliright_bannerbg-->


               <h1>Service at Your Facility: We Come to You </h1>
               <p>On-site calibration or field calibration is often performed on equipment that is too large or fragile to be shipped to us, or on those equipment that cannot be taken out of service for days at a time. Our highly experienced and trained field technicians will calibrate your equipment, make repairs and adjustments as needed and leave you with reliable results that will be documented in Calibration Certificates. With our on-site calibration services, you can meet your schedules, and minimise production downtime. For your convenience, you can arrange for services directly with our field calibration team at gentech@eim.ae.</p>

               <p>You will receive a Calibration Certificate for each item "as found" and "as left" conditions, as well as all work performed. If needed, we can provide a preliminary certificate before our technician leaves your facility, so there is no waiting period for results.</p>

               <p>We guarantee that you will receive the same level of quality and service from our field technicians as you would at our environmentally controlled laboratory.</p> 

               <p>&nbsp;</p>        

               <h3> On-site Calibration Capabilities</h3>
               <p>We offer on-site calibration services for the following range of equipment right at your facility:</p>


               <div class="caliinner">
                    <ul>
                         <li>Measuring Tools and Gauge Calibration</li>
                         <li>Surface Plates
                              <ul>
                                   <li>Grades AA, A, B, X, "o"</li>
                              </ul>

                         </li>   
                         <li>Optical Comparators</li>
                         <li>Microscopes</li>
                         <li>CMMs (Coordinate Measuring Machines)</li>
                         <li>Rockwell Hardness Testers</li>
                         <li>Compression Testing Machines
                              <ul>
                                   <li>Up to 200,000 lbs</li>
                              </ul>
                         </li>    
                         <li>Scales and Balances
                              <ul>
                                   <li>Above 1,000 lbs</li>
                              </ul>
                         </li>
                         <li>Pyrometry</li>
                         <li>Temperature Controllers</li>
                         <li>Ovens and Furnaces
                              <ul>
                                   <li>Uniformity Surveys</li>
                                   <li>System Accuracy Tests</li>
                              </ul>
                         </li>
                         <li>Recorders - Temperature, Digital, Chart</li>
                    </ul>
               </div> 
          </div><!--  cali_ser_right-->
     </div><!--  cali_ser_right-->
</div>