<script type="text/javascript">
     $(document).ready(function () {
          $("#frmContactUs").validate({
               rules: {
                    name: {
                         required: true
                    },
                    email: {
                         required: true,
                         email: true
                    },
                    message: {
                         required: true
                    },
                    captcha: {
                         required: true,
                         equalTo: "#valid_captcha"
                    }
               },
               messages:
                       {
                            name: {
                                 required: "<img class='error_img' src='images/unchecked.gif' title='Please enter name'/>"
                            },
                            email: {
                                 required: "<img class='error_img' src='images/unchecked.gif' title='Please enter email'/>",
                                 email: "<img class='error_img' src='images/unchecked.gif' title='Please enter valid email'/>"
                            },
                            message: {
                                 required: "<img class='error_img' src='images/unchecked.gif' title='Please enter message'/>"
                            },
                            captcha: {
                                 required: "<img style='right: -14px;top: 12px;' class='error_img' src='images/unchecked.gif' title='Please enter captcha'/>",
                                 equalTo : "<img style='right: -14px;top: 12px;' class='error_img' src='images/unchecked.gif' title='Wrong captcha'/>",
                            }
                       },
               submitHandler: function (form) {

                    $.ajax({
                         type: 'POST',
                         url: $(form).attr('action'),
                         data: $(form).serialize(),
                         dataType: 'json'
                    })
                            .done(function (response) {
                                 if (response.status == 'success') {
                                      alert('success');
                                 } else {
                                      alert('fail');
                                 }
                            });
                    return false;
               }
          });
     });
</script> 
<style>
     .error_img {
          position: absolute;
          right: 10px;
          top: 23px;
     }	
     .inner_contact_wrapper {
          position: relative;
     }
     .error {
          height: 35px;
     }
