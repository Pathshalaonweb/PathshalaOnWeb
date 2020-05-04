<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo theme_url();?>img/favicon.png">
<?php 
$meta_rec = getMeta();
if ( array_key_exists('dynamic_meta',$meta_rec) && @is_array($meta_array) && !empty($meta_array) ) {
	if(  array_key_exists('meta_title',$meta_array) && $meta_array['meta_title']!='')
	{
		echo '<title>'.$meta_array['meta_title'].'</title>';
	}
	if( array_key_exists('meta_description',$meta_array) && $meta_array['meta_description']!='')
	{
		echo '<meta name="description" content="'.$meta_array['meta_description'].'" />';
	}
	if( array_key_exists('meta_keyword',$meta_array) && $meta_array['meta_keyword']!='')
	{
	   echo '<meta  name="keywords" content="'.$meta_array['meta_keyword'].'" />';
	}
	} else {	
?>
<title><?php echo $meta_rec['meta_title'];?></title>
<meta name="description" content="<?php echo $meta_rec['meta_description'];?>" />
<meta  name="keywords" content="<?php echo $meta_rec['meta_keyword'];?>" />
<?php } ?>
<link href="<?php echo base_url(); ?>assets/developers/css/proj.css" rel="stylesheet" type="text/css" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo theme_url()?>css/bootstrap.min.css">
<!-- Icon Font CSS -->
<link rel="stylesheet" href="<?php echo theme_url()?>css/icons.min.css">
<!-- Plugins CSS -->
<link rel="stylesheet" href="<?php echo theme_url()?>css/plugins.css">
<!-- Main Style CSS -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-151377731-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-151377731-1');
</script>
<script data-ad-client="ca-pub-9034141091044478" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<?php if ($this->router->fetch_class()=='home') {?> 
<link rel="stylesheet" href="<?php echo theme_url()?>css/style_new.css">
<style type="text/css">
#startheader {
	height: 100vh;
	min-height: 400px;
	background-size: cover;
 background-image: url(<?php echo theme_url()?>images/bnr_new.jpg);
	margin-top: -14%;
}
.heading {
	color: white;
	text-align: center;
	padding-top: 200px;
}
#startheader p {
	text-align: center;
	padding: 20px 60px;
}
</style>
<?php } else { ?>
<link rel="stylesheet" href="<?php echo theme_url()?>css/style.css">
<?php }?>
<!-- Modernizer JS -->
<script src="<?php echo theme_url()?>js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>

<!--top-->

<?php 

$this->load->view('project_header'); ?>
