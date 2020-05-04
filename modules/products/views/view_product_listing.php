<?php $this->load->view("top_application");?>
<div class="container pt12">

	<?php $this->load->view('left_pannel');?>
	<div class="fr w770p">
    <div class="radius-5 bg-white shadow p12-16" id="my_data">
      <h1><?php echo $heading_title;?></h1>
      <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a> <?php
	$segment=3;
    $catid = (int)$this->uri->segment(3,0);
	if($catid )
	{
		 echo category_breadcrumbs($catid,$segment);
		 
	}
	else
	{
		echo '<span class="pr2 fs14"></span>'.$heading_title;
	}   
    ?></p>
    <?php if(is_array($res) && !empty($res)){?>
    <?php echo form_open(current_url_query_string(),'id="myform" method="get" ');?> 
      <div class="p10 mt15 mb10 ac pagin"><!--Paging-Starts-->
        <div class="w50 fl mt3">
		<p class="pagin"><?php echo $page_links; ?></p>
        </div>
        <p class="fr w25 fs11  ar">
          <strong>Showing :</strong> <?php echo front_record_per_page('per_page1','pagesize'); ?>
        </p>
        <div class="cb"></div>
        <!--Paging-Ends--></div>
        <?php echo form_close();?>
        <?php }?>
        
      <section class="mt10 mb10"><!--Category-Starts-->
      
      <?php
		if(is_array($res) && !empty($res))
		{
       $ix=0;					
	
      	   foreach($res as $val)
		   {
			    $link_url=base_url()."products/detail/".$val['products_id'];
			    $availableqty = ( $val['quantity'] - $val['used_quantity'] );					
				$availableqty = ($availableqty < 0 )  ? 0 :  $availableqty;	
	 ?>
     
      <?php echo form_open('cart/add_to_cart/'.$val['products_id'],'name="cartForm'.$ix.'"');?>
      <div class="fl prod-box-listing">
        <figure>
          <div><a href="<?php echo $link_url;?>"><img src="<?php echo get_image('products',$val['media'],'174','131','R'); ?>" alt="<?php echo $val['product_name'];?>" class="vam"></a></div>
          <figcaption><a href="<?php echo $link_url;?>" title="<?php echo $val['product_name'];?>">
		  <?php echo char_limiter(strip_tags($val['product_name']),40);?></a></figcaption>
        </figure>
       
        <?php if( $val['product_discounted_price']!= '0.0000')
			 { 
			 ?>
         <p class="mt4 fs13 b blue ac">MRP : <?php  echo display_price($val['product_discounted_price']); ?></p>
         <?php
		}else{
		?>
		 <p class="mt4 fs13 b blue ac">MRP : <?php  echo display_price($val['product_price']); ?></p>
		 <?php }?>
    <p class="mt5 mb3 ac">
    <input type="image" src="<?php echo theme_url(); ?>images/addtocart.png" alt="" />
    </p>
      </div>
      <input type="hidden" name="prod_id" value="<?php echo $val['products_id'];?>" />
     <?php echo form_close();?>
      <?php if( $ix==2) {  echo ' <div class="cb"></div>';  $ix=0; }else{ $ix++; }
		}}else
		{
			echo '<strong>No Records Here.</strong>';
		}
?>
    
      
      <div class="cb"></div>
      
      <div class="cb"></div>
      
      <div class="cb"></div>
      <?php if(is_array($res) && !empty($res)){?>
      <?php echo form_open(current_url_query_string(),'id="myform" method="get" ');?> 
      <div class="p10 mt15 mb10 ac pagin"><!--Paging-Starts-->
        <div class="w50 fl mt3">
		<p class="pagin"><?php echo $page_links; ?></p>
        </div>
        <p class="fr w25 fs11  ar">
          <strong>Showing :</strong> <?php echo front_record_per_page('per_page1','pagesize'); ?>
        </p>
        <div class="cb"></div>
        <!--Paging-Ends--></div>
        <?php echo form_close();?>
        <?php }?>
<!--Category-Ends--></section>
    </div>
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
<script type="text/javascript">var Page=''; /*  | detail */</script> 
<?php $this->load->view("bottom_application");?>