<?php $this->load->view('includes/header'); ?>

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
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php error_message(); ?>
            <?php $att=array('class'=>'form-horizontal form-label-left','name'=>'myform');

			echo form_open_multipart("", $att);?>
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
              <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Student </th>
                  <th>Subject name</th>
                  <th>Lession</th>
                  <th>Currect Answer</th>
                  <th>Wrong Answer</th>
                  <th>Total Mark</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php 
					if(is_array($exam_res) && !empty($exam_res)){
					$i=1;
					//echo "<pre>"; print_r($exam_res); 
					foreach($exam_res as $key => $val)
					{  
					$fetch_les = $this->department_model->fetch_lession_by_id(array('lession_id'=>$val['lession_id']));
					$fetch_les = $fetch_les[0];
					$fetch_sub = $this->department_model->fetch_subject(array('subject_id'=>$fetch_les['subject_id']));
					$fetch_sub = $fetch_sub[0];
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
					$db2 = $this->load->database('database2', TRUE);
					$sel_q ="SELECT * FROM `wl_customers` where customers_id='".$val['userId']."'";
					$fetch_user=$db2->query($sel_q);				
					$fetch_user=$fetch_user->result_array();		
					$user=$fetch_user[0];
					$sel_q ="SELECT * FROM `tbl_department` where category_id='".$user['lot']."'";
					$fetch_dept=$this->db->query($sel_q);				
					$fetch_dept=$fetch_dept->result_array();
					$dept=$fetch_dept[0];
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td>Name : <?php echo $user['first_name'];?><br>
                    E-mail : <?php echo $user['user_name'];?><br>
                    Mobile No. : <?php echo $user['phone_number'];?><br>
                    Department . : <?php echo $dept['category_name'];?><br></td>
                  <td><?php echo $fetch_sub['subject_name'];?></td>
                  <td><?php echo $fetch_les['lession'];?></td>
                  <td><?php echo $currect_ans;?></td>
                  <td><?php echo $currect_wns; ?></td>
                  <td><?php echo $currect_ans;?>/<?php echo $fetch_tque;?></td>
                  <td><?php echo $val['exam_date'];?></td>
                </tr>
                <?php $i++; } }?>
              </tbody>
            </table>
            <?php echo form_close();?> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<?php $this->load->view('includes/footer'); ?>
