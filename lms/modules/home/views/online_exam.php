<?php $this->load->view("top_application");?>
<?php $this->load->view("project_left");?>
<aside class="right-side">
	<?php 
	$course=  explode(",",$this->session->userdata('course')) ;
	//echo "<pre>"; print_r($course); die;
	$result = array();
	for($i=0; $i<count($course); $i++)
	{
		$sel_q ="SELECT * FROM `tbl_subject` where department_id='".$course[$i]."'  ORDER BY sort_order ASC";
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
	<!-- Content Header (Page header) -->        
	<section class="content-header" id="tbl1">
        <ul class="nav nav-tabs tab_bar" role="tablist">
			<li class="active"><a href="#mock_tab" onClick="test_mock()" class="btn mock" aria-controls="mocktest" role="tab" data-toggle="tab">Online Exam</a></li>
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
			<li><a href="#math_tab<?php echo $key;?>"  class="<?php echo $class;?>" aria-controls="mathstest" role="tab" data-toggle="tab"><?php echo $val['subject_name'];?></a></li>
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
							<div role="tabpanel" class="tab-pane active" id="mock_tab" >
								
								
							</div>
							<!--  TAB  -->
							<?php 
							
							if(is_array($result)&& !empty($result)) 
							{ 
							foreach($result as $key=>$val)
							{ 
								$sel_q ="SELECT * FROM `tbl_lession` where subject_id='".$val['subject_id']."' ORDER BY sort_order ASC";
								$les_res=$this->db->query($sel_q);
								if($les_res->num_rows() > 0)
								{
									$list_les=$les_res->result_array();
								}
							?>
							<div role="tabpanel" class="tab-pane"  id="math_tab<?php echo $key;?>" >
								<div class="table-responsive" >
									<table class="table table-striped table-bordered meth_table white">
										<tbody>
										<?php 
										if(count($list_les) > 0) 
										{
											foreach($list_les as $k => $v)
											{ 
												//$sel_q ="SELECT * FROM `tbl_level` where lession_id='".$v['lession_id']."' ORDER BY level ASC";
												//$level_res=$this->db->query($sel_q);
												//$level_res=$level_res->result_array();
											if($v['exam_date']==$this->config->item('config.date'))
											{
												if($k % 2 ==0)
												{
										?>	
											<tr>
												<td class="test1"><?php echo $v['lession'];?></td>
												<td  class="test1 ac"><a href='javascript:void(0);' class="btn btn-warning" onclick="exam(<?php echo $v['lession_id'];?>)">Click to Start</a></td>
											</tr>
											<?php 
											}
											else { ?>
											<tr>
												<td class="test2"><?php echo $v['lession'];?></td>
												<td  class="test2 ac"><a href="javascript:void(0);"  class="btn btn-success" onclick="exam(<?php echo $v['lession_id'];?>)">Click to Start</a></td>
											</tr>
											<?php } 
											
											}
											else{ ?>
											<tr>
												<td class="test1"><?php echo $v['lession'];?></td>
												<td  class="test1 ac"><a href='javascript:void(0);' class="btn btn-danger" >Exam Date <?php echo $v['exam_date']; ?></a></td>
											</tr>
											<?php }
											}
											}?>
										</tbody>
									</table>
								</div>
							</div>
							<?php 
							}
							} 
							?>
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
	$course=  explode(",",$this->session->userdata('course')) ;
	$result = array();
	for($i=0; $i<count($course); $i++)
	{
	
		$sel_q ="SELECT * FROM `tbl_subject` where department_id='".$course[$i]."' ORDER BY sort_order ASC";
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
		$sel_q ="SELECT * FROM `tbl_lession` where subject_id='".$val['subject_id']."' ORDER BY sort_order ASC";
		$les_res=$this->db->query($sel_q);
		$list_les=$les_res->result_array();
		
	?>
    <?php 	
	if(count($list_les) > 0) 
	{
		foreach($list_les as $k => $v)
		{ 
	?>
	<?php   $sel_q ="SELECT subject_name FROM `tbl_subject` where subject_id='".$v['subject_id']."'";
			$fetch_sub=$this->db->query($sel_q);
				
			$sub_name=$fetch_sub->result_array();
			$sub_name=$sub_name[0]['subject_name'];		
	?>
	<section class="content" id='detail<?php echo $v['lession_id'];?>' style="display:none">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary p20" >
					<p><?php echo $v['lession'];?></p><span>
					<?php  echo anchor("exam/start_exam/".$v['lession_id']."/".query_string(),'Start Exam',array('class' => 'btn btn-danger fr'));  ?>
					<!--<a href="#" onclick="start_exam(<?php //echo $v1['courses_id'];?>);" class="btn btn-danger fr">Start Exam</a>-->
					<p><a >EXAM INFORMATION WINDOW</a></p>
					<div class="card">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#summary<?php echo $v['lession_id'];?>" aria-controls="summary" role="tab" data-toggle="tab">Exam Summary</a></li>
							<li role="presentation"><a href="#examstruture<?php echo $v['lession_id'];?>" aria-controls="examstruture" role="tab" data-toggle="tab">Exam Structure</a></li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="summary<?php echo $v['lession_id'];?>">
								<?php echo $v['courses_description'];?>
							</div>
							<div role="tabpanel" class="tab-pane" id="examstruture<?php echo $v['lession_id'];?>">
								<div class="table-responsive">
									<table class="table table-striped table-bordered text-left my-orders-table">
										<tbody>
											<tr>
												<td colspan="2" style="text-align:left;"><strong>Total Time:</strong> <?php echo $v['str_total_time'];?></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td colspan="2" style="text-align:left;"><strong>Mode of Exam: </strong><?php //echo $v1['mode_of_exam'];?></td>
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
												<?php $t_time = explode(':',$v['str_total_time']);
												//print_r($t_time); ?>
												<td><?php echo $sub_name; ?></td>
												<td><?php echo $v['total_question'] ?></td>	 
												<td><?php echo $v['str_total_mark'];?></td>
												<td>
												<?php 
												if($v['str_total_time']!='')
												{
													if($t_time[0]=='0')
													{
														echo $t_time[1].' Minutes'; }else{ echo $t_time[0].' Hours '.$t_time[1].' Minutes';
													}
												}?> 
												</td>
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
	</section><!-- #main -->
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