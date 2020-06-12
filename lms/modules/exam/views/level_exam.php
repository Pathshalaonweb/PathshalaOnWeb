<?php $this->load->view("top_application");?>
<?php $this->load->view("project_left");?>
<aside class="right-side">
  <?php  
	foreach($lession as $k1=>$v1)
	{ 
		$sel_q ="SELECT lession FROM `tbl_lession` where lession_id=".$v1['lession_id'];
		$sub_res	=	$this->db->query($sel_q);
		$list_sub	=	$sub_res->result_array();
		$sub_res	=	$list_sub[0];
		$t_time		= 	explode(':',$v1['str_total_time']);

	?>
  <section class="content" id="main" style="display:block">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="row frame frame-padding frame-shadow-raised p20">
            <h3 class="ac darkperpol" style="border-bottom: 2px dotted #941f78;"><?php echo $v1['lession'];?></h3>
            <h4 class="mb5 pl15"><?php echo $v1['lession'];  ?> Test</h4>
            <div class="content_box" id="con_box<?php echo $v1['lession_id'];?>">
              <div class="col-xs-12 col-sm-6 col-md-6 ">
                <h5 class="darkperpol mb0">General Instructions</h5>
                <ol class="p11 list_bar">
                  <li>There are Four options with each question.</li>
                  <li>Please choose your option by clicking the mouse.</li>
                  <li>There are four buttons / keys at the bottom.</li>
                  <li>"Clear Selection" button will clear the selected option for that question.</li>
                  <li>"Previous" button will take you to the previous question.</li>
                  <li>"Next" button will take you to the next question.</li>
                  <li>"Finish" button will finish the exam, and take you to the result page. 
                    
                    (This will take some time, so please wait).</li>
                  <li>You can re-open your saved exam from My Exam history page.</li>
                  <li>We have <b>"Questions Dashboard"</b> on the right side of the page, once you click on it, you can view all your attempted and un-attempted questions.</li>
                  <li>You can go back or forward by clicking on the serial number of the question displayed on the Dashboard</li>
                  <li>The attempted questions will be displayed in green colour and the un-attempted questions will be displayed in white colour.</li>
                  <li>You can see the time clock on the top right corner of the exam page.</li>
                </ol>
              </div>
              <?php 

							$mark=$v1['str_total_mark']/$v1['total_question'];

							if($t_time[0] == '0')

							{

								$t_hour=0;

							}else{

								$t_hour=$t_time[0];

							}

							?>
              <div class="col-xs-12 col-sm-6 col-md-6 ">
                <h5 class="darkperpol mb10">Test Specific Instructions</h5>
                <ol class="list_bar">
                  <li>Duration of this Demo Test is <?php echo $t_hour;?> hour <?php echo $t_time[1];?> minutes</li>
                  <li>Total No. of Questions are <?php echo $v1['total_question'];?>.</li>
                  <li>There is only ONE correct answer.</li>
                  <li>For each correct answer there will be <?php echo $mark;?> marks.</li>
                </ol>
                <p><span class="darkperpol fs18 fsb">Disclaimer :</span>This exam is only for demo purpose to indicate the online test environment & style and is not indicative of any actual performance. You will need to purchase actual exam to prepare and experience the detailed analytic reports.</p>
                <div class="fl pt30">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id='check<?php echo $v1['lession_id'];?>' value="1">
                      I have read all instructions. </label>
                  </div>
                  <a href="javascript:void(0);" class="btn login_bar mt5 fr" id="startdemo" onClick="con_box(<?php echo $v1['lession_id'];?>)">Start Exam Test</a> </div>
              </div>
            </div>
            <div class="demotext mt20" id="show_test<?php echo $v1['lession_id'];?>" style="display:none;">
              <div class=" col-sm-12 text-center">
                <p>Time to complete your test is <?php echo $t_hour;?> hour <?php echo $t_time[1];?> minutes
                  
                  Please check the time clock.</p>
                <a href="javascript:void(0);" class="btn  login_bar" onclick ="exam_start(<?php echo $v1['lession_id'];?>); start_timer()" id="ok">Ok</a> </div>
            </div>
            <div class="questext" id="exam_start<?php echo $v1['lession_id'];?>" style="display:none"> <?php echo form_open('','role="form"');?>
              <div style="border-bottom:1px solid #ccc;" class="pb36">
                <div class="col-sm-4">
                  <h6>Question
                    <label id='c_que'>1</label>
                    of <?php echo $v1['total_question'];?></h6>
                </div>
                <div class="col-sm-4">
                  <h4 class="ac"><span id="countdown" class="timer"></span> </h4>
                </div>
                <div class="col-sm-4">
                  <h6 class="darkperpol fr">Questions Dashboard</h6>
                </div>
              </div>
              <?php   

							$sel_q ="SELECT * FROM `tbl_question` where lession_id='".$v1['lession_id']."'";

							$fetch_que=$this->db->query($sel_q);

							//echo_sql();

							$fetch_que=$fetch_que->result_array();

							$q_no= count($fetch_que); $i=1;

							?>
              <div class="pt10">
                <?php  foreach($fetch_que as $k2=>$v2){?>
                <div class="col-xs-12 col-sm-7" id="que<?php echo $i;?>" style="display:none">
                  <div class="heightbar">
                    <div id="quesion1">
                      <?php if($v2['question'] !=''){ ?>
                      <p class="fs16">Q .<?php echo $i.' ' . $v2['question'];?></p>
                      <?php } else{ ?>
                      <p class="fs16">Q .<?php echo $i;?></p>
                      <img src="<?php echo base_url();?>uploaded_files/question/<?php echo $v2['que_img'];?>" >
                      <?php } ?>
                      <br>
                      <ol>
                        <li>
                          <div class="">
                            <label>
                              <input type="radio" name="options<?php echo $i;?>" value="<?php echo $v2['option_i'];?>" onclick="makegreen(<?php echo $i;?>);">
                              <?php echo $v2['option_i'];?> </label>
                          </div>
                        </li>
                        <li>
                          <div class="">
                            <label>
                              <input type="radio" name="options<?php echo $i;?>"value="<?php echo $v2['option_ii'];?>"onclick="makegreen(<?php echo $i;?>);" >
                              <?php echo $v2['option_ii'];?> </label>
                          </div>
                        </li>
                        <li>
                          <div class="">
                            <label>
                              <input type="radio" name="options<?php echo $i;?>" value="<?php echo $v2['option_iii'];?>"onclick="makegreen(<?php echo $i;?>);" >
                              <?php echo $v2['option_iii'];?> </label>
                          </div>
                        </li>
                        <li>
                          <div class="">
                            <label>
                              <input type="radio" name="options<?php echo $i;?>"  value="<?php echo $v2['option_iv'];?>" onclick="makegreen(<?php echo $i;?>);" >
                              <?php echo $v2['option_iv'];?> </label>
                          </div>
                        </li>
                      </ol>
                    </div>
                  </div>
                </div>
                <?php $i++; } ?>
                <div class="col-xs-12 col-sm-5">
                  <p class="darkperpol w100 mb10" style="text-align:right;">Attempted <span class="text-danger">(Green)</span></p>
                  <div class="ques_no pt20">
                    <ul>
                      <?php $i=1; foreach($fetch_que as $k2=>$v2){ ?>
                      <li><a href="javascript:void(0);" onclick="go(<?php echo $i;?>)" id="que_no<?php echo $i;?>">Q <?php echo $i; ?></a></li>
                      <?php $i++; }?>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
              <?php $i=1;

							$t_que= count($fetch_que);

							foreach($fetch_que as $k2=>$v2){ ?>
              <div id="page<?php echo $i;?>" style = "display:none" > 
                
                <!--<input type="reset"class="btn login_bar" value="Clear Option"  onclick="cleard(<?php echo $t_que;?>);" >--> 
                
                <!--<a href="javascript:void(0);" class="btn login_bar">Clear Option</a>--> 
                
                <a href="javascript:void(0);" class="previous btn prev_bar" id="pre<?php echo $i;?>" onclick="previous(<?php echo $i;?>,<?php echo $t_que;?>)">Previous</a> <a href="javascript:void(0);" class="next btn login_bar" onclick="next(<?php echo $i;?>,<?php echo $t_que;?>)">Next</a> </div>
              <?php $i++; }?>
              
              <!-- <a href="#." class="fr btn login_bar" >Finish &amp; Exit</a>-->
              
              <input type="submit" name="sub" value="Finish &amp; Exit" id="examsub" class="fr btn login_bar">
              <?php echo form_close();?> </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- #main --> 
  
</aside>
<form>
  <input type="hidden" id="run" value ="1" name="txt">
</form>
<?php }?>
<?php 
	$th= $t_time[0];
	$tm= $t_time[1];
	$th=$th*60*60;
	$tm=$tm*60;
	$t=$th+$tm;
	?>
