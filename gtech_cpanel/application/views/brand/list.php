<?php //echo '<pre>'; print_r($categories);exit;?>
<section class="content">
     <div class="row">
          <div class="col-xs-12">
               <div class="box">
                    <div class="box-header">
                         <h3 class="box-title">Brand List</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                         <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                   <tr>
                                        <th>Logo</th>
                                        <th>Brand</th>
                                        <th>Url</th>
                                        <th>Edit</th>
                                        <th>Delete</th>                                        
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php if(!empty($brand)) { foreach ($brand as $key => $value) { ?>
                                   <tr id="tr_<?php echo $value['brd_id']; ?>">
                                        <td style="width: 100px;">
                                             <?php echo img(array('src' => 'assets/uploads/brand/'.$value['brd_logo'],'height' => '80', 'width' => '130')); ?>
                                        </td>
                                        <td><?php echo $value['brd_title']; ?></td>
                                        <td><?php echo $value['brd_url']; ?></td>
                                        <td style="width: 20px;">
                                             <a class="pencile edit" href="<?php echo site_url('brand/view/'.$value['brd_id']); ?>">
                                                  <img style="height: 25px;" src="images/pencile.png" />
                                             </a>
                                        </td>
                                        <td style="width: 20px;">
                                             <a class="pencile delete" id="<?php echo $value['brd_id']; ?>" href="javascript:void(0);" data-url="<?php echo site_url('brand/delete/'.$value['brd_id']); ?>">
                                                  <img style="height: 20px;" src="images/trash.png" />
                                             </span>
                                        </td>
                                   </tr>
                                   <?php } } ?>
                              </tbody>
                              <tfoot>
                                   <tr>
                                        <th>Logo</th>
                                        <th>Brand</th>
                                        <th>Url</th>
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
