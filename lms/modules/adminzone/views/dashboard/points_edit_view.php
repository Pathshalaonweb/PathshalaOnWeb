<?php $this->load->view('includes/header'); 
?>
<div id="content">
  
  <div class="breadcrumb">
    
  <?php echo anchor('sitepanel/dashbord','Home'); ?>
 &raquo; <?php echo $heading_title; ?>
 
   </div>      
       
 <div class="box">
 
    <div class="heading">
    
      <h1><img src="<?php echo base_url(); ?>assets/sitepanel/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
      <div class="buttons">&nbsp;</div>
      
    </div>
       <div class="content">  
       
        <?php echo validation_message();?>
        <?php echo error_message(); ?>
  <?php echo form_open('sitepanel/setting/points/');?>  
	<table width="90%"  class="tableList" align="center">
		<tr>
			<th colspan="2" align="center" > </th>
		</tr>
		<tr class="trOdd">
			<td width="217" height="26">Points Credit Type:</td>
			<td width="633">
            <input type="radio" name="credit_type" id="credit_type" value='P' <?php echo  $point_info->credit_type == 'P' ? ' checked="checked"' : '';?> />&nbsp;Percent&nbsp;
            <input type="radio" name="credit_type" id="credit_type1" value='F' <?php echo  $point_info->credit_type == 'F' ? ' checked="checked"' : '';?> />&nbsp;Flat
      </td>
		</tr>
		<tr class="trEven">
			<td height="26"> Minimum Shopping Amount:</td>
			<td>
            <input type="text" name="min_amount_shop" maxlength="30" size="40" value='<?php echo set_value('min_amount_shop',$point_info->min_amount_shop);?>' />           
      </td>
		</tr>
		<tr class="trOdd" id="per">
			<td height="26"> Credit Percentage Points:</td>
			<td><input type="text" name="credit_percent" id="credit_percent" size="40" maxlength="30" value="<?php echo set_value('credit_percent',$point_info->credit_percent);?>" /></td>
		</tr>
    <tr class="trOdd" id="fla">
			<td height="26"> Credit Points:</td>
			<td><input type="text" name="credit_points" id="credit_points" size="40" maxlength="30" value="<?php echo set_value('credit_points',$point_info->credit_points);?>" /></td>
		</tr>
		<tr class="trOdd">
			<td height="26">&nbsp;&nbsp;</td>
			<td><input type="submit" class="button2" value="Update Points Breakthrough"  />  
            </td>
		</tr>
	</table>
<?php echo form_close(); ?>
  </div>
</div>
<script type="text/javascript" language="javascript">
 jQuery(document).ready(function(e) {
	 jQuery('input[id ^= "credit_type"]').click(function(){
		if(jQuery(this).val() == 'P'){
			jQuery('#fla').hide();
			jQuery('#per').show();
		}
		
		if(jQuery(this).val() == 'F'){
			jQuery('#fla').show();
			jQuery('#per').hide();
		}
	});
  	
	 if(jQuery('input[id ^= "credit_type"]:checked').val() == 'P'){
			jQuery('#fla').hide();
			jQuery('#per').show();
		}
		
		if(jQuery('input[id ^= "credit_type"]:checked').val() == 'F'){
			jQuery('#fla').show();
			jQuery('#per').hide();
		}
});
</script>
<?php $this->load->view('includes/footer'); ?>