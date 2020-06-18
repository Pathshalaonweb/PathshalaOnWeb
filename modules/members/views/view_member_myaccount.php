<?php $this->load->view("top_application");?>
<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-3 pt-100 pb-95" style="background-image:url(<?php echo theme_url();?>img/bg/breadcrumb-bg-5.jpg);">
        <div class="container">
            <h2>My Account</h2>
            <!--p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .</p-->
        </div>
    </div>
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
            <?php $this->load->view("myaccount_left");?>
            <div class="col-xl-9 col-lg-4">
                <div class="blog-all-wrap mr-40">
                   <h3> Hello, <?php echo $this->session->userdata('first_name');?></h3>
                    <?php $id = $this->session->userdata("user_id"); 
                          $dbe = $this->load->database('default', TRUE);
                          $sq = "SELECT `webinar_enrolled` FROM `wl_customers` WHERE `customers_id`='".$id."'";
                          $qu=$dbe->query($sq);
                          $value= $qu->result_array();
                          //print_r(explode(",",$value[0]['webinar_enrolled']));
                            if(trim($value[0]['webinar_enrolled']) != "")

                            {?>
                            <br>
                            <h4 style="font-family: 'Roboto', sans-serif; color: #1b68b5;">Webinars Enrolled</h4>
                            <div class="row">
                            <?php 
                            $webinars_enrolled = explode(",",$value[0]['webinar_enrolled']);
                            $db2 = $this->load->database('database2', TRUE);
                            for($i=1;$i<count($webinars_enrolled); $i++)
                            {
                                 
                                $sql="SELECT * FROM `tbl_courses` where `courses_id` = '".$webinars_enrolled[$i]."'";
                                $query=$db2->query($sql);
                                $values= $query->result_array();
                                //echo $webinars_enrolled[$i]."<br>";
                                ?>
                                <div class="col-6">
                                <div class="card" style="width:200px">
                                <img class="card-img-top" src="<?php if($values[0]['image']) echo base_url()."lms/uploaded_files/courses/".$values[0]['image']; else echo get_image('category',$val['image'],50,50,'AR'); ?>" alt="Webinar Image" style="width:100%">
                                <div class="card-body">
                                  <h4 class="card-title"><?php echo $values[0]['courses_name']; ?></h4>
                                  <p class="card-text"><?php echo $values[0]['courses_description']; ?></p>
                                  <a href="<?php echo base_url()."courses/detail/".$values[0]['courses_friendly_url']; ?>" class="btn btn-primary">View Details</a>
                                </div>
                              </div>
                            </div>
                                
                         <?php   } }?>
                            
                    

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">var Page='inner';</script>
<?php $this->load->view("bottom_application");?>