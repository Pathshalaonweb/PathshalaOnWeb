<?php $this->load->view('includes/header'); ?>

<div id="content">
<div class="breadcrumb"> <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; <?php echo $heading_title; ?> </a> </div>
<div class="box">
  <div class="heading">
    <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons"> <?php echo anchor("adminzone/language/language_add/",'<span>Add language</span>','class="button" ' );?></div>
    <div class="buttons"> <?php echo anchor("adminzone/language/word_add/",'<span>Add Word</span>','class="button" ' );?></div>
  </div>
  <script type="text/javascript">function serialize_form() { return $('#pagingform').serialize(); } </script>
  <div class="content">
    <?php 
	 echo form_open("adminzone/language/",'id="search_form" method="get"');?>
    <div align="right" class="breadcrumb"> Records Per Page : <?php echo display_record_per_page();?> </div>
    <table width="100%"  border="0" cellspacing="3" cellpadding="3" >
      <?php 
                if(error_message() !=''){
               	   echo error_message();
                }
                ?>
      <tr>
        <td align="center" >Search (<span class="left">Question</span>)
          <input type="text" name="keyword" value="<?php echo $this->input->get_post('keyword');?>"  />
          &nbsp; <a  onclick="$('#search_form').submit();" class="button"><span> GO </span></a>
          <?php	
					 if( $this->input->get_post('keyword')!='' )
					 { 
					    echo anchor("adminzone/language/",'<span>View All</span>');
					 }
					 ?></td>
      </tr>
    </table>
    <?php echo form_close();?>
    <?php 
	     if( is_array($pagelist) && !empty($pagelist) )
		 {
		  //echo form_open("adminzone/language/",'id="data_form" ');
		 
		 ?>
    <table class="list" width="100%" id="my_data">
      <thead>
        <tr>
          <td width="21" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></td>
          <td width="150" class="left">Word</td>
          <?php 
		    $fields = $this->db->list_fields('language');
			foreach($fields as $field){
				if($field !== 'word' && $field !== 'word_id'){
					      echo "<td>".$field."</td>";
					}
				}
		   ?>
          <td width="22" class="center">Action</td>
        </tr>
      </thead>
      <tbody>
        <?php 
		 foreach($res as $catKey=>$pageVal){ 							
		 ?>
        <?php echo form_open("adminzone/language/updateword/".$pageVal['word_id'],
					   array("id"=>"myForm".$pageVal['word_id'])); ?>
        <tr>
          <td style="text-align: center;"><input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['word_id'];?>" /></td>
          <td class="left"><?php 
		 echo $pageVal['word'];
		 // echo"<pre>";*/
		  //print_r($pageVal);
		   $fields = $this->db->list_fields('language');
		   $i=1;
		   foreach ($fields as $field){
						if($field !== 'word' && $field !== 'word_id'){?>
          <td><input type="text" name="translation<?php echo $i; ?><?php echo $pageVal['word_id'];?>" value="<?php echo $pageVal[$field];?>">
            <input type="hidden" name="lang" value="<?php echo $field; ?>" /></td>
          <?php $i++; }
			}
		   ?>
            </td>
          <!--<td class="center"><input type="text" name="ord[<?php echo $pageVal['word_id'];?>]" 
          value="<?php echo $pageVal['word_id'];?>" size="2"  />
          </td>-->
          <td class="center">
            <a href="#" onclick="document.getElementById('myForm<?php echo $pageVal['word_id'];?>').submit();">Submit</a>
          Delete
            <?php //echo anchor("adminzone/language/edit/$pageVal[word_id]/".query_string(),'Edit'); ?></td>
        </tr>
        <?php echo form_close();?>
        <?php
		   }		  
		  ?>
        <tr>
          <td colspan="18" align="right" height="30"><?php echo $page_links; ?></td>
        </tr>
      </tbody>
      <tr>
        <td align="left" colspan="18" style="padding:2px" height="35"><!--<input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
          <input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>
          <input name="update_order" type="submit" class="button2" id="Delete" value="Update Order"  />
          <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]','delete','Record');"/>
          
          <input type="button" value="Click Me!" onclick="submitForms()" />--></td>
      </tr>
    </table>
    <?php //echo form_close();
	 }else{
	    echo "<center><strong> No record(s) found !</strong></center>" ;
	 }
	?>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>
<script>
submitForms = function(){
    document.getElementById("form").submit();
    document.getElementById("form2").submit();
	  document.getElementById("form3").submit();
	    document.getElementById("form4").submit();
		  document.getElementById("form5").submit();
		    document.getElementById("form6").submit();
}
</script>