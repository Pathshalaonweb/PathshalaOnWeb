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
						<?php echo form_open_multipart(current_url_query_string(),'class="form-horizontal form-label-left" id="form"');?> 
						<div class="form-group" id="shwtxt">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Question <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
								<textarea name="question" placeholder="Which among the following elements increases the absorption of water and calcium in plants?"rows="5" cols="50" class="form-control col-md-7 col-xs-12"  id="question" ><?php  echo set_value('question',$res['question']);?></textarea>
                                <?php echo display_ckeditor($ckeditor); ?>
                                <label class="control-label"> [Please divide double Forward slash // where blank area and dont use multiple double shash in a single question... ]</label>  
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Answer <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text"name="ans" placeholder="despite" value="<?php echo set_value('option',$res['answer']);?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="submit"value="Update Question" class="btn btn-success"name="add_blank">
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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