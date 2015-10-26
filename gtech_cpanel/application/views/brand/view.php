<section class="content">
     <div class="row">
          <section class="col-lg-12 connectedSortable">
               <?php echo form_open_multipart("brand/update", array('id' => "frmBrand", 'class' => "form-horizontal")) ?>
               <input value="<?php echo $brand['brd_id']; ?>" type="hidden" name="brd_id" id="brd_id"/>
               <div class="box box-info">
                    <div class="box-header">
                         <h3 class="box-title">Add Brand</h3>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Brand Title</label>
                         <div class="col-md-4">
                              <input value="<?php echo $brand['brd_title']; ?>" type="text" class="form-control" name="brd_title" id="brd_title" placeholder="Brand Title"/>
                              <span class="help-block">
                                   <!--                                   A block of help text.-->
                              </span>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Brand Url</label>
                         <div class="col-md-4">
                              <input value="<?php echo $brand['brd_url']; ?>" type="text" class="form-control" name="brd_url" id="brd_url" placeholder="Brand Url"/>
                              <span class="help-block">
                                   <!--                                   A block of help text.-->
                              </span>
                         </div>
                    </div>

                    <div class="form-group">
                         <label class="col-md-3 control-label">Description</label>
                         <div class="col-md-4">
                              <div class="input-group">
                                   <textarea name="brd_desc" id="brd_desc" class='editor'><?php echo $brand['brd_desc']; ?></textarea>
     <!--                              <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                   </span>-->
                              </div>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label"></label>
                         <div class="col-md-4">
                              <div class="input-group">
                                   <?php echo img(array('src' => 'assets/uploads/brand/' . $brand['brd_logo'], 'height' => '80', 'width' => '100','id' => 'imgBrandImage')); ?>
                              </div>
                              <?php if($brand['brd_logo']) { ?>
                                   <span class="help-block">
                                        <a id="btnDeleteImage" data-url="<?php echo site_url('brand/removeImage/'.$brand['brd_id']); ?>" href="javascript:void(0);" style="width: 100px;" class="btn btn-block btn-danger btn-xs">Delete</a>
                                   </span>
                              <?php } ?>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label"></label>
                         <div class="col-md-4">
                              <div class="input-group">
                                   <?php echo img(array('src' => 'assets/uploads/brand/' . $brand['brd_banner'], 'height' => '80', 'width' => '100','id' => 'imgBrandImage')); ?>
                              </div>
                              <?php if($brand['brd_banner']) { ?>
                                   <span class="help-block">
                                        <a data-url="<?php echo site_url('brand/removeBrandBanner/'.$brand['brd_id']); ?>" href="javascript:void(0);" style="width: 100px;" class="btn btn-block btn-danger btn-xs btnDeleteImage">Delete</a>
                                   </span>
                              <?php } ?>
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