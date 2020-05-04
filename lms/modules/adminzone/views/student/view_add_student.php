<?php $this->load->view('includes/header'); ?> 
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3><?php echo $heading_title; ?></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<?php validation_message();?>
					<?php error_message(); ?>
					<div class="x_content">
						<br/>
						<?php echo form_open_multipart('', 'class="form-horizontal form-label-left" id="form"');?> 
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name : <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="name" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('name');?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email : <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="user_name" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('user_name');?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password : <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="password" name="password" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('password');?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile No : <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input type="text" name="mobno" size="40" maxlength="10" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('mobno');?>" />
						   
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Course : <span class="required">*</span>
							</label>
							<?php 
							$sel_q ="SELECT * FROM `tbl_department` where parent_id='0'";
							$dept_res=$this->db->query($sel_q);
							if($dept_res->num_rows() > 0)
							{
								$list_dept=$dept_res->result_array();
							}			
							?>	
							<div class="col-md-6 col-sm-6 col-xs-12"> 
								<select class="js-example-placeholder-multiple js-states form-control" multiple="multiple" name="lot[]">
									<option value="">Select Course</option>
									<?php foreach($list_dept as $dept) {?>
									<option value='<?php echo $dept['category_id'];?>'><?php echo $dept['category_name'];?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">State : <span class="required">*</span>
							</label>
							<?php 		
							$sel_q ="SELECT * FROM `tbl_city` where parent_id='0'";
							$city_res=$this->db->query($sel_q);
							if($city_res->num_rows() > 0)
							{
								$list_city=$city_res->result_array();
							}
							?>	
							<div class="col-md-6 col-sm-6 col-xs-12"> 
								<select class="form-control" name="state" onChange="gettown(this.value);">
									<option value="">Select State</option>
									<?php foreach($list_city as $city) {?>
									<option id="<?php echo $city['category_id'];?>" value="<?php echo $city['category_id'];?>"><?php echo ucfirst($city['category_name']);?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City : <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">  
							<select class="form-control" name="city" id="subdiv">
								<option>Select City</option> 
							</select>
							</div>
						</div>
						<script type = 'text/javascript'>
						function gettown(DistrictId)
						{
							var strUrl = '<?php echo base_url(); ?>users/ajaxgettown/';
							$.ajax({
									url:'<?php echo base_url(); ?>users/ajaxgettown/',
									type:'post',
									data:'data='+DistrictId,
									success:function(data)
									{
										$('#subdiv').html(data);
									}
									});
						}
						</script>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<input type="submit" class="btn btn-success" value="Submit"  />
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->
<?php $this->load->view('includes/footer'); ?>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    
     <script>
	 
	$(".js-example-placeholder-multiple").select2({
    placeholder: "Select a Name"
});

$(".js-example-basic-single").select2({
    placeholder: "Select a Project"
});


 $(function() {
    $( "#datepicker" ).datepicker({ minDate: 0});
  });
  
  
  $( function() {
    $( "#datepicker1" ).datepicker();
  } );


	 </script>         