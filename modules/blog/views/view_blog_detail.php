


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


<section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-blog-single">
                  <div class="row">
                    <div class="col-md-12">
                      <article class="mu-blog-single-item">
                        <figure class="mu-blog-single-img">
                          <a href="#"><img alt="img" src="<?php echo base_url();?>uploaded_files/blog/<?php echo $res['blog_image']?>"></a>
                          <figcaption class="mu-blog-caption">
                            <h3><a href="#"><?php echo $res['title'];?></a></h3>
                          </figcaption>                      
                        </figure>
                        <div class="mu-blog-meta">
                          <a href="#"><?php echo getDateFormat($res['blog_date_added'],3);?></a>
                          
                        </div>
                        <div class="mu-blog-description">
                         <?php echo $res['detail'];?>
                        </div>
                       
                        <!-- End blog social share -->
                      </article>
                    </div>                                   
                  </div>
                </div>
                <!-- end course content container -->
                
              </div>
              <div class="col-md-3">
                <!-- start sidebar -->
              <?php $this->load->view('view_blog_right');?>
                <!-- / end sidebar -->
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>



<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e60a835ff5153d6"></script>


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
  width: 100%;
}
.mu-blog-single-item .mu-blog-single-img a {
  display: block;
}
.mu-blog-single-item .mu-blog-single-img a img {
  width: 100%;
}
.mu-blog-single-item .mu-blog-single-img .mu-blog-caption {
  display: inline;
  float: left;
  width: 100%;
}
</style>
}

a:hover,
a:focus {

<style>
