<footer>
<div class="bg-footer mt8">
<div class="container pt10">
<p class="jockey fs16 ttu green h42"><a href="<?php echo base_url();?>" class="p0-10">Home</a> <a href="<?php echo base_url();?>pages/aboutus" class="p0-10">About Us</a> <a href="<?php echo base_url();?>pages/contactus" class="p0-10">Contact Us</a> <a href="<?php echo base_url();?>faq" class="p0-10">FAQ's</a> <a href="<?php echo base_url();?>testimonials" class="p0-10">Testimonials</a> <?php if($this->session->userdata('user_id') > 0 ){?><a href="<?php echo base_url();?>users/logout" class="p0-10">Logout</a> <a href="<?php echo base_url();?>members/myaccount" class="p0-10">My Account</a><?php }else{?><a href="<?php echo base_url();?>users/login" class="p0-10">Login</a> <a href="<?php echo base_url();?>/users/register" class="p0-10">Register</a><?php }?> <a href="#' " onmouseover="return addthis_open(this, '', '[URL]', '[TITLE]')" onmouseout="addthis_close()" onclick="return addthis_sendto()"  class="p0-10">Bookmark Us</a> <a href="<?php echo base_url();?>pages/sitemap" class="p0-10">Sitemap</a></p>

<div class="pt10 pb25">
	<div class="fl w70">
	<p class="b fs16 arial ml2">Policy Info</p>
    <p class="fs11 verd mt5"><a href="<?php echo base_url();?>pages/privacy_policy" class="p0-3">Privacy Policy</a> | <a href="<?php echo base_url();?>pages/terms_conditions" class="p0-3">Terms &amp; Conditions</a> | <a href="<?php echo base_url();?>cart" class="p0-3">My Shopping Cart</a> | <a href="<?php echo base_url();?>pages/payment_method" class="p0-3">Payment Options</a> | <a href="<?php echo base_url();?>pages/refer_to_friends" class="p0-3 refer">Refer To Friend</a></p>
    
    <?php
    $cat_limit = 0;
    $this->load->model(array('category/category_model'));
    $condtion_array = array(
    'field' =>"*,(  SELECT COUNT(category_id) FROM wl_categories AS b
            		WHERE b.parent_id=a.category_id ) AS total_subcategories",
            		'condition'=>"AND parent_id = '0' AND status='1' ",
    				'condition'=>"AND parent_id = '0' AND status='1' ",
    				'limit'=>$cat_limit,
    				'offset'=>0,
    				'debug'=>FALSE
    );	
    $cat_res            = $this->category_model->getcategory($condtion_array);
    $total_cat_found	= $this->category_model->total_rec_found;	
    if( is_array($cat_res) && !empty($cat_res))
        {
		?>
    <p class="b fs16 arial mt14">Categories</p>
    <p class="fs11 verd mt5 lh18px">
    <?php
        
			$i=0;
			foreach($cat_res as $v)
			{
				
			   $total_subcategories = $v['total_subcategories'];
			   
				if($total_subcategories>0)
				{				
				  $link_url = base_url()."category/index/".$v['category_id'];	
				
				}else
				{			
				   $link_url = base_url()."products/index/".$v['category_id'];	
				}
        
        ?>
    <a href="<?php echo $link_url;?>" title="<?php echo $v['category_name'];?>" ><?php echo strip_tags($v['category_name']);?></a> | 
    <?php }?>
         
     <?php if(count($cat_res) > 17){?><span class="pink b"><a href="<?php echo base_url();?>category">View All</a></span><?php }?></p>
     <?php }?>
     
    <div class="mt27">
    <p class="fl fs17 lh15px">100% Secure Payments<br> <span class="fs11">All major credit &amp; debit cards accepted</span></p>
    <p class="fl ml28"><img src="<?php echo theme_url(); ?>images/cards.jpg" alt=""></p>
    <p class="cb"></p>
    </div>
    </div>
    
    <div class="fr w20"><a href="<?php echo base_url();?>"><img src="<?php echo theme_url(); ?>images/spacer.gif" alt="" width="220px" height="190px" border="0"></a></div>
    <p class="cb"></p>
</div>

<div id="tooplate_cr_wrapper">
	<div id="tooplate_cr">
    	
        Copyright @ <?php echo date('Y');?> <a href="<?php echo base_url();?>">www.pathshala.co</a> - <a href="#">PerfectInfotech</a> by <a href="#">Website</a>
</div>
</div>
</footer>