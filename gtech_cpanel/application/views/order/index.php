<section class="content">
     <div class="row">
          <div class="col-xs-12">
               <div class="box">
                    <div class="box-header">
                         <h3 class="box-title">Order List</h3>
                    </div><!-- /.box-header -->
                    <?php //debug($allOrders); ?>
                    <div class="box-body">
                         <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                   <tr>
                                        <th>Order No</th>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>View</th>
                                        <th>Delete</th> 
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php if (!empty($allOrders)) { ?>
                                          <?php foreach ($allOrders as $key => $value) { ?>
                                               <tr>
                                                    <td><?php echo $value['ord_id']; ?></td>
                                                    <td><?php echo date('Y-m-d', strtotime($value['ord_date'])) ?></td>
                                                    <td><?php echo $value['first_name'] . ' ' . $value['last_name']; ?></td>
                                                    <td>
                                                         <?php if (!empty($orderStatus)) { ?>
                                                              <select data-url="<?php echo site_url('order/changeStatus/') ?>" order-id="<?php echo $value['odr_serial']; ?>" 
                                                                      class="cmbOrderStatus" name="cmbOrderStatus" id="cmbOrderStatus">
                                                                           <?php foreach ($orderStatus as $key => $status) { ?>
                                                                        <option 
                                                                        <?php echo ($status['ost_id'] == $value['ord_status']) ? 'selected="selected"' : ''; ?>
                                                                             value="<?php echo $status['ost_id']; ?>"><?php echo $status['ost_title']; ?>
                                                                        </option>
                                                                   <?php } ?>
                                                              </select>
                                                         <?php } ?>
                                                    </td>
                                                    <td style="width: 20px;">
                                                         <a href="<?php echo site_url('order/order_details/' . $value['odr_serial']); ?>">
                                                              <i style="color: #000;font-size: 19px;" class="fa fa-fw fa-eye"></i>
                                                         </a>
                                                    </td>
                                                    <td style="width: 20px;">
                                                         <a class="pencile delete" id="<?php echo $value['odr_serial']; ?>" href="javascript:void(0);" data-url="<?php echo site_url('product/delete/' . $value['odr_serial']); ?>">
                                                              <i style="color: #000;font-size: 19px;" class="fa fa-fw fa-trash"></i>
                                                              </span>
                                                    </td>
                                               </tr>
                                               <?php
                                          }
                                     }
                                   ?>
                              </tbody>
                              <tfoot>
                                   <tr>
                                        <th>Order No</th>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>View</th>
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
