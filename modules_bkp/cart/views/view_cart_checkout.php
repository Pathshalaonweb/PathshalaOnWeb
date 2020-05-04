<?php $this->load->view("top_application");?>
<?php
 $values_posted_back=(is_array($this->input->post())) ? TRUE : FALSE; 
 $is_same = $values_posted_back === TRUE ? $this->input->post('is_same') : ''; 
?>
<div class="container pt12">
  <div class="radius-5 bg-white shadow p12-16">
    <h1>Check Out</h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a> Checkout</p>
    <section><!--Starts-->
      <?php echo validation_message();?>
      <?php echo form_open('cart/checkout'); ?>
      
          <div class="fl w60 mt15">
      <p class="fs14 ttu red bg2 shadow w32 mt15" style="padding:7px 10px;">Personal Information</p>
          
      <div class="mt10 shadow1 p10 ml10">
      <p class="fl b w22">
        <label for="Name">Name <span class="star">*</span></label>
      </p>
      <p class="fl w70 ">
        <input name="first_name" id="Name" type="text" class="txtbox w97" value="<?php echo set_value('first_name',$mres['first_name']); ?>"/>
      </p>
      <p class="cb"></p>
      <?php //echo form_error('first_name');?>
      
      
       <p class="fl b w22 mt15 ">
        <label for="email">Email <span class="star">*</span></label>
      </p>
      <p class="fl mt8 w70">
        <input name="email" id="email" type="text" class="txtbox w97" value="<?php echo set_value('email',$mres['email']); ?>"/>
      </p>
      <p class="cb"></p>
      <?php //echo form_error('email');?>
      
      <p class="fl b w22 mt15">
        <label for="phone_number">Phone <span class="star">*</span></label>
      </p>
      <p class="fl mt8 w70">
        <input name="phone_number" id="phone_number" type="text" class="txtbox w97" value="<?php echo set_value('phone_number',$mres['phone_number']); ?>" />
      </p>
      <p class="cb"></p>
      <?php //echo form_error('phone_number');?>
    </div>
          
    <p class="fs14 ttu red bg2 shadow w32 mt15" style="padding:7px 10px;">Billing Information</p>
          
    <div class="mt10 shadow1 p10 ml10">
	<div class="p2">
          <p class="fl b w22 mt4"><label for="billing_name">Billing Name <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input type="text" name="billing_name" id="billing_name" class="txtbox w97" value="<?php echo set_value('billing_name',$mres['billing_name']); ?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('billing_name');?>
        </div>
        <div class="p2">
        <p class="fl b w22 mt4">
          <label for="">Phone No <span class="star">*</span></label>
        </p>
        <p class="fl w70">
             <input type="text" name="billing_phone" id="billing_phone" class="txtbox w97" value="<?php echo set_value('billing_phone',$mres['billing_phone']);?>">
        </p>
        <p class="cb"></p>
        <?php //echo form_error('billing_phone');?>
      </div>
        <div class="p2">
          <p class="fl b w22 mt4"><label for="billing_address">Address <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <textarea name="billing_address" id="billing_address" rows="3" class="txtbox w97"><?php echo set_value('billing_address',$mres['billing_address']);?></textarea>
          </p>
          <p class="cb"></p>
          <?php //echo form_error('billing_address');?>
        </div>
        <div class="p2">
          <p class="fl b w22 mt4"><label for="billing_country">Country <span class="star">*</span></label></p>
               
          <p class="fl w70">
            <?php echo CountrySelectBox(array('name'=>'billing_country','format'=>'class="txtbox w99"','current_selected_val'=>set_value('billing_country',$mres['billing_country']) )); ?>
          </p>
          <p class="cb"></p>
          <?php //echo form_error('billing_country');?>
        </div>
        <div class="p2">
          <p class="fl b w22 mt4"><label for="billing_state">State <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input name="billing_state" id="billing_state" type="text" class="txtbox w97" value="<?php echo set_value('billing_state',$mres['billing_state']);?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('billing_state');?>
        </div>
        <div class="p2">
          <p class="fl b w22 mt4"><label for="billing_city">City <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input name="billing_city" id="billing_city" type="text" class="txtbox w97"  value="<?php echo set_value('billing_city',$mres['billing_city']);?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('billing_city');?>
        </div>
        <div class="p2">
          <p class="fl b w22 mt4"><label for="billing_zipcode">Post code <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input type="text" name="billing_zipcode" id="billing_zipcode" class="txtbox w97" value="<?php echo set_value('billing_zipcode',$mres['billing_zipcode']);?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('billing_zipcode');?>
        </div>
    </div>
          
    <p class="mt10 fs11"> <label><input name="is_same" id="is_same" type="checkbox" value="Y" onclick="return Check_Bill_Ship(this.form);" class="bgnone bdrnone"<?php echo $is_same=='Y' ? ' checked="checked"' : '';?> />
         
          Check this if Shipping address   is same as Billing address.</label></p>
          
    <p class="fs14 ttu  red bg2 shadow w32 mt15" style="padding:7px 10px;">Shipping Information</p>
    <p class="cb"></p>
          
    <div class="mt10 shadow1 p10 ml10">
      <div class="p2">
        <p class="fl b w22 mt4">
          <label for="shipping_name">Shipping Name <span class="star">*</span></label>
        </p>
        <p class="fl w70">
          <input type="text" name="shipping_name" id="shipping_name" class="txtbox w97" value="<?php echo set_value('shipping_name',$mres['shipping_name']); ?>">
        </p>
        <p class="cb"></p>
        <?php //echo form_error('shipping_name');?>
      </div>
      <div class="p2">
        <p class="fl b w22 mt4">
          <label for="shipping_address">Address <span class="star">*</span></label>
        </p>
        <p class="fl w70">
          <textarea name="shipping_address" id="shipping_address" rows="3" class="txtbox w97"><?php echo set_value('shipping_address',$mres['shipping_address']);?></textarea>
        </p>
        <p class="cb"></p>
        <?php //echo form_error('shipping_address');?>
      </div>
      <div class="p2">
        <p class="fl b w22 mt4">
          <label for="shipping_phone">Phone No <span class="star">*</span></label>
        </p>
        <p class="fl w70">
            <input type="text" name="shipping_phone" id="shipping_phone" class="txtbox w97" value="<?php echo set_value('shipping_phone',$mres['shipping_phone']); ?>">
        </p>
        <p class="cb"></p>
        <?php //echo form_error('shipping_phone');?>
      </div>
      <div class="p2">
        <p class="fl b w22 mt4">
          <label for="shipping_country">Country <span class="star">*</span></label>
        </p>
        <p class="fl w70">
          <?php echo CountrySelectBox(array('name'=>'shipping_country','format'=>'class="txtbox w99"','current_selected_val'=>set_value('shipping_country',$mres['shipping_country']) )); ?>
        </p>
        <p class="cb"></p>
        <?php //echo form_error('shipping_country');?>
      </div>
      <div class="p2">
        <p class="fl b w22 mt4">
          <label for="shipping_state">State <span class="star">*</span></label>
        </p>
        <p class="fl w70">
          <input name="shipping_state" id="shipping_state" type="text" class="txtbox w97" value="<?php echo set_value('shipping_state',$mres['shipping_state']); ?>" >
        </p>
        <p class="cb"></p>
        <?php //echo form_error('shipping_state');?>
      </div>
      <div class="p2">
        <p class="fl b w22 mt4">
          <label for="shipping_city">City <span class="star">*</span></label>
        </p>
        <p class="fl w70">
          <input name="shipping_city" id="shipping_city" type="text" class="txtbox w97" value="<?php echo set_value('shipping_city',$mres['shipping_city']); ?>" >
        </p>
        <p class="cb"></p>
         <?php //echo form_error('shipping_city');?>
      </div>
      <div class="p2">
        <p class="fl b w22 mt4">
          <label for="shipping_zipcode">Post code <span class="star">*</span></label>
        </p>
        <p class="fl w70">
          <input type="text" name="shipping_zipcode" id="shipping_zipcode" class="txtbox w97" value="<?php echo set_value('shipping_zipcode',$mres['shipping_zipcode']); ?>">
        </p>
        <p class="cb"></p>
        <?php //echo form_error('shipping_zipcode');?>
      </div>
    </div>
    
    <p class="mt10 bdr p10 radius-5"> Verification Code <span class="star">*</span>
          <input name="verification_code" id="verification_code" type="text" style="width:140px;" class="txtbox" placeholder="Enter this code"> 
          <img src="<?php echo site_url('captcha/normal'); ?>" class="vam bdr" alt=""  id="captchaimage"/><a href="javascript:viod(0);" title="Change Verification Code"  ><img src="<?php echo theme_url(); ?>images/refresh.png"  alt="Refresh"  onclick="document.getElementById('captchaimage').src='<?php echo site_url('captcha/normal'); ?>/<?php echo uniqid(time()); ?>'+Math.random(); document.getElementById('verification_code').focus();" class="ml10 vam"></a></p>
          <?php //echo form_error('verification_code');?>
    
    <p class="mt10"><input name="reg" type="submit" class="button-style" value="Proceed">
          &nbsp;
          <input name="reset" type="reset" class="button-style" value="Reset"></p>
          
  </div>
  <?php echo form_close();?>
  <div class="fr mt15 w36">
    <p class="mt25"><img src="<?php echo theme_url(); ?>images/checkout-img.jpg" alt=""></p>
        
  </div>
      <div class="cb"></div>
      <!--Ends--></section>
    <div class="cb"></div>
</div></div>
<script type="text/javascript">var Page=''; /*  | detail */</script> 
<?php $this->load->view("bottom_application");?>