<?php $this->load->view("top_application");?>
<?php $this->load->view("project_left");?>

<aside class="right-side">
  <?php 
	$db2 	= $this->load->database('database2', TRUE);
	$sql 	= "SELECT lot,customers_id FROM `wl_customers` where customers_id='".$this->session->userdata('user_id')."'";
	$res	= $db2->query($sql)->result_array();
	
	$courses =  explode(",",$res[0]['lot']);
	$course1 =  array_filter(array_unique($courses));
	
	$course2=implode(',',$course1);
	$course =  explode(",",$course2);
	//print_r($course);
	//echo "<pre>"; print_r($course); die;
	$result = array();
	for($i=0; $i<count($course); $i++)
	{
		
	//if($course[$i]!='') {
		
	$sel_q ="SELECT * FROM `tbl_mock` where course_id='".$course[$i]."'  ORDER BY mock_id ASC";
	
	//echo "<br>";
		$sub_res=$this->db->query($sel_q);
		if($sub_res->num_rows() > 0)
		{
			$list_sub=$sub_res->result_array();
		} else {
			$list_sub = array();
		}
		$result=array_merge($result,$list_sub);
	}
	//}
	?>
<!-- Content Header (Page header) -->
<section class="content-header" id="tbl1">
    <ul class="nav nav-tabs tab_bar" role="tablist">
      <li class="active"><a href="#mock_tab" onClick="test_mock()" class="btn mock" aria-controls="mocktest" role="tab" data-toggle="tab">Mock</a></li>
      <?php 
			if(is_array($result)&& !empty($result)) 
			{ 		  
			foreach($result as $key=>$val)
			{ 
			switch($key)
			{
				    case  0:
				   	$class='btn btn-primary';
					break;
					case  1:
				   	$class='btn btn-success';
					break;
					case  2:
				   	$class='btn btn-info';
					break;
					case  3:
				   	$class='btn btn-danger';
					break;
					case  4:
				   	$class='btn btn-warning';
					break;
					case  5:
				   	$class='btn pink_bg';
					break;
					case  6:
				   	$class='btn perpol_bg';
					break;
					default :
				   	$class='btn btn-success';
					break;
			}		  
		?>
      <li><a href="#math_tab<?php echo $key;?>"  class="<?php echo $class;?>" aria-controls="mathstest" role="tab" data-toggle="tab"><?php echo $val['mock_title'];?></a></li>
      <?php 
			}
		} 
	?>
    </ul>
