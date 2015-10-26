<style>
     .morecontent span {
          display: none;
     }
     .morelink {
          display: block;
     }
     #contentmatter_inner p {
          margin-bottom: 10px !important;}

</style>
<!--<span class="more">
     adaskdjklas as ahsljhasljfdhal jaljf hlsjhasjd hoasjh hogashofaushoauhoahdgoah ouh go goah goaga
     agahodgu o
     adaskdjklas as ahsljhasljfdhal jaljf hlsjhasjd hoasjh hogashofaushoauhoahdgoah ouh go goah goaga
     agahodgu o
     adaskdjklas as ahsljhasljfdhal jaljf hlsjhasjd hoasjh hogashofaushoauhoahdgoah ouh go goah goaga
     agahodgu o
     adaskdjklas as ahsljhasljfdhal jaljf hlsjhasjd hoasjh hogashofaushoauhoahdgoah ouh go goah goaga
     agahodgu o
</span>-->
<!--CONTACT-->
<div id="sectionb_wrapper">
     <div id="sectionb_inner">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="#"> Home &raquo; </a></li>
                    <li><a href="#" style="color:#d92523;"> Calibration </a></li>
               </ul>
          </div><!--inner_breadcombmenu-->
          <h1>calibration</h1>
          <div style="clear:both"></div>
     </div><!--sectionb_inner-->
</div><!--sectionb_wrapper-->

<!--INNER-->
<div id="contentmatter_wrapper">
     <div id="contentmatter_inner">



          <p>"Since 1998, General Tech has been in the calibration business with more than 50 employees, serving customers across the UAE and Saudi Arabia. We maintain a fleet of over 20 service vehicles to provide calibration services on the field. Our 10,000 square foot facility provides a quality environment where we offer a vast array of calibration services. Established as one of the largest, single source calibration facility in the UAE, our commitment to quality has earned us one of the largest DAC scopes of accreditation in the nation and we pride ourselves in providing the highest standard of service in the industry.</p>

          <p><strong>Also being the authorised distributors of Mitutoyo, Hioki, WIKA, Raytek, Nabertherm, Rotronic Torque leader and Norbar, we can supply for all your product requirements.</strong></p>

          <p>We at General Tech are proud to offer you one-stop solutions for all of your calibration services and new tool requirements."</p>


          <div style="float:left; width:100%;">
                <div class="calidownload_cer" style="text-align:left;">
                    <img src="images/certifi_3.jpg" style="width:80px;vertical-align:middle;" > View our accredited calibration scope
                    <a download href="images/17025 DAC Accredited Scope of Calibration.pdf" target="_blank" class="calidownload">- Download
                     <img src="images/down.png" style="margin-top:-5px;"> </a>
                </div>
                
               <div class="calidownload_cer2" style="margin-top:20px; float:right;">
                    View our ISO9001 Cerificate
                    <a download href="images/ISO 9001-2008 New certificate (13-02-2013 to 13-02-2016).pdf" target="_blank" class="calidownload">- Download
                     <img src="images/down.png" style="margin-top:-5px;"> </a>
                </div>
          </div> 
          
          
          


          <?php
            if (!empty($calibration)) {
                 foreach ($calibration as $key => $value) {
                      $class = ($key % 2 == 0) ? 'serviceimg_1' : 'serviceimg_2';
                      $bgcolor = ($key % 2 == 0) ? 'background:#FFF;' : '';
                      ?>
                      <div class="calibrationboxbg">
                           <a href="<?php echo site_url('calibration/calibration_service') . '/' . str_replace(' ', '_', strtolower(trim($value['cal_title']))); ?>" class="caliboximage">
                                <?php echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/calibration/' . $value['cal_image'], 'class' => $class)); ?>
                           </a>
                           <div class="caboxdes">
                                <h4><?php echo $value['cal_title']; ?></h4>
                                <div class="more">
                                     <?php echo substr(strip_tags($value['cal_desc']), 0, 200) . '...'; ?>
                                </div>
                           </div>
                           <a class="calimore" href="<?php echo site_url('calibration/calibration_service') . '/' . str_replace(' ', '_', strtolower(trim($value['cal_title']))); ?>">Read more</a>
                      </div>
                      <?php
                 }
            }
          ?>
          <div style="clear:both"></div>
     </div><!--contentmatter_inner-->
</div>
<?php
  //echo $this->pagination->create_links(); ?>