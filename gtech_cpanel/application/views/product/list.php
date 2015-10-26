<section class="content">
     <div class="row">
          <div class="col-xs-12">
               <div class="box">
                    <div class="box-header">
                         <h3 class="box-title">Product List</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                         <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                   <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Part Number</th>
                                        <th>Brand</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Edit</th>
                                        <th>Delete</th> 
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php if(!empty($productDetails['product_details'])) { foreach ($productDetails['product_details'] as $key => $value) { ?>
                                   <tr id="tr_<?php echo $value['prd_id']; ?>">
                                        <td><?php echo $value['prd_name']; ?></td>
                                        <td><?php echo $value['prd_status']; ?></td>
                                        <td><?php echo $value['prd_part_number']; ?></td>
                                        <td><?php echo $value['brd_title']; ?></td>
                                        <td><?php echo empty($value['category_name']) ? $value['sub_category_name'] : $value['category_name']; ?></td>
                                        <td><?php echo empty($value['category_name']) ? '' : $value['sub_category_name']; ?></td>
                                        <td style="width: 20px;">
                                             <a class="pencile edit" href="<?php echo site_url('product/view/'.$value['prd_id']); ?>">
                                                  <img style="height: 25px;" src="images/pencile.png" />
                                             </a>
                                        </td>
                                        <td style="width: 20px;">
                                             <a class="pencile delete" id="<?php echo $value['prd_id']; ?>" href="javascript:void(0);" data-url="<?php echo site_url('product/delete/'.$value['prd_id']); ?>">
                                                  <img style="height: 20px;" src="images/trash.png" />
                                             </span>
                                        </td>
                                   </tr>
                                   <?php } } ?>
                              </tbody>
                              <tfoot>
                                   <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Part Number</th>
                                        <th>Brand</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
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
