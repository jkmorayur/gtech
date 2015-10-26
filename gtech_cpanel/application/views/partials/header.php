<!DOCTYPE html>
<html>
     <head>
          <meta charset="UTF-8">
          <title>Cpanel</title>
          <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
          <!--           Bootstrap 3.3.2 -->
          <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />    
          <!--           FontAwesome 4.3.0 -->
          <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
          <!--           Ionicons 2.0.0 -->
          <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
          <!--           Theme style -->
          <link href="<?php echo base_url('assets/css/cpanel.min.css'); ?>" rel="stylesheet" type="text/css" />
          <!--           AdminLTE Skins. Choose a skin from the css/skins 
                         folder instead of downloading all of them to reduce the load. -->
          <link href="<?php echo base_url('assets/css/_all-skins.min.css'); ?>" rel="stylesheet" type="text/css" />
          <!--           iCheck -->
          <link href="<?php echo base_url('assets/css/blue.css'); ?>" rel="stylesheet" type="text/css" />
          <!--           Morris chart -->
          <link href="<?php echo base_url('assets/css/morris.css'); ?>" rel="stylesheet" type="text/css" />
          <!--           jvectormap -->
          <link href="<?php echo base_url('assets/css/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet" type="text/css" />
          <!--           Date Picker -->
          <link href="<?php echo base_url('assets/css/datepicker3.css'); ?>" rel="stylesheet" type="text/css" />
          <!--           Daterange picker -->
          <link href="<?php echo base_url('assets/css/daterangepicker-bs3.css'); ?>" rel="stylesheet" type="text/css" />
          <!--           bootstrap wysihtml5 - text editor -->
          <link href="<?php echo base_url('assets/css/bootstrap3-wysihtml5.min.css'); ?>" rel="stylesheet" type="text/css" />
          
          <base href="<?php echo base_url('assets/'); ?>/">
          <link href="css/style.css" rel="stylesheet" type="text/css" />
          <link href="wysiwyg/css/froala_editor.min.css" rel="stylesheet" type="text/css" />
          <link href="wysiwyg/css/froala_style.min.css" rel="stylesheet" type="text/css" />
          <link href="datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
          
          <!-- crop -->
          <link href="jcrop/css/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />
          <!-- crop -->
          <!-- datetime -->
          <link rel="stylesheet" href="css/datepicker.css">
          
          <script type="text/javascript">
               var base_url = "<?php echo site_url(); ?>";
               var none_image = "<?php echo $this->config->item('none_image'); ?>";
          </script>
     </head>
     <body class="skin-blue">
          
          <div class="wrapper">
               <header class="main-header">
                    <!-- Logo -->
                    <a href="javascript:void(0);" class="logo"><b>CPANEL</b></a>
                    <!-- Header Navbar: style can be found in header.less -->
                    <nav class="navbar navbar-static-top" role="navigation">
                         <!-- Sidebar toggle button-->
                         <a href="javascript:void(0);" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                              <span class="sr-only">Toggle navigation</span>
                         </a>
                         <div class="navbar-custom-menu">
                              <ul class="nav navbar-nav">
                                   <li class="dropdown user user-menu">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                             <img src="images/user2-160x160.jpg" class="user-image" alt="User Image"/>
                                             <span class="hidden-xs">
                                                  <?php
                                                    echo isset($this->ion_auth->user()->row()->username) ?
                                                            $this->ion_auth->user()->row()->username : '';
                                                   ?>
                                             </span>
                                        </a>
                                        <ul class="dropdown-menu">
                                             <!-- User image -->
                                             <li class="user-header">
                                                  <img src="images/user2-160x160.jpg" class="img-circle" alt="User Image" />
