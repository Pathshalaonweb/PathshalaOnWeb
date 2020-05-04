<div class="row">
                  <?php
                if(is_array($res) && !empty($res)) {
                    foreach($res as $val)
                    {
                ?>
                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 listAll">
                    <div class="single-blog"><!--removed className(mb-30)-->
                      <div class="blog-img"> <a href="javascript:void(0)">
                      <?php if(!empty($val['image'])) {?>
                      <img src="<?php echo base_url();?>lms/uploaded_files/courses/<?php echo $val['image']?>" alt="" data-href="<?php echo base_url();?>courses/coursedetail/<?php echo $val['courses_id'];?>" data-name="<?php echo $val['courses_name']?>" class="openPopup">
                      <?php } else {?>
                      <img src="<?php echo get_image('category',$val['image'],50,50,'AR');?>" />
                      <?php }?>
                      </a> </div>
                      <div class="blog-content-wrap">
                        <div class="blog-content">
                          <!--<div class="pro-title-rating-wrap">
                            <div class="product-rating"> <i class="zmdi zmdi-star"></i> <i class="zmdi zmdi-star"></i> <i class="zmdi zmdi-star"></i> <i class="zmdi zmdi-star"></i> <i class="zmdi zmdi-star"></i> </div>
                          </div>-->
                          <h4 class="topicTitle"><a href="#">Topic:<?php echo $val['courses_name']?></a></h4>
                          <!--<h4 class="topicTitle"><a href="#">Class:<b>11th</b></a></h4>-->
                          <?php 
						 // $sql="SELECT * FROM `wl_teacher` where status='1' ";
						 // $row=$thsi->db->query($sql)->row();
						  $mem_info=get_db_single_row('wl_teacher',$fields="*",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
						  ?>
                          <h4 class="topicTitle">
                          <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">Teacher:<b><?php echo $mem_info['first_name']?></b></a>
                          </h4>
                          <p></p>
                          <div class="blog-meta">
                            <ul>
                              <li><a href="javascript:void(0)" class="lms_price"><?php if($val['price']==1){?>Free<?php }else{ ?>&#x20B9;<?php echo $val['price'];?><?php }?></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="blog-date">
                        <?php if($this->session->userdata('user_id') > 0 ){?> 
                        <a href="<?php echo base_url();?>/courses/enrollDetail/<?php echo $val['courses_id']?>" class="lms_buy"><i class="fa fa-money"></i> Book Now</a>
                        <?php }else{?>
                        <a href="<?php echo base_url();?>users/login" class="lms_buy"> <i class="fa fa-money"></i> Book Now</a>
                        <?php }?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } }?>
                  <?php echo $this->ajax_pagination->create_links(); ?> </div>