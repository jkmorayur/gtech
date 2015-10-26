<a href="#" class="askexpertbg_2">
     <div style="float:right;margin-top:10px;">
          <img src="images/ask.png" style="margin-right:10px;" >Request Quote
     </div>
</a> <!-- askexpertbg-->

<!--CONTACT-->
<div id="sectionb_wrapper">
     <div id="sectionb_inner">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;"> Request Quote </a></li>
               </ul>
          </div><!--inner_breadcombmenu-->
          <h1>Request Quote</h1>
          <div style="clear:both"></div>
     </div><!--sectionb_inner-->
</div><!--sectionb_wrapper-->
<!-- -->
<script type="text/javascript">
     $(function () {

          $("#frmRequestquote").validate({
               // Specify the validation rules
               rules: {
                    reqFirstname: "required",
                    reqLastname: "required",
                    reqEmail: {
                         required: true,
                         email: true
                    },
                    reqPhone: {
                         required: true,
                         number: true
                    },
                    reqCompany: "required",
                    reqAddress: "required",
                    reqCity: "required",
                    reqPostCode: "required",
                    reqCountry: "required",
                    reqHearAboutUs: "required",
                    reqCalibServiceOptns: "required",
                    'reqMessage[]': "required"
               },
               messages: {
                    reqFirstname: "Please enter your first name",
                    reqLastname: "Please enter your last name",
                    reqEmail: {
                         required: "Please enter email address",
                         email: "Please enter valid email"
                    },
                    reqPhone: "Please enter valid phone",
                    reqCompany: "Please enter company",
                    reqAddress: "Please enter address",
                    reqCity: "Please enter city",
                    reqPostCode: "Please enter post code",
                    reqCountry: "Please select country",
                    reqHearAboutUs: "Please select an option",
                    reqCalibServiceOptns: "Please select one of the above options.",
                    'reqMessage[]': "Please enter description"
               },
               submitHandler: function (form) {
                    var briefDesc = false;
                    $('.txtBriefDesc').each(function () {
                       if(this.value == '') {
                            briefDesc = true;
                            var id = this.id;
                            $('.'+id).html('Please enter description');
                       } else {
                            var id = this.id;
                            $('.'+id).html('');
                       } 
                    });
                    if(briefDesc == true) {
                         $('#third').trigger("click");
                    } 
                    
                    if ($('#radCalibrationService1').is(':checked') ||
                            $('#radCalibrationService2').is(':checked') ||
                            $('#radCalibrationService3').is(':checked')) {
                         $('#errCalibServiceOptns').html('');
                    } else {
                         $('#first').trigger("click");
                         $('#errCalibServiceOptns').show();
                         $('#errCalibServiceOptns').html('Please select one of the above options.');
                    }
                    if(briefDesc == false) {
                         form.submit();
                    }
               }
          });
          $('.addmore').click(function () {
               var min = -100;
               var max = 40;
               var rand = Math.floor(Math.random() * (max - min + 1) + min);
               $('#divRepairQuickQuote').append('<div class="field_label">' +
                       'Brands <input name="reqBrands[]" id="reqBrands" type="text" class="inputf"/>' +
                       '</div><div class="field_label">Model# <input name="reqModel[]" id="reqModel" type="text" class="inputf"/>' +
                       '</div><div class="field_label" style="width:99%;min-height:190px;">Brief description of problem    <strong>*</strong>' +
                       '<textarea name="reqMessage[]" id="' + rand + '" cols="" rows="" class="inputtextarea txtBriefDesc"></textarea>' +
                       '</div><div style="clear:both;"></div><div style="color:red;" class="error1 ' + rand + '"></div>');
          });
     });
</script>
<style>
     
     #contactform_inner .error1 {
          color: #F00;font-size: 11px; }
	  #contactform_inner label.error {
          color: #F00;font-size: 11px;font-weight:normal; margin:0px;   }
