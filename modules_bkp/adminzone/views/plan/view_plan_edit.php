<?php $this->load->view('includes/header'); ?>

<div id="content">
<div class="breadcrumb"> <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; <?php echo anchor('adminzone/faq','Back To Listing'); ?> &raquo; <?php echo $heading_title; ?> </div>
<div class="box">
  <div class="heading">
    <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons"> <a href="javascript:void(0);" onclick="$('#form').submit();" class="button">Save</a> <a href="javascript:void(0);" onclick="history.back();" class="button">Cancle</a> </div>
  </div>
  <div class="content"> <?php echo validation_message(); ?> <?php echo error_message();  ?> <?php echo form_open_multipart(current_url_query_string(),array('id'=>'form'));?>
    <table width="90%"  class="tableList" align="center" cellpadding="5" cellspacing="5">
      <tr>
        <th colspan="2" align="center" > </th>
      </tr>
      <tr class="trOdd">
        <td height="26">Name : <span class="required">*</span></td>
        <td><input type="text" name="name" size="40" value="<?php echo set_value('name',$res['name']);?>"></td>
      </tr>
      <tr class="trOdd">
        <td height="26">Price : <span class="required">*</span></td>
        <td><input type="text" name="price" size="40" value="<?php echo set_value('price',$res['price']);?>"></td>
      </tr>
      <tr class="trOdd">
        <td height="26">validity : <span class="required">*</span></td>
        <td><select name="validity" style="width:350px;">
            <?php for ($x = 1; $x <= 12; $x++) {?>
            <option value="<?php echo $x;?>" <?php if($x==$res['validity']){echo"selected";}?> <?php echo set_select('validity',"$x", ( !empty($data) && $data == "$x" ? TRUE : FALSE )); ?>><?php echo $x;?></option>
            <?php }?>
          </select></td>
      </tr>
      <tr class="trEven">
        <td width="197" height="26">Description : <span class="required">*</span></td>
        <td width="667" style="f"><textarea name="detail" rows="8" cols="77" id="detail" ><?php echo set_value('detail',$res['detail']);?></textarea>
          <?php  //echo display_ckeditor($ckeditor); ?></td>
      </tr>
      <tr class="trOdd">
        <td align="left">&nbsp;</td>
        <td align="left"><!--<input type="submit" name="sub" value="Edit" class="button2" />--></td>
      </tr>
    </table>
    <?php echo form_close(); ?> </div>
</div>
<?php $this->load->view('includes/footer'); ?>
