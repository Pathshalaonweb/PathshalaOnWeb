<?php $this->load->view('includes/face_header'); ?>
<?php echo form_open("adminzone/courses/view_related/".$this->uri->segment(4),'id="myform"');?>
<table width="90%" align="left" cellpadding="1" cellspacing="1" class="list" style="margin-top:10px;">
<thead>
<tr>
	<td colspan="3" height="30"><?php echo $heading_title; ?>
		
	</td>
</tr>
</thead>
<tr><td colspan="3" align="center" ><font color="#FF0000"><strong><?php echo $this->session->flashdata('message');?> </strong></font> </td></tr>
<?php 
if (is_array($res) && !empty ($res) )
{ 
?>
	<tr>
		<td><input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></td>
		<td><strong>courses Name</strong></td>
		<td><strong>Code</strong></td>
	</tr>
<?php 

foreach($res as $key=>$val)
{   
	
	$media_name = get_db_field_value('wl_courses_media',"media",array('courses_id'=>$val['courses_id'],'is_default'=>'Y'));
	
?>
	<tr>
		<td><input type="checkbox" name="arr_ids[]" value="<?php echo $key; ?>" /></td>
			<td><?php echo $val['course_name'];?></td>
			<td><?php echo $val['course_code'];?> </td>
	</tr>
<?php
}
?>
	<tr>
		<td colspan="3">
			<input name="remove_related" type="submit"  value="Remove course" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Remove Related Course ','Record','u_status_arr[]');"/>
			<input type="hidden" name="ref_id" value="<?php echo $this->uri->segment(4);?>" />
		</td>
	</tr>
<?php  
}else{
	echo "<tr><td><center><strong> No record(s) found !</strong></center></td></tr>" ;
}
?>
</table>
<?php
echo form_close();	
?>
</body>
</html>