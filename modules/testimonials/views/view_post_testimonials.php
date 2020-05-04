<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to </title>
<link href="<?php echo theme_url(); ?>css/kidstuff-preet.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/developers/css/proj.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--> 
</head>
<body style="padding:10px;">
<?php echo  form_open('testimonials/post'); ?>

<div class="p10 bg-white  shadow bdr2 radius-3">
  <p class="fs11 fr pr16">( <span class="star">* </span>) fields are mandatory.</p>
<?php echo error_message(); ?>
<div class="cb"></div>
 <h1>Post Testimonial</h1>

<p class="ttu"><label for="person_name">Name   *</label></p>
<p class="mt5"><input name="poster_name" id="person_name" class="p5 txtbox w95" type="text" value="<?php echo set_value('poster_name');?>" ></p> <br/><?php echo form_error('poster_name');?>

<p class="ttu mt15"><label for="email_id">Email   *</label></p>
<p class="mt5"><input type="text" name="email" id="email_id" class="p5  txtbox w95" value="<?php echo set_value('email');?>"></p> <br><?php echo form_error('email');?>

<p class="ttu mt15"><label for="description">Description  *</label></p>
<p class="mt5"><textarea name="testimonial_description" id="description" cols="45" class="txtbox w94" rows="5" ><?php echo set_value('testimonial_description');?></textarea></p> <br/><?php echo form_error('testimonial_description');?>

<p class="mt5"><span class="grey tahoma fs12"><label for="WORD">WORD VERIFICATION <span class="red">* </span></label> </span></p>
<div class="cb"></div>
<p class="mt5"><input name="verification_code" id="verification_code" type="text" id="WORD" class="p5 txtbox w45"> 
<img src="<?php echo site_url('captcha/normal'); ?>" class="vam bdr" alt=""  id="captchaimage"/> <a href="javascript:viod(0);" title="Change Verification Code"  ><img src="<?php echo theme_url(); ?>images/refresh.png"  alt="Refresh"  onclick="document.getElementById('captchaimage').src='<?php echo site_url('captcha/normal'); ?>/<?php echo uniqid(time()); ?>'+Math.random(); document.getElementById('verification_code').focus();" class="ml10 vam"></a><?php echo form_error('verification_code');?>
</p>
     <p class="mt10"> <input name="submit" type="submit" class="button-style" id="button3" value="Submit" /></p>
      
      </div>
      <?php echo form_close();?>
</body>
</html>