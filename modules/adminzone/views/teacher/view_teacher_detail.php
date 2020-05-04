<?php $this->load->view('includes/face_header'); ?>
<table width="100%" border="0" cellspacing="4" cellpadding="0" class="grey">
                <tr valign="top" >
                  <td colspan="4" align="right" >
		
				  <table width="100%"  border="0" cellspacing="2" cellpadding="2">
                    <tr align="left" bgcolor="#1588BB" class="white">
                  <td colspan="7" bgcolor="#CCCCCC" ><strong> Personal Details : </strong></td>
                 </tr>
                    <!--<tr valign="top" >
                      <td align="left" ><strong>Title : </strong></td>
                      <td align="left" ><?php echo $mres['title'];?></td>
                      <td align="left" >&nbsp;</td>
                      <td align="left" >&nbsp;</td>
                    </tr>-->
                    <tr valign="top" >
                      <td width="19%" align="left" ><strong>  Name : </strong></td>
                      <td width="25%" align="left" >
					  <?php echo $mres['first_name'];?> <?php //echo $mres['last_name'];?>
                     </td>
                      <td width="21%" align="left" ><strong>Register Date : </strong></td>
                      <td width="35%" align="left" > <?php echo $mres['account_created_date'];?>
					</td>
                    </tr>
                    <tr valign="top" >
                      <td align="left" ><strong>Email : </strong></td>
                      <td align="left" ><?php echo $mres['user_name'];?></td>
                      <td align="left" ><strong>Password. :</strong></td>
                      <td align="left" ><?php echo $mres['password'];?></td>
                    </tr>
                    <?php if($mres['phone_number']!=''){?>
                    <tr valign="top" >
                      <td align="left" ><strong>Phone : </strong></td>
                      <td align="left" ><?php echo $mres['phone_number'];?></td>
                      <td align="left" >&nbsp;</td>
                      <td align="left" >&nbsp;</td>
                    </tr>
                   <?php }?>
                  
                    <tr>
                      <td colspan="4">&nbsp;</td>
                    </tr>
                  </table>
				 </td>
                </tr>
                <tr align="left" valign="top" bgcolor="#1588BB" >
                  <td height="28" colspan="4" align="center" valign="middle" bgcolor="#CCCCCC" >
				  <strong> Teacher Detail</strong></td>
                  
           	</tr>
                <tr valign="top" >
                  <td width="19%" align="left" ><strong> Name : </strong></td>
                  <td width="25%" align="left" ><?php echo $mres['first_name'];?></td>
                </tr>
                <tr valign="top" >
             
                  <td align="left" ><strong> Address : </strong></td>
                  <td align="left" ><?php echo $mres['address'];?></td>
                </tr>
                <tr valign="top" >
                  <td align="left" ><strong>pincode : </strong></td>
                  <td align="left" ><?php echo $mres['pincode'];?></td>
                 </tr>
               <tr valign="top" >
                  <td align="left" ><strong> Description : </strong></td>
                  <td align="left" ><?php echo $mres['description'];?></td>
               </tr>
               
                <tr valign="top" >
                  <td align="left" ><strong>Email Verify   : </strong></td>
                  <td align="left" ><?php echo ($mres['email_verify']==1)? "YES":"NO";?></td>
                </tr>
                <tr valign="top" >
                  <td align="left" ><strong>current credit  :</strong></td>
                  <td align="left" ><?php echo $mres['current_credit'];?></td>
                </tr>
                <tr valign="top" >
                  <td align="left" ><strong>Plan Expire  :</strong></td>
                  <td align="left" ><?php echo $mres['plan_expire'];?></td>
                </tr>
                 <tr valign="top" >
                  <td align="left" ><strong>Prfile Photo  : </strong></td>
                  <td align="left" >
                  <img src="<?php echo base_url();?>uploaded_files/teacher/<?php echo $mres['picture'];?>" width="70%" height="250px"></td>
                </tr>
                <tr valign="top" >
                  <td align="left" ><strong>certificate  : </strong></td>
                  <td align="left" >
                  <a href="<?php echo base_url();?>uploaded_files/certificate/<?php echo $mres['certificate'];?>" download>Downalod</a></td>
                </tr>
                <tr align="left" valign="top" >
                  <td colspan="4" align="left">&nbsp;</td>
  </tr>
                <tr align="left" valign="top" bgcolor="#FFFFFF" >
                  <td colspan="4" ><span class="b white"><strong> 


 </strong></span></td>
  </tr>
</table>
</body>
</html>