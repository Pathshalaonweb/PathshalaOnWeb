<div class="col-xl-3 col-lg-4">
                <div class="sidebar-style">
                    <div class="sidebar-about mb-40">
                        <div class="sidebar-title mb-15">
                            <h4>About Us</h4>
                        </div>
                        <p><?php  echo get_static_content(22);?></p>
                       
                        <div class="sidebar-social">
                            <ul>
                                <li><a class="facebook" href="https://www.facebook.com/pathshalaonweb" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="youtube" href="https://www.instagram.com/pathshalaonline/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="twitter" href="https://twitter.com/pathshalaonweb" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="google-plus" href="https://www.linkedin.com/company/pathshalaonweb" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-recent-post mb-35">
                        <div class="sidebar-title mb-40">
                            <h4>Recent Post</h4>
                        </div>
                        <div class="recent-post-wrap">
                        <?php 
						$sql="Select * from wl_blog where status='1' ORDER BY blog_id desc LIMIT 5";
						$query=$this->db->query($sql);
						foreach($query->result_array() as $val){
						$url=base_url().'blog/details/'.$val['url'];
						$catName=get_category_by_id($val['category_id']);
						?>
                          <div class="single-recent-post">
                                <div class="recent-post-img">
                                    <a href="<?php echo $url;?>">
                                    <img class="img-responsive" src="<?php echo get_image('blog',$pageVal['blog_image_thumbnail'],90,93,'AR');?>" alt=""></a>
                                </div>
                                <div class="recent-post-content">
                                    <h5><a href="<?php echo $url;?>"><?php echo $val['title'];?></a></h5>
                                    <span><?php echo $catName[0]['name'];?></span>
                                   
                                </div>
                            </div>
                         <?php }?>   
                            
                            
                        </div>
                    </div>
                    <?php /*?><div class="sidebar-category mb-40">
                        <div class="sidebar-title mb-40">
                            <h4>Course Category</h4>
                        </div>
                        <div class="category-list">
                            <ul>
                            	<?php echo get_category();?>
                                <li><a href="#">MBA <span>04</span></a></li>
                                <li><a href="#">Graduate <span>08</span></a></li>
                                <li><a href="#">Under Graduate <span>04</span></a></li>
                                <li><a href="#">BBA <span>06</span></a></li>
                                <li><a href="#">Engineering <span>04</span></a></li>
                            </ul>
                        </div>
                    </div><?php */?>
                  <?php /*?>  <div class="sidebar-recent-course-wrap mb-40">
                        <div class="sidebar-title mb-40">
                            <h4>Recent Courses</h4>
                        </div>
                        <div class="sidebar-recent-course">
                            <div class="sin-sidebar-recent-course">
                                <div class="sidebar-recent-course-img">
                                    <a href="#"><img src="<?php echo theme_url();?>img/blog/recent-post-1.jpg" alt=""></a>
                                </div>
                                <div class="sidebar-recent-course-content">
                                    <h4><a href="#">Course Title</a></h4>
                                    <ul>
                                        <li>Credits : 125</li>
                                        <li class="duration-color">Duration : 4yrs</li>
                                    </ul>
                                    <p>Datat non proident qui offici.hafw adec qart.</p>
                                </div>
                            </div>
                            <div class="sin-sidebar-recent-course">
                                <div class="sidebar-recent-course-img">
                                    <a href="#"><img src="<?php echo theme_url();?>img/blog/recent-post-2.jpg" alt=""></a>
                                </div>
                                <div class="sidebar-recent-course-content">
                                    <h4><a href="#">Course Title</a></h4>
                                    <ul>
                                        <li>Credits : 125</li>
                                        <li class="duration-color">Duration : 4yrs</li>
                                    </ul>
                                    <p>Datat non proident qui offici.hafw adec qart.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-tag-wrap">
                        <div class="sidebar-title mb-40">
                            <h4>Tag</h4>
                        </div>
                        <div class="sidebar-tag">
                            <ul>
                                <li><a href="#">Loremsite</a></li>
                                <li><a href="#">Loreipsum</a></li>
                                <li><a href="#">Dolar</a></li>
                                <li><a href="#">Site ament dollar</a></li>
                                <li><a href="#">Loremsite</a></li>
                                <li><a href="#">Dummy Text</a></li>
                            </ul>
                        </div>
                    </div><?php */?>
                </div>
            </div>