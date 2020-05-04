<?php $this->load->view("top_application");?>
<?php
//trace($res);
//trace($media_res);

$availableqty = ( $res['quantity'] - $res['used_quantity'] );					
$availableqty = ($availableqty < 0 )  ? 0 :  $availableqty;	
?>
<style type="text/css" media="screen">
<!--
@import url("<?php echo resource_url(); ?>zoom/magiczoomplus.css");
-->
</style>
<div class="container pt12">
  <div class="radius-5 bg-white shadow p12-16">
    <h1><?php echo char_limiter($res['product_name'],45);?></h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a> <?php	
echo category_breadcrumbs($res['category_id']);	
echo '<span class="pr2 fs14"> </span>'.$res['product_name'];    
?></p>
    <section><!--Starts-->
      <div class="w55 shadow mt20 radius-5 p15 fl"> 
        <!--Left-Part-Starts-->
        <div  class="fl ac w80"><div style="width:400px; height:330px; display:table-cell; vertical-align:middle; <?php if($res['media']==''){?>padding-left:115px;<?php }?>" >
        
		<?php if($res['media']!=''){ ?>
        <a href="<?php echo img_url();?>products/<?php echo $res['media'];?>"  rel="thumb-change:mouseover" class="MagicZoomPlus" id="Zoomer" title=""><?php }?>
        
        <img src="<?php echo get_image('products',$res['media'],'400','322','R'); ?>" alt="<?php echo $res['product_name'];?>" class="db" class="vam" />
		
		<?php if($res['media']!=''){?></a><?php }?>
        
        </div>
        </div>
        
        
        <div class="o-hid fl w18">
          <ul class="list">
          <?php
$thumbc['width']        =  400;
$thumbc['height']       =  322;
$thumbc['source_path']  = UPLOAD_DIR.'/products/';	

if(is_array($media_res) && !empty($media_res))
{
	$ix =0;
	foreach($media_res as $v)
	{
		$cls = ($ix==0) ? "shadow1 p2" : "shadow1 p2 ml5";
		$thumbc['org_image']   =  $v['media'];  
		Image_thumb($thumbc,'R');
		$cache_file = "thumb_".$thumbc['width']."_".$thumbc['height']."_".$thumbc['org_image'];	
		$catch_img_url = thumb_cache_url().$cache_file; 
		
		?>
            <div><li><a href="<?php echo img_url();?>products/<?php echo $v['media'];?>" rel="zoom-id:Zoomer" rev="<?php echo $catch_img_url;?>"><img src="<?php echo get_image('products',$v['media'],'80','64','R'); ?>" alt="<?php echo $res['product_name'];?>" /></a></li></div>
        <?php
	}
}
?>
          </ul>
        </div>
        <div class="cb"></div>
        <!--Left-Part-Ends--> 
      </div>
      <?php echo form_open("cart/add_to_cart/".$res['products_id'],'name="cart_frm"');?> 
      <div class="w35 shadow radius-5 mt20 p20 ml20 fl"> 
        <!--Right-Part-Starts-->
        <div class="bdrBtm p10 treb"><strong>Product Code :</strong> <?php echo $res['product_code'];?></div>
        <div class="bdrBtm p10 treb"><strong>Price :</strong> 
        <?php 
		if($res['product_discounted_price']!= '0.0000'){
			$you_save = you_save($res['product_price'],$res['product_discounted_price']);
		?> 
        <span class="WebRupee fs20 black">Rs</span> <span class="b fs20 red">  <?php  echo number_format($res['product_discounted_price'],2); ?></span>
      
       <?php }else{?>
      <span class="WebRupee fs20 black">Rs</span> <span class="b fs20 red"> <?php  echo number_format($res['product_price'],2); ?></span>
    <?php }?>
          <div class="cb"></div>
        </div>
        <?php $i='1'?>
        <div class="bdrBtm p10 treb">Quantity : <a href="javascript:void(0)" class="fs20" onclick="return decrement('qty_<?php echo $i;?>')">-</a>
          <input name="qty" id="qty_<?php echo $i;?>" type="text" class="p5 w5" value="1" readonly>
          <a href="javascript:void(0)" class="fs18" onclick="return increment('qty_<?php echo $i;?>')">+</a> </div>
        <div class="shadow2 lh20px fs11 mt20 radius-5">
         <input type="hidden" id="aval_qty" name="aval_qty" value="50" />
          <p class="abel fs24 b">Description</p>
          <div class="fs11 mt10">
		<?php 
	   $strlen=strlen(strip_tags($res['products_description']));
	   echo $str=substr(strip_tags($res['products_description']),0,150);
	   if($strlen > 150){?>
		  <span class="networks fs11 hand red">Read More</span>
         
            <div class="mt10 all_networks fs11 dn"><?php echo $str=substr(strip_tags($res['products_description']),150);?>
             <span class="cl_btn vam red hand">Read Less </span></div>
             <?php }?>
          </div> 
        </div>
        <div class="mt20">
          <p class="fs12 b arial"><a href="<?php echo base_url();?>pages/refer_to_friends/<?php echo $res['products_id'];?>"  class="refer button-style1">Refer To Friend</a> &nbsp;&nbsp;<a href="<?php echo base_url();?>cart/add_to_wishlist/<?php echo $res['products_id'];?>"  class="button-style1">Add to Wish List</a><br /><br />
          <a href="javascript:void(0);" onclick="document.cart_frm.submit();"><img src="<?php echo theme_url(); ?>images/addtocart.png" width="113" height="33" alt="add-to-cart" class="vam"></a></p>
        </div>
        <!--Right-Part-Ends--> 
      </div>
      <?php echo form_close();?>
      <div class="cb"></div>
      <!--Ends--></section>
      
