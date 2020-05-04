<?php $this->load->view('top_application'); ?>
<?php //print_r($res);?>

<div class="breadcrumb-area">
  <?php /*?><div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-3 pt-100 pb-95" style="background-image:url(assets/img/bg/breadcrumb-bg-5.jpg);">
    <div class="container">
      <h2>Blog Details</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .</p>
    </div>
  </div><?php */?>
  <div class="breadcrumb-bottom" style="border-top: 2px solid #cccccc;">
    <div class="container">
      <ul>
        <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-double-right"></i>Blog Details</span></li>
      </ul>
    </div>
  </div>
</div>
<div class="event-area pt-130 pb-130">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 col-lg-8">
        <div class="blog-details-wrap mr-40">
          <div class="blog-details-top"> <img src="<?php echo base_url();?>uploaded_files/blog/<?php echo $res['blog_image']?>" alt="">
            <div class="blog-details-content-wrap">
              <div class="b-details-meta-wrap">
                <div class="b-details-meta">
                  <ul>
                    <li><i class="fa fa-calendar-o"></i> <?php echo getDateFormat($res['blog_date_added'],3);?></li>
                    <li><i class="fa fa-user"></i> <?php echo $res['posted_by'];?></li>
                    <li><i class="fa fa-comments-o"></i> 10</li>
                  </ul>
                </div>
                <span>Education</span> </div>
              <h3><?php echo $res['title'];?></h3>
              <p><?php echo $res['detail'];?></p>
              <!--<blockquote>
                                <i class="quote-top fa fa-quote-left"></i>
                                Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit, sed do eiusm od tempor incidi dunt ut labore et dolore magna aliqua. Ut enim  fugiat nulla pariaatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit 
                                <i class="quote-bottom fa fa-quote-right"></i>
                            </blockquote>--> 
              <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>--> 
              <!--<div class="blog-share-tags">
                                <div class="blog-share">
                                    <div class="blog-btn">
                                        <a href="#"><i class="fa fa-share-alt"></i></a>
                                    </div>
                                    <div class="blog-social">
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-tag">
                                    <ul>
                                        <li><a href="#">Loremsite</a></li>
                                        <li><a href="#">Loreipsum</a></li>
                                        <li><a href="#">Dolar</a></li>
                                    </ul>
                                </div>
                            </div>--> 
            </div>
          </div>
          <!--<div class="blog-author mt-80">
                        <div class="author-img">
                            <img src="assets/img/blog/author.jpg" alt="">
                        </div>
                        <div class="author-content">
                            <div class="author-content-top">
                                <div class="blog-designation">
                                    <h5>AYESHA HOQUE</h5>
                                    <span>Author</span>
                                </div>
                                <div class="author-social">
                                    <ul>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit, sed do eiusm od tempor incidi dunt ut labore et dolore magna aliqua. Ut enim  fugiat nulla pariaatat non proident, sunt in culpa qui officia deserunt m ut perspiciatis und.</p>
                        </div>
                    </div>-->
          <?php /*?><div class="related-course pt-70">
            <div class="related-title mb-45">
              <h3>Related Blog</h3>
              <p>Hempor incididunt ut labore et dolore mm, itation ullamco laboris <br>
                nisi ut aliquip. </p>
            </div>
            <div class="related-slider-active related-blog-slide pb-80">
              <?php
if(is_array($res) && !empty($res)) :
	foreach($res as $val) :
	$url=base_url().'blog/details/'.$res['url'];
	$catName=get_category_by_id($res['category_id']);
?>
              <div class="single-blog">
                <div class="blog-img"> <a href="<?php echo $url;?>"><img src="<?php echo base_url();?>uploaded_files/blog/<?php echo $res['blog_image_thumbnail']?>" alt=""></a> </div>
                <div class="blog-content-wrap"> <span>Education</span>
                  <div class="blog-content">
                    <h4><a href="#"><?php echo $res['title'];?></a></h4>
                    <p><?php echo $res['detail'];?></p>
                    <div class="blog-meta"> 
                      <!--<ul>
                                                <li><a href="#"><i class="fa fa-user"></i>Apparel</a></li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i> 10</a></li>
                                            </ul>--> 
                    </div>
                  </div>
                  <div class="blog-date"> <a href="#"><i class="fa fa-calendar-o"></i> <?php echo getDateFormat($res['blog_date_added'],3);?></a> </div>
                </div>
              </div>
              <?php endforeach;?>
              <?php endif; ?>
            </div>
          </div><?php */?>
          <!--<div class="blog-comment">
                        <div class="blog-comment-btn mb-80 commrnt-toggle">
                            <a href="#">VIEW COMMENT</a>
                        </div>
                        <div class="blog-comment-content-wrap">
                            <h4>COMMENT</h4>
                            <div class="single-blog-comment">
                                <div class="blog-comment-img">
                                    <img src="assets/img/blog/blog-comment.jpg" alt="">
                                </div>
                                <div class="blog-comment-content">
                                    <h5>AYESHA HOQUE</h5>
                                    <p>Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit, sed do eiusm od tempor incidi dunt ut laboperspiciatis und.</p>
                                    <a href="#">Reply</a>
                                </div>
                            </div>
                            <div class="single-blog-comment child-comment">
                                <div class="blog-comment-img">
                                    <img src="assets/img/blog/blog-comment-2.jpg" alt="">
                                </div>
                                <div class="blog-comment-content">
                                    <h5>AYESHA HOQUE</h5>
                                    <p>Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit, sed do eiusm od tempor incidi dunt ut laboperspiciatis und.</p>
                                    <a href="#">Reply</a>
                                </div>
                            </div>
                            <div class="single-blog-comment">
                                <div class="blog-comment-img">
                                    <img src="assets/img/blog/blog-comment-3.jpg" alt="">
                                </div>
                                <div class="blog-comment-content">
                                    <h5>AYESHA HOQUE</h5>
                                    <p>Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit, sed do eiusm od tempor incidi dunt ut laboperspiciatis und.</p>
                                    <a href="#">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>--> 
          <!--<div class="leave-comment-area">
                        <h3>Leave A Comment</h3>
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="leave-form">
                                        <input placeholder="Name" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="leave-form">
                                        <input placeholder="Email" type="email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="leave-form leave-btn">
                                        <textarea placeholder="Message"></textarea>
                                        <input type="submit" value="POST YOUR COMMENT">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>--> 
        </div>
      </div>
       <?php $this->load->view('view_blog_right');?>

    </div>
  </div>
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e60a835ff5153d6"></script>


<?php $this->load->view('bottom_application'); ?>
