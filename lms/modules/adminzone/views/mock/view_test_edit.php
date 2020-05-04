<?php $this->load->view('includes/header'); ?>  
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
		<div class="title_left">
			<h3><?php echo $heading_title; ?></h3>
		</div>    
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
				<div class="x_title">
					<h2><?php echo $heading_title; ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </ul>
                    <div class="clearfix"></div>
				</div>
                <div class="x_content">
					<!-- Smart Wizard -->
					<?php validation_message();?>
                    <?php error_message(); ?>
					<?php echo form_open_multipart(current_url_query_string(),array('id'=>'form','class'=>'form-horizontal form-label-left'));?>
               
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Test Title <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="mock_title"  value="<?php echo set_value('mock_title',$res['mock_title']);?>" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description:<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<textarea name="mock_description" rows="5" cols="50" class="form-control col-md-7 col-xs-12" id="description" ><?=set_value('mock_description',$res['mock_description']);?></textarea>
							<?php //echo display_ckeditor($ckeditor); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date of exam <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="date"name="exam_date"  value="<?php echo set_value('exam_date',$res['exam_date']);?>" class="form-control col-md-7 col-xs-12">
						</div>
					</div>	
					<?php $t_time=explode(':',$res['str_total_time']);	
					$h=array('00'=>'00','01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06')
					?>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Time <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select name='hh'class="form-control col-md-1 col-xs-12">
								<?php 
								foreach($h as $k=>$v)
								{ 
									if($t_time[0]==$v)
									{
										$sel='selected';
									}
									else
									{
									$sel=''		;					  
									}
								?>
									<option value='<?php echo $v;?>'  <?php echo $sel;?>   ><?php echo $v;?></option> 
								<?php 
								} 
								?>
							</select>
							<select name='mm'class="form-control col-md-1 col-xs-12">
								<option value=''>Select Minute</option>
								<?php 
								for($i=0;$i<=59;$i++)
								{ 
									if($t_time[1]==$i)
									{
										$sel='selected';
									}
									else
									{
										$sel=''		;					  
									}
								?>
								<option value='<?php echo $i;?>'  <?php echo $sel;?>   ><?php echo $i;?></option> 
								<?php 
								} 
								?>
							</select>
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
							<input type="text"name="total_question"placeholder="200"  value="<?php echo set_value('total_question',$res['total_question']);?>" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Marks <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text"name="str_total_mark"placeholder="200"  value="<?php echo set_value('str_total_mark',$res['str_total_mark']);?>" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<input type="submit" value="Update" class="btn btn-primary" name="add">
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('includes/footer'); ?>