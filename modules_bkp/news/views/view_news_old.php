<?php $this->load->view('top_application'); ?>

<div class="container pt12">
<?php echo form_open(current_url_query_string(),'id="myform" method="get" ');?> 
  <div class="radius-5 bg-white shadow p15" id="my_data">
    <h1>News</h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a> News</p>
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
      
         <?php
if(is_array($res) && !empty($res))
{
	foreach($res as $val)
	{
		$uri_title = base_url().'news/details/'.$val['news_id'];
		?>
      
      <div class="mt10 bg-green p15 radius-5">
        <!--News-Starts-->
        <p class="fs17 arl lht-28 black geor"><a href="<?php echo $uri_title;?>"><?php echo $val['news_title'];?></a></p>
        <p class="fs11 tahoma white mt10"><span class=" bg3 p5 ">Posted On : <?php echo getDateFormat($val['recv_date'],1);?></span></p>
        <div class="pb5 mt10">
          <p class="fs14 lh22px geor i black ml1">&quot;<?php echo char_limiter($val['news_description'],220);?>&quot; </p>
          <p class="fs14 geor i  blue mt8"><a href="<?php echo $uri_title;?>">Read the rest»</a></p>
        </div>
        <!--News-Ends-->
      </div>
      
      <?php
	}
}else
{
	?>
    <div class="mt30 ac"><strong>Sorry, No Records Here.</strong></div>
    <?php 
}
?>
      
    </div>
    <?php if(is_array($res) && !empty($res)){?>
    <div class="p10 mt15 mb10 ac pagin"><!--Paging-Starts-->
        <div class="w0 fl mt3">
		<p class="pagin"><?php echo $page_links; ?></p>
        </div>
        <p class="fr w25 fs11  ar">
          <strong>Showing :</strong> <?php echo front_record_per_page('per_page','pagesize'); ?>
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