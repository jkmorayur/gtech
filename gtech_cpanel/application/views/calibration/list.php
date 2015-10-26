<?php //echo '<pre>'; print_r($categories);exit;?>
<section class="content">
     <div class="row">
          <div class="col-xs-12">
               <div class="box">
                    <div class="box-header">
                         <h3 class="box-title">Calibration List</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                         <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                   <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Edit</th>
                                        <th>Delete</th>                                        
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php if(!empty($calibration)) { foreach ($calibration as $key => $value) { ?>
                                   <tr id="tr_<?php echo $value['cal_id']; ?>">
                                        <td style="width: 100px;">
                                             <?php echo img(array('src' => 'assets/uploads/calibration/'.$value['cal_image'],'height' => '80', 'width' => '130')); ?>
                                        </td>
                                        <td><?php echo $value['cal_title']; ?></td>
                                        <td style="width: 20px;">
                                             <a class="pencile edit" href="<?php echo site_url('calibration/view/'.$value['cal_id']); ?>">
                                                  <img style="height: 25px;" src="images/pencile.png" />
                                             </a>
                                        </td>
                                        <td style="width: 20px;">
                                             <a class="pencile delete" id="<?php echo $value['cal_id']; ?>" href="javascript:void(0);" data-url="<?php echo site_url('calibration/delete/'.$value['cal_id']); ?>">
                                                  <img style="height: 20px;" src="images/trash.png" />
                                             </span>
                                        </td>
                                   </tr>
                                   <?php } } ?>
                              </tbody>
                              <tfoot>
                                   <tr>
                                        <th>Image</th>
                                        <th>Title</th>
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
