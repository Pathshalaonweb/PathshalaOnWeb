<?php
function validation_message($style="")// by default On Page - set 'alert' for pop-up
{	
  
	$processing_result=validation_errors();
	
	if($processing_result!='')
	{	
	
	   if($style=="alert")
	   {	   
		  ?>

<div id="alert_box">
  <div class="alert_area">
    <div class="close"> <span onclick="$('#alert_box').fadeOut(100);"; class="txt">Close [x]</span> </div>
    <div style=" width:100%; text-align:left;">
      <?php
	      }
         ?>
      <div class="validation" >
        <div style="margin-bottom:6px;"> <strong><span class="red">ERROR!</span> <br />
          Please correct the invalid enteries in form given below.</strong> </div>
        <div class="validation_msg" ><?php echo $processing_result; ?></div>
      </div>
      <?php 
		
		if($style=="alert")
		{
		  ?>
    </div>
  </div>
</div>
<?php
		}
		
     } 
	 
 }
 
 function validation_messages($style="")// by default On Page - set 'alert' for pop-up
{	
  
	$processing_result=validation_errors();
	
	if($processing_result!='')
	{	
	
	   if($style=="alert")
	   {	   
		  ?>
<div id="alert_box">
  <div class="alert_area">
    <div class="close"> <span onclick="$('#alert_box').fadeOut(100);"; class="txt">Close [x]</span> </div>
    <div style=" width:100%; text-align:left;">
      <?php
	      }
         ?>
      <div class="validation" >
        <div style="margin-bottom:6px;"> <strong><span class="red">ERROR!</span> <br />
          Please correct the invalid enteries in form given below.</strong> </div>
        <div class="validation_msg" >
          <?php //echo $processing_result; ?>
        </div>
      </div>
      <?php 
		
		if($style=="alert")
		{
		  ?>
    </div>
  </div>
</div>
<?php
		}
		
     } 
	 
 }
 
 
 
 
 function error_message($style="")// by default On Page - set 'alert' for pop-up
 {  
 
  $CI = &get_instance();
  $msgtype = $CI->session->userdata('msg_type');
  
   if(!empty($msgtype)){	 
    if($style=="alert"){
		 
		  ?>
<div id="alert_box">
  <div class="alert_area">
    <div class="close"> <span onclick="$('#alert_box').fadeOut(100);"; class="txt">Close [x]</span> </div>
    <div style=" width:100%; text-align:left;">
      <?php
	  }
 ?>
      <div class="<?php echo $msgtype;?>" > <?php echo $CI->session->flashdata($msgtype); 
	  		 unset($_SESSION['msg_type']);
	    $CI->session->unset_userdata(array('msg_type'=>0) ); 
		?> </div>
      <?php if($style=="alert")
		{
			
		  ?>
    </div>
  </div>
</div>
<?php
		}
  
    }   
  } 
  
 ?>
