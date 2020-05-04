<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php  echo $this->config->item("site_admin"); ?></title>
    <script type="text/javascript" > var site_url = '<?php echo site_url();?>';</script>


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/developers/css/proj.css" />  

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/adminzone/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/adminzone/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/adminzone/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url(); ?>assets/adminzone/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/adminzone/build/css/custom.min.css" rel="stylesheet">
    
  </head>

  <body class="login">
    <div>
    
<?php if( validation_errors() ){
?>
<div class="warning" style="padding: 0px;">
<div style="margin-left: 50px; padding: 1px">
<?php echo validation_errors(); ?>
</div>
</div>
<?php }
$atts = array(
'width'      => '650',
'height'     => '400',
'scrollbars' => 'yes',
'status'     => 'yes',
'resizable'  => 'yes',
'screenx'    => '0',
'screeny'    => '0'
);
?>
    
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php echo form_open('adminzone/auth'); ?>
            <h1>Login</h1>
              <h1><i class="fa fa-paw"></i> <?php  echo $this->config->item("site_admin"); ?> !
			 </h1>
              <?php  echo error_message();?>
              <div>
                <input type="text" name="username" value="" placeholder="Username" class="form-control" />
              </div>
              <div>
              <input type="password" name="password" value="" placeholder="Password" class="form-control" />
                
              </div>
              <div>
                <input type="hidden" value="login" name="action"> 
                <input type="submit" name="sss" value="Log in"  class="btn btn-default submit" />
                
                <a class="reset_pass" href="#">Lost your password?</a>     
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                

                <div>
                 <p>©2019 All Rights Reserved <?php  echo $this->config->item("site_admin"); ?>.</p>
                </div>
              </div>
            <?php echo form_close(); ?>
          </section>
        </div>

        
      </div>
	  
	  
    </div>
  </body>
</html>