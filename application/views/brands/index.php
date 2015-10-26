<div id="home_contentrapper">
     <div id="inner_breadcombmenu">
          <ul>
               <li><a href="#"> Home </a></li>
               <li><a href="#"> All brands </a></li>
          </ul>
     </div><!--inner_breadcombmenu-->
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
     <div id="inner_wrapper">
          <h1>brands</h1>
          <div id="brandwrapper">  
               <?php if ($brands) {
                      foreach ($brands as $key => $value) { ?>
                           <div class="item item-type-line">
                                <div class="item-hover" > 
                                     <div class="item-info">
                                          <div class="headline"><?php echo $value['brd_title'] ?></div>
                                          <div class="line"></div>
                                          <a href="http://www.asconumatics.eu/" class="date" target="_blank"><?php echo $value['brd_url'] ?></a> 
                                     </div>
                                     <div class="mask"></div>
                                </div> 
                                <div class="item-img">
                                   <?php echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/brand/' . $value['brd_logo'], 'id' => 'imgBrandImage')); ?>
                                </div>
                           </div>	
                         <?php } } ?>
               <div style="clear:both"></div>
               <?php echo $this->pagination->create_links(); ?>
          </div><!--brandwrapper-->

          <div style="clear:both"></div>
     </div><!--inner_wrapper-->
     <div style="clear:both"></div>
</div><!--home_contentrapper--> 
<div style="clear:both"></div>
</div><!--welcome_inner-->
</div><!--welcome_wrapper-->