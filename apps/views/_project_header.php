
<header class="header-area">
    <div class="header-bottom sticky-bar clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 col-4">
                    <div class="logo">
                        <a href="<?php echo base_url();?>">
                            <img alt="" src="<?php echo theme_url();?>images/logo_path.png">
                            <!-- <h3>Pathshala</h3>
                            <span>Study | Teach | Earn</span> -->
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-6 col-8">
                    <div class="menu-cart-wrap">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="<?php echo base_url()?>">HOME</a></li>
                                    <li><a href="<?php echo base_url();?>search">Search Tutor</a></li>
                                    
									<?php if($this->session->userdata('user_id') > 0 ){?>
                                    <li><a href="<?php echo base_url();?>members/myaccount">My Account</a></li>
                             		<?php }else{?>
                                     <li><a href="<?php echo base_url();?>users/login">Login</a></li>
                                	 <li><a href="<?php echo base_url();?>users/register">Register as Student</a></li>
                                    <?php }?>
                                    
									<?php if($this->session->userdata('teacher_id') > 0 ){?>
                                    <li><a href="<?php echo base_url();?>teacherdashboard/myaccount">My Account</a></li>
                                    <li><a href=""> Welcome <?php echo $this->session->userdata('first_name');?></a></li>
                                    <?php }else{?>
                                   
                                    <li><a href="<?php echo base_url();?>teacher/register">Register as Teacher</a></li>
                                    <?php }?>
                                </ul>
                            </nav>
                        </div>
                        <!-- <div class="cart-search-wrap">
                            <div class="cart-wrap">
                                <button class="icon-cart">
                                    <i class="fa fa-cart-plus"></i>
                                    <span class="count-style">02</span>
                                </button>
                                <div class="shopping-cart-content">
                                    <ul>
                                        <li class="single-shopping-cart">
                                            <div class="shopping-cart-img">
                                                <a href="#"><img alt="" src="<?php echo theme_url()?>img/cart/cart-1.png"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#">Color Box </a></h4>
                                                <h6>Qty: 02</h6>
                                                <span>$260.00</span>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fa fa-times-circle"></i></a>
                                            </div>
                                        </li>
                                        <li class="single-shopping-cart">
                                            <div class="shopping-cart-img">
                                                <a href="#"><img alt="" src="<?php echo theme_url()?>img/cart/cart-2.png"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#">Color Box </a></h4>
                                                <h6>Qty: 02</h6>
                                                <span>$260.00</span>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fa fa-times-circle"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-total">
                                        <h4>Shipping : <span>$20.00</span></h4>
                                        <h4>Total : <span class="shop-total">$260.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-btn">
                                        <a class="default-btn btn-hover" href="cart.html">view cart</a>
                                        <a class="default-btn btn-hover" href="checkout.html">checkout</a>
                                    </div>
                                </div>
                            </div>
                            <div class="header-search">
                                <button class="search-toggle">
                                    <i class="fa fa-search"></i>
                                </button>
                                <div class="search-content">
                                    <form action="#">
                                        <input type="text" placeholder="Search">
                                        <button>
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li><a href="<?php echo base_url();?>">HOME</a></li>
                            <li><a href="<?php echo base_url();?>pages/aboutus">About</a></li>
                            <li><a href="<?php echo base_url();?>search">Search Tutor</a></li>
                            <li><a href="<?php echo base_url();?>blog">Blog</a></li>
                            <?php if($this->session->userdata('user_id') > 0 ){?>
                                    <li><a href="<?php echo base_url();?>members/myaccount">My Account</a></li>
                             		<?php }else{?>
                                     <li><a href="<?php echo base_url();?>users/login">Login</a></li>
                                	 <li><a href="<?php echo base_url();?>users/register">Register as Student</a></li>
                                    <?php }?>
                                    <?php if($this->session->userdata('teacher_id') > 0 ){?>
                                    <li><a href="<?php echo base_url();?>teacherdashboard/myaccount">My Account</a></li>
                                    <li><a href=""> Welcome <?php echo $this->session->userdata('first_name');?></a></li>
                                    <?php }else{?>
                                   
                                    <li><a href="<?php echo base_url();?>teacher/register">Register as Teacher</a></li>
                                    <?php }?>
                            <li><a href="<?php echo base_url();?>contactus">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
