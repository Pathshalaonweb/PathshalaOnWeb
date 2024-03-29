<?php $this->load->view('includes/header'); ?>

<div id="content">
<div class="breadcrumb"> <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; Static Pages </a> </div>
<div class="box">
  <div class="heading">
    <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons"><a href="<?php echo base_url();?>adminzone/staticpages/add/" class="button">Add Static Block</a></div>
  </div>
  <div class="content"> 
    <script type="text/javascript">function serialize_form() { return $('#pagingform').serialize(); } </script>
    <?php  echo error_message(); ?>
    <?php echo form_open("adminzone/staticpages/",'id="search_form" method="get" '); ?>
    <table width="100%"  border="0" cellspacing="3" cellpadding="3" >
      <tr>
        <td align="center" >Search [ Name ]
          <input type="text" name="keyword" value="<?php echo $this->input->get_post('keyword');?>"  />
          &nbsp; <a  onclick="$('#search_form').submit();" class="button"><span> GO </span></a>
          <?php 
				if($this->input->get_post('keyword')!='')
				{ 
				  echo anchor("adminzone/staticpages/",'<span>Clear Search</span>');
				} 
				?></td>
      </tr>
      <div align="right" class="breadcrumb"> Records Per Page : <?php echo display_record_per_page();?> </div>
    </table>
    <?php echo form_close();?>
    <?php
   
    if( is_array($pagelist) && !empty($pagelist) )
	{
    echo form_open("adminzone/staticpages/",'id="data_form" ');?>
    <table class="list" width="100%" id="my_data">
      <thead>
        <tr> 
          <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
          <td class="left">Id </td>
          <td class="left">Name </td>
          <td class="center">Details</td>
          <td class="center">Status </td>
          <td class="center">Action</td>
        </tr>
      </thead>
      <tbody>
        <?php
		 
		  	foreach($pagelist as $val)
			{ 
			
          ?>
        <tr> 
          <td style="text-align: center;">
					<input type="checkbox" name="arr_ids[]" value="<?php echo $val['page_id'];?>" />
				</td>
          <td class="left"><?php echo $val['page_id'];?></td>
          <td class="left"><?php echo $val['page_name'];?></td>
          <td class="center"><a href="javascript:void(0);"  onclick="$('#dialog_<?php echo $val['page_id'];?>').dialog({ width: 650 });">View</a>
            <div id="dialog_<?php echo $val['page_id'];?>" title="Description" style="display:none;"> <?php echo $val['page_description'];?> </div></td>
          <td class="center"><?php echo ($val['status']==1)? "Active":"In-active";?></td>
          <td class="center"> [ <?php echo anchor("adminzone/staticpages/edit/$val[page_id]/".query_string(),'Edit'); ?> ] </td>
        </tr>
        <?php
			}
		
		  ?>
      
      <tr>
        <td colspan="6" align="right" height="30"><?php echo $page_links; ?></td>
      </tr>
      </tbody>
       <tr>
        <td align="left" colspan="11" style="padding:2px" height="35"><input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
          <input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>
          <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]','delete','Record');"/>
          </td>
      </tr>
    </table>
    <?php echo form_close();
	 }else{
	    echo "<center><strong> No record(s) found !</strong></center>" ;
	 }
	?> </div>
</div>
<?php $this->load->view('includes/footer'); ?>
