<?php
$cat_limit = 0;
$this->load->model(array('category/category_model'));
$condtion_array = array(
'field' =>"*,( SELECT COUNT(category_id) FROM wl_categories AS b
		WHERE b.parent_id=a.category_id ) AS total_subcategories",
		'condition'=>"AND parent_id = '0' AND status='1' ",
'condition'=>"AND parent_id = '0' AND status='1' ",
'limit'=>$cat_limit,
'offset'=>0,
'debug'=>FALSE
);	
$cat_res            = $this->category_model->getcategory($condtion_array);
$total_cat_found	=  $this->category_model->total_rec_found;	
?>

<div class="bg-white radius-5 shadow p11-19">
    <p class="jockey fs20 pink">CATEGORIES</p>
    <p class="mt3 catelist ttu">
   <?php
        if( is_array($cat_res) && !empty($cat_res)){
			$i=0;
			foreach($cat_res as $v){
				$total_subcategories = $v['total_subcategories'];
			    if($total_subcategories>0){				
				  $link_url = base_url()."category/index/".$v['category_id'];	
				}else{			
				   $link_url = base_url()."products/index/".$v['category_id'];	
				}
        ?>
<a href="<?php echo $link_url;?>" title="<?php echo $v['category_name'];?>" ><?php echo character_limiter(strip_tags($v['category_name']),15);?></a>
           
<?php
   $i++;}}else{
	echo "<strong>No Category Here.</strong>";
}
?>
</p>

<?php if( is_array($cat_res) && !empty($cat_res)){?>
    <p class="mt11">
    <?php if(count($cat_res) > 17){?><a href="<?php echo base_url();?>category" class="btn">View All</a>,<?php }?>
    </p>
 <?php }?>
</div>