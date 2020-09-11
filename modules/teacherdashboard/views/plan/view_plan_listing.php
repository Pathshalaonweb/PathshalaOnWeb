<?php $this->load->view("top_application");?>

<div class="breadcrumb-area"> 
  <!--<div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-3 pt-100 pb-95" style="background-image:url(<?php echo theme_url();?>img/bg/breadcrumb-bg-5.jpg);">
        <div class="container">
            <h2>My Account</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .</p>
        </div>
    </div>-->
  <div class="breadcrumb-bottom">
    <div class="container">
      <ul>
        <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-double-right"></i>My Account</span></li>
      </ul>
    </div>
  </div>
</div>
<!-- <div class="event-area my-acc pt-20 pb-130">
  <div class="container">
    <div class="row">
      <?php //$this->load->view("teacher_myaccount_left");?> -->
      <div class="col-12">
      <!-- <h1 style="color:#1b68b5;text-align: center;">Buy Subscription</h1><br><br> -->
        <div class="row" style="margin-bottom:20px;">
         <?php 
	     if( is_array($res) && !empty($res) ) {
		 foreach($res as $catKey=>$pageVal)
		 { 							
		 ?>
          <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3"> 
            
            <!-- PRICE ITEM -->
            <div class="panel price panel-blue">
              <div class="panel-heading arrow_box text-center">
                <h3><?php echo $pageVal['name']?></h3>
              </div>
              <div class="panel-body text-center">
                <p class="lead"><strong>Rs .<?php echo $pageVal['price']?>  </strong></p>
                <p class="lead"><?php echo $pageVal['validity']?> month</p>
                 <p class="lead"><?php echo $pageVal['credit_point']?> Credit Point</p>
              </div>
              <p style="">
              	<?php echo $pageVal['detail'];?>
              </p>
			  <?php /*?><ul class="list-group list-group-flush text-center">
               <li class="list-group-item"><i class="fa fa-check text-info"></i> </li>
                <li class="list-group-item"><i class="fa fa-check text-info"></i> Unlimited projects</li>
                <li class="list-group-item"><i class="fa fa-check text-info"></i> 27/7 support</li>
              </ul><?php */?>
              
              <div class="panel-footer"> <a class="btn btn-lg btn-block btn-info" href="<?php echo base_url();?>teacherdashboard/plan/buynow/<?php echo $pageVal['plan_id'];?>">BUY NOW!</a> </div>
            </div>
            <!-- /PRICE ITEM --> 
          </div>
          <?php }?>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">var Page='inner';</script>
<?php $this->load->view("bottom_application");?>
<script type="text/javascript">		
	function validcheckstatus(name,action,text)
{
	var chObj	=	document.getElementsByName(name);
	var result	=	false;	
	for(var i=0;i<chObj.length;i++){
	
		if(chObj[i].checked){
		  result=true;
		  break;
		}
	}
 
	if(!result){
		 alert("Please select atleast one "+text+" to "+action+".");
		 return false;
	}else if(action=='delete'){
			 if(!confirm("Are you sure you want to delete this.")){
			   return false;
			 }else{
				return true;
			 }
	}else{
		return true;
	}
}
</script>
<style>
a.btn.btn-success {
    margin-top: 0px;
    margin-bottom: 26px;
    margin-left: 8px;
}
</style>
