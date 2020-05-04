<?php $this->load->view('includes/header'); ?>
<div class="content">
<div id="content">
<div class="breadcrumb"> <?php echo anchor('adminzone/dashbord','Home'); ?>&raquo; <?php echo anchor('adminzone/courses','Back To Listing'); ?> &raquo; <?php echo $heading_title; ?> </div>
<div class="box">
  <div class="heading">
    <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons"> <a href="javascript:void(0);" onclick="$('#form').submit();" class="button">Save</a> <a href="javascript:void(0);" onclick="history.back();" class="button">Cancel</a> </div>
  </div>
  <div class="content">
    <div id="tabs" class="htabs"> <a href="#tab-general">General</a> <a href="#tab-image">Image</a> </div>
    <?php echo validation_message();?> <?php echo error_message(); ?> <?php echo form_open_multipart(current_url_query_string(),array('id'=>'form'));?>
    <div id="tab-general">
      <table width="100%"  class="form"  cellpadding="3" cellspacing="3">
        <tr>
          <th colspan="2" align="right" > <span class="required">*Required Fields</span><br>
            <span class="required">**Conditional Fields</span> </th>
        </tr>
        <tr>
          <th colspan="2" align="center" > </th>
        </tr>
        <?php /*?><tr class="trOdd">
          <td width="26%" height="26" align="right" valign="top" ><span class="required">*</span> Category:</td>
          <td width="74%" align="left"><select name="category_id" style="width:350px;"  size="8">
              <?php echo get_nested_dropdown_menu(0,$res['category_id']);?>
            </select></td>
        </tr><?php */?>
        <tr class="trOdd">
          <td width="26%" height="26" align="right" ><span class="required">*</span> course Name:</td>
          <td width="74%" align="left"><input type="text" name="course_name" size="40" value="<?php echo set_value('course_name',$res['course_name']);?>"></td>
        </tr>
        <tr class="trOdd">
          <td width="26%" height="26" align="right" ><span class="required">*</span> course Code:</td>
          <td align="left"><input type="text" name="course_code" size="40" value="<?php echo set_value('course_code',$res['course_code']);?>" /></td>
        <tr class="trOdd">
          <td width="26%" height="26" align="right" ><span class="required">*</span> Price:</td>
          <td width="74%" align="left"><input type="text" name="course_price" size="40" value="<?php echo set_value('course_price',$res['course_price']);?>"></td>
        </tr>
        <tr class="trOdd">
          <td width="26%" height="26" align="right" ><span class="required">**</span> Discounted price:</td>
          <td width="74%" align="left"><input type="text" name="course_discounted_price" size="40" value="<?php echo set_value('course_discounted_price',$res['course_discounted_price']);?>"></td>
        </tr>
      
        <tr class="trOdd">
          <td width="26%" height="26" align="right" > Description:</td>
          <td align="left"><textarea name="courses_description" rows="5" cols="50" id="description" ><?php echo $res['courses_description'];?></textarea>
            <?php  echo display_ckeditor($ckeditor); ?></td>
        </tr>
        <tr class="trOdd">
          <td align="left">&nbsp;</td>
          <td align="left"><input type="hidden" name="courses_id" value="<?php echo $res['courses_id'];?>"></td>
        </tr>
      </table>
    </div>
    <div id="tab-image">
      <input type="hidden" name="course_exclude_images_ids" value="" id="course_exclude_images_ids" />
      <table id="images" class="list">
        <thead>
          <tr>
            <td class="left">Image</td>
          </tr>
        </thead>
        <table id="images" class="form">
          <?php
			//trace($res_photo_media);
			$j=0;
			for($i=1;$i<=$this->config->item('total_course_images');$i++)
			{
				$course_img  = @$res_photo_media[$j]['media'];
				$course_path = "courses/".$course_img;
				$course_img_auto_id  = @$res_photo_media[$j]['id']; 
				
			?>
          <tr>
            <td width="28%" align="right" ><span class="required">**</span>Image <?php echo $i;?></td>
            <td width="2%" height="26" align="center" >:</td>
            <td align="left"><input type="file" name="course_images<?php echo $i;?>" />
              <?php
					if( $course_img!='' && file_exists(UPLOAD_DIR."/".$course_path) )
					{ 
					?>
              <a href="#"  onclick="$('#dialog_<?php echo $j;?>').dialog();">View</a> |
              <input type="checkbox" name="course_img_delete[<?php echo $course_img_auto_id;?>]" value="Y" />
              Delete
              <?php	
					}
					?>
              <br />
              <br />
              [ <?php echo $this->config->item('course$i.best.image.view');?> ]
              <div id="dialog_<?php echo $j;?>" title="Product Image" style="display:none;"> <img src="<?php echo base_url().'uploaded_files/'.$course_path;?>"  /> </div>
              <input type="hidden" name="media_ids[]" value="<?php echo $course_img_auto_id;?>" /></td>
          </tr>
          <?php
			$j++;
			}
			?>
        </table>
        <tfoot>
        </tfoot>
      </table>
    </div>
    <?php echo form_close(); ?> </div>
</div>
<script type="text/javascript"><!--
$('#tabs a').tabs(); 
$('#languages a').tabs(); 
$('#vtab-option a').tabs();
//-->
$('#course_exclude_images_ids').val('');
function delete_course_images(img_id)
{
	//alert($('#course_exclude_images_ids').val());
	 img_id = img_id.toString();
	 exclude_ids1 = $('#course_exclude_images_ids').val();
	 exclude_ids1_arr = exclude_ids1=='' ? Array() : exclude_ids1.split(',');
	 
	 if($.inArray(img_id,exclude_ids1_arr)==-1){
		  exclude_ids1_arr.push(img_id);
	 }
	 
	 exclude_ids1 =  exclude_ids1_arr.join(',');
	 
	 
	$('#course_exclude_images_ids').val(exclude_ids1);
	$('#course_image'+img_id).remove();
	$('#del_img_link_'+img_id).remove();
		
	alert($('#course_exclude_images_ids').val());
	
}

</script>
<?php $this->load->view('includes/footer'); ?>
