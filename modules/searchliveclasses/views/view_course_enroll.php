<?php $this->load->view('top_application'); ?>
<?php $mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$this->session->userdata('user_id')."'");?>
<?php 
//echo $this->session->userdata('course_id'); 
?>
<div class="breadcrumb-area">
  <div class="breadcrumb-bottom">
    <div class="container">
      <ul>
        <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-double-right"></i>Checkout</span></li>
      </ul>
    </div>
  </div>
</div>
<div class="checkout-area pt-20 pb-20">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
      <?php 
	  if($res['price']==1){
	  ?>
      <form action="<?php echo base_url();?>courses/freepayment" method="post">
      <?php }else{?>
      <form action="<?php echo base_url();?>courses/payment" method="post">
      <?php }?>
        <div class="billing-info-wrap">
          <h3>Payment Details</h3>
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="billing-info mb-20">
                <label>Full Name</label>
                <input type="text" name="name" value="<?php echo $mem_info['first_name'];?>">
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="billing-info mb-20">
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo $mem_info['phone_number'];?>" required>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="billing-info mb-20">
                <label>Email Address</label>
                <input type="text" name="email" value="<?php echo $mem_info['user_name'];?>">
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="billing-info mb-20">
                <label>Address</label>
                <textarea name="address" required><?php echo $mem_info['address'];?></textarea>
              </div>
            </div>
            <?php /*?><div class="col-lg-12">
              <p class="message"></p>
              <div class="loading" style="display: none;">
                <div class="content"> <img src="<?php echo base_url();?>assets/developers/images/loader2.gif"/></div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                    <label><span style="color:#007bff;">Apply Coupon Code</span></label>
                  <input type="text" name="coupon" placeholder="Coupon Code" id="couponxxx" value="">
                </div>
                <div class="col-lg-6">
                  <div class="Place-order mt-43"> <a href="javascript:void(0)" class="btn-hover"  id="couponform"  style="background-color:#007bff;">Apply </a></div>
                </div>
              </div>
            </div><?php */?>
          </div>
        </div>
        </div>
        <div class="col-lg-5">
          <div class="your-order-area">
            <h3>Your Plan</h3>
            <div class="your-order-wrap gray-bg-4">
              <div class="your-order-product-info">
                <div class="your-order-top">
                  <?php if ($this->session->userdata('coupon_id') > 0 ) {
					  $discount	  =  $this->session->userdata('coupon_discount');
					  $price	  =  $res['price'];
					  $tax_res    =  get_db_single_row($fld='wl_tax','tax_rate,tax_type',$Condwherw="WHERE tax_id='1'");
					  $tax_amount=$tax_res['tax_rate']*$res['price']/100;
					  $a=$price+$tax_amount;
					  $discountAmount=$discount*$a/100;
					  $totalAmount=$price+$tax_amount-$discountAmount;
					} else {
					  $price	  =  $res['price'];
					  $discount	  =  "00:00 ";	 
				 	  $tax_res    =  get_db_single_row($fld='wl_tax','tax_rate,tax_type',$Condwherw="WHERE tax_id='1'");
					  $tax_amount=$tax_res['tax_rate']*$res['price']/100;
					  $totalAmount=$price+$tax_amount;
					} 
				?>
                <?php 
				if($price==1){ 
				?>
                <table class="table">
                    <tr>
                      <td>Course</td>
                      <td><strong><?php echo $res['courses_name']?></strong></td>
                    </tr>
                    <tr>
                      <td>Amount</td>
                      <td><?php echo "00:00";?></td>
                    </tr>
                    <tr>
                      <td>Tax</td>
                      <td><?php echo "00:00";?></td>
                      <input type="hidden" name="tax_amount" value="<?php echo $tax_amount;?>">
                    </tr>
                    <tr>
                      <td>Total-Amount</td>
                      <td><?php echo "00:00";?></td>
                    </tr>
                    
                    <tr>
                      <td><strong>Net Payable Amount</strong></td>
                      <td><strong><?php echo "00:00";?></strong></td>
                    </tr>
                  </table>
                  <input type="hidden" name="pay_method" value="free">
                  <input type="hidden" name="ammount" value="<?php echo round($totalAmount);?>">
                  <input type="hidden" name="discount_amount" value="<?php echo round($discountAmount);?>">
                  <input type="hidden" name="courses_id" value="<?php echo $res['courses_id'];?>">
				<?php 
				}else{
				?>
                  <table class="table">
                    <tr>
                      <td>Course</td>
                      <td><strong><?php echo $res['courses_name']?></strong></td>
                    </tr>
                    <tr>
                      <td>Amount</td>
                      <td><?php echo $price;?></td>
                    </tr>
                    <tr>
                      <td>Tax</td>
                      <td><?php echo $tax_amount;?></td>
                      <input type="hidden" name="tax_amount" value="<?php echo $tax_amount;?>">
                    </tr>
                    <tr>
                      <td>Total-Amount</td>
                      <td><?php echo $res['price']+$tax_amount;?></td>
                    </tr>
                    <?php /*?><tr>
                      <td>Discount %</td>
                      <td><?php echo $discount;?> %</td>
                    </tr>
                    <tr>
                      <td>Discount Amount</td>
                      <td><?php echo ($discountAmount!='')?$discountAmount:"00:00";?>
                        <?php //echo $discountAmount;?></td>
                    </tr><?php */?>
                    <tr>
                      <td><strong>Net Payable Amount</strong></td>
                      <td><strong><?php echo round($totalAmount);?></strong></td>
                    </tr>
                  </table>
                  <input type="hidden" name="pay_method" value="paytm">
                  <input type="hidden" name="ammount" value="<?php echo round($totalAmount);?>">
                  <input type="hidden" name="discount_amount" value="<?php echo round($discountAmount);?>">
                  <input type="hidden" name="courses_id" value="<?php echo $res['courses_id'];?>">
                 <?php }?> 
                </div>
              </div>
              <div class="payment-method">
                <div class="payment-accordion element-mrg"> </div>
              </div>
            </div>
            <div class="Place-order mt-25">
              <input type="submit" class="btn-hover"  value="Pay Now" style="background-color:#007bff;">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $this->load->view('bottom_application'); ?>