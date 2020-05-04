<?php $this->load->view('includes/header'); ?>  
 
  <div id="content">
  
  <div class="breadcrumb">
  
       <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; <?php echo anchor('adminzone/forum','Blog Topic'); ?> &raquo; <?php echo $heading_title; ?> </a>   
             
   </div>      
       
 <div class="box">
 
    <div class="heading">
    
      <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
    </div>
   
    
	<div class="content">
		    <?php 
                if(error_message() !=''){
               	   echo error_message();
                }
                ?> 	
                
		<?php echo form_open("adminzone/forum/blogcomments/".$this->uri->segment(4)."/",'id="form" method="get" '); ?>
        
         <div align="right" class="breadcrumb"> Records Per Page : <?php echo display_record_per_page();?> </div>
          
		<table width="100%"  border="0" cellspacing="3" cellpadding="3" >
		<tr>
			<td align="center" >Search [ Topic Title ]
				<input type="text" name="keyword" value="<?php echo $this->input->get_post('keyword');?>"  />&nbsp;
				<a  onclick="$('#form').submit();" class="button"><span> GO </span></a>
			
				<?php 
				if($this->input->get_post('keyword')!=''){ 
					echo anchor("adminzone/forum/blogcomments/".$this->uri->segment(4),'<span>Clear Search</span>');
				} 
				?>
			</td>
		</tr>
		</table>
		<?php echo form_close();?>
		<?php
		
		 $j=0;
		if( is_array($pagelist) && !empty($pagelist) )
		{
			echo form_open("adminzone/forum/change_commentstatus/".$this->uri->segment(4)."/",'id="myform"');
			?>
			<table class="list" width="100%" id="my_data">
			<thead>
			<tr>
				<td width="20" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></td>
				<td width="145" class="left">Topic</td>
				<td width="202" class="center">Posted By </td>
				<td width="134" class="center">Details</td>
				<td width="148" class="center">Action</td>
			</tr>
			</thead>
			<tbody>
			<?php 	
			$atts = array(
              'width'      => '600',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
		foreach($pagelist as $catKey=>$pageVal)
		{ 
		?> 
			<tr>
				<td style="text-align: center;">
					<input type="checkbox" name="arr_ids[]" value="<?=$pageVal['replyID'];?>" />
				</td>
				<td class="left"><?php echo $pageVal['topicTitle'];?></td>
				<td align="left">
				  <strong>Name:</strong> <?php echo $pageVal['name'];?><br /><strong>Email:</strong> <?php echo $pageVal['email'];?>
			    </td>
				<td align="center"><a href="#"  onclick="$('#dialog_<?php echo $pageVal['replyID'];?>').dialog({ width: 650 });">View Detail</a>
                    
                    <div id="dialog_<?php echo $pageVal['replyID'];?>" title="Description" style="display:none;">
			    <?php echo $pageVal['comments'];?>
               </div>
                    </td>
				<td align="center" >  
                
                  <?php if($pageVal['status']=='1'){echo 'Active';}else{echo 'Inactive';}?>   
					
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