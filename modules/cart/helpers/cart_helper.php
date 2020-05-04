<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('CI')){
	 
	function CI()
	{
		if (!function_exists('get_instance')) return FALSE;
		$CI =& get_instance();
		return $CI;
	}
}
 

function invoice_content ($ordmaster,$orddetail,$formPage='' )
{
	
		$bill_info = "<p style='margin-top:10px;'><strong >$ordmaster[billing_name]</strong></p>
		$ordmaster[billing_address],
		<br />
		$ordmaster[billing_city],<br />
		$ordmaster[billing_state] -$ordmaster[billing_country]  - $ordmaster[billing_zipcode]
		<br /><p style='font-weight:bold; font-size:11px; margin-top:10px;'>Phone:
		$ordmaster[billing_phone]</p>";
		
		$ship_info = "<p style='margin-top:10px;'><strong > $ordmaster[shipping_name]</strong></p>
		$ordmaster[shipping_address],
		<br />
		$ordmaster[shipping_city],<br />
		$ordmaster[shipping_state] -$ordmaster[shipping_country]  - $ordmaster[shipping_zipcode]
		<br /><p style='font-weight:bold; font-size:11px; margin-top:10px;'>Phone:
		$ordmaster[shipping_phone]</p>";
			
			
 ?>
 
 <div style="background:#fff; padding:10px; border-radius:10px; color:#000;">
 <link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<p style="float:left;"><strong>Address :</strong>
<?php $admin_res=get_db_single_row('tbl_admin',$fields="*",$condition="WHERE admin_id='1'");?>
<?php echo nl2br($admin_res['address']);?></p>
<p style="float:right;"><img src="<?php echo theme_url(); ?>images/kidstuff.png" alt=""></p>
<div style="clear:both;"></div>

<div style="margin-top:10px">
<div style="background:#f4f4f4; color:#00; padding:10px;">
<p style="float:right; font-weight:bold;">Invoice No. : <?php echo $ordmaster['invoice_number'];?></p>
<p style="float:left; font-weight:bold;">Date : <?php echo getDateFormat($ordmaster['order_received_date'],1);?></p>
<div style="clear:both;"></div>
</div>


<div style="padding-bottom:8px; margin-top:10px;">
<div style="float:left; width:45%; margin-left:10px;">
<p style="font-weight:bold;">BILLING Address </p>

<p style="color:#000;"><?php echo $bill_info;?></p>

</div>

<div style="float:left; width:45%; margin-left:30px;">
<p style="font-weight:bold;">SHIPPING Address</p>
<p style="color:#000;"> <?php echo $ship_info;?></p>

</div>
<div style="clear:both;"></div>
</div>
</div>
</div>


<div style="background:#fff; border-radius:10px; padding:10px; margin-top:10px;">
  <table width="100%" border="0" cellspacing="0" cellpadding="5" style="color:#000;">
    <tr style="font-weight:bold; color:#fff; background:#97aa01">
      <td align="left">S. No. </td>
      <td align="left">Product Name</td>
      <td align="center">Unit Price (<span class="fs12 ">Rs</span>) </td>
      <td align="center">Quatntity</td>
      <td align="center">Amount (<span class="fs12 ">Rs</span>) </td>
    </tr>
     <?php
			$i=1;
			$subtotal ='';
			$total='';
			//trace($orddetail);
			if(is_array($orddetail)	 && !empty($orddetail) )
			{		
			   foreach ($orddetail as $val)
			   { 
			   
			      $subtotal = ( $val['quantity']*$val['product_price']);		  
		   	      $total   += $subtotal;		
		?>
    <tr style="border:solid 1px #ccc">
      <td align="left" style="border:#f4f4f4 1px solid; padding:10px"><?php echo $i;?>.</td>
      <td align="left" style="border:#f4f4f4 1px solid; padding:10px"><p style="font-size:15px; color:#000; font-family:Arial, Helvetica, sans-serif;"><img src="<?php echo base_url();?>cart/display_cart_image/<?php echo $val['orders_products_id'];?>" alt="" style="float:left; margin-right:8px; width:80px; height:60px;"/><?php echo $val['product_name'];?></p>
        <p style="padding-top:2px; font-family:Tahoma, Geneva, sans-serif; font-size:11px;"><strong>Code</strong> : <?php echo $val['product_code'];?></p>
        <p  style="padding-top:2px; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#acabab">&nbsp;</p></td>
      <td align="center" style="border:#f4f4f4 1px solid; padding:10px"><?php echo display_price($val['product_price']);?></td>
      <td align="center" style="border:#f4f4f4 1px solid; padding:10px"><?php echo $val['quantity'];?></td>
      <td align="center" style="border:#f4f4f4 1px solid; padding:10px"><?php echo display_price( $subtotal);?></td>
    </tr>
    <?php
		   $i++;
           }
        }
		
		   $total_shiping  =  $ordmaster['shipping_amount'];
		   $discount_amount =  $ordmaster['coupon_discount_amount'];
		   $gand_total      = ($total-$discount_amount)+$total_shiping;
        ?>
    
  </table>
</div>

<div style="margin-top:10px; padding:10px; color:#000; background:#f4f4f4; border:solid 1px #f4f4f4; border-radius:5px;">
      <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" style="font-size:11px; line-height:16px;">
        <tr >
          <td width="232" align="left">&nbsp;</td>
          <td width="363" align="right"  style="padding-right:5px;"><span style="color:#000;">Sub Total <!--(<span class="WebRupee fs12">Rs </span>)--> :</span></td>
          <td width="109" align="right"  style="padding-right:5px;"><p style="color:#000;">  <?php echo display_price($total);?></p></td>
        </tr>
        <?php if($ordmaster['shipping_amount']!=''){?>
        <tr>
          <td align="left" style="padding-right:5px;">&nbsp;</td>
          <td align="right" style="padding-right:5px;">Shipping Charges (<?php echo $ordmaster['shipping_method'];?>) :</td>
          <td align="right" style="padding-right:5px;"><?php echo display_price($total_shiping);?></td>
          </tr>
          <?php }?>
          <?php if($ordmaster['tax_amount']!=''){
			   $total_tax_cal=(($total*$ordmaster['tax_amount'])/100);
			   $total_tax=($total_tax_cal>0) ? $total_tax_cal : '0.00';
				
			  
			  ?>
        <tr >
          <td align="left" style="padding-right:5px;">&nbsp;</td>
          <td align="right" style="padding-right:5px;">Tax<span style="color:#000;"> <!--(<span class="WebRupee fs12 "><?php echo display_price($ordmaster['tax_amount']).$ordmaster['tax_type'];?></span>)--> :</span></td>
          <td align="right" style="padding-right:5px;"><?php echo display_price($total_tax);?></td>
        </tr>
        <?php }		 
		 $total_amount=$gand_total+$total_tax;		
		?>
        <tr >
          <td align="left" style="padding-right:5px; font-size:14px;">
          <?php if($formPage==''){?>
          <img src="<?php echo theme_url(); ?>images/print-icon.png" alt="" style="vertical-align:middle; margin-right:5px;" /><a href="javascript:void(0);" onclick="print();" style="color:#1e1e1e; text-decoration:none;  font-size:12px; "><span >Print Page</span></a><?php }?></td>
          <td align="right" style="padding-right:5px;"><span style="font-weight:bold;">Grand Total <!--(<span class="WebRupee fs12">Rs </span>)--> :</span></td>
          <td align="right" style="padding-right:5px;"><p style="font-weight:bold;"> <?php echo display_price($total_amount);?></p></td>
        </tr>
      </table>
    </div>

<?php
}
?>