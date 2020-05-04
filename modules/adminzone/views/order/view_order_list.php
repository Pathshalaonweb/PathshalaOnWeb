<?php $this->load->view('includes/header'); ?>

<div id="content">
<div class="breadcrumb"> <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; <?php echo $heading_title; ?> </a> </div>
<div class="box">
  <div class="heading">
    <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons"> &nbsp;</div>
  </div>
  <div class="content"> <?php echo form_open("adminzone/testimonial/",'id="pagingform"'); ?>
    <input type="hidden" name="keyword" value="<?php echo $this->input->post('keyword');?>"  />
    <input type="hidden" name="status" value="<?php echo $this->input->post('status');?>"  />
    <input type="hidden" name="per_page" value="<?php echo $this->input->post('per_page');?>"  />
    <?php echo form_close();?> <?php echo validation_message();?> <?php echo error_message(); ?> <?php echo form_open("adminzone/orders/",'id="search_form" method="get" '); ?>
    <div align="right" class="breadcrumb"> Records Per Page : <?php echo display_record_per_page();?> </div>
    <table width="80%"  border="0" cellspacing="3" cellpadding="3" align="center" >
      <tr>
        <td width="22%" align="right" >Search By</td>
        <td width="78%"><input type="text" name="keyword" placeholder="Keywords" value="<?php echo $this->input->get_post('keyword');?>" style="width:340px;"   /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="from_date" type="text" id="textfield3" class="start_date1 input-bdr2 radius-5" placeholder="From Date" style="width:165px;">
          &nbsp;
          <input name="to_date" type="text" id="textfield4" class="end_date1 input-bdr2 radius-5" placeholder="To Date"  style="width:165px;"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp; <a  onclick="$('#search_form').submit();" class="button"><span> GO </span></a> &nbsp; Keywords Like : Invoice Number , Name ,Email, Payment Status, Order Status
          <?php 
        if( $this->input->get_post('keyword')!='' || $this->input->get_post('from_date')!='' || $this->input->get_post('to_date')!='' )
        { 
           echo anchor("adminzone/orders/",'<span>Clear Search</span>');
        } 
        ?></td>
      </tr>
    </table>
    <?php echo form_close();?>
    <?php 
		if( is_array($res) && !empty($res) )
		{
			echo form_open("adminzone/orders",'id="data_form"');
		?>
    <table class="list" width="100%" id="my_data">
      <thead>
        <tr>
          <td width="23" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></td>
          <td width="189" class="left">Invoice Number</td>
          <td width="214" class="center">Payment Status</td>
          <td width="144" class="center">Plan</td>
          <td width="144" class="center">Coupon</td>
          <td width="144" class="center">Total Amount</td>
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
				$payment_method = ($pageVal['payment_method']!="" ) ? $pageVal['payment_method'] : "N/A"; 
				
				?>
        <tr>
          <td style="text-align: center;"><input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['order_id'];?>" /></td>
          <td class="left"><strong><?php echo $pageVal['invoice_number'];?></strong><br />
            <?php echo $pageVal['order_received_date'];?><br />
            <?php echo $pageVal['first_name'];?> <?php echo $pageVal['last_name'];?> <br />
            <?php echo $pageVal['phone'];?><br />
            <?php echo $pageVal['email'];?> <br />
            <?php echo anchor_popup('adminzone/orders/print_invoice/'.$pageVal['order_id'], 'View Invoice', $atts);?>
            <?php if($pageVal['customers_id']=='0') { echo"( Quick Checkout )"; } ?></td>
          <td align="center"><?php echo $pageVal['payment_status'];?> <br />
           </td>
          <td class="center"> <?php $plan_res    =  get_db_single_row($fld='wl_plan','*',$Condwherw="WHERE plan_id=".$pageVal['plan_id']."");?>
             <?php echo $plan_res['name']?></td>
             <td align="center">
             <?php 
			 if(!empty($pageVal['coupon_id'])){
			?>	 
			<strong>Coupon Code</strong><?php 	 echo $pageVal['coupon_code'];echo "<br>"; ?>
			<strong>Discount Amount</strong><?php 	 echo $pageVal['discount_amount'];echo "<br>";?>
			 <?php }else{echo "N/A";}
			 ?>
             </td>
             <td align="center"><?php echo $pageVal['total_amount']?></td>
        </tr>
        <?php
			}		   
			?>
        <tr>
          <td colspan="7" align="right" height="30"><?php echo $page_links; ?></td>
        </tr>
      </tbody>
      <tr>
        <td  colspan="4" align="left" style="padding:2px"><input name="unset_as" type="submit" class="button2" value="Unpaid" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]','Set Unpaid','Record','u_status_arr[]');"/>
          <input name="Delete" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]','delete','Record');"/>
          <select name="ord_status"  onchange="return onclickgroup()">
            <option value="">Update Order Status</option>
            <option value="Ready For Dispatch">Ready For Dispatch</option>
            <option value="Delivered">Delivered </option>
            <!-- <option value="Ready For Dispatch">Dispatched</option>-->
            <option value="Rejected">Rejected </option>
            <option value="Canceled">Canceled </option>
            <option value="Closed">Closed</option>
            <option value="Pending">Pending</option>
          </select></td>
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
<?php 
$default_date = '2013-01-01';
$posted_start_date = $this->input->post('from_date');
?>
<script type="text/javascript">
  $(document).ready(function(){
	$('.btn_sbt2').live('click',function(e){
		e.preventDefault();
		$start_date = $('.start_date1:eq(0)').val();
		$end_date = $('.end_date1:eq(0)').val();
		$start_date = $start_date=='From' ? '' : $start_date;
		$end_date = $end_date=='To' ? '' : $end_date;
		$(':hidden[name="keyword2"]','#ord_frm').val($('input[type="text"][name="keyword2"]').val());
		$(':hidden[name="start_date"]','#ord_frm').val($start_date);
		$(':hidden[name="end_date"]','#ord_frm').val($end_date);
		$("#ord_frm").submit();
	});
	$('.start_date,.end_date').live('click',function(e){
	  e.preventDefault();
	  cls = $(this).hasClass('start_date') ? 'start_date1' : 'end_date1';
	  $('.'+cls+':eq(0)').focus();
	});
	$( ".start_date1").live('focus',function(){
			$(this).datepicker({
			showOn: "focus",
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true,
			defaultDate: 'y',
			buttonText:'',
			minDate:'<?php echo $default_date;?>' ,
			maxDate:'<?php echo date('Y-m-d',strtotime(date('Y-m-d',time())."+180 days"));?>',
			yearRange: "c-100:c+100",
			buttonImageOnly: true,
			onSelect: function(dateText, inst) {
						  $('.start_date1').val(dateText);
						  $( ".end_date1").datepicker("option",{
							minDate:dateText ,
							maxDate:'<?php echo date('Y-m-d',strtotime(date('Y-m-d',time())."+180 days"));?>',
						});

					  }
		});
	});
	$( ".end_date1").live('focus',function(){
			$(this).datepicker({
					  showOn: "focus",
					  dateFormat: 'yy-mm-dd',
					  changeMonth: true,
					  changeYear: true,
					  defaultDate: 'y',
					  buttonText:'',
					  minDate:'<?php echo $posted_start_date!='' ? $posted_start_date :  $default_date;?>' ,
					  maxDate:'<?php echo date('Y-m-d',strtotime(date('Y-m-d',time())."+180 days"));?>',
					  yearRange: "c-100:c+100",
					  buttonImageOnly: true,
					  onSelect: function(dateText, inst) {
						$('.end_date1').val(dateText);
					  }
				  });
	  });
	  
  });
</script> 
<script type="text/javascript">		
	function onclickgroup(){
		if(validcheckstatus('arr_ids[]','Update order status','record','u_status_arr[]')){			
			$('#data_form').submit();
		}
	}	
</script>
<?php $this->load->view('includes/footer'); ?>
