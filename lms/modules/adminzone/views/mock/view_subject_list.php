<?php $this->load->view('includes/header'); ?> 
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?php echo $heading_title; ?></h3>
            </div>
        </div>
        <div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<ul class="nav navbar-left panel_toolbox" >
							<li>
								<a href="<?php echo base_url();?>adminzone/dashbord/" style="color:#337ab7">Dashbord / </a>
							</li>
							<li>
								<a href="<?php echo base_url();?>adminzone/mock/" style="color:#337ab7"><?php echo $list_dept['category_name'];?> /</a>
							</li> 
							<li>
								<a href="<?php echo base_url();?>adminzone/mock/test/<?php echo $mock_res['department_id'];?>" style="color:#337ab7"><?php echo $mock_res['mock_title'];?> /</a>
							</li> 
							<li>
								<a href="javascript:void(0);"style="color:#73879C" ><?php echo $heading_title; ?> List</a>
							</li>
						</ul>
						<ul class="nav navbar-right panel_toolbox">
							<li>
								<?php echo anchor("adminzone/mock/add_subject/".$mock_res['mock_id']."/","Add Subject",'class="btn btn-primary" ' );?>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<?php error_message(); ?> 
						<?php 
						$att=array('class'=>'form-horizontal form-label-left','name'=>'myform');
						echo form_open_multipart("adminzone/mock/subject/".$mock_res['mock_id']."/", $att);?> 
						<table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
							<thead>
								<tr>
									<th><input class="flat" type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></th>
									<th>Subject</th>
									<th>Total Mark</th>
									<th>Total Question</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($res as $catKey=>$pageVal){
								$condtion_que   =  "AND department_id='".$pageVal['department_id']."'AND subject_id='".$pageVal['subject_id']."'";
								$total_t_que     =  count_t_que($condtion_que);
								?> 
								<tr>
									<th><input  type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['subject_id'];?>" id="check-all" class="flat"></th>
									<td><?php echo $pageVal['subject_name'];?>
										<?php echo "<br>".anchor("adminzone/mock/view_question/".$pageVal['subject_id'],'Total Question ['. $total_t_que.']','class="refSection" '); ?>
									</td>
									<td><?php echo $pageVal['total_mark'];?></td>
									<td><?php echo $pageVal['total_que'];?></td>
									<td><?php echo ($pageVal['status']==1)? "Active":"In-active";?></td>
									<td>
										<?php
										if($this->editPrvg===TRUE)
										{
										?>
										<b> <?php echo anchor("adminzone/mock/edit_subject/".$pageVal['subject_id']."/".query_string(),'Edit'); ?></b>
										<?php
										}
										?>
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