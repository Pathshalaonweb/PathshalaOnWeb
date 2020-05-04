<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<?php 
	$meta_rec = getMeta();
	if( array_key_exists('dynamic_meta',$meta_rec) && @is_array($meta_array) && !empty($meta_array) )
	{
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
		
	}else
	{	
	?>
	<title><?php echo $meta_rec['meta_title'];?> </title>
	<meta name="description" content="<?php echo $meta_rec['meta_description'];?>" />
	<meta  name="keywords" content="<?php echo $meta_rec['meta_keyword'];?>" />
	<meta class="viewport" name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php
	}
	?>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- bootstrap 3.0.2 -->
	<link href="<?php echo theme_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- font Awesome -->
	<link href="<?php echo theme_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- Ionicons -->
	<link href="<?php echo theme_url();?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
	<!-- Morris chart -->
	<link href="<?php echo theme_url();?>css/morris/morris.css" rel="stylesheet" type="text/css" />
	 <link href="<?php echo theme_url();?>css/ak.css" rel="stylesheet" type="text/css" />
	<!-- jvectormap -->
	<link href="<?php echo theme_url();?>css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
	<!-- fullCalendar -->
	<link href="<?php echo theme_url();?>css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
	<!-- Daterange picker -->
	<link href="<?php echo theme_url();?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
	<!-- bootstrap wysihtml5 - text editor -->
	<link href="<?php echo theme_url();?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme style -->
	<link href="<?php echo theme_url();?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
</head>
<body class="skin-black">   
<?php
  $this->load->view('project_header'); 
?>