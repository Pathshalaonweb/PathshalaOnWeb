<?php $this->load->view('top_application'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<?php //echo print_r($res);?>
<div class="breadcrumb-area">
  <div class="breadcrumb-bottom">
    <div class="container">
      <ul>
        <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-double-right"></i>Profile Details</span></li>
      </ul>
    </div>
  </div>
</div>
<?php
			$userid=$userid = $this->session->userdata('user_id');
			$id=$res['teacher_id']; 
			//User rating
       		$this->db->select('rating');
			$this->db->from('wl_rating');
			$this->db->where('rating!=0');
			$this->db->where("status='1'");
			$this->db->where("customer_id", $userid);
			$this->db->where("entity_id", $id);
			$userRatingquery = $this->db->get();
	       	$userpostResult = $userRatingquery->result_array();
			$userRating = 0;
			if(count($userpostResult)>0){
					$rating = $userpostResult[0]['rating'];
			}
			// Average rating
       		$this->db->select('ROUND(AVG(rating),1) as averageRating');
			$this->db->from('wl_rating');
			$this->db->where('rating!=0');
			$this->db->where("status='1'");
			$this->db->where("entity_id", $id);
			$ratingquery = $this->db->get();
	       	$postResult  = $ratingquery->result_array();
			$averagerating = $postResult[0]['averageRating'];
			//echo_sql();
	       	if($averagerating == ''){
	       		$averagerating = 0;
	       	}
			$averagerating;
			?>
<?php 
		 	//Teachin Rating
			//User rating
       		$this->db->select('teachingstyle');
			$this->db->from('wl_rating');
			$this->db->where("status='1'");
			$this->db->where('teachingstyle!=0');
			$this->db->where("customer_id", $userid);
			$this->db->where("entity_id", $id);
			$teachingRatingquery = $this->db->get();
	       	$teachingpostResult = $teachingRatingquery->result_array();
			$userRating = 0;
			if(count($teachingpostResult)>0){
					$teachingrating = $teachingpostResult[0]['teachingstyle'];
			}
			// Average rating
       		$this->db->select('ROUND(AVG(teachingstyle),1) as teachingRating');
			$this->db->from('wl_rating');
			$this->db->where("status='1'");
			$this->db->where('teachingstyle!=0');
			$this->db->where("entity_id", $id);
			$teachingratingquery = $this->db->get();
	       	$teachingpostResult = $teachingratingquery->result_array();
			//echo_sql();
			$teachingaveragerating = $teachingpostResult[0]['teachingRating'];
	       	if($teachingaveragerating == ''){
	       		$teachingaveragerating = 0;
	       	}
		 ?>
<?php 
		 	//Discipline Rating
			//User rating
       		$this->db->select('discipline');
			$this->db->from('wl_rating');
			$this->db->where("status='1'");
			$this->db->where('discipline!=0');
			$this->db->where("customer_id", $userid);
			$this->db->where("entity_id", $id);
			$disciplineRatingquery = $this->db->get();
	       	$disciplinepostResult = $disciplineRatingquery->result_array();
			//echo_sql();
			$userRating = 0;
			if(count($disciplinepostResult)>0){
					$disciplinerating = $disciplinepostResult[0]['discipline'];
			}
			// Average rating
       		$this->db->select('ROUND(AVG(discipline),1) as disciplineRating');
			$this->db->from('wl_rating');
			$this->db->where("status='1'");
			$this->db->where('discipline!=0');
			$this->db->where("entity_id", $id);
			$disciplineratingquery = $this->db->get();
	       	$disciplinepostResult = $disciplineratingquery->result_array();
			//echo_sql();
			$disciplineaveragerating = $disciplinepostResult[0]['disciplineRating'];
	       	if($disciplineaveragerating == ''){
	       		$disciplineaveragerating = 0;
	       	}
		 ?>
<?php 
		 	//Discipline Rating
			//User rating
       		$this->db->select('studymaterial');
			$this->db->from('wl_rating');
			$this->db->where("status='1'");
			$this->db->where('studymaterial!=0');
			$this->db->where("customer_id", $userid);
			$this->db->where("entity_id", $id);
			$studymaterialRatingquery = $this->db->get();
	       	$studymaterialpostResult = $studymaterialRatingquery->result_array();
			$userRating = 0;
			if(count($studymaterialpostResult)>0){
					$studymaterialrating = $studymaterialpostResult[0]['studymaterial'];
			}
			// Average rating
       		// Average rating
       		$this->db->select('ROUND(AVG(studymaterial),1) as studymaterialRating');
			$this->db->from('wl_rating');
			$this->db->where("status='1'");
			$this->db->where('studymaterial!=0');
			$this->db->where("entity_id", $id);
			$studymaterialratingquery = $this->db->get();
	       	$studymaterialpostResult = $studymaterialratingquery->result_array();
			//echo_sql();
			$studymaterialaveragerating = $studymaterialpostResult[0]['studymaterialRating'];
	       	if($studymaterialaveragerating == ''){
	       		$studymaterialaveragerating = 0;
	       	}
		 ?>
<?php 
		 	//locations Rating
			//User rating
       		$this->db->select('locations');
			$this->db->from('wl_rating');
			$this->db->where('locations!=0');
			$this->db->where("status='1'");
			$this->db->where("customer_id", $userid);
			$this->db->where("entity_id", $id);
			$locationsRatingquery = $this->db->get();
	       	$locationspostResult = $locationsRatingquery->result_array();
			$userRating = 0;
			if(count($locationspostResult)>0){
					$locationsrating = $locationspostResult[0]['locations'];
			}
			// Average rating
       		$this->db->select('ROUND(AVG(locations),1) as locationsRating');
			$this->db->from('wl_rating');
			$this->db->where('locations!=0');
			$this->db->where("status='1'");
			$this->db->where("entity_id", $id);
			$locationsratingquery = $this->db->get();
	       	$locationspostResult = $locationsratingquery->result_array();
			//echo_sql();
			$locationsaveragerating = $locationspostResult[0]['locationsRating'];
	       	if($locationsaveragerating == ''){
	       		$locationsaveragerating = 0;
	       	}
		 ?>
<?php 
		 	//locations Rating
			//User rating
       		$this->db->select('infrastructure');
			$this->db->from('wl_rating');
			$this->db->where('infrastructure!=0');
			$this->db->where("status='1'");
			$this->db->where("customer_id", $userid);
			$this->db->where("entity_id", $id);
			$infrastructureRatingquery = $this->db->get();
	       	$infrastructurepostResult = $infrastructureRatingquery->result_array();
			$userRating = 0;
			if(count($infrastructurepostResult)>0){
					$infrastructurerating = $infrastructurepostResult[0]['infrastructure'];
			}
			// Average rating
       		$this->db->select('ROUND(AVG(infrastructure),1) as infrastructureRating');
			$this->db->from('wl_rating');
			$this->db->where("status='1'");
			$this->db->where('infrastructure!=0');
			$this->db->where("entity_id", $id);
			$infrastructureratingquery = $this->db->get();
	       	$infrastructurepostResult = $infrastructureratingquery->result_array();
			//echo_sql();
			$infrastructureaveragerating = $infrastructurepostResult[0]['infrastructureRating'];
	       	if($infrastructureaveragerating == ''){
	       		$infrastructureaveragerating = 0;
	       	}
		 ?>
<?php 
			 $this->db->select('customer_id, COUNT(customer_id) as total');
			 $this->db->where("status='1'");
			 $this->db->where("entity_id", $id);
			 $this->db->group_by('customer_id'); 
			 $result=$this->db->get('wl_rating');
			 $row = $result->result_array();
			 $total=$row[0]['total'];
			// echo_sql();
			 //get over alll rating
			 $allratingAveragerating=$averagerating+$teachingaveragerating+$disciplineaveragerating+$studymaterialaveragerating+$locationsaveragerating+$infrastructureaveragerating;
			 
		 ?>
<div class="course-details-area pt-20">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-8"> <?php echo error_message(); ?>
        <div class="row">
          <div class="col-md-3 no-padding photobox">
            <div class="add-image"> <a href="JavaScript:Void(0);"><img
                                                        class="thumbnail no-margin" src="<?php echo get_image('teacher',$res['picture'],190,190,'AR');?>"
                                                        alt="img"></a></div>
            <h5 class="add-title" style="font-size:22px;color:#1b68b5;font-weight: bold;"><a href="javascript:void(0)"></a> <?php echo $res['first_name']?></h5>
            <div class="prop-info-box">
              <div class="prop-info">
                <p style="text-align:justify"><strong>About</strong> : <?php echo $res['description'];?></p>
              </div>
            </div>
          </div>
          <!--/.photobox-->
          <div class="col-md-9 add-desc-box">
            <div class="ads-details">
              <div class="breadcrumb-area">
                <div class="breadcrumb-bottom">
                  <ul>
                    <li style="padding:0 5px;"><a href="JavaScript:Void(0);"> Rating's</a> <span><i class="fa fa-angle-double-right"></i>Based on <span style="color:#F90;font-weight:bold;"><?php echo round($total/6);?> students</span> rating</span> <span><i class="fa fa-angle-double-right"></i><span style="color:#F90;font-size: 18px;">
                    
                     <?php echo number_format($allratingAveragerating/6, 1, '.', '');//echo round($allratingAveragerating/6);?></span>/ 5</span></li>
                  </ul>
                </div>
              </div>
              <?php 
		 $accountType=$res['account_type'];
		 if($accountType=='0'){
			 $heading1="Conceptual Clarity";
			 $heading2="Teaching Style";
			 $heading3="Discipline";
			 $heading4="Study Material";
			 $heading5="Location (Female Friendly)";
			 $heading6="Infrastructure";
			 }else{
			 $heading1="Conceptual Clarity";
			 $heading2="Student Friendly Teaching Style";
			 $heading3="Time Flexibility";
			 $heading4="Study Material";
			 $heading5="Student Safety";
			 $heading6="Feedback Session";
			 }
		 ?>
              <div class="row" style="border:1px solid #ccc;margin-left:0;margin-right:0;">
                <div class="col-md-4 pb-10 pt-10">
                  <div class="col-md-3"><!--<i class="fa fa-2x fa-university"></i>--><img src="<?php echo theme_url(); ?>/tutor_img/Conceptual-Clarity.png" /></div>
                  <div class="col-md-9">
                    <label> <?php echo $heading1;?> : </label>
                    <!--<br><span class="item-location"><span style="color:#F90;font-size: 18px;">4.5</span>/ 5</span>--></div>
                  <div class="post-action"> 
                    <!-- Rating Bar -->
                    <?php if($this->session->userdata('user_id') > 0 ){?>
                    <input id="post_<?= $id ?>" value='<?= $rating ?>' class="rating-loading ratingbar" data-min="0" data-max="5" data-step="1">
                    <!-- Average Rating -->
                    <div>Average Rating: <span style="color:#F90;font-weight:bold;" id='averagerating_<?= $id ?>'>
                      <?= $averagerating  ?>
                      </span></div>
                    <?php }else{?>
                    <a onclick="location.href = '<?php echo base_url();?>users/login';">
                    <input id="post_<?= $id ?>" value='<?= $averagerating ?>' class="rating-loading ratingbar pass" data-min="0" data-max="5" data-step="1"  disabled title="Your have to login first" onclick="location.href = '<?php echo base_url();?>users/login';">
                    
                    <!-- Average Rating -->
                    <div>Average Rating: <span style="color:#F90;font-weight:bold;" id='averagerating_<?= $id ?>'>
                      <?= $averagerating  ?>
                      </span></div>
                    </a>
                    <?php }?>
                  </div>
                </div>
                <div class="col-md-4 pb-10 pt-10">
                  <div class="col-md-3"><!--<i class="fa fa-2x fa-users"></i>--><img src="<?php echo theme_url(); ?>/tutor_img/Teaching-Style.png" /></div>
                  <div class="col-md-9">
                    <label> <?php echo $heading2;?> : </label>
                    <!--<br><span class="item-location"><span style="color:#F90;font-size: 18px;">4.5</span>/ 5</span>--></div>
                  <div class="post-action">
                    <?php if($this->session->userdata('user_id') > 0 ){?>
                    <!-- Rating Bar -->
                    <input id="post_<?= $id ?>" value='<?= $teachingrating ?>' class="rating-loading ratingbars" data-min="0" data-max="5" data-step="1" >
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='teachingstyle_<?= $id ?>'>
                      <?= $teachingaveragerating ?>
                      </span></div>
                    <?php }else{?>
                    <a onclick="location.href = '<?php echo base_url();?>users/login';">
                    <input id="post_<?= $id ?>" value='<?= $teachingaveragerating ?>' class="rating-loading pass ratingbars" data-min="0" data-max="5" data-step="1" disabled title="Your have to login first">
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='teachingstyle_<?= $id ?>'>
                      <?= $teachingaveragerating ?>
                      </span></div>
                    </a>
                    <?php }?>
                  </div>
                </div>
                <div class="col-md-4 pb-10 pt-10">
                  <div class="col-md-3"><img src="<?php echo theme_url(); ?>/tutor_img/Discipline.png" /><!--<i class="fa fa-2x fa-child"></i>--></div>
                  <div class="col-md-9">
                    <label> <?php echo $heading3;?> :</label>
                    <!--<br><span class="item-location"><span style="color:#F90;font-size: 18px;">4.5</span>/ 5</span>--></div>
                  <div class="post-action">
                    <?php if($this->session->userdata('user_id') > 0 ){?>
                    <!-- Rating Bar -->
                    <input id="post_<?= $id ?>" value='<?= $disciplineaveragerating ?>' class="rating-loading pass ratingbarss" data-min="0" data-max="5" data-step="1" >
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='discipline_<?= $id ?>'>
                      <?= $disciplineaveragerating ?>
                      </span></div>
                    <?php }else{?>
                    <a onclick="location.href = '<?php echo base_url();?>users/login';">
                    <input id="post_<?= $id ?>" value='<?= $disciplineaveragerating ?>' class="rating-loading pass ratingbarss" data-min="0" data-max="5" data-step="1" disabled title="Your have to login first">
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='discipline_<?= $id ?>'>
                      <?= $disciplineaveragerating ?>
                      </span></div>
                    </a>
                    <?php }?>
                  </div>
                </div>
                <div class="col-md-4 pb-10 pt-10">
                  <div class="col-md-3"><!--<i class="fa fa-2x fa-graduation-cap"></i>--><img src="<?php echo theme_url(); ?>/tutor_img/Study-Material.png" /></div>
                  <div class="col-md-9">
                    <label> <?php echo $heading4;?> :</label>
                    <!--<br><span class="item-location"><span style="color:#F90;font-size: 18px;">4.5</span>/ 5</span>--></div>
                  <div class="post-action">
                    <?php if($this->session->userdata('user_id') > 0 ){?>
                    <!-- Rating Bar -->
                    <input id="post_<?= $id ?>" value='<?= $studymaterialaveragerating ?>' class="rating-loading studymaterial pass " data-min="0" data-max="5" data-step="1" >
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='studymaterial_<?= $id ?>'>
                      <?= $studymaterialaveragerating ?>
                      </span></div>
                    <?php }else{?>
                    <a onclick="location.href = '<?php echo base_url();?>users/login';">
                    <input id="post_<?= $id ?>" value='<?= $studymaterialaveragerating ?>' class="rating-loading studymaterial" data-min="0" data-max="5" data-step="1" disabled title="Your have to login first">
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='studymaterial_<?= $id ?>'>
                      <?= $studymaterialaveragerating ?>
                      </span></div>
                    </a>
                    
                    <?php }?>
                  </div>
                </div>
                <div class="col-md-4 pb-10 pt-10">
                  <div class="col-md-3"><!--<i class="fa fa-2x fa-map-marker"></i>--><img src="<?php echo theme_url(); ?>/tutor_img/Female-Friendly-Location.png" /></div>
                  <div class="col-md-9">
                    <label> <?php echo $heading5;?> :</label>
                    <!--<br><span class="item-location"><span style="color:#F90;font-size: 18px;">4.5</span>/ 5</span>--></div>
                  <div class="post-action">
                    <?php if($this->session->userdata('user_id') > 0 ){?>
                    <!-- Rating Bar -->
                    <input id="post_<?= $id ?>" value='<?= $locationsrating ?>' class="rating-loading locations" data-min="0" data-max="5" data-step="1" >
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='locations_<?= $id ?>'>
                      <?= $locationsaveragerating ?>
                      </span></div>
                    <?php }else{?>
                    <a onclick="location.href = '<?php echo base_url();?>users/login';">
                    <input id="post_<?= $id ?>" value='<?= $locationsaveragerating ?>' class="rating-loading locations" data-min="0" data-max="5" data-step="1" disabled title="Your have to login first">
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='locations_<?= $id ?>'>
                      <?= $locationsaveragerating ?>
                      </span></div>
                    </a>
                    <?php }?>
                  </div>
                </div>
                <div class="col-md-4 pb-10 pt-10">
                  <div class="col-md-3"><!--<i class="fa fa-2x fa-industry"></i>--><img src="<?php echo theme_url(); ?>/tutor_img/Infrastructure.png" /></div>
                  <div class="col-md-9">
                    <label> <?php echo $heading6;?> :</label>
                    <!--<br><span class="item-location"><span style="color:#F90;font-size: 18px;">4.5</span>/ 5</span>--></div>
                  <div class="post-action">
                    <?php if($this->session->userdata('user_id') > 0 ){?>
                    <!-- Rating Bar -->
                    <input id="post_<?= $id ?>" value='<?= $infrastructurerating ?>' class="rating-loading infrastructure" data-min="0" data-max="5" data-step="1" >
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='infrastructure_<?= $id ?>'>
                      <?= $infrastructureaveragerating ?>
                      </span></div>
                    <?php }else{?>
                    <a onclick="location.href = '<?php echo base_url();?>users/login';">
                    <input id="post_<?= $id ?>" value='<?= $infrastructureaveragerating ?>' class="rating-loading infrastructure loginActive" data-min="0" data-max="5" data-step="1" disabled title="Your have to login first" >
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='infrastructure_<?= $id ?>'>
                      <?= $infrastructureaveragerating ?>
                      </span></div>
                    </a>
                    <?php }?>
                  </div>
                </div>
              </div>
              <!--<p class="Note"><strong>Note*</strong> You have to login before </p>-->
              <p>&nbsp;</p>
              <?php if(!empty($res['youtube'])){?>
              <div class="row">
                <div class="col-md-12">
                  <iframe width="100%" height="345" src="https://www.youtube.com/embed/<?php echo $res['youtube'];?>?autoplay=1"> </iframe>
                </div>
              </div>
              <?php }?>
              <p>&nbsp;</p>
              <div class="row">
                <?php if(!empty($res['image1'])){?>
                <div class="col-md-6"> <img src="<?php echo get_image('gallery',$res['image1'],400,250,'AR');?>"/> </div>
                <?php }?>
                <?php if(!empty($res['image2'])){?>
                <div class="col-md-6"> <img src="<?php echo get_image('gallery',$res['image2'],400,250,'AR');?>"/> </div>
                <?php }?>
                <?php if(!empty($res['image3'])){?>
                <div class="col-md-6"> <img src="<?php echo get_image('gallery',$res['image3'],400,250,'AR');?>"/> </div>
                <?php }?>
                <?php if(!empty($res['image4'])){?>
                <div class="col-md-6"> <img src="<?php echo get_image('gallery',$res['image4'],400,250,'AR');?>"/> </div>
                <?php }?>
              </div>
              <h3>Download PDF</h3>
              <?php if(!empty($res['pdf'])){?>
              <div class="row">
                <div class="col-md-12"><span>File:</span> <a  href="<?php echo base_url();?>uploaded_files/teacher/<?php echo $res['pdf'];?>" target="_blank" download>download</a></div>
              </div>
              <?php }?>
              <?php if(!empty($res['pdf1'])){?>
              <div class="row">
                <div class="col-md-12"><span>File:</span> <a  href="<?php echo base_url();?>uploaded_files/teacher/<?php echo $res['pdf1'];?>" target="_blank" download>download</a></div>
              </div>
              <?php }?>
              <?php if(!empty($res['pdf2'])){?>
              <div class="row">
                <div class="col-md-12"><span>File:</span> <a  href="<?php echo base_url();?>uploaded_files/teacher/<?php echo $res['pdf2'];?>" target="_blank" download>download</a></div>
              </div>
              <?php }?>
            </div>
          </div>
          <p>&nbsp;</p>
          
          <!--/.add-desc-box-->
          <div class="table-responsive">
            <?php 
    if(is_array($res_array) && !empty($res_array)) { 
   ?>
            <table class="table">
              <thead>
                <tr>
                  <th></th>
                  <th>Category</th>
                  <th>Subject</th>
                  <th>Class</th>
                  <th>City</th>
                  <th>Location</th>
                  <th>Fee</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
	 $s=$sn;	
	 foreach($res_array as $val) {
	?>
                <tr>
                  <td><?php echo $sno++;?></td>
                  <td><?php echo get_cat_name($val['category']);?></td>
                  <td><?php echo get_cat_name($val['subject']);?></td>
                  <td><?php echo get_cat_name($val['class']);?></td>
                  <td><?php echo get_city($val['city_id']);?></td>
                  <td><?php echo $val['location'];?></td>
                  <td><?php echo $val['fee'];?></td>
                  <td><?php if($this->session->userdata('user_id') > 0 ){?>
                    <a href="<?= base_url();?>teacher/notified/<?= $val['id']?>" onclick="return confirm('Are you sure  notified <?= $res['first_name']?>')" class="btn-success btn-sm bold">Message</a>
                    <?php }else{?>
                    <a href="<?= base_url();?>users/login" class="btn-success btn-sm bold">Message</a>
                    <?php }?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php $this->load->view('bottom_application'); ?>
<link href='<?php echo theme_url();?>bootstrap-star-rating/css/star-rating.min.css' type='text/css' rel='stylesheet'>
<script src='<?php echo theme_url();?>bootstrap-star-rating/js/star-rating.min.js' type='text/javascript'></script> 
<script type="text/javascript">
    document.getElementsByClassName("loginActive").onclick = function () {
        location.href = "<?php echo base_url();?>users/login";
    };
</script> 
<script type='text/javascript'>
	$('.pass').click(function () {
		location.href = "<?php echo base_url();?>/users/login"
	});
	$(document).ready(function(){
		// Initialize
		$('.ratingbar').rating({
	    	showCaption:false,
	    	showClear: false,
	    	size: 'sm'
	    });
		// Rating change
	    $('.ratingbar').on('rating:change', function(event, value, caption) {
	    	var id = this.id;
	    	var splitid = id.split('_');
	    	var entity_id = splitid[1];
	    	
		   	$.ajax({
		   		url: '<?php echo base_url(); ?>teacher/updateRating',
		   		type: 'post',
		   		data: {entity_id: entity_id, rating: value},
		   		success: function(response){
		   			$('#averagerating_'+entity_id).text(response);
		   		}
		   	});
		});
	});
</script> 
<script type='text/javascript'>
	$(document).ready(function(){
		// Initialize
		$('.ratingbars').rating({
	    	showCaption:false,
	    	showClear: false,
	    	size: 'sm'
	    });
		// Rating change
	    $('.ratingbars').on('rating:change', function(event, value, caption) {
	    	var id = this.id;
	    	var splitid = id.split('_');
	    	var entity_id = splitid[1];
	    	$.ajax({
		   		url : '<?php echo base_url(); ?>teacher/teachingUpdateRating',
		   		type: 'post',
		   		data: {entity_id: entity_id, rating: value},
		   		success: function(response){
		   			$('#teachingstyle_'+entity_id).text(response);
		   		}
		   	});
		});
	});
</script> 
<script type='text/javascript'>
	$(document).ready(function(){
		// Initialize
		$('.ratingbarss').rating({
	    	showCaption:false,
	    	showClear: false,
	    	size: 'sm'
	    });
		// Rating change
	    $('.ratingbarss').on('rating:change', function(event, value, caption) {
	    	var id = this.id;
	    	var splitid = id.split('_');
	    	var entity_id = splitid[1];
	    	$.ajax({
		   		url : '<?php echo base_url(); ?>teacher/disciplineUpdateRating',
		   		type: 'post',


		   		data: {entity_id: entity_id, rating: value},
		   		success: function(response){
		   			$('#discipline_'+entity_id).text(response);
		   		}
		   	});
		});
	});
</script> 
<script type='text/javascript'>
	$(document).ready(function(){
		// Initialize
		$('.studymaterial').rating({
	    	showCaption:false,
	    	showClear: false,
	    	size: 'sm'
	    });
		// Rating change
	    $('.studymaterial').on('rating:change', function(event, value, caption) {
	    	var id = this.id;
	    	var splitid = id.split('_');
	    	var entity_id = splitid[1];
	    	$.ajax({
		   		url : '<?php echo base_url(); ?>teacher/studymaterialUpdateRating',
		   		type: 'post',
		   		data: {entity_id: entity_id, rating: value},
		   		success: function(response){
		   			$('#studymaterial_'+entity_id).text(response);
		   		}
		   	});
		});
	});
</script> 
<script type='text/javascript'>
	$(document).ready(function(){
		// Initialize
		$('.locations').rating({
	    	showCaption:false,
	    	showClear: false,
	    	size: 'sm'
	    });
		// Rating change
	    $('.locations').on('rating:change', function(event, value, caption) {
	    	var id = this.id;
	    	var splitid = id.split('_');
	    	var entity_id = splitid[1];
	    	$.ajax({
		   		url : '<?php echo base_url(); ?>teacher/locationsUpdateRating',
		   		type: 'post',
		   		data: {entity_id: entity_id, rating: value},
		   		success: function(response){
		   			$('#locations_'+entity_id).text(response);
		   		}
		   	});
		});
	});
</script> 
<script type='text/javascript'>
	$(document).ready(function(){
		// Initialize
		$('.infrastructure').rating({
	    	showCaption:false,
	    	showClear: false,
	    	size: 'sm'
	    });
		// Rating change
	    $('.infrastructure').on('rating:change', function(event, value, caption) {
	    	var id = this.id;
	    	var splitid = id.split('_');
	    	var entity_id = splitid[1];
	    	$.ajax({
		   		url : '<?php echo base_url(); ?>teacher/infrastructureUpdateRating',
		   		type: 'post',
		   		data: {entity_id: entity_id, rating: value},
		   		success: function(response){
		   			$('#infrastructure_'+entity_id).text(response);
		   		}
		   	});
		});
	});
</script> 
<script type='text/javascript'>
	$(document).ready(function(){
		//$(".filled-stars").css('width',"100%");
	});
</script>
<style>
    .rating-container .filled-stars {
    position: absolute;
    left: 0;
    top: 0;
    margin: auto;
    color: #fde16d;
    white-space: nowrap;
    overflow: hidden;
    -webkit-text-stroke: 1px #777;
    text-shadow: 1px 1px #999;
}.glyphicon {
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
</style>
