<?php $this->load->view('top_application'); ?>
<div class="container pt12">
<?php echo form_open(current_url_query_string(),'id="myform" method="get" ');?> 
  <div class="radius-5 bg-white shadow p15" id="my_data">
    <h1>FAQ's</h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a> FAQ's</p>
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
      <!--FAQ-Starts-->
      
      <?php
if(is_array($res) && !empty($res))
{
	foreach($res as $val)
	{
		
		?>
      <div class="bg-faq shadow1">
        <p class="abel fs20 b">Q. <?php echo $val['faq_question'];?></p>
        <div class="radius-5 bg2 fs12 mt14 lh20px p10 bgW"><strong>Ans.</strong> <?php echo $val['faq_answer'];?> </div>
      </div>
      <?php
	}
}
else
{
	?>
    <div class="mt30 ac"><strong>Sorry, No Faq's Here.</strong></div>
    <?php
}
?> 
      <!--FAQ-Ends-->
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