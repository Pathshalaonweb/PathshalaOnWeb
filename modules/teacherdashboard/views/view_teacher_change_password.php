<?php $this->load->view("top_application");?>
<div class="event-area my-acc pt-20 pb-130">
  <div class="container">
    <div class="row">
      <?php $this->load->view("teacher_myaccount_left");?>
      <div class="col-xl-9 col-lg-4">
        <div class="blog-all-wrap mr-40">
          <div class="col-lg-9 col-md-12 ml-auto mr-auto">
            <div class="login-register-wrapper">
              <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg1">
                <h4> Change Password </h4>
                </a> </div>
              <div class="tab-content">
                <div id="lg1" class="tab-pane active">
                  <div class="login-form-container">
                    <div class="login-register-form">   <?php echo form_open('teacherdashboard/change_password'); ?>
 <?php echo validation_message();?>
  <?php echo error_message(); ?>
                      <input type="password" name="old_password" id="old_password" placeholder="Old Password">
                      <input type="password" name="new_password" id="new_password" placeholder="New Password" >
                      <input type="password" name="confirm_password" id="confirm_password" placeholder="Conform Password" >
                      <div class="button-box">
                        
                        <button class="default-btn" type="submit"><span>Update</span></button>
                      </div>
                      <?php echo form_close();?> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("bottom_application");?>
<style>.button-box {
    text-align: center;
}</style>