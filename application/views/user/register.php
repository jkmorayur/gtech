<script src="scripts/jquery-1.11.2.min.js"></script>
<script src="scripts/jquery.validate.min.js"></script>
<script>
     $(function () {
          $("#frmRegister").validate({
               // Specify the validation rules
               rules: {
                    first_name: "required",
                    last_name: "required",
                    email: {
                         required: true,
                         email: true,
                         remote: {
                              url: base_url + '/user/userAlreadyRegistered',
                              type: "post"
                         }
                    },
                    phone: {
                         number: true
                    },
                    city: "required",
                    address: "required",
                    postcode: "required",
                    country: "required",
                    state: "required",
                    password: {
                         required: true,
                         minlength: 8
                    },
                    password_confirmation: {
                         equalTo: "#password"
                    }
               },
               // Specify the validation error messages
               messages: {
                    first_name: "Please enter your first name",
                    last_name: "Please enter your last name",
                    email: {
                         required: "Please enter email",
                         email: "Please enter valid email",
                         remote: "User already registered"
                    },
                    phone: "Please enter phone number",
                    city: "Please enter city",
                    address: "Please enter address",
                    postcode: "Please enter postcode",
                    country: "Please select country",
                    state: "Please select country"
               },
               submitHandler: function (form) {
                    $.ajax({
                         type: "POST",
                         url: "<?php echo site_url('user/doRegister'); ?>",
                         data: $(form).serialize(),
                         dataType: "json",
                         success: function (res) {
                              messageBox(res);
                              $(form)[0].reset();
                         }
                    });
               }
          });
     });
</script>
<!--CONTACT-->
<div id="sectionb_wrapper">
     <div id="sectionb_inner">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;">Register </a></li>
               </ul>
          </div><!--inner_breadcombmenu-->
          <h1>Create an Account  </h1>
          <div style="clear:both"></div>
     </div><!--sectionb_inner-->
</div><!--sectionb_wrapper-->
<!--INNER-->
<div id="contentmatter_wrapper" style="background:url(images/contactbuilging.jpg) repeat-x left bottom; padding-bottom:100px;">
     <div id="contactform_inner">
          <p>Why register with General Tech Services? By creating an account with us, you will always be able to see the 
               best price available to you, complete your order online, view and track your orders in your account and more. 
               You can also update your communication preferences about whether to receive notifications on specials, new products, 
               webinars and white papers, and so much more. Registration is easy. Just click the Create Account button and you'll be on your way in moments.</p>
          <h3> Personal Information</h3>
          <div id="formbg">
               <form method="post" name="frmRegister" id="frmRegister"  action=""  enctype="multipart/form-data">
                    <div class="field_label">
                         First Name <strong>*</strong>
                         <input name="first_name" id="first_name" type="text" class="inputf"/>
                    </div> 
                    <div class="field_label">
                         Last Name <strong>*</strong>
                         <input name="last_name" id="last_name" type="text" class="inputf"/>
                    </div>
                    <div class="field_label">
                         Job Title 
                         <input name="job_title" id="job_title" type="text" class="inputf" />
                    </div>
                    <div class="field_label">
                         Email Address  <strong>*</strong>
                         <input name="email" id="email" type="text" class="inputf" />
                    </div>
                    <div class="field_label">
                         Telephone
                         <input name="phone" id="phone" type="text" class="inputf" />
                    </div>
                    <h3> Address Information</h3>
                    <div class="field_label" style="width:99.5%;min-height:190px; margin-top:20px;">
                         Address    <strong>*</strong>
                         <textarea name="address" id='address' cols="" rows="" class="inputtextarea"  ></textarea>
                    </div>
                    <div class="field_label">
                         Company
                         <input name="company" id="company" type="text" class="inputf" />
                    </div>
                    <div class="field_label">
                         City  <strong>*</strong>
                         <input name="city" id="city" type="text" class="inputf" />
                    </div>
                    <div class="field_label">
                         State/Province <strong>*</strong>
                         <span class="css4-metro-dropdown" style="width:100%;">
                              <select name="state" id="state">
                                   <option value="">Please select region, state or province</option>
                                   <?php foreach (get_state_province() as $key => $value) { ?>
                                          <option value="<?php echo $value['id'] ?>"><?php echo $value['stat_long_name'] ?></option>
                                     <?php } ?>
                              </select>
                         </span>
                    </div>
                    <div class="field_label">
                         Zip/Postal Code <strong>*</strong>
                         <input name="postcode" id="postcode" type="text" class="inputf" />
                    </div>
                    <div class="field_label">
                         Country  <strong>*</strong>
                         <span class="css4-metro-dropdown" style="width:100%;">
                              <select name="country">
                                   <option class="" value="">Please Select Country</option>
                                   <?php foreach (get_country_list() as $key => $value) { ?>
                                          <option value="<?php echo $value['ctr_id'] ?>"><?php echo $value['ctr_country'] ?></option>
                                     <?php } ?>
                              </select>
                         </span>
                    </div>
                    <h3 style="margin-bottom:20px;"> Login Information</h3>
                    <div class="field_label">
                         Password <strong>*</strong>
                         <input name="password" id="password" type="password" class="inputf" />
                    </div>
                    <div class="field_label">
                         Confirm Password <strong>*</strong>
                         <input name="password_confirmation" id="password_confirmation" type="password" class="inputf" />
                    </div>
                    <input type="submit" name="" value="Submit" class="form_btn">
               </form>
          </div><!--formbg-->
          <div style="clear:both"></div>
     </div><!--contentcart_inner-->
</div><!--contentmatter_wrapper-->