</section>
<!-- Main content -->
<section class="content" id="tbl2">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="mock_tab" > </div>
              <!--  TAB  -->
              <?php 
				if(is_array($result)&& !empty($result))  { 
					foreach($result as $key=>$val) { 
						$sel_q ="SELECT * FROM `tbl_mock_subject` where mock_id='".$val['mock_id']."' ORDER BY subject_id ASC";
						$les_res=$this->db->query($sel_q);
				if($les_res->num_rows() > 0) {
						$list_les=$les_res->result_array();
					}
			?>
              <div role="tabpanel" class="tab-pane"  id="math_tab<?php echo $key;?>" >
                <div class="table-responsive" >
                  <table class="table table-striped table-bordered meth_table white">
                    <tbody>
                      <?php 
						if(count($list_les) > 0) {
							foreach($list_les as $k => $v) { 
							if($k % 2 ==0){
					  ?>
                      <tr>
                        <td class="test1"><?php echo $v['subject_name'];?></td>
                        <td  class="test1 ac"><a href='javascript:void(0);' class="btn btn-warning" onclick="exam(<?php echo $v['subject_id'];?>)">Click to Start</a></td>
                      </tr>
                      <?php } else { ?>
                      <tr>
                        <td class="test2"><?php echo $v['subject_name'];?></td>
                        <td  class="test2 ac"><a href="javascript:void(0);"  class="btn btn-danger" onclick="exam(<?php echo $v['subject_id'];?>)">Click to Start</a></td>
                      </tr>
                      <?php 
					  	 } 
						}
					}
					?>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php } } ?>
              
              <!-- End Tab  --> 
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content --> 
  <!-----------------------------------Test Exam------------------------------------>
  <?php  
	//$course=  explode(",",$this->session->userdata('course')) ;
	$result = array();
	for($i=0; $i<count($course); $i++) {
		$sel_q ="SELECT * FROM `tbl_mock` where course_id='".$course[$i]."' ORDER BY mock_id ASC";
		$sub_res=$this->db->query($sel_q);
		if($sub_res->num_rows() > 0)
		{
			$list_sub=$sub_res->result_array();
		}
		else
		{
			$list_sub = array();
		}
		$result=array_merge($result,$list_sub);
	}
	?>
  <?php   
	if(is_array($result)&& !empty($result)) 
	{ 
		foreach($result as $key=>$val){ 
		$sel_q ="SELECT * FROM `tbl_mock_subject` where mock_id='".$val['mock_id']."' ORDER BY subject_id ASC";
		$les_res=$this->db->query($sel_q);
		$list_les=$les_res->result_array();

	?>
  <?php 	
	if(count($list_les) > 0) 
	{
	foreach($list_les as $k => $v)	{ 

	?>
  <section class="content" id='detail<?php echo $v['subject_id'];?>' style="display:none">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary p20" >
          <p><?php echo $v['subject_name'];?></p>
          <span>
          <?php  echo anchor("exam/start_test/".$v['subject_id']."/".query_string(),'Start Exam',array('class' => 'btn btn-danger fr'));  ?>
          
          <!--<a href="#" onclick="start_exam(<?php //echo $v1['courses_id'];?>);" class="btn btn-danger fr">Start Exam</a>-->
          
          <p><a >EXAM INFORMATION WINDOW</a></p>
          <div class="card">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#summary<?php echo $v['subject_id'];?>" aria-controls="summary" role="tab" data-toggle="tab">Exam Summary</a></li>
              <li role="presentation"><a href="#examstruture<?php echo $v['subject_id'];?>" aria-controls="examstruture" role="tab" data-toggle="tab">Exam Structure</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="summary<?php echo $v['subject_id'];?>"> <?php echo $val['mock_description'];?> </div>
              <div role="tabpanel" class="tab-pane" id="examstruture<?php echo $v['subject_id'];?>">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered text-left my-orders-table">
                    <tbody>
                      <tr>
                        <td colspan="2" style="text-align:left;"><strong>Total Time:</strong> <?php echo $val['str_total_time'];?></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td colspan="2" style="text-align:left;"><strong>Mode of Exam: </strong>
                          <?php //echo $v1['mode_of_exam'];?></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td class="fsb">SUBJECTS</td>
                        <td class="fsb">QUESTIONS</td>
                        <td class="fsb">MARKS</td>
                        <td class="fsb">TOTAL TIME</td>
                        <!--<td class="fsb">NEGATIVE MARKING</td>--> 
                       </tr>
                      <tr>
                        <?php $t_time = explode(':',$val['str_total_time']);
							//print_r($t_time); ?>
                        <td><?php echo $v['subject_name']; ?></td>
                        <td><?php echo $val['total_question'] ?></td>
                        <td><?php echo $val['str_total_mark'];?></td>
                        <td><?php if($val['str_total_time']!='') {
								  if($t_time[0]=='0') {
									echo $t_time[1].' Minutes'; }else{ echo $t_time[0].' Hours '.$t_time[1].' Minutes';
								}
						}?></td>
                        <!--<td ><?php //echo $v1['str_negative_mark'];?></td>--> 
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- #main -->
    <?php }
	//}
	//}
	}
	}
	} ?>
</aside>
<script>		
function  exam(id)
{	//alert(id);
	var str1 = "detail";
    var str2 = id;
    var res1 = str1.concat(str2);
	//document.getElementById("detail").style.display = "block";
	document.getElementById("" + res1.toString() + "").style.display = "block";
	document.getElementById("tbl1").style.display = "none";
	document.getElementById("tbl2").style.display = "none";
}		
</script>
<?php $this->load->view("bottom_application");?>
