<?php $this->load->view("top_application");?>
<?php $mem_info=get_db_single_row('wl_teacher',$fields="first_name,is_verified,current_credit,profile_edit,plan_expire,email_verify",$condition="WHERE 1 AND teacher_id='".$res[teacher_id]."'");?>
<div class="container">
    <style>.lms_buy:hover{color:#ffffff;}</style>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 no-padding photobox">
              <div class="add-image"> 
              <a href="course-details.html">
                  <img style="width: 100%;max-width: 100%;" class="thumbnail no-margin" src="<?php echo base_url();?>lms/uploaded_files/courses/<?php echo $res['image']?>" alt="img">
              </a>
              </div>
              </div>
                <div class="col-md-9"><br>
                <div class="over-view-content">
                    <h4><?php echo $res['courses_name']?></h4>
                    </div>
                    <h5><strong>Teacher Name : </strong><span style="color:#1b68b5;"> <?php echo $mem_info[first_name]?></span></h5>
                    <div class="blog-date" style="background-color:#1b68b5;color:#fff;padding:10px;width:13%;">
                                                <?php if($this->session->userdata('user_id') > 0 ){?> 
                        <a href="<?php echo base_url();?>/courses/enrollDetail/<?php echo $res['courses_id']?>" class="lms_buy"><i class="fa fa-money"></i> Book Now</a>
                        <?php }else{?>
                        <a href="<?php echo base_url();?>users/login" class="lms_buy"> <i class="fa fa-money"></i> Book Now</a>
                        <?php }?>
                                                </div>
                </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
       <p><?php echo $res['courses_description']?></p>
    </div>
    </div>
</div>
</div>


<?php $this->load->view("bottom_application");?>