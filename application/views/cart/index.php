<!--CONTACT-->
<div id="sectionb_wrapper">
     <div id="sectionb_inner">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;">Cart </a></li>
               </ul>
          </div><!--inner_breadcombmenu-->
          <h1>My Cart </h1>
          <div style="clear:both"></div>
     </div><!--sectionb_inner-->
</div><!--sectionb_wrapper-->

<!--INNER-->

<div id="contentmatter_wrapper">
     <div id="contentcart_inner">
          <?php if ($cart = $this->cart->contents()): ?>
                 <?php echo form_open('cart/update_cart'); ?>
                 <div id="cart_inner">
                      <div class="innercarttittlebg">
                           <div class="cart_name">PEODUCTS </div> 
                           <div class="cart_price">BRAND </div> 
                           <div class="cart_total">TOTAL </div>      
                           <div class="cart_qty">QTY </div>
                           <div class="cart_edit">REMOVE </div>                                                                              
                      </div><!--innercarttittlebg-->

                      <div class="innercarwhitebg">
                           <?php
                           $i = 1;
                           foreach ($cart as $item):
                                echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                                ?>
                                <div class="innercarwhitborder <?php echo (($i % 2) == 0) ? 'altcolor' : ''; ?>">
                                     <div class="cartitem_name">
                                          <div class="cart_imagebg">
                                               <!--<img src="images/product_1.jpg" alt=""/>-->
                                               <?php
                                                    $img = isset($item['product_details']['product_image'][0]['pdi_image']) ?
                                                            $item['product_details']['product_image'][0]['pdi_image'] : '';

                                                    echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/product/' .
                                                        $img, 'id' => 'imgBrandImage'));
                                                    ?>
                                          </div>
                                          <div class="namewrapper">
                                               <span><?php echo $item['name']; ?></span><br>
                                               Part Number : <?php echo $item['product_details']['prd_part_number']; ?><br>
                                               <!--In Stock--> 
                                          </div>
                                     </div>

                                     <div class="cartitem_price"><small>BRAND</small> 
            <?php echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/brand/' . $item['product_details']['brd_logo'], 'id' => 'imgBrandImage')); ?>
                                     </div>
                                     <div class="cartitem_total"><small> TOTAL </small>$125 </div>      
                                     <div class="cartitem_qty"><small>QTY</small>
                                          <form method="post" name="form1" id="form1"  action="" >
            <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" class="cartqty"'); ?>
                                          </form>
                                     </div>

                                     <div class="cartitem_edit"><small>REMOVE </small>
                                          <a href="<?php echo site_url('cart/remove/' . $item['rowid']); ?>" onclick="return confirm('Are you sure want to remove this product?');">
                                               <img src='images/delete.png'/>
                                          </a>
                                     </div> 
                                     <div style="clear:both"></div>
                                </div>
                                <?php
                                $i++;
                           endforeach;
                           ?>
                      </div>

                      <div class="innercargrandtotalbg">
                           <!--GRAND TOTAL--> 
                           &nbsp;&nbsp; 
                           <!--$228.00-->
                      </div><!--innercargrandtotalbg-->

                      <div class="cart_bottommenubg">
                           <a href="<?php echo site_url('cart/checkout'); ?>" class="cart_proceed"> Proceed to Checkout</a>
                           <a href="<?php echo site_url('product'); ?>" class="cart_multipleaddress">Continue Shopping</a>
                           <a href="javascript:void(0);" onclick="$(this).closest('form').submit();" class="cart_multipleaddress">Update Shopping Cart</a>
                           <!--<input type="submit" class ='fg-button teal' value="Update Cart">-->
                      </div><!--cart_bottommenubg-->
                 </div><!--cart_inner-->
                 <?php echo form_close(); ?>
                 <?php
            else: echo '<div class="empty_message">Your cart is empty</div>';
            endif;
          ?>
          <div style="clear:both"></div>
     </div><!--contentcart_inner-->
</div><!--contentmatter_wrapper-->    
