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
          <div class="buttons"> <a  class="btn btn-success" href="<?php echo base_url();?>teacherdashboard/profile/add/" class="button"><span>Add Your Listing</span></a></div>
          <div class="table-responsive">
            <h2><?php echo error_message(); ?></h2>
            <?php
		if(is_array($res) && !empty($res)) { 
		?>
            <table class="table">
              <thead>
                <tr>
                  <th></th>
                  <th>category</th>
                  <th>Subject</th>
                  <th>Class</th>
                  <th>City</th>
                  <th>location</th>
                  <th>fee</th>
                  <th>status</th>
                  <th>Edit</th>
                  <!--<th>Delete</th>-->
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
                  <td><?php echo get_cat_name($val['category']);?></td>
                  <td><?php echo get_cat_name($val['subject']);?></td>
                  <td><?php echo get_cat_name($val['class']);?></td>
                  <td><?php echo get_city($val['city_id']);?></td>
                  <td><?php echo $val['location'];?></td>
                  <td><?php echo $val['fee'];?></td>
                  <td><?php echo ($val['status']==1)?"Active":"In-active";?></td>
                  <td><a href="<?php echo base_url();?>teacherdashboard/profile/edit/<?php echo $val['id'];?>" class="btn">Edit</a></td>
                  <td><a href="<?php echo base_url('teacherdashboard/profile/delete/'.$val['id']);?>"  onclick="return confirm('Are you sure  ?')" class="btn">Delete</a></td>
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
