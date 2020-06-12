<?php $this->load->view("top_application");?>
<div class="event-area my-acc pt-20 pb-130">
  <div class="container">
    <div class="row">
      <?php $this->load->view("myaccount_left");?>
      <div class="col-xl-9 col-lg-4">
        <div class="blog-all-wrap mr-40">
          <div class="col-lg-9 col-md-12 ml-auto mr-auto">
            <div class="login-register-wrapper">
              <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg1">
                <h4> Edit Profile Information </h4>
                </a> </div>
              <div class="tab-content">
                <div id="lg1" class="tab-pane active">
                  <div class="login-form-container">
                    <div class="login-register-form">
                  	<?php echo validation_message();?>
					<?php echo error_message(); ?>
          <form action="<?php echo base_url(); ?>members/edit_account" enctype="multipart/form-data" method="post" accept-charset="utf-8" onsubmit ="return validate()">
                    <input type="text" name="first_name" placeholder="Name" value="<?php echo set_value('first_name',$mres['first_name']); ?>">
                    <input type="text" name="phone_number" placeholder="Phone" value="<?php echo set_value('phone_number',$mres['phone_number']); ?>">
                    <div class="file">
                      <label for="files">Upload photo</label>
                      <input type="file" id="files" class="" name="userimage"/>
                    </div>
                    
                    <?php $class_dropdown = $mres['class_dropdown'];
                    //$db2 = $this->load->database('default', TRUE);
                     $sql2="SELECT * FROM `wl_categories`  WHERE `category_id` = '$class_dropdown'";
                            $query=$this->db->query($sql2);
                            $row=$query->result_array();
                            //print_r($row);
                           $parent_id = $row[0]['parent_id'];
                      
                     ?>
                     <select name="category" id="category" required>
                       <?php 
                       $sqll="SELECT * FROM `wl_categories`  WHERE `category_id` = '$parent_id'";
                       $queryy=$this->db->query($sqll);
                            $roww=$queryy->result_array();
                       ?>
                       <!-- <option value ="<?php //echo $roww[0]['category_id'] ?>" selected="selected"><?php //echo $roww[0]['category_name'];?> </option> -->
                       <?php
                         $sql="SELECT * FROM `wl_categories`  where status='1' AND parent_id='0' ORDER BY sort_order";
                         $querys=$this->db->query($sql);
                         if($row[0]['category_id'] == "")
                         {?>
                         <option value=""selected="selected" disabled>Please Select a Category</option>
                         <?php }
                         foreach($querys->result_array() as $val):
                          if($val['category_id'] == $roww[0]['category_id'])
                          {
                       ?>
                       <option value="<?php echo $val['category_id']?>" selected="selected"><?php echo $val['category_name']; ?></option>
                          <?php } else {?>
                       <option value="<?php echo $val['category_id']?>"><?php echo $val['category_name']; ?></option>
                          <?php }?>
                         <?php endforeach; ?>
                     </select>
                      <select name="classes" id="classes">
                     <option value="<?php echo $class_dropdown; ?>" selected="selected"><?php echo $row[0]['category_name']; ?></option>
                      </select>
                      <div class="requried" id="classeserror" style="display:none; color:red;">Please Select an Option.</div>
                    <textarea placeholder="Address" name="address"><?php echo set_value('address',$mres['address']);?></textarea>
                    <input type="text" name="pincode" placeholder="pincode" value="<?php echo set_value('pincode',$mres['pincode']);?>">
                    <textarea placeholder="Description" name="description"> <?php echo set_value('description',$mres['description']);?></textarea>
                  
                	<div class="button-box">
                      <button class="default-btn" type="submit"><span>Update</span></button>
                    </div>
                  </form>
                </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("bottom_application");?>
<style>.button-box {
    text-align: center;
}</style>
  <script type="text/javascript">
$(document).ready(function(){
    $('#category').on('change',function(){
    var categoryID = $(this).val();
    $("#subject").val("");
	$("#wait").css("display", "block");
	//searchFilter();
    if(categoryID){
       $.ajax({
          type:'POST',
            url:'<?php echo base_url();?>search/getSubcat',
              data:'category_id='+categoryID,
               success:function(html){
                   $('#classes').html(html);
					$("#wait").css("display", "none");
               }
            }); 
        }else{
          $('#city').html('<option value="">Select Category</option>'); 
        }
    });
 });
</script>
<script>
  function validate()
  {
    var x = document.getElementById("classes").value;
    if(x=='' || x=='377' || x=='373' || x=="374" || x=='375' || x== '530' || x== '432' || x== '376' || x== '526')
    {
      //alert('Select class ');
      document.getElementById("classeserror").style.display = "block";
      
      return false;
    }
  }
</script> 