<?php //echo $t;?>
<script  type="text/javascript">
var upgradeTime = <?php echo $t;?>;
var seconds = upgradeTime;
function timer() 

{

    var days        = Math.floor(seconds/24/60/60);

    var hoursLeft   = Math.floor((seconds) - (days*86400));

    var hours       = Math.floor(hoursLeft/3600);

    var minutesLeft = Math.floor((hoursLeft) - (hours*3600));

    var minutes     = Math.floor(minutesLeft/60);

    var remainingSeconds = seconds % 60;

    if (remainingSeconds < 10) {

        remainingSeconds = "0" + remainingSeconds; 

    }

    document.getElementById('countdown').innerHTML =  hours + ":" + minutes + ":" + remainingSeconds;

    if (seconds == 0) {   

		start_timer(1);

		document.getElementById("examsub").click();       

    }

	else

	{

        seconds--;

    }

}

function start_timer(id=0)

{

	if(id==1)

	{

		clearInterval(countdownTimer);

	}

	var countdownTimer = setInterval('timer()', 1000);		

}

</script> 
<script  type="text/javascript">

function start_exam(id)

{

	var str1 = "detail";

	var str2 = id;

	var str3 = "main";

	var res1 = str1.concat(str2);

	var res2 = str3.concat(str2);

	document.getElementById("" + res1.toString() + "").style.display = "none";

	document.getElementById("" + res2.toString() + "").style.display = "block";

	//document.getElementById("main").style.display = "block";

}			

