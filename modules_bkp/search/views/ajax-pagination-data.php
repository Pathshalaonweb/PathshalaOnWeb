<?php
if(is_array($res) && !empty($res)) {
	foreach($res as $val)
	{
?>

<div class="row">
  <div class="col-md-3 no-padding photobox">
    <div class="add-image"> <a href="#">
      <p>
        <?php //echo $val['teacher_id']?>
      </p>
      <img class="thumbnail no-margin" src="<?php echo get_image('userfiles',$val['picture'],190,190,'AR');?>" alt="img" class="img-responsive img-rounded"></a> </div>
  </div>
  <!--/.photobox-->
  <div class="col-md-6 add-desc-box">
    <div class="ads-details">
      <h5 class="add-title"><a href="#"> <?php echo $val['first_name'];?></a></h5>
      <span class="info-row"><i class="fa fa-map-marker"></i> <span class="item-location"><?php echo $val['location']?></span> </span>
      <div class="prop-info-box">
        <div class="prop-info">
          <div class="clearfix prop-info-block"> <span class="title title-tutor">Class:</span> <span class="text"><?php echo get_classes($val['class'])?></span> </div>
          <div class="clearfix prop-info-block middle"> <span class="title prop-area title-tutor">Class Time:</span> <span class="text">Morning</span> </div>
          <div class="clearfix prop-info-block"> <span class="title prop-room title-tutor">Experience:</span> <span class="text">2 yrs </span> </div>
          <div class="clearfix prop-info-block"> <span class="title prop-room title-tutor">Subject:</span> <span class="text"><?php echo get_subject($val['subject']);?></span> </div>
          <div class="clearfix prop-info-block"> <span class="title prop-room title-tutor">Fee:</span> <span class="text"><?php echo $val['fee'];?></span> </div>
          <p><?php echo $val['description'];?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 text-right  price-box">
    <?php /*?> <!--/.add-desc-box-->
     <a class="btn btn-border-thin  btn-save"   title="save ads"  data-toggle="tooltip" data-placement="left"> <i class="icon icon-heart"></i> </a> <a class="btn btn-border-thin  btn-share "> <i class="icon icon-export" data-toggle="tooltip" data-placement="left"  title="share"></i> </a> <?php */?>
    
    <!-- <h3 class="item-price "> <strong>$2400 - $4260 </strong></h3> -->
    <div style="clear: both"></div>
    <a class="btn btn-success btn-sm bold" href="#" data-toggle="modal" data-target="#myModalmessage"> Message </a></div>
  <!--/.add-desc-box--> 
</div>
<?php } }else{?>
<div class="alert alert-warning"> <strong>Sorry !</strong> No recode Found. </div>
<?php }?>
<?php echo $this->ajax_pagination->create_links(); ?> 