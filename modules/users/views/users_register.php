<?php $this->load->view('top_application'); ?>
<div class="login-register-area pt-130 pb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12 ml-auto mr-auto">
        <div class="login-register-wrapper">
          <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg2">
            <h4> Register as Student</h4>
            </a> </div>
          <div class="tab-content">
            <div id="lg2" class="tab-pane active">
              <div class="login-form-container">
                <div class="login-register-form"> 
				<?php echo validation_message();?> 
				<?php echo error_message(); ?> 
				<?php echo form_open('users/register'); ?>
                  <input type="text" name="first_name" placeholder="Name" value="<?php echo set_value('first_name'); ?>">
                  <?php echo form_error('first_name');?>
                 <input type="text" name="phone_number" placeholder="Phone" value="<?php echo set_value('phone_number'); ?>">
                  <?php echo form_error('phone_number');?>
                  <input type="text" name="user_name" placeholder="Email" value="<?php echo set_value('user_name');?>">
                  <input type="password" name="password" placeholder="Password">
                  <?php echo form_error('password');?>
                  <input type="checkbox" name="terms_conditions" id="terms_conditions" >
                  <label for="check"> I have read and agreed with the terms & conditions and privacy policy.</label>
                  <?php echo form_error('terms_conditions');?>
                  <div class="button-box">
                    <button class="default-btn" type="submit"><span>Register</span></button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('bottom_application'); ?>
