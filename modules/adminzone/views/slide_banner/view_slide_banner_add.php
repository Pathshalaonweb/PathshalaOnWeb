<?php $this->load->view('includes/header'); ?>
<div id="content">
<div class="breadcrumb"> <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; <?php echo anchor('adminzone/slide_banner','Back To Listing'); ?> &raquo; <?php echo $heading_title; ?> </div>
<div class="box">
  <div class="heading">
   <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons">&nbsp;</div>
  </div>
  <div class="content"> <?php echo validation_message();?> <?php echo error_message(); ?> <?php echo form_open_multipart('adminzone/slide_banner/add/');?>
    <div id="tab_pinfo">
      <table width="90%"  class="form"  cellpadding="3" cellspacing="3">
        <tr>
          <th colspan="2" align="center" > </th>
        </tr>
        <tr class="trOdd">
          <td width="28%" height="26" align="right" >Banner Title: <span class="required">*</span></td>
          <td width="72%" align="left"><input type="text" name="banner_title" value="<?php echo $this->input->post('banner_title');?>"  size="80"/></td>
        </tr>
        <tr class="trOdd">
          <td width="28%" height="26" align="right" >Banner Button1 Link: <span class="required">*</span></td>
          <td width="72%" align="left"><input type="text" name="banner_url" value="<?php echo $this->input->post('banner_url');?>" size="80"/></td>
        </tr>
        <tr class="trOdd">
          <td width="28%" height="26" align="right" >Banner Type: <span class="required">*</span></td>
          <td width="72%" align="left">
          	<select name="type">
            	<option value="">Select Banner Type</option>
                <option value="2">How Pathshala Works - Student</option>
                <option value="3">How Pathshala Works - Teacher</option>
            </select>
          </td>
        </tr>
         <?php /*?><tr class="trOdd">
          <td width="28%" height="26" align="right" >Banner Button1 Name: <span class="required">*</span></td>
          <td width="72%" align="left"><input type="text" name="button_one" value="<?php echo set_value('button_one');?>" size="80"/></td>
        </tr>
        <tr class="trOdd">
          <td width="28%" height="26" align="right" >Banner Button2 Link: <span class="required">*</span></td>
          <td width="72%" align="left"><input type="text" name="bannerOther_url" value="<?php echo $this->input->post('bannerOther_url');?>" size="80"/></td>
        </tr>
        <tr class="trOdd">
          <td width="28%" height="26" align="right" >Banner Button2 Name: <span class="required">*</span></td>
          <td width="72%" align="left"><input type="text" name="button_two" value="<?php echo set_value('button_two');?>" size="80"/></td>
        </tr><?php */?>
         <tr class="trOdd">
          <td width="28%" height="26" align="right" >Banner Detail Text: <span class="required">*</span></td>
          <td width="72%" align="left">
          <textarea name="detail" cols="78" rows="5"><?php echo set_value('detail');?></textarea>
        </tr>
        <tr class="trOdd">
          <td width="28%" height="26" align="right" > Banner Image : <span class="required">*</span></td>
          <td align="left"><input type="file" name="image1" id="image1" />
            <br />
            <strong>Best Image Size : (541*297)</strong></td>
        </tr>
        <tr class="trOdd">
          <td align="left">&nbsp;</td>
          <td align="left"><input type="submit" name="sub" value="Add Banner" class="button2" />
            <input type="hidden" name="action" value="addbanner" /></td>
        </tr>
      </table>
    </div>
    <?php echo form_close(); ?> </div>
</div>
<?php $this->load->view('includes/footer'); ?>
