<?php $this->load->view("top_application");?>
<?php //trace($content);?>




<?php /*?><div class="container pt12">
<div class="radius-5 bg-white shadow p15">
    
    <h1>News</h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a> News</p>
    
    <div class="mt10 lh18px aj"><?php echo $content['page_description'];?></div>
    
</div> 
<?php if($content['friendly_url']=='aboutus'){?>   
  <?php $this->load->view('footer_banner');?>
<?php }?>
</div>
<script type="text/javascript">var Page='inner';</script><?php */?> 
<?php $this->load->view("bottom_application");?>