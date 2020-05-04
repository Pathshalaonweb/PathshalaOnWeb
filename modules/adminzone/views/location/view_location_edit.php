<?php $this->load->view('includes/header'); ?>
<div id="content">
<div class="breadcrumb"> <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; <?php echo anchor('adminzone/location','Back To Listing'); ?> &raquo; <?php echo $heading_title; ?> </div>
<div class="box">
  <div class="heading">
    <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons">&nbsp;</div>
  </div>
  <div class="content"> <?php echo validation_message(); ?> <?php echo error_message();  ?> <?php echo form_open_multipart(current_url_query_string());?>
    <table width="90%"  class="tableList" align="center">
      <tr>
        <th colspan="2" align="center" > </th>
      </tr>
      <tr class="trEven">
        <td width="197" height="26">Select state : <span class="required">*</span></td>
        <td width="667" style="f">
<?php 
$s_info=get_db_single_row('tbl_states',$fields="*",$condition="WHERE id='".$res['state_id']."'");
?>
<select name="state_id" style="width:400px;">
<option value="<?php echo $s_info['id']; ?>"><?php echo $s_info['name']; ?></option>
<option value="">Please select state</option>
<?php 
$place_sql1="SELECT * FROM `tbl_states` where country_id='101'";
$place_query1=$this->db->query($place_sql1);
foreach($place_query1->result_array() as $place_row1){
?><option value="<?php echo $place_row1['id'];?>"><?php echo $place_row1['name'];?></option>
<?php }?>
<select>
</td>
      </tr>
      <tr class="trOdd">
        <td height="26">Place name:<span class="required">*</span></td>
        <td><input type="text" name="name" size="80" value="<?php echo set_value('name',$res['name']);?>"></td>
      </tr>
      
      <tr class="trOdd">
        <td align="left">&nbsp;</td>
        <td align="left"><input type="submit" name="sub" value="update" class="button2" />
          <input type="hidden" name="action" value="addnews" /></td>
      </tr>
    </table>
    <?php echo form_close(); ?> </div>
</div>
<?php $this->load->view('includes/footer'); ?>
