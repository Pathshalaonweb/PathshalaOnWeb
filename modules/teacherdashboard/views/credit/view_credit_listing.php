<?php $this->load->view("top_application");?>

<div class="breadcrumb-area">
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
                  <th>Student Name</th>
                  <th>Student Email</th>
                  <!--th>NotifiedId</th-->
                  <th>Credit Value</th>
                  <th>comment</th>
                </tr>
              </thead>
              <tbody>
                <?php 
				 //echo"<pre>"; print_r($res);
				 $s=$sn;	
				 foreach($res as $val) {
					  $stu_info=get_db_single_row('wl_customers',$fields="first_name,last_name,user_name,phone_number",$condition="WHERE 1 AND customers_id='".$val['student_id']."'");
				?>
                <tr>
                  <td><?php echo $sno++;?></td>
                  <td><?php echo $stu_info['first_name'];?> &nbsp; <?php echo $stu_info['last_name'];?></td>
                  <td><?php echo $stu_info['user_name'];?></td>
                  <!--td><?php echo $val['notified_id'];?></td-->
                  <td><?php echo $val['value'];?></td>
                  <td><?php echo $val['comment'];?></td>
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
.buttons {
    float: right;
    margin-bottom: 0px;
    margin-top: -40px;
}
</style>
