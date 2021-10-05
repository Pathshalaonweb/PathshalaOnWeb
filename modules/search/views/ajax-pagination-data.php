 <?php
                        if (is_array($res) && !empty($res)) {
                            foreach ($res as $val) {
                        ?>

                                <div class="tutor_dg">

                                    <div class="d-flex flex-row">
                                        <div class="ml-1 mt-1"> <a href="<?php echo base_url(); ?>teacher/profile/<?php echo $val['teacher_id']; ?>/<?php echo url_title($val['first_name']); ?>">
                                                <img class="mr-2" style="width:80px;height:80px;border-radius:50px;border:1px solid grey;" src="<?php echo get_image('teacher', $val['picture'], 190, 190, 'AR'); ?>" alt="img" class="img-responsive img-rounded"> </a>

                                        </div>
                                        <div class="d-flex flex-column mt-1 ml-1">
                                            <h4 class="h_type"><a href="<?php echo base_url(); ?>teacher/profile/<?php echo $val['teacher_id']; ?>/<?php echo url_title($val['first_name']); ?>"> <?php echo $val['first_name']; ?></a></h4>
                                            <div class="row ml-1">
                                                <?php for ($x = 1; $x <= 5; $x++) { ?>
                                                    <i class="fa fa-star<?php if ($x > $rating) {
                                                                            echo "-o";
                                                                        } ?> text-info"></i>
                                                <?php } ?>
                                            </div>
                                            <span class="info-row ml-1"><i class="fa fa-map-marker"></i> <span class="item-location"><?php echo get_city($val['city_id']) ?></span> </span>

                                        </div>

                                    </div>

                                    <hr style="width:100%;text-align:left;margin-left:0">

                                    <div class="d-flex flex-row text-center">

                                        <div class="d-flex flex-column div3big">
                                            <h4 class="h_type text-center">Experience</h4>
                                            <p class="text-center">
                                                <?php if (!empty($val['experience_year'])) {
                                                    echo $val['experience_year']; ?>+ Years

                                            <?php } ?></p>
                                        </div>
                                        <div class="d-flex flex-column div3big">
                                            <h4 class="h_type">Class</h4>
                                            <p class="text-center"><?php echo get_cat_name($val['class']) ?></p>
                                        </div>
                                        <div class="d-flex flex-column div3bigbig">
                                            <h4 class="h_type  text-center">Subject</h4>
                                            <p class="text-center mb-1"><?php echo get_cat_name($val['subject']); ?></p>

                                        </div>
                                        <div class="d-flex flex-column div3big">
                                            <h4 class="h_type  text-center">Price</h4>
                                            <p class="text-center mb-1">&#x20B9; <?php echo $val['fee']; ?></p>
                                        </div>
                                    </div>
                                    <hr style="width:100%;text-align:left;margin-left:0">

                                    <div class="d-flex flex-row text-center">
                                        <p class=""><?php echo char_limiter(strip_tags($val['description']), 500); ?></p>



                                    </div>
                                    <hr style="width:100%;text-align:left;margin-left:0">


                                    <!-- <h3 class="item-price "> <strong>$2400 - $4260 </strong></h3> -->
                                    <div class="d-flex flex-row justify-content-center">


                                        <?php if ($this->session->userdata('user_id') > 0) { ?>
                                            <button class="view-profile_dg mr-auto ml-3">Schedule</button>
                                            <a class="view-profile_dg ml-auto" href="<?php echo base_url(); ?>teacher/book/<?php echo $val['teacher_id']; ?>/<?php echo url_title($val['first_name']); ?>" <?php echo $val['first_name']; ?> class="button"><span>Book Class</span></a>
                                            <!--7-- removeddddd 1-->
                                        <?php
                                        } else { ?>
                                            <button class="view-profile_dg mr-auto ml-3">Schedule</button>
                                            <div class="view-profile_dg  ml-auto">
                                                <a style="color:white;text-decoration:none;" href="<?php echo base_url(); ?>users/login"><span>Book Class</span></a>
                                            </div>
                                        <?php
                                        } ?>
                                        <!--button style="float:right;" class="view-profile">View Profile</button>-->
                                        <?php if ($this->session->userdata('user_id') > 0) { ?>
                                            <div class="view-profile_dg ml-auto">
                                                <a href="javascript:void(0)" onclick="return confirm('Are you sure to send notification to <?php echo $val['first_name']; ?> ?')" data-href="<?php echo base_url(); ?>search/getContent/<?php echo $val['teacher_id'] ?>" data-teacher="<?php echo $val['teacher_id'] ?>"> Send Request </a>
                                            <?php } else { ?>
                                                <div class="view-profile_dg ml-auto">
                                                    <a style="color:white;text-decoration:none;" href="<?php echo base_url(); ?>users/login"> Show Interest </a>
                                                <?php } ?>
                                                </div>
                                            </div>
                                    </div>
<?php } }else{?>
<div class="alert alert-warning"> <strong>Sorry !</strong> No record Found. </div>
<?php }?>
<?php echo $this->ajax_pagination->create_links(); ?> 