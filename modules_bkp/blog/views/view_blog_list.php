<?php $this->load->view('top_application'); ?>
<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-3 pt-100 pb-95" style="background-image:url(<?php echo theme_url();?>img/bg/breadcrumb-bg-5.jpg);">
        <div class="container">
            <h2>Blog</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .</p>
        </div>
    </div>
    <div class="breadcrumb-bottom">
        <div class="container">
            <ul>
                <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-double-right"></i>Blog</span></li>
            </ul>
        </div>
    </div>
</div>
<div class="event-area pt-130 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="blog-all-wrap mr-40">
                    <div class="row">
<?php
if(is_array($res) && !empty($res)) :
	foreach($res as $val) :
	$url=base_url().'blog/details/'.$val['url'];
	$catName=get_category_by_id($val['category_id']);
	
?>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="single-blog mb-30">
                                <div class="blog-img">
                                    <a href="<?php echo $url;?>"><img src="<?php echo base_url();?>uploaded_files/blog/<?php echo $val['blog_image_thumbnail']?>" alt=""></a>
                                </div>
                                <div class="blog-content-wrap">
                                    <span><?php echo $catName[0]['name'];?></span>
                                    <div class="blog-content">
                                        <h4><a href="<?php echo $url;?>"> <?php echo $val['title'];?></a></h4>
                                     
                                        <?php /*?><div class="blog-meta">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i>Apparel</a></li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i> 10</a></li>
                                            </ul>
                                        </div><?php */?>
                                    </div>
                                    <div class="blog-date">
                                        <a href="#"><i class="fa fa-calendar-o"></i> <?php echo getDateFormat($val['blog_date_added'],3);?></a>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php endforeach;?>
<?php endif; ?>
                     
                    </div>
                    <div class="pro-pagination-style text-center mt-25">
					<?php echo $page_links;?>
                        <!--<ul>
                            <li><a class="prev" href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a class="next" href="#"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>-->
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="sidebar-style">
                    <div class="sidebar-search mb-40">
                        <div class="sidebar-title mb-40">
                            <h4>Search</h4>
                        </div>
                        <form>
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="sidebar-about mb-40">
                        <div class="sidebar-title mb-15">
                            <h4>About Us</h4>
                        </div>
                        <p>quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolors eos qui ratione voluptatem sad.</p>
                        <a href="#"><img src="<?php echo theme_url();?>img/banner/banner-4.jpg" alt=""></a>
                        <div class="sidebar-social">
                            <ul>
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-recent-post mb-35">
                        <div class="sidebar-title mb-40">
                            <h4>Recent Post</h4>
                        </div>
                        <div class="recent-post-wrap">
                            <div class="single-recent-post">
                                <div class="recent-post-img">
                                    <a href="#"><img src="<?php echo theme_url();?>img/blog/recent-post-1.jpg" alt=""></a>
                                </div>
                                <div class="recent-post-content">
                                    <h5><a href="#">Blog title will be here.</a></h5>
                                    <span>Blog Category</span>
                                    <p>Datat non proident qui offici.hafw adec qart.</p>
                                </div>
                            </div>
                            <div class="single-recent-post">
                                <div class="recent-post-img">
                                    <a href="#"><img src="<?php echo theme_url();?>img/blog/recent-post-2.jpg" alt=""></a>
                                </div>
                                <div class="recent-post-content">
                                    <h5><a href="#">Blog title will be here.</a></h5>
                                    <span>Blog Category</span>
                                    <p>Datat non proident qui offici.hafw adec qart.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-category mb-40">
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
                    </div>
                    <div class="sidebar-recent-course-wrap mb-40">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="brand-logo-area pb-130">
    <div class="container">
        <div class="brand-logo-active owl-carousel">
            <div class="single-brand-logo">
                <a href="#"><img src="<?php echo theme_url()?>img/brand-logo/1.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="<?php echo theme_url()?>img/brand-logo/2.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="<?php echo theme_url()?>img/brand-logo/3.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="<?php echo theme_url()?>img/brand-logo/4.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="<?php echo theme_url()?>img/brand-logo/5.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="<?php echo theme_url()?>img/brand-logo/6.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="<?php echo theme_url()?>img/brand-logo/2.png" alt=""></a>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('bottom_application'); ?>