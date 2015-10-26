<div class="box-body">
     <div class="alert alert-danger alert-dismissable error" style="display: none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i><label class="err_msg"></label></h4>
     </div>
     <div class="alert alert-info alert-dismissable alert" style="display: none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-info"></i><label class="err_alt"></label></h4>
     </div>
     <div class="alert alert-warning alert-dismissable info" style="display: none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-warning"></i><label class="err_inf"></label></h4>
     </div>
     <div class="alert alert-success alert-dismissable success" style="display: none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4>	<i class="icon fa fa-check"></i><label class="sus_msg"></label></h4>
     </div>
</div>

<?php if ($alert = $this->session->flashdata('app_alert')): ?>
       <div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><?php echo $alert ?></div>
  <?php endif ?>

<?php if ($error = $this->session->flashdata('app_error')): ?>
       <div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><?php echo $error ?></div>
  <?php endif ?>

<?php if ($success = $this->session->flashdata('app_success')): ?>
       <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>	<i class="icon fa fa-check"></i><label class="sus_msg"><?php echo $success ?></label></h4>
       </div>
<?php endif ?>

<?php if ($info = $this->session->flashdata('app_info')): ?>
       <div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><?php echo $info ?></div>
<?php endif ?>