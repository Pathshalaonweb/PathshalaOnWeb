<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo theme_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo theme_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
         <link href="<?php echo theme_url();?>css/ak.css" rel="stylesheet" type="text/css" />
         <link href="<?php echo theme_url();?>css/style1.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo theme_url();?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/developers/css/my.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
		<div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 col-sm-offset-2 text">
                            <center>
                           <a href="<?php echo base_url();?>" ><img src="<?php echo theme_url();?>img/logo.png" style="width:200px;" class="img-responsive"/ ></a>
						   </center>
                        </div>
                    </div>
                    <div class="row">
						<div class="col-sm-3"></div>
                        <div class="col-sm-5">
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login to our site</h3>
	                            		<p>Enter username and password to log on:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
									<?php error_message(); ?>
									<?php echo form_open('users/login','class="form-horizontal" role="form"'); ?>
									<div class="input-group mb10">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="user_name" value="" placeholder="username or email">                                        
                                    </div>
									<div class="input-group mb10">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
									<div style="margin-top:10px" class="form-group">
										<!-- Button -->
										<div class="col-sm-12 controls">
											<input type="submit" name="sub" value="Login" class="btn btn-warning">
											<!--  <a id="btn-login" href="#" class="btn btn-warning">Login  </a>-->
											<a href="<?php echo base_url();?>users/register/" class="fr">Register</a>
										</div>
									</div>
									<?php echo form_close();?>
			                    </div>
		                    </div>
                        </div>
                    </div>
                </div> 
            </div>
		</div>
       <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo theme_url();?>js/bootstrap.min.js" type="text/javascript"></script>        
		<!--<script type = 'text/javascript'>
		function gettown(DistrictId)
		{
			var strUrl = '<?php //echo base_url(); ?>users/ajaxgettown/';
				
			$.ajax({
				 url:'<?php //echo base_url(); ?>users/ajaxgettown/',
				 type:'post',
				 data:'data='+DistrictId,
				 success:function(data)
				 {
					 $('#subdiv').html(data);
					  //alert(data);
				 }
			});
		}
		</script>-->
    </body>
</html>