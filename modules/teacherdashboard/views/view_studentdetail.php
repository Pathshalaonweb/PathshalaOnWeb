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
          <h3> <?php echo $res['first_name'];?> Detail's</h3>
          <div class="table-responsive">
            <h2><?php echo error_message(); ?></h2>
            <?php
				if(is_array($res) && !empty($res)) { 
			?>
            <table class="table">
              <tr>
                <td><strong>Name</strong> :</td>
                <td><?php echo $res['first_name'];?></td>
                <td></td>
                <td><strong>Email</strong> :</td>
                <td><?php echo $res['user_name'];?></td>
              </tr>
              <tr>
                <td><strong>Mobile</strong> :</td>
                <td><?php echo $res['phone_number'];?></td>
                <td></td>
                <td><strong>Picture</strong> :</td>
                <td><?php if($res['login_type']==='facebook'){?>
               <img src="https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=2201648443284003&height=50&width=50&ext=1562150891&hash=AeTQ8fnmcu7Rhu4P" class="img-responsive img-rounded">
                  <?php }else{?>
               <img src="<?php echo get_image('userfiles',$res['picture'],50,50,'AR');?>" class="img-responsive img-rounded">
                  <?php }?></td>
              </tr>
              <tr>
                <td><strong>Subject</strong>:</td>
                <td><?php echo $res['subject'];?></td>
                <td></td>
                <td><strong>Class</strong>:</td>
                <td><?php echo $res['class'];?></td>
              </tr>
              <tr class="info">
                <td colspan="5" align="center"><strong>Search Keyword</strong></td>
              </tr>
              <?php 
			  $sql="SELECT * FROM `wl_teacher_notified` where student_id=".$res['customers_id']." AND  id=".$this->uri->segment('4')." AND teacher_id=".$this->session->userdata('teacher_id')."";
			 $row=$this->db->query($sql)->result_array();
			  ?>
              <tr>
                <td><strong>Subject</strong>:</td>
                <td><?php echo get_cat_name($row[0]['subjects']);?></td>
                <td></td>
                <td><strong>Class</strong>:</td>
                <td><?php echo get_cat_name($row[0]['classes']);?></td>
              </tr>
              <tr>
                <td><strong>Keyword</strong>:</td>
                <td><?php echo $row[0]['keyword']?></td>
                <td></td>
                <td><strong>Date</strong>:</td>
                <td><?php echo $row[0]['created_at'];?></td>
              </tr>
              <tr>
                <td><strong>Address</strong>:</td>
                <td colspan="4"><?php echo $res['address'];?></td>
              </tr>
              <tr>
                <td><strong>Description</strong>:</td>
                <td colspan="4"><?php echo $res['description'];?></td>
              </tr>
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
