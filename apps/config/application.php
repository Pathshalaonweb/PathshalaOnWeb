<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['bottom.debug'] = 0;
$config['site.status']	= '1';
$config['site_name']	= 'www.pathshala.co';

$config['auth.password_min_length']	= '6';
$config['auth.password_force_numbers']	= '0';
$config['auth.password_force_symbols']	= '0';
$config['auth.password_force_mixed_case']	= '0';


$config['allow.imgage.dimension']	= '3000x3000';
$config['allow.file.size']	        = '2048'; //In KB



$config['allow_discount_option'] = 1;

$config['config.date.time']	= date('Y-m-d H:i:s');
$config['config.date']	    = date('Y-m-d');

$config['analytics_id']	    = 'UA-38999330-1';

$config['no_record_found'] = "No record(s) Found !";

$config['course_set_as_config'] = array(''=>"course Set As",
//'hot_product'=>'Hot product',
'featured_course'=>'Featured course',
'new_arrival'=>'New arrival');


$config['course_unset_as_config']	= array(''=>"course Unset As",
//'hot_product'=>'Hot product',
'featured_course'=>'Featured course',
'new_arrival'=>'New arrival');

$config['user_title'] =  array(""=>"Select","Mr."=>"Mr.","Miss."=>"Miss.");


$config['login_invalid']            = "Invalid Username/Password. ";

$config['register_thanks']            = "Thanks for registering with <site_name>. We look forward to serving you. ";

$config['register_thanks_activate']   = "Thanks for registering with <website name>.Please Check your mail account to activate your account on the <website name>. ";


$config['enquiry_success']              = "Your enquiry has been submitted successfully.We will revert back to you soon.";
$config['feedback_success']             = "Your Feedback has been submitted successfully.We will revert back to you soon.";
$config['product_enquiry_success']      = "Your product enquiry  has been submitted successfully.We will revert back to you soon.";
$config['product_referred_success']     = "This product has been referred to your friend successfully.";
$config['site_referred_success']        = "Site has been referred to your friend successfully.";
$config['forgot_password_success']      = "Your password has been send to your email address.Please check your email account.";

$config['exists_user_id']              = "Email id  already exists. Please use different email id.";
$config['email_not_exist']             = "Email id does not exist.";


$config['newsletter_subscribed']           =  "You have been subscribed successfully for our newsletter service.";
$config['newsletter_already_subscribed']   =  "You are already a subscribed member  of our newsletter service.";
$config['newsletter_unsubscribed']         =  "You have been unsubscribed from our newsletter service.";
$config['newsletter_not_subscribe']        =  "You are not the subscribe member of our news letter service.";




$config['testimonial_post_success']     = "Thank you for your testimonial to <site_name>. Your message will be posted after review by the <site_name> team.";

$config['news_post_success']     		= "Thank you for your news to <site_name>. Your message will be posted after review by the <site_name> team.";


$config['advertisement_request']          = "Your advertisement request has been submitted successfully.We will revert back to you soon.";
$config['myaccount_update']               = "Your account information has been updated successfully.";
$config['myaccount_password_changed']     = "Password has been changed successfully.";
$config['myaccount_password_not_match']   = "Old Password does  not match.Please try again.";
$config['member_logout']                  = "Logout successfully.";


$config['wish_list_add']               = "Product has been added to your wish list successfully.";
$config['wish_list_delete']            = "Product has been deleted from your wishlist.";
$config['wish_list_product_exists']    = "This product already exists in your wish list.";



$config['cart_add']                  =  "Product has been added to your Shopping Cart.";
$config['cart_quantity_update']      =  "Product quantity has been updated successfully.";
$config['cart_product_exist']        =  "Product is already exist in your cart.";
$config['cart_delete_item']          =  "Product(s) has been deleted successfully.";
$config['cart_empty']                 =  "Cart has been cleared successfully.";
$config['cart_available_quantity']   =  "Maximum available quantity  is <quantity>.You can not add  more then available Quantity.";

$config['shipping_required']         =  "Shipping selection is required.";
$config['payment_success']           =  "Thank you for shopping with us. Your transaction is successful.";
$config['payment_failed']            =  "Your transaction is failed due to some technical error.";


//define('PAYTM_ENVIRONMENT', 'TEST'); // PROD
//define('PAYTM_MERCHANT_KEY', 'ykn7cp@#88bJqUDB'); //Change this constant's value with Merchant key downloaded from portal
//define('PAYTM_MERCHANT_MID', 'YujMhL03972177885084'); //Change this constant's value with MID (Merchant ID) received from Paytm
define('PAYTM_ENVIRONMENT', 'PROD'); // PROD
//define('PAYTM_MERCHANT_KEY', 'ykn7cp@#88bJqUDB'); //Change this constant's value with Merchant key downloaded from portal
define('PAYTM_MERCHANT_KEY', 'S4JDQ0zzWQD#L9b5');
define('PAYTM_MERCHANT_MID', 'Brainc37420521939759'); //Change this constant's value with MID (Merchant ID) received from Paytm
define('PAYTM_MERCHANT_WEBSITE', 'WEBSITE'); //Change this constant's value with Website name received from Paytm

/*$PAYTM_DOMAIN = "pguat.paytm.com";
if (PAYTM_ENVIRONMENT == 'PROD') {
	$PAYTM_DOMAIN = 'secure.paytm.in';
}

define('PAYTM_REFUND_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/REFUND');
define('PAYTM_STATUS_QUERY_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/TXNSTATUS');
define('PAYTM_STATUS_QUERY_NEW_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/getTxnStatus');
define('PAYTM_TXN_URL', 'https://'.$PAYTM_DOMAIN.'/oltp-web/processTransaction');*/

$PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
if (PAYTM_ENVIRONMENT == 'PROD') {
	$PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
	$PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
}
define('PAYTM_REFUND_URL', '');
define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
