<!--Left-Part-Starts-->
<?php $mem_info=get_db_single_row('wl_customers',$fields="phone_number",$condition="WHERE 1 AND customers_id='".$this->session->userdata('user_id')."'");?>

<div class="col-xl-3 col-lg-8">
  <div class="sidebar-style">
    <div class="sidebar-search mb-40">
      <div class="sidebar-title mb-15">
        <h4>My Account</h4>
        <ul>
          <li><a href="<?php echo base_url();?>members/myaccount">Dashboard</a></li>
          <li><a href="<?php echo base_url();?>members/edit_account">Edit Account</a></li>
          <li><a href="<?php echo base_url();?>members/change_password">Change Password</a></li>
          <li><a href="<?php echo base_url();?>users/logout">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
