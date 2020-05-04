<?php $this->load->view("top_application");?>
<div class="container pt12">
  <div class="radius-5 bg-white shadow p12-16">
    <h1>Thank You</h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a> Thank You</p>
    <section><!--Starts-->
      <p class="mt10 ac"><img src="<?php echo theme_url(); ?>images/thank-you.jpg" width="232" height="213" alt="thank"></p>
      <p class="oswald fs30 ac"><?php echo  $this->session->flashdata('msg');?></p>
          
  
  
      <div class="cb"></div>
      <!--Ends--></section>
    <div class="cb"></div>
</div></div>
<?php $this->load->view("bottom_application");?>