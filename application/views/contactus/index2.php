<script src="scripts/jquery-1.11.2.min.js"></script>
<script src="scripts/jquery.validate.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
     $(function() {
  
          $("#register-form").validate({
    
               // Specify the validation rules
               rules: {
                    firstname: "required",
                    lastname: "required",
                    email: {
                         required: true,
                         email: true
                    },
                    phone : "required",
                    company : "required",
                    subject : "required",
                    message : "required"
               },
        
               // Specify the validation error messages
               messages: {
                    firstname: "Please enter your first name",
                    lastname: "Please enter your last name",
                    email: "Please enter a valid email address",
                    phone : "Please enter phone number",
                    company : "Please enter company",
                    subject : "Please enter subject",
                    message : "Please enter message"
               },
        
               submitHandler: function(form) {
                    $.ajax({
                         type : "POST",
                         url : "<?php echo site_url('contactus/sendmail'); ?>",
                         data : $(form).serialize(),
                         dataType : "json",
                         success : function(res) {
                              $('.message').html(res.status);
                         }
                    });
               }
          });
     });
</script>
<style>
     #contactform_inner label.error {
          color: #F00;
          font-size: 11px;
		  font-weight:normal;
		  margin:0px;
     }
	 
</style>
<div id="sectionb_wrapper">
     <div id="sectionb_inner">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;"> Contact Us </a></li>
               </ul>
          </div>
          <h1>CONTACT US</h1>
          <div style="clear:both"></div>
     </div>
</div>
<div id="contact_wrapper">
     <div id="contact_inner">

          <div class="contact_addressbg">
               <img src="images/locationicon_1.png" >
               <h1>Head Office</h1>
               <p>General Tech Services L.L.C <br>
                    P.O. Box: 25898<br>
                    Email : gentech@eim.ae<br>
                    Tel : +971 (0) 6 543 6933<br>
                    Fax : +971 (0) 6 543 7077<br></p>
               <a class="md-trigger viewmap" data-modal="modal-1"> <img src="images/plus.png" style="margin:-4px 5px 0 0;" > VIEW GOOGLE MAP  </a>
               <div class="md-modal md-effect-1" id="modal-1">
                    <div class="md-content">
                         <a class="md-close close">X</a>
                         <div>
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.626721456618!2d55.34162699286805!3d25.249494607584356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5d193a4a39d1%3A0xf8e6f2da2dfcffe8!2sGGICO!5e0!3m2!1sen!2sin!4v1436872055280" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                         </div>
                    </div>
               </div>
               <div class="md-overlay"></div>
          </div>

          <div class="contact_addressbg addboxmargin">
               <img src="images/locationicon_2.png" >
               <h1>UAE Branch Office</h1>
               <p>Abu Dhabi, UAE<br>
                    P.O. Box: 93275<br>
                    Tel : +971 (0) 2 550 7702<br>
                    Fax : +971 (0) 2 550 7706</p>
               <a class="md-trigger viewmap map_color" data-modal="modal-2"> <img src="images/plus.png" style="margin:-4px 5px 0 0;" > VIEW GOOGLE MAP </a>
               <div class="md-modal md-effect-1" id="modal-2">
                    <div class="md-content">
                         <a class="md-close close">X</a>
                         <div>
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.626721456618!2d55.34162699286805!3d25.249494607584356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5d193a4a39d1%3A0xf8e6f2da2dfcffe8!2sGGICO!5e0!3m2!1sen!2sin!4v1436872055280" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                         </div>
                    </div>
               </div>
               <div class="md-overlay"></div><!-- the overlay element -->

          </div><!--contact_addressbg-->


          <div class="contact_addressbg">
               <img src="images/locationicon_3.png" >
               <h1>Saudi Office</h1>
               <p>BK General Tech Services Est.<br>
                    Al Rabie Dist, Dammam - 31423<br>
                    P.O. Box: 9559<br>
                    Email : sales@generaltechsaudi.com<br>
                    Tel : +966 (0) 3 834 4264<br>
                    Fax : +966 3 834 4538</p>
               <a class="md-trigger viewmap map_color2" data-modal="modal-2"> <img src="images/plus.png" style="margin:-4px 5px 0 0;" > VIEW GOOGLE MAP </a>
               <div class="md-modal md-effect-1" id="modal-2">
                    <div class="md-content">
                         <a class="md-close close">X</a>
                         <div>
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.626721456618!2d55.34162699286805!3d25.249494607584356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5d193a4a39d1%3A0xf8e6f2da2dfcffe8!2sGGICO!5e0!3m2!1sen!2sin!4v1436872055280" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                         </div>
                    </div>
               </div>
               <div class="md-overlay"></div><!-- the overlay element -->
          </div><!--contact_addressbg-->
          <div style="clear:both"></div>
     </div><!--contact_inner-->
</div><!--contact_wrapper-->

<!--FORM-->
<div id="contactform_wrapper">
     <div id="contactform_inner">

          <h1>Contact Form</h1>
          <p>Please complete the information below and provide your comments or question. We will forward your request to the correct department or representative to assist you appropriately. You should expect a response within one business day. Thank you for choosing General tech.</p>
          <div id="formbg">

               <form method="post" name="form1" id="register-form" novalidate="novalidate"  action=""  enctype="multipart/form-data">
                    <div class="field_label">
                         First Name <strong>*</strong>
                         <input name="firstname" id="firstname" type="text" class="inputf"/>
                    </div>

                    <div class="field_label">
                         Last Name <strong>*</strong>
                         <input name="lastname" id="lastname" type="text" class="inputf"/>
                    </div>

                    <div class="field_label">
                         email  <strong>*</strong>
                         <input name="email" id="name" type="text" class="inputf"/>
                    </div>

                    <div class="field_label">
                         Phone  <strong>*</strong>
                         <input name="phone" id="phone" type="text" class="inputf"/>
                    </div>

                    <div class="field_label">
                         Company <strong>*</strong>
                         <input name="company" id="company" type="text" class="inputf"/>
                    </div>

                    <div class="field_label">
                         Subject   <strong>*</strong>
                         <input name="subject" id="subject" type="text" class="inputf"/>
                    </div>

                    <div class="field_label" style="width:98%;">
                         Question or Comments  <strong>*</strong>
                         <textarea  name="message" id='message' cols="" rows="" class="inputtextarea"></textarea>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LdTfwMTAAAAAAZPOTs0FUVxshgc7LevX6QtRHL_"></div>
                    <div class="message" style="color: #000;"></div>
                    <input type="submit" name="send" value="Submit" class="form_btn" >
               </form>
          </div><!--formbg-->
          <div style="clear:both"></div>
     </div><!--contact_inner-->
</div><!--contactform_wrapper-->

<script src="scripts/classie.js"></script>
<script src="scripts/modalEffects.js"></script>