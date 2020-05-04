<?php $this->load->view('includes/header'); ?>

<div id="content">
<div class="breadcrumb"> <?php echo anchor('adminzone/dashbord','Home'); ?>&raquo; <?php echo anchor('adminzone/coupons/','Back To Listing'); ?> &raquo; <?php echo $heading_title; ?> </div>
<div class="box">
  <div class="heading">
    <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons">&nbsp;</div>
  </div>
  <div class="content"> <?php echo validation_message();?> <?php echo error_message(); ?> <?php echo form_open(current_url_query_string());?>
    <div id="tab_pinfo">
      <table width="90%"  class="form"  cellpadding="3" cellspacing="3">
        <tr>
          <th colspan="2" align="right" > <span class="required">*Required Fields</span><br>
          </th>
        </tr>
        <tr>
          <th colspan="2" align="center" > </th>
        </tr>
        <?php /*?><tr class="trOdd">
          <td height="26" align="right" > Discount Coupon Type : <span class="required">*</span></td>
          <td align="left"><select name="coupon_type">
              <option value="">Coupon Type</option>
              <option value="p" <?php echo set_value('coupon_type',$res->coupon_type) ==='p' ? 'selected="selected"' : '';?>>Percentage</option>
              <option value="a" <?php echo set_value('coupon_type',$res->coupon_type) ==='a' ? 'selected="selected"' : '';?>>Amount</option>
            </select></td>
        </tr><?php */?>
        <tr class="trOdd">
          <td width="28%" height="26" align="right" >Coupon Discount : <span class="required">*</span></td>
          <td width="72%" align="left"><input type="text" name="coupon_discount" size="40" value="<?php echo set_value('coupon_discount',$res->coupon_discount);?>">
            [Ex : Percentage: 5, Amount: 120.00 ]</td>
        </tr>
        <?php /*?><tr class="trOdd">
          <td height="26" align="right" >Minimum order amount</td>
          <td align="left"><input type="text" name="minimum_order_amount" size="40" value="<?php echo set_value('minimum_order_amount',$res->minimum_order_amount);?>" />
            [Ex : Amount: 1520.00 ] </td>
        </tr><?php */?>
        <?php /*?><tr class="trOdd">
          <td width="28%" height="26" align="right" > Start Date : <span class="required">*</span></td>
          <td width="72%" align="left"><input name="start_date" class="start_date1" type="text" style="padding:2px; width:133px;" value="<?php echo set_value('start_date',$res->start_date);?>">
            <a href="#" class="start_date"><img src="<?php echo base_url();?>assets/developers/images/cal0.png" width="16" height="16" alt=""></a></td>
        </tr><?php */?>
        <tr class="trOdd">
          <td width="28%" height="26" align="right" > End Date : <span class="required">*</span></td>
          <td width="72%" align="left"><input name="end_date" class="end_date1" type="text" style="padding:2px; width:133px;" value="<?php echo set_value('end_date',$res->end_date);?>">
            <a href="#" class="end_date"><img src="<?php echo base_url();?>assets/developers/images/cal0.png" width="16" height="16" alt=""></a></td>
        </tr>
        <tr class="trOdd">
          <td align="left">&nbsp;</td>
          <td align="left"><input type="submit" name="sub" value="Update" class="button2" /></td>
        </tr>
      </table>
    </div>
    <?php echo form_close(); ?> </div>
</div>
<?php 
$default_date = '2013-01-01';
$posted_start_date = $this->input->post('start_date');
?>
<script type="text/javascript">
  $(document).ready(function(){
	$('.btn_sbt2').live('click',function(e){
		e.preventDefault();
		$start_date = $('.start_date1:eq(0)').val();
		$end_date = $('.end_date1:eq(0)').val();
		$start_date = $start_date=='From' ? '' : $start_date;
		$end_date = $end_date=='To' ? '' : $end_date;
		$(':hidden[name="keyword2"]','#myform').val($('input[type="text"][name="keyword2"]').val());
		$(':hidden[name="start_date"]','#myform').val($start_date);
		$(':hidden[name="end_date"]','#myform').val($end_date);
		$("#myform").submit();
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
<?php $this->load->view('includes/footer'); ?>
