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
                           <img src="<?php echo theme_url();?>img/logo.png" style="width:200px;" class="img-responsive"/ >
						   </center>
                        </div>
                    </div>
                    <div class="row">
					<div class="col-sm-3"></div>
						<div class="col-sm-5">
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sign up now</h3>
	                            		<p>Fill in the form below to get instant access:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
								<?php //validation_message();?>
								<?php error_message(); ?>
	                            <?php echo form_open('users/register','class="form-horizontal" role="form"'); ?>
				                  
                                    <div class="row">
										<div class="col-sm-6">        
                                   			<div class="input-group mb10">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input id="login-username" type="text" class="form-control" name="name" value="<?php echo set_value('name');?>" placeholder="name">  
												                                      
                                            </div>
											<span style="color:red;"><?php echo form_error('name'); ?></span>
										</div>
                                    
										<div class="col-sm-6">        
                                   			<div class="input-group mb10">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                <input id="login-username" type="email" class="form-control" name="user_name" value="<?php echo set_value('user_name');?>" placeholder="email">                                       
                                            </div>
											<span style="color:red;"><?php echo form_error('user_name'); ?></span>
										</div>
                                    </div>
                                    
                                    <div class="row">
										<div class="col-sm-6">    
											<div class="input-group mb10">
												<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
												<input id="login-password" type="password" class="form-control" name="password" placeholder="password">
											</div>
											<span style="color:red;"><?php echo form_error('password'); ?></span>
										</div>
										<div class="col-sm-6">    
											<div class="input-group mb10">
												<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
												<input id="login-password" type="password" class="form-control" name="confirm" placeholder="password">
											</div>
											<span style="color:red;"><?php echo form_error('confirm'); ?></span>
										</div>
									</div>     
									<?php 	
									   $sel_q ="SELECT * FROM `tbl_city` where parent_id='0'";
									   $city_res=$this->db->query($sel_q);
										  if($city_res->num_rows() > 0)
									   {
										$list_city=$city_res->result_array();
									   }
									?>	
                                    <div class="row">
										<div class="col-sm-6">    
											<div class="input-group mb10">
												<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
												<select class="form-control" name="state" onChange="gettown(this.value);">
													<option>State</option>
													<?php foreach($list_city as $city) {?>
													<option id="<?php echo $city['category_id'];?>" value="<?php echo $city['category_id'];?>"><?php echo ucfirst($city['category_name']);?></option>
													<?php }?>
												</select>
											</div>
											<span style="color:red;"><?php echo form_error('state'); ?></span>
										</div>
										<div class="col-sm-6">    
											<div class="input-group mb10">
												<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
												<select class="form-control" name="city" id="subdiv">
												<option>Select City</option>
                                           
												</select>
											</div>
											<span style="color:red;"><?php echo form_error('city'); ?></span>
										</div>
									</div>      
                                    <div class="row">
										<div class="col-sm-6">        
                                   			<div class="input-group mb10">
												<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
												<input id="login-username" type="text" maxlength="10" class="form-control" name="mob_no" value="<?php echo set_value('mob_no');?>" placeholder="mobile no">                                        
                                            </div>
											<span style="color:red;"><?php echo form_error('mob_no'); ?></span>
										</div>
										<?php 
											$sel_q ="SELECT * FROM `tbl_department` where parent_id='0'";
											$dept_res=$this->db->query($sel_q);
											if($dept_res->num_rows() > 0)
											{
												$list_dept=$dept_res->result_array();
											}	
										?>	
										<div class="col-sm-6">        
                                   			<div class="input-group mb10">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                                               <select class="js-example-placeholder-multiple js-states form-control" multiple="multiple" name="lot[]">
												<option value="">Select Course</option>
													<?php foreach($list_dept as $dept) {?>
													<option value='<?php echo $dept['category_id'];?>'><?php echo $dept['category_name'];?></option>
												<?php }?>
												</select>                          
                                            </div>
											<span style="color:red;"><?php echo form_error('lot'); ?></span>
										</div>
                                    </div>
									<div style="margin-top:10px" class="form-group">
										<div class="col-sm-12 text-center">
											<input type="submit" name="sub" value="Registration" class="btn btn-warning">
											<a href="<?php echo base_url();?>users/login/" class="fr">Login</a>
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
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    
     <script>
	 
	$(".js-example-placeholder-multiple").select2({
    placeholder: "Select a Name"
});

$(".js-example-basic-single").select2({
    placeholder: "Select a Project"
});


 $(function() {
    $( "#datepicker" ).datepicker({ minDate: 0});
  });
  
  
  $( function() {
    $( "#datepicker1" ).datepicker();
  } );


	 </script>         