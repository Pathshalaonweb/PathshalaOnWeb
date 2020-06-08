<?php $this->load->view('includes/header'); ?>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<!-- page content -->

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
              <li> <?php echo anchor("adminzone/department/add/$parent_id","Add $heading_title",'class="btn btn-primary" ' );?> </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php  echo error_message(); ?>
            <?php echo form_open("adminzone/department/",'id="data_form"');?>
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
              <thead>
                <tr>
                  <th><input class="flat" type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);"/></th>
                  <th>Name</th>
                  <th>Display Order</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php

								if(is_array($res) && ! empty($res))

								{

								?>
                <?php 	

								foreach($res as $catKey=>$pageVal)

								{ 

									$imgdisplay=FALSE;		

									$displayorder       = ($pageVal['sort_order']!='') ? $pageVal['sort_order']: "0";								

									$condtion_product   =  "AND department_id='".$pageVal['category_id']."'";

									$total_products     =  count_subject($condtion_product);

								?>
                <tr>
                  <td><input type="checkbox" name="arr_ids[]"class="flat" value="<?php echo  $pageVal['category_id'];?>" />
                    <input type="hidden" name="department_count" value="Y" />
                    <input type="hidden" name="product_count" value="Y" /></td>
                  <td><?php echo $pageVal['category_name'];?>
                    <?php

									if($total_products>0)

									{

										echo "<br><br>".anchor("adminzone/department/subject/".$pageVal['category_id'],'Subject ['. $total_products.']','class="refSection" ' );

									}else

									{

										echo "<br>".anchor("adminzone/department/subject/".$pageVal['category_id'],'Subject ['. $total_products.']','class="refSection" ');

									}

									?></td>
                  <td><label style="display:none"><?php echo $displayorder;?></label>
                    <input type="text" name="ord[<?php echo $pageVal['category_id'];?>]" value="<?php echo $displayorder;?>" size="2" /></td>
                  <td><?php echo ($pageVal['status']==1)? "Active":"In-active";?></td>
                  <td><?php

										if($this->editPrvg===TRUE)

										{

										?>
                    <?php echo anchor("adminzone/department/edit/$pageVal[category_id]/".query_string(),'Edit'); ?>
                    <?php

										}

										?></td>
                </tr>
                <?php } }?>
              </tbody>
            </table>
            <?php  if(is_array($res) && ! empty($res)){ ?>
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

									if($this->orderstatusPrvg===TRUE)

									{

									?>
                  <input name="update_order" type="submit"  value="Update Order" class="button2" />
                  <?php

									}

									?></td>
              </tr>
            </table>
            <?php echo form_close(); }?> </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /page content -->

<?php $this->load->view('includes/footer'); ?>
