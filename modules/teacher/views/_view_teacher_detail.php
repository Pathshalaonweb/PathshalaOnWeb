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
<div class="course-details-area pt-20">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 col-lg-8">
        <div class="row">
          <div class="col-md-3 no-padding photobox">
            <div class="add-image"> <a href="#"><img
                                                        class="thumbnail no-margin" src="<?php echo get_image('userfiles/images',$res['picture'],190,190,'AR');?>"
                                                        alt="img"></a></div>
          </div>
          <!--/.photobox-->
          <div class="col-md-6 add-desc-box">
            <div class="ads-details">
              <h5 class="add-title"><a href="javascript:void(0)"> Name</a> <?php echo $res['first_name']?></h5>
              <span class="info-row"><i
                                                            class="fa fa-map-marker"></i> <span class="item-location">544 Union Avenue, Brooklyn, NY 11211</span> </span>
              <div class="prop-info-box">
                <div class="prop-info">
                  <div class="clearfix prop-info-block"> <span class="title prop-room title-tutor">Experience:</span> <span class="text">
                    <?php if(@empty($res['experience_year'])){ echo $res['experience_year'];?>
                    year
                    <?php }?>
                    <?php if(@empty($res['experience_month'])){ echo $res['experience_month']?>
                    Month
                    <?php }?>
                    </span> </div>
                  <p><?php echo $res['description'];?></p>
                  <?php if($this->session->userdata('user_id') > 0 ){?>
                  <a class="btn btn-success btn-sm bold notified" href="javascript:void(0)" onclick="return confirm('Are you sure notification <?php echo $res['first_name'];?> ?')" data-href="<?php echo base_url();?>search/getContent/<?php echo $res['teacher_id']?>" data-teacher="<?php echo $res['teacher_id']?>"> Message </a>
                  <?php }else{?>
                  <a class="btn btn-success btn-sm bold" href="<?php echo base_url();?>users/login"> Message </a>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
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
                  <td>
                   <?php if($this->session->userdata('user_id') > 0 ){?>
                  <a href="<?= base_url();?>teacher/notified/<?= $val['id']?>" onclick="return confirm('Are you sure  notified <?= $res['first_name']?>')" class="btn-success btn-sm bold">Message</a>
                  <?php }else{?>
                   <a href="<?= base_url();?>users/login" class="btn-success btn-sm bold">Message</a>
                  <?php }?>
                  </td>
      </tr>
        <?php } ?>
    </tbody>
  </table>
  <?php } ?>
  </div>

          
          
        </div>
        
      </div>
      <div class="col-xl-3 col-lg-4">
        <div class="sidebar-style sidebar-res-mrg-none">
         
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
         
          <?php
			$userid=$userid = $this->session->userdata('user_id');
			$id=$res['teacher_id']; 
			//User rating
       		$this->db->select('rating');
			$this->db->from('wl_rating');
			$this->db->where('rating!=0');
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
			$this->db->where("entity_id", $id);
			$ratingquery = $this->db->get();
	       	$postResult = $ratingquery->result_array();
			$averagerating = $postResult[0]['averageRating'];
	       	if($averagerating == ''){
	       		$averagerating = 0;
	       	}
			?>
           
          <label>1. <?php echo $heading1;?> :</label>
          <div class="post-action"> 
            <!-- Rating Bar -->
            <?php if($this->session->userdata('user_id') > 0 ){?> 
			 <input id="post_<?= $id ?>" value='<?= $rating ?>' class="rating-loading ratingbar" data-min="0" data-max="5" data-step="1"> <!-- Average Rating -->
             <div>Average Rating: <span id='averagerating_<?= $id ?>'>
              <?= $averagerating  ?>
              </span></div>
			<?php }else{?>  
            <a onclick="location.href = '<?php echo base_url();?>users/login';">
            <input id="post_<?= $id ?>" value='<?= $rating ?>' class="rating-loading ratingbar" data-min="0" data-max="5" data-step="1" disabled title="Your have to login first">
            <!-- Average Rating -->
             <div>Average Rating: <span id='averagerating_<?= $id ?>'>
              <?= $averagerating  ?>
              </span></div>
              </a>
              <?php }?>
          </div>
         <?php 
		 	//Teachin Rating
			//User rating
       		$this->db->select('teachingstyle');
			$this->db->from('wl_rating');
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
         <legend class="star-rating__title">2. <?php echo $heading2;?> :</legend>
          <div class="post-action">
          <?php if($this->session->userdata('user_id') > 0 ){?>  
            <!-- Rating Bar -->
            <input id="post_<?= $id ?>" value='<?= $teachingrating ?>' class="rating-loading ratingbars" data-min="0" data-max="5" data-step="1" >
            <!-- Average Rating -->
            <div >Average Rating: <span id='teachingstyle_<?= $id ?>'>
              <?= $teachingaveragerating ?>
              </span></div>
         
          <?php }else{?>  
          <a onclick="location.href = '<?php echo base_url();?>users/login';">
          	<input id="post_<?= $id ?>" value='<?= $teachingrating ?>' class="rating-loading ratingbars" data-min="0" data-max="5" data-step="1" disabled title="Your have to login first">
            <!-- Average Rating -->
            <div >Average Rating: <span id='teachingstyle_<?= $id ?>'>
              <?= $teachingaveragerating ?>
              </span></div>
          </a>
          <?php }?>
          </div>
          
          <?php 
		 	//Discipline Rating
			//User rating
       		$this->db->select('discipline');
			$this->db->from('wl_rating');
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
          <legend class="star-rating__title">3. <?php echo $heading3;?> :</legend>
          <div class="post-action">
          <?php if($this->session->userdata('user_id') > 0 ){?>  
            <!-- Rating Bar -->
            <input id="post_<?= $id ?>" value='<?= $disciplinerating ?>' class="rating-loading ratingbarss" data-min="0" data-max="5" data-step="1" >
            <!-- Average Rating -->
            <div >Average Rating: <span id='discipline_<?= $id ?>'>
              <?= $disciplineaveragerating ?>
              </span></div>
       
          <?php }else{?>  
          <a onclick="location.href = '<?php echo base_url();?>users/login';">
          	<input id="post_<?= $id ?>" value='<?= $disciplinerating ?>' class="rating-loading ratingbarss" data-min="0" data-max="5" data-step="1" disabled title="Your have to login first">
            <!-- Average Rating -->
            <div >Average Rating: <span id='discipline_<?= $id ?>'>
              <?= $disciplineaveragerating ?>
              </span></div>
          </a>
          <?php }?>
          </div>
          
          
          <?php 
		 	//Discipline Rating
			//User rating
       		$this->db->select('studymaterial');
			$this->db->from('wl_rating');
			$this->db->where('studymaterial!=0');
			$this->db->where("customer_id", $userid);
			$this->db->where("entity_id", $id);
			$disciplineRatingquery = $this->db->get();
	       	$disciplinepostResult = $disciplineRatingquery->result_array();
			$userRating = 0;
			if(count($disciplinepostResult)>0){
					$disciplinerating = $disciplinepostResult[0]['studymaterial'];
			}
			// Average rating
       		$this->db->select('ROUND(AVG(studymaterial),1) as studymaterialRating');
			$this->db->from('wl_rating');
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
          <legend class="star-rating__title">4. <?php echo $heading4;?> :</legend>
          <div class="post-action">
          <?php if($this->session->userdata('user_id') > 0 ){?>  
            <!-- Rating Bar -->
            <input id="post_<?= $id ?>" value='<?= $disciplinerating ?>' class="rating-loading ratingbarss" data-min="0" data-max="5" data-step="1" >
            <!-- Average Rating -->
            <div >Average Rating: <span id='studymaterial_<?= $id ?>'>
              <?= $studymaterialaveragerating ?>
              </span></div>
          
          <?php }else{?>  
          <a onclick="location.href = '<?php echo base_url();?>users/login';">
          	<input id="post_<?= $id ?>" value='<?= $disciplinerating ?>' class="rating-loading studymaterial" data-min="0" data-max="5" data-step="1" disabled title="Your have to login first">
            <!-- Average Rating -->
            <div >Average Rating: <span id='studymaterial_<?= $id ?>'>
              <?= $studymaterialaveragerating ?>
              </span></div>
          </a>
          <?php }?>
          </div>
          
           <?php 
		 	//locations Rating
			//User rating
       		$this->db->select('locations');
			$this->db->from('wl_rating');
			$this->db->where('locations!=0');
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
			$this->db->where("entity_id", $id);
			$locationsratingquery = $this->db->get();
	       	$locationspostResult = $locationsratingquery->result_array();
			//echo_sql();
			$locationsaveragerating = $locationspostResult[0]['locationsRating'];
	       	if($locationsaveragerating == ''){
	       		$locationsaveragerating = 0;
	       	}
		 ?>
          <legend class="star-rating__title">5.	<?php echo $heading5;?> :</legend>
          <div class="post-action">
          <?php if($this->session->userdata('user_id') > 0 ){?>  
            <!-- Rating Bar -->
            <input id="post_<?= $id ?>" value='<?= $locationsrating ?>' class="rating-loading locations" data-min="0" data-max="5" data-step="1" >
            <!-- Average Rating -->
            <div >Average Rating: <span id='locations_<?= $id ?>'>
              <?= $locationsaveragerating ?>
              </span></div>
          
          <?php }else{?>  
          <a onclick="location.href = '<?php echo base_url();?>users/login';">
          	<input id="post_<?= $id ?>" value='<?= $locationsrating ?>' class="rating-loading locations" data-min="0" data-max="5" data-step="1" disabled title="Your have to login first">
            <!-- Average Rating -->
            <div >Average Rating: <span id='locations_<?= $id ?>'>
              <?= $locationsaveragerating ?>
              </span></div>
          </a>
          <?php }?>
          </div>
          
          <?php 
		 	//locations Rating
			//User rating
       		$this->db->select('infrastructure');
			$this->db->from('wl_rating');
			$this->db->where('infrastructure!=0');
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
          <legend class="star-rating__title">6.	<?php echo $heading6;?> :</legend>
          <div class="post-action">
          <?php if($this->session->userdata('user_id') > 0 ){?>  
            <!-- Rating Bar -->
            <input id="post_<?= $id ?>" value='<?= $infrastructurerating ?>' class="rating-loading infrastructure" data-min="0" data-max="5" data-step="1" >
            <!-- Average Rating -->
            <div >Average Rating: <span id='infrastructure_<?= $id ?>'>
              <?= $infrastructureaveragerating ?>
              </span></div>
          
          <?php }else{?>  
          <a onclick="location.href = '<?php echo base_url();?>users/login';">
          	<input id="post_<?= $id ?>" value='<?= $infrastructurerating ?>' class="rating-loading infrastructure loginActive" data-min="0" data-max="5" data-step="1" disabled title="Your have to login first" >
            <!-- Average Rating -->
            <div >Average Rating: <span id='infrastructure_<?= $id ?>'>
              <?= $infrastructureaveragerating ?>
              </span></div>
          </a>
          <?php }?>
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
