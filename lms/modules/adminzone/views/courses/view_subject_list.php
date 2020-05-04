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
              <li> <?php echo anchor("adminzone/courses/subject_add/".$category_id."","Add Subject",'class="btn btn-primary" ' );?> </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php error_message(); ?>
            <?php 

						$att=array('class'=>'form-horizontal form-label-left','name'=>'myform');

						echo form_open_multipart("adminzone/courses/subject/".$category_id."", $att);?>
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
              <thead>
                <tr>
                  <th><input class="flat" type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></th>
                  <th>courses name</th>
                  <th>Image</th>
                  <th>courses code</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

								foreach($res as $catKey=>$pageVal){

								$condtion_product   =  "AND subject_id='".$pageVal['courses_id']."'";

								$total_products     =  count_course_lession($condtion_product);?>
                <tr>
                  <td><input  type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['courses_id'];?>" id="check-all" class="flat"></td>
                  <td><?php echo $pageVal['courses_name'];?> <?php echo "<br>".anchor("adminzone/courses/lession/".$pageVal['courses_id'],'Lession ['. $total_products.']','class="refSection" '); ?></td>
                  <td align="center">
                    
                    <img src="<?php echo get_image('courses',$pageVal['image'],50,50,'AR');?>" />
                    
                     </td>
                  <td><?php echo $pageVal['courses_code'];?></td>
                  <td><?php echo $pageVal['price'];?></td>
                  <td><?php echo ($pageVal['status']==1)? "Active":"In-active";?></td>
                  <td><?php

										if($this->editPrvg===TRUE)

										{

										?>
                    <b> <?php echo anchor("adminzone/courses/subject_edit/".$pageVal['courses_id']."/".query_string(),'Edit'); ?></b>
                    <?php

										}																

										?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <table class="list" width="100%">
              <tr>
                <td align="left"  style="padding:2px" height="35"><?php

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

									?></td>
              </tr>
            </table>
            <?php echo form_close();?> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>