<?php if(is_array($related_products) && !empty($related_products) )
	{
		$k=1;
	?>
      
    <h2>Related Products</h2>
     <?php if(count($related_products)>3){?><div class="abs z99"><a href="javascript:void(0)" class="prev1">&nbsp;</a> <a href="javascript:void(0)" class="next1">&nbsp;</a></div><?php }?>
    <section class="<?php if(count($related_products)>3){?>related-products<?php }?>">
      <ul class="list1">
    <?php
		$ix=1;
		foreach($related_products as $val){
			$link_url=base_url()."products/detail/".$val['products_id'];	
			$availableqty = ( $val['quantity'] - $val['used_quantity'] );					
			$availableqty = ($availableqty < 0 )  ? 0 :  $availableqty;	
  ?>
        
        <li>
        <?php echo form_open('cart/add_to_cart/'.$val['products_id'],'name="cartForm'.$ix.'"');?>
          <div class="fl prod-box-listing">
            <figure>
              <div><a href="<?php echo $link_url;?>"><img src="<?php echo get_image('products',$val['media'],'174','131','R'); ?>" alt="" class="vam"></a></div>
              <figcaption><a href="<?php echo $link_url;?>"><?php echo char_limiter($val['product_name'],40);?></a></figcaption>
            </figure>
            <?php if( $val['product_discounted_price']!= '0.0000'){ 
             ?>
            <p class="mt4 fs13 b blue ac">MRP : <?php  echo display_price($val['product_discounted_price']); ?></p>
            <?php
            }else
            {
            ?>
            <p class="mt4 fs13 b blue ac">MRP : <?php  echo display_price($val['product_price']); ?></p>
            <?php }?>
            <p class="mt5 mb3 ac"> <input type="image" src="<?php echo theme_url(); ?>images/addtocart.png" alt="" /></p>
          </div>
          <input type="hidden" name="prod_id" value="<?php echo $val['products_id'];?>" />
           <?php echo form_close();?>
        </li>
        
       
        <?php $k++;$ix++;}?>
        
      </ul>
      <div class="cb"></div>
      <!--Related-Products-Ends--></section>
      
   <?php }?>
      
 <?php $this->load->view('footer_banner');?>
 
  </div>
  <div class="cb"></div>
</div>
<script type="text/javascript">var Page='details'; /*  | detail */</script> 
<?php $this->load->view("bottom_application");?>