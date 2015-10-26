<section class="content">
     <div class="row">
          <section class="col-lg-12 connectedSortable">
               <?php echo form_open_multipart("calibration/edit_calibration_service", array('id' => "frmCalibrationService", 'class' => "form-horizontal")) ?>
               <input value="<?php echo $calibrationService['gcs_id']; ?>" type="hidden" name="calibration_service[gcs_id]" id="gcs_id"/>
               <div class="box box-info">
                    <div class="box-header">
                         <h3 class="box-title">Add Calibration Service</h3>
<!--                         <div class="pull-right box-tools">
                              <button id="btnAddCalibrationService" type="button" class="btn btn-info btn-sm "><i class="fa fa-plus"></i></button>
                         </div>-->
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Calibration</label>
                         <div class="col-md-4">
                              <select name="calibration_service[gcs_cal_id]" class="form-control">
                                   <option value="" >Select Calibration</option>
                                   <?php if ($calibration) { ?>
                                          <?php foreach ($calibration as $key => $value) { ?>
                                               <option <?php echo ($calibrationService['gcs_cal_id'] == $value['cal_id']) ? "selected='selected'" : ''; ?> value="<?php echo $value['cal_id']; ?>"><?php echo $value['cal_title']; ?></option>
                                               <?php
                                          }
                                     }
                                   ?>
                              </select>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Calibration Title</label>
                         <div class="col-md-4">
                              <input type="text" class="form-control" name="calibration_service[gcs_title]" id="gcs_title" 
                                     placeholder="Calibration Title" value="<?php echo $calibrationService['gcs_title'] ?>"/>
                              <span class="help-block">
                                   <!-- A block of help text.-->
                              </span>
                         </div>
                    </div>

                    <div class="form-group">
                         <label class="col-md-3 control-label">Description</label>
                         <div class="col-md-6">
                              <div class="input-group">
                                   <textarea name="calibration_service[gcs_desc]" class='editor'><?php echo $calibrationService['gcs_desc'] ?></textarea>
                              </div>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Is accordion</label>
                         <div class="col-md-4">
                              <div class="input-group">
                                   <input type="checkbox" name="calibration_service[gcs_is_accordion]" value="1"
                                          <?php echo ($calibrationService['gcs_is_accordion'] == '1') ? 'checked' : ''; ?>
                                          />
                              </div>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Is content after accordion</label>
                         <div class="col-md-4">
                              <div class="input-group">
                                   <input type="checkbox" name="calibration_service[gcs_is_cont_after_accordion]" value="1" 
                                        <?php echo ($calibrationService['gcs_is_cont_after_accordion'] == '1') ? 'checked' : ''; ?>/>
                              </div>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Is banner text</label>
                         <div class="col-md-4">
                              <div class="input-group">
                                   <input type="checkbox" name="calibration_service[gcs_is_baner_text]" value="1" 
                                        <?php echo ($calibrationService['gcs_is_baner_text'] == '1') ? 'checked' : ''; ?>/>
                              </div>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label"></label>
                         <div class="col-md-4">
                              <div class="input-group">
                                   <?php echo img(array('src' => 'assets/uploads/calibration/' . $calibrationService['gcs_image'], 'height' => '80', 'width' => '100','id' => 'imgBrandImage')); ?>
                              </div>
                              <?php if($calibrationService['gcs_image']) { ?>
                                   <span class="help-block">
                                        <a id="btnDeleteImage" data-url="<?php echo site_url('calibration/removeCalibrationServiceImage/'.$calibrationService['gcs_id']); ?>" href="javascript:void(0);" style="width: 100px;" class="btn btn-block btn-danger btn-xs">Delete</a>
                                   </span>
                              <?php } ?>
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
                                   <input type="file" class="form-control" name="gcs_image" id="image_file0" onchange="fileSelectHandler('0', '204', '139')" />
                                   <img id="preview0" class="preview"/>
                              </div>
                         </div>
                    </div>
                    <div id="divCalibrationServices">

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