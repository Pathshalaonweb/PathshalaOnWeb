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
								<?php echo anchor("adminzone/meta/post/","Post Meta Tag",'class="btn btn-primary" ' );?>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<!----------------------content------------------->
					<div class="x_content">
						<?php echo form_open("adminzone/meta/",'id="myform"');?>
						<table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
							<thead>
								<tr>
									<th>
										<th><input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></th>
									</th>
									<th>URL</th>
									<th>Page Name</th>
									<th>Meta Details</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								if(is_array($pagelist) && !empty($pagelist))
								{
								foreach($pagelist as $catKey=>$pageVal){
								?> 
								<tr>
									<td>
										<th><input  type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['meta_id'];?>" id="check-all" ></th>
									</td>
									<td> <?php echo base_url().$pageVal['page_url'];?></td>
									<td><?php echo $pageVal['page_url'];?></td>
									<td><p> <strong> Tile  : </strong> <?php echo $pageVal['meta_title'];?> </p>
										<p> <strong> Keyword  : </strong> <?php echo$pageVal['meta_keyword'];?> </p>
										<p> <strong> Description   : </strong> <?php echo $pageVal['meta_description'];?></p>
									</td>
									<td>
									<?php
									if($this->editPrvg===TRUE)
									{
									?>
									<?php echo anchor("adminzone/meta/edit/".$pageVal['meta_id']."/".query_string(),'Edit'); ?>
									<?php
									}
									?>
									</td>
								</tr>
								<?php 
								} 
								}?>
							</tbody>
						</table>
						<table class="list" width="100%">
							<tr>
								<td align="left"  style="padding:2px" height="35">
									<?php
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
					<!--------------------End Of Content-------------->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->
<?php $this->load->view('includes/footer'); ?>