<header><?php $this->load->view('top_application'); ?></header>
<?php $mem_info = get_db_single_row('wl_customers', $fields = "*", $condition = "WHERE 1 AND customers_id='" . $this->session->userdata('user_id') . "'"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
</head>
<style>
	/*custom font*/
	@import url(https://fonts.googleapis.com/css?family=Montserrat);

	/*basic reset*/
	* {
		margin: 0;
		padding: 0;
	}

	header {
		height: 100px;
		width: 100%;

	}

	.container-fluid {
		margin-top: 30px;
		margin-bottom: 700px;
	}

	html {
		height: 100%;


	}

	body {

		font-family: montserrat, arial, verdana;
		width: 100%;
		height: 100%;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;

	}

	.leftfile {
		float: left;
		width: 50%;
		height: 300px;
	}

	.leftfile img {
		width: 100%;
		height: 600px;
	}

	.container {
		float: right;
		width: 50%;
	}

	/*form styles*/
	#msform {

		width: 500px;
		margin: 50px auto;
		text-align: center;
		position: relative;
		border-radius: 20px;
	}

	#msform fieldset {
		float: right;
		background: white;
		border: 0 none;
		border-radius: 3px;
		box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
		padding: 20px 30px;
		box-sizing: border-box;
		width: 80%;
		margin: 0 10%;

		/*stacking fieldsets above each other*/
		position: relative;
	}

	/*Hide all except first fieldset*/
	#msform fieldset:not(:first-of-type) {
		display: none;
	}

	/*inputs*/
	#msform input,
	#msform textarea {
		padding: 15px;
		border: 1px solid #ccc;
		border-radius: 3px;
		margin-bottom: 10px;
		width: 100%;
		box-sizing: border-box;
		font-family: montserrat;
		color: #2C3E50;
		font-size: 13px;
	}

	/*buttons*/
	#msform .btn-hover {
		width: 100px;
		background: #E98580;
		font-weight: bold;
		color: white;
		border: 0 none;
		border-radius: 1px;
		cursor: pointer;
		padding: 10px 5px;
		margin: 10px 5px;
	}

	#msform .btn-hover:hover,
	#msform .btn-hover:focus {
		box-shadow: 0 0 0 2px white, 0 0 0 3px #E98580;
	}

	/*headings*/
	.fs-title {
		font-size: 15px;
		text-transform: uppercase;
		color: #2C3E50;
		margin-bottom: 10px;
	}

	.fs-subtitle {
		font-weight: normal;
		font-size: 13px;
		color: #666;
		margin-bottom: 20px;
	}

	/*progressbar*/
	#progressbar {
		margin-bottom: 30px;
		overflow: hidden;
		/*CSS counters to number the steps*/
		counter-reset: step;
	}

	#progressbar li {
		list-style-type: none;
		color: white;
		text-transform: uppercase;
		font-size: 9px;
		width: 50%;
		float: left;
		position: relative;
	}

	#progressbar li:before {
		content: counter(step);
		counter-increment: step;
		width: 20px;
		line-height: 20px;
		display: block;
		font-size: 10px;
		color: #333;
		background: white;
		border-radius: 3px;
		margin: 0 auto 5px auto;
	}

	/*progressbar connectors*/
	#progressbar li:after {
		content: '';
		width: 100%;
		height: 2px;
		background: white;
		position: absolute;
		left: -50%;
		top: 9px;
		z-index: -1;
		/*put it behind the numbers*/
	}

	#progressbar li:first-child:after {
		/*connector not needed before the first step*/
		content: none;
	}

	/*marking active/completed steps green*/
	/*The number of the step and the connector before it = green*/
	#progressbar li.active:before,
	#progressbar li.active:after {
		background: #E98580;
		color: white;
	}
	@media screen and (max-width:600px){
		.leftfile{
			float:none;
			height:0px;
		}
		.leftfile img{
			display:none;
		}
		.container{
			float:none;
		}
	#msform {
		hegith: auto;
		width: 400px;
		margin: 50px auto;
		text-align: center;
		position: relative;
		border-radius: 20px;
	}

	
	}
</style>

