<?php $this->load->view('includes/header'); ?>

<div id="content">
<div class="breadcrumb"> <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; <?php echo $heading_title; ?> </a> </div>
<div class="box">
  <div class="heading">
    <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons"> <?php echo anchor("adminzone/location/add/",'<span>Add location</span>','class="button" ' );?></div>
  </div>
  <script type="text/javascript">function serialize_form() { return $('#pagingform').serialize(); } </script>
  <div class="content">
    <?php 
	 echo form_open("adminzone/location/",'id="search_form" method="get"');?>
    <div align="right" class="breadcrumb"> Records Per Page : <?php echo display_record_per_page();?> </div>
    <table width="100%"  border="0" cellspacing="3" cellpadding="3" >
      <?php 
            if(error_message() !=''){
               	   echo error_message();
                }
       ?>
      <tr>
        <td align="center" >Search (<span class="left">Location</span>)
          <input type="text" name="keyword" value="<?php echo $this->input->get_post('keyword');?>"  />
          &nbsp; <a  onclick="$('#search_form').submit();" class="button"><span> GO </span></a>
          <?php	
					 if( $this->input->get_post('keyword')!='' )
					 { 
					    echo anchor("adminzone/location/",'<span>View All</span>');
					 }
					 ?></td>
      </tr>
    </table>
    <?php echo form_close();?>
    <?php 
	     if( is_array($res) && !empty($res) )
		 {
		  echo form_open("adminzone/location/",'id="data_form" ');
		 
		 ?>
    <table class="list" width="100%" id="my_data">
      <thead>
        <tr>
          <td width="21" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></td>
          <td width="405" class="left">Name</td>
          <td width="73" align="center">state id</td>
          <td width="100" align="center">status</td>
          <td width="92" class="center">Action</td>
        </tr>
      </thead>
      <tbody>
       <?php 
		foreach($res as $catKey=>$pageVal){ 							
	?>
<tr>
    <td style="text-align: center;"><input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['id'];?>" /></td>
    <td class="center"><?php echo $pageVal['name'];?></td>
    <?php $s_info=get_db_single_row('tbl_states',$fields="*",$condition="WHERE id='".$pageVal['state_id']."'");
		 //echo_sql();
	 ?>
           <td class="center"><?php echo $s_info['name'];?></td>
           <td class="center"><?php echo ($pageVal['status']==1)? "Active":"In-active";?></td>
           <td class="center"><?php echo anchor("adminzone/location/edit/$pageVal[id]/".query_string(),'Edit'); ?></td>
        </tr>
        <?php
		   }		  
		  ?>
        <tr>
          <td colspan="8" align="right" height="30"><?php echo $page_links; ?></td>
        </tr>
      </tbody>
      <tr>
        <td align="left" colspan="8" style="padding:2px" height="35"><input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
          <input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>
          
          <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]','delete','Record');"/></td>
      </tr>
    </table>
    <?php echo form_close();
	 }else{
	    echo "<center><strong> No record(s) found !</strong></center>" ;
	 }
	?> </div>
</div>
<?php $this->load->view('includes/footer'); ?>
