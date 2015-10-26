<style type="text/css">
     .product_listbg{
          margin-bottom:20px;
     }
     td {color: #000;}
</style>
<?php //debug($products); ?>
<div id="inner_wrapper">
     <div id="inner_inner">

          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;"> Cart </a></li>
               </ul>
          </div><!--inner_breadcombmenu-->


          <div id="inner_contentrapper">

               <div id="inner_productbg">
                    <div id="cart" >
                         <div id = "heading">
                              <h2 align="center">Products on Your Shopping Cart</h2>
                         </div>

                         <div id="text"> 
                              <?php
                                $cart_check = $this->cart->contents();

                                // If cart is empty, this will show below message.
                                if (empty($cart_check)) {
                                     echo 'To add products to your shopping cart click on "Add to Cart" Button';
                                }
                              ?> </div>

                         <table id="table" border="0" cellpadding="5px" cellspacing="1px">
                              <?php
                                // All values of cart store in "$cart". 
                                if ($cart = $this->cart->contents()):
                                     ?>
                                     <tr id= "main_heading">
                                          <td>Serial</td>
                                          <td>Name</td>
                                          <td>Price</td>
                                          <td>Qty</td>
                                          <td>Amount</td>
                                          <td>Cancel Product</td>
                                     </tr>
                                     <?php
                                     // Create form and send all values in "shopping/update_cart" function.
                                     echo form_open('cart/update_cart');
                                     $grand_total = 0;
                                     $i = 1;

                                     foreach ($cart as $item):
                                          //   echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                          //  Will produce the following output.
                                          // <input type="hidden" name="cart[1][id]" value="1" />

                                          echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                          echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                          echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                          echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                          echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                                          ?>
                                          <tr>
                                               <td>
                                                    <?php echo $i++; ?>
                                               </td>
                                               <td>
                                                    <?php echo $item['name']; ?>
                                               </td>
                                               <td>
                                                    $ <?php echo number_format($item['price'], 2); ?>
                                               </td>
                                               <td>
                                                    <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
                                               </td>
                                               <?php $grand_total = $grand_total + $item['subtotal']; ?>
                                               <td>
                                                    $ <?php echo number_format($item['subtotal'], 2) ?>
                                               </td>
                                               <td>

                                                    <?php
                                                    // cancle image.
                                                    $path = "<img src='http://localhost/cicart/images/cart_cross.jpg' width='25px' height='20px'>";
                                                    echo anchor('cart/remove/' . $item['rowid'], $path);
                                                    ?>
                                               </td>
                                          <?php endforeach; ?>
                                     </tr>
                                     <tr>
                                          <td><b>Order Total: $<?php
                                                    //Grand Total.
                                                    echo number_format($grand_total, 2);
                                                    ?></b></td>

                                          <?php // "clear cart" button call javascript confirmation message  ?>
                                          <td colspan="5" align="right"><input type="button" class ='fg-button teal' value="Clear Cart" onclick="clear_cart()">

                                               <?php //submit button.  ?>
                                               <input type="submit" class ='fg-button teal' value="Update Cart">
                                               <?php echo form_close(); ?>

                                               <!-- "Place order button" on click send "billing" controller  -->
                                               <input type="button" class ='fg-button teal' value="Place Order" onclick="window.location = 'shopping/billing_view'"></td>
                                     </tr>
                                <?php endif; ?>
                         </table>
                    </div>

               </div><!--inner_productbg-->
               <div style="clear:both"></div>
          </div><!--inner_contentrapper-->
          <div style="clear:both"></div>
     </div><!--inner_inner-->
</div><!--inner_wrapper-->

<script type="text/javascript">
     // To conform clear all data in cart.
     function clear_cart() {
          var result = confirm('Are you sure want to clear all bookings?');

          if (result) {
               window.location = "<?php echo base_url(); ?>index.php/cart/remove/all";
          } else {
               return false; // cancel button
          }
     }
</script>