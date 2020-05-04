<?php $this->load->view("top_application");?>
<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-3 pt-100 pb-95" style="background-image:url(<?php echo theme_url();?>img/bg/breadcrumb-bg-5.jpg);">
        <div class="container">
            <h2>My Account</h2>
            <!--p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .</p-->
        </div>
    </div>
    <div class="breadcrumb-bottom">
        <div class="container">
            <ul>
                <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-double-right"></i>My Account</span></li>
            </ul>
        </div>
    </div>
</div>
<div class="event-area my-acc pt-20 pb-130">
    <div class="container">
        <div class="row">
            <?php $this->load->view("myaccount_left");?>
            <div class="col-xl-9 col-lg-4">
                <div class="blog-all-wrap mr-40">
                   <h3> Hello, <?php echo $this->session->userdata('first_name');?></h3>
<!--p>
From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p-->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">var Page='inner';</script>
<?php $this->load->view("bottom_application");?>