</style>
<div id="home_contentrapper">
     <div id="inner_breadcombmenu">
          <ul>
               <li><a href="<?php echo site_url(); ?>"> Home </a></li>
               <li><a href="#"> Contact Us </a></li>
          </ul>
     </div><!--inner_breadcombmenu-->

     <div id="contact_wrapper">

          <h1>Get in Touch</h1>

          <div class="contact_addresswrapper">
               <div class="addressbg" style="border:none;">
                    <h4> <img src="images/locationicon.jpg" alt="" style="margin-right:5px;">Head Office:</h4>
                    <p>General Tech Services L.L.C<br>
                         P.O. Box: 25898<br>
                         Sharjah, U A E<br>
                         Tel: +971 6 5436933<br>
                         Fax: +971 6 5437077<br>
                         Email: gentech@eim.ae<br>
                         Website: www.generaltechuae.com</p>
                    <div style="clear:both"></div>
               </div>

               <div class="addressbg" >
                    <h4><img src="images/locationicon.jpg" alt="" style="margin-right:5px;">Saudi Office:</h4>
                    <p>BK General Tech Services Est.<br>
                         Al Rabie Dist<br>
                         Near Badr Clinic, P.O. Box: 9559<br>
                         Dammam - 31423, Saudi Arabia<br>
                         Tel: +966 3 834 4264<br>
                         Fax: +966 3 834 4538<br>
                         Email: sales@generaltechsaudi.com<br>
                         Website: www.generaltechsaudi.com</p>
                    <div style="clear:both"></div>
               </div>

               <div class="addressbg" style="border:none;">
                    <h4><img src="images/locationicon.jpg" alt="" style="margin-right:5px;">Branch Office:</h4>
                    <p>P.O.Box: 93275<br>
                         Abu Dhabi, U A E<br>
                         Tel: +971 2 5507702<br>
                         Fax: +971 2 5507706</p>
                    <div style="clear:both"></div>
               </div>
               <div style="clear:both"></div>

          </div><!--contact_addresswrapper-->


          <div class="contact_formbg">

               <div class="form_title" style="font-family: PT Sans,sans-serif;"> 
                    Leave us a message
               </div>

               <form action="<?php echo site_url('contactus/sendmail'); ?>" method="post"  name="frmContactUs" id="frmContactUs">
                    <div class="inner_contact_wrapper">
                         <input name="name" type="text"  id="name" value=""  class="inner_contact_input" placeholder="Name*"  />
                         <input name="phone" type="text" id="phone" value=""  class="inner_contact_input"  placeholder="Contact Number" />
                    </div><!-- inner_contact_wrapper-->
                    <div class="inner_contact_wrapper" style="margin-right:0px;">
                         <input name="email" type="text"  id="email" value=""  class="inner_contact_input" placeholder="Eail Address*"  />
                         <input name="phone" type="text" id="phone" value=""  class="inner_contact_input"  placeholder="Subject"  />
                    </div><!-- inner_contact_wrapper-->
                    <div style="width: 100%;position: relative;float: left;display: table;">
                         <textarea style="min-height: 125px;" name="message" id="message" rows="" cols="" placeholder="Message* " class="inner_contact_wrapper_textarea" ></textarea>
                    </div>
                    <div class="inner_contact_wrapper" style="display: inline;">
                         <div>
                              <div class="input-group" style="width: 40%;">
                                   <input type="hidden" name="valid_captcha" id="valid_captcha" value="<?php echo $valid_captcha; ?>"/>
                                   <span class="input-group-addon"><?php echo $valid_captcha; ?></span>
                                   <input style="height:24px;" class="form-control" type="text" placeholder="Captcha" id="captcha" name="captcha">
                              </div>
                         </div>

                         <div id="divMailMessage" style="color: green; width: auto;display: none;">
                              Success!
                         </div>
                    </div>
                    <input type="reset" name="reset_form" id="reset_form" value="Clear" style="margin-left:5px;background:#afafaf;"  class="submit"   />
                    <input type="submit"  id="submit_form"   value="Submit" name="" class="submit"   /> 
               </form> 
          </div><!--contact_formbg-->

          <a class="md-trigger  map_bg" data-modal="modal-1">
               <img src="images/gmap.jpg" alt="" style="height:180px; width:100%;"> 
          </a>

          <div class="md-modal md-effect-1" id="modal-1">
               <div class="md-content">
                    <h3>Google map</h3><a class="md-close close">X</a>

                    <div>

                         <iframe width="100%" height="300" frameborder="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115412.14903479363!2d55.51118484999999!3d25.31664389999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5f5fede7964b%3A0x2a830aa19c1f6d89!2sSharjah+-+United+Arab+Emirates!5e0!3m2!1sen!2sin!4v1432894223996" style="border: 0px currentColor;"></iframe>
                         <div style="clear:both"></div>

                    </div>
               </div>
          </div>
          <div class="md-overlay"></div><!-- the overlay element -->
          <span class="image-block">
               <a class="image-zoom info" href="images/locationmap.jpg" rel="prettyPhoto[gallery]" title="locationmap">
                    <div class="map_bg" style="float:right;"><img src="images/locationmap.jpg" alt="" style="width:100%;"> </div>
               </a></span> 
     </div>
</div><!--contact_wrapper-->
<div style="clear:both"></div>
</div><!--home_contentrapper--> 
<div style="clear:both"></div>
</div><!--welcome_inner-->
</div><!--welcome_wrapper-->
<!-- -->

<script src="scripts/jquery.meanmenu.js"></script> 
<script>
     jQuery(document).ready(function () {
          jQuery('header nav').meanmenu();
     });
</script> 
<script src="scripts/bootstrap.min.js"></script> 
<script src="js/classie.js"></script>
<script src="js/modalEffects.js"></script>
<script>
     var polyfilter_scriptpath = '/js/';
</script>
<script src="js/cssParser.js"></script>
<script src="js/css-filters-polyfill.js"></script> 
<script src="js/jquery.min.js"></script>
<script src="js/jquery.quicksand.js" type="text/javascript"></script>
<script src="js/jquery.easing.js" type="text/javascript"></script>
<!--<script src="js/script.js" type="text/javascript"></script>-->
<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>      
</body>