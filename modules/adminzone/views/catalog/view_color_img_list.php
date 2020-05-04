<?php $this->load->view('includes/header'); ?> 
 
  <div id="content">
  
  <div class="breadcrumb">
  
       <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; <?php echo anchor('adminzone/products/','Products'); ?> &raquo; <?php echo $heading_title; ?> </a>   
             
   </div>      
       
 <div class="box">
 
    <div class="heading">
    
      <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
      <div class="buttons"> <?php echo anchor("adminzone/products/add_color_img/".$this->uri->segment(4),'<span>Add Color Image</span>','class="button" ' );?> </div>
      
    </div>
   
    
	<div class="content">
		    <?php 
                if(error_message() !=''){
               	   echo error_message();
                }
                ?> 	
                
		<?php echo form_open("adminzone/products/colorimg/".$this->uri->segment(4),'id="form" method="get" '); ?>
        
         <div align="right" class="breadcrumb"> Records Per Page : <?php echo display_record_per_page();?> </div>
          
		
		<?php echo form_close();?>
		<?php
		 $j=0;
		if( is_array($res) && !empty($res) )
		{
			echo form_open("adminzone/products/change_media_status/".$this->uri->segment(4),'id="myform"');
			?>
			<table class="list" width="100%" id="my_data">
			<thead>
			<tr>
				<td width="20" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></td>
				<td width="145" class="left">Color Name</td>
				<td width="202" class="center">Color  Picture</td>
				<td width="134" class="center">Status</td>
				<td width="148" class="center">Action</td>
			</tr>
			</thead>
			<tbody>
			<?php 	
			$atts = array(
											'width'      => '740',
											'height'     => '600',
											'scrollbars' => 'yes',
											'status'     => 'yes',
											'resizable'  => 'yes',
											'screenx'    => '0',
											'screeny'    => '0'
									 );
		foreach($res as $catKey=>$pageVal)
		{
			$color_title=get_db_single_row('wl_color','color_name',$Condwherw='WHERE 1 AND color_id="'.$pageVal['color_id'].'"'); 
		?> 
			<tr>
				<td style="text-align: center;">
					<input type="checkbox" name="arr_ids[]" value="<?=$pageVal['id'];?>" />
				</td>
				<td class="left"><?php echo $color_title['color_name'];?></td>
				<td align="center">
				  
				  <?php
		 $j=1;
		 $product_path = "products/".$pageVal['media'];
		?>
              <a href="javascript:void(0);"  onclick="$('#dialog_<?php echo $j;?>').dialog({width:'auto'});">View Image </a>
              <div id="dialog_<?php echo $j;?>" title="Banner Image" style="display:none;">
              <img src="<?php echo base_url().'uploaded_files/'.$product_path;?>"  /> </div>					
            </td>
            <td class="center"><?php echo ($pageVal['media_status']==1)? "Active":"In-active";?></td>
            <td align="center">  
              <?php echo anchor("adminzone/products/edit_color_img/$pageVal[products_id]/$pageVal[id]/".query_string(),'Edit'); ?>         
                
            </td>
			</tr>
		<?php
		$j++;
		}		   
		?> 
		<tr><td colspan="5" align="right" height="30"><?php echo $page_links; ?></td></tr>     
		</tbody>
		<tr>
			<td align="left" colspan="5" style="padding:2px" height="35">
				<input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
				<input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>             
				<input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]','delete','Record');"/>
			</td>
		</tr>
		</table>
		<?php
		echo form_close();
	}else
	{
		echo "<center><strong> No record(s) found !</strong></center>" ;
	}
	?> 
	</div>
</div>
<?php $this->load->view('includes/footer'); ?>