</style>
<!-- -->
<!--FORM-->
<div id="contactform_wrapper">
     <div id="contactform_inner">
          <p>Welcome to our Quick Quote form. Please complete all your contact information in Step 1 and then select the quote you require in Step 2 and complete all relevant information. This will be forwarded to one of our skilled sales representatives. You should receive a response within 1 business day.</p>
          <h3> <span style="color:#d52321; font-weight:bold;">Step 1: </span>Please enter your contact information</h3>
          <div id="formbg">
               
               <form method="post" name="frmRequestquote" id="frmRequestquote"  action="<?php echo site_url('requestquote/processRequestquote'); ?>"  enctype="multipart/form-data">
                    <div class="field_label">
                         First Name <strong>*</strong>
                         <input name="reqFirstname" id="reqFirstname" type="text" class="inputf"/>
                    </div>

                    <div class="field_label">
                         Last Name <strong>*</strong>
                         <input name="reqLastname" id="reqLastname" type="text" class="inputf"/>
                    </div>

                    <div class="field_label">
                         Job Title 
                         <input name="reqJobTitle" id="reqJobTitle" type="text" class="inputf"/>
                    </div>

                    <div class="field_label">
                         Email Address  <strong>*</strong>
                         <input name="reqEmail" id="reqEmail" type="text" class="inputf"/>
                    </div>

                    <div class="field_label">
                         Telephone  <strong>*</strong>
                         <input name="reqPhone" id="reqPhone" type="text" class="inputf"/>
                    </div>

                    <div class="field_label">
                         Company    <strong>*</strong>
                         <input name="reqCompany" id="reqCompany" type="text" class="inputf"/>
                    </div>


                    <div class="field_label" style="width:98%;min-height:190px;">
                         Address    <strong>*</strong>
                         <textarea  name="reqAddress" id='reqAddress' cols="" rows="" class="inputtextarea" ></textarea>
                    </div>

                    <div class="field_label">
                         City  <strong>*</strong>
                         <input name="reqCity" id="reqCity" type="text" class="inputf"/>
                    </div>

                    <div class="field_label">
                         State/Province  
                         <input name="reqState" id="reqState" type="text" class="inputf"/>
                    </div>

                    <div class="field_label">
                         Zip/Postal Code     <strong>*</strong>
                         <input name="reqPostCode" id="reqPostCode" type="text" class="inputf"/>
                    </div>

                    <div class="field_label">
                         Country  <strong>*</strong>
                         <span class="css4-metro-dropdown" style="width:100%;">
                              <select name="reqCountry">
                                   <option class="" value="">Please Select Country</option>
                                   <?php foreach (get_country_list() as $key => $value) { ?>
                                          <option value="<?php echo $value['ctr_id'] ?>"><?php echo $value['ctr_country'] ?></option>
                                     <?php } ?>
                              </select>
                         </span>
                    </div>

                    <div class="field_label">
                         How Did You Hear About Us?  <strong>*</strong>
                         <span class="css4-metro-dropdown" style="width:100%;">
                              <select name="reqHearAboutUs">
                                   <option class="" value="">Please Select</option>
                                   <option value="Existing Customer">Existing Customer</option>
                                   <option value="Transcat Catalog">Google Search</option>
                                   <option value="Magazine Ad">Magazine Ad</option>
                                   <option value="Referred by a friend">Referred by a friend</option>
                                   <option value="Other">Other</option>
                              </select>
                         </span>
                    </div>

                    <div class="field_label">
                         Preferred Method of Communication <br><br>  
                         <input id="radPhone" type="radio" value="Phone" name="reqCommnMethod">
                         Phone &nbsp;&nbsp;
                         <input id="radEmail" type="radio" value="Email" name="reqCommnMethod">
                         Email
                    </div>
                    <h3> <span style="color:#d52321; font-weight:bold; font-size:18px;">Step 1: </span>Please select the categories you would like a Quote on</h3>
                    <div class="contact_panelbg">

                         <div id="horizontalTab">
                              <ul class="resp-tabs-list">
                                   <li id="first">Accredited Calibration Quick Quote</li>
                                   <li id="second">Product Quick Quote </li>
                                   <li id="third">Repair Quick Quote</li>
                              </ul>

                              <div class="resp-tabs-container">
                                   <div>
                                        <p>All General Tech Calibrations are NIST traceable and ISO/IEC 17025 accredited by an ILAC traceable accrediting body. Please complete this form. We’ll respond to your request within 1 business day. Thank you for contacting General Tech Services</p>
                                        <h3>Please Provide Your Instrument Information</h3>
                                        <p>Please Provide Your Instrument Information: <strong>*</strong> </p>

                                        <div class="field_label" style="width:98%;min-height:60px; padding-left:0%;">
                                             Accredited Calibration Service Options <strong>*</strong> </p><br>
                                             &nbsp;&nbsp;&nbsp;&nbsp;<input id="radCalibrationService1" type="radio" value="Data Included" name="reqCalibServiceOptns">
                                             Data Included &nbsp;&nbsp;&nbsp;&nbsp;
                                             <input id="radCalibrationService2" type="radio" value="Data & Uncertainties Included" name="reqCalibServiceOptns">
                                             Data & Uncertainties Included&nbsp;&nbsp;&nbsp;&nbsp;
                                             <input id="radCalibrationService3" type="radio" value="Without Data" name="reqCalibServiceOptns">
                                             Without Data
                                             <br /><span id="errCalibServiceOptns" style="padding-left: 10px;" class="error" for="reqCalibServiceOptns" generated="true"></span>
                                        </div>

                                        <div class="field_label" style="width:99%;min-height:190px;">
                                             Comments or special instructions 
                                             <textarea  name="reqSpecialinstructions" id='reqSpecialinstructions' cols="" rows="" class="inputtextarea" ></textarea>
                                        </div>

                                        <div class="quickmatter">

                                             <p style="font-weight:bold; width:100%">Option #1</p><br>
                                             <p>Upload Your Equipment List</p> <input type="file" name="reqEquipmentList" style="margin-left:20px; float:left;">

                                        </div>

                                        <div class="quickmatter">

                                             <p style="font-weight:bold;">Option #2</p>
                                             <?php for ($i = 0; $i < 5; $i++) { ?>
                                                    <div class="quicksubbg">
                                                         <div class="quicksub">
                                                              <?php echo ($i == 0) ? 'Quantity' : ''; ?>
                                                              <input name="optionTwo[<?php echo $i; ?>][reqOptionTwoQty]" value="1" id="reqOptionTwoQty" type="text" class="inputf"/>
                                                         </div>
                                                         <div class="quicksub">
                                                              <?php echo ($i == 0) ? 'Manufacturer' : ''; ?> 
                                                              <input name="optionTwo[<?php echo $i; ?>][reqOptionTwoManftr]" id="reqOptionTwoManftr" type="text" class="inputf"/>
                                                         </div>
                                                         <div class="quicksub">
                                                              <?php echo ($i == 0) ? 'Model #' : ''; ?>
                                                              <input name="optionTwo[<?php echo $i; ?>][reqOptionTwoModel]" id="reqOptionTwoModel" type="text" class="inputf"/>
                                                         </div>
                                                         <div class="quicksub">
                                                              <?php echo ($i == 0) ? 'Item Description' : ''; ?>
                                                              <input name="optionTwo[<?php echo $i; ?>][reqOptionTwoDesc]" id="reqOptionTwoDesc" type="text" class="inputf"/>
                                                         </div>
                                                         <div class="quicksub">
                                                              <?php echo ($i == 0) ? 'Cal Interval' : ''; ?>
                                                              <input name="optionTwo[<?php echo $i; ?>][reqOptionTwoCalIntvl]" id="reqOptionTwoCalIntvl" type="text" class="inputf"/>
                                                         </div>
                                                    </div>
                                               <?php } ?>
                                        </div>
                                        <div style="clear:both;"></div>
                                   </div>

                                   <div>
                                        <?php for ($i = 0; $i < 5; $i++) { ?>
                                               <div class="quicksubbg">
                                                    <div class="quicksub">
                                                         Product Name 
                                                         <input name="prodQukQuote[<?php echo $i; ?>][reqProdName]" id="reqProdName" type="text" class="inputf"/>
                                                    </div>
                                                    <div class="quicksub">
                                                         Quantity 
                                                         <input name="prodQukQuote[<?php echo $i; ?>][reqProdQty]" id="reqProdQty" type="text" class="inputf"/>
                                                    </div>
                                                    <div class="quicksub">
                                                         Brands
                                                         <input name="prodQukQuote[<?php echo $i; ?>][reqProdBrand]" id="reqProdBrand" type="text" class="inputf"/>
                                                    </div>
                                                    <div class="quicksub">
                                                         Model #
                                                         <input name="prodQukQuote[<?php echo $i; ?>][reqProdModel]" id="reqProdModel" type="text" class="inputf"/>
                                                    </div>
                                                    <div class="quicksub">
                                                         Item Description 
                                                         <input name="prodQukQuote[<?php echo $i; ?>][reqProdDesc]" id="reqProdDesc" type="text" class="inputf"/>
                                                    </div>   
                                               </div>
                                          <?php } ?>
                                        <div style="clear:both;"></div>
                                   </div>

                                   <div>
                                        <div id="divRepairQuickQuote">
                                             <div class="field_label">
                                                  Brands
                                                  <input name="reqBrands[]" id="reqBrands" type="text" class="inputf"/>
                                             </div>

                                             <div class="field_label">
                                                  Model#
                                                  <input name="reqModel[]" id="reqModel" type="text" class="inputf"/>
                                             </div>

                                             <div class="field_label" style="width:99%;min-height:190px;">
                                                  Brief description of problem    <strong>*</strong>
                                                  <textarea name="reqMessage[]" id='reqMessage' cols="" rows="" class="inputtextarea txtBriefDesc"></textarea>
                                                  <span class="error" for="reqMessage" generated="true"></span>
                                             </div>
                                             <div style="clear:both;"></div>
                                        </div>
                                        <a href="javascript:void(0);" class="addmore"> + Add More</a>
                                   </div>

                              </div>
                         </div>
                    </div>
                    <input type="submit" name="send" value="Submit" class="form_btn" >
               </form>
          </div><!--formbg-->

          <div style="clear:both"></div>
     </div><!--contact_inner-->
</div><!--contactform_wrapper-->
<script type="text/javascript">
     $(document).ready(function () {
          $('#horizontalTab').easyResponsiveTabs({
               type: 'default', //Types: default, vertical, accordion           
               width: 'auto', //auto or any width like 600px
               fit: true, // 100% fit in a container
               closed: 'accordion', // Start closed if in accordion view
               activate: function (event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
               }
          });
     });
</script>