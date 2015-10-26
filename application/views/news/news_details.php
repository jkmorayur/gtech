<div id="sectionb_wrapper">
     <div id="sectionb_inner" style="min-height:50px;">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;"> News And Events </a></li>
               </ul>
          </div><!--inner_breadcombmenu-->
          <div style="clear:both"></div>
     </div><!--sectionb_inner-->
</div><!--sectionb_wrapper-->
<!--INNER-->
<?php if (!empty($news)) { ?>
       <div id="contentmatter_wrapper">
            <div id="contentmatter_inner">
                 <h1><?php echo $news['nws_title']; ?></h1>
                 <div class="newsdes_date"> 
                      <img src="images/date2.png" style="margin-top:-5px;" > <?php echo date('F d, Y', strtotime($news['nws_date'])); ?></div>
                 <?php
                 if (isset($news['default_images']['nwi_image']) &&
                         !empty($news['default_images']['nwi_image'])) {
                      $img = $news['default_images']['nwi_image'];
                 } else {
                      $img = isset($news['other_images'][0]['nwi_image']) ?
                              $news['other_images'][0]['nwi_image'] : '';
                 }
                 echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/news/' . $img, 'class' => "news_desimage"));
                 ?>
                 <!--<img src="images/news2.jpg" alt="" class="news_desimage" >-->
                 <p><?php echo $news['nws_desc']; ?></p>
                 <a href="<?php echo site_url('news'); ?>" class="newsmore"> [Back to News ]</a>
                 <div style="clear:both"></div>
            </div><!--contentmatter_inner-->
       </div><!--contentmatter_wrapper-->
<?php } ?>