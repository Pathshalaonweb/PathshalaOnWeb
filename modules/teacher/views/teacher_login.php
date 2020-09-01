<?php $this->load->view('top_application'); ?>
<?php $ref=$this->input->get_post('ref');?>
<!--<div class="breadcrumb-area">
  <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-4 pt-100 pb-95" style="background-image:url(<?php echo theme_url();?>img/Pathshala_Img/teacher-student-banner.jpg);">
    <div class="container">
      <h2>Login</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .</p>
    </div>
  </div>
  <div class="breadcrumb-bottom">
    <div class="container">
      <ul>
        <li><a href="#">Home</a> <span><i class="fa fa-angle-double-right"></i>login</span></li>
      </ul>
    </div>
  </div>
</div>-->
<div class="login-register-area pt-130 pb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12 ml-auto mr-auto">
        <div class="login-register-wrapper">
          <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg1">
            <h4>Teacher login </h4>
            </a> 
            <!-- <a data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a> --> 
          </div>
          <div class="tab-content">
           	<div id="lg1" class="tab-pane active">
              <div class="login-form-container">
                <div class="login-register-form"> <?php echo validation_message();?> <?php echo error_message(); ?> <?php echo form_open('teacher/login');?>
                  <input type="email" name="user_name" id="user_name" placeholder="Email" value="<?php if(get_cookie('userName')!=""){ echo get_cookie('userName'); } ?>">
                  <input type="password" name="password" id="password" placeholder="Password" value="<?php if(get_cookie('pwd')!=""){ echo get_cookie('pwd'); } ?>" >
                  <div class="button-box">
                    <div class="login-toggle-btn">
                      <input type="checkbox"  name="remember" id="remember" value="Y"<?php if(get_cookie('userName')!=""){ ?> checked="checked" <?php } ?> >
                      <label>Remember me</label>
                      <a href="<?php echo base_url();?>teacher/forgotten_password"> Forgot Password</a> <a href="<?php echo base_url();?>teacher/register"> Teacher Register/</a></div>
                    <input type="hidden" name="action" value="Add">
                    <input type="hidden" name="ref" value="<?php echo $ref;?>" />
                    <button class="default-btn" type="submit"><span>Login</span></button>
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
<?php $this->load->view('bottom_application'); ?>
