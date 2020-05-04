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
						<h2><?php echo $heading_title; ?> List</small></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li>
								<?php //echo anchor("adminzone/student/add","Add Student ",'class="btn btn-primary" ' );?>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<?php  echo error_message(); ?>
						<?php echo form_open_multipart("adminzone/student/", 'class="form-horizontal form-label-left" ');?> 
						<table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
							<?php
							$atts = array(
							'width'      => '650',
							'height'     => '600',
							'scrollbars' => 'yes',
							'status'     => 'yes',
							'resizable'  => 'yes',
							'screenx'    => '0',
							'screeny'    => '0'
							);	
							if( count($pagelist) > 0 ) {
							?>
							<thead>
								<tr>
									<th>
										 <input class="flat" type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" />
									</th>
									<th>Name</th>
									<th>Email</th>
									<th>Password</th>
									<th>Reg. Date</th>
									<th>Course</th>
									<th>Status</th>
									<th>Update</th>
								</tr>
							</thead>
							<tbody>
								<?php  
								foreach($pagelist as $catKey=>$pageVal)
								{?> 
								<tr>
									<td>
										<input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['customers_id'];?>"id="check-all" class="flat">
									</td>
									<td><?php echo $pageVal['name'];?></td>
									<td><?php echo $pageVal['user_name'];?></td>
									<td><?php //echo $this->safe_encrypt->decode($pageVal['password']);?></td>
									<td><?php echo getDateFormat($pageVal['account_created_date'],7);?></td>
									<td><?php $lot = explode(",",$pageVal['lot']); 
											  for($i=0; $i<count($lot); $i++)
											  { 
												echo category($lot[$i]); 
												if($i<count($lot)-1)echo " ,";
											  }?></td>
									<td><?php echo ($pageVal['status']==1)? "Active":"In-active";?></td>
									<td>
										<?php
										if($this->editPrvg===TRUE)
										{
										?>
											<?php echo anchor("adminzone/student/edit/$pageVal[customers_id]/".query_string(),'Edit'); ?>
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
								<?php }?>
								</td>
							</tr>
							<?php } else{
								echo "<div class='ac b'> No record(s) found !</div>" ;
							}
							?>
						</table>
						<?php echo form_close();?>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>