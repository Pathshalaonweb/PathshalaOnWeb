<?php $this->load->view("top_application");?>
<div class="container pt12">
<?php $this->load->view('left_pannel');?>
<!-- #EndLibraryItem -->
<div class="fr w770p">
	<?php 
	$banner_query=$this->db->query("SELECT * FROM wl_slide_banners WHERE status='1' AND banner_image!=''");
	if($banner_query->num_rows()>0){
		
	$list_banner=$banner_query->result_array();
	?>
    <div class="fl fluid_container banner_area">
    <div class="fluid_dg_wrap fluid_dg_charcoal_skin banner_area" id="fluid_dg_wrap_1">
    <?php     
	          foreach($list_banner as $key_ban=>$val_ban){
			  $product_path = "banner/".$val_ban['banner_image'];
	?>
    		<div data-src="<?php echo base_url().'uploaded_files/'.$product_path;?>"></div>
   <?php }?>
    </div>
    </div>
    <?php }?>
    
    <?php 
		if(is_array($new_arrival) && !empty($new_arrival) && $total_new_arrival > 0)
		{
		?>
    
    <div class="fr bg-pink radius-3 w192p p7-15">
    <p class="fs11 tahoma yel fr ttu tahoma b mt9"><a href="<?php echo base_url();?>products/index/new-arrival">View All</a></p>
    <p class="jockey fs20 ttu white">New ArrivAls</p>
    
	<?php 
	foreach($new_arrival as $key_arr=>$val_arr){
	?>
  
  <?php echo form_open("cart/add_to_cart/".$val_arr['products_id'],'name="cart_frm"');?>
    <p class="p5 bg-white radius-7 shadow mt5 ac w182p h152"><img src="<?php echo get_image('products',$val_arr['media'],'183','148','R'); ?>" alt="" class="vam"><img src="<?php echo theme_url(); ?>images/spacer.gif" width="1" height="148px;" alt="" class="vam"></p>
    <p class="ac white mt5 fs13"><?php echo character_limiter(strip_tags($val_arr['product_name']),20);?></p>
     <?php if( $val_arr['product_discounted_price']!= '0.0000')
			 { 
			 ?>
    <p class="mt12 fs13 b yel ac">MRP : <?php  echo display_price($val_arr['product_discounted_price']); ?></p>
    <?php
		}
		else
		{
		?>
         <p class="mt12 fs13 b yel ac">MRP : <?php  echo display_price($val_arr['product_price']); ?></p>
         <?php }?>
    <p class="mt11 mb3 ac"><a href="javascript:void(0);" class="btn" onclick="document.cart_frm.submit();">Add to Cart</a></p>
   <input type="hidden" name="products_id" value="<?php echo $val_arr['products_id']?>" />
   <?php echo form_close();?>
    <?php }?>
     
    </div>
    <?php }?>
    <p class="cb"></p>
    
    <div class="mt7 radius-5 bg-white shadow p12-16">
    <p><img src="<?php echo theme_url(); ?>images/welcome.jpg" alt=""></p>
    <?php $home_content=get_db_single_row('wl_cms_pages',$fields="page_description",$condition="WHERE 1 AND page_id=1");?>
    <p class="lh20px"><?php echo character_limiter(strip_tags($home_content['page_description']),600);?></p>
    <p class="mt7"><a href="<?php echo base_url();?>pages/aboutus" class="btn">Read More</a></p>
    </div>
    
    <div class="mt10 bg-green radius-5 p6">
     <?php if(is_array($featured_product) && !empty($featured_product)){?><p class="fr b fs11 pink ttu mt10 mr10"><a href="<?php echo base_url();?>products/index/featured-products">View All</a></p><?php }?>
    <p class="jockey fs20 ttu ml10">Featured Products</p>
    
    <?php 
	
	if(is_array($featured_product) && !empty($featured_product)){
	$ix=1;
	foreach($featured_product as $key_fea=>$val_fea){
	$link_url=base_url()."products/detail/".$val_fea['products_id'];
	
	?>
    
     <?php echo form_open('cart/add_to_cart/'.$val_fea['products_id'],'name="cartForm'.$ix.'"');?>
    <div class="fl w175p m3-7">
    <p class="p2 bg-white radius-7 shadow mt5 ac lh0em w166p h134"><a href="<?php echo $link_url;?>"><img src="<?php echo get_image('products',$val_fea['media'],'165','133','R'); ?>" alt="" class="vam"></a><img src="<?php echo theme_url(); ?>images/spacer.gif" width="1" height="133" alt="" class="vam"></p>
    <p class="ac black mt6 fs13 o-hid h35 lh18px"><a href="<?php echo $link_url;?>"><?php echo character_limiter(strip_tags($val_fea['product_name']),35);?></a></p>
    
	<?php if( $val_fea['product_discounted_price']!= '0.0000'){ ?>
    
    <p class="mt4 fs13 b blue ac">MRP : <?php  echo display_price($val_fea['product_discounted_price']); ?></p>
    <?php
		}else{
	?>
        <p class="mt4 fs13 b blue ac">MRP : <?php  echo display_price($val_fea['product_price']); ?></p>
    <?php }?>
    
    <p class="mt5 mb3 ac">
    <input type="image" src="<?php echo theme_url(); ?>images/addtocart.jpg" alt=""/>
    </p>
    </div>
    <input type="hidden" name="prod_id" value="<?php echo $val_fea['products_id']?>" />
    <?php echo form_close();?>
	<?php $ix++;}}else{?><div class="fl w175p m3-7"><strong>Sorry, No Products Here.</strong></div>
    <?php }?>
    <p class="cb"></p>
    
    </div>
  </div>
<p class="cb"></p>   
</div>
<script type="text/javascript">var Page='home'; /*  | detail */</script> 
<?php $this->load->view("bottom_application");?>