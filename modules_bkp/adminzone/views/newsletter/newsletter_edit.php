<?php $this->load->view('includes/header');  ?>

      
    <div id="content">
    
    <div class="breadcrumb">  
    
 <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; 
<?php 
echo anchor('adminzone/newsletter','Back To Listing'); ?> &raquo;  <?php echo $heading_title; 

?>
     
    </div>      
    
    <div class="box">
    
    <div class="heading">
    
    <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
    
    <div class="buttons"> &nbsp; </div>
    
    </div>    
    
    <div class="content">
      <?php error_message();validation_message(); ?>
      
        <?php echo form_open(current_url_query_string());?>
        
        <table class="form"> 
         	<tr>
            <td valign="top">Name : <span class="required">*</span></td>
            <td><input type="text" name="subscriber_name" size="40" value="<?php echo set_value('subscriber_name',$catresult->subscriber_name);?>">
            
            </td>
          </tr> 
        	<tr>
            <td valign="top">Email : <span class="required">*</span></td>
            <td><input type="text" name="subscriber_email" size="40" value="<?php echo set_value('subscriber_email',$catresult->subscriber_email);?>"></td>
          </tr>  
          <tr>         
          <tr>
            <td align="left">&nbsp;</td>
            <td align="left">
              <input type="submit" name="sub" value="Edit Member" class="button2" />
             
              <input type="hidden" name="subscriber_id" value="<?php echo $catresult->subscriber_id;?>">
             
            </td>
          </tr>
        </table>
        <?php echo form_close(); ?>
      </div>
    </div>
<?php $this->load->view('includes/footer'); ?>