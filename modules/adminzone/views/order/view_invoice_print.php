<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Order Invice</title>
</head>
<body style="font-size:12px; color:#333; margin:0px; padding:0px; font-family:Arial, Helvetica, sans-serif;">
<div style="width:650px; background:#fff;">
 <?php //echo invoice_content($ordmaster,$orddetail,'not_show_print');?>
 <section class="content content_content" style="width: 70%; margin: auto;">
  <section class="invoice"> 
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header"> <i class="fa fa-globe"></i> Pathshala <small class="pull-right"> <b> Invoice <?php echo $res['invoice_number']?></b> | Date: <?php echo $res['payment_received_date']?></small> </h2>
      </div>
      <!-- /.col --> 
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-12 invoice-col">
        <p>Dear <strong><?php echo $res['first_name']?></strong>,</p>
      </div>
      <div class="col-sm-6 invoice-col"> Thank you for your order from <strong> Pathshala </strong>
        <address>
        <strong>Phone</strong>: +91- 9470888985 <br>
        <strong>Email</strong>:info@pathshala.co
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-6 invoice-col"> To
        <?php /*?><address>
        <strong> Ashish Kumar </strong> <br>
        Address:
        Delhi <br>
        Phone:
        123456789 <br>
        Email:kumarashish947@gmail.com
        </address><?php */?>
      </div>
      <!-- /.col -->
      <div class="col-sm-12 invoice-col">
        <p>For your convenience, we have included a copy of your order below. The charge will appear on your credit card / Account Statement as <a href="https://paytm.com" target="_blank">https://paytm.com</a></p>
      </div>
      <div class="col-sm-12 invoice-col"> <b>Order ID:</b> <?php echo $res['invoice_number']?><br>
        <b>Payment ref:</b> <?php echo $res['transaction_id'];?><br>
        <b>Order Date:</b> <?php echo $res['payment_received_date'];?> </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
    
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Customer Name</th>
              <th>Address</th>
              
              <th>Pay Mode</th>
              <th>Bank Ref</th>
              <th>Plan Info</th>
              <th>Payment Status</th>
              <th>Order Amount</th>
              <th>Tax</th>
              <th>Net Payable</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $res['first_name']?></td>
              <td><?php echo $res['address']?></td>
              
              <td><?php echo $res['payment_method']?></td>
              <td><?php echo $res['bank_ref_num']?></td>
              <?php $plan_res    =  get_db_single_row($fld='wl_plan','*',$Condwherw="WHERE plan_id=".$res['plan_id']."");?>
              <td><?php echo $plan_res['name']?></td>
              <td><?php echo $res['payment_status']?></td>
              <td><?php echo $res['total_amount']-$res['tax_amount']?></td>
              <td><?php echo $res['tax_amount']?></td>
              <td><strong><?php echo $res['total_amount']?></strong></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row -->
    
    <div class="row"> 
      <!-- accepted payments column -->
      <div class="col-md-12">
        <p class="lead">Customer Care (<strong style="font-size:14px;">Website:</strong> <a style="font-size:14px;" href="<?php echo base_url();?>"> www.pathshala.co</a>| <strong style="font-size:14px;">Email :</strong><a href="mailto:info@pathshala.co" style="font-size:14px;"> info@pathshala.co</a>)</p>
        <div class="table-responsive"> 
          <!--<table class="table">
                                        <tbody>
                                            
                                            
                                            <tr>
                                                <th>Total:</th>
                                                <td> 50000</td>
                                            </tr>
                                        </tbody>
                                    </table>--> 
        </div>
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
  </section>
</section>
<style type="text/css">
    .invoice {
    position: relative;
    background: #fff;
    border: 1px solid #f4f4f4;
    padding: 20px;
    margin: 10px 25px;
}
.page-header {
    margin: 10px 0 20px 0;
    font-size: 22px;
}
.invoice {
    position: relative;
    background: #fff;
    border: 0px solid #f4f4f4 !important;
    padding: 20px;
    margin: 10px 25px;
}
    </style>
   <table width="60%" align="center" cellpadding="3" cellspacing="0" >
        <tr>
          <td align="center">          
          <a style="background:#666; font-size:12px; font-weight:bold; padding:2px 13px; color:#fff; margin-top:5px; border-radius:4px; text-decoration:none; cursor: pointer; display:inline-block;" onclick="window.close();" href="javascript:void(0)">Close</a>        
                  
          </td>
            <td align="center">   
           <a style="background:#666; font-size:12px; font-weight:bold; padding:2px 13px; color:#fff; margin-top:5px; border-radius:4px; text-decoration:none; cursor: pointer; display:inline-block;" onclick="window.print();" href="javascript:void(0)">Print</a>
              </td>
        </tr>
      </table>
</div>
</body>
</html>
