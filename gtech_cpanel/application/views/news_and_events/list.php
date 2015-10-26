<section class="content">
     <div class="row">
          <div class="col-xs-12">
               <div class="box">
                    <div class="box-header">
                         <h3 class="box-title">News and events</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                         <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                   <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php if(!empty($news)) { foreach ($news as $key => $value) { ?>
                                   <tr>
                                        <td style="width: 100px;">
                                             <?php 
                                               if(isset($value['default_images']['nwi_image']) && 
                                                       !empty($value['default_images']['nwi_image'])) {
                                                    $img = $value['default_images']['nwi_image'];
                                               } else {
                                                    $img = isset($value['other_images'][0]['nwi_image']) ? 
                                                            $value['other_images'][0]['nwi_image'] : '';
                                               }
                                             ?>
                                             
                                             <?php echo img(array('src' => 'assets/uploads/news/'.$img,'height' => '80', 'width' => '130')); ?>
                                        </td>
                                        <td><?php echo $value['nws_title']; ?></td>
                                        <td><?php echo date('Y-m-d', strtotime($value['nws_date'])); ?></td>
                                        <td style="width: 20px;">
                                             <a class="pencile edit" href="<?php echo site_url('news_and_events/view/'.$value['nws_id']); ?>">
                                                  <img style="height: 25px;" src="images/pencile.png" />
                                             </a>
                                        </td>
                                        <td style="width: 20px;">
                                             <a class="pencile delete" id="<?php echo $value['nws_id']; ?>" href="javascript:void(0);" data-url="<?php echo site_url('news_and_events/delete/'.$value['nws_id']); ?>">
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
                                        <th>Date</th>
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