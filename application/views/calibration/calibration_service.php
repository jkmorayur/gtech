<style type="text/css">
     #sectionb_inner{
          min-height:60px;
     }
</style> 
<div id="sectionb_wrapper">
     <div id="sectionb_inner">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="<?php echo site_url('calibration'); ?>"> Calibration &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;"><?php echo isset($calibration['cal_title']) ? $calibration['cal_title'] : ''; ?> </a></li>
               </ul>
          </div><!--inner_breadcombmenu-->
          <div style="clear:both"></div>
     </div><!--sectionb_inner-->
</div><!--sectionb_wrapper-->


<!--INNER-->
<div id="contentmatter_wrapper">
     <div id="servicetmatter_inner">

          <nav>
               <ul>
                    <li><a href="<?php echo site_url('calibration/calibration_lab'); ?>">Calibration Lab</a></li>
                    <!--<li><a href="<?php echo site_url('calibration/calibration_whychooseus'); ?>">Why Choose Us</a></li>-->
                    <li><a href="<?php echo site_url('calibration/calibration_on_site'); ?>">On-site Calibration</a></li>
               </ul>
          </nav>


          <div class="cali_ser_left">
               <h5 style="border-bottom:1px solid #333; padding-bottom:5px;"> PARAMETERS</h5>
               <ul class="calileft">
                    <?php if (!empty($allCalibration)) { ?>
                           <?php foreach ($allCalibration as $key => $value) { ?>
                                <li><a href="<?php echo site_url('calibration/calibration_service') . '/' . str_replace(' ', '_', strtolower(trim($value['cal_title']))); ?>" class="<?php echo ($value['cal_id'] == $calibrationId) ? 'active' : ''; ?>"><?php echo $value['cal_title']; ?></a></li>
                           <?php } ?>
                      <?php } ?>
               </ul>

          </div><!--cali_ser_left-->

          <div class="cali_ser_right">

               <h5><?php echo isset($calibration['cal_title']) ? $calibration['cal_title'] : ''; ?></h5>
               <div class="caliright_bannerbg">
                    <div class="caliright_bannerimage">
                         <?php
                           $img = isset($calibration['cal_image']) ? $calibration['cal_image'] : '';
                           echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/calibration/' . $img, 'class' => 'calibannerimage'));
                         ?>
                    </div>
                    <div class="cali_bannertext">
                         <?php if (!empty($calibrationService)) { ?>
                                <?php foreach ($calibrationService as $key => $value) { ?>
                                     <?php if ($value['gcs_is_baner_text'] == 1) { ?>
                                          <?php echo strip_tags($value['gcs_desc']); ?>
                                     <?php } ?>
                                <?php } ?>
                           <?php } ?>
                    </div>
               </div>

               <?php if (!empty($calibrationService)) { ?>
                      <?php foreach ($calibrationService as $key => $value) { ?>
                           <?php if ($value['gcs_is_accordion'] == 0 && $value['gcs_is_cont_after_accordion'] == 0 && $value['gcs_is_baner_text'] == 0) {
                                ?>
                                <?php echo (!empty($value['gcs_title'])) ? '<h1>' . $value['gcs_title'] . '</h1>' : ''; ?>
                                <h4><?php echo $value['gcs_desc']; ?></h4> 
                           <?php } ?>
                      <?php } ?>
                 <?php } ?>

               <div class="calilistbg">
                    <?php if (!empty($calibrationService)) { ?>
                           <?php foreach ($calibrationService as $key => $value) { ?>
                                <?php if ($value['gcs_is_accordion'] == 1 && $value['gcs_is_cont_after_accordion'] == 0 && $value['gcs_is_baner_text'] == 0) {
                                     ?>
                                     <div>
                                          <h3><?php echo $value['gcs_title']; ?></h3>
                                          <?php echo $value['gcs_desc']; ?>
                                     </div>
                                <?php } ?>
                           <?php } ?>
                      <?php } ?>
               </div>
          </div><!--  cali_ser_right-->
          <div style="clear:both"></div>
     </div><!--servicetmatter_inner-->
</div><!--contentmatter_wrapper-->