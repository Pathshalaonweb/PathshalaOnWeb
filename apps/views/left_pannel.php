<div class="fl w200p">
    <?php $this->load->view("category/category_left_view");?>
    
    <div class="bg-white radius-5 shadow mt8 p11-19">
    <p class="jockey fs20 pink">SHOP BY PRICE</p>
    <p class="mt3 catelist">
    <?php foreach($this->config->item('price_range') as $key_price=>$val_price)
		{?>
        	<a href="<?php echo base_url();?>search?prange=<?php echo $key_price;?>"><?php echo $val_price;?></a>
  <?php }?>
    
    </p>
    </div>
    
<?php  
$fea_test_query=$this->db->query("SELECT * FROM wl_testimonial WHERE status='1' AND featured='Y' ORDER BY RAND() LIMIT 1");
	   if($fea_test_query->num_rows()>0){
		   $list_test=$fea_test_query->result_array();
?>
    <div class="mt14">
    <p class="fr b mt15 pink"><a href="<?php echo base_url();?>testimonials">View All</a></p>
    <p class="jockey fs20 ml10">Testimonials</p>
    <?php 
	 foreach($list_test as $key_test=>$val_test){
	 $detail_linnk="testimonials/details/".$val_test['testimonial_id'];
	?>
    <div class="bg-testi mt6 i lh18px geor">
	
	<?php $strlen=strlen(strip_tags($val_test['testimonial_description']));
		  echo $str=substr(strip_tags($val_test['testimonial_description']),0,100);?></div>
    <p class="fs11 b blue mt3 ml10"><?php echo $val_test['poster_name'];?></p>
    <?php if($strlen > 100){?><p class="ar b fs11 black"><a href="<?php echo $detail_linnk;?>">Read More</a></p><?php }?>
    <?php }?>
    </div>
    <?php }?>
   <?php echo $this->load->view('pages/newsletter'); ?>
    </div>