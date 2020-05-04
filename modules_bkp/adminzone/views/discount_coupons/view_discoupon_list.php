<?php $this->load->view('includes/header'); ?> 

<div id="content">
  
  <div class="breadcrumb">
  
       <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; <?php echo $heading_title; ?> </a>   
             
   </div>      
       
 <div class="box">
 
    <div class="heading">
    
      <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
      <div class="buttons"> <?php echo anchor("adminzone/coupons/add/",'<span>Add Discount coupon</span>','class="button" ' );?> </div>
      
    </div>
         
     <div class="content">		
		 
		<?php 
		
		  echo form_open("adminzone/coupons/",'id="search_form" method = "get" '); 
		
		?>
        
       <div align="right" class="breadcrumb"> Records Per Page : <?php echo display_record_per_page();?> </div>
       
		<table width="100%"  border="0" cellspacing="3" cellpadding="3" >
			<?php 
            if(error_message() !=''){
           	 echo error_message();
            }
            ?> 
        <tr>
		<td align="center" >Search [ Coupon Code ]  
         <input type="text" name="keyword" value="<?php echo $this->input->get_post('keyword');?>"  />&nbsp;
		<a  onclick="$('#search_form').submit();" class="button"><span> GO </span></a>
		
		<?php if($this->input->get_post('keyword')!=''){ 
			echo anchor("adminzone/coupons/",'<span>Clear Search</span>');
		} ?>
		</td>
		</tr>
		</table>
		<?php echo form_close();?>
		<?php
		if( is_array($res) && !empty($res) )
		{
			echo form_open("adminzone/coupons/",'id="data_form"');?>
			<table class="list" width="100%" id="my_data">
			<thead>
			<tr>
				<td width="23" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></td>
				<td width="145" class="left">Coupon Code</td>
                <td width="145" class="center">Discount</td>
                <td width="145" class="center">Coupon Validity</td>
               <!-- <td width="145" class="center">Coupon Members</td>-->
				<td width="74" class="center">Status</td>
				<td width="71" class="center">Action</td>
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
				
			foreach($res as $catKey=>$pageVal)
			{ 
				?> 
				<tr>
					<td style="text-align: center;"><input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['coupon_id'];?>" /></td>
					<td class="left"><?php echo $pageVal['coupon_code'];?>
                    <br />
                    <?php  if($pageVal['minimum_order_amount']!='') 
					{
						?>
                       <strong> Minimum Order :</strong> <?php echo $pageVal['minimum_order_amount']; ?>
                    <?php
					}
					?>
                    </td>
                    <td class="center">
					
					<?php  if($pageVal['coupon_type']=='p') { echo $pageVal['coupon_discount']."%"; }else{ echo $pageVal['coupon_discount']; } ?></td>
                    <td class="center">
					Start date : <?php echo getDateFormat($pageVal['start_date'],1);?><br>
                    End date :  <?php echo getDateFormat($pageVal['end_date'],1);?>
                    </td>
                    <!--<td align="center"><?php echo anchor_popup('adminzone/coupons/assign_to_member/'.$pageVal['coupon_id'], 'Send Coupon!', $atts);?><br /><br />
                    <?php echo anchor_popup('adminzone/coupons/coupon_assigned_customers/'.$pageVal['coupon_id'], 'View Member!', $atts);?><br /><br /></td>-->
					<td class="center"><?php echo ($pageVal['status']==1)? "Active":"In-active";?></td>
					<td align="center" >
						<?php echo anchor("adminzone/coupons/edit/$pageVal[coupon_id]/".query_string(),'Edit'); ?>
					</td>
				</tr>
			<?php
			}		   
			?> 
			<tr><td colspan="7" align="right" height="30"><?php echo $page_links; ?></td></tr>     
			</tbody>
			<tr>
				<td height="35" colspan="7" align="left" style="padding:2px">
					<input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onclick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
					<input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onclick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>
					<input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onclick="return validcheckstatus('arr_ids[]','delete','Record');"/>
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