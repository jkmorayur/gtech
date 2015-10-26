<script>
     $(document).ready(function () {
          $('.cmbBillingAdd').change(function () {
               var id = $(this).val();
               if (id == '0') {
                    $('#frmBillingAddress').show();
                    $('.btnContinuebill').hide();
               } else {
                    $('#frmBillingAddress').hide();
                    $('.btnContinuebill').show();
               }
          });
          $('.cmbShippingAdd').change(function () {
               var id = $(this).val();
               if (id == '0') {
                    $('#frmShippingAddress').show();
                    $('.btnContinueShipping').hide();
               } else {
                    $('#frmShippingAddress').hide();
                    $('.btnContinueShipping').show();
               }
          });
     });
     $(document).ready(function () {
          setTimeout(function () {
               $('.loading').hide();
               $('.contenttabbg').fadeIn();
          }
          , 2000);
     });
</script>
<script type="text/javascript">
     $(function () {
          $("#frmBillingAddress").validate({
               // Specify the validation rules
               rules: {
                    first_name: "required",
                    last_name: "required",
                    phone: {
                         number: true
                    },
                    city: "required",
                    address: "required",
                    postcode: "required",
                    country: "required",
                    state: "required"
               },
               // Specify the validation error messages
               messages: {
                    first_name: "Please enter your first name",
                    last_name: "Please enter your last name",
                    phone: "Please enter phone number",
                    city: "Please enter city",
                    address: "Please enter address",
                    postcode: "Please enter postcode",
                    country: "Please select country",
                    state: "Please select country"
               }
          });
     });
</script>
<style type="text/css">
     .logininput{
          float:left; height:46px;}
     :root .css4-metro-dropdown select,
     :root .css4-metro-dropdown:after,
     :root .css4-metro-dropdown::after{
          margin-top:1px;}	
     .logininput {
          height: 40px;
     }
     span.error {
          font-size: 13px;
          color: red;
     }

     .acc_informationbg {
          width: 92%;
     }
</style>

<div id="sectionb_wrapper">
     <div id="sectionb_inner">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="#"> Home &raquo; </a></li>
                    <li><a href="#" style="color:#d92523;">Checkout </a></li>
               </ul>
          </div><!--inner_breadcombmenu-->
          <h1>Checkout </h1>
          <div style="clear:both"></div>
     </div><!--sectionb_inner-->
