<?php //debug($news); ?>
<section class="content">
     <div class="row">
          <section class="col-lg-12 connectedSortable">
               <?php echo form_open_multipart("news_and_events/update", array('id' => "frmNews", 'class' => "form-horizontal")) ?>
               <input type="hidden" name="nws_id" value="<?php echo $news['nws_id']; ?>"/>
               <div class="box box-info">
                    <div class="box-header">
                         <h3 class="box-title">Add News</h3>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">News Title</label>
                         <div class="col-md-4">
                              <input value="<?php echo $news['nws_title']; ?>" type="text" class="form-control" name="news[nws_title]" 
                                     id="cat_title" placeholder="News Title"/>
                              <span class="help-block">
                              </span>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Description</label>
                         <div class="col-md-9">
                              <div class="input-group">
                                   <textarea name="news[nws_desc]" class='editor'><?php echo $news['nws_desc']; ?></textarea>
                              </div>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">News Date</label>
                         <div class="col-md-4">
                              <div class="input-group">
                                   <input value="<?php echo date('Y-m-d', strtotime($news['nws_date'])) ?>" type="text" name="news[nws_date]" class='form-control datetime' placeholder="News Date" />
                              </div>
                         </div>
                    </div>
                    <?php if($news['default_images']) { ?>
                    <div class="form-group">
                         <label class="col-md-3 control-label"></label>
                         <div class="col-md-4">
                              <div class="input-group">
                                   <?php echo img(array('src' => 'assets/uploads/news/' . $news['default_images']['nwi_image'], 'height' => '80', 'width' => '100','id' => 'imgBrandImage')); ?>
                              </div>
                              <?php if($news['default_images']['nwi_image']) { ?>
                                   <span class="help-block">
                                        <a id="btnDeleteImage" data-url="<?php echo site_url('news_and_events/removeImage/'.$news['default_images']['nwi_id']); ?>" href="javascript:void(0);" style="width: 100px;" class="btn btn-block btn-danger btn-xs btnDeleteImage">Delete</a>
                                   </span>
                              <?php } ?>
                         </div>
                    </div>
                    <?php }  ?>
                    <?php if($news['other_images']) { foreach ($news['other_images'] as $key => $value) { ?>
                    <div class="form-group">
                         <label class="col-md-3 control-label"></label>
                         <div class="col-md-4">
                              <div class="input-group">
                                   <?php echo img(array('src' => 'assets/uploads/news/' . $value['nwi_image'], 'height' => '80', 'width' => '100','id' => 'imgBrandImage')); ?>
                              </div>
                              <?php if($value['nwi_image']) { ?>
                                   <span class="help-block">
                                        <a id="btnDeleteImage" data-url="<?php echo site_url('news_and_events/removeImage/'.$value['nwi_id']); ?>" href="javascript:void(0);" style="width: 100px;" class="btn btn-block btn-danger btn-xs">Delete</a>
                                   </span>
                              <?php } ?>
                         </div>
                    </div>
                    <?php } } ?>
                    <div class="form-group">
                         <label class="col-md-3 control-label">News Image</label>
                         <div class="col-md-4">
                              <div id="newupload">
                                   <input type="hidden" id="x10" name="x1[]" />
                                   <input type="hidden" id="y10" name="y1[]" />
                                   <input type="hidden" id="x20" name="x2[]" />
                                   <input type="hidden" id="y20" name="y2[]" />
                                   <input type="hidden" id="w0" name="w[]" />
                                   <input type="hidden" id="h0" name="h[]" />
                                   <input type="file" class="form-control" 
                                          name="prd_image[]" id="image_file0" onchange="fileSelectHandler('0', '500', '268')" />
                                   <img id="preview0" class="preview"/>
                              </div>
                              <span class="help-block">
                                   <!--<p style="color: red;">Image size width 500 height 268</p>-->
                              </span>
                         </div>
<!--                         <div class="box-tools">
                              <a href="javascript:void(0);" 
                                 class="btn btn-info btn-sm" id="btnMoreProductImages" data-original-title="Add More">
                                   <i class="fa fa-plus"></i>
                              </a>
                         </div>-->
                    </div>
                    <div id="divMoreProductImages">

                    </div>
                    <div class="box-footer clearfix">
                         <input type="submit" value="Save" class="btn btn-primary" style="float: left !important;" id="sendEmail"/>
                    </div>
               </div>
               <?php echo form_close() ?>
          </section>
     </div>
</section>
</div>