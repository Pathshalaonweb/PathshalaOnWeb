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
                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                  <thead>
                    <tr>
                      <th width="10%"> S.No.</th>
                        </th>
                      <th width="90%">Question</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;foreach($res as $key =>$val){ 
					$q = pathinfo($val['question'], PATHINFO_EXTENSION);  
					$ans = pathinfo($val['ans'], PATHINFO_EXTENSION); 
					$uans = pathinfo($val['user_ans'], PATHINFO_EXTENSION); 
					if($val['ans']==$val['user_ans']){
					?>
                    <tr >
                      <td rowspan='2'>Question <?php echo $i;?></td>
                      <td ><?php //echo $val['question'];?>
                        <?php   if($q =='jpg'||$q =='jpeg'||$q =='gif'||$q =='png')	 { ?>
                        <img src="<?php echo base_url();?>uploaded_files/question/<?php echo $val['question'];?>"style="width:200px;height:100px;" >
                        <?php }else{

							echo $val['question'];

						}	

								

								?></td>
                    </tr>
                    <tr>
                      <td ><?php //echo $val['user_ans'];?>
                        <?php   if($uans =='jpg'||$uans =='jpeg'||$uans =='gif'||$uans =='png')	 { ?>
                        <img src="<?php echo base_url();?>uploaded_files/option/<?php echo $val['user_ans'];?>" style="width:200px;height:100px;">
                        <?php }else{

							echo $val['user_ans'];

						}	

								

								?>
                        &nbsp;&nbsp;<i class="fa fa-check " style="color:green" aria-hidden="true" ></i></td>
                    </tr>
                    <?php } else if($val['ans']!=$val['user_ans'] && $val['user_ans'] !=''){?>
                    <tr  >
                      <td rowspan='2' >Question <?php echo $i;?></td>
                      <td ><?php //echo $val['question'];?>
                        <?php   if($q =='jpg'||$q =='jpeg'||$q =='gif'||$q =='png')	 { ?>
                        <img src="<?php echo base_url();?>uploaded_files/question/<?php echo $val['question'];?>" style="width:200px;height:100px;">
                        <?php }else{

							echo $val['question'];

						}	

								

								?></td>
                    </tr>
                    <tr>
                      <td ><?php //echo $val['ans'];?>
                        <?php   if($ans =='jpg'||$ans =='jpeg'||$ans =='gif'||$ans =='png')	 { ?>
                        <img src="<?php echo base_url();?>uploaded_files/option/<?php echo $val['ans'];?>" style="width:200px;height:100px;">
                        <?php }else{

							echo $val['ans'];

						}	

								

								?>
                        &nbsp;&nbsp;<i class="fa fa-check " style="color:green" aria-hidden="true" ></i><br>
                        <br>
                        <?php //echo $val['user_ans'];?>
                        <?php   if($uans =='jpg'||$uans =='jpeg'||$uans =='gif'||$uans =='png')	 { ?>
                        <img src="<?php echo base_url();?>uploaded_files/option/<?php echo $val['user_ans'];?>" style="width:200px;height:100px;">
                        <?php }else{

							echo $val['user_ans'];

						}	

								

								?>
                        &nbsp;&nbsp;<i class="fa fa-times " style="color:red" aria-hidden="true" ></i></td>
                    </tr>
                    <?php } else { ?>
                    <tr >
                      <td rowspan='2' >Question <?php echo $i;?></td>
                      <td ><?php //echo $val['question'];?>
                        <?php   if($q =='jpg'||$q =='jpeg'||$q =='gif'||$q =='png')	 { ?>
                        <img src="<?php echo base_url();?>uploaded_files/question/<?php echo $val['question'];?>" style="width:200px;height:100px;">
                        <?php }else{

							echo $val['question'];

						}	

								

								?></td>
                        </td>
                    </tr>
                    <tr >
                      <td ><?php //echo $val['ans'];?>
                        <?php   if($ans =='jpg'||$ans =='jpeg'||$ans =='gif'||$ans =='png')	 { ?>
                        <img src="<?php echo base_url();?>uploaded_files/option/<?php echo $val['ans'];?>" style="width:200px;height:100px;">
                        <?php }else{

							echo $val['ans'];

						}	

								

								?>
                        &nbsp;&nbsp;<i class="icon-circle-blank"></i></td>
                    </tr>
                    <?php } $i++;
												} ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</aside>
<?php $this->load->view("bottom_application");?>
