<div class="row">
  <?php
                if(is_array($res) && !empty($res)) {
                    foreach($res as $val)
                    {
                ?>
  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 listAll">
                    <div class="single-blog">
                      <div class="blog-img"> <a href="javascript:void(0)" data-id="<?php echo $val['courses_id']?>">
                        <?php if(!empty($val['image'])) {?>
                        <a href="<?php echo base_url();?>courses/detail/<?php echo $val['courses_friendly_url']?>"> <img src="<?php echo base_url();?>lms/uploaded_files/courses/<?php echo $val['image']?>" alt="" data-href="<?php echo base_url();?>courses/coursedetail/<?php echo $val['courses_id'];?>" data-name="<?php echo $val['courses_name']?>"></a>
                        <?php } else {?>
                        <a href="<?php echo base_url();?>courses/detail/<?php echo $val['courses_friendly_url']?>"> <img src="<?php echo get_image('category',$val['image'],50,50,'AR');?>"/><!--class="openPopup"--></a>
                        <?php }?>
                      </div>
                      <div class="blog-content-wrap">
                        <div class="blog-content"> 
                        <h4 class="topicTitle"><a href="<?php echo base_url();?>courses/detail/<?php echo $val['courses_friendly_url']?>">Topic:<?php echo $val['courses_name']?></a></h4>
                        <?php 
						$mem_info=get_db_single_row('wl_teacher',$fields="first_name,teacher_id,status",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
						?>
                          <h4 class="topicTitle"> <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">Teacher:<b><?php echo $mem_info['first_name']?></b></a> </h4>
                          <p></p>
                          <div class="blog-meta">
                            <ul>
                              <li><span class="lms_price"><a href="javascript:void(0)" class="lms_cpp">
                               <?php if($val['price']==1){?>
                                Free</a>
                                <?php }else{ ?>
                                <a href="javascript:void(0)" class="lms_cp">&#x20B9;<?php echo $val['price'];?></a> 
                                <a href="javascript:void(0)" class="lms_cp">Credit Point :<?php echo $val['credit_price'];?></a>
                                <?php }?>
                               </span></li>
                            </ul>
                          </div>
                        </div> 
                        <div class="blog-meta lms-meta">
                        
                      <?php if($this->session->userdata('user_id') > 0 ){?>
                     <ul> 
                     <li> <a href="<?php echo base_url();?>/courses/enrollDetail/<?php echo $val['courses_id']?>" class="lms_buy"><i class="fa fa-money"></i> Buy Now</a>&nbsp;</li>
                     
                       <?php if($val['price']!=1){?>
                       
                     <li> <a href="<?php echo base_url();?>/courses/enrollDetailStoreCredit/<?php echo $val['courses_id']?>" class="lms_buy"><i class="fa fa-money"></i>Use credit Points</a></li>
                      <?php }?>
                      </ul>
                      <?php }else{?>
                     <ul> <li>  <a href="<?php echo base_url();?>users/login" class="lms_buy"> <i class="fa fa-money"></i> Buy Now</a></li></ul>
                      <?php }?>
                      
                        </div>
                      </div>
                    </div>
                  </div>
  <?php } }?>
  <?php echo $this->ajax_pagination->create_links(); ?> </div>
