<?php $this->load->view('includes/header'); ?>

<div id="content">
<div class="breadcrumb"> <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; <?php echo anchor('adminzone/review','Back To Listing'); ?> &raquo; <?php echo $heading_title; ?> </div>
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
    
    <tr class="trOdd">
        <td height="26">Conceptual Clarity : <span class="required">*</span></td>
        <td><input type="text" name="rating" size="40" value="<?php echo set_value('rating',$res['rating']);?>"></td>
      </tr>
   
   	<tr class="trOdd">
        <td height="26">Teaching Style: <span class="required">*</span></td>
        <td><input type="text" name="teachingstyle" size="40" value="<?php echo set_value('teachingstyle',$res['teachingstyle']);?>"></td>
      </tr>
    
    <tr class="trOdd">
        <td height="26">Discipline : <span class="required">*</span></td>
        <td><input type="text" name="discipline" size="40" value="<?php echo set_value('discipline',$res['discipline']);?>"></td>
      </tr>
    
    <tr class="trOdd">
        <td height="26">Study Material : <span class="required">*</span></td>
        <td><input type="text" name="studymaterial" size="40" value="<?php echo set_value('studymaterial',$res['studymaterial']);?>"></td>
      </tr>
      
    <tr class="trOdd">
        <td height="26">Location : <span class="required">*</span></td>
        <td><input type="text" name="locations" size="40" value="<?php echo set_value('locations',$res['locations']);?>"></td>
      </tr>
      
    <tr class="trOdd">
        <td height="26">Infrastructure : <span class="required">*</span></td>
        <td><input type="text" name="infrastructure" size="40" value="<?php echo set_value('infrastructure',$res['infrastructure']);?>"></td>
      </tr>
      
              
   
      <tr class="trOdd">
        <td align="left">&nbsp;</td>
        <td align="left"><input type="submit" name="sub" value="Save" class="button2" /></td>
      </tr>
    </table>
    <?php echo form_close(); ?> </div>
</div>
<?php $this->load->view('includes/footer'); ?>
