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
								<table id="example" class="table table-striped table-bordered" width="auto">
									<thead>
										<tr>
											<th>S.No.</th>
											<th>Subject name</th>
											<th>Lession</th>
											<th>Currect Answer</th>
											<th>Wrong Answer</th>
											<th>Total Mark</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										if(is_array($exam_res) && !empty($exam_res))
										{
											$i=1;
											foreach($exam_res as $key => $val)
											{ 
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
										?>
										<tr>                  
											<td><?php echo $i;?></td>
											<td><?php echo $val['subject_name'];?></td>                          
											<td><?php echo $val['lession'];?> </td>
											<td><?php echo $currect_ans;?> </td> 
											<td><?php echo $currect_wns; ?> </td>
											<td><?php echo $currect_ans;?>/<?php echo $fetch_tque;?> </td> 
											<td><?php echo $val['exam_date'];?> </td>
											<td><?php  echo anchor("exam/history/".$val['exam_id']."/".query_string(),'View',array('class' => 'btn btn-success fr'));  ?></td>
										</tr>
										<?php $i++; } } ?>
									</tbody>
								</table>                                      
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() 
{
    $.noConflict();
    $('#example').DataTable();
} );
</script>
<?php $this->load->view("bottom_application");?>