<body>
	<div class="container-fluid">
		<div class="leftfile">
			<img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/pay.jpg" />
		</div>
		<div class="container">
		<form action="<?php echo base_url();?>courses/paymentStoreCredit" id="msform" method="post">
			<!-- multistep form -->
			<!-- progressbar -->
						<ul id="progressbar">
							<li class="active">Basic Info</li>
							<li>Your Plan </li>
						</ul>
						<!-- fieldsets -->
						<fieldset>
							<h2 class="fs-title">Basic Information</h2>
							<input type="text" name="name" value="<?php echo $mem_info['first_name']; ?>">
							<input type="text" name="phone" value="<?php echo $mem_info['phone_number']; ?>" required>
							<input type="text" name="email" value="<?php echo $mem_info['user_name']; ?>">
							<textarea name="address" required><?php echo $mem_info['address']; ?></textarea>
							<input type="button" name="next" class="next btn-hover" value="Next" />
						</fieldset>
			<?php 
				      $price	  =  $res['price'];
					  $discount	  ="00:00 ";	 
				 	  $tax_res    =  get_db_single_row($fld='wl_tax','tax_rate,tax_type',$Condwherw="WHERE tax_id='1'");
					  $tax_amount=$tax_res['tax_rate']*$res['price']/100;
					  $totalAmount=$res['credit_price'];
					
				?>
						<fieldset>
									<h2 class="fs-title">Your Purchase</h2>
									Course
									<input type="text" name="course" placeholder="<?php echo $res['courses_name'] ?>" disabled />
									Amount
									<input type="number" name="amount" placeholder="<?php echo $res['credit_price']?>" disabled />
									Total Payable
									<input type="number" name="net_amount" value="<?php echo $res['credit_price']?>" disabled />
									Net Payable
									<input type="number" name="net_amount" value="<?php echo $res['credit_price']?>" disabled />
									<input type="button" name="previous" class="previous btn-hover" value="Previous" />
									<!--<input type="submit" name="submit" class="submit action-button" value="Submit" />-->
									<div class="Place-order mt-25">
            <?php if($mem_info['credit_point'] < round($totalAmount)){?>
            	 you don't have sufficient Credit Points
                <a href="<?php echo base_url();?>members/credit"><strong>Click Here</strong></a> To Buy Subscription
            <?php } else{?>
              <input type="submit" class="btn-hover"  value="Pay Now">
             <?php }?> 
            </div>
									<div class="payment-method">
                <div class="payment-accordion element-mrg"> </div>
              </div>
            
            </fieldset>
								<input type="hidden" name="pay_method" value="StoreCredit">
                  <input type="hidden" name="ammount" value="<?php echo round($totalAmount);?>">
                  <input type="hidden" name="discount_amount" value="<?php echo round($discountAmount);?>">
                  <input type="hidden" name="courses_id" value="<?php echo $res['courses_id'];?>">
							

						</form>
						</div>
						</div>
						</body>
<//?php $this->load->view('bottom_application'); ?>

<script>
	//jQuery time
	var current_fs, next_fs, previous_fs; //fieldsets
	var left, opacity, scale; //fieldset properties which we will animate
	var animating; //flag to prevent quick multi-click glitches

	$(".next").click(function() {
		if (animating) return false;
		animating = true;

		current_fs = $(this).parent();
		next_fs = $(this).parent().next();

		//activate next step on progressbar using the index of next_fs
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

		//show the next fieldset
		next_fs.show();
		//hide the current fieldset with style
		current_fs.animate({
			opacity: 0
		}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50) + "%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({
					'transform': 'scale(' + scale + ')',
					'position': 'absolute'
				});
				next_fs.css({
					'left': left,
					'opacity': opacity
				});
			},
			duration: 800,
			complete: function() {
				current_fs.hide();
				animating = false;
			},
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	});

	$(".previous").click(function() {
		if (animating) return false;
		animating = true;

		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();

		//de-activate current step on progressbar
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

		//show the previous fieldset
		previous_fs.show();
		//hide the current fieldset with style
		current_fs.animate({
			opacity: 0
		}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale previous_fs from 80% to 100%
				scale = 0.8 + (1 - now) * 0.2;
				//2. take current_fs to the right(50%) - from 0%
				left = ((1 - now) * 50) + "%";
				//3. increase opacity of previous_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({
					'left': left
				});
				previous_fs.css({
					'transform': 'scale(' + scale + ')',
					'opacity': opacity
				});
			},
			duration: 800,
			complete: function() {
				current_fs.hide();
				animating = false;
			},
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	});

	$(".submit").click(function() {
		return false;
	})
</script>

</html>