<!--                                                  <p>
                                                       Alexander Pierce - Web Developer
                                                       <small>Member since Nov. 2012</small>
                                                  </p>-->
                                             </li>
                                             <!-- Menu Body -->
                                             <li class="user-footer">
                                                  <div class="pull-left">
                                                       <a href="javascript:void(0);" class="btn btn-default btn-flat">Profile</a>
                                                  </div>
                                                  <div class="pull-right">
                                                       <a href="<?php echo site_url('user/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                                  </div>
                                             </li>
                                        </ul>
                                   </li>
                              </ul>
                         </div>
                    </nav>
               </header>
               
               <aside class="main-sidebar">
                    <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">
                         <!-- sidebar menu: : style can be found in sidebar.less -->
                         <ul class="sidebar-menu">
                              
                              <li class="treeview">
                                   <a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                              </li>
                              <!-- Product -->
                              <li class="<?php echo ($controller == 'product') ? 'active' : ''; ?> treeview">
                                   <a href="javascript:void(0);">
                                        <i class="fa fa-edit"></i> <span>Product</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                   </a>
                                   <ul class="treeview-menu">
                                        <li class="<?php echo ($method == 'index' || $method == 'list') ? 'active' : ''; ?>"><a href="<?php echo site_url('product'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
                                        <li class="<?php echo ($method == 'add') ? 'active' : ''; ?>"><a href="<?php echo site_url('product/add'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
                                        <li class="<?php echo ($method == 'import') ? 'active' : ''; ?>"><a href="<?php echo site_url('product/import'); ?>"><i class="fa fa-circle-o"></i> Import</a></li>
                                   </ul>
                              </li>
                              <!-- Category -->
                              <li class="<?php echo ($controller == 'category') ? 'active' : ''; ?> treeview">
                                   <a href="javascript:void(0);">
                                        <i class="fa fa-edit"></i> <span>Category</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                   </a>
                                   <ul class="treeview-menu">
                                        <li class="<?php echo ($method == 'index' || $method == 'list') ? 'active' : ''; ?>"><a href="<?php echo site_url('category'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
                                        <li class="<?php echo ($method == 'add') ? 'active' : ''; ?>"><a href="<?php echo site_url('category/add'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
                                   </ul>
                              </li>
                              
                              <!-- Brand -->
                              <li class="<?php echo ($controller == 'brand') ? 'active' : ''; ?> treeview">
                                   <a href="javascript:void(0);">
                                        <i class="fa fa-edit"></i> <span>Brand</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                   </a>
                                   <ul class="treeview-menu">
                                        <li class="<?php echo ($method == 'index' || $method == 'list') ? 'active' : ''; ?>"><a href="<?php echo site_url('brand'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
                                        <li class="<?php echo ($method == 'add') ? 'active' : ''; ?>"><a href="<?php echo site_url('brand/add'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
                                   </ul>
                              </li>
                              <!-- calibration -->
                              <li class="<?php echo ($controller == 'calibration') ? 'active' : ''; ?> treeview">
                                   <a href="javascript:void(0);">
                                        <i class="fa fa-edit"></i> <span>Calibration</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                   </a>
                                   <ul class="treeview-menu">
                                        <li class="<?php echo ($method == 'index' || $method == 'list') ? 'active' : ''; ?>"><a href="<?php echo site_url('calibration'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
                                        <li class="<?php echo ($method == 'add') ? 'active' : ''; ?>"><a href="<?php echo site_url('calibration/add'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
                                        <li class="<?php echo ($method == 'calibration_service') ? 'active' : ''; ?>"><a href="<?php echo site_url('calibration/calibration_service'); ?>"><i class="fa fa-circle-o"></i> Calibration Service</a></li>
                                        <li class="<?php echo ($method == 'add_calibration_service') ? 'active' : ''; ?>"><a href="<?php echo site_url('calibration/add_calibration_service'); ?>"><i class="fa fa-circle-o"></i> Add Calibration Service</a></li>
                                   </ul>
                              </li>
                              <!-- order -->
                              <li class="<?php echo ($controller == 'order') ? 'active' : ''; ?> treeview">
                                   <a href="#">
                                        <i class="fa fa-edit"></i> <span>Order</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                   </a>
                                   <ul class="treeview-menu">
                                        <li class="<?php echo ($method == 'index') ? 'active' : ''; ?>"><a href="<?php echo site_url('order'); ?>"><i class="fa fa-circle-o"></i> List Orders</a></li>
                                   </ul>
                              </li>
                              <!-- news and events -->
                              <li class="<?php echo ($controller == 'news_and_events') ? 'active' : ''; ?> treeview">
                                   <a href="#">
                                        <i class="fa fa-edit"></i> <span>News and events</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                   </a>
                                   <ul class="treeview-menu">
                                        <li class="<?php echo ($method == 'index' || $method == 'list') ? 'active' : ''; ?>"><a href="<?php echo site_url('news_and_events'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
                                        <li class="<?php echo ($method == 'add') ? 'active' : ''; ?>"><a href="<?php echo site_url('news_and_events/add'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
                                   </ul>
                              </li>
                         </ul>
                    </section>
                    <!-- /.sidebar -->
               </aside>
               <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                         <h1>
                              <?php echo 'General Tech'; ?>
                              <small>Control panel</small>
                         </h1>
                         <ol class="breadcrumb">
                              <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                              <li class="active"><?php echo ucfirst($controller); ?></li>
                              <?php if($method != 'index') { ?>
                              <li class="active"><?php echo ucfirst($method); ?></li>
                              <?php } ?>
                         </ol>
                    </section>
