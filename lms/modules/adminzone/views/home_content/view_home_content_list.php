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
                    <h2><?php echo $heading_title; ?> </small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                      <li>
                      <?php echo anchor("adminzone/home_content/add/","Add Home Content",'class="btn btn-primary" ' );?>
                      </li>
                      
                      
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                 <?php
		$pagesection = $this->config->item('bannersections'); 
		 $j=0;
		if( is_array($res) && !empty($res) )
		{
			echo form_open("adminzone/home_content/",'id="myform",class="form-horizontal form-label-left"');
			?>
                
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      
                         <thead>
                        <tr>
                          <th>
							 <th>
							 <input type="checkbox" class="flat" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" />							 			
						  </th>
                          <th>Content Titlle</th>
                          <th>Content Picture</th>
                          <th>Status</th>                         
                          <th>Action</th>                         
                        </tr>
                      </thead>


                      <tbody>
                       <?php  foreach($res as $catKey=>$pageVal)
		{ 
		?> 
                       
                        <tr>
                          <td>
							 <th><input type="checkbox" name="arr_ids[]" value="<?=$pageVal['content_id'];?>" id="check-all" class="flat"></th>
						  </td>
                          <td><?php echo $pageVal['content_title'];?></td>
                          <td> <?php
		 $j=1;
		 $product_path = "content/".$pageVal['content_image'];
		?> <a href="#"  onclick="$('#dialog_<?php echo $j;?>').dialog({width:'auto'});">View Image </a>
				  <div id="dialog_<?php echo $j;?>" title="Content Image" style="display:none;">
			      <img src="<?php echo base_url().'uploaded_files/'.$product_path;?>"  /> </div></td>
                         
                          <td><?php echo ($pageVal['status']==1)? "Active":"In-active";?></td>
                          <td> <?php echo anchor("adminzone/home_content/edit/$pageVal[content_id]/".query_string(),'Edit'); ?> </td>
                        
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
             <?php
    }
    else{
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
        <!-- /page content -->

   

<?php $this->load->view('includes/footer'); ?>