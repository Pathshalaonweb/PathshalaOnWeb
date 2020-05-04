<?php $this->load->view("top_application");?>



<div class="deilbg">
<div class="container">
<div class="row">
<div class="deve">
<h2 class="white ffb pt20 "><i><?php echo $heading_title;?></i></i></h2>
</div>


</div>
</div>
</div>

<div class="breadcrumb-box">
<div class="container">
<ul class="breadcrumb">
<li><a href="<?php echo base_url();?>">Home</a></li>

<?php
						$segment=3;
						$catid = (int)$this->uri->segment(3,0);
						if($catid )
						{
							 echo category_breadcrumbs($catid,$segment);
							 
						}else
						{
							echo '<li>Categories</li>';
						}   
						?>



</ul>	
</div>
</div>















<section id="main">
<div class="container">

<div class="row">




<div class="products-tab bottom-padding bottom-padding-mini text-center">



<?php
if(is_array($res) && !empty($res))
{
$ix=0;					

foreach($res as $val)
{
$link_url=base_url()."search?category_id=".$val['category_id'];
// $availableqty = ( $val['quantity'] - $val['used_quantity'] );					
//$availableqty = ($availableqty < 0 )  ? 0 :  $availableqty;	




?>


<div class="col-sm-3 col-md-3 product rotation">


<div class="default">
<a href="<?php echo $link_url;?>" class="product-image">
<img src="<?php echo get_image('category',$val['category_image'],'270','270','R'); ?>">
</a>
<div class="product-description">
<div class="vertical">
<h3 class="product-name">
<a href="<?php echo $link_url;?>"><?=$val['category_name'];?></a>
</h3>

</div>
</div>
</div>
<div class="product-hover">
<h3 class="product-name">
<a href="<?php echo $link_url;?>"><?=$val['category_name'];?></a>
</h3>
<a href="<?php echo $link_url;?>" class="product-image">
<img src="<?=base_url();?>uploaded_files/category/<?php echo $val['category_image'];?>" alt="" title="" width="70" height="70" style="height:70px;">
</a>
<ul class="ffr">
<!--<li>117 cm / 46"LCD TV</li>
<li>Full HD 3D &amp; 2D</li>
<li>Sony Internet TV</li>
<li>Dynamic Edge LED</li>
<li>1X-Reality PRO</li>-->
<li><?=$val['category_description'];?></li>
</ul>




<div class="actions">
<a href="<?php echo $link_url;?>" class="add-compare">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
<path fill="#1e1e1e" d="M16,3.063L13,0v2H1C0.447,2,0,2.447,0,3s0.447,1,1,1h12v2L16,3.063z"></path>
<path fill="#1e1e1e" d="M16,13.063L13,10v2H1c-0.553,0-1,0.447-1,1s0.447,1,1,1h12v2L16,13.063z"></path>
<path fill="#1e1e1e" d="M15,7H3V5L0,7.938L3,11V9h12c0.553,0,1-0.447,1-1S15.553,7,15,7z"></path>
</svg>
</a>
</div><!-- .actions -->
</div><!-- .product-hover -->
</div><!-- .product -->


<?php

}}
else{
echo '<strong>No Records Here.</strong>';
}
?>

</div><!-- #best-sellers -->



</div>
</div>



</section>





<?php $this->load->view("bottom_application");?>