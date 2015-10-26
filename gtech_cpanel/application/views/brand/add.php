<section class="content">
     <div class="row">
          <section class="col-lg-12 connectedSortable">
               <?php echo form_open_multipart("brand/insert", array('id' => "frmBrand", 'class' => "form-horizontal")) ?>
               <div class="box box-info">
                    <div class="box-header">
                         <h3 class="box-title">Add Brand</h3>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Brand Title</label>
                         <div class="col-md-4">
                              <input type="text" class="form-control" name="brd_title" id="brd_title" placeholder="Brand Title"/>
                              <span class="help-block">
                                   <!--                                   A block of help text.-->
                              </span>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Brand Url</label>
                         <div class="col-md-4">
                              <input type="text" class="form-control" name="brd_url" id="brd_url" placeholder="Brand Url"/>
                              <span class="help-block">
                                   <!--                                   A block of help text.-->

                              </span>
                         </div>
                    </div>

                    <div class="form-group">
                         <label class="col-md-3 control-label">Description</label>
                         <div class="col-md-4">
                              <div class="input-group">
                                   <textarea name="brd_desc" id="brd_desc" class='editor'></textarea>
                              </div>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Brand Logo</label>
                         <div class="col-md-4">
                              <div id="newupload">
                                   <input type="hidden" id="x10" name="x1[]" />
                                   <input type="hidden" id="y10" name="y1[]" />
                                   <input type="hidden" id="x20" name="x2[]" />
                                   <input type="hidden" id="y20" name="y2[]" />
                                   <input type="hidden" id="w0" name="w[]" />
                                   <input type="hidden" id="h0" name="h[]" />
                                   <input type="file" class="form-control" name="brd_logo" id="image_file0" onchange="fileSelectHandler('0','500','268')" />
                                   <img id="preview0" class="preview"/>
                              </div>
                              <span class="help-block">
                                   <!--<p style="color: red;">Image size width 500 height 268</p>-->
                              </span>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Brand Banner</label>
                         <div class="col-md-4">
                              <div id="newupload">
                                   <input type="file" class="form-control" name="brd_banner" id="image_file0"/>
                                   <img id="preview0" class="preview"/>
                              </div>
                              <span class="help-block">
                                   <!--<p style="color: red;">Image size width 500 height 268</p>-->
                              </span>
                         </div>
                    </div>
                    <div class="box-footer clearfix">
                         <input type="submit" value="Save" class="btn btn-primary" style="float: left !important;"/>
                    </div>
               </div>
               <?php echo form_close() ?>
          </section>
     </div>
</section>
</div>