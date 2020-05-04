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
                  <th>Mock Test</th>
                  <th>Subject name</th>
                  <th>Currect Answer</th>
                  <th>Wrong Answer</th>
                  <th>Total Mark</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php 

									if(is_array($exam_res) && !empty($exam_res)){

									$i=$start_page;

									foreach($exam_res as $key =>$val)

									{ 

									$sel_q ="SELECT * FROM `tbl_mock_subject` where mock_id=".$val['mock_id'];

									$sub_res=$this->db->query($sel_q);				

									$list_sub=$sub_res->result_array();

									$count_row=count($list_sub);

									foreach($list_sub as $key1=>$val1)

									{

									$sel_q ="SELECT * FROM `tbl_mock_result` where exam_id='".$val['exam_id']."' and subject_id='".$val1['subject_id']."' and ans = user_ans  ";

									$fetch_cans=$this->db->query($sel_q);				

									$fetch_cans=$fetch_cans->result_array();		       		

									$currect_cans=count($fetch_cans);

									$sel_q ="SELECT * FROM `tbl_mock_result` where exam_id='".$val['exam_id']."' and subject_id='".$val1['subject_id']."' and ans != user_ans and user_ans != '' ";

									$fetch_wans=$this->db->query($sel_q);				

									$fetch_wans=$fetch_wans->result_array();		       		

									$currect_wns=count($fetch_wans);

									$sel_q ="SELECT * FROM `tbl_mock_result` where exam_id='".$val['exam_id']."'  and ans = user_ans  ";

									$fetch_tans=$this->db->query($sel_q);				

									$fetch_tans=$fetch_tans->result_array();		       		

									$currect_tans=count($fetch_tans);

									$sel_q ="SELECT * FROM `tbl_customers` where customers_id='".$val['userId']."'";

									$fetch_user=$this->db->query($sel_q);				

									$fetch_user=$fetch_user->result_array();		

									$user=$fetch_user[0];

									$sel_q ="SELECT * FROM `tbl_department` where category_id='".$user['lot']."'";

									$fetch_dept=$this->db->query($sel_q);				

									$fetch_dept=$fetch_dept->result_array();

									$dept=$fetch_dept[0];

									if($key1==0){ 					  

									?>
                <tr>
                  <td rowspan="<?php echo $count_row;?>"><?php echo $i;?></td>
                  <td rowspan="<?php echo $count_row;?>"> Name : <?php echo $user['first_name'];?><br>
                    E-mail : <?php echo $user['user_name'];?><br>
                    Mobile No. : <?php echo $user['phone_number'];?><br>
                    Department . : <?php echo $dept['category_name'];?><br></td>
                  <td rowspan="<?php echo $count_row;?>">Test <?php echo $val['subject_id'];?></td>
                  <td ><?php echo $val1['subject_name'];?></td>
                  <td ><?php echo $currect_cans;?></td>
                  <td ><?php echo $currect_wns;?></td>
                  <td rowspan="<?php echo $count_row;?>"><?php echo $currect_tans. '/' .$val['t_que'];?></td>
                  <td rowspan="<?php echo $count_row;?>"><?php echo $val['exam_date'];?></td>
                </tr>
                <?php } else{ ?>
                <tr>
                  <td><?php echo $val1['subject_name'];?></td>
                  <td><?php echo $currect_cans;?></td>
                  <td><?php echo $currect_wns;?></td>
                </tr>
                <?php }

									} $i++; }}?>
              </tbody>
            </table>
            <div class="pagination_links"> <?php echo $links; ?> </div>
          </div>
          <?php echo form_close();?> </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php $this->load->view('includes/footer'); ?>
