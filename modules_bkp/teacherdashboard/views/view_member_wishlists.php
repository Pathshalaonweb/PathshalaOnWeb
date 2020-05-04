<?php $this->load->view("top_application");?>
<div class="container pt12">
  <div class="radius-5 bg-white shadow p15">
    <h1>My Favourite List</h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a><a href="<?php echo base_url();?>members/myaccount">My Account</a> My Favourite List</p>
    
    <div class="mt10 rel"><?php $this->load->view("members/myaccount_left");?><div class="w68 fr">
        <!--Right-Part-Starts-->
        <?php echo validation_message();?>
 		<?php echo error_message(); ?>
        <div class="aj bgW p15 shadow2 radius-5 ">
          <div class="bgG white p5 b treb ttu pt7 mt5">
            <table class="w100">
              <tr>
                <td class="w10"> S. No. </td>
                <td class="w47">pRODUCTS</td>
                <td class="w16">Unit Price ($)</td>
                <td class="w12">buy now</td>
                <td class="w8">REMOVE</td>
              </tr>
            </table>
          </div>
  <div id="more_data" >
          <?php 

	if( is_array($res) && !empty($res) )
	{ 
   
		$i=1;
		foreach( $res as $val )
		{
		    $link_url = base_url()."products/detail/".$val['products_id'];
			$condtion = " AND products_id =".$val['products_id']." AND media_type='photo' ORDER BY id ASC LIMIT 1";
			$media = get_db_field_value('wl_products_media',"media",$condtion);
	  ?>
          <div class="mt10">
            <table class="bdrAll w100">
              <tr>
                <td class="vat w5 al"><?php echo $i;?>.</td>
                <td class="w50 vam"><p class="red fs14 img-bg2 pl5"><a href="<?php echo $link_url;?>"><img src="<?php echo get_image('products',$media,'80','103','R'); ?>" class="fl mr8 bdr" alt="<?php echo $val['product_name'];?>"><?php echo $val['product_name'];?></a></p>
                  <p class="pt2 tahoma fs11 "><strong>Code</strong> : <?php echo $val['product_code'];?></p>
                  <p class="pt5 grey1 tahoma fs11 lht-15">&nbsp;</p></td>
                <td class="w16 ac vam">
                <?php if( $val['product_discounted_price']!= '0.0000'){ ?>
                <strong> <?php  echo display_price($val['product_discounted_price']); ?></strong>
                <?php }else{?>
               <strong> <?php  echo display_price($val['product_price']); ?></strong>
                <?php }?>
                </td>
                <td class="w12 ac vam"><a href="<?php echo $link_url;?>" class="button-style">Buy</a></td>
                <td class="w8 ac vam"><a href="<?php echo base_url();?>members/remove_wislist/<?php echo $val['wishlists_id'];?>" onclick="return confirm('Are you sure you want to remove this product from wislist');"><img src="<?php echo theme_url(); ?>images/close.png" width="10" height="10" alt=""></a></td>
              </tr>
            </table>
          </div>
          <?php 
   $i++;
	  }
	}else
	{
	   echo '<div class="mt7 b ac ">'.$this->config->item('no_record_found').'</div>';
    }
?>

</div>

<div class="mt10"> </div>
 <?php echo $more_link; ?>
          
          
          <div class="cb"></div>
        </div>
        <div class="cb"></div>
        <!--Right-Part-Ends-->
      </div>
      <div class="cb"></div>
          
    <!--Login-Section-Ends--></div>
        
    <div class="cb"></div>
  </div>
  <div class="cb"></div>
</div>
<script type="text/javascript">var Page='inner';</script> 
<?php $this->load->view("bottom_application");?>