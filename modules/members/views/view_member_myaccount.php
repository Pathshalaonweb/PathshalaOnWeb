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
                          $email = $this->session->userdata('username');
                          $sqregistered = "SELECT `webinar_enrolled` FROM `wl_webinar` WHERE `emailid`='".$email."'";
                          $qu=$dbe->query($sq);
                          $value= $qu->result_array();
                          $quregistered = $dbe->query($sqregistered);
                          
                          
                          
                          ?>
                           <ul class="nav nav-pills">
    <li class=""><a data-toggle="pill" href="#registered">Registered Webinars</a></li>
    <li><a data-toggle="pill" href="#enrolled">Webinars Enrolled</a></li>
</ul>
    <div class="tab-content">
        <?php 
        if ($quregistered->num_rows()==0)
        {
           echo "<div id='registered' class='tab-pane fade in active'><br>
           <a class='btn btn-primary' href='".base_url()."webinars/register'>Register Now!</a>
           </div>";
        }
        ?>
        <?php
        if ($quregistered->num_rows()>0)
        { $valueregistered = $quregistered->result_array();
            $db2 = $this->load->database('database2', TRUE);
            echo "<div id='registered' class='tab-pane fade in active'><div class='row'>";
        for($j=0;$j<count($valueregistered); $j++)
        {
            $course_ide = $valueregistered[$j]['webinar_enrolled'];
            $sqll="SELECT * FROM `tbl_courses` where `courses_id` = '".$course_ide."'";
            $queryy=$db2->query($sqll);
            $valuesregistered= $queryy->result_array();
        ?>
<div class="col-md-6 col-xs-12">
    <div class="card" style="width:280px">
    <img class="card-img-top" src="<?php if($valuesregistered[0]['image']) echo base_url()."lms/uploaded_files/courses/".$valuesregistered[0]['image']; else echo get_image('category',$val['image'],50,50,'AR'); ?>" alt="Webinar Image" style="width:100%">
    <div class="card-body">
        <h4 class="card-title"><a href="<?php echo base_url()."courses/detail/".$valuesregistered[0]['courses_friendly_url']; ?>"><?php echo $valuesregistered[0]['courses_name']; ?></a></h4>
        <p class="card-text"><?php echo $valuesregistered[0]['courses_description']; ?>
    <br>
    <strong>Price: </strong><?php if($valuesregistered[0]['price'] == '1') echo "Free"; else echo "Rs.".$valuesregistered[0]['price']."<br><strong>Credit Point: </strong>".$valuesregistered[0]['credit_price'];?>
    </p>
        <a href="<?php echo base_url()."webinars/enrollDetail/".$valuesregistered[0]['courses_id']; ?>" class="btn btn-primary">Buy Now</a>
        <?php if($valuesregistered[0]['price'] != '1') 
        {
        ?>
        <a href="<?php echo base_url()."webinars/enrollDetailStoreCredit/".$valuesregistered[0]['courses_id']; ?>" class="btn btn-primary">Use Credit Point</a>
        <?php } ?>
    </div>
    </div>
</div>

        <?php } 
    echo "</div></div>";    
    } 
        ?>
    
<?php
if(trim($value[0]['webinar_enrolled']) == "")
{  
    echo "<div id='enrolled' class='tab-pane fade'><br>
    <a class='btn btn-primary' href='".base_url()."webinars'>Enroll Now!</a>
    </div></div>";
} 
?>
                          <?php
                          //print_r(explode(",",$value[0]['webinar_enrolled']));
                            if(trim($value[0]['webinar_enrolled']) != ""){?>
                            <div id="enrolled" class="tab-pane fade">
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
                                <div class="col-md-6 col-xs-12">
                                <div class="card" style="width:250px">
                                <img class="card-img-top" src="<?php if($values[0]['image']) echo base_url()."lms/uploaded_files/courses/".$values[0]['image']; else echo get_image('category',$val['image'],50,50,'AR'); ?>" alt="Webinar Image" style="width:100%">
                                <div class="card-body">
                                  <h4 class="card-title"><?php echo $values[0]['courses_name']; ?></h4>
                                  <p class="card-text"><?php echo $values[0]['courses_description']; ?></p>
                                  <a href="<?php echo base_url()."courses/detail/".$values[0]['courses_friendly_url']; ?>" class="btn btn-primary">View Details</a>
                                </div>
                              </div>
                            </div>
                                
                         <?php   } echo "</div></div>"; }?>
                            
                            </div>

                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://pathshala007.s3.ap-south-1.amazonaws.com/customnav.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php $this->load->view("bottom_application");?>