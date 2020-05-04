<?php $this->load->view("top_application");?>
<p></p>
<div class="">
<div class="container">
<div class="col-xl-12 col-lg-4">
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
            <div style="clear:both;height:40px"></div>
          </div>
          <?php }?>
          <?php }?>
        </div>
      </div>
</div>
</div>      
<?php $this->load->view("bottom_application");?>
<style>

</style>      