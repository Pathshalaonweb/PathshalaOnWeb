<?php $this->load->view("top_application");?>
<?php /*?><div class="container pt12">
  <div class="radius-5 bg-white shadow p15">
    <h1>My Account</h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a> My Account</p>
    <?php echo error_message();?>
    <div class="mt10 rel">
    <!--Login-Section-Stars-->
    <?php $this->load->view("members/myaccount_left");?>
    <?php
	  $bill_info = $this->mres_address[0];
	  $ship_info = $this->mres_address[1];  
	  //trace($this->mres_address);
	  ?>
    <div class="w65 fr"><!--Right-Part-Starts-->
            <div class="p10 shadow1 radius-5">
              <p class="red Oswald fs14">Address:</p>
              <div class="tahoma w48 fl fs11 mt4">
                <p><strong class="lh18px">Billing Address</strong></p>
                <p class="fs12"><?php echo $bill_info['name'];?></p>
                <p class="mt3">Mobile : <?php echo $bill_info['phone'];?></p>
                <p class="mt5"><?php echo $bill_info['address'];?>, <?php echo $bill_info['city'];?>, <?php echo $bill_info['country'];?></p>
                <p class="mt5 red fs11"><a href="<?php echo base_url();?>members/edit_account#edit">[Edit]</a></p>
              </div>
              <div class="tahoma w48 fr fs11 mt4">
                <p><strong class="lh18px">Shipping Address</strong></p>
                <p class="fs12"><?php echo $ship_info['name'];?></p>
                <p class="mt3">Mobile : <?php echo $ship_info['phone'];?></p>
                <p class="mt5"><?php echo $ship_info['address'];?>, <?php echo $ship_info['city'];?>, <?php echo $ship_info['country'];?></p>
                <p class="mt5 red fs11"><a href="<?php echo base_url();?>members/edit_account#shipping">[Edit]</a></p>
                
              </div>
              <div class="cb"></div>
        </div>
            <h2 class="mt10">Order History</h2>
            <div class=" bg-green mt10 p10 shadow1 radius-5">
              <div class="bgG white p5 b treb ttu">
                <table class="w100">
                  <tr>
                    <td  class="w10  al"> S. No. </td>
                    <td  class="w25 al">OrdeR/invoice</td>
                    <td class="ac w10">Amount (<span class="WebRupee fs12 ">Rs</span>)</td>
                    <td class="ac w10" >status</td>
                  </tr>
                </table>
              </div>
              <div id="more_data" >
              <?php
				//trace($res);
				if( is_array($res) && !empty($res)){
					$i=1;
					foreach($res as $val){
							$total           =  $val['total_amount'];
							$discount_total  =  $val['coupon_discount_amount'];
							$shipping_total  =  $val['shipping_amount'];
							$total_tax_cal=(($total*$val['tax_amount'])/100);
							$gand_total      = ($total-$discount_total)+$shipping_total+$total_tax_cal;
						
						?>
              <div class="mt7">
                <table class="bdrAll w100">
                  <tr>
                    <td class="w10 al"><?php echo $i;?>.</td>
                    <td class="w28 al"><p class="red fs14"><a href="<?php echo base_url();?>members/print_invoice/<?php echo $val['order_id'];?>" class="invoice"><?php echo $val['invoice_number'];?></a></p>
                      <p class="grey1 ver fs11"><?php echo getDateFormat($val['order_received_date'],3);?></p></td>
                    <td class="ac w10"><strong> <?php echo display_price($gand_total);?></strong></td>
                    <td class="ac w10"><span class="i"><?php echo $val['order_status'];?></span></td>
                  </tr>
                </table>
              </div>
              <?php
 $i++;
	}
}
else
{
	 echo '<div class="mt7 b ac ">'.$this->config->item('no_record_found').'</div>';
}
?>
</div>
          <?php echo $more_link; ?>     
              
            </div>
            <div class="cb"></div>
            <?php if( is_array($res) && !empty($res)){
				
				?><p class="mt25 mb20 fr">
                
                <?php if(count($res)>4){?><a href="<?php echo base_url();?>members/orders_history" class="button-style">View All</a><?php }?></p><?php }?>
            <div class="cb"></div>
      <!--Right-Part-Ends--></div>
          <div class="cb"></div>
          
    <!--Login-Section-Ends--></div>
        
    <div class="cb"></div>
  </div>
  <div class="cb"></div>
</div><?php */?>
<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-3 pt-100 pb-95" style="background-image:url(<?php echo theme_url();?>img/bg/breadcrumb-bg-5.jpg);">
        <div class="container">
            <h2>My Account</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .</p>
        </div>
    </div>
    <div class="breadcrumb-bottom">
        <div class="container">
            <ul>
                <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-double-right"></i>My Account</span></li>
            </ul>
        </div>
    </div>
</div>
<div class="event-area my-acc pt-20 pb-130">
    <div class="container">
        <div class="row">
            <?php $this->load->view("myaccount_left");?>
            <div class="col-xl-9 col-lg-4">
                <div class="blog-all-wrap mr-40">
                   <h3> Hello, <?php echo $this->session->userdata('first_name');?></h3>
<p>
From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">var Page='inner';</script>
<?php $this->load->view("bottom_application");?>