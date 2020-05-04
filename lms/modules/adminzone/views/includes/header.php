<!DOCTYPE html>

<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<!-- Meta, title, CSS, favicons, etc. -->

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
<?php  echo $this->config->item("site_admin"); ?>
</title>
<script type="text/javascript" > var site_url = '<?php echo site_url();?>';</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/developers/css/proj.css" />

<!-- Bootstrap -->

<link href="<?php echo base_url(); ?>assets/adminzone/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->

<link href="<?php echo base_url(); ?>assets/adminzone/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<!-- NProgress -->

<link href="<?php echo base_url(); ?>assets/adminzone/vendors/nprogress/nprogress.css" rel="stylesheet">

<!-- iCheck -->

<link href="<?php echo base_url(); ?>assets/adminzone/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

<!-- bootstrap-progressbar -->

<link href="<?php echo base_url(); ?>assets/adminzone/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

<!-- JQVMap -->

<link href="<?php echo base_url(); ?>assets/adminzone/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

<!-- bootstrap-daterangepicker -->

<link href="<?php echo base_url(); ?>assets/adminzone/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<!-- Custom Theme Style -->

<link href="<?php echo base_url(); ?>assets/adminzone/build/css/custom.min.css" rel="stylesheet">

<!-- Datatables -->

<link href="<?php echo base_url(); ?>assets/adminzone/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/adminzone/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/adminzone/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/adminzone/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/adminzone/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<!-- Custom Theme Style -->

<link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
<div class="main_container">
<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;"> <a href="<?php echo site_url();?>adminzone/dashbord/" class="site_title"><i class="fa fa-paw"></i> <span>
      <?php  echo $this->config->item("site_admin"); ?>
      !</span></a> </div>
    <div class="clearfix"></div>
    
    <!-- sidebar menu -->
    
    <?php $this->load->view('includes/sidebar'); ?>
    
    <!-- /sidebar menu --> 
    
    <!-- /menu footer buttons -->
    
    <div class="sidebar-footer hidden-small"> <a data-toggle="tooltip" data-placement="top" title="Settings" href="<?php echo site_url();?>adminzone/setting/"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a> <a data-toggle="tooltip" data-placement="top" title="Dashboard" href="<?php echo site_url();?>adminzone/"> <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span> </a> <a data-toggle="tooltip" data-placement="top" title="Home" href="<?php echo site_url();?>"> <span class="glyphicon glyphicon-home" aria-hidden="true" ></span> </a> <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo site_url();?>adminzone/logout"> <span class="glyphicon glyphicon-off" aria-hidden="true"></span> </a> </div>
    
    <!-- /menu footer buttons --> 
    
  </div>
</div>

<!-- top navigation -->

<?php $this->load->view('includes/face_header'); ?>

<!-- /top navigation -->