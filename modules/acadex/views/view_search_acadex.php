<div class="row">
                  <?php
                // $db1 = $this->load->database('default', TRUE);
                // $sql="SELECT * FROM `wl_teacher`  where liveplan=1";
                // $query=$db1->query($sql);
                if(is_array($res) && !empty($res)){
                    foreach($res as $val)
                    { $mem_info=get_db_single_row('wl_teacher',$fields="*",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
                ?>
                   <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 listAll">
                    <div class="single-blog">
                      <div class="blog-img"> <a href="javascript:void(0)" data-id="<?php echo $val['addclass_id']?>">
                       <?php if(!empty($mem_info['picture'])) {?><a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">
                      <img src="<?php echo base_url();?>/uploaded_files/teacher/<?php echo $mem_info['picture']?>" alt="" "></a>
                      <?php } else {?>
                        <img src="<?php echo base_url();?>/uploaded_files/thumb_cache/thumb_190_190_noimg1.gif" alt="" ">
					  <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>"><!--class="openPopup"--></a>
                        <?php }?>
                      </div>
                      <div class="blog-content-wrap">
                        <div class="blog-content"> 
						<?php 
            //$mem_info=get_db_single_row('wl_teacher',$fields="first_name,teacher_id,status",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");

            //print_r($mem_info);
						?>
                          <h4 style="color:#28407A"> <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">Teacher:<?php echo $mem_info['first_name']?></a> </h4>
                          <?php 
						//$mem_info=get_db_single_row('wl_addclass',$fields="class_title,class_schedule_time,class_date",$condition="WHERE Id='".$val['Id']."'");
						?>
						  <h4 style="color:#28407A">Class Topic:<?php echo $val['class_title']?></h4>
                        <h4 style="color:#28407A">Class Time:<?php echo $val['class_schedule_time']?></h4>
                       <h4 style="color:#28407A">Class Date:<?php echo $val['class_date']?></h4>
                          <div class="blog-meta">
                            <ul>
                              <li><span class="lms_price"><a href="javascript:void(0)" class="lms_cpp">
                               <?php if($val['class_credit_amount']==0){?>
                                Free</a>
                                <?php }else{ ?>
                                <a href="javascript:void(0)" class="lms_cp">Credit Point :<?php echo $val['class_credit_amount'];?></a>
                                <?php }?>
                               </span></li>
                            </ul>
                          </div>
                        </div> 
                        <div class="blog-meta lms-meta">
                        
                      <?php if($this->session->userdata('user_id') > 0 ){?>
                     <ul> 
                     <li> <a href="<?php echo base_url();?>members/liveclass" class="lms_buy"><i class="fa fa-laptop"></i>&nbsp;Join Now</a>&nbsp;</li>
                     
                       <?php //echo $val['class_credit_point'];  
                       if($val['class_credit_amount']!='0'){?>
                       
                     <!-- <li> <a href="<?php //echo base_url();?>/courses/enrollDetailStoreCredit/<?php //echo $val['courses_id']?>" class="lms_buy"><i class="fa fa-money"></i>Use credit Points</a></li> -->
                      <?php }?>
                      </ul>
                      <?php }else{?>
                     <ul> <li>  <a href="<?php echo base_url();?>users/login" class="lms_buy"> <i class="fa fa-laptop"></i>&nbsp;Join Now</a></li></ul>
                      <?php }?>
                      
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } }?>
                  <?php echo $this->ajax_pagination->create_links(); ?> </div>