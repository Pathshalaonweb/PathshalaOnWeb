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
                      
                        <div class="col-sm-4"></div>
                        	
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Assess Your Level</h3>
	                            		<p>Fill in the form below to get instant access:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
	                           
								<form method="post" class="form-horizontal"  role="form" >
                                     <div class="row">
                                    <div class="col-sm-6">        
                                   			 <div class="input-group mb10">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                         <input id="login-username" type="text" class="form-control" name="name" value="<?php echo set_value('name');?>" placeholder="Name">
                                          </div>
<span style="color: red;"><?php echo form_error('name'); ?></span> 
                                    </div>
                                    
                                    <div class="col-sm-6">        
                                   			 <div class="input-group mb10">
                               <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                       <input id="login-username" type="email" class="form-control" name="email" value="<?php echo set_value('email');?>" placeholder="Email">			   
		</div>
<span style="color: red;"><?php echo form_error('email'); ?></span>                                      
                             </div>
                                    </div>
                                    <div class="row">
			<div class="col-sm-6">        
				<div class="input-group mb10">
				<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
				<input id="login-username" type="text" maxlength="10" class="form-control" name="mobile_no" value="<?php echo set_value('mobile_no');?>" placeholder="Mobile No">                 
				</div><span style="color: red;"><?php echo form_error('mobile_no'); ?></span>                       
			</div>
			
				
			<div class="col-sm-6">        
				<div class="input-group mb10">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input id="login-username" type="text"  class="form-control" name="location" value="<?php echo set_value('location');?>" placeholder="City">
		                                        
				</div><span style="color: red;"><?php echo form_error('location'); ?></span>
			</div>
			</div>
			
	
				<div class="row">
				<div class="col-sm-12">        
				 <div class="input-group mb10">
						<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
						<textarea type="address" placeholder="Message" name="message" style="width:100%"></textarea>
			                          
					</div>
					<span style="color: red;"><?php echo form_error('message'); ?></span>
			</div>
				</div>
				
			

			<div style="margin-top:10px" class="form-group">
				<div class="col-sm-12 text-center">
				 <input type="submit" name="enquery" value="Assess Your Level" class="btn btn-warning">
				</div>
			</div>
                         </form>    
                                </div>
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
<script type = 'text/javascript'>
   function gettown(DistrictId)
   {

            //  alert(DistrictId);
			var strUrl = '<?php echo base_url(); ?>users/ajaxgettown/';
			//alert(strUrl);
			            $.ajax({
                             url:'<?php echo base_url(); ?>users/ajaxgettown/',
                             type:'post',
                             data:'data='+DistrictId,
                             success:function(data)
                             {

                                 $('#subdiv').html(data);
                                  //alert(data);
                             }
                        });

  }
  
  
</script>

    </body>
</html>