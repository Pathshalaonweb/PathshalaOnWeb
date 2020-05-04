<?php $this->load->view("top_application");?>
<?php $this->load->view("project_left");?>
<?php //echo $this->session->userdata('course');die('test');

//echo "<pre>";print_r($this->session->all_userdata());
$db2 = $this->load->database('database2', TRUE);
$sql="SELECT * FROM `wl_customers` WHERE `customers_id` = '".$this->session->userdata('user_id')."'";
$query=$db2->query($sql);
$mem_info=$query->row();
//$mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$this->session->userdata('user_id')."'");	
$this->session->set_userdata('course', $mem_info->lot);
?>

<aside class="right-side">
  <?php 
	$course=  explode(",",$this->session->userdata('course')) ;
	$result = array();
	for($i=0; $i<count($course); $i++)
	{
	//$sel_q ="SELECT * FROM `tbl_courses` where category_id='".$course[$i]."' AND status='1' ORDER BY courses_id ASC";
		$sel_q ="SELECT * FROM `tbl_courses` where courses_id='".$course[$i]."' AND status='1' ORDER BY courses_id ASC";
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
      <li class="active"><a href="#mock_tab" onClick="test_mock()" class="btn mock" aria-controls="mocktest" role="tab" data-toggle="tab">Courses</a></li>
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
      <li><a href="#math_tab<?php echo $key;?>"  class="<?php echo $class;?>" aria-controls="mathstest" role="tab" data-toggle="tab"><?php echo $val['courses_name'];?></a></li>
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
					if(is_array($result)&& !empty($result)) 
					{ 
					foreach($result as $key=>$val)
					{ 
					$sel_q ="SELECT * FROM `tbl_course_lession` where subject_id='".$val['courses_id']."' ORDER BY sort_order ASC";
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
                      <?php if(count($list_les) > 0) {
							foreach($list_les as $k => $v) { 
							if($k % 2 ==0) {
					  ?>
                      <tr>
                        <td class="test1"><?php echo $v['lession'];?></td>
                        <td  class="test1 ac"><a href='<?php echo base_url();?>course_material/view_course_material/<?php echo $v['lession_id'];?>' class="btn btn-warning" >View Details</a></td>
                      </tr>
                      <?php } else { ?>
                      <tr>
                        <td class="test2"><?php echo $v['lession'];?></td>
                        <td  class="test2 ac"><a href="<?php echo base_url();?>course_material/view_course_material/<?php echo $v['lession_id'];?>"  class="btn btn-success" >View Details</a></td>
                      </tr>
                      <?php } } }?>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php  } } ?>
              <!-- End Tab  --> 
             </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
