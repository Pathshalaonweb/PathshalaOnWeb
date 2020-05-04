<?php $this->load->view('top_application'); ?>
<div class="login-register-area pt-130 pb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12 ml-auto mr-auto">
        <div class="login-register-wrapper">
          <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg2">
            <h4> Register as Teacher</h4>
            </a> </div>
          <div class="tab-content">
            <div id="lg2" class="tab-pane active">
              <div class="login-form-container">
                <div class="login-register-form">
                  <?php echo validation_message();?> <?php echo error_message(); ?>
      				 <?php echo form_open('teacher/register'); ?>
                     <select name="account_type">
                     	<option value="">Select account type</option>
                        <option value="0">Teacher</option>
                        <option value="1">Institute</option>
                     </select>
                     <?php echo form_error('account_type');?>
                     <input type="text" name="first_name" placeholder="Name*" value="<?php echo set_value('first_name'); ?>">
                     <?php echo form_error('first_name');?>
                     <input type="text" name="phone_number" placeholder="Phone*" value="<?php echo set_value('phone_number'); ?>"><?php echo form_error('phone_number');?>
                     <input type="text" name="user_name" placeholder="Email*" value="<?php echo set_value('user_name');?>">
                     <?php echo form_error('user_name');?>
                     <input type="password" name="password" placeholder="Password*">
                      <?php echo form_error('password');?>
                      <textarea type="text" name="message" placeholder="Message">Message
					  <?php echo set_value('message');?></textarea>
                      <?php echo form_error('message');?>
                     <input type="checkbox" name="terms_conditions" id="check"> <label for="check"> By signing up, you agree to our <a href="<?php echo base_url();?>pages/terms-and-conditions"><u>terms &amp; conditions</u></a> and <a href="<?php echo base_url();?>">privacy policy</a>.</label>
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
