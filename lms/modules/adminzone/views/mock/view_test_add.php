<?php $this->load->view('includes/header'); ?>
<?php 

$pcatID =($this->uri->segment(4) > 0)? $this->uri->segment(4):"0";

$pcatID = (int) $pcatID;

?>

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
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <?php validation_message();?>
          <?php error_message(); ?>
          <?php echo form_open_multipart('adminzone/mock/add_test/'.$dept_id,array('id'=>'form','class'=>'form-horizontal form-label-left'));?>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Test Title <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="mock_title"  value="<?php echo set_value('mock_title');?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description:<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea name="mock_description" rows="5" cols="50" class="form-control col-md-7 col-xs-12" id="description" ><?=set_value('mock_description');?>
</textarea>
              <?php //echo display_ckeditor($ckeditor); ?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date of exam <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="date"name="exam_date"  value="<?php echo set_value('exam_date');?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Time(HH:MM) <span class="required">*</span></label>
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
                <?php 

								for($i=00;$i<=59;$i++)

								{ ?>
                <option value='<?php echo $i;?>' <?php if(set_value('mm')==$i){ echo "selected"; }?>><?php echo $i;?></option>
                <?php 

								} ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Exam Type : <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="exam_type"class="form-control col-md-7 col-xs-12" >
                <option value="0">Optional</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Question <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text"name="total_question"placeholder="200"  value="<?php echo set_value('total_question');?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Marks <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text"name="str_total_mark"placeholder="200"  value="<?php echo set_value('str_total_mark');?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <input type="hidden"value="add"name="add">
          <input type="submit"value="add" class="btn btn-primary"name="add">
          <?php echo form_close(); ?> </div>
      </div>
    </div>
  </div>
</div>

<!-- /page content -->

<?php $this->load->view('includes/footer'); ?>
