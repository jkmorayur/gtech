<section class="content">
     <div class="row">
          <section class="col-lg-12 connectedSortable">
               <?php echo form_open_multipart("news_and_events/insert", array('id' => "frmNews", 'class' => "form-horizontal")) ?>
               <div class="box box-info">
                    <div class="box-header">
                         <h3 class="box-title">Add News</h3>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">News Title</label>
                         <div class="col-md-4">
                              <input type="text" class="form-control" name="news[nws_title]" 
                                     id="cat_title" placeholder="News Title"/>
                              <span class="help-block">
                              </span>
                         </div>
                    </div>

                    <div class="form-group">
                         <label class="col-md-3 control-label">Description</label>
                         <div class="col-md-9">
                              <div class="input-group">
                                   <textarea name="news[nws_desc]" class='editor'></textarea>
                              </div>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">News Date</label>
                         <div class="col-md-4">
                              <div class="input-group">
                                   <input value="<?php echo date('Y-m-d') ?>" type="text" name="news[nws_date]" class='form-control datetime' placeholder="News Date" />
                              </div>
                         </div>
                    </div>
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