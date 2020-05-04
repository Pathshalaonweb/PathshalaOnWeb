<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Order Invice</title>
</head>
<body style="font-size:12px; color:#333; margin:0px; padding:0px; font-family:Arial, Helvetica, sans-serif;">
<div style="width:650px; background:#fff;">
 <?php echo invoice_content($ordmaster,$orddetail,'not_show_print');?>
   <table width="60%" align="center" cellpadding="3" cellspacing="0" >
        <tr>
          <td align="center">          
          <a style="background:#666; font-size:12px; font-weight:bold; padding:2px 13px; color:#fff; margin-top:5px; border-radius:4px; text-decoration:none; cursor: pointer; display:inline-block;" onclick="window.close();" href="javascript:void(0)">Close</a>        
                  
          </td>
            <td align="center">   
           <a style="background:#666; font-size:12px; font-weight:bold; padding:2px 13px; color:#fff; margin-top:5px; border-radius:4px; text-decoration:none; cursor: pointer; display:inline-block;" onclick="window.print();" href="javascript:void(0)">Print</a>
              </td>
        </tr>
      </table>
</div>
</body>
</html>
