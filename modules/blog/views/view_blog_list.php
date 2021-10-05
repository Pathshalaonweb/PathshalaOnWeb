 <head>
 <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="../assets/css/slick.css">          
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="../assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="../assets/css/theme-color/default-theme.css" rel="stylesheet">  

 <!-- Main style sheet -->
    <link href="../assets/css/style.css" rel="stylesheet">    

   
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>
	
	</head>

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
<!--<div class="event-area pt-130 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="blog-all-wrap mr-40">
                    <div class="row">
<//?php
if(is_array($res) && !empty($res)) :
	foreach($res as $val) :
	$url=base_url().'blog/details/'.$val['url'];
	$catName=get_category_by_id($val['category_id']);
	
?>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="single-blog mb-30">
                                <div class="blog-img">
                                    <a href="<//?php echo $url;?>"><img src="<//?php echo base_url();?>uploaded_files/blog/<//?php echo $val['blog_image_thumbnail']?>" alt=""></a>
                                </div>
                                <div class="blog-content-wrap">
                                    <span><//?php echo $catName[0]['name'];?></span>
                                    <div class="blog-content">
                                        <h4><a href="<//?php echo $url;?>"> <//?php echo $val['title'];?></a></h4>
                                     
                                        <//?php /*?><div class="blog-meta">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i>Apparel</a></li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i> 10</a></li>
                                            </ul>
                                        </div><//?php */?>
                                    </div>
                                    <div class="blog-date">
                                        <a href="#"><i class="fa fa-calendar-o"></i> <//?php echo getDateFormat($val['blog_date_added'],3);?></a>
                                    </div>
                                </div>
                            </div>
                        </div>

<//?php endforeach;?>
<//?php endif; ?>
                     
                    </div>
                    <div class="pro-pagination-style text-center mt-25">
					<//?php echo $page_links;?>
                        <!--<ul>
                            <li><a class="prev" href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a class="next" href="#"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <//?php $this->load->view('view_blog_right');?>
            
        </div>
    </div>
</div>-->


 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-blog-archive">
                  <div class="row">
				  <?php
if(is_array($res) && !empty($res)) :
	foreach($res as $val) :
	$url=base_url().'blog/details/'.$val['url'];
	$catName=get_category_by_id($val['category_id']);
	
?>
                    <div class="col-md-6 col-sm-6">
                      <article class="mu-blog-single-item">
                        <figure class="mu-blog-single-img">
                          <a href="<?php echo $url;?>"><img src="<?php echo base_url();?>uploaded_files/blog/<?php echo $val['blog_image_thumbnail']?>" alt=""></a>
                          <figcaption class="mu-blog-caption">
                            <h3><a href="<?php echo $url;?>"> <?php echo $val['title'];?></a></h3>
                          </figcaption>                      
                        </figure>
                        <div class="mu-blog-meta">
                          <a href="#"><?php echo $catName[0]['name'];?></a> |
                          <a href="#"><?php echo getDateFormat($val['blog_date_added'],3);?></a>
                          <!--<span><i class="fa fa-comments-o"></i>87</span>-->
                        </div>
                        <div class="mu-blog-description">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae ipsum non voluptatum eum repellendus quod aliquid. Vitae, dolorum voluptate quis repudiandae eos molestiae dolores enim.</p>
                          <a class="mu-read-more-btn" href="#">Read More</a>
                        </div>
                      </article> 
                    </div>                  
					<?php endforeach;?>
<?php endif; ?>
                  </div>
                </div>
                <!-- end course content container -->
                <!-- start course pagination -->
                <div class="mu-pagination">
                  <nav>
                   <div class="pro-pagination-style text-center mt-25">
					<?php echo $page_links;?>
                        <!--<ul>
                            <li><a class="prev" href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a class="next" href="#"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>-->
                    </div>
                  </nav>
                </div>
                <!-- end course pagination -->
              </div>
              <div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">
                  <?php $this->load->view('view_blog_right');?>
                </aside>
                <!-- / end sidebar -->
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

<?php $this->load->view('bottom_application'); ?>

<style>
.mu-blog-single-item {
  display: inline;
  float: left;
  width: 100%;
}
.mu-blog-single-item .mu-blog-single-img {
  display: inline;
  float: left;
  width: 90%;
}
.mu-blog-single-item .mu-blog-single-img a {
  display: block;
}
.mu-blog-single-item .mu-blog-single-img a img {
  width: 90%;
}
.mu-blog-single-item .mu-blog-single-img .mu-blog-caption {
  display: inline;
  float: left;
  width: 90%;
}
</style>