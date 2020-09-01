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

<body class="p10">

<?php echo form_open('users/forgotten_password/');?>
<div class="p10 bg-white  shadow bdr2 radius-3">
<h1>Forgot Password</h1>

<div class="cb"></div>
<?php echo error_message(); ?>
<p class="mt10"><input name="email" type="text" class="p5" autocomplete="off"  placeholder="ENTER YOUR EMAIL ID * " style="width:300px;"></p> <br/><?php echo form_error('email');?>


<p class="mt20 mb10"><input type="submit" name="submit" value="Submit" class="button-style" >
<input type="hidden" name="forgotme" value="yes" />
</p>

</div>
<?php echo  form_close(); ?>

</body>
</html>
