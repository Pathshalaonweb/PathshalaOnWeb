<?php $this->load->view('top_application'); ?>
<div class="container pt12">
  <div class="radius-5 rel bg-white shadow p15">
    <h1>Testimonials Detail</h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a> <a href="<?php echo base_url();?>testimonials">Testimonials</a>  Testimonials Detail</p>
    <div class="mt10">
      <!--Testimonials-Starts-->
      <div class="mt30">
        <!--Starts-->
        <div class="shadow1 rel p25">
          <p  class="quote-icon fl"></p>
          <div class="fs16 lh30px geor i"><span class="ml70"></span><?php echo $res['testimonial_description'];?> </div>
          <div class="cb"></div>
          <p class="testi-drop"></p>
        </div>
        <p class="mt10 geor fs16 mr10 mt15 i ar"><?php echo $res['poster_name'];?></p>
        <p class="ar mr20 fs11 mt5"><?php echo getDateFormat($res['posted_date'],1);?></p>
        <!--Ends-->
      </div>
      <div class="cb"></div>
      <!--Testimonials-Ends-->
    </div>
    <div class="cb"></div>
  </div>
  <div class="cb"></div>
</div>
<script type="text/javascript">var Page='inner';</script> 
<?php $this->load->view('bottom_application'); ?>