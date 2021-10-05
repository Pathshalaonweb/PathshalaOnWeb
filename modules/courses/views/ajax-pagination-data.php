<?php
                if(is_array($res) && !empty($res)) {
                foreach($res as $val) {
               ?> 
		  
	   
       <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 listAll">
         <div class="d-flex flex-column coursePage2 shadow p-2 m-1">
		 <?php if(!empty($val['image'])) {?>
		<img class="courseThumbnail2 mb-2 ml-1" src="<?php echo base_url();?>lms/uploaded_files/courses/<?php echo $val['image']?>" alt="img"/>
		<?php } else {?>
                        <a href="<?php echo base_url();?>courses/detail/<?php echo $val['courses_friendly_url']?>"> <img class="courseThumbnail2 mb-2 ml-1" src="https://pathshala.co/uploaded_files/thumb_cache/thumb_190_190_noimg1.gif"/><!--class="openPopup"--></a>
                        <?php }?>
		<div style="height:60px;">
		<h4 class="courseHeading2 ml-1"><a href="<?php echo base_url();?>courses/detail/<?php echo $val['courses_friendly_url']?>"><?php echo $val['courses_name']?></a></h4>
		</div>
		<div style="height:30px;">
		<p class="courseInstructor2 ml-1"><a href="<?php echo base_url();?>teacher/profile/<?php echo $mem_info['teacher_id'];?>/<?php echo url_title($mem_info['first_name']);?>" target="_blank"><?php echo $mem_info['first_name']?></a></p>
		</div>
	  <!-- <div style="height:40px;">
		<p class="starRating2 ml-1"><span class="starCount2">4.6 <span >
		  <//?php for ($x = 1; $x <= 5; $x++) {?>
                <i class="fa fa-star <//?php if($x > $rating){echo "-o";}?> starcolor"></i>
              <//?php }?> 
                </span></span> (42998)</p>
		</div>-->
			   <div class="mb-2" style="height:40px;">
				<p class="fees"><span class="rupeeIcon"></span><?php if($val['price']==1){?>&#x20B9; Free</p> 
							   <?php }else{ ?>
							   <div class="d-flex flex-row pb-2">
                                <p class="pricedetail1 mr-auto ml-1">&#x20B9; <?php echo $val['price'];?></p> 
                                <p class="pricedetail1 ml-auto mr-3">Credit Point : <?php echo $val['credit_price'];?></p></div>
                                <?php }?>
					</div>
		<div class="d-flex flex-row ml-1" style="height:40px;">
			<?php if($this->session->userdata('user_id') > 0 ){?>
                     <a href="<?php echo base_url();?>/courses/enrollDetail/<?php echo $val['courses_id']?>" ><button class="btn btn-outline-info buyButton">Pay Now</button></a>
                     
                       <?php if($val['price']!=1){?>
                       
                     <a href="<?php echo base_url();?>/courses/enrollDetailStoreCredit/<?php echo $val['courses_id']?>" ><button class="btn btn-outline-info buyButton">Use credit Points </button></a>
                      <?php }?>
                      
                      <?php }else{?>
                     <a href="<?php echo base_url();?>users/login" ><button class="btn btn-outline-info buyButton">Login Now</button></a>
                      <?php }?>    
			
        </div>	
		</div>
		
        </div>
            
	 <?php } }?>
	<hr>

    <?php echo $this->ajax_pagination->create_links(); ?> </div>
	</div>
