<?php $this->load->view("top_application");?>

<div class="breadcrumb-area">
  <?php /*?><div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-3 pt-100 pb-95" style="background-image:url(<?php echo theme_url();?>img/bg/breadcrumb-bg-5.jpg);">
    <div class="container">
      <h2>My Account</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .</p>
    </div>
  </div><?php */?>
  <div class="breadcrumb-bottom">
    <div class="container">
      <ul>
        <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-double-right"></i>My Account</span></li>
      </ul>
    </div>
  </div>
</div>
<div class="event-area my-acc pt-20 pb-130">
  <div class="container">
    <div class="row">
      <?php $this->load->view("teacher_myaccount_left");?>
      <div class="col-xl-9 col-lg-4">
        <div class="blog-all-wrap mr-40">
          <h3> Hello, <?php echo $this->session->userdata('first_name');?></h3>
          <div class="table-responsive">
          <h2><?php echo error_message(); ?></h2>
        <?php
		if(is_array($res) && !empty($res)) { 
		?>
            <table class="table">
              <thead>
                <tr>
                  <th></th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Keyword</th>
                  <th>Subject</th>
                  <th>class</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
				 //echo"<pre>"; print_r($res);
				 $s=$sn;	
				 foreach($res as $val) {
				 			  
				?>
                <tr>
                  <td><?php echo $sno++;?></td>
                  <td><?php echo $val['first_name'];?></td>
                  <td><?php if($val['login_type']==='facebook'){?>
                    <img src="https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=2201648443284003&height=50&width=50&ext=1562150891&hash=AeTQ8fnmcu7Rhu4P" class="img-responsive img-rounded">
                    <?php }else{?>
                    <img src="<?php echo get_image('userfiles',$val['picture'],50,50,'AR');?>" class="img-responsive img-rounded">
                    <?php }?></td>
                    
                  <td><?php echo $val['keyword'];?></td>
                  <td><?php echo $val['subjects'];?></td>
                  <td><?php echo $val['classes'];?></td>
                  <td>
                  <?php 
				  if($currentCredit>0){
				  ?>
                  <a href="<?php echo base_url();?>teacherdashboard/studentdetail/<?php echo $val['student_id'];?>/<?php echo $val['id'];?>" class="btn">View Detail</a>
                  <?php }?>
                  </td>
                </tr>
                <?php }?>
                <tr>
                  <td colspan="7" align="right"><div class="pagination"><?php echo $page_links;?></div></td>
                </tr>
              </tbody>
            </table>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">var Page='inner';</script>
<?php $this->load->view("bottom_application");?>
<style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
}

.pagination a.current {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.current) {background-color: #ddd;}
</style>