function con_box(id)

{

	var str1 = id;

	var str2 = "check";

	var str3 = "show_test";

	var str4 = "con_box";				

	var res1 = str2.concat(str1); 

	var res2 = str3.concat(str1); 

	var res3 = str4.concat(str1); 

					

	if(document.getElementById("" + res1.toString() + "").checked)

	{

		document.getElementById("" + res3.toString() + "").style.display = "none";

		document.getElementById("" + res2.toString() + "").style.display = "block";

	}

	else

	{

		alert('Please select the checkbox !!!');

	}			

}

				

function exam_start(id)

{

		var str1 = id;

		var str2 = "show_test";

		var str3 = "exam_start";

		var str4 = "que";

		var str5 = "page";

	

		var res1 = str2.concat(str1); 

		var res2 = str3.concat(str1); 

		var res3 = str4.concat("1");

		var res4 = str5.concat("1");

		

		 document.getElementById("" + res1.toString() + "").style.display = "none";

		 document.getElementById("" + res2.toString() + "").style.display = "block";

		 document.getElementById("" + res3.toString() + "").style.display = "block";

		 document.getElementById("" + res4.toString() + "").style.display = "block";		   

}

function next(id,t_que)

{ 

	var str = id;

	var str1 = ++str;

	var str2 = "que";

	var str3 = "page";

	var str4 = "pre";

	

	var res1 = str2.concat(str1); 

	var res2 = str3.concat(str1); 

	var res3 = str2.concat(id); 

	var res4 = str3.concat(id); 

	var res5 = str4.concat(str1);

	

	if(id < t_que)

	{

		document.getElementById("" + res3.toString() + "").style.display = "none";

		document.getElementById("" + res4.toString() + "").style.display = "none";

		document.getElementById("" + res1.toString() + "").style.display = "block";

		document.getElementById("" + res2.toString() + "").style.display = "block";

		document.getElementById('run').value = str1;

	}	

}

function previous(id,t_que)

{ 

	var str = id;

	var str1 = --str;

	var str2 = "que";

	var str3 = "page";

	var str4 = "pre";

	var res1 = str2.concat(str1); 

	var res2 = str3.concat(str1); 

	var res3 = str2.concat(id); 

	var res4 = str3.concat(id); 

	var res5 = str4.concat(str1);

	if(id > 1)

	{

		document.getElementById("" + res3.toString() + "").style.display = "none";

		document.getElementById("" + res4.toString() + "").style.display = "none";

		document.getElementById("" + res1.toString() + "").style.display = "block";

		document.getElementById("" + res2.toString() + "").style.display = "block";

		document.getElementById('run').value = str1;

	}	

}

function makegreen(id)
{
	var str = id;		
	var str1 = "que_no";
	var res1 = str1.concat(str); 
	document.getElementById("" + res1.toString() + "").style.background = "green";
}

function cleard(total)
{
	var i;
	for(i=1; i<=total; i++)
	{			
		var str1 = "que_no";
		var res1 = str1.concat(i); 
		//alert("" + res1.toString() + "");
		document.getElementById("" + res1.toString() + "").style.background = "white";
	}
}		
function go(id)
{ 
	var run = document.getElementById("run").value;
	var str2 = "que";
	var str3 = "page";
	var res1 = str2.concat(run); 
	var res2 = str3.concat(run);
	var res3 = str2.concat(id); 
	var res4 = str3.concat(id); 
	document.getElementById("run").value = id;
	document.getElementById("c_que").value = id;	
	document.getElementById("" + res1.toString() + "").style.display = "none";
	document.getElementById("" + res2.toString() + "").style.display = "none";
	document.getElementById("" + res3.toString() + "").style.display = "block";
	document.getElementById("" + res4.toString() + "").style.display = "block";

}
</script>
<?php $this->load->view("bottom_application");?>