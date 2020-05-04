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
                            <th>Subject name</th>
						 
                            <th>Lession</th>
                            <th>Level</th>
                            <th>Currect Answer</th>
                            <th>Wrong Answer</th>
                            <th>Total Mark</th>
                            <th>Date</th>
                            <th>Action</th>
                         
                        </tr>
                      </thead>
                    
       <?php if(is_array($exam_res) && !empty($exam_res)){
	$i=1;
	foreach($exam_res as $key => $val)
	{ 
	/*$sel_q ="SELECT * FROM `tbl_level` where courses_id='".$val['lavel_id']."'";
			    $fetch_lev=$this->db->query($sel_q);				
				$fetch_lev=$fetch_lev->result_array();
		        $fetch_lev =$fetch_lev[0];
		
   $sel_q ="SELECT * FROM `tbl_lession` where lession_id='".$fetch_lev['lession_id']."'";
			    $fetch_les=$this->db->query($sel_q);				
				$fetch_les=$fetch_les->result_array();
		        $fetch_les =$fetch_les[0];	
		
  $sel_q ="SELECT * FROM `tbl_subject` where subject_id='".$fetch_les['subject_id']."'";
			    $fetch_sub=$this->db->query($sel_q);				
				$fetch_sub=$fetch_sub->result_array();
		        $fetch_sub =$fetch_sub[0];
		*/
  $sel_q ="SELECT * FROM `tbl_result` where exam_id='".$val['exam_id']."' and ans = user_ans";
			    $fetch_cans=$this->db->query($sel_q);				
				$fetch_cans=$fetch_cans->result_array();		       		
               $currect_ans=count($fetch_cans);
 $sel_q ="SELECT * FROM `tbl_result` where exam_id='".$val['exam_id']."' and ans != user_ans and user_ans != '' ";
			$fetch_wans=$this->db->query($sel_q);				
			$fetch_wans=$fetch_wans->result_array();		       		
			$currect_wns=count($fetch_wans);	
$sel_q ="SELECT * FROM `tbl_result` where exam_id='".$val['exam_id']."'";
			$fetch_tque=$this->db->query($sel_q);				
			$fetch_tque=$fetch_tque->result_array();		       		
			$fetch_tque=count($fetch_tque);
		//echo "<pre>";
		
		
	//print_r($val);
		
		//die;
	//			 
				 ?>

                      <tbody>
                     
                       
                        <tr>                  
                          <td><?php echo $i;?></td>
                          <td><?php echo $val['subject_name'];?></td>                          
                          <td><?php echo $val['lession'];?> </td>
                          <td>Level <?php echo $val['level'];?> </td> 
                          <td><?php echo $currect_ans;?> </td> 
                          <td><?php echo $currect_wns; ?> </td>
                          <td><?php echo $currect_ans;?>/<?php echo $fetch_tque;?> </td> 
                          <td><?php echo $val['exam_date'];?> </td>
                          <td>  <?php  echo anchor("exam/history/".$val['exam_id']."/".query_string(),'View',array('class' => 'btn btn-success fr'));  ?></td>
                       
				 </tbody>	
                        
                          <?php $i++; } } else{ ?>
									  
									  
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