<?php $this->load->view("top_application");?>
<div class="container pt12"><div>

<?php if(is_numeric($this->uri->segment(3))){$this->load->view('left_pannel');}?>

<?php echo form_open(current_url_query_string(),'id="myform" method="get" ');?> 
<div class="aj <?php if(is_numeric($this->uri->segment(3))){echo 'fr w770p';}?>" id="my_data">
    <div class="radius-5 bg-white shadow p8">
    <?php
	if(is_numeric($this->uri->segment(3)))
	{
		$cat_name=get_db_single_row('wl_categories',$fields="category_name",$condition="WHERE 1 AND category_id='".$this->uri->segment(3)."'");
		$cat_name=$cat_name['category_name'];
	}
	else
	{
		$cat_name="Categories";
	}
	?>
      <h1><?php echo $cat_name;?></h1>
      <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a>  <?php
						$segment=3;
						$catid = (int)$this->uri->segment(3,0);
						if($catid )
						{
							 echo category_breadcrumbs($catid,$segment);
							 
						}else
						{
							echo '<span class="pr2 fs14"> </span> Categories';
						}   
						?> </p>
      
<?php
if(is_array($res) && !empty($res) ){
?>
      <div class="p10 mt15 mb10 ac pagin"><!--Paging-Starts-->
        <div class="w50 fl mt3">
		<p class="pagin"><?php echo $page_links; ?></p>
        </div>
        <p class="fr w25 fs11  ar">
          <strong>Showing :</strong> <?php echo front_record_per_page('per_page1','pagesize'); ?>
        </p>
        <div class="cb"></div>
        <!--Paging-Ends--></div>
      <section class="mt10 mb10"><!--Category-Starts-->
      <?php

       		$ix=0;					
	
      	   foreach($res as $val)
		   {
		   					
		     $total_subcategories = $val['total_subcategories'];	
			 			
			if($total_subcategories>0)
			{				
				$link_url = base_url()."category/index/".$val['category_id'];	
			
			}else
			{			
				$link_url = base_url()."products/index/".$val['category_id'];	
			}
		   
	 ?>
      <div class="fl bdrRyt prod-box">
        <figure>
          <div><a href="<?php echo $link_url;?>"><img src="<?php echo get_image('category',$val['category_image'],'164','131','R'); ?>" alt="<?php echo $val['category_name'];?>" class="vam"></a></div>
          <figcaption><a href="<?php echo $link_url;?>"><?php echo character_limiter(strip_tags($val['category_name']),20);?></a></figcaption>
        </figure>
      </div>
     <?php
	 
	  if(is_numeric($this->uri->segment(3))){$rec_page=2;}else{$rec_page=3;}
	  if( $ix==$rec_page) { echo ' <div class="cb"></div>';  $ix=0; }else{ $ix++;}
    }
?>
     
      <div class="cb"></div>
      <div class="p10 mt15 mb10 ac pagin"><!--Paging-Starts-->
        <div class="w50 fl mt3">
		<p class="pagin"><?php echo $page_links; ?></p>
        </div>
        <p class="fr w25 fs11  ar">
          <strong>Showing :</strong> <?php echo front_record_per_page('per_page1','pagesize'); ?>
        </p>
        <div class="cb"></div>
        <!--Paging-Ends--></div>
<!--Category-Ends--></section>

<?php
}else
{	
	echo '<p class="ac b">'.$this->config->item('no_record_found').'</p>';	
}
?>
    </div>
    
    </div>
<?php echo form_close();?>
  </div>
  <div class="cb"></div>
   <?php $this->load->view('footer_banner');?>
</div>
<script>
jQuery(document).ready(function(e) {
  jQuery('[id ^="per_page"]').live('change',function(){		
		$("[id ^='per_page'] option[value=" + jQuery(this).val() + "]").attr('selected', 'selected'); jQuery('#myform').submit();
	});	
});
</script>
<script type="text/javascript">var Page='home'; /*  | detail */</script>
<?php $this->load->view("bottom_application");?>