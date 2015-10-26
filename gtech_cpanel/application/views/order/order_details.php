<section class="content">
     <div class="row">
          <div class="col-xs-12">
               <div class="box box-info">
                    <div id="contentmatter_wrapper">
                         <div id="orderdetail_inner">
                              <div style="float:left;width:100%;"> 
                                   <div class="dialog_dateand_id">PURCHASE DATE :  <?php echo date('Y-m-d', strtotime($orderDetails['ord_date'])); ?></div> 
                                   <div class="dialog_dateand_id" style="text-align:right;">ORDER ID:  <?php echo $orderDetails['ord_id']; ?></div>
                              </div>

                              <div style="float:left;width:100%;"> 
                                   <div class="dialog_dateand_id">ORDER STATUS :  
                                        <?php if (!empty($orderStatus)) { ?>
                                               <select style="color: #000;font-size: 14px;" data-url="<?php echo site_url('order/changeStatus/') ?>" 
                                                       order-id="<?php echo $orderDetails['odr_serial']; ?>" 
                                                       class="cmbOrderStatus" name="cmbOrderStatus" id="cmbOrderStatus">
                                                            <?php foreach ($orderStatus as $key => $status) { ?>
                                                         <option 
                                                         <?php echo ($status['ost_id'] == $orderDetails['ord_status']) ? 'selected="selected"' : ''; ?>
                                                              value="<?php echo $status['ost_id']; ?>"><?php echo $status['ost_title']; ?>
                                                         </option>
                                                    <?php } ?>
                                               </select>
                                          <?php } ?>
                                   </div> 
                              </div>

                              <div class="accinfo_informationbg orderlleft">
                                   <div class="myaccound_caption">Billing Address</div>
                                   <div class="loginfield accinfomar">
                                        <h2>Name :	<?php echo $orderDetails['billing_address']['first_name'] . ' ' . $orderDetails['billing_address']['last_name']; ?></h2>
                                        <h5>Email:	<?php echo $orderDetails['billing_address']['email']; ?></h5>
                                        <h2>Street Adress:	<?php echo $orderDetails['billing_address']['address']; ?></h2>
                                        <h5>Phone	:<?php echo $orderDetails['billing_address']['phone']; ?></h5>
                                        <h2>Country	:<?php echo $orderDetails['billing_address']['ctr_country']; ?></h2>
                                   </div>
                              </div><!--accinfo_informationbg-->

                              <div class="accinfo_informationbg orderlright" >
                                   <div class="myaccound_caption">Shipping Address</div>
                                   <div class="loginfield accinfomar">
                                        <h2 style="float: right;">Name :	<?php echo $orderDetails['shipping_address']['first_name'] . ' ' . $orderDetails['shipping_address']['last_name']; ?></h2>
                                        <h5 style="float: right;">Email:	<?php echo $orderDetails['shipping_address']['email']; ?></h5>
                                        <h2 style="float: right;">Street Adress:	<?php echo $orderDetails['shipping_address']['address']; ?></h2>
                                        <h5 style="float: right;">Phone	:<?php echo $orderDetails['shipping_address']['phone']; ?></h5>
                                        <h2 style="float: right;">Country	:<?php echo $orderDetails['shipping_address']['ctr_country']; ?></h2>
                                   </div>
                              </div><!--accinfo_informationbg-->

                              <div style="float:left;width:100%;"> 
                                   <div class="dialog_dateand_id">Product Details</div> 
                              </div>
                              <div id="cart_inner">
                                   <div class="innercarttittlebg">
                                        <div class="cart_name">PEODUCTS </div> 
                                        <div class="cart_price">BRAND </div> 
                                        <div class="cart_total">&nbsp;</div>      
                                        <div class="cart_qty">QTY </div>
                                        <div class="cart_edit"></div>
                                   </div><!--innercarttittlebg-->
                                   <div class="innercarwhitebg">
                                        <?php if (!empty($orderDetails['product_info'])) { ?>
                                               <?php foreach ($orderDetails['product_info'] as $key => $value) { ?>
                                                    <div class="innercarwhitborder">
                                                         <div class="cartitem_name">
                                                              <div class="cart_imagebg">
                                                                   <?php
                                                                   $img = isset($value['product_images'][0]['pdi_image']) ?
                                                                           $value['product_images'][0]['pdi_image'] : '';

                                                                   echo img(array('src' => 'assets/uploads/product/' .
                                                                       $img, 'id' => 'imgBrandImage'));
                                                                   ?>
                                                              </div>
                                                              <div class="namewrapper">
                                                                   <span><?php echo $value['prd_name']; ?></span><br>
                                                                   Part No : <?php echo $value['prd_part_number']; ?><br>
                                                              </div>
                                                         </div> <!--cartitem_name-->

                                                         <div class="cartitem_price"><small>BRAND</small> 
                                                              <?php echo img(array('src' => 'assets/uploads/brand/' . $value['brd_logo'], 'id' => 'imgBrandImage')); ?>
                                                         </div>
                                                         <div class="cartitem_total"><small> TOTAL </small> </div>      
                                                         <div class="cartitem_qty"><small>QTY</small>
                                                              <?php echo $value['orp_qty']; ?>
                                                         </div>

                                                         <div class="cartitem_edit">
                                                              <!--<small>TOTAL </small>-->
                                                         </div> 
                                                         <div style="clear:both"></div>
                                                    </div>
                                               <?php } ?>
                                          <?php } ?>
                                   </div><!--innercarwhitebg-->
                                   <div class="innercargrandtotalbg">
                                        &nbsp;&nbsp; 
                                   </div><!--innercargrandtotalbg-->
                              </div><!--cart_inner-->
                              <div style="clear:both"></div>
                         </div><!--orderdetail_inner-->
                    </div><!--contentmatter_wrapper-->
               </div>
          </div>
     </div>
</section>
</div>