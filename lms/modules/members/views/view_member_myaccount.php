<?php $this->load->view("top_application");?>
<?php $this->load->view("project_left");?>

<aside class="right-side">
  <div class="content-wrapper" style="min-height: 620px;">
    <section class="content">
      <section class="content-header">
        <h1><b>My Profile</b></h1>
        <br>
      </section>
      <div class="row">
        <div class="col-md-5"> 
          
          <!-- Profile Image -->
          <div class="box box-primary red_bordr">
            <div class="box-body box-profile">
              <?php if($res['customer_photo']!=''){ ?>
              <img class="profile-user-img img-responsive img-circle ml100 " src="<?php echo base_url();?>uploaded_files/custumer_profile/<?php echo $res['customer_photo']; ?>" alt="User profile picture" style="width:138px;height: 132px;">
              <?php } else{ ?>
              <img class="profile-user-img img-responsive img-circle ml100 " src="<?php echo theme_url();?>img/user.png" alt="User profile picture" style="width:138px;height: 132px;">
              <?php } ?>
              <?php echo form_open_multipart('members/change_image', 'class="form-horizontal ", id="target" ');?>
              <label class="text-muted text-center change_pic profile_pic ml100 mt10"style="color:blue ;cursor:pointer" > Change Profile Picture
                <input type="file" name="img" style="display: none;"id="file" class="form-control">
              </label>
              <?php echo form_close(); ?>
              <h6 class="restrict_img ml80">(Please upload image below 1MB)</h6>
              <h3 class="profile-username text-center"><?php echo $res['first_name']; ?></h3>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item"> <b>Email-ID</b> <a class="pull-right"><?php echo $res['user_name']; ?></a> </li>
                <li class="list-group-item"> <b>Phone Number</b> <a class="pull-right"><?php echo $res['phone_number']; ?></a> </li>
                <li class="list-group-item"> <b>DOB</b> <a class="pull-right"><?php echo $res['birth_date']; ?></a> </li>
                <li class="list-group-item"> <b>Department</b> <a class="pull-right"><?php echo category($res['lot']); ?></a> </li>
                <li class="list-group-item"> <b>Test Language</b> <a class="pull-right">ENGLISH</a> </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box box-primary red_bordr">
            <div class="box-header"></div>
            <?php error_message(); ?>
            <?php //validation_message();?>
            <?php echo form_open_multipart('members/myaccount','class="form-horizontal user_profile"');?>
            <input type="hidden" name="user_id" value="54088">
            <div class="form-group">
              <label for="inputName" class="col-sm-3 control-label" style="text-align: center;">First Name</label>
              <div class="col-sm-9">
                <input type="text" name="first_name" class="form-control" id="inputName" maxlength="20" placeholder="First Name" value="<?php echo set_value( 'first_name',$res['first_name']);?>" required>
                <span style="color:red;"><?php echo form_error('first_name');?></span> </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-3 control-label" style="text-align: center;">Last Name</label>
              <div class="col-sm-9">
                <input type="text" name="last_name" class="form-control" value="<?php echo set_value( 'last_name',$res['last_name']);?>"placeholder="Last Name" id="inputName" value="Pandey">
                <span style="color:red;"><?php echo form_error('last_name');?></span> </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-3 control-label" style="text-align: center;">Date Of Birth</label>
              <div class="col-sm-9">
                <input type="date" name="birth_date" class="form-control hasDatepicker" id="datepicker" placeholder="Date of birth" value="<?php echo set_value('birth_date',$res['birth_date']);?>">
                <span style="color:red;"><?php echo form_error('birth_date');?></span> </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-3 control-label" style="text-align: center;">Phone Number</label>
              <div class="col-sm-9">
                <input type="text" id="update_number" name="phone_number" pattern="[789][0-9]{9}" maxlength="10" class="form-control" placeholder="Phone Number" value="<?php echo set_value( 'phone_number',$res['phone_number']);?>" required>
                <span style="color:red;"><?php echo form_error('phone_number');?></span> </div>
            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-3 control-label" style="text-align: center;">Email Id</label>
              <div class="col-sm-9">
                <input type="text" name="email" class="form-control" id="inputName" placeholder="Email Id" value="<?php echo set_value('email',$res['user_name']);?>">
                <span style="color:red;"><?php echo form_error('email');?></span> </div>
            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-3 control-label" style="text-align: center;">Gender</label>
              <div class="col-sm-9">
                <select name="gender" class="form-control">
                  <option value="">Select</option>
                  <option value="M" <?php  if(set_value('gender',$res['gender'])=='M'){ echo "selected"; }?>>Male</option>
                  <option value="F" <?php  if(set_value('gender',$res['gender'])=='F'){ echo "selected"; }?>>Female</option>
                </select>
                <span style="color:red;"><?php echo form_error('gender');?></span> </div>
            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-3 control-label" style="text-align: center;">State</label>
              <div class="col-sm-9">
                <select class="form-control" name="state" onChange="gettown(this.value);">
                  <option value="">Select State</option>
                  <?php 		
						$list_state = $this->student_model->get_state(array('parent_id'=>'0'));
						if(is_array($list_state) && !empty($list_state)){
				  ?>
                  <?php foreach($list_state as $state) {?>
                  <option id="<?php echo $state['category_id'];?>" value="<?php echo $state['category_id'];?>" <?php if($state['category_id']==set_value('state',$res['state'])){ echo "selected";}?>><?php echo ucfirst($state['category_name']);?></option>
                  <?php } }?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-3 control-label" style="text-align: center;">City </label>
              <div class="col-sm-9">
                <select class="form-control" name="city" id="subdiv">
                  <option value="">Select City</option>
                  <?php $list_city = $this->student_model->get_state(array('parent_id'=>$res['state'])); 

								if(is_array($list_city) && !empty($list_city)){ ?>
                  <?php foreach($list_city as $city) {?>
                  <option id="<?php echo $city['category_id'];?>" value="<?php echo $city['category_id'];?>" <?php if($city['category_id']==set_value('city',$res['city'])){ echo "selected";}?>><?php echo ucfirst($city['category_name']);?></option>
                  <?php } }?>
                </select>
              </div>
            </div>
            <script type = 'text/javascript'>

						function gettown(DistrictId)

						{

							var strUrl = '<?php echo base_url(); ?>users/ajaxgettown/';

							$.ajax({

									url:'<?php echo base_url(); ?>users/ajaxgettown/',

									type:'post',

									data:'data='+DistrictId,

									success:function(data)

									{

									$('#subdiv').html(data);

									}

							});

						}

						</script>
            <div class="form-group"> 
              
              <!-- <div class="col-sm-offset-4 col-sm-7"> -->
              
              <div class="col-sm-offset-4 col-sm-7 puul-left">
                <input type="submit" name="sub" value="update"class="btn btn-danger" style="width: 133px;">
              </div>
            </div>
            <br>
            <?php echo form_close();?> </div>
        </div>
      </div>
    </section>
    <form id="change_profile_image" enctype="multipart/form-data" onsubmit="myFunction(event)">
      <input type="hidden" name="user_id" value="54088">
      <input type="file" id="file" name="profile_picture" style="visibility:hidden;">
    </form>
  </div>
</aside>
<?php $this->load->view("bottom_application");?>
<script type="text/javascript" >

 $('#file').change(function() {

  $('#target').submit();

});

</script> 