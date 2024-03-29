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
          <div class="x_content"> <br />
            <?php echo form_open(current_url_query_string(), 'class="form-horizontal form-label-left" id="form"');?>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Subject Name : <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="subject_name" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('subject_name');?>" />
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="course_id" class="js-example-basic-single js-states form-control">
                <?php 
					$sel_q ="SELECT * FROM `tbl_courses` where status='1'  ORDER BY courses_name ASC";
					$sub_res=$this->db->query($sel_q);
				?>
                  <option value="">Select Course</option>
                <?php 
				if ($sub_res->num_rows() > 0) {
				$result=$sub_res->result_array();
				foreach($result as $key=>$val) {
				?>
                  <option value="<?php echo $val['courses_id'];?>"><?php echo $val['courses_name'];?>&nbsp; // &nbsp; <?php echo $val['courses_code']?></option>
                  <?php
				 }
				}
				?>
                </select>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <input type="submit" name="sub" value="Add" class="btn btn-success" />
                <input type="hidden" name="action" value="addsubject" />
              </div>
            </div>
            <?php echo form_close(); ?> </div>
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
    placeholder: "Select a Course"
});
 $(function() {
    $( "#datepicker" ).datepicker({ minDate: 0});
  });
  $( function() {
    $( "#datepicker1" ).datepicker();
  } );
</script>