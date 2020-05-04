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
		$sel_q ="SELECT courses_id,lession_id,level,total_question FROM `tbl_level` where courses_id='".$levelId."'";
		$lev_res=$this->db->query($sel_q);
		$list_lev=$lev_res->result_array();
		$list_lev=$list_lev[0];
		$sel_q ="SELECT subject_id,lession FROM `tbl_lession` where lession_id='".$list_lev['lession_id']."'";
		$les_res=$this->db->query($sel_q);
		$list_les=$les_res->result_array();
		$list_les=$list_les[0];

		$sel_q ="SELECT department_id,subject_name FROM `tbl_subject` where subject_id='".$list_les['subject_id']."'";
		$sub_res=$this->db->query($sel_q);
		$list_sub=$sub_res->result_array();
		$list_sub=$list_sub[0]; 
			  
		$sel_q ="SELECT category_name FROM `tbl_department` where category_id='".$list_sub['department_id']."'";
		$dept_res=$this->db->query($sel_q);
		$list_dept=$dept_res->result_array();
		$dept_name=$list_dept[0];
		$num_t = $list_lev['total_question'];
		$num_q = count($res);
		?>
        <div class="clearfix"></div>
			<ul class="nav navbar-right panel_toolbox">
				<li>
				<?php 
				if($num_q < $num_t)
				{
					echo anchor("adminzone/department/add_question/$levelId","Add Question",'class="btn btn-primary" ' );
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
									<a href="<?php echo base_url();?>adminzone/department/" style="color:#337ab7"><?php echo $dept_name['category_name'];?> /</a>
								</li> 
								<li>
									<a href="<?php echo base_url();?>adminzone/department/subject/<?php echo $list_sub['department_id']?>" style="color:#337ab7"><?php echo $list_sub['subject_name'];?> /</a>
								</li> 
								<li>
									<a href="<?php echo base_url();?>adminzone/department/lession/<?php echo $list_les['subject_id']?>" style="color:#337ab7"><?php echo $list_les['lession'];?> /</a>
								</li> 
								<li>
									<a href="<?php echo base_url();?>adminzone/department/level/<?php echo $list_lev['lession_id']?>" style="color:#337ab7">Level List /</a>
								</li> 
								<li>
									<a href="javascript:void(0);"style="color:#73879C" >Level <?php echo $list_lev['level']; ?> </a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
						<?php error_message(); ?> 
						<?php 
						$att=array('class'=>'form-horizontal form-label-left','name'=>'myform');
						echo form_open_multipart("adminzone/department/view_question/$levelId", $att);?> 
						<table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
							<thead>
								<tr>
									<th>
										<th><input class="flat" type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></th>
									</th>
									<th>Question</th>
									<!--<th>Option</th>-->
									<th>Answer</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($res as $catKey=>$pageVal){?> 
								<tr>
									<td>
										<th><input  type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['question_id'];?>" id="check-all" class="flat"></th>
									</td>
									<td><?php 					
										echo $pageVal['question'];						
										?>
									</td>
									<!--<td><?php echo $pageVal['option_i'];?> </td>-->
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
								<?php } ?>
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