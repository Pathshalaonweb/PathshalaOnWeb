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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Question <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9col-xs-12">
							 <textarea name="question" placeholder="She got the job // the fact that she had very little experience."rows="5" cols="50" class="form-control col-md-7 col-xs-12" id="question" ><?php echo set_value('question');?></textarea>
                           		 <?php echo display_ckeditor($ckeditor); ?>
                            		<label class="control-label"> [Please divide double Forward slash // where blank area and dont use multiple double shash in a single question... ]</label>  
                            </div>

                          </div>
                          
                           
                          
                          
                        <!--   <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option  <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
      <textarea name="option" placeholder="Otherwise/unless/in/addition/infact/moreover/although/hence/whereas/furthermore/  despite/therefore/instead/nonetheless/however/consequently/likewise"rows="5" cols="50" class="form-control col-md-7 col-xs-12" id="description" ><?php echo set_value('option');?></textarea>
								<label class="control-label"> [Please divide each option Forward slash '/' and dont use extra spaces after or before shash... ]</label>
                            </div>
                          </div>-->

                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Answer <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text"name="ans" placeholder="despite" value="<?php echo set_value('ans');?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                           <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
<input type="submit"value="Add Question" class="btn btn-success"name="add_blank">
							   </div>
	</div>
<?php echo form_close(); ?>
</div>
</div>
</div>
</div>

</div>
</div>
<!-- /page content --><br>
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