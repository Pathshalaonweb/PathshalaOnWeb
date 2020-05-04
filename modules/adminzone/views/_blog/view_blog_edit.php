<?php $this->load->view('includes/header'); ?>

<div id="content">
<div class="breadcrumb"> <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; <?php echo anchor('adminzone/faq','Back To Listing'); ?> &raquo; <?php echo $heading_title; ?> </div>
<div class="box">
  <div class="heading">
    <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons">&nbsp;</div>
  </div>
  <div class="content"> <?php echo validation_message(); ?> <?php echo error_message();  ?> <?php echo form_open_multipart(current_url_query_string());?>
    <table width="90%"  class="tableList" align="center" cellpadding="5" cellspacing="5">
      <tr>
        <th colspan="2" align="center" > </th>
      </tr>
      <tr>
      	 <td height="26">Category : <span class="required">*</span></td>
        <td>
        	<select name="category_id" style="width:350px;"  size="8">
            	<?php echo get_blogcategory_dropdown_menu(0,$res['category_id']);?>
        	</select>
        </td>
      </tr>
      <tr class="trOdd">
        <td height="26">Title : <span class="required">*</span></td>
        <td><input type="text" name="title" size="70" value="<?php echo set_value('title',$res['title']);?>"></td>
      </tr>
      <tr class="trEven">
        <td width="197" height="26">Detail : <span class="required">*</span></td>
        <td width="667" style="f"><textarea name="detail" rows="8" cols="77" id="blog_detail" ><?php echo set_value('detail',$res['detail']);?></textarea>
          <?php  echo display_ckeditor($ckeditor); ?></td>
      </tr>
      <tr class="trOdd">
        <td align="left">&nbsp;</td>
        <td align="left"><input type="submit" name="sub" value="Edit" class="button2" /></td>
      </tr>
    </table>
    <?php echo form_close(); ?> </div>
</div>
<?php $this->load->view('includes/footer'); ?>