</div><!--sectionb_wrapper-->
<?php //echo $this->session->userdata('billing_add'); ?>
<div id="contentmatter_wrapper" >
     <div id="contentcart_inner">
          <div class="contenttabbg">
               <!--vertical Tabs-->
               <div class="loading" style="text-align: center;padding: 200px 0px;width: 100%;">
                    <img src="images/loading_spinner.gif"/>
               </div>
               <div class="contenttabbg" style="display: none;">
                    <div id="myaccount" class="MTime">
                         <ul class="resp-tabs-list">
                              <h1>CHECKOUT</h1>
                              <li id="tab1">Billing Information </li> <!-- 1 -->
                              <li id="tab2">Shipping Information</li> <!-- 2 -->
                              <li id="tab3">Order Review</li> <!-- 5 -->
                         </ul>

                         <div class="resp-tabs-container">
                              <div><!-- 1 -->

                                   <div class="myaccound_title"> Billing Information </div>
                                   <form method="post" name="frmBillingAddressSelect" id="frmBillingAddressSelect"  
                                         action="<?php echo site_url('cart/billing_address'); ?>">
                                        <div class="loginfield ">
                                             <label>Select a company address from your address book or enter a new address.</label>
                                             <?php if (!empty($billingAddress)) { ?>
                                                    <span class="css4-metro-dropdown" style="width:100%;">
                                                         <select name="cmbBillingAdd" id="cmbBillingAdd" class="cmbBillingAdd">
                                                              <?php foreach ($billingAddress as $key => $value) { ?>
                                                                   <option 
                                                                   <?php echo ($this->session->userdata('billing_add') == $value['add_id']) ? 'selected="selected"' : ''; ?>
                                                                        value="<?php echo $value['add_id'] ?>">
                                                                             <?php
                                                                             echo $value['first_name'] . ', ' . $value['last_name'] . ', '
                                                                             . $value['address'] . ', ' . $value['city'] . ', ' . $value['state']
                                                                             ?>
                                                                   </option>
                                                              <?php } ?>
                                                              <option value="0">Add new address</option>
                                                         </select>
                                                    </span>
                                               <?php } ?>
                                             <input type="submit" value="CONTINUE" id="submit_form" class="createacc btnContinuebill"  
                                                    style="margin-top:10px; margin-right:1%;"/>
                                        </div>
                                   </form>
                                   <form method="post" name="frmBillingAddress" id="frmBillingAddress"  
                                         action="<?php echo site_url('cart/newBillingAddress'); ?>" style="display: none;">
                                        <div class="acc_informationbg">
                                             <div class="myaccound_caption">Account Information</div>

                                             <div class="add_bookfield">
                                                  <div class="loginfield ">
                                                       <label>First Name</label>
                                                       <input name="first_name" type="text"  id="first_name" value="<?php echo $defaultBilling['first_name'] ?>"  class="logininput"   style="width:98%;"  />
                                                  </div>
                                             </div>  

                                             <div class="add_bookfield" style="float:right;">
                                                  <div class="loginfield ">
                                                       <label>Last Name</label>
                                                       <input name="last_name" type="text"  id="last_name" value="<?php echo $defaultBilling['last_name'] ?>" class="logininput"   style="width:98%;"  />
                                                  </div>
                                             </div> 

                                             <div class="add_bookfield">
                                                  <div class="loginfield ">
                                                       <label>Company</label>
                                                       <input name="company" type="text"  id="company" value="<?php echo $defaultBilling['company'] ?>"  class="logininput"   style="width:98%;"  />
                                                  </div>
                                             </div>  

                                             <div class="add_bookfield" style="float:right;">
                                                  <div class="loginfield ">
                                                       <label>Telephone</label>
                                                       <input name="phone" type="text"  id="phone" value="<?php echo $defaultBilling['phone'] ?>" class="logininput"   style="width:98%;"  />
                                                  </div>
                                             </div>  

                                             <div class="myaccound_caption" style="margin-top:30px;">Address</div>  

                                             <div class="add_bookfield" style="width:100%;">
                                                  <label>Street Address</label>
                                                  <textarea name="address" id="address" rows="" cols=""  class="inputtextarea" style="width:99%; margin-top:2px; margin-bottom:20px;" ><?php echo $defaultBilling['address'] ?></textarea>
                                             </div>


                                             <div class="add_bookfield">
                                                  <div class="loginfield ">
                                                       <label>City</label>
                                                       <input name="city" type="text"  id="city" value="<?php echo $defaultBilling['city'] ?>"  class="logininput"   style="width:98%;"  />
                                                  </div>
                                             </div>  

                                             <div class="add_bookfield" style="float:right;">
                                                  <div class="loginfield ">
                                                       <label>State/Province</label>
                                                       <span class="css4-metro-dropdown" style="width:100%;">
                                                            <select name="state" id="state">
                                                                 <option value="">Please select region, state or province</option>
                                                                 <?php foreach (get_state_province() as $key => $value) { ?>
                                                                        <option <?php echo ($defaultBilling['state'] == $value['id']) ? "selected='selected'" : ''; ?> value="<?php echo $value['id'] ?>"><?php echo $value['stat_long_name'] ?></option>
                                                                   <?php } ?>
                                                            </select>
                                                       </span>
                                                  </div>
                                             </div>

                                             <div class="add_bookfield">
                                                  <div class="loginfield ">
                                                       <label>Zip/Postal Code</label>
                                                       <input name="postcode" type="text"  id="postcode" value="<?php echo $defaultBilling['postcode'] ?>"  class="logininput"   style="width:98%;"  />
                                                  </div>
                                             </div>  
                                             <div class="add_bookfield" style="float:right;">
                                                  <div class="loginfield ">
                                                       <label>Country</label>
                                                       <span class="css4-metro-dropdown" style="width:100%;">
                                                            <select name="country">
                                                                 <option class="" value="">Please Select Country</option>
                                                                 <?php foreach (get_country_list() as $key => $value) { ?>
                                                                        <option <?php echo ($defaultBilling['country'] == $value['ctr_id']) ? "selected='selected'" : ''; ?> value="<?php echo $value['ctr_id'] ?>"><?php echo $value['ctr_country'] ?></option>
                                                                   <?php } ?>
                                                            </select>
                                                       </span>
                                                  </div>
                                             </div>
                                             <input type="submit"  id="submit_form"   value="CONTINUE" name="" class="createacc"  style="margin-top:10px; margin-right:1%;"  />
                                             <a href="javascript:void(0);" class="createacc back_to_add_book" style="margin-top:10px; float:left;">BACK </a>
                                        </div>
                                   </form>
                                   <div style="clear:both;"></div>
                              </div>  

                              <div><!-- 2 -->
                                   <div class="myaccound_title"> Shipping Information </div>
                                   <form method="post" name="frmShpingAddressSelect" id="frmShpingAddressSelect"  
                                         action="<?php echo site_url('cart/shipping_address'); ?>">
                                        <div class="loginfield ">
                                             <label>Select a shipping address from your address book or enter a new address.</label>
                                             <?php if (!empty($shippingAddress)) { ?>
                                                    <span class="css4-metro-dropdown" style="width:100%;">
                                                         <select name="cmbShippingAdd" id="cmbShippingAdd" class="cmbShippingAdd">
                                                              <?php foreach ($shippingAddress as $key => $value) { ?>
                                                                   <option 
                                                                   <?php echo ($this->session->userdata('shipping_add') == $value['add_id']) ? 'selected="selected"' : ''; ?>
                                                                        value="<?php echo $value['add_id'] ?>">
                                                                             <?php
                                                                             echo $value['first_name'] . ', ' . $value['last_name'] . ', '
                                                                             . $value['address'] . ', ' . $value['city'] . ', ' . $value['state']
                                                                             ?>
                                                                   </option>
                                                              <?php } ?>
                                                              <option value="0">Add new address</option>
                                                         </select>
                                                    </span>
                                               <?php } ?>
                                             <input type="submit" value="CONTINUE" id="btnContinueShipping submit_form" class="createacc btnContinueShipping"  
                                                    style="margin-top:10px; margin-right:1%;"/>
                                        </div>
                                   </form>
                                   <form method="post" name="frmShippingAddress" id="frmShippingAddress"  
                                         action="<?php echo site_url('cart/newShippingAddress'); ?>" style="display: none;">
                                        <div class="acc_informationbg">
                                             <div class="myaccound_caption">Account Information</div>

                                             <div class="add_bookfield">
                                                  <div class="loginfield ">
                                                       <label>First Name</label>
                                                       <input name="first_name" type="text"  id="first_name" value="<?php echo $defaultShipping['first_name'] ?>"  class="logininput"   style="width:98%;"  />
                                                  </div>
                                             </div>  

                                             <div class="add_bookfield" style="float:right;">
                                                  <div class="loginfield ">
                                                       <label>Last Name</label>
                                                       <input name="last_name" type="text"  id="last_name" value="<?php echo $defaultShipping['last_name'] ?>" class="logininput"   style="width:98%;"  />
                                                  </div>
                                             </div> 

                                             <div class="add_bookfield">
                                                  <div class="loginfield ">
                                                       <label>Company</label>
                                                       <input name="company" type="text"  id="company" value="<?php echo $defaultShipping['company'] ?>"  class="logininput"   style="width:98%;"  />
                                                  </div>
                                             </div>  

                                             <div class="add_bookfield" style="float:right;">
                                                  <div class="loginfield ">
                                                       <label>Telephone</label>
                                                       <input name="phone" type="text"  id="phone" value="<?php echo $defaultShipping['phone'] ?>" class="logininput"   style="width:98%;"  />
                                                  </div>
                                             </div>  

                                             <div class="myaccound_caption" style="margin-top:30px;">Address</div>  

                                             <div class="add_bookfield" style="width:100%;">
                                                  <label>Street Address</label>
                                                  <textarea name="address" id="address" rows="" cols=""  class="inputtextarea" style="width:99%; margin-top:2px; margin-bottom:20px;" ><?php echo $defaultShipping['address'] ?></textarea>
                                             </div>


                                             <div class="add_bookfield">
                                                  <div class="loginfield ">
                                                       <label>City</label>
                                                       <input name="city" type="text"  id="city" value="<?php echo $defaultShipping['city'] ?>"  class="logininput"   style="width:98%;"  />
                                                  </div>
                                             </div>  

                                             <div class="add_bookfield" style="float:right;">
                                                  <div class="loginfield ">
                                                       <label>State/Province</label>
                                                       <span class="css4-metro-dropdown" style="width:100%;">
                                                            <select name="state" id="state">
                                                                 <option value="">Please select region, state or province</option>
                                                                 <?php foreach (get_state_province() as $key => $value) { ?>
                                                                        <option <?php echo ($defaultShipping['state'] == $value['id']) ? "selected='selected'" : ''; ?> value="<?php echo $value['id'] ?>"><?php echo $value['stat_long_name'] ?></option>
                                                                   <?php } ?>
                                                            </select>
                                                       </span>
                                                  </div>
                                             </div>

                                             <div class="add_bookfield">
                                                  <div class="loginfield ">
                                                       <label>Zip/Postal Code</label>
                                                       <input name="postcode" type="text"  id="postcode" value="<?php echo $defaultShipping['postcode'] ?>"  class="logininput"   style="width:98%;"  />
                                                  </div>
                                             </div>  
                                             <div class="add_bookfield" style="float:right;">
                                                  <div class="loginfield ">
                                                       <label>Country</label>
                                                       <span class="css4-metro-dropdown" style="width:100%;">
                                                            <select name="country">
                                                                 <option class="" value="">Please Select Country</option>
                                                                 <?php foreach (get_country_list() as $key => $value) { ?>
                                                                        <option <?php echo ($defaultShipping['country'] == $value['ctr_id']) ? "selected='selected'" : ''; ?> value="<?php echo $value['ctr_id'] ?>"><?php echo $value['ctr_country'] ?></option>
                                                                   <?php } ?>
                                                            </select>
                                                       </span>
                                                  </div>
                                             </div>
                                             <input type="submit"  id="submit_form"   value="CONTINUE" name="" class="createacc"  style="margin-top:10px; margin-right:1%;"  />
                                             <a href="javascript:void(0);" class="createacc back_to_add_book" style="margin-top:10px; float:left;">BACK </a>
                                        </div>
                                   </form>
                                   <div style="clear:both;"></div> 
                              </div> 

                              <div><!-- 5 -->
                                   <?php if ($cart = $this->cart->contents()): ?>
                                          <?php echo form_open('cart/update_cart'); ?>
                                          <div class="myaccound_title"> Order Review </div>
                                          <div class="innercarttittlebg">
                                               <div class="cart_name">PRODUCTS </div> 
                                               <div class="cart_total">TOTAL </div> 
                                               <div class="cart_price">BRAND </div>      
                                               <div class="cart_qty" style="float:right;">QTY </div>
                                          </div><!--innercarttittlebg-->
                                          <div class="innercarwhitebg">

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
                                                              </div> <!--cartitem_name-->

                                                              <div class="cartitem_total"><small> TOTAL </small>$125 </div>  
                                                              <div class="cartitem_price"><small>BRAND</small> 
                                                                   <?php echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/brand/' . $item['product_details']['brd_logo'], 'id' => 'imgBrandImage')); ?>
                                                              </div>
                                                              <div class="cartitem_qty" style="float:right;"><small>QTY</small>
                                                                   <?php echo $item['qty']; ?>
                                                              </div>

                                                              <div style="clear:both"></div>
                                                         </div>
                                                         <?php
                                                         $i++;
                                                    endforeach;
                                                    ?>
                                               </div>
                                               <div class="innercargrandtotalbg" style="font-weight:normal;">
                                                    &nbsp;&nbsp;
                                               </div>
                                               <!--                                          <div class="innercargrandtotalbg" style="font-weight:normal;">
                                                                                              SUBTOTAL &nbsp;&nbsp; 	$94.97
                                                                                         </div>
                                                                                         <div class="innercargrandtotalbg" style="font-weight:normal; margin-top:1px;">
                                                                                              Shipping & Handling (UAE Shipping - Table Rate) &nbsp;&nbsp;	$38.00
                                                                                         </div>
                                                                                         <div class="innercargrandtotalbg" style="margin-top:1px;">
                                                                                              Grand Total &nbsp;&nbsp;	$132.97
                                                                                         </div>-->

                                               <a href="<?php echo site_url('cart/place_order'); ?>"  class="cart_proceed" style="margin-top:10px; margin-right:10px; margin-bottom:10px;"> PLACE ORDER</a>
                                               <a href="<?php echo site_url('cart'); ?>" class="cart_multipleaddress" style="float:left; margin-top:5px; margin-left:10px;">Forgot an Item? Edit Your Cart</a>
                                          </div>    
                                          <div style="clear:both;"></div> 
                                     <?php endif; ?>
                              </div>	 
                         </div><!--resp-tabs-container-->
                    </div><!--vertical Tabs-->
               </div>
          </div><!--contenttabbg-->
          <div style="clear:both"></div>
     </div><!--contentcart_inner-->
</div><!--contentmatter_wrapper-->

<script type="text/javascript">
     $(document).ready(function () {
          $('#myaccount').easyResponsiveTabs({
               type: 'vertical',
               width: 'auto',
               fit: true
          });
          var tab = "<?php echo $section; ?>";
          if (tab) {
               $('#tab' + tab).trigger('click');
          }
     });
</script>  
