<!--Left-Part-Starts-->
<?php $mem_info=get_db_single_row('wl_customers',$fields="phone_number,login_type",$condition="WHERE 1 AND customers_id='".$this->session->userdata('user_id')."'");?>

<div class="col-xl-3 col-lg-8">
  <div class="sidebar-style">
    <div class="sidebar-search mb-40">
      <div class="sidebar-title mb-15">
        <h4>My Account</h4>
        <ul>
          
          <li><a href="<?php echo base_url();?>members/myaccount">Dashboard</a></li>
          <li><a href="<?php echo base_url();?>members/edit_account">Edit Account</a></li>
          <li><a href="<?php echo base_url();?>lms">My Lms</a></li>
          <li><a href="<?php echo base_url();?>members/liveclass" target="_blank">Live Classes</li>
          <li><a href="javascript:void(0)"><?php if(!empty($mem_info['credit_point'])){echo "Wallet/Credit History :<strong>".$mem_info['credit_point']."</strong>";}else{echo "Wallet/Credit History :<strong>00:00</strong>";}?></a></li>
          <li><a href="<?php echo base_url();?>members/credit">Buy Subscription</a></li>
          <!--<li><a href="<?php echo base_url();?>members/edit_account">Transaction History </a></li>-->
          
          <?php if($mem_info['login_type']!='facebook'){?>
          <li><a href="<?php echo base_url();?>members/change_password">Change Password</a></li>
          <?php }?>
          <!--<li><a href="<?php echo base_url();?>users/logout">Pathshala LMS</a></li>-->
          <li><a href="<?php echo base_url();?>users/logout">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
