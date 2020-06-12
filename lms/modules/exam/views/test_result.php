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
                  <tbody>
                    <?php 
						if(is_array($exam_res) && !empty($exam_res))
						{
						$i=1;
						foreach($exam_res as $key =>$val)
						{ 
							$currect_cans=admin_currect_cans_count($val['exam_id'],$val['subject_id']);
							$currect_wns=admin_fetch_wans_count($val['exam_id'],$val['subject_id']);
							$currect_tans=admin_currect_tans_count($val['exam_id']);

						?>
                    <tr>
                      <td ><?php echo $i;?></td>
                      <td ><?php echo $val['mock_title'];?></td>
                      <td ><?php echo $val['subject_name'];?></td>
                      <td ><?php echo $currect_cans;?></td>
                      <td ><?php echo $currect_wns;?></td>
                      <td ><?php echo $currect_tans. '/' .$val['t_que'];?></td>
                      <td ><?php echo $val['exam_date'];?></td>
                      <td ><?php  echo anchor("exam/mock_view/".$val['exam_id']."/".query_string(),'View',array('class' => 'btn btn-success fr'));  ?></td>
                    </tr>
                    <?php 
					$i++; 
					}
					} else {?>
                    <tr>
                      <td colspan="9"><h3 align='center'> No Data Found !!! </h3></td>
                    </tr>
                    <?php 	 

										}  

										?>
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