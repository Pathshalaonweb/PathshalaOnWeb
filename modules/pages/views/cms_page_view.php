<?php $this->load->view("top_application");?>
<?php //trace($content);?>
 <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $content['page_name'];?></li>
    </ol>
    </nav>
<div class="container">
<div class="row">    
<div class="radius-5 bg-white shadow p15">
    
   
     <div class="col-sm-12"><?php echo $content['page_description'];?></div>
 </div> 
</div></div>
<script type="text/javascript">var Page='inner';</script> 
<?php $this->load->view("bottom_application");?>