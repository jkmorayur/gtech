<section class="content">
     <div class="row">
          <div class="col-xs-12">
               <div class="box">
                    <div class="box-header">
                         <h3 class="box-title">Calibration Service</h3>
                         <div class="pull-right box-tools">
                              <select name="calibration" class="form-control calibration pull-right">
                                   <option value="" >Filter by Calibration</option>
                                   <?php if ($calibration) { ?>
                                          <?php foreach ($calibration as $key => $value) { ?>
                                               <option <?php echo ($calibrationId == $value['cal_id']) ? 'selected="selected"' : ''; ?> value="<?php echo $value['cal_id']; ?>"><?php echo $value['cal_title']; ?></option>
                                               <?php
                                          }
                                     }
                                   ?>
                              </select>
                         </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                         <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                   <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Calibration</th>
                                        <th>Edit</th>
                                        <th>Delete</th>                               
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php if (!empty($calibrationService)) { ?>
                                          <?php foreach ($calibrationService as $key => $value) {
                                               ?>
                                               <tr id="tr_<?php echo $value['gcs_id']; ?>">
                                                    <td style="width: 100px;">
                                                         <?php echo img(array('src' => 'assets/uploads/calibration/' . $value['gcs_image'], 'height' => '80', 'width' => '130')); ?>
                                                    </td>
                                                    <td><?php echo $value['gcs_title']; ?></td>
                                                    <td><?php echo $value['cal_title']; ?></td>
                                                    <td style="width: 20px;">
                                                         <a class="pencile edit" href="<?php echo site_url('calibration/view_calibration_service/' . $value['gcs_id']); ?>">
                                                              <img style="height: 25px;" src="images/pencile.png" />
                                                         </a>
                                                    </td>
                                                    <td style="width: 20px;">
                                                         <a class="pencile delete" id="<?php echo $value['gcs_id']; ?>" href="javascript:void(0);" data-url="<?php echo site_url('calibration/deleteCalibrationService/' . $value['gcs_id']); ?>">
                                                              <img style="height: 20px;" src="images/trash.png" />
                                                              </span>
                                                    </td>
                                               </tr>
                                          <?php } ?>
                                     <?php } ?>
                              </tbody>
                              <tfoot>
                                   <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Calibration</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                   </tr>
                              </tfoot>
                         </table>
                    </div><!-- /.box-body -->
               </div><!-- /.box -->
          </div>
     </div>
</section>
</div>