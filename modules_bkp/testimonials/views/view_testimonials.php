<?php $this->load->view('top_application'); ?>

<div class="container pt12">
<?php echo form_open(current_url_query_string(),'id="myform" method="get" ');?> 
  <div class="radius-5 rel bg-white shadow p15" id="my_data">
   <p class="fr abs" style="left:50%"><a href="<?php echo base_url();?>testimonials/post" class="post-testimonial"><img src="<?php echo theme_url(); ?>images/post-testimonial.png" width="134" height="115" alt="post testimonial"></a></p>
    <h1>Testimonials</h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a>Testimonials</p>
    <?php if(is_array($res) && !empty($res)){?>
    <div class="p10 mt15 mb10 ac pagin"><!--Paging-Starts-->
        <div class="w50 fl mt3">
		<p class="pagin"><?php echo $page_links; ?></p>
        </div>
        <p class="fr w25 fs11  ar">
          <strong>Showing :</strong> <?php echo front_record_per_page('per_page1','pagesize'); ?>
        </p>
        <div class="cb"></div>
        <!--Paging-Ends--></div>
        <?php }?>
    <div class="mt10">
      <!--Testimonials-Starts-->
      
      <?php
if(is_array($res) && !empty($res))
{
	foreach($res as $val)
	{
		?>
      <div class="mt30">
        <!--Starts-->
        <div class="shadow1 rel p25">
          <p  class="quote-icon fl"></p>
          <p class="fs16 lh30px geor i"><span class="ml70"></span><?php echo char_limiter($val['testimonial_description'],320);?></p>
          <p class="fs14 geor i  blue mt8 u fr  p3 bdr"><a href="<?php echo base_url();?>testimonials/details/<?php echo $val['testimonial_id'];?>">Read the rest»</a></p>
          <div class="cb"></div>
          <p class="testi-drop"></p>
        </div>
        <p class="mt10 geor fs16 mr10 mt15 i ar"><?php echo $val['poster_name'];?></p>
        <p class="ar mr20 fs11 mt5"><?php echo getDateFormat($val['posted_date'],1);?></p>
        <!--Ends-->
      </div>
      <?php
	}
}else
{
	?>
    <div class="mt60 ac"><strong>Sorry, No Records Here.</strong></div>
    <?php 
}
?>
      
      <div class="cb"></div>
      <!--Testimonials-Ends-->
    </div>
     <?php if(is_array($res) && !empty($res)){?>
    <div class="p10 mt15 mb10 ac pagin"><!--Paging-Starts-->
        <div class="w50 fl mt3">
		<p class="pagin"><?php echo $page_links; ?></p>
        </div>
        <p class="fr w25 fs11  ar">
          <strong>Showing :</strong> <?php echo front_record_per_page('per_page1','pagesize'); ?>
        </p>
        <div class="cb"></div>
        <!--Paging-Ends--></div>
        <?php }?>
    <div class="cb"></div>
  </div>
  <?php echo form_close();?>
  <div class="cb"></div>
</div>
<script>
jQuery(document).ready(function(e) {
  jQuery('[id ^="per_page"]').live('change',function(){		
		$("[id ^='per_page'] option[value=" + jQuery(this).val() + "]").attr('selected', 'selected'); jQuery('#myform').submit();
	});	
});
</script>
<script type="text/javascript">var Page='inner';</script>
<?php $this->load->view('bottom_application'); ?>