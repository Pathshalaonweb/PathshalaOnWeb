<div class="col-xl-3 col-lg-4">
                <div class="sidebar-style">
                    		  
                  <!-- end single sidebar -->
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h3>Latest Blogs</h3>
                    <div class="mu-sidebar-popular-courses">
					<?php 
						$sql="Select * from wl_blog where status='1' ORDER BY blog_id desc LIMIT 10";
						$query=$this->db->query($sql);
						foreach($query->result_array() as $val){
						$url=base_url().'blog/details/'.$val['url'];
						$catName=get_category_by_id($val['category_id']);
						?>
                      <div class="media">
                        <div class="media-left">
                          <a href="<?php echo $url;?>">
                            <img class="media-object" src="<?php echo get_image('blog',$val['blog_image_thumbnail'],90,93,'AR');?>" alt="img">
                          </a>
                        </div>
                        <div class="media-body">
                          <h5 class="media-heading"><a href="<?php echo $url;?>"><?php echo $val['title'];?></a></h5>                      
                          <!--<span> </?php echo $catName[0]['name'];?></span>-->
                        </div>
                      </div>
					  
					   <?php }?>
                    </div>
                  </div>
                  
					
                </div>
            </div>
			
			