<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Global
|--------------------------------------------------------------------------
*/

$config['site_admin']              = "New Setup Administrator Area";
$config['site_admin_name']         = "New Setup";

$config['category.best.image.view']         = "( File should be .jpg, .png, .gif format ) ( Best image size 163X131 )";

$config['product.best.image.view']          = "(File should be .jpg, .png, .gif format ) ( Best image size 400X322)";



$config['site_admin_name']         = "New Setup";
$config['pagesize']                = "10";
$config['total_product_images']    = "4";


$config['adminPageOpt']            = array(       
											$config['pagesize'],
											2*$config['pagesize'],
											3*$config['pagesize'],
											4*$config['pagesize'],
											5*$config['pagesize']											
											);
											
											
	

$config['bannersz'] =  array(
'Bottom1'=>"312x104",
'Bottom2'=>"312x104",
'Bottom3'=>"312x104"
);	

$config['bannersections'] = array(
'category'=>"Category",
'subcategory'=>"Subcategory",
'product'=>"Product",
'login'=>"Login",
'register'=>"Registration",
'myaccount'=>"My Account",
'search'=>'Search',
'cart'=>"Cart",
'checkout'=>"Checkout",
'static'=>'Static Pages',
'testimonials'=>'Testimonials',
'faq'=>'FAQ',
'sitemap'=>'Sitemap',
'video'=>'Video',
'wholesale inquiry'=>'Wholesale Inquiry'
);											



/* End of file account.php */
/* Location: ./application/modules/adminzone/config/adminzone.php */