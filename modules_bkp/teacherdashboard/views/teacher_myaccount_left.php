<?php $mem_info=get_db_single_row('wl_teacher',$fields="first_name,is_verified,current_credit,profile_edit,plan_expire,email_verify",$condition="WHERE 1 AND teacher_id='".$this->session->userdata('teacher_id')."'");?>
<div class="col-xl-3 col-lg-8">
  <div class="sidebar-style">
    <div class="sidebar-search mb-40">
      <div class="sidebar-title mb-15">
        <h4>My Account</h4>
        <ul>
          <li><a href="<?php echo base_url();?>teacherdashboard/myaccount">Dashboard</a></li>
          <li><a href="<?php echo base_url();?>teacherdashboard/profile">Add Profile</a></li>
          <li><a href="<?php echo base_url();?>teacherdashboard/edit_account">Edit Account</a></li>
          <li><a href="<?php echo base_url();?>teacherdashboard/credit">Current Credit 
          <span style="color:#F00;">(<?php echo ($mem_info['current_credit']==0)?"0":$mem_info['current_credit'];?>)</span></a></li>
          <li><a href="<?php echo base_url();?>teacherdashboard/credit/history/">Credit History</a></li>
          <li><a href="<?php echo base_url();?>teacherdashboard/change_password">Change Password</a></li>
          <li><a href="<?php echo base_url();?>teacher/logout">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
