<style type="text/css">
	.err_login{
		color:#F00;
		font-size:14px;
		font-family: 'PT Sans', sans-serif;
		padding-bottom:10px;
		background:url(images/icon_error.png) no-repeat top 5px left;
		padding-left:20px;
                display: none;
	}
</style>


<script src="scripts/jquery-1.11.2.min.js"></script>
<script src="scripts/jquery.validate.min.js"></script>
<script>
     $(function () {
          $("#frmLogin").validate({
               submitHandler: function (form) {
                    $.ajax({
                         type: "POST",
                         url: "<?php echo site_url('user/doLogin'); ?>",
                         data: $(form).serialize(),
                         dataType: "json",
                         success: function (res) {
                              if(res.status == 'failed') {
                                   $('.err_login').show();
                                   $('.err_login').html(res.msg);
                              } else {
                                   window.location = base_url + "/user/successLogin";
                              }
                         }
                    });
               }
          });
     });
</script><!--CONTACT-->
<div id="sectionb_wrapper">
     <div id="sectionb_inner">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;">Login </a></li>
               </ul>
          </div><!--inner_breadcombmenu-->
          <h1>Login or Create an Account  </h1>
          <div style="clear:both"></div>
     </div><!--sectionb_inner-->
</div><!--sectionb_wrapper-->
<!--INNER-->
<div id="contentmatter_wrapper" style="background:url(images/contactbuilging.jpg) repeat-x left bottom; padding-bottom:100px;">
     <div id="contentcart_inner">
          <div id="login_inner">
               <div class="login_customersbg">
                    <h1>NEW CUSTOMERS </h1>
                    <p> Why register with General Tech Services? By creating an account with us, you will always be able to see the best price available to you, complete your order online, view and track your orders in your account and more. You can also update your communication preferences about whether to receive notifications on specials, new products, webinars and white papers, and so much more. Registration is easy. Just click the Create Account button and you’ll be on your way in moments.</p>
                    <a href="<?php echo site_url('user/register'); ?>" class="createacc"> Create an Account</a>
                    <div style="clear:both"></div>
               </div><!--login_customersbg-->
               
               <div class="login_or"></div>
               
               <div class="login_loginbg">
                    <h1>REGISTERED CUSTOMERS</h1>
                    <p style="margin-bottom:14px;">If you have an account with us, please log in.</p>
                    <div class="err_login"></div>
                    
                    <form method="post" name="frmLogin" id="frmLogin">
                         <div class="loginfield">
                              <label>Email Address<strong>*</strong></label>
                              <input  name="username" type="text"  id="username" value=""  class="logininput"/>
                         </div>
                         <div class="loginfield">
                              <label>Password<strong>*</strong> </label>
                              <input name="password" type="password"  id="password" value=""  class="logininput"    />
                         </div>
                         <input type="submit"  id="submit_form"   value="LOGIN" name="submit" class="createacc"  style="margin-top:10px;"  />
                         <a href="<?php echo site_url('user/forgot_password'); ?>" class="cart_multipleaddress" style="float:left; margin-top:10px;">Forgot Your Password? </a>
                    </form>
               </div><!--login_loginbg-->
          </div><!--login_inner-->
          <div style="clear:both"></div>
     </div><!--contentcart_inner-->
</div><!--contentmatter_wrapper-->