<script>
     $(function () {
          var showTotalChar = 400, showChar = "Show (+)", hideChar = "Hide (-)";
          $('.show').each(function () {
               var content = $(this).text();
               if (content.length > showTotalChar) {
                    var con = content.substr(0, showTotalChar);
                    var hcon = content.substr(showTotalChar, content.length - showTotalChar);
                    var txt = con + '<span class="dots">...</span><span class="morectnt"><span>' + hcon + '</span>&nbsp;&nbsp;<a href="" class="showmoretxt">' + showChar + '</a></span>';
                    $(this).html(txt);
               }
          });
          $(".showmoretxt").click(function () {
               if ($(this).hasClass("sample")) {
                    $(this).removeClass("sample");
                    $(this).text(showChar);
               } else {
                    $(this).addClass("sample");
                    $(this).text(hideChar);
               }
               $(this).parent().prev().slideToggle("slow");
               $(this).prev().slideToggle("slow");
               return false;
          });
     });
</script>
<style>
     /*expand collaps*/
     .show {
          padding: 15px 0 0 0;
          font-family: Arial,Helvetica,sans-serif;
          font-size: 13px;
     }
     .morectnt span {
          display: none;
     }
     .showmoretxt {
          color: red;
          text-decoration: none;
     }
     /*expand collaps*/
     /*pagination*/
     ul.tsc_pagination { margin:4px 0; padding:0px; height:100%; overflow:hidden; font:12px 'Tahoma'; list-style-type:none; }
     ul.tsc_pagination li { float:left; margin:0px; padding:0px; margin-left:5px; list-style: none !important;}
     ul.tsc_pagination li a { color:black; display:block; text-decoration:none; padding:7px 10px 7px 10px; }
     ul.tsc_paginationA li a { color:#FFFFFF; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; }
     ul.tsc_paginationA01 li a { color:#474747; border:solid 1px #B6B6B6; padding:6px 9px 6px 9px; background:#E6E6E6; background:-moz-linear-gradient(top, #FFFFFF 1px, #F3F3F3 1px, #E6E6E6); background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #FFFFFF), color-stop(0.02, #F3F3F3), color-stop(1, #E6E6E6)); }
     ul.tsc_paginationA01 li:hover a,
     ul.tsc_paginationA01 li.current a { background:#FFFFFF; }
     /*pagination*/
</style>
<div id="home_contentrapper">
     <div id="inner_breadcombmenu">
          <ul>
               <li><a href="<?php echo site_url(); ?>"> Home </a></li>
               <li><a href="#"> calibration </a></li>
          </ul>
     </div><!--inner_breadcombmenu-->
     <?php
       //debug($calibration);
     ?>
     <div id="inner_wrapper">
          <h1>calibration</h1>
          <div id="servicewrapper">
               <?php
                 if (!empty($calibration)) {
                      foreach ($calibration as $key => $value) {
                           $class = ($key % 2 == 0) ? 'serviceimg_1' : 'serviceimg_2';
                           $bgcolor = ($key % 2 == 0) ? 'background:#FFF;' : '';
                           ?>
                           <div class="serviceinnerbg" style="<?php echo $bgcolor; ?>">
                                <?php echo img(array('src' => ADMIN_FOLDER.'/assets/uploads/calibration/' . $value['cal_image'], 'class' => $class)); ?>
                                <h3><?php echo $value['cal_title']; ?></h3>
                                <div class="show">
                                     <?php echo $value['cal_desc']; ?>
                                </div>
                           </div>
                      <?php
                      }
                 }
               ?>
<?php echo $this->pagination->create_links(); ?>
          </div><!--servicewrapper-->
          <div style="clear:both"></div>
     </div><!--inner_wrapper-->
     <div style="clear:both"></div>
</div><!--home_contentrapper--> 
<div style="clear:both"></div>
</div><!--welcome_inner-->
</div><!--welcome_wrapper-->