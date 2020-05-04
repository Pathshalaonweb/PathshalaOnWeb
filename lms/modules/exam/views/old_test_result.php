<?php $this->load->view("top_application");?>
<?php $this->load->view("project_left");?>
<aside class="right-side">
 
<section class="content" id="main" style="display:block">
					<div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">         

     <div class="tab-content">
             <div role="tabpanel" class="tab-pane active" id="mock_tab" >
             
             
                                  <div class="list_test">
                                    
                                     <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th>
							S.No.</th>
						  </th>
                            <th>Mock Test</th>
                            <th>Subject name</th>
                            <th>Currect Answer</th>
                            <th>Wrong Answer</th>
                          
                            <th>Total Mark</th>
                            <th>Date</th>
                            <th>Action</th>
                         
                        </tr>
                      </thead>
 <?php if(is_array($exam_res) && !empty($exam_res)){
	$i=1;
	foreach($exam_res as $key =>$val)
                                     { 
				 
				$sel_q ="SELECT * FROM `tbl_mock_subject` where mock_id=".$val['mock_id'];
			    $sub_res=$this->db->query($sel_q);				
				$list_sub=$sub_res->result_array();
										// echo "<pre>";
											// print_r($list_sub);die;
				 ?>

                      <tbody>
                     
                       <?php 
										
									
										 $count_row=count($list_sub);
				foreach($list_sub as $key1=>$val1)
				 {
	$sel_q ="SELECT * FROM `tbl_mock_result` where exam_id='".$val['exam_id']."' and subject_id='".$val1['subject_id']."' and ans = user_ans  ";
	$fetch_cans=$this->db->query($sel_q);				
	$fetch_cans=$fetch_cans->result_array();		       		
	$currect_cans=count($fetch_cans);
	$sel_q ="SELECT * FROM `tbl_mock_result` where exam_id='".$val['exam_id']."' and subject_id='".$val1['subject_id']."' and ans != user_ans and user_ans != '' ";
	$fetch_wans=$this->db->query($sel_q);				
	$fetch_wans=$fetch_wans->result_array();		       		
	$currect_wns=count($fetch_wans);
	$sel_q ="SELECT * FROM `tbl_mock_result` where exam_id='".$val['exam_id']."'  and ans = user_ans  ";
	$fetch_tans=$this->db->query($sel_q);				
	$fetch_tans=$fetch_tans->result_array();		       		
	$currect_tans=count($fetch_tans);
						if($key1==0) { 
						  
						  ?>
                        <tr>                  
                          <td rowspan="<?php echo $count_row;?>"><?php echo $i;?></td>
                          <td rowspan="<?php echo $count_row;?>">Test <?php echo $val['test_id'];?> </td>                          
                          <td ><?php echo $val1['subject_name'];?> </td>
                          <td ><?php echo $currect_cans;?> </td>                        
                          <td ><?php echo $currect_wns;?> </td> 
                         
                          <td rowspan="<?php echo $count_row;?>"><?php echo $currect_tans. '/' .$val['t_que'];?> </td>
                          <td rowspan="<?php echo $count_row;?>"><?php echo $val['exam_date'];?> </td> 
                          <td rowspan="<?php echo $count_row;?>"><?php  echo anchor("exam/mock_view/".$val['exam_id']."/".query_string(),'View',array('class' => 'btn btn-success fr'));  ?></td>
						</tr>
                      <?php } else{ ?>
                       <tr>                       
                          <td><?php echo $val1['subject_name'];?> </td>
                          <td><?php echo $currect_cans;?> </td> 
                          <td><?php echo $currect_wns;?> </td>
                                              
					   </tr>

                          <?php }} $i++; }}else{ ?>
									  
									  
										 <tbody>
                     
                       
                        <tr>                  
                          <td colspan="9"><h3 align='center'> No Data Found !!! </h3></td> 
                           
					    </tr>
                       
                        </tbody>			  
									 
								<?php 	 }  ?>
                    </table>
                                      
                                       
                                      
                                 </div>
                                     </div>
    
  
							
  </div>
  </div>
  </div>
  </div>
</section>
</aside>

<?php $this->load->view("bottom_application");?>