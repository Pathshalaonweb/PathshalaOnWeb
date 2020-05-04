<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to RJ Group</title>
<link href="<?php echo theme_url(); ?>css/apm-preet.css" rel="stylesheet" type="text/css" />
<style type="text/css" media="screen">
<!--
@import url("<?php echo base_url();?>assets/fancybox/jquery.fancybox-1.3.0.css");
@import url("<?php echo base_url();?>assets/ddlevelsfiles/ddlevelsmenu-base.css");
-->
</style>
</head>
<body style="font-size:12px; color:#333; margin:0px; padding:0px; font-family:Arial, Helvetica, sans-serif;">
<div style="width:800px; background:#fff;">
 <?php echo invoice_content($ordmaster,$orddetail);?>
   <!--<table width="70" align="center" cellpadding="3" cellspacing="0" bgcolor="#333333">
        <tr>
          <td align="center"><strong><a href="#" onclick="window.print();" style="color:#fff;">Print</a></strong></td>
        </tr>
      </table>-->
</div>
</body>
</html>
