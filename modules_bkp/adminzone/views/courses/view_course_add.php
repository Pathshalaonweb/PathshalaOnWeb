<?php $this->load->view('includes/header'); ?>
<?php 
//$pcatID =($this->uri->segment(4) > 0)? $this->uri->segment(4):"0";
//$pcatID = (int) $pcatID;
?>

<div class="content">
<div id="content">
<div class="breadcrumb"> <?php echo anchor('adminzone/dashbord','Home'); ?>&raquo; <?php echo anchor('adminzone/courses','Back To Listing'); ?> &raquo; <?php echo $heading_title; ?> </div>
<div class="box">
  <div class="heading">
    <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons"> <a href="javascript:void(0);" onclick="$('#form').submit();" class="button">Save</a> <a href="javascript:void(0);" onclick="history.back();" class="button">Cancle</a> </div>
  </div>
  <div class="content">
    <div id="tabs" class="htabs"> <a href="#tab-general">General</a> <a href="#tab-image">Image</a> </div>
    <?php echo validation_message();?> <?php echo error_message(); ?> <?php echo form_open_multipart('adminzone/courses/add/',array('id'=>'form'));?>
    <div id="tab-general">
      <table width="100%"  class="form"  cellpadding="3" cellspacing="3">
        <tr>
          <th colspan="3" align="right" > <span class="required">*Required Fields</span><br>
            <span class="required">**Conditional Fields</span> </th>
        </tr>
        <tr>
          <th colspan="3" align="center" > </th>
        </tr>
        <?php
			$selcatID = ($this->input->post('category_id')!='') ? $this->input->post('category_id'): $pcatID;
			$selcatID = (int) $selcatID;
			?>
        <?php /*?><tr class="trOdd">
          <td width="23%" align="right" valign="top" ><span class="required">*</span> Category</td>
          <td width="3%" height="26" align="center" valign="top" >: </td>
          <td width="74%" align="left"><select name="category_id" style="width:380px;"  size="10">
              <?php echo get_nested_dropdown_menu(0,$selcatID);?>
            </select></td>
        </tr><?php */?>
        <tr class="trOdd">
          <td width="23%" align="right" ><span class="required">*</span> Course Name</td>
          <td width="3%" height="26" align="center" >:</td>
          <td width="74%" align="left"><input type="text" name="course_name" size="70" value="<?php echo set_value('course_name');?>"></td>
        </tr>
        <tr class="trOdd">
          <td width="23%" align="right" ><span class="required">*</span> Course Code</td>
          <td width="3%" height="26" align="center" >:</td>
          <td align="left"><input type="text" name="course_code" size="70" value="<?php echo set_value('course_code');?>" /></td>
        </tr>
        <tr class="trOdd">
          <td width="23%" align="right" ><span class="required">*</span> Price</td>
          <td width="3%" height="26" align="center" >:</td>
          <td width="74%" align="left"><input type="text" name="course_price" size="70" value="<?php echo set_value('course_price');?>"></td>
        </tr>
        <tr class="trOdd">
          <td width="23%" align="right" ><span class="required">**</span> Discounted Price</td>
          <td width="3%" height="26" align="center" >:</td>
          <td width="74%" align="left"><input type="text" name="course_discounted_price" size="70" value="<?php echo set_value('course_discounted_price');?>"></td>
        </tr>
      
        <tr class="trOdd">
          <td width="23%" align="right" >Description</td>
          <td width="3%" height="26" align="center" >:</td>
          <td align="left"><textarea name="courses_description" rows="5" cols="50" id="description" ><?php echo set_value('courses_description');?></textarea>
            <?php  echo display_ckeditor($ckeditor); ?></td>
        </tr>
        <tr class="trOdd">
          <td align="left">&nbsp;</td>
          <td align="left">&nbsp;</td>
          <td align="left"><input type="hidden" name="action" value="addnews" />
            <input type="hidden" name="pcatID" value="<?php echo $pcatID;?>" /></td>
        </tr>
      </table>
    </div>
    <div id="tab-image">
      <table id="images" class="form">
        <?php
			for($i=1;$i<=$this->config->item('total_course_images');$i++) {
		?>
        <tr>
          <td width="28%" align="right" ><span class="required">**</span>Image <?php echo $i;?></td>
          <td width="2%" height="26" align="center" >:</td>
          <td align="left"><input type="file" name="course_images<?php echo $i;?>" />
            <br />
            [ <?php echo $this->config->item("course$i.best.image.view");?> ] </td>
        </tr>
        <?php
			}
			?>
      </table>
    </div>
    <?php echo form_close(); ?> </div>
</div>
<script type="text/javascript"><!--
$('#tabs a').tabs(); 
$('#languages a').tabs(); 
$('#vtab-option a').tabs();
//--></script>
<?php $this->load->view('includes/footer'); ?>
