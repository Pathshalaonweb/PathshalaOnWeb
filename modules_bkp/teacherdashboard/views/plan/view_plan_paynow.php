<?php $this->load->view("top_application");?>
<?php $mem_info=get_db_single_row('wl_teacher',$fields="*",$condition="WHERE 1 AND teacher_id='".$this->session->userdata('teacher_id')."'");?>
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
                <label>Last Name</label>
                <input type="text">
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="billing-info mb-20">
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo $mem_info['user_name'];?>">
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="billing-info mb-20">
                <label>Email Address</label>
                <input type="text" name="email" value="<?php echo $mem_info['user_name'];?>">
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
                <ul>
                  <li>Plan</li>
                  <li>Total</li>
                </ul>
              </div>
              <div class="your-order-middle">
                
                <ul>
                  <li><span class="order-middle-left"><strong><?php echo $res['name']?></strong> </span> <span class="order-price"><?php echo $res['price']?> </span></li>
                </ul>
              </div>
            </div>
            <div class="payment-method">
              <div class="payment-accordion element-mrg">
                
              </div>
            </div>
          </div>
          <div class="Place-order mt-25"> <a class="btn-hover" href="#">Place Order</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("bottom_application");?>
