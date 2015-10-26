<div id="sectionb_wrapper">
     <div id="sectionb_inner">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;"> News And Events </a></li>
               </ul>
          </div>
          <h1>News And Events</h1>
          <div style="clear:both"></div>
     </div>
</div>
<div id="contentmatter_wrapper">
     <div id="contentmatter_inner">
          <?php if (!empty($news)) { ?>
                 <?php foreach ($news as $key => $value) { ?>
                      <div class="innernews_bg">
                           <a href="<?php echo site_url('news') . '/' . get_url_maker($value['nws_title']); ?>" 
                              class="newsimage" style="position:relative;">
                                   <?php
                                   if (isset($value['default_images']['nwi_image']) &&
                                           !empty($value['default_images']['nwi_image'])) {
                                        $img = $value['default_images']['nwi_image'];
                                   } else {
                                        $img = isset($value['other_images'][0]['nwi_image']) ?
                                                $value['other_images'][0]['nwi_image'] : '';
                                   }
                                   echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/news/' . $img));
                                   ?>
                                <div class="innernews_date"><?php echo date('F d, Y', strtotime($value['nws_date'])); ?></div>
                           </a>
                           <div class="newsimagedes">
                                <h3><?php echo $value['nws_title']; ?></h3>
                                <p><?php echo substr(strip_tags($value['nws_desc']), 0, 514). '...'; ?></p>
                                <a href="<?php echo site_url('news') . '/' . get_url_maker($value['nws_title']); ?>" 
                                   class="newsmore"> [ Read More ]</a>
                           </div>
                      </div>
                 <?php } ?>
            <?php } ?>
          <div style="clear:both"></div>
     </div>
</div>