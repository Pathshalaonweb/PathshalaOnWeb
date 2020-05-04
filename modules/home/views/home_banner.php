<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="slider-area">
  <div class="slider-active-2 owl-carousel nav-style-2">
    <?php 
	$sql="SELECT * FROM wl_slide_banners WHERE status='1' AND banner_image!=''";
	$banner_query=$this->db->query($sql);
	if($banner_query->num_rows()>0):
	$list_banner=$banner_query->result_array();
	//print_r($list_banner);die;
	foreach($list_banner as $key_ban=>$val_ban):
	$product_path = "banner/".$val_ban['banner_image'];
	?>
    <div class="single-slider slider-height-3 bg-img pt-170" style="background-image:url('<?php echo base_url().'uploaded_files/'.$product_path;?>');">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 col-md-7 col-12 col-sm-12">
            <div class="slider-content-3 slider-animated-2 pt-115 ml-55">
              <h1 class="animated"><?php echo $val_ban['banner_title'];?></h1>
              <p class="animated"><?php echo $val_ban['detail'];?></p>
              <div class="slider-btn"> <a class="animated default-btn btn-green-color" href="<?php echo $val_ban['banner_url'];?>"><?php echo $val_ban['button_one'];?></a> <a class="animated default-btn btn-green-color" href="<?php echo $val_ban['bannerOther_url'];?>"><?php echo $val_ban['button_two'];?></a> </div>
            </div>
          </div>
        </div>
        </div>
    </div>
    <?php endforeach;?>
    <?php endif;?>
  </div>
</div>





