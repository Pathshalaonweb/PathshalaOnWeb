<div class="mt15 bg-white p2 radius-5">


<?php
$curr_url=explode('.',current_url());
$bottom1_query=$this->db->query("SELECT * FROM wl_banners WHERE status='1' AND banner_position='Bottom1' AND (banner_url='".$curr_url[0]."' OR banner_url='".current_url()."' OR banner_url='".base_url().$this->uri->uri_string()."') ORDER BY RAND() LIMIT 0,1 ");

if($bottom1_query->num_rows()>0){
	$list_banner1=$bottom1_query->result_array();
	foreach($list_banner1 as $key_ban=>$val_ban){
		$product_path = "banner/".$val_ban['banner_image'];
?>
<img src="<?php echo base_url().'uploaded_files/'.$product_path;?>" width="312" height="104" alt="" class="mr5"/> 
<?php }}

else{?>
<img src="<?php echo theme_url(); ?>images/bt-bnr_01.jpg" alt="" width="312" height="104"  class="mr5"/>
<?php }

$bottom2_query=$this->db->query("SELECT * FROM wl_banners WHERE status='1' AND banner_position='Bottom2' AND (banner_url='".$curr_url[0]."' OR banner_url='".current_url()."' OR banner_url='".base_url().$this->uri->uri_string()."') ORDER BY RAND() LIMIT 0,1 ");

if($bottom2_query->num_rows()>0){
	$list_banner2=$bottom2_query->result_array();
	foreach($list_banner2 as $key_ban2=>$val_ban2){
		$product_path2 = "banner/".$val_ban2['banner_image'];

?>
<img src="<?php echo base_url().'uploaded_files/'.$product_path2;?>" alt="" width="317" height="104" class="ml3 mr7" />
<?php }}else{?>
<img src="<?php echo theme_url(); ?>images/bt-bnr_02.jpg" alt="" width="317" height="104" class="ml3 mr7" />
<?php }

$bottom3_query=$this->db->query("SELECT * FROM wl_banners WHERE status='1' AND banner_position='Bottom3' AND (banner_url='".$curr_url[0]."' OR banner_url='".current_url()."' OR banner_url='".base_url().$this->uri->uri_string()."') ORDER BY RAND() LIMIT 0,1 ");


$page_width=($this->uri->segment(2)=='detail') ? '292' :'322';

if($bottom3_query->num_rows()>0)
{
	$list_banner3=$bottom3_query->result_array();
	
	
	
	foreach($list_banner3 as $key_ban3=>$val_ban3)
	{
		$product_path3 = "banner/".$val_ban3['banner_image'];

?>
<img src="<?php echo base_url().'uploaded_files/'.$product_path3;?>" alt="" width="<?php echo $page_width;?>" height="104" />
<?php }}else{?>
<img src="<?php echo theme_url(); ?>images/bt-bnr_03.jpg" width="<?php echo $page_width;?>" height="104" alt="" />
<?php }?>
</div>