<?php $this->load->view('top_application'); ?>

<div class="breadcrumb-area">
  <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-5 pt-100 pb-95" style="background-image:url(<?php echo theme_url();?>img/bg/path-contact.png);">
    <div class="container">
      <h2>Contact Us</h2>
    </div>
  </div>
  <div class="breadcrumb-bottom">
    <div class="container">
      <ul>
        <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-double-right"></i>Contact Us</span></li>
      </ul>
    </div>
  </div>
</div>
<div class="contact-area pt-20 pb-20">
  <div class="container">
    <div class="row"><!--removed classname (align-items-center)-->
      
      <div class="col-lg-8">
        <div class="contact-form">
          <div class="contact-title mb-45">
            <h2>Stay <span>Connected</span></h2>
          </div>
          <?php echo form_open('contactus');?> <?php echo validation_message();?> <?php echo error_message(); ?>
          <input name="first_name" placeholder="Name*" type="text" value="<?php echo set_value('first_name');?>">
          <input name="email" placeholder="Email Id*" type="email"value="<?php echo set_value('email');?>" >
          <input name="phone_number" placeholder="Phone Number*" type="text" value="<?php echo set_value('phone_number');?>">
          <input name="subject" placeholder="Subject*" type="text" value="<?php echo set_value('subject');?>">
          <input name="address" placeholder="Company’s Addres" type="text" value="<?php echo set_value('address');?>">
         
          <textarea name="message" placeholder="Message"><?php echo set_value('message');?></textarea>
          <button class="submit btn-style" type="submit">SEND MESSAGE</button>
          <?php echo form_close();?>
          <p class="form-messege"></p>
        </div>
      </div>
      <div class="col-lg-4"><br><br><br><br>
         <h3>BRAINCHILD VENTURES LLP</h3> 
<p>Address: No 53B/2,, Rama Road Industrial
Area, Moti Nagar, New Delhi, West Delhi,
Delhi, 110015</p>
<p><i class="fa fa-envelope"></i> Email us: <b><a href="mailto:info@pathshala.co">info@pathshala.co</a></b></p>
<p><i class="fa fa-phone"></i> Phone: <b>078951 87971</b></p>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('bottom_application'); ?>
