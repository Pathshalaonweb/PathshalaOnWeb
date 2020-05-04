<?php $this->load->view('top_application'); ?>
<div class="container pt12">
  <div class="radius-5 bg-white shadow p15">
    <h1>News Detail</h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a> <a href="<?php echo base_url();?>news">News</a> News Detail</p>
    <div class="mt10">
      <!--News-Starts-->
      <div class="mt10 bdr1 p15 radius-5">
        <!--News-Starts-->
        <p class="fs17 arl lht-28 black geor"><?php echo $res['news_title'];?></p>
        <p class="fs11 tahoma white mt10"><span class="bgR p5 ">Posted On : <?php echo getDateFormat($res['recv_date'],1);?></span></p>
        <div class="pb5 mt10">
          <p class="fs12 mt10 lh22px grey ml1"><?php echo $res['news_description'];?> </p>
        </div>
        <!--News-Ends-->
      </div>
      <!--News-Ends-->
    </div>
    <div class="cb"></div>
  </div>
  <div class="cb"></div>
</div>
<script type="text/javascript">var Page='inner';</script> 
<?php $this->load->view('bottom_application'); ?>