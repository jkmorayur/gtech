<section class="content">
     <div class="row">
          <section class="col-lg-12 connectedSortable">
               <?php echo form_open_multipart("calibration/insert", array('id' => "frmCalibration", 'class' => "form-horizontal")) ?>
               <div class="box box-info">
                    <div class="box-header">
                         <h3 class="box-title">Add Calibration</h3>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Category Title</label>
                         <div class="col-md-4">
                              <input type="text" class="form-control" name="cal_title" id="cal_title" placeholder="Category Title"/>
                              <span class="help-block">
                                   <!--                                   A block of help text.-->
                              </span>
                         </div>
                    </div>

                    <div class="form-group">
                         <label class="col-md-3 control-label">Description</label>
                         <div class="col-md-4">
                              <div class="input-group">
                                   <textarea name="cal_desc" class='editor'></textarea>
                              </div>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Order</label>
                         <div class="col-md-4">
                              <div class="input-group">
                                   <select name="cal_order" id="cal_order">
                                        <?php if (!empty($nextOrder)) { ?>
                                               <?php for ($i = 1; $i <= $nextOrder; $i++) { ?>
                                                    <option <?php echo ($i ==  $nextOrder) ? "selected='selected'" : ''; ?> 
                                                         value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                               <?php } ?>
                                          <?php } ?>
                                   </select>
                              </div>
                         </div>
                    </div>

                    <div class="form-group">
                         <label class="col-md-3 control-label">Image</label>
                         <div class="col-md-4">
                              <div id="newupload">
                                   <input type="hidden" id="x10" name="x1[]" />
                                   <input type="hidden" id="y10" name="y1[]" />
                                   <input type="hidden" id="x20" name="x2[]" />
                                   <input type="hidden" id="y20" name="y2[]" />
                                   <input type="hidden" id="w0" name="w[]" />
                                   <input type="hidden" id="h0" name="h[]" />
                                   <input type="file" class="form-control" name="cal_image" id="image_file0" onchange="fileSelectHandler('0', '204', '139')" />
                                   <img id="preview0" class="preview"/>
                              </div>
                              <span class="help-block">
                                   <!--<p style="color: red;">Image size width 204 height 139</p>-->
                              </span>
                         </div>
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