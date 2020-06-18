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
      <form action="<?php echo base_url();?>courses/paymentStoreCredit" method="post">
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
           
          </div>
        </div>
        </div>
        <div class="col-lg-5">
          <div class="your-order-area">
            <h3>Your Plan</h3>
            <div class="your-order-wrap gray-bg-4">
              <div class="your-order-product-info">
                <div class="your-order-top">
                  <?php 
				      $price	  =  $res['price'];
					  $discount	  ="00:00 ";	 
				 	  $tax_res    =  get_db_single_row($fld='wl_tax','tax_rate,tax_type',$Condwherw="WHERE tax_id='1'");
					  $tax_amount=$tax_res['tax_rate']*$res['price']/100;
					  $totalAmount=$res['credit_price'];
					
				?>
                  <table class="table">
                    <tr>
                      <td>Course</td>
                      <td><strong><?php echo $res['courses_name']?></strong></td>
                    </tr>
                    <tr>
                      <td>Amount</td>
                      <td><?php echo $res['credit_price']?></td>
                    </tr>
                    <tr>
                      <td>Tax</td>
                      <td><?php echo "00:00";?></td>
                     
                    </tr>
                    <tr>
                      <td>Total-Amount</td>
                      <td><?php echo $res['credit_price']?></td>
                    </tr>
                    <tr>
                      <td><strong>Net Payable Amount</strong></td>
                      <td><strong><?php echo $res['credit_price']?></strong></td>
                    </tr>
                  </table>
                  <input type="hidden" name="pay_method" value="StoreCredit">
                  <input type="hidden" name="ammount" value="<?php echo round($totalAmount);?>">
                  <input type="hidden" name="discount_amount" value="<?php echo round($discountAmount);?>">
                  <input type="hidden" name="courses_id" value="<?php echo $res['courses_id'];?>">
                </div>
              </div>
              <div class="payment-method">
                <div class="payment-accordion element-mrg"> </div>
              </div>
            </div>
            <div class="Place-order mt-25">
            <?php if($mem_info['credit_point'] < round($totalAmount)){?>
            	 you don't have sufficient Credit Points
                <a href="<?php echo base_url();?>members/credit"><strong style="background-color:#007bff;">Click Here</strong></a> To Buy Subscription
            <?php } else{?>
              <input type="submit" class="btn-hover"  value="Pay Now" style="background-color:#007bff;">
             <?php }?> 
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $this->load->view('bottom_application'); ?>
