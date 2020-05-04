<?php $this->load->view("top_application"); ?>
<script language="javascript">
function update_single_cart_qty()
{
	
}
</script>
<div class="container pt12">
  <div class="radius-5 bg-white shadow p12-16">
    <h1>Cart</h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a> Cart</p>
    <section><!--Starts-->
       <?php echo error_message(); ?> 
      <?php if($this->cart->total_items() > 0 ) 
			{
				//trace($shipping_res);
				//trace($shipping_methods);
			 ?>
     
      <div class="mt10"><!--Cart-Starts-->
      
      <div class="w70 shadow2 p10 fl">
     <table class="mt10 bdrAll w100">
        <tr class="b bgB white">
          <td width="45" class="w12 al"> S. No. </td>
          <td width="63" class="w45 al">Products</td>
          <td width="94" class="w12 ac">Unit Price (<span class="WebRupee fs12 ">Rs</span>) </td>
          <td width="106" class="w12 ac">Quantity</td>
          <td width="89" class="w12 ac">Amount (<span class="WebRupee fs12 ">Rs</span>)</td>
          <td width="40" class="w8 al">Delete</td>
          </tr>

<?php	   
            $i=1;
            $totweight=0;
            $shipcharge = "";
            foreach($this->cart->contents() as $items)
            {
                //trace($items);
			  $link_url=base_url()."products/detail/".$items['pid']; 			 
              $quantity_available = "";
			 
            ?>
            
 <?php echo form_open('cart/','name="cartForm_qty'.$i.'"' );?>
<tr>
<td><label><?php echo $i;?>.</label></td>
<td><p class="fs15 black verd"><a href="<?php echo  $link_url;?>"><img src="<?php echo get_image('products',$items['img'],'80','64','AR'); ?>" alt="<?php echo $items['origname'];?>" class="fl mr8 bdr"><?php echo character_limiter(strip_tags($items['origname']),20);?><span class="blue"></span></a></p>
<p class="pt2 tahoma fs11 "><strong>Code</strong>  : <?php echo $items['code'];?></p>
</td>
<td class="ac"><?php echo display_price($items['price']);?></td>
<td class="ac"> <a href="javascript:void(0)" onclick="return decrement('qty_<?php echo $i;?>')">-</a> 
<input type="text" name="<?php echo $i; ?>[qty]" style="height:13px; padding:1px; border:1px solid #ccc; width:25px; text-align:center;" value="<?php echo $items['qty']; ?>" id="qty_<?php echo $i;?>" readonly  class="ml2 mr2" />

<a href="javascript:void(0)" onclick="return increment('qty_<?php echo $i;?>')">+</a>

 <input type="hidden" name="<?php echo $i; ?>[rowid]" id='cart_rowid_<?php echo $i; ?>' value="<?php echo $items['rowid']; ?>" />
 <input type="hidden" id="aval_qty" name="aval_qty" value="50" /> 
 <input type="hidden"  name="update_sqty" value="update" /> 
<p class="red fs11 b mt5"> <a  href="javascript:void(0);" id="<?php echo $i;?>" onclick="document.cartForm_qty<?php echo $i;?>.submit();">Update Qty.</a></p>

</td>
<td class="ac"><?php echo display_price($items['subtotal']);?></td>
<td class="ac"><a href="<?php echo base_url(); ?>cart/remove_item/<?php echo $items['rowid']; ?>" onclick="return confirm('Are you sure you want to remove this item');"><img src="<?php echo theme_url(); ?>images/del-icon.png" alt=""></a></td>
</tr>
<input type="hidden" name="prd_id" value="<?php echo $items['rowid']; ?>" />
<?php echo form_close();?>
       <?php
			 $i++;
            }
				
			$cart_total      = $this->cart->total();
			$discount_amount = $this->session->userdata('discount_amount');
			$shipping_total  = array_key_exists('shipment_rate',$shipping_res) ?  $shipping_res['shipment_rate'] : '';
			$discount_total  = $discount_amount;
			$gand_total      = ($cart_total-$discount_total)+$shipping_total;
			
            ?> 
        
        
           </table>
           
            <?php echo form_open('cart/','name="cart_frm" id="cart_frm" ');?>
           <!-- <p class="mt16 fl b fs11"><img src="<?php echo theme_url(); ?>images/del.jpg"  alt="credit cards"></p>-->
            <p class="fl mt16">
            <select name="shipping_method" id="select" class="txtbox" onchange="this.form.submit();">
           <option value="">Select Shipping</option>
            <?php 
			$set_shipping_id = $this->session->userdata('shipping_id');
            if(is_array($shipping_methods) && !empty($shipping_methods))
            {
                foreach( $shipping_methods as $val )
                {	
					
					
                    ?>
           <option value="<?php echo $val['shipping_id'];?>" <?php if($set_shipping_id==$val['shipping_id']) { ?> selected="selected" <?php } ?> ><?php echo $val['shipping_type'];?> &raquo; <?php echo display_price($val['shipment_rate']);?>
              </option>
              
                <?php
				
                   }	
				   			   
                }		  
                ?>
              </select>
             
            
            </p>
            
		<div class="cb"></div>
<?php echo form_error('shipping_method');?>
		<div class="p5 ac mb10 mt15">
		  
		  <a href="<?php echo base_url();?>category" class="button-style mr10"> Continue Shopping </a>
		  <input name="EmptyCart" type="submit" class="button-style mr10" value="Clear Cart" onclick="return confirm('Are you sure you want to clear the cart');">
          <?php if($this->session->userdata('user_id')=='')
        {
        ?> 
        <input type="submit" name="GustCheckout" class="button-style mr10" value="Guest Checkout" >
           <input name="UserCheckout" type="submit" class="button-style2 mr10" value="Checkout" >
           
           
        <?php
		}else
		{
		?>
        <input name="UserCheckout" type="submit" class="button-style2 mr10" value="Checkout" >        
        <?php
		}
		?>
          
  </div>
      </div>
      <div class="w26 mt10 fr"><!--Right-Starts-->
      <div class="p15 radius-5 shadow1"><!--Order-Summary-Starts-->
      <h2>Order Summary</h2>
      <div class="bgW mt10 radius-5">
      <p class="bdrBtm p10"><strong>Sub Total (<span class="WebRupee fs12 ">Rs</span>) : </strong><?php echo display_price(number_format($cart_total,2));?></p>
      <p class="mt10 bdrBtm p10"><strong>Shipping Charges (<span class="WebRupee fs12 ">Rs</span>) : </strong><?php if($shipping_total!=''){echo number_format($shipping_total,2);}else{echo '0.00';}?></p>
       <?php $get_tax=get_db_single_row($fld='wl_tax','tax_rate,tax_type',$Condwherw="WHERE tax_id='1'");
	   
	    ?>
      <p class="mt10 bdrBtm p10"><strong>Tax (<span class="WebRupee fs12 ">Rs</span>) <!--(<?php echo $get_tax['tax_rate'];?>%)-->:</strong> 	     <?php $total_tax_cal=(($cart_total*$get_tax['tax_rate'])/100);
			$total_tax=($total_tax_cal>0) ? $total_tax_cal : '0.00';
			echo number_format($total_tax,2);
			?></p>
            
            <?php $total_amount=$gand_total+$total_tax;?>
            
      <p class="mt10 bdrBtm p10"><strong>Grand Total (<span class="WebRupee fs12 ">Rs</span>) : </strong><?php echo display_price(number_format($total_amount,2));?></p>
      </div>
        <p class="mt10 mb10 ar"><input name="UserCheckout" type="submit" class="button-style mr10" value="Checkout" >        
        </p>
      <!--Order-Summary-Ends--></div>
      <div class="mt10 shadow1 radius-10 p10">
      <h2>Payment Options</h2>
      <p class="mt10 ac"><img src="<?php echo theme_url(); ?>images/credit-card1.jpg" width="197" height="32" alt="credit cards"></p>
      <p class="mt20 ac"><img src="<?php echo theme_url(); ?>images/secure.jpg" width="99" height="58" alt="secure"></p>
      </div>
      <div class="cb"></div>
      <!--Right-Ends--></div>
      <div class="cb"></div>
 
        <!--Cart-Ends--></div>
        
        <?php echo form_close();?> 
       
       <?php /*?> <?php echo form_open('cart/apply_coupon_code');?>
        <input type="text" name="coupon_type">
        <?php echo form_close();?><?php */?>

  <?php 
  }else
  {
	   ?>              
      <div class="mt10 p10 fs13 radius-5">
      <table class="lht-16 w100">
        <tr>
          <td class="ac"><strong>Your Cart is empty</strong></td>         
        </tr>       
      </table>
    </div>

<?php
}
?>
        
      <div class="cb"></div>
      <!--Ends--></section>
    <div class="cb"></div>
</div></div>
<script type="text/javascript">var Page=''; /*  | detail */</script> 
<?php $this->load->view("bottom_application");?>