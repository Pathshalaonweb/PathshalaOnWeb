<?php $this->load->view("top_application");?>


<section id="main">
  <div class="container">
  <div class="row">
  <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    		<div class="text-center"><h4 class="ffb brown">Forgot Password</h4></div>


<?php echo form_open('users/forgotten_password/');?>
   <?php   //echo validation_message();?>

<div class="input-group mb10">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="ENTER YOUR EMAIL ID *">  
                                                                        
                                    </div>
                                    <div class="input-group mb10">
                                      <?php
										echo error_message();
										echo form_error('email');?>    
	  </div>
 <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12  controls">
                                 <input type="hidden" name="forgotme" value="yes" />

                
                <input type="submit" id="loginsubmit" class="btn" name="submit" value="Submit" />
                                   


                                    </div>
                                </div>


<?php echo  form_close(); ?>


 </div>
       
	
  </div>
  </div>
 </section>
  
  
  	
  
  
  </div>
    </div>
<?php $this->load->view("bottom_application");?>