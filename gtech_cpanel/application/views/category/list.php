<?php //echo '<pre>'; print_r($categories);exit;?>
<section class="content">
     <div class="row">
          <div class="col-xs-12">
               <div class="box">
                    <div class="box-header">
                         <h3 class="box-title">Category List</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                         <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                   <tr>
                                        <th>Category</th>
                                        <th>Parent Category</th>
                                        <th>Edit</th>
                                        <th>Delete</th>                                        
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php if(!empty($categories)) { foreach ($categories as $key => $value) { ?>
                                   <tr id="tr_<?php echo $value['cat_id']; ?>">
                                        <td><?php echo $value['category_name']; ?></td>
                                        <td><?php echo $value['parent_category']; ?></td>
                                        <td style="width: 20px;">
                                             <a class="pencile edit" href="<?php echo site_url('category/view/'.$value['cat_id']); ?>">
                                                  <img style="height: 25px;" src="images/pencile.png" />
                                             </a>
                                        </td>
                                        <td style="width: 20px;">
                                             <a class="pencile delete" id="<?php echo $value['cat_id']; ?>" href="javascript:void(0);" data-url="<?php echo site_url('category/delete/'.$value['cat_id']); ?>">
                                                  <img style="height: 20px;" src="images/trash.png" />
                                             </span>
                                        </td>
                                   </tr>
                                   <?php } } ?>
                              </tbody>
                              <tfoot>
                                   <tr>
                                        <th>Category</th>
                                        <th>Parent Category</th>
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
