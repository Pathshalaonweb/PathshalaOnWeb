<?php $this->load->view('includes/header'); ?>  
 <div id="content">
  
  <div class="breadcrumb">
  
      <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo;  <?php echo anchor('adminzone/products','Products'); ?> &raquo; <?php echo anchor('adminzone/products/colorimg/'.$this->uri->segment(4),'Back To Listing'); ?> &raquo;  <?php echo $heading_title; ?> 
             
   </div>      
       
 <div class="box">
 
    <div class="heading">
    
      <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
      <div class="buttons">&nbsp;</div>
      
    </div>
    
    
	<div class="content">
		<?php
		echo validation_message();?>
        <?php echo error_message(); ?>
		
		<?php echo form_open_multipart('adminzone/products/add_color_img/'.$this->uri->segment(4));?>  
		<div id="tab_pinfo">
			<table width="90%"  class="form"  cellpadding="3" cellspacing="3">
			<tr>
				<th colspan="2" align="center" > </th>
			</tr>
			 <?php $color_list=explode(',',$rowdata['product_color']); ?>
			<tr class="trOdd">
				<td width="28%" height="26" align="right" >Select Color : <span class="required">*</span> </td>
				<td width="72%" align="left">
                <select name="color_id" style="width:150px;">
                   <option value="">Select Color</option>
                  <?php foreach($color_list as $val)
                        {
                            $color_title=get_db_single_row('wl_color','color_name',$Condwherw='WHERE 1 AND color_id="'.$val.'"');
                            $selected=($this->input->post('color_id')==$val) ? 'selected' : '';
                            
                            ?>
                        <option value="<?php echo $val;?>" <?php echo $selected;?>><?php echo $color_title['color_name'];?></option>
                  <?php }?>
                  </select>
				</td>
			</tr>
			<tr class="trOdd">
				<td width="28%" height="26" align="right" > Color Image : <span class="required">*</span> </td>
				<td align="left"><input type="file" name="media" id="media" /></td>
			</tr>
			<tr class="trOdd">
				<td align="left">&nbsp;</td>
				<td align="left">
					<input type="submit" name="sub" value="Add" class="button2" />
					<input type="hidden" name="action" value="add" />
                    <input type="hidden" name="products_id" value="<?php echo $this->uri->segment(4);?>" />
				</td>
			</tr>
			</table>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
<?php $this->load->view('includes/footer'); ?>