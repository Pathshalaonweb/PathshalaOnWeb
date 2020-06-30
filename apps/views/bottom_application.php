<!--footer-->
<?php //$this->load->view('project_footer'); ?>
<!--footer end-->
<?php if ($this->router->fetch_class()=='home') {?> 
<footer class="footer-area">
  <div class="footer-top bg-img default-overlay pt-20 pb-20" style="background-image:url(<?php echo theme_url()?>images/bg-4.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="footer-widget mb-40">
            <div class="footer-title">
              <h4>Quick Links</h4>
            </div>
            <div class="footer-about">
              <ul>
                <li><a href="<?php echo base_url();?>">Home</a>|</li>
                <li><a href="<?php echo base_url()?>About/aboutus.html">About Us</a>|</li>
                <li><a href="<?php echo base_url()?>blog">Blog</a>|</li>
                <li><a href="<?php echo base_url()?>contactus">Contact</a>|</li>
                <li><a href="<?php echo base_url()?>teacher/register">Register As Teacher</a>|</li>
                <li><a href="<?php echo base_url()?>users/register">Register As Student</a></li>
              </ul>
              
              <p class="section-title pt-30"> <span><b>Search By Cities:</b></span> 
              <?php 
				  
				  $sql="SELECT * FROM `wl_customsearch` where status='1' ORDER BY `sort_order` DESC LIMIT 7";
				  $query=$this->db->query($sql);
				  $listCity=$query->result_array();
				  foreach($listCity as $val):
			 ?>
             <a href="<?php echo base_url();?>search?keyword=<?php echo $val['keyword'];?>&search=home">
			 <?php echo $val['title'];?></a> | <?php endforeach;?>
             <a href="<?php echo base_url();?>search">More</a></p>
              
              
              
              <p class="section-title"> <span><b>Search by Category:</b></span> 
              <?php 
				  $sql1="SELECT * FROM `wl_categories`  where status='1' AND parent_id='0' ORDER BY sort_order";
				  $query1=$this->db->query($sql1);
				  foreach($query1->result_array() as $val1):
			  ?>
			  <a href="<?php echo base_url();?>search?category=<?php echo $val1['category_id'];?>&search=home"><?php echo $val1['category_name']?></a> |  <?php endforeach;?> 
              <a href="<?php echo base_url();?>search">More</a> </p>
              
              <?php /*?><p class="section-title"> <span><b>Search by Subject:</b></span> <a href="javascript:void(0)">Maths</a> | <a href="javascript:void(0)">Hindi</a> | <a href="<?php echo base_url();?>search">More</a></p>
              <p class="section-title"> <span><b>Search by Language:</b></span> <a href="javascript:void(0)">French</a> | <a href="javascript:void(0)">Spanish</a> | <a href="<?php echo base_url();?>search">More</a></p><?php */?>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="footer-widget mb-40">
            <div class="footer-title">
              <h4>About Us</h4>
            </div>
            <div class="footer-list">
              <p>Pathshala is India's Latest Upcoming Online Marketplace connecting students from everywhere of every course to the teachers around the 
			  country on just a click & catering other educational needs.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom pt-15 pb-15">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 col-md-12">
          <div class="copyright" style=" width: max-content;">
                    <p> Copyright © <?php echo date('Y');?> <a href="<?php echo base_url();?>">Pathshala&nbsp;</a>(Brainchild Ventures LLP). <br>All Right Reserved. </p>
          </div>
        </div>
        <div class="col-lg-8 col-md-12">
          <div class="footer-menu-social">
            <div class="footer-menu">
              <ul>
                <li><a href="<?php echo base_url();?>pages/privecy-policy" target="_blank">Privacy Policy</a></li>
                <li><a href="<?php echo base_url();?>pages/terms-and-conditions" target="_blank">Terms & Conditions of Use</a></li>
              </ul>
            </div>
            <div class="footer-social">
              <ul>
               <li><a class="facebook" href="https://www.facebook.com/pathshalaonweb" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a class="youtube" href="https://www.instagram.com/pathshalaonline/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a class="twitter" href="https://twitter.com/pathshalaonweb" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a class="google-plus" href="https://www.linkedin.com/company/pathshalaonweb" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php } else { ?>
<footer class="footer-area">
  <div class="footer-top bg-img default-overlay pt-20 pb-20" style="background-image:url(<?php echo theme_url();?>img/bg/bg-4.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="footer-widget mb-40">
            <div class="footer-title">
              <h4>ABOUT US</h4>
            </div>
            <div class="footer-about">
              <p>Pathshala is India's Latest Upcoming Online Marketplace connecting students from everywhere of every course to the teachers around the country on just a click & catering other educational needs.</p>
              <div class="f-contact-info">
                <div class="single-f-contact-info"> <i class="fa fa-home"></i> <span>Delhi</span> </div>
                <div class="single-f-contact-info"> <i class="fa fa-envelope-o"></i> <span><a href="#">info@pathshala.co</a></span> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="footer-widget mb-40">
            <div class="footer-title">
              <h4>QUICK LINK</h4>
            </div>
            <div class="footer-list">
              <ul>
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url()?>About/aboutus.html">About</a></li>
                <li><a href="<?php echo base_url()?>blog">Blog</a></li>
                <li><a href="<?php echo base_url()?>contactus">Contact</a></li>
                <li><a href="<?php echo base_url()?>users/register">Register as Student</a></li>
                <li><a href="<?php echo base_url()?>teacher/register">Register as Teacher</a></li>
                <li><a href="<?php echo base_url();?>teacher/login">Login</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom pt-15 pb-15">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 col-md-12">
          <div class="copyright" style=" width: max-content;">
            <p> Copyright © <?php echo date('Y');?> <a href="<?php echo base_url();?>">Pathshala &nbsp;</a>(Brainchild Ventures LLP).<br>All Right Reserved. </p>
          </div>
        </div>
        <div class="col-lg-8 col-md-12">
          <div class="footer-menu-social">
            <div class="footer-menu">
              <ul>
                <li><a href="<?php echo base_url();?>pages/privecy-policy">Privacy Policy</a></li>
                <li><a href="<?php echo base_url();?>pages/terms-and-conditions">Terms & Conditions of Use</a></li>
              </ul>
            </div>
            <div class="footer-social">
              <ul>
                <li><a class="facebook" href="https://www.facebook.com/pathshalaonweb" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a class="youtube" href="https://www.instagram.com/pathshalaonline/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a class="twitter" href="https://twitter.com/pathshalaonweb" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a class="google-plus" href="https://www.linkedin.com/company/pathshalaonweb" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php }?>
<!-- JS============================================ --> 
<!-- jQuery JS --> 
<script src="<?php echo theme_url()?>js/vendor/jquery-1.12.4.min.js"></script> 
<!-- Popper JS --> 
<script src="<?php echo theme_url()?>js/popper.min.js"></script> 
<!-- Bootstrap JS --> 
<script src="<?php echo theme_url()?>js/bootstrap.min.js"></script> 
<!-- Plugins JS --> 
<script src="<?php echo theme_url()?>js/plugins.js"></script> 
<script src="<?php echo theme_url()?>js/main.js"></script>
<?php /*?><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">$(function(){$("#datepicker").datepicker({autoclose:!0,todayHighlight:!0})});</script><?php */?>
<script type="text/javascript">
$(document).ready(function() {
        // Transition effect for navbar 
        $(window).scroll(function() {
          // checks if window is scrolled more than 500px, adds/removes solid class
          if($(this).scrollTop() > 500) { 
              $('.navbar').addClass('solid');
          } else {
              $('.navbar').removeClass('solid');
          }
        });
});
</script>
</body></html>