<?php $this->load->view('includes/header'); ?>  
  
  <div id="content">
  
  <div class="breadcrumb">
  
       <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; <?php echo $heading_title; ?> </a>   
             
   </div>      
       
 <div class="box">
 
    <div class="heading">
    
      <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
        <div class="buttons"><?php echo anchor("adminzone/news/post","<span>Post News</span>",'class="button" ' );?></div>
      
    </div>
   
    
      
     <div class="content">
    	
	
		<?php echo form_open("adminzone/news/",'id="search_form" method="get" '); ?>
        
		<table width="100%"  border="0" cellspacing="3" cellpadding="3" >
		  <?php 
			   if(error_message() !='')
			   {	
			      echo error_message();
				  
			   }
			   ?>  
          <tr>
			<td align="center" >Search [  Title] 
            
				<input type="text" name="keyword" value="<?php echo $this->input->get_post('keyword');?>"  />&nbsp;				
                
			  <a  onclick="$('#search_form').submit();" class="button"><span> GO </span></a>
				
				<?php 
				if($this->input->get_post('keyword')!='')
				{ 
				echo anchor("adminzone/news/",'<span>Clear Search</span>');
				} 
				?>
			</td>
		</tr>        
		</table>
		<?php echo form_close();?>
        
		<?php
		if(is_array($res) && ! empty($res))
		{
			
		?>
        
			<?php echo form_open("adminzone/news/",'id="data_form"');?>
            
           <div align="right" class="breadcrumb"> Records Per Page : <?php echo display_record_per_page();?> </div>
           
			<table class="list" width="100%" id="my_data">
            
			<thead>
			  <tr>
				<td width="29" style="text-align: center;">
                                
                <input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" />
                
                </td>
				<td width="285" class="left">Title</td>
				<td width="172" class="center">View Detail</td>
				<td width="93" class="center">Status</td>
				<td width="160" class="center">Action</td>
			  </tr>
			</thead>
			<tbody>
			<?php 	
			foreach($res as $catKey=>$pageVal)
			{ 
				
				
			?> 
				<tr>
					<td style="text-align: center;">
						<input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['news_id'];?>" />
					</td>
					<td align="left"><?php echo $pageVal['news_title'];?></td>
					<td align="center"><a href="javascript:void(0);"  onclick="$('#dialog_<?php echo $pageVal['news_id'];?>').dialog({ width: 650 });">View Detail</a>
                    
                 <div id="dialog_<?php echo $pageVal['news_id'];?>" title="Description" style="display:none;">
			    <?php echo $pageVal['news_description'];?>
               </div>
                    </td>
					<td class="center"><?php echo ($pageVal['status']==1)? "Active":"In-active";?></td>
					<td class="center"><?php echo anchor("adminzone/news/edit/$pageVal[news_id]/".query_string(),'Edit'); ?></td>
				</tr>
			<?php
			}		   
			?> 
			
			<tr><td colspan="5" align="right" height="30"><?php echo $page_links; ?></td></tr>     
			</tbody>
			<tr>
				<td align="left" colspan="5" style="padding:2px" height="35">
					<input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
					<input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>
                    <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onclick="return validcheckstatus('arr_ids[]','delete','Record');"/>
                    </td>
			</tr>
			</table>
			<?php
			echo form_close();
		}else{
			echo "<center><strong> No record(s) found !</strong></center>" ;
		}
		?> 
	</div>    
    
</div>
<?php $this->load->view('includes/footer'); ?>