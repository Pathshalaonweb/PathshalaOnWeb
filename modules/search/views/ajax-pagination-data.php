<?php
if(is_array($res) && !empty($res)) {
	foreach($res as $val)
	{
?>
<div class="row">
      <div class="col-md-3 no-padding photobox">
        <div class="add-image"> <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">
          <p>
            <?php //echo $val['teacher_id']?>
          </p>
          <img class="thumbnail no-margin" src="<?php echo get_image('teacher',$val['picture'],190,190,'AR');?>" alt="img" class="img-responsive img-rounded"></a> </div>
          <?php $rating = get_rating('',$val['teacher_id'])?>
          <div class="row rate" data-target="form-rate-instructor">
              <div class="col-md-6">
                <label>Rating : </label>
              </div>
              <div class="col-md-6">
              <?php for ($x = 1; $x <= 5; $x++) {?>
                <i class="fa fa-star<?php if($x > $rating){echo "-o";}?> text-info"></i>
              <?php }?>  
              </div>
              <input type="hidden" name="form-rate-instructor" value="<?php echo $rating;?>">
            </div>
      	   
      </div>
      <!--/.photobox-->
      <div class="col-md-6 add-desc-box">
        <div class="ads-details">
          <h5 class="add-title" style="font-size: 20px;font-weight: bold;"><a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>"> <?php echo $val['first_name'];?></a></h5>
          <span class="info-row"><i class="fa fa-map-marker"></i> <span class="item-location"><?php echo $val['location']?></span> </span>
          <div class="prop-info-box">
            <div class="prop-info">
              <div class="clearfix prop-info-block"> <span class="title title-tutor">Class:</span> <span class="text"><?php echo get_cat_name($val['class'])?></span> </div>
              <div class="clearfix prop-info-block middle"> <span class="title prop-area title-tutor">Class Time:</span> <span class="text"><?php echo $val['bath_time']?></span> </div>
              <div class="clearfix prop-info-block"> <span class="title prop-room title-tutor">Experience:</span> <span class="text">
                <?php if(!empty($val['experience_year'])){ echo $val['experience_year'];?>
                Years
                <?php }?>
                <?php if(!empty($val['experience_month'])){ echo $val['experience_month']?>
                Months
                <?php }?>
                </span> </div>
              <div class="clearfix prop-info-block"> <span class="title prop-room title-tutor">Subject:</span> <span class="text"><?php echo get_cat_name($val['subject']);?></span> </div>
              <div class="clearfix prop-info-block"> <span class="title prop-room title-tutor">Fee:</span> <span class="text"><?php echo $val['fee'];?></span> </div>
              <p><?php echo char_limiter(strip_tags($val['description']),200);?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 text-right  price-box"> 
        
        <!-- <h3 class="item-price "> <strong>$2400 - $4260 </strong></h3> -->
        <div style="clear: both"></div>
        <?php if($this->session->userdata('user_id') > 0 ){?>
        <a class="btn btn-success btn-sm bold notified" href="javascript:void(0)" onclick="return confirm('Are you sure to send notification to <?php echo $val['first_name'];?> ?')" data-href="<?php echo base_url();?>search/getContent/<?php echo $val['teacher_id']?>" data-teacher="<?php echo $val['teacher_id']?>"> Message </a>
        <?php }else{?>
        <a class="btn btn-success btn-sm bold" href="<?php echo base_url();?>users/login"> Show Interest </a>
        <?php }?>
      </div>
      <!--/.add-desc-box--> 
    </div>
    <hr>
<?php } }else{?>
<div class="alert alert-warning"> <strong>Sorry !</strong> No recode Found. </div>
<?php }?>
<?php echo $this->ajax_pagination->create_links(); ?> 