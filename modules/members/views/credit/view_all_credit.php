<?php $this->load->view("top_application");?>
<div class="event-area my-acc pt-20 pb-130">
  <div class="container">
    <div class="row">
      <?php $this->load->view("myaccount_left");?>
     
     <div class="col-xl-9 col-lg-4">
        <div class="row" style="margin-bottom:20px;">
         <?php 
	     if( is_array($res) && !empty($res) ) {
		 foreach($res as $catKey=>$pageVal)
		 { 							
		 ?>
          <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4"> 
            
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
			  <div class="panel-footer"> <a class="btn btn-lg btn-block btn-info" href="<?php echo base_url();?>members/buynow/<?php echo $pageVal['plan_id'];?>">BUY NOW!</a> </div>
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
<?php $this->load->view("bottom_application");?>
<style>.button-box {
    text-align: center;
}</style>