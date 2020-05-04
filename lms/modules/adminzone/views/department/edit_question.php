<?php $this->load->view('includes/header'); ?>  
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
						<?php 
						if($res['answer']==$res['option_i'])
						{
							$ans='1';
						}
						else if($res['answer']==$res['option_ii'])
						{
							$ans='2';
						}
						else if($res['answer']==$res['option_iii'])
						{
							$ans='3';
						}
						else if($res['answer']==$res['option_iv'])
						{
							$ans='4';
						}
						$data	 = array(	
										'1'		=>'Option I',
										'2'		=>'Option II',
										'3'		=>'Option III',
										'4'		=>'Option IV'
										 );
						?>
						<?php echo form_open_multipart(current_url_query_string(),'class="form-horizontal form-label-left" id="form"');?> 
						<div class="form-group" id="shwtxt">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Question <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea name="question" placeholder="Which among the following elements increases the absorption of water and calcium in plants?"rows="5" cols="50" class="form-control col-md-7 col-xs-12" id="question" ><?php  echo set_value('question',$res['question']);?></textarea>
								<?php echo display_ckeditor($ckeditor); ?>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="radio" name="que_type" value="1" id="que_type1" checked > &nbsp;Text &nbsp;&nbsp;&nbsp;
								<input type="radio" name="que_type" onclick="showimg();">&nbsp;Image
							</div>
						</div>
						<div class="form-group"style="display:none" id="shwimg" >
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Question <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file" name="question_img" class="form-control col-md-7 col-xs-12"  >
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="radio" name="que_type" onclick="showtxt();"> &nbsp;Text &nbsp;&nbsp;&nbsp;
								<input type="radio" name="que_type" value="2" id="que_type2" >&nbsp;Image
							</div>
						</div>    
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option I <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text"name="option_i" placeholder="Manganese"  value="<?php echo set_value('option_i',$res['option_i']);?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option II <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text"name="option_ii" placeholder="Boron" value="<?php echo set_value('option_ii',$res['option_ii']);?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option III <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text"name="option_iii" placeholder="Copper" value="<?php echo set_value('option_iii',$res['option_iii']);?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option IV <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text"name="option_iv" placeholder="Molybdenum" value="<?php echo set_value('option_iv',$res['option_iv']);?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Answer <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="answer" class="form-control col-md-7 col-xs-12">
									<?php 
									foreach($data as $key=>$val)
									{
										if($ans==$key)
										{
											$selected='selected';
										}
										else
										{
											$selected='';
										}
										?>
										<option value='<?php echo $key;?>' <?php echo $selected;?>><?php echo $val;?></option>
									<?php 	
									}?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="submit"value="Update Question" class="btn btn-success"name="add">
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
<script>
function showtxt()
	{
		document.getElementById("shwtxt").style.display = "block";
		document.getElementById("shwimg").style.display = "none";
		document.getElementById("que_type1").checked=true;
	}
	function showimg()
	{
		document.getElementById("shwimg").style.display = "block";
		document.getElementById("shwtxt").style.display = "none";
		document.getElementById("que_type2").checked=true;
	}
</script>
<?php $this->load->view('includes/footer'); ?>