<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$this->load->view('includes/header'); ?>

<div id="content">
<div class="breadcrumb"> <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; <?php echo $heading_title;?> </div>
<div class="box">
  <div class="heading">
    <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons">
    <?php echo form_open("adminzone/teacher/excel",'id="search" method="get"');?>
    <input type="hidden" name="keyword" value="<?php echo @$_GET['keyword']?>">
    <input type="hidden" name="status" value="<?php echo @$_GET['status']?>">
    <input type="submit" name="submit" class="button" value="Export As Excel">
     <?php echo form_close(); ?>
    </div>
  </div>
  <div class="content">
    <div class="required"> <strong> Total Record(s) Found : <?php echo $total_rec; ?></strong> </div>
    <?php   echo form_open("adminzone/teacher",'id="search_form" method="get" ');    ?>
    <div align="right" class="breadcrumb"> Records Per Page : <?php echo display_record_per_page();?> </div>
    <table width="100%"  border="0" align="center" cellspacing="3" cellpadding="3">
      <?php 
	 if(error_message() !=''){
               	   echo error_message();
                }
     ?>
      <tr>
        <td width="52%" align="right" ><strong>Search </strong> [ Name,Email ]
          <input name="keyword" type="text" value="<?php echo trim($this->input->get_post('keyword'));?>" size="35"  />
          &nbsp;</td>
        <td width="9%" align="center" ><select name="status">
            <option value="">Status</option>
            <option value="1" <?php echo $this->input->get_post('status')==='1' ? 'selected="selected"' : '';?>>Active</option>
            <option value="0" <?php echo $this->input->get_post('status')==='0' ? 'selected="selected"' : '';?>>In-active</option>
          </select></td>
        <td width="39%" align="left" ><a  onclick="$('#search_form').submit();" class="button"><span>GO </span></a>&nbsp;
          <?php
            if( $this->input->get_post('keyword')!='' || $this->input->get_post('status')!='' )
            {             
			   echo anchor("adminzone/teacher/",'<span>Clear Search</span>');
            }
            ?></td>
      </tr>
    </table>
    <?php   echo form_close();     ?>
    <?php  echo form_open("adminzone/teacher/",'id="data_form"');?>
    <table class="list" width="100%" id="my_data">
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
				
    if( count($pagelist) > 0 )
    {
      ?>
      <thead>
        <tr>
          <td width="31" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></td>
          <td width="200" class="left">Name</td>
          <td width="170" class="left">Email</td>
          <td width="148" class="left">Password</td>
          <td width="148" class="left">Image</td>
          <td width="100" class="left">Display Home</td>
          <td width="148" class="left">Account Approved</td>
          <td width="174" align="center" >Reg. Date </td>
          <td width="100" class="center">Status</td>
        </tr>
      </thead>
      <tbody>
     <?php
      foreach($pagelist as $catKey=>$pageVal)
      {
		//  print_r($pageVal);
        ?>
        <tr>
          <td style="text-align: center;"><input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['teacher_id'];?>" /></td>
          <td class="left"><?php echo $pageVal['name'];?> <br />
            <?php echo anchor_popup('adminzone/teacher/details/'.$pageVal['teacher_id'], 'View Details!', $atts);?></td>
          <td class="left"><?php echo $pageVal['user_name'];?></td>
          <td class="left"><?php echo $pageVal['password'];?></td>
          <td class="center"><img src="<?php echo get_image('teacher',$pageVal['picture'],50,50,'AR');?>" /></td>
          <td class="center">
          <?php if($pageVal['display_home']=='0'){?>
          <a onclick="return confirm('Are you sure to Display <?php echo $pageVal['name'];?> at Home page?')" href="<?php echo base_url();?>adminzone/teacher/yes/<?php echo $pageVal['teacher_id'];?>">NO</a>
          <?php }else{?>
          <a onclick="return confirm('Are you sure to REmove Display <?php echo $pageVal['name'];?> at Home page?')" href="<?php echo base_url();?>adminzone/teacher/no/<?php echo $pageVal['teacher_id'];?>"><span style="color:#F00;">YES</span></a>
          <?php }?>
          </td>
          <td class="center">
          <?php if($pageVal['account_approved']=='0'){?>
          <a onclick="return confirm('Are you sure to Display <?php echo $pageVal['name'];?> at Search page?')" href="<?php echo base_url();?>adminzone/teacher/account_approved_yes/<?php echo $pageVal['teacher_id'];?>">NO</a>
          <?php }else{?>
          <a onclick="return confirm('Are you sure to REmove Display <?php echo $pageVal['name'];?> at Search page?')" href="<?php echo base_url();?>adminzone/teacher/account_approved_no/<?php echo $pageVal['teacher_id'];?>"><span style="color:#F00;">YES</span></a>
          <?php }?>
          </td>
          <td class="center"><?php echo getDateFormat($pageVal['account_created_date'],7);?></td>
          <td class="center"><?php echo ($pageVal['status']=='1')?"Active":"Inactive";?></td>
        </tr>
        <?php
      }
      ?>
        <tr>
          <td colspan="7" align="right" height="30"><?php echo $page_links; ?></td>
        </tr>
        <tr>
          <td colspan="6" align="left" style="padding:5px"><input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
            <input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>
            <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]','delete','Record');"/></td>
        </tr>
      </tbody>
      <?php
    }
    else{
      echo "<div class='ac b'> No record(s) found !</div>" ;
    }
    ?>
    </table>
    <?php echo form_close(); ?> </div>
</div>
<?php $this->load->view('includes/footer'); ?>
