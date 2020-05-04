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
					<?php //validation_message();?>
					<?php error_message(); ?>
					<div class="x_content">
						<br />
						<?php echo form_open('adminzone/setting/edit/', 'class="form-horizontal form-label-left" id="demo-form2"');?> 
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Old Password: <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="password" name="old_pass" id="old_pass" maxlength="40" value='' class="form-control col-md-7 col-xs-12" />
								<span style="color:red;"><?php echo form_error('old_pass');?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">New Password: <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="password" name="new_pass" maxlength="30" class="form-control col-md-7 col-xs-12"  value='' />
								<span style="color:red;"><?php echo form_error('new_pass');?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password:<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="password" name="confirm_password" size="40" maxlength="30" class="form-control col-md-7 col-xs-12" value="" />
								<span style="color:red;"><?php echo form_error('confirm_password');?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email :<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="admin_email" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('admin_email',$admin_info->admin_email);?>"<?php echo  $this->admin_log_data['admin_type']!=1 ? ' readonly="readonly"' : '';?> />
								<span style="color:red;"><?php echo form_error('admin_email');?></span>
							</div>
						</div>
						<?php
						if($this->admin_log_data['admin_type']==1)
						{
						?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Address : <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea name="address" class="form-control" cols="55" rows="6"><?php echo set_value('address',$admin_info->address);?></textarea>
								<span style="color:red;"><?php echo form_error('address');?></span>
							</div>
						</div>
						<?php
						}
						?>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<input type="submit" class="btn btn-success" value="Update Info"  />
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