
<header><?php $this->load->view('top_application'); ?></header>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./webinar.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <title>Webinars</title>
</head>
<body>
<div class="container">
  <section class="heading">
   <!-- <div class="maintext">
      <h1>ALL Digital Events(126)</h1>
    </div>
    <div class="buttons">
      <div class="time">
        <span>TIME:</span>
        <a href="" class="all">
          <button id="allbtn">All</button>
        </a>
        <a href="" class="today">
          <button id="todaybtn">Today</button>
        </a>
        <a href="" class="upcoming">
          <button id="upcomingbtn">Upcoming</button>
        </a>
        <a href="" class="past">
          <button id="pastbtn">Past</button>
        </a>
      </div>
      <!--<div class="genre">
        <span>GENRE:</span>
        <a href="" class="allevents">
          <button id="alleventsbtn">All Digital Events</button>
        </a>
        <a href="" class="onlinecourses">
          <button id="onlinecoursesbtn">Online Courses(104)</button>
        </a>
        <a href="" class="workshops">
          <button id="workshopbtn">Workshop(26)</button>
        </a>
      </div>->
    </div>-->
    <div>
      
    </div>
  </section>
    <section id="cardsall" class="cardssection">
	<form method="post">
<?php
               //print_r($res);
                if(is_array($res) && !empty($res)) {
                foreach($res as $val) {
                  $mem_info=get_db_single_row('wl_teacher',$fields="*",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
                  //print_r($mem_info);
               ?>      
	  <div class="cardsdiv">
            
            <a href="#">
                <div class="card" >
                        <a href="javascript:void(0)" data-id="<?php echo $val['addclass_id']?>">
                       <?php if(!empty($mem_info['picture'])) {?><a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">
                      <img src="<?php echo base_url();?>/uploaded_files/teacher/<?php echo $mem_info['picture']?>" alt="" ></a>
                      <?php } else {?>
                        <img src="<?php echo base_url();?>/uploaded_files/thumb_cache/thumb_190_190_noimg1.gif" alt="" >
					  <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>"><!--class="openPopup"--></a>
                        <?php }?>
                        <div class="card-body">
						<a href="javascript:void(0)">
                              <h3> <?php if($val['class_credit_amount']==0){?>
                                Free</a>
                                <?php }else{ ?>
                                <a href="javascript:void(0)">Credit Point :<?php echo $val['class_credit_amount'];?></a></h3>
                                <?php }?>
								<h4><a>Class Topic: <b><?php echo $val['class_title']?></b></a></h4>
                        <?php 
						$mem_info=get_db_single_row('wl_teacher',$fields="first_name,teacher_id,status",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
						?></a></h3>
						
						<h4><a href="#"><a>Class Time: <b><?php echo $val['class_schedule_time']?></b></a></h4>
                        <?php 
						$mem_info=get_db_single_row('wl_teacher',$fields="first_name,teacher_id,status",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
						?></a></h3>
						
						<h4><a href="#"><a>Class Date: <b><?php echo $val['class_date']?></b></a></h4>
                        <?php 
						$mem_info=get_db_single_row('wl_teacher',$fields="first_name,teacher_id,status",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
						?></a>
                         <div class="button">
                        
                      <?php if($this->session->userdata('user_id') > 0 ){?>
                     <ul> 
                     <a href="<?php echo base_url();?>members/liveclass"><button id="explorebtn">Learn Now</a>&nbsp;</button>
					 <a href="<?php echo base_url();?>liveclasses/Register/student" ><button id="regiterbtn">Remind Me</a></button>
                     
                       <?php //echo $val['class_credit_point'];  
                       if($val['class_credit_amount']!='0'){?>
                       
                     <!-- <li> <a href="<?php //echo base_url();?>/courses/enrollDetailStoreCredit/<?php //echo $val['courses_id']?>" class="lms_buy"><i class="fa fa-money"></i>Use credit Points</a></li> -->
					 <?php }?>
                      </ul>
                      <?php }else{?>
                      <a href="<?php echo base_url();?>users/login" ><button id="explorebtn">Explore More</a></button>
					  <a href="<?php echo base_url();?>liveclasses/Register/student" ><button id="registerbtn">Register Now</a></button>
                      <?php }?> 
                        </div>	
                        </div>
						<div class="trainer-profile d-flex align-items-center">
                    <div class="thumb-lg member-thumb mx-auto"><img src="<?php echo get_image('teacher',$val['picture'],190,190,'AR');?>" alt="img" class="rounded-circle img-thumbnail" alt="profile-image" class="img-fluid" alt=""> </div>
                   <h4><a href="course-details.html">  <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">Teacher: <b><?php echo $mem_info['first_name']?></b></a> </h4>
                  </div>
				  <?php $rating = get_rating('',$val['teacher_id'])?>
         <!-- <div class="row rate" data-target="form-rate-instructor">
                 <div class="col-md-4"> <label>Rating : </label></div>
              <div class="row">
              <?php for ($x = 1; $x <= 5; $x++) {?>
                <i class="fa fa-star<?php if($x > $rating){echo "-o";}?> text-info"></i>
              <?php }?>  
              </div>
              <input type="hidden" name="form-rate-instructor" value="<?php echo $rating;?>">
            </div>-->
                </div>
            </a>
        </div>
		<?php } }?>
		 <?php echo $this->ajax_pagination->create_links(); ?> 
		
		
		</form>
		
       
        

    </section>
    <!-- cards today -->
    <section id="cardstoday" class="cardssection">
      <form method="post">
<?php
               //print_r($res);
                if(is_array($res) && !empty($res)) {
                foreach($res as $val) {
                  $mem_info=get_db_single_row('wl_teacher',$fields="*",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
                  //print_r($mem_info);
               ?>      
	  <div class="cardsdiv">
            
            <a href="#">
                <div class="card" >
                        <a href="javascript:void(0)" data-id="<?php echo $val['addclass_id']?>">
                       <?php if(!empty($mem_info['picture'])) {?><a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">
                      <img src="<?php echo base_url();?>/uploaded_files/teacher/<?php echo $mem_info['picture']?>" alt="" ></a>
                      <?php } else {?>
                        <img src="<?php echo base_url();?>/uploaded_files/thumb_cache/thumb_190_190_noimg1.gif" alt="" >
					  <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>"><!--class="openPopup"--></a>
                        <?php }?>
                        <div class="card-body">
						<a href="javascript:void(0)">
                              <h3> <?php if($val['class_credit_amount']==0){?>
                                Free</a>
                                <?php }else{ ?>
                                <a href="javascript:void(0)">Credit Point :<?php echo $val['class_credit_amount'];?></a></h3>
                                <?php }?>
								<h4><a>Class Topic: <b><?php echo $val['class_title']?></b></a></h4>
                        <?php 
						$mem_info=get_db_single_row('wl_teacher',$fields="first_name,teacher_id,status",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
						?></a></h3>
						
						<h4><a href="#"><a>Class Time: <b><?php echo $val['class_schedule_time']?></b></a></h4>
                        <?php 
						$mem_info=get_db_single_row('wl_teacher',$fields="first_name,teacher_id,status",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
						?></a></h3>
						
						<h4><a href="#"><a>Class Date: <b><?php echo $val['class_date']?></b></a></h4>
                        <?php 
						$mem_info=get_db_single_row('wl_teacher',$fields="first_name,teacher_id,status",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
						?></a>
                          <div class="button">
                        
                      <?php if($this->session->userdata('user_id') > 0 ){?>
                     <ul> 
                     <a href="<?php echo base_url();?>members/liveclass"><button id="explorebtn">Learn Now</a>&nbsp;</button>
					 <a href="<?php echo base_url();?>liveclasses/Register/student" ><button id="regiterbtn">Remind Me</a></button>
                     
                       <?php //echo $val['class_credit_point'];  
                       if($val['class_credit_amount']!='0'){?>
                       
                     <!-- <li> <a href="<?php //echo base_url();?>/courses/enrollDetailStoreCredit/<?php //echo $val['courses_id']?>" class="lms_buy"><i class="fa fa-money"></i>Use credit Points</a></li> -->
					 <?php }?>
                      </ul>
                      <?php }else{?>
                      <a href="<?php echo base_url();?>users/login" ><button id="explorebtn">Explore More</a></button>
					  <a href="<?php echo base_url();?>liveclasses/Register/student" ><button id="registerbtn">Register Now</a></button>
                      <?php }?> 
                        </div>	
                        </div>
						<div class="trainer-profile d-flex align-items-center">
                    <div class="thumb-lg member-thumb mx-auto"><img src="<?php echo get_image('teacher',$val['picture'],190,190,'AR');?>" alt="img" class="rounded-circle img-thumbnail" alt="profile-image" class="img-fluid" alt=""> </div>
                   <h4><a href="course-details.html">  <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">Teacher: <b><?php echo $mem_info['first_name']?></b></a> </h4>
                  </div>
				  <?php $rating = get_rating('',$val['teacher_id'])?>
          <div class="row rate" data-target="form-rate-instructor">
                 <div class="col-md-4"> <label>Rating : </label></div>
              <div class="row">
              <?php for ($x = 1; $x <= 5; $x++) {?>
                <i class="fa fa-star<?php if($x > $rating){echo "-o";}?> text-info"></i>
              <?php }?>  
              </div>
              <input type="hidden" name="form-rate-instructor" value="<?php echo $rating;?>">
            </div>
                </div>
            </a>
        </div>
		<?php } }?>
		 <?php echo $this->ajax_pagination->create_links(); ?> 
		
		
		</form>
     
     
  </section>

  <!-- cards upcoming  -->
  <section id="cardsupcoming" class="cardssection">
    <form method="post">
<?php
               //print_r($res);
                if(is_array($res) && !empty($res)) {
                foreach($res as $val) {
                  $mem_info=get_db_single_row('wl_teacher',$fields="*",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
				  $date = new DateTime('now');
                    $currentDate = $date->format('Y-m-d h:i:s');
                  //print_r($mem_info);
               ?>      
	  <div class="cardsdiv">
            
            <a href="#">
                <div class="card" >
                        <a href="javascript:void(0)" data-id="<?php echo $val['addclass_id']?>">
                       <?php if(!empty($mem_info['picture'])) {?><a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">
                      <img src="<?php echo base_url();?>/uploaded_files/teacher/<?php echo $mem_info['picture']?>" alt="" ></a>
                      <?php } else {?>
                        <img src="<?php echo base_url();?>/uploaded_files/thumb_cache/thumb_190_190_noimg1.gif" alt="" >
					  <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>"><!--class="openPopup"--></a>
                        <?php }?>
                        <div class="card-body">
						<a href="javascript:void(0)">
                              <h3> <?php if($val['class_credit_amount']==0){?>
                                Free</a>
                                <?php }else{ ?>
                                <a href="javascript:void(0)">Credit Point :<?php echo $val['class_credit_amount'];?></a></h3>
                                <?php }?>
								<h4><a>Class Topic: <b><?php echo $val['class_title']?></b></a></h4>
                        <?php 
						$mem_info=get_db_single_row('wl_teacher',$fields="first_name,teacher_id,status",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
						?></a></h3>
						
						<h4><a href="#"><a>Class Time: <b><?php echo $val['class_schedule_time']?></b></a></h4>
                        <?php 
						$mem_info=get_db_single_row('wl_teacher',$fields="first_name,teacher_id,status",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
						?></a></h3>
						
						<h4><a href="#"><a>Class Date: <b><?php echo $val['class_date']?></b></a></h4>
                        <?php 
						$mem_info=get_db_single_row('wl_teacher',$fields="first_name,teacher_id,status",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
						?></a>
                         <div class="button">
                        
                      <?php if($this->session->userdata('user_id') > 0 ){?>
                     <ul> 
                     <a href="<?php echo base_url();?>members/liveclass"><button id="explorebtn">Learn Now</a>&nbsp;</button>
					 <a href="<?php echo base_url();?>liveclasses/Register/student" ><button id="regiterbtn">Remind Me</a></button>
                     
                       <?php //echo $val['class_credit_point'];  
                       if($val['class_credit_amount']!='0'){?>
                       
                     <!-- <li> <a href="<?php //echo base_url();?>/courses/enrollDetailStoreCredit/<?php //echo $val['courses_id']?>" class="lms_buy"><i class="fa fa-money"></i>Use credit Points</a></li> -->
					 <?php }?>
                      </ul>
                      <?php }else{?>
                      <a href="<?php echo base_url();?>users/login" ><button id="explorebtn">Explore More</a></button>
					  <a href="<?php echo base_url();?>liveclasses/Register/student" ><button id="registerbtn">Register Now</a></button>
                      <?php }?> 
                        </div>	
                        </div>
						<div class="trainer-profile d-flex align-items-center">
                    <div class="thumb-lg member-thumb mx-auto"><img src="<?php echo get_image('teacher',$val['picture'],190,190,'AR');?>" alt="img" class="rounded-circle img-thumbnail" alt="profile-image" class="img-fluid" alt=""> </div>
                   <h4><a href="course-details.html">  <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">Teacher: <b><?php echo $mem_info['first_name']?></b></a> </h4>
                  </div>
				  <?php $rating = get_rating('',$val['teacher_id'])?>
          <div class="row rate" data-target="form-rate-instructor">
                 <div class="col-md-4"> <label>Rating : </label></div>
              <div class="row">
              <?php for ($x = 1; $x <= 5; $x++) {?>
                <i class="fa fa-star<?php if($x > $rating){echo "-o";}?> text-info"></i>
              <?php }?>  
              </div>
              <input type="hidden" name="form-rate-instructor" value="<?php echo $rating;?>">
            </div>
                </div>
            </a>
        </div>
		<?php } }?>
		 <?php echo $this->ajax_pagination->create_links(); ?> 
		
		
		</form>
</section>
<!-- cards past  -->
<section id="cardspast" class="cardssection">
  <div class="cardsdiv">
      <a href="#">
          <div class="card" >
                  <img src="https://images.unsplash.com/photo-1477346611705-65d1883cee1e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1050&q=80" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  </div>
          </div>
      </a>
  </div>
</section>
</div>
  <script src="./button.js"></script>
</body>
</html>
<footer><?php $this->load->view('bottom_application'); ?></footer>
  <div id="preloader"></div>
<!-- trial code end here -->

<div id="wait" style="display:none;"><br>
  Loading..</div>
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel ="stylesheet">
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> 
<style>
header{
	height: 100px;
}
.container{
	margin-top:30px;
}
body{
    margin: 0;
            width: 100%;
            height: 100%;
}

#cardstoday{
    display: none;
}

#cardsupcoming{
    display: none;
}

#cardspast{
    display: none;
}

.heading{
    text-align: center;
}

.maintext h1{
    font-size: 20px;
}

.buttons{
    /* display: flex; */
    align-items: center;
}

.buttons h1{
}

.time, .genre{
    margin-top: 20px;
    margin-bottom: 10px;
}

.time a, .genre a{
    text-decoration: none;
    margin-left: 25px;
    margin-right: 25px;
}

.time button, .genre button{
    color: black;
    background-color: transparent;
    border-width: 2px;
    border-radius: 25px;
    padding-left: 15px;
    padding-right: 15px;
    font-weight: 500;
    
}



.cardssection{
    margin: auto;
    position: relative;
    right: 0;
    left: 0;
    align-items: center;
}

.cardsdiv{
    margin-left: 5px;
    margin-right: 5px;
    display:inline-flex;
    position: relative;
    margin-top: 20px;
    align-items: center;
    align-content: center;
    right: 0;left: 0;
	margin-bottom: 20px;
}

.cardsdiv a{
    text-decoration: none;
}

.card{
    margin-left: 4px;
    margin-right: 4px;
	width: 20rem;
}
.card img{
width: 100%;	
}

/* .card img:hover{
    opacity:;
} */

@media only screen and (max-width: 520px) {
    .cardsdiv{
        /* display:flow-root; */
        display: inline;
		margin-left: 5px;
        margin-bottom: 10px;
    }
	
	

    .card{
        align-items: center;
        margin-left: 5px;
        margin-bottom: 10px;
        /* margin-right: 5px; */
    }

    .time a, .genre a{
        font-size: 12px;
        margin-left: 5px;
        margin-right: 5px;
    }

    .time button, .genre button{
        padding-left: 5px;
        padding-right: 5px;
    }

    #workshopbtn{
        margin-left: 35px;
        margin-top: 5px;
    }
}
@media only screen and (max-width: 1024px) {
    .cardsdiv{
        /* display:flow-root; */
        display: inline;
        margin-bottom: 10px;
    }

    .card{
        align-items: center;
        margin-left: 12px;
        margin-bottom: 10px;
        /* margin-right: 5px; */
    }

    .time a, .genre a{
        font-size: 12px;
        margin-left: 5px;
        margin-right: 5px;
    }

    .time button, .genre button{
        padding-left: 5px;
        padding-right: 5px;
    }

    #workshopbtn{
        margin-left: 35px;
        margin-top: 5px;
    }
}
</style>
<script>
const allbtn = document.getElementById('allbtn');
const todaybtn = document.getElementById('todaybtn');
const upcomingbtn = document.getElementById('upcomingbtn');
const pastbtn = document.getElementById('pastbtn');
const cardsall = document.getElementById('cardsall');
const cardstoday = document.getElementById('cardstoday');
const cardsupcoming = document.getElementById('cardsupcoming');
const cardspast = document.getElementById('cardspast');
const alleventsbtn = document.getElementById('alleventsbtn');
const onlinecoursesbtn = document.getElementById('onlinecoursesbtn');
const workshopbtn = document.getElementById('workshopbtn');


allbtn.addEventListener('click', (e) => {
    e.preventDefault();
    //button color change
    allbtn.style.color = "white";
    allbtn.style.backgroundColor = "red";
    todaybtn.style.color = "";
    todaybtn.style.backgroundColor = "";
    upcomingbtn.style.color = "";
    upcomingbtn.style.backgroundColor = "";
    pastbtn.style.color = "";
    pastbtn.style.backgroundColor = "";
    onlinecoursesbtn.style.color = "";
    onlinecoursesbtn.style.backgroundColor = "";
    alleventsbtn.style.color = "";
    alleventsbtn.style.backgroundColor = "";
    workshopbtn.style.color = "";
    workshopbtn.style.backgroundColor = "";
	 explorebtn.style.color = "white";
    explorebtn.style.backgroundColor = "red";
	 registerbtn.style.color = "white";
    registerbtn.style.backgroundColor = "red";
    //page change
    cardsall.style.display="";
    cardstoday.style.display = "";
    cardsupcoming.style.display = "none";
    cardspast.style.display = "none";   

});
todaybtn.addEventListener('click', (e) => {
    e.preventDefault();
    //button color change
    todaybtn.style.color = "white";
    todaybtn.style.backgroundColor = "red";
    allbtn.style.color = "";
    allbtn.style.backgroundColor = "";
    upcomingbtn.style.color = "";
    upcomingbtn.style.backgroundColor = "";
    pastbtn.style.color = "";
    pastbtn.style.backgroundColor = "";
    onlinecoursesbtn.style.color = "";
    onlinecoursesbtn.style.backgroundColor = "";
    alleventsbtn.style.color = "";
    alleventsbtn.style.backgroundColor = "";
    workshopbtn.style.color = "";
    workshopbtn.style.backgroundColor = "";
    //page change
    cardstoday.style.display = "inline";
    cardsall.style.display="none";
    cardsupcoming.style.display = "none";
    cardspast.style.display = "none"; 

});
upcomingbtn.addEventListener('click', (e) => {
    e.preventDefault();
    // button color change
    upcomingbtn.style.color = "white";
    upcomingbtn.style.backgroundColor = "red";
    allbtn.style.color = "";
    allbtn.style.backgroundColor = "";
    todaybtn.style.color = "";
    todaybtn.style.backgroundColor = "";
    pastbtn.style.color = "";
    pastbtn.style.backgroundColor = "";
    onlinecoursesbtn.style.color = "";
    onlinecoursesbtn.style.backgroundColor = "";
    alleventsbtn.style.color = "";
    alleventsbtn.style.backgroundColor = "";
    workshopbtn.style.color = "";
    workshopbtn.style.backgroundColor = "";
    // page change
    cardsupcoming.style.display = "inline";
    cardsall.style.display="none";
    cardstoday.style.display = "none";
    cardspast.style.display = "none"; 

});
pastbtn.addEventListener('click', (e) => {
    e.preventDefault();
    //button color change
    pastbtn.style.color = "white";
    pastbtn.style.backgroundColor = "red";
    allbtn.style.color = "";
    allbtn.style.backgroundColor = "";
    todaybtn.style.color = "";
    todaybtn.style.backgroundColor = "";
    upcomingbtn.style.color = "";
    upcomingbtn.style.backgroundColor = "";
    onlinecoursesbtn.style.color = "";
    onlinecoursesbtn.style.backgroundColor = "";
    alleventsbtn.style.color = "";
    alleventsbtn.style.backgroundColor = "";
    workshopbtn.style.color = "";
    workshopbtn.style.backgroundColor = "";
    //page change
    cardspast.style.display = "inline";
    cardsall.style.display="none";
    cardstoday.style.display = "none";
    cardsupcoming.style.display = "none";

});

alleventsbtn.addEventListener('click', (e) => {
    e.preventDefault();
    //button color change
    alleventsbtn.style.color = "white";
    alleventsbtn.style.backgroundColor = "red";
    onlinecoursesbtn.style.color = "";
    onlinecoursesbtn.style.backgroundColor = "";
    workshopbtn.style.color = "";
    workshopbtn.style.backgroundColor = "";
    allbtn.style.color = "";
    allbtn.style.backgroundColor = "";
    todaybtn.style.color = "";
    todaybtn.style.backgroundColor = "";
    upcomingbtn.style.color = "";
    upcomingbtn.style.backgroundColor = "";
    pastbtn.style.backgroundColor = "";
    pastbtn.style.color = "";
    //page change
    // cardsall.style.display="";
    // cardstoday.style.display = "";
    // cardsupcoming.style.display = "none";
    // cardspast.style.display = "none";   

});

onlinecoursesbtn.addEventListener('click', (e) => {
    e.preventDefault();
    //button color change
    onlinecoursesbtn.style.color = "white";
    onlinecoursesbtn.style.backgroundColor = "red";
    alleventsbtn.style.color = "";
    alleventsbtn.style.backgroundColor = "";
    workshopbtn.style.color = "";
    workshopbtn.style.backgroundColor = "";
    allbtn.style.color = "";
    allbtn.style.backgroundColor = "";
    todaybtn.style.color = "";
    todaybtn.style.backgroundColor = "";
    upcomingbtn.style.color = "";
    upcomingbtn.style.backgroundColor = "";
    pastbtn.style.backgroundColor = "";
    pastbtn.style.color = "";
    //page change
    // cardsall.style.display="";
    // cardstoday.style.display = "";
    // cardsupcoming.style.display = "none";
    // cardspast.style.display = "none";   

});

workshopbtn.addEventListener('click', (e) => {
    e.preventDefault();
    //button color change
    workshopbtn.style.color = "white";
    workshopbtn.style.backgroundColor = "red";
    alleventsbtn.style.color = "";
    alleventsbtn.style.backgroundColor = "";
    onlinecoursesbtn.style.color = "";
    onlinecoursesbtn.style.backgroundColor = "";
    allbtn.style.color = "";
    allbtn.style.backgroundColor = "";
    todaybtn.style.color = "";
    todaybtn.style.backgroundColor = "";
    upcomingbtn.style.color = "";
    upcomingbtn.style.backgroundColor = "";
    pastbtn.style.backgroundColor = "";
    pastbtn.style.color = "";
    //page change
    // cardsall.style.display="";
    // cardstoday.style.display = "";
    // cardsupcoming.style.display = "none";
    // cardspast.style.display = "none";   

});

(function ($) {
    "use strict";
    
    // Initiate the wowjs
    new WOW().init();
})(jQuery);

</script>
<script>
function searchFilter(page_num) {
    page_num = page_num?page_num:0;
	var category =$('#category').val();
	$("#wait").css("display", "block");
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>searchliveclasses/ajaxPaginationData/'+page_num,
        data:{page:page_num,category:category},
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (html) {
            $('#postList').html(html);
            $('.loading').fadeOut("slow");
			$("#wait").css("display", "none");
        }
    });
}
</script> 
<script type="text/javascript">
$(document).ready(function(){
    $('#category').on('change',function(){
    var categoryID = $(this).val();
    $("#subject").val("");
	$("#wait").css("display", "block");
	//searchFilter();
    if(categoryID){
       $.ajax({
          type:'POST',
            url:'<?php echo base_url();?>searchliveclasses/getcourses',
              data:'category_id='+categoryID,
               success:function(html){
                   $('#subject').html(html);
					$("#wait").css("display", "none");
               }
            }); 
        }else{
          $('#city').html('<option value="">Select Category</option>'); 
        }
    });
	
$(document).ready(function(){
    $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#myModal').modal({show:true});
        });
    }); 
});	
	
 });
</script>