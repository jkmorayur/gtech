<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title></title>
     </head>
     <body style="margin: 0; padding: 0; background: #FFFFFF;">
          <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
               <tr>
                    <td align="center" style="margin: 0; padding: 0; background:#FFFFFF ;padding: 35px 0">
                         <div style="width:800px;height:auto; border:1px solid #CCCCCC; padding-bottom:5px; ">
                              <table cellpadding="0" cellspacing="0" border="0" align="center" width="800" style="font-family: Georgia, serif;" class="header">
                                   <tr>
                                        <td bgcolor="#FFFFFF" height="115" align="left">
                                             <a href="#" target="_blank">
                                                  <img src="<?php echo base_url('assets/images/logo.jpg') ?>" style="margin-left:15px; float:left;"></a>
                                             <p style="color:#e4020e; float:right;font-family:Tahoma, Geneva, sans-serif;font-size:16px; text-align:right; margin:20px 20px 0 0; ">
                                                  Purchase Date: &nbsp;<?php echo date('Y-m-d'); ?><br>
                                                       Order id: &nbsp;<?php echo $orderId; ?>
                                             </p>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td style="font-size: 1px; height: 5px; line-height: 1px;" height="5">&nbsp;</td>
                                   </tr>	
                              </table><!-- header-->
                              <table cellpadding="0" cellspacing="0" border="0" align="center" width="800" style="font-family: Georgia, serif; background: #fff;" bgcolor="#ffffff">
                                   <tr>
                                        <td width="14" style="font-size: 0px;" bgcolor="#ffffff">&nbsp;</td>
                                        <td width="620" valign="top" align="left" bgcolor="#ffffff"style="font-family: Georgia, serif; background: #fff;">
                                             <table cellpadding="0" cellspacing="0" border="0"  style="color: #717171; font: normal 11px Georgia, serif; margin: 0; padding: 0;" width="620" class="content">
                                                  <tr>
                                                       <td style="padding: 15px 0 8px; border-bottom: 1px solid #c6c6c6;font-family: Georgia, serif; "  valign="top" align="center">
                                                            <h3 style="color:#FFFFFF; font-weight: normal; margin: 0; padding:6px 0px; font-size: 22px;text-transform:uppercase; background:#e2010f;">Order Details</h3>
                                                       </td>
                                                  </tr>

                                                  <tr>
                                                       <td style="padding: 0px 0 0px;"  valign="top">

                                                            <table width="790" border="0" style="margin-top:10px;">
                                                                 <tr>
                                                                      <td width="50%">
                                                                           <h2 style="color:#333333; font-weight: normal; margin: 0; padding: 0;  line-height: 20px; font-size: 16px;font-family: Arial, Helvetica, sans-serif; margin-bottom:10px; ">Shipping Address</h2>
                                                                           <table width="98%" border="0" cellpadding="10" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; color:#333; font-size:14px;">
                                                                                <tr style="background:#e0e0e0;">
                                                                                     <td width="20%">Name</td>
                                                                                     <td width="67%"><?php echo $shippingAdd['first_name'] . ' ' . $shippingAdd['last_name']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                     <td>Email</td>
                                                                                     <td><?php echo $shippingAdd['email']; ?></td>
                                                                                </tr>
                                                                                <tr style="background:#e0e0e0;">
                                                                                     <td width="33%">Street Address:	</td>
                                                                                     <td width="67%"><?php echo $shippingAdd['address']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                     <td>Phone	</td>
                                                                                     <td><?php echo $shippingAdd['phone']; ?></td>
                                                                                </tr>
                                                                                <tr style="background:#e0e0e0;">
                                                                                     <td width="33%">Country	</td>
                                                                                     <td width="67%"><?php echo $shippingAdd['ctr_country']; ?></td>
                                                                                </tr>
                                                                           </table>
                                                                      </td>

                                                                      <td><h2 style="color:#31150a; font-weight: normal; margin: 0; padding: 0;  line-height: 20px; font-size: 16px;font-family: Arial, Helvetica, sans-serif; margin-bottom:10px;">&nbsp;Billing Address</h2>
                                                                           <table width="98%" border="0" cellpadding="10" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; color:#333; font-size:14px; float:right;">
                                                                                <tr style="background:#e0e0e0;">
                                                                                     <td width="33%">Name</td>
                                                                                     <td width="67%"><?php echo $billingAdd['first_name'] . ' ' . $billingAdd['last_name']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                     <td>Email:</td>
                                                                                     <td><?php echo $billingAdd['email']; ?></td>
                                                                                </tr>
                                                                                <tr style="background:#e0e0e0;">
                                                                                     <td width="33%">Street Address:	</td>
                                                                                     <td width="67%"><?php echo $billingAdd['address']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                     <td>Phone	</td>
                                                                                     <td><?php echo $billingAdd['phone']; ?></td>
                                                                                </tr>
                                                                                <tr style="background:#e0e0e0;">
                                                                                     <td width="33%">Country	</td>
                                                                                     <td width="67%"><?php echo $billingAdd['ctr_country']; ?></td>
                                                                                </tr>
                                                                           </table>
                                                                      </td>
                                                                 </tr>
                                                            </table>

                                                            <h2 style="color:#FFFFFF; font-weight: normal; margin:10px 0 5px 0; padding:6px 0px; font-size:18px;text-transform:uppercase; background:#e2010f;"> &nbsp;Product Details</h2>

                                                            <table width="100%" border="0" cellpadding="10" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif;">
                                                                 
                                                                 <tr style="background:#646363; color:#FFF; font-size:16px;">
                                                                      <td width="23%">Product Image </td>
                                                                      <td width="38%">Product Name </td>
                                                                      <!--<td width="14%" align="center">Price</td>-->
                                                                      <td width="11%" align="center">Qty</td>
                                                                      <!--<td width="14%" align="center">Total</td>-->
                                                                 </tr>
                                                                 
                                                                 <?php $i = 1; foreach ($cartDetails as $item): ?>
                                                                 <tr style="font-size:16px;<?php echo (($i % 2) == 0) ? 'background: #f4f2f2 none repeat scroll 0 0' : ''; ?>">
                                                                      <td align="">
                                                                           <?php
                                                                   $img = isset($item['product_details']['product_image'][0]['pdi_image']) ?
                                                                           $item['product_details']['product_image'][0]['pdi_image'] : '';

                                                                   echo img(array('src' => ADMIN_FOLDER . '/assets/uploads/product/' .
                                                                       $img, 'id' => 'imgBrandImage', 'style' => "width:100px;"));
                                                                   ?>
                                                                      </td>
                                                                      <td><?php echo $item['name']; ?></td>
                                                                      <!--<td align="center">$25</td>-->
                                                                      <td align="center"><?php echo $item['qty']; ?></td>
                                                                      <!--<td align="center">$226 </td>-->
                                                                 </tr>
                                                                 <?php $i++; endforeach; ?>
                                                                 <tr style="font-size:16px;border:none;">
<!--                                                                      <td colspan="5" style="background:#e2010f; color:#FFF;"  align="right">
                                                                           Grand Total :100 AED
                                                                      </td>-->
                                                                 </tr>
                                                            </table>
                                                       </td>
                                                  </tr>
                                             </table>	
                                        </td>
                                        <td width="16" bgcolor="#000000" style="font-size: 0px;font-family: Georgia, serif; background: #fff;">&nbsp;</td>
                                   </tr>
                              </table><!-- body -->
                              <table cellpadding="0" cellspacing="0" border="0" align="center" width="650" style="font-family: Georgia, serif; line-height: 10px;" bgcolor="#e2010f" class="footer">
                              </table>
                         </div>
                    </td>
               </tr>
          </table>
     </body>
</html>