<?php $this->load->view('includes/header'); ?>

<!-- page content -->
<ol></ol>
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
            <?php echo form_open_multipart(current_url_query_string(),'class="form-horizontal form-label-left" id="form"');?>
            <div class="form-group" id="shwtxt">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Question <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea name="question" placeholder="Which among the following elements increases the absorption of water and calcium in plants?"rows="5" cols="50" class="form-control col-md-7 col-xs-12" id="description" ><?php echo set_value('question');?></textarea>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="radio" name="que_type" value="1" id="que_type1" checked >
                &nbsp;Text &nbsp;&nbsp;&nbsp;
                <input type="radio" name="que_type" onclick="showimg();">
                &nbsp;Image </div>
            </div>
            <div class="form-group"style="display:none" id="shwimg" >
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Question <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" name="question_img" class="form-control col-md-7 col-xs-12"  >
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="radio" name="que_type" onclick="showtxt();">
                &nbsp;Text &nbsp;&nbsp;&nbsp;
                <input type="radio" name="que_type" value="2" id="que_txt1" >
                &nbsp;Image </div>
            </div>
            <div class="form-group" id="opttxt1">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option I <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text"name="option_i" placeholder="Manganese"  value="<?php echo set_value('option_i');?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group" id="opttxt2">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option II <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text"name="option_ii" placeholder="Boron" value="<?php echo set_value('option_ii');?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group" id="opttxt3">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option III <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text"name="option_iii" placeholder="Copper" value="<?php echo set_value('option_iii');?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group" id="opttxt4">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option IV <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text"name="option_iv" placeholder="Molybdenum" value="<?php echo set_value('option_iv');?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Answer <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select name="answer" class="form-control col-md-7 col-xs-12">
                  <option value=''>Select Correct Answer</option>
                  <option value='1'>Option I</option>
                  <option value='2'>Option II</option>
                  <option value='3'>Option III</option>
                  <option value='4'>Option IV</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="submit"value="Add Question" class="btn btn-success"name="add">
              </div>
            </div>
            <?php echo form_close(); ?> </div>
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

	

	

	function showimg1()

	{

		

		document.getElementById("opttxt1").style.display = "none";

		document.getElementById("optimg1").style.display = "block";

		document.getElementById("que_img1").checked=true;

	}

	

	function showtxt1()

	{

		

		document.getElementById("opttxt1").style.display = "block";

		document.getElementById("optimg1").style.display = "none";

		document.getElementById("que_txt1").checked=true;

	}

	

	//*******************************

	function showimg2()

	{

		

		document.getElementById("opttxt2").style.display = "none";

		document.getElementById("optimg2").style.display = "block";

		document.getElementById("que_img2").checked=true;

	}

	

	function showtxt2()

	{

		

		document.getElementById("opttxt2").style.display = "block";

		document.getElementById("optimg2").style.display = "none";

		document.getElementById("que_txt2").checked=true;

	}

	

	//****************************

	

	function showimg3()

	{

		

		document.getElementById("opttxt3").style.display = "none";

		document.getElementById("optimg3").style.display = "block";

		document.getElementById("que_img3").checked=true;

	}

	

	function showtxt3()

	{

		

		document.getElementById("opttxt3").style.display = "block";

		document.getElementById("optimg3").style.display = "none";

		document.getElementById("que_txt3").checked=true;

	}

	//****************************

	

	function showimg4()

	{

		

		document.getElementById("opttxt4").style.display = "none";

		document.getElementById("optimg4").style.display = "block";

		document.getElementById("que_img4").checked=true;

	}

	

	function showtxt4()

	{

		

		document.getElementById("opttxt4").style.display = "block";

		document.getElementById("optimg4").style.display = "none";

		document.getElementById("que_txt4").checked=true;

	}

	//****************************

</script>
<?php $this->load->view('includes/footer'); ?>
