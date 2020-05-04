<?php $this->load->view("top_application");?>
<?php $this->load->view("project_left");?>
<aside class="right-side">
<script>
$(function(){
    $('#download').hide();
});
</script>
<section class="content" id="main" style="display:block;  ">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">         
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="mock_tab" style="margin: 26px 26px 26px 26px;" >
						<div class="list_test">
							<h2><?php echo $crs_mat['lession']; ?></h2>
							<?php echo $crs_mat['courses_description']; ?>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</aside>
<?php $this->load->view("bottom_application");?>