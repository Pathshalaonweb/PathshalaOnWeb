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
						<br />
						<?php echo form_open(current_url_query_string(), 'class="form-horizontal form-label-left" id="form"');?> 
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Lession Name : <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="lession_name" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('lession_name');?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Exam Type : <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="exam_type"class="form-control col-md-7 col-xs-12" >
									<option value="0">Optional</option>              
								</select>
							</div>
						</div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Question <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text"name="total_question"placeholder="200"  value="<?php echo set_value('total_question');?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Marks <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text"name="str_total_mark"placeholder="200"  value="<?php echo set_value('str_total_mark');?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
							<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description:<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea name="courses_description" rows="5" cols="50" class="form-control col-md-7 col-xs-12" id="description" ><?=set_value('courses_description');?></textarea>
								<?php //echo display_ckeditor($ckeditor); ?>
							</div>
						</div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date of exam <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="date"name="exam_date"  value="<?php echo set_value('exam_date');?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Time(HH:MM) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
								<select name='hh'class="form-control col-md-1 col-xs-12">
									<option value=''>Select Hour</option>
									<option value='00' <?php if(set_value('hh')=='00'){ echo "selected";}?>>00</option>
									<option value='01' <?php if(set_value('hh')=='01'){ echo "selected";}?>>01</option>
									<option value='02' <?php if(set_value('hh')=='02'){ echo "selected";}?>>02</option>
									<option value='03' <?php if(set_value('hh')=='03'){ echo "selected";}?>>03</option>
									<option value='04' <?php if(set_value('hh')=='04'){ echo "selected";}?>>04</option>
									<option value='05' <?php if(set_value('hh')=='05'){ echo "selected";}?>>05</option>
									<option value='06' <?php if(set_value('hh')=='06'){ echo "selected";}?>>06</option>
								</select>
								<select name='mm'class="form-control col-md-1 col-xs-12">
									<option value=''>Select Minute</option>
									<?php for($i=0;$i<=59;$i++){ ?>
									<option value='<?php echo $i;?>' <?php if(set_value('mm')==$i){ echo "selected";}?>><?php echo $i;?></option> 
									<?php } ?>
								</select>
								<!-- <input type="text"name="str_total_time" value="00:00" class="form-control col-md-7 col-xs-12">-->
                            </div>
                        </div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<input type="submit" name="sub" value="Add" class="btn btn-success" />
								<input type="hidden" name="action" value="addsubject" />
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