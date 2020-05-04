<?php $this->load->view('includes/header'); ?>  
 
  <div id="content">
  
  <div class="breadcrumb">
  
       <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; <?php echo $heading_title; ?> </a>   
             
   </div>      
       
 <div class="box">
 
    <div class="heading">
    
      <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
      <div class="buttons"> <?php echo anchor("adminzone/gallery/add/",'<span>Add Gallery</span>','class="button" ' );?> </div>
      
    </div>
   
    
	<div class="content">
		    <?php 
                if(error_message() !=''){
               	   echo error_message();
                }
                ?> 	
                
		<?php echo form_open("adminzone/gallery/",'id="form" method="get" '); ?>
        
         <div align="right" class="breadcrumb"> Records Per Page : <?php echo display_record_per_page();?> </div>
          
		<table width="100%"  border="0" cellspacing="3" cellpadding="3" >
		<tr>
			<td align="center" >Search [ Title ]
				<input type="text" name="keyword" value="<?php echo $this->input->get_post('keyword');?>"  />&nbsp;
				<a  onclick="$('#form').submit();" class="button"><span> GO </span></a>
			
				<?php 
				if($this->input->get_post('keyword')!=''){ 
					echo anchor("adminzone/gallery/",'<span>Clear Search</span>');
				} 
				?>
			</td>
		</tr>
		</table>
		<?php echo form_close();?>
		<?php
		$pagesection = $this->config->item('bannersections'); 
		 $j=0;
		if( is_array($res) && !empty($res) )
		{
			echo form_open("adminzone/gallery/",'id="myform"');
			?>
			<table class="list" width="100%" id="my_data">
			<thead>
			<tr>
				<td width="20" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></td>
				<td width="145" class="left">Title</td>
				<td width="202" class="center">Gallery Image</td>
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
		?> 
			<tr>
				<td style="text-align: center;">
					<input type="checkbox" name="arr_ids[]" value="<?=$pageVal['gallery_id'];?>" />
				</td>
				<td class="left"><?php echo $pageVal['gallery_title'];?></td>
				<td align="center">
				  
				  <?php
		 $j=1;
		 $product_path = "gallery/".$pageVal['gallery_image'];
		?>
				  <a href="javascript:void(0);"  onclick="$('#dialog_<?php echo $j;?>').dialog({width:'auto'});">View Image </a>
				  <div id="dialog_<?php echo $j;?>" title="Gallery Image" style="display:none;">
			      <img src="<?php echo base_url().'uploaded_files/'.$product_path;?>"  /> </div>					
			    </td>
				<td class="center"><?php echo ($pageVal['status']==1)? "Active":"In-active";?></td>
				<td align="center" >  
                
                  <?php echo anchor("adminzone/gallery/edit/$pageVal[gallery_id]/".query_string(),'Edit'); ?>         
					
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