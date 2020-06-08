<?php $this->load->view('includes/header'); ?>
<?php 
$pcatID =($this->uri->segment(4) > 0)? $this->uri->segment(4):"0";
$pcatID = (int) $pcatID;
?>
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
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <?php validation_message();?>
          <?php error_message(); ?>
          <?php echo form_open_multipart('adminzone/courses/subject_add/'.$category_id.'/',array('id'=>'form','class'=>'form-horizontal form-label-left'));?>
          <?php
				$selcatID = ($this->input->post('category_id')!='') ? $this->input->post('category_id'): $pcatID;
				$selcatID = (int) $selcatID;
		  ?>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Subject Name <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="courses_name"  value="<?php echo set_value('courses_name');?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Teacher <span class="required">*</span> </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="teacher_id"  class="form-control col-md-7 col-xs-12">
              <option value="">Select Teacher</option>
               <?php 
			    $db2 = $this->load->database('database2', TRUE); 
				$sql="SELECT * FROM `wl_teacher` where status='1' order BY first_name";
				$query=$db2->query($sql);
				foreach($query->result_array() as $val){
			   ?>	
                <option value="<?php echo $val['teacher_id']?>"><?php echo $val['first_name']?> // <?php echo $val['user_name']?> // <?php echo $val['phone_number']?></option>
              <?php }?>
              </select>
          </div>    
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Subject Name <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="courses_name"  value="<?php echo set_value('courses_name');?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Price<span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="price"  value="<?php echo set_value('price');?>" class="form-control col-md-7 col-xs-12"><br><strong>[If the course is free just write 1]</strong>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Credit Price<span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="credit_price"  value="<?php echo set_value('credit_price');?>" class="form-control col-md-7 col-xs-12"><br><strong>[This is price will remove from student credit system]</strong>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Subject Image <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
         	<input type="file" name="courses_image" class="form-control col-md-7 col-xs-12"/>
              <br />
            [ <?php echo $this->config->item('category.best.image.view');?> ]
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Subject Code <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text"name="courses_code"  value="<?php echo set_value('courses_code');?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          
          <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description:<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea name="courses_description" rows="5" cols="50" class="form-control col-md-7 col-xs-12" id="description" ><?=set_value('courses_description');?>
</textarea>
                <?php echo display_ckeditor($ckeditor); ?> </div>
            </div>
          
          
          <!--<div class="form-group">

						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description:<span class="required">*</span></label>

						<div class="col-md-6 col-sm-6 col-xs-12">

							<textarea name="courses_description" rows="5" cols="50" class="form-control col-md-7 col-xs-12" id="description" ><?=set_value('courses_description');?></textarea>

							<?php //echo display_ckeditor($ckeditor); ?>

						</div>

					</div>

                    <div class="form-group">

						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Time <span class="required">*</span>

						</label>

						<div class="col-md-6 col-sm-6 col-xs-12">

						  <input type="text"name="str_total_time"placeholder=" 2 Hours 30 Minutes"  value="<?php //echo set_value('str_total_time');?>" class="form-control col-md-7 col-xs-12">

						</div>

					</div>-->
          
          <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="hidden"value="add"name="add">
              <input type="submit"value="add" class="btn btn-primary"name="add">
            </div>
          </div>
        </div>
      </div>
      <?php echo form_close(); ?> </div>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>
