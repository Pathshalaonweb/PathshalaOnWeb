 <?php
if(is_array($res) && !empty($res)) {
	foreach($res as $val)
	{
?>
    <div class="row">
      <div class="col-md-15 no-padding photobox">
        <div class="add-image"> <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">
          <p>
            <?php //echo $val['teacher_id']?>
          </p>
<!--          <img class="thumbnail no-margin" src="<?php echo get_image('teacher',$val['picture'],190,190,'AR');?>" alt="img" class="img-responsive img-rounded"></a> </div>
<!--          <?php $rating = get_rating('',$val['teacher_id'])?>
<!--          <div class="row rate" data-target="form-rate-instructor">
<!--              <div class="col-md-6">
<!--                <label>Rating : </label>
<!--              </div>
<!--              <div class="col-md-6">
<!--              <?php for ($x = 1; $x <= 5; $x++) {?>
<!--                <i class="fa fa-star<?php if($x > $rating){echo "-o";}?> text-info"></i>
<!--              <?php }?>  
<!--              </div>
<!--              <input type="hidden" name="form-rate-instructor" value="<?php echo $rating;?>">
<!--            </div>
<!--      	   </div>-->

        <div class="row">
            <div class="col-lg-5">
                <div class="text-left card-box">
                    <div class="member-card pt-1 pb-1">
                        <div class="thumb-lg member-thumb mx-auto"><img src="<?php echo get_image('teacher',$val['picture'],190,190,'AR');?>" alt="img" class="rounded-circle img-thumbnail" alt="profile-image"></div>
						<?php $rating = get_rating('',$val['teacher_id'])?>
          <div class="row rate" data-target="form-rate-instructor">
              <div class="col-md-4">
                <label>Rating : </label>
              </div>
              <div class="col-md-6">
              <?php for ($x = 1; $x <= 5; $x++) {?>
                <i class="fa fa-star<?php if($x > $rating){echo "-o";}?> text-info"></i>
              <?php }?>  
              </div>
              <input type="hidden" name="form-rate-instructor" value="<?php echo $rating;?>">
            </div>
                        <div class="ads-details">
                            <h4><class="add-title" style="font-size: 20px;font-weight: bold;"><a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>"> <?php echo $val['first_name'];?></a></h4>
							<span class="info-row"><i class="fa fa-map-marker"></i> <span class="item-location"><?php echo $val['location']?></span> </span>
          <div class="prop-info-box">
            <div class="prop-info">
              <div class="clearfix prop-info-block"> <span class="title title-tutor"><b>Class:</b></span> <span class="text"><?php echo get_cat_name($val['class'])?></span> </div>
              <div class="clearfix prop-info-block middle"> <span class="title prop-area title-tutor"><b>Class Time:</b></span> <span class="text"><?php echo $val['bath_time']?></span> </div>
              <div class="clearfix prop-info-block"> <span class="title prop-room title-tutor"><b>Experience:</b></span> <span class="text">
                <?php if(!empty($val['experience_year'])){ echo $val['experience_year'];?>
                Years
                <?php }?>
                <?php if(!empty($val['experience_month'])){ echo $val['experience_month']?>
                Months
                <?php }?>
                </span> </div>
              <div class="clearfix prop-info-block"> <span class="title prop-room title-tutor"><b>Subject:</b></span> <span class="text"><?php echo get_cat_name($val['subject']);?></span> </div>
              <div class="clearfix prop-info-block"> <span class="title prop-room title-tutor"><b>Fee:</b></span> <span class="text"><?php echo $val['fee'];?></span> </div>
              <p<span class="title prop-room title-tutor"><b>Description</b></span> <span class="text"><?php echo char_limiter(strip_tags($val['description']),150);?></span></p>
            </div>
          </div>
 <!--                           <p class="text-muted">@Founder <span>| </span><span><a href="#" class="text-pink">websitename.com</a></span></p> 
                        </div>
                        <ul class="social-links list-inline">
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                        </ul>
                        <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Book Now</button> -->
						<?php if($this->session->userdata('user_id') > 0 ){?>
        <a class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light" href="javascript:void(0)" onclick="return confirm('Are you sure to send notification to <?php echo $val['first_name'];?> ?')" data-href="<?php echo base_url();?>searchtest/getContent/<?php echo $val['teacher_id']?>" data-teacher="<?php echo $val['teacher_id']?>"> Send Request </a>
        <?php }else{?>
        <a class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light" href="<?php echo base_url();?>users/login"> Show Interest </a>
        <?php }?>
	<!--<div class="col-md-2 text-right  price-box">
        <!-- <h3 class="item-price "> <strong>$2400 - $4260 </strong></h3> -->
        <div style="clear: both"></div>
        <?php if($this->session->userdata('user_id') > 0 ){?>
        <a class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light" href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>"> View Profile </a>
        <?php }else{?>
        <a class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light" href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>"> View Profile </a>
        <?php }?>
      </div>
    </div>
<!--                        <div class="mt-4">
<!--                            <div class="row">
<!--                                <div class="col-4">
<!--                                    <div class="mt-3">
<!--                                        <h4>2563</h4>
<!--                                        <p class="mb-0 text-muted">Wallets Balance</p>
<!--                                    </div>
<!--                                </div>
<!--                                <div class="col-4">
<!--                                    <div class="mt-3">
<!--                                        <h4>6952</h4>
<!--                                        <p class="mb-0 text-muted">Income amounts</p>
<!--                                    </div>
<!--                                </div>
<!--                                <div class="col-4">
<!--                                    <div class="mt-3">
<!--                                        <h4>1125</h4>
<!--                                        <p class="mb-0 text-muted">Total Transactions</p>
<!--                                    </div>
<!--                                </div>
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
			
			<hr>
    <?php } }?>
    <?php echo $this->ajax_pagination->create_links(); ?> </div>	
            <!-- end col -->
        </div>

	<style>	
body{
    background:#FFFFFF;
    margin-top:20px;
}
.card-box {
    padding: 20px;
    border-radius: 3px;
    margin-bottom: 30px;
    background-color: #DCDCDC;
}

.social-links li a {
    border-radius: 50%;
    color: rgba(121, 121, 121, .8);
    display: inline-block;
    height: 30px;
    line-height: 27px;
    border: 2px solid rgba(121, 121, 121, .5);
    text-align: center;
    width: 30px
}

.social-links li a:hover {
    color: #797979;
    border: 2px solid #797979
}
.thumb-lg {
    height: 88px;
    width: 88px;
}
.img-thumbnail {
    padding: .25rem;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    max-width: 100%;
    height: auto;
}
.text-pink {
    color: #ff679b!important;
}
.btn-rounded {
    border-radius: 2em;
}
.text-muted {
    color: #98a6ad!important;
}
h4 {
    line-height: 22px;
    font-size: 18px;
}

</style>
