<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title>General Tech Services LLC</title>
     </head>

     <body style="margin:0px; padding:0px;">

          <div style="width:800px;height:auto;border:1px solid #dbdada;padding:10px; margin:10px auto; ">
               <div style="font-family:Arial; font-size:18px; color:#d72422;text-transform:uppercase; float:left; text-align:left; padding:10px 0px; margin-left:10px;">contact information </div>
               <table width="98%" border="0" cellpadding="10" cellspacing="0" style="font-family:sans-serif; color:#333; font-size:13px;">
                    <tr style="background:#f2f2f2;">
                         <td width="30%"><strong>First Name </strong></td>
                         <td width="67%"><?php echo $reqFirstname; ?></td>
                    </tr>
                    <tr>
                         <td><strong>Last Name</strong></td>
                         <td><?php echo $reqLastname; ?></td>
                    </tr>
                    <tr style="background:#f2f2f2;">
                         <td width="30%"><strong>Job Title </strong>	</td>
                         <td width="67%"><?php echo $reqJobTitle; ?></td>
                    </tr>
                    <tr>
                         <td><strong>Email Address </strong></td>
                         <td><?php echo $reqEmail; ?></td>
                    </tr>
                    <tr style="background:#f2f2f2;">
                         <td width="30%"><strong>Telephone </strong></td>
                         <td width="67%"><?php echo $reqPhone; ?></td>
                    </tr>
                    <tr>
                         <td><strong>Company </strong></td>
                         <td><?php echo $reqCompany; ?></td>
                    </tr>
                    <tr style="background:#f2f2f2;">
                         <td width="30%" valign="top"><strong>Address </strong></td>
                         <td width="67%"><?php echo $reqAddress; ?></td>
                    </tr>
                    <tr>
                         <td><strong>City  </strong></td>
                         <td><?php echo $reqCity; ?></td>
                    </tr>
                    <tr style="background:#f2f2f2;">
                         <td width="30%" valign="top"><strong>State/Province </strong></td>
                         <td width="67%"><?php echo $reqState; ?></td>
                    </tr>

                    <tr style="background:#f2f2f2;">
                         <td width="30%"><strong>Zip/Postal Code  </strong></td>
                         <td width="67%"><?php echo $reqPostCode; ?></td>
                    </tr>
                    <tr>
                         <td><strong>Country </strong></td>
                         <td><?php echo $reqCountry; ?></td>
                    </tr>
                    <tr style="background:#f2f2f2;">
                         <td width="30%"><strong>How Did You Hear About Us?  </strong>	</td>
                         <td width="67%"><?php echo $reqHearAboutUs; ?></td>
                    </tr>
                    <tr>
                         <td><strong>Preferred Method of Communication  </strong></td>
                         <td> <?php echo isset($reqCommnMethod) ? $reqCommnMethod : ''; ?> </td>
                    </tr>
               </table>
               <div style="clear:both"></div>
          </div><!-- END-->
          <!--  1  --> 
          <div style="width:800px;height:auto;border:1px solid #dbdada;padding:10px; margin:10px auto; ">
               <div style="font-family:Arial; font-size:18px; color:#d72422;text-transform:uppercase; float:left; text-align:left; padding:10px 0px; margin-left:10px;">Accredited Calibration Quick Quote </div>
               <table width="100%" border="0" cellpadding="10" cellspacing="0" style="font-family:sans-serif; color:#333; font-size:13px;">
                    <tr style="background:#f2f2f2;">
                         <td width="30%"><strong>Accredited Calibration Service Options</strong></td>
                         <td width="67%"><?php echo isset($reqCalibServiceOptns) ? $reqCalibServiceOptns : ''; ?></td>
                    </tr>
                    <tr>
                         <td valign="top"><strong>Comments or special instructions</strong></td>
                         <td><?php echo $reqSpecialinstructions; ?></td>
                    </tr>
               </table>
               <?php if (!empty($optionTwo)) { ?>
                      <table>
                           <tr style="background:#f2f2f2;">
                                <td colspan="2"><strong>Option #2</strong></td>
                           </tr>
                      </table>
                      <table width="98%" border="1" cellpadding="10" cellspacing="0" style="font-family:sans-serif; color:#333; font-size:13px;">
                           <tr>
                                <td>Quantity</td>
                                <td>Manufacturer</td>
                                <td>Model #</td>
                                <td>Item Description</td>
                                <td>Cal Interval</td>
                           </tr>
                           <?php foreach ($optionTwo as $key => $value) { ?>
                                <tr>
                                     <td valign="top"><?php echo $optionTwo[$key]['reqOptionTwoQty']; ?></td>
                                     <td valign="top"><?php echo $optionTwo[$key]['reqOptionTwoManftr']; ?></td>
                                     <td valign="top"><?php echo $optionTwo[$key]['reqOptionTwoModel']; ?></td>
                                     <td><?php echo $optionTwo[$key]['reqOptionTwoDesc']; ?></td>
                                     <td valign="top"><?php echo $optionTwo[$key]['reqOptionTwoCalIntvl']; ?></td>
                                </tr>
                           <?php } ?>
                      </table>
                 <?php } ?>
               <div style="clear:both"></div>
          </div><!-- END-->

          <!--  2 --> 

          <div style="width:800px;height:auto;border:1px solid #dbdada;padding:10px; margin:10px auto; ">
               <div style="font-family:Arial; font-size:18px; color:#d72422;text-transform:uppercase; float:left; text-align:left; padding:10px 0px; margin-left:10px;">Product Quick Quote  </div>
               <?php if (!empty($prodQukQuote)) { ?>
                      <table width="98%" border="1" cellpadding="10" cellspacing="0" style="font-family:sans-serif; color:#333; font-size:13px;">
                           <tr>
                                <td>Product Name </td>
                                <td>Quantity</td>
                                <td>Brands </td>
                                <td>Model #  </td>
                                <td>Item Description  </td>
                           </tr>
                           <?php foreach ($prodQukQuote as $key => $value) { ?>
                                <?php
                                if (!empty($prodQukQuote[$key]['reqProdName']) &&
                                        !empty($prodQukQuote[$key]['reqProdQty']) && !empty($prodQukQuote[$key]['reqProdBrand']) &&
                                        !empty($prodQukQuote[$key]['reqProdModel']) && !empty($prodQukQuote[$key]['reqProdDesc'])) {
                                     ?>
                                     <tr>
                                          <td valign="top"><?php echo $prodQukQuote[$key]['reqProdName']; ?></td>
                                          <td valign="top"><?php echo $prodQukQuote[$key]['reqProdQty']; ?></td>
                                          <td valign="top"><?php echo $prodQukQuote[$key]['reqProdBrand']; ?></td>
                                          <td valign="top"><?php echo $prodQukQuote[$key]['reqProdModel']; ?></td>
                                          <td><?php echo $prodQukQuote[$key]['reqProdDesc']; ?></td>
                                     </tr>
                                <?php } ?>
                           <?php } ?>
                      </table>
                 <?php } ?>
               <div style="clear:both"></div>
          </div>

          <!-- END-->
          <!--  3 --> 
          <div style="width:800px;height:auto;border:1px solid #dbdada;padding:10px; margin:10px auto; ">
               <div style="font-family:Arial; font-size:18px; color:#d72422;text-transform:uppercase; float:left; text-align:left; padding:10px 0px; margin-left:10px;">Repair Quick Quote </div>
               <?php
                 $count = count($reqBrands);
                 if ($count > 0) {
                      ?>
                      <table width="98%" border="1" cellpadding="10" cellspacing="0" style="font-family:sans-serif; color:#333; font-size:13px;">
                           <tr>
                                <td width="24%" >Brands </td>
                                <td width="14%" >Model# </td>
                                <td width="62%" valign="top" >Brief description of problem </td>
                           </tr>
                           <?php for ($i = 0; $i < $count; $i++) { ?>
                                <?php if (!empty($reqBrands[$i]) && !empty($reqModel[$i]) && !empty($reqMessage[$i])) { ?>
                                     <tr>
                                          <td valign="top"><?php echo $reqBrands[$i]; ?></td>
                                          <td valign="top"><?php echo $reqModel[$i]; ?></td>
                                          <td><?php echo $reqMessage[$i]; ?></td>
                                     </tr>
                                <?php } ?>
                           <?php } ?>
                      </table>
                 <?php } ?>
               <div style="clear:both"></div>
          </div>

          <!-- END-->
          <!--  4 --> 
     </body>
</html>