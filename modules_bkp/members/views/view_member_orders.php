<?php $this->load->view("top_application");?>
<div class="container pt12">
  <div class="radius-5 bg-white shadow p15">
  <script type="text/javascript">function serialize_form() { return $('#ord_frm').serialize(); } </script>
    <h1>My Order History</h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a><a href="<?php echo base_url();?>members/myaccount">My Account</a> My Order History</p>
    
    <div class="mt10 rel"> <?php $this->load->view("members/myaccount_left");?><div class="w68 fr">
    
       <?php echo form_open('members/orders_history','id="ord_frm"') ; ?>
        <div class="p5 mt5 bg2 radius-5">
          <table class="w100">
            <tr>
              <td><strong>Search : </strong></td>
              <td><label for="textfield"></label>
                <input name="keyword" type="text" id="keyword" class="p5 ml5" style="width:130px;"  placeholder="Keyword" value="<?php echo set_value('keyword',$this->input->post('keyword'));?>"></td>
                
              <td><label for="textfield"></label>
                <input name="from_date" type="text" id="from_date" class="start_date1 p5 ml5" placeholder="From" value="" style="width:130px;">
               <!-- <a href="#" id="from_date" class="start_date1"><img src="<?php echo theme_url(); ?>images/date.png" alt="" id="from_date" class="vam start_date1"></a>--></td>
              <td><label for="textfield"></label>
                <input name="to_date" type="text" id="to_date" class="end_date1 p5 ml5" placeholder="To" value="" style="width:130px;">
                <!--<a href="#"><img src="<?php echo theme_url(); ?>images/date.png" alt="" class="vam"></a>--></td>
              <td><input name="go" type="submit" class="button-style2"  value="GO"></td>
              <td>&nbsp;</td>
            </tr>
          </table>
        </div>
        
        <div class="aj bg2 mt10 p15 shadow2 radius-5 ">
          <div class="bgG white p5 b treb ttu pt7 mt5">
            <table class="w100">
              <tr>
                <td  class="w10  al"> S. No. </td>
                <td  class="w25 al">OrdeR/invoice</td>
                <td class="ac w10">Amount (<span class="WebRupee fs12 ">Rs</span>)</td>
                <td class="ac w10" >status</td>
              </tr>
            </table>
          </div>
          <div class="bgW mt10 radius-5 p10">
          
          <div id="more_data" >
          <?php
//trace($res);
if( is_array($res) && !empty($res))
{
	$i=1;
	foreach($res as $val)
	{
			$total           =  $val['total_amount'];
			$discount_total  =  $val['coupon_discount_amount'];
			$shipping_total  =  $val['shipping_amount'];
			
			$total_tax_cal=(($total*$val['tax_amount'])/100);
			
			$gand_total      = ($total-$discount_total)+$shipping_total+$total_tax_cal;
		
		?>
          <div class="mt7">
            <table class="bdrAll w100">
              <tr>
                <td class="w10 al"><?php echo $i;?>.</td>
                <td class="w28 al"><p class="red fs14"><a href="<?php echo base_url();?>members/print_invoice/<?php echo $val['order_id'];?>" class="invoice"><?php echo $val['invoice_number'];?></a></p>
                  <p class="grey1 ver fs11"><?php echo getDateFormat($val['order_received_date'],3);?></p></td>
                <td class="ac w10"><strong> <?php echo display_price($gand_total);?></strong></td>
                <td class="ac w10"><span class="i"><?php echo $val['order_status'];?></span></td>
              </tr>
            </table>
          </div>
          <?php
 $i++;
	}
}else
{
	 echo '<div class="mt7 b ac ">'.$this->config->item('no_record_found').'</div>';
}
?>
</div>
</div>
          <?php echo $more_link; ?>
          <?php echo form_close();?>
          </div>
          
        </div>
        <div class="cb"></div>
        <!--Right-Part-Ends-->
      </div>
      <div class="cb"></div>
          
    <!--Login-Section-Ends--></div>
        
    <div class="cb"></div>
  </div>
  <div class="cb"></div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/developers/js/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link type="text/css" href="<?php echo base_url();?>assets/developers/js/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
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

<script type="text/javascript">var Page='inner';</script>
<?php $this->load->view("bottom_application");?>