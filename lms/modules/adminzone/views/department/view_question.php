<?php $this->load->view('includes/header'); ?> 
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
			<div class="title_left">
				<h3><?php echo $heading_title; ?></h3>
			</div>
        </div>
		<?php 		 
			$num_t = $lession['total_question'];
			$num_q = count($res);	
		?>
        <div class="clearfix"></div>
		<ul class="nav navbar-right panel_toolbox">
			<li>
				<?php 
				if($num_q < $num_t)
				{
					echo anchor("adminzone/department/add_question/$lession_id","Add Question",'class="btn btn-primary"');  
				}
				?>
			</li>
        </ul>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_title">
						<ul class="nav navbar-left panel_toolbox" >
							<li>
								<a href="<?php echo base_url();?>adminzone/dashbord/" style="color:#337ab7">Dashbord / </a>
							</li>
							<li>
								<a href="<?php echo base_url();?>adminzone/department/" style="color:#337ab7"><?php echo $list_dept['category_name'];?>/</a>
							</li> 
							<li>
								<a href="<?php echo base_url();?>adminzone/department/subject/<?php echo $list_sub['department_id'];?>" style="color:#337ab7"><?php echo $list_sub['subject_name'];?>/</a>
							</li> 
							<li>
								<a href="<?php echo base_url();?>adminzone/department/lession/<?php echo $list_sub['subject_id'];?>" style="color:#337ab7"><?php echo $lession['lession'];?>/</a>
							</li>
							<li>
								<a href="javascript:void(0);"style="color:#73879C" >Question List </a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<?php error_message(); ?> 
						<?php 
						$att=array('class'=>'form-horizontal form-label-left','name'=>'myform');
						echo form_open_multipart("adminzone/department/view_question/$lession_id", $att);?> 
						<table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
							<thead>
								<tr>
									<th><input class="flat" type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></th>
									<th>Question</th>
									<th>Option I</th>
									<th>Option II</th>
									<th>Option II</th>
									<th>Option IV</th>
									<th>Answer</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								if(is_array($res) && !empty($res)){
								foreach($res as $catKey=>$pageVal){?> 
								<tr>
									<td>
										<input  type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['question_id'];?>" id="check-all" class="flat">
									</td>
									<td><?php 
										if($pageVal['question']!='')
										{
											echo $pageVal['question'];
										}
										else 
										{ 
										?>
										<a href="#mymodelwork<?php echo $catKey;?>"data-toggle="modal"> 	
											<img src="<?php echo base_url();?>uploaded_files/question/<?php echo $pageVal['que_img'];?>" style="width:120:px;height:80px;">	
										</a>
										<div class="modal fade" id="mymodelwork<?php echo $catKey;?>" role="dialog">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Work Id Image</h4>
													</div>
													<div class="modal-body">
														<img src="<?php echo base_url();?>uploaded_files/question/<?php echo $pageVal['que_img'];?>" >	
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
										<?php 	
										} 
										?>
									</td>
									<td><?php echo $pageVal['option_i'];?> </td>
									<td><?php echo $pageVal['option_ii'];?> </td>
									<td><?php echo $pageVal['option_iii'];?> </td>
									<td><?php echo $pageVal['option_iv'];?> </td>
									<td><?php echo $pageVal['answer'];?></td>
									<td><?php echo ($pageVal['status']==1)? "Active":"In-active";?></td>
									<td>
									<?php
									if($this->editPrvg===TRUE)
									{
									?>
									<b> <?php echo anchor("adminzone/department/edit_question/".$pageVal['question_id']."/".query_string(),'Edit'); ?></b>
									<?php
									}?>
									</td>
								</tr>
								<?php 
								} 
								} 
								?>
							</tbody>
						</table>
						<table class="list" width="100%">
							<tr>
								<td align="left"  style="padding:2px" height="35">
									<?php
									if($this->activatePrvg===TRUE)
									{
									?>
									  <input name="status_action" type="submit" value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
									<?php
									}
									if($this->deactivatePrvg===TRUE)
									{
									?>
									<input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate" onClick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>
									<?php
									}
									if($this->deletePrvg===TRUE)
									{
									?>
									<input name="status_action" type="submit" class="button2" id="Delete" value="Delete" onclick="return validcheckstatus('arr_ids[]','delete','Record');"/>
									<?php
									}
									?>
								</td>
							</tr>
						</table>
						<?php echo form_close();?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->
<?php $this->load->view('includes/footer'); ?>