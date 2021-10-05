 <div class="row">
               <?php
                if(is_array($res) && !empty($res)) {
                foreach($res as $val) {
               ?>  

      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 listAll">
                    <div class="single-blog">
                      <div class="blog-img">
        
              <!--<img src="<a href="javascript:void(0)" data-id="<?php echo $val['courses_id']?>">-->
                        <?php if(!empty($val['image'])) {?>
                        <a href="<?php echo base_url();?>courses/detail/<?php echo $val['courses_friendly_url']?>"> <img src="<?php echo base_url();?>lms/uploaded_files/courses/<?php echo $val['image']?>" alt="" data-href="<?php echo base_url();?>courses/coursedetail/<?php echo $val['courses_id'];?>" data-name="<?php echo $val['courses_name']?>"></a>
                        <?php } else {?>
                        <a href="<?php echo base_url();?>courses/detail/<?php echo $val['courses_friendly_url']?>"> <img src="https://pathshala.co/uploaded_files/thumb_cache/thumb_190_190_noimg1.gif"/><!--class="openPopup"--></a>
                        <?php }?>
                      </div>
			   <div class="course-content">
                <div class=" mb-3">
                  <p class="price"><ul>
                              <li>
							  <div>
							  <span class="d-flex justify-content-between align-items-center mb-3">
							  <h3><a href="course-details.html">
                               <?php if($val['price']==1){?>
                                Free</a>                                <?php }else{ ?>
                                <a href="course-details.html">&#x20B9;<?php echo $val['price'];?></a> 
                                <a href="course-details.html">Credit Point :<?php echo $val['credit_price'];?></a></h3>
                                <?php }?>
								 </div>
                               </span></li>
                            </ul></p>
                </div>

                <h3><a href="course-details.html"><a href="<?php echo base_url();?>courses/detail/<?php echo $val['courses_friendly_url']?>">Topic: <b><?php echo $val['courses_name']?></b></a></h4>
                        <?php 
						$mem_info=get_db_single_row('wl_teacher',$fields="first_name,teacher_id,status",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
						?></a></h3>
						
				<div class="btn-get-started">
                        
                      <?php if($this->session->userdata('user_id') > 0 ){?>
                     <ul> 
                     <li><a href="<?php echo base_url();?>/courses/enrollDetail/<?php echo $val['courses_id']?>" ><button class="default-btn"></i> Buy Now</a>&nbsp;</li>
                     
                       <?php if($val['price']!=1){?>
                       
                     <li><a href="<?php echo base_url();?>/courses/enrollDetailStoreCredit/<?php echo $val['courses_id']?>" ><button class="default-btn"></i>Use credit Points</a></li>
                      <?php }?>
                      </ul>
                      <?php }else{?>
                     <ul> <li>  <a href="<?php echo base_url();?>users/login" ></i>Buy Now</a></li></ul>
                      <?php }?>                      
                        </div>		
						
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <div class="thumb-lg member-thumb mx-auto"><img src="<?php echo get_image('teacher',$val['picture'],190,190,'AR');?>" alt="img" class="rounded-circle img-thumbnail" alt="profile-image" class="img-fluid" alt=""> </div>
                   <h3><a href="course-details.html">  <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">Teacher: <b><?php echo $mem_info['first_name']?></b></a> </h3>
                  </div>
<!--                  <div class="trainer-rank d-flex align-items-center">
<!--                    <i class="bx bx-user"></i>&nbsp;50
<!--                    &nbsp;&nbsp;
<!--                    <i class="bx bx-heart"></i>&nbsp;65
<!--                  </div> -->
</div>
				  <?php $rating = get_rating('',$val['teacher_id'])?>
          <div class="row rate" data-target="form-rate-instructor">
                 <div class="col-md-4"> <label>Rating : </label></div>
              <div class="row">
              <?php for ($x = 1; $x <= 5; $x++) {?>
                <i class="fa fa-star<?php if($x > $rating){echo "-o";}?> text-info"></i>
              <?php }?>  
              </div>
              <input type="hidden" name="form-rate-instructor" value="<?php echo $rating;?>">
            </div>
                </div>
              
            </div>
          </div> <!-- End Course Item-->

	   <?php } }?>
                  <?php echo $this->ajax_pagination->create_links(); ?> </div>
