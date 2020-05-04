<?php $this->load->view('top_application'); ?>
<div class="breadcrumb-area">
    <?php /*?><div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-3 pt-100 pb-95" style="background-image:url(<?php echo theme_url();?>img/bg/breadcrumb-bg-5.jpg);">
        <div class="container">
            <h2>Blog</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .</p>
        </div>
    </div><?php */?>
    <div class="breadcrumb-bottom" style="border-top: 2px solid #cccccc;">
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
            
            <?php $this->load->view('view_blog_right');?>
            
        </div>
    </div>
</div>


<?php $this->load->view('bottom_application'); ?>