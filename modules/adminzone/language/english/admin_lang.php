<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



/*

|--------------------------------------------------------------------------

| Global

|--------------------------------------------------------------------------

*/



$lang['activate']             	= "Record has been activated successfully.";

$lang['deactivate']           	= "Record has been de-activated successfully.";

$lang['deleted']              	= "Record has been deleted successfully.";



$lang['successupdate']        	= "Record has been updated successfully.";



$lang['order_updated']        	= "The Selected Record(s) has been re-ordered.";

$lang['password_incorrect']   	= "The Old Password is incorrect";

$lang['recordexits']         	= "Record address already exists.";

$lang['success']              	= "Record added successfully.";

$lang['paysuccess']           	= "Payment added successfully.";

$lang['admin_logout_msg']     	= "Logout successfully ..";

$lang['admin_mail_msg']      	= "Mail sent Successfully...";

$lang['forgot_msg']           	= "Email Id does not exist in database";

$lang['admin_reply_msg']      	= "Enquiry reply sent Successfully...";

$lang['pic_uploaded']         	= 'Photos has been uploaded successfully.';

$lang['pic_uploaded_err']	  	= 'Please upload at least one photo.';

$lang['pic_delete']			  	= 'Photo has been deleted successfully.';



$lang['child_to_deactivate']  	=  "The selected record(s) has some sub-category/product.Please de-activate them first";

$lang['child_to_activate']   	=  "The selected record(s) has some sub-category/product.Please activate them first";

$lang['child_to_delete']      	=  "The selected record(s) has some sub-category/product.Please delete them first";



$lang['marked_paid']        	= "The selected record(s) has been marked as Paid";

$lang['payment_succeeded']  	= "The payment has been made successfully.";

$lang['payment_failed']     	= "The payment has been canceled.";

$lang['email_sent']	     		= "The Email has been sent successfully to the selected Users/Members.";

 

$lang['top_menu_list'] 			= array( "Dashboard"=>"adminzone/dashbord/",

"Courses Management"=>    array( 	//"Manage Subject"				=>	"adminzone/subjects/",
									//"Manage classes"				=>	"adminzone/classes",
									"Manage category"				=> "adminzone/category",

									

							 	),

  "Blog Management"=>   array(	"Blog Category"	=>	"adminzone/blogcategory",

  								"Blog Post"	=>	"adminzone/blog",

					  ),								

  "Members Management"=>   array(	"Manage Members"	=>	"adminzone/members"

					  

					  ),	

	 "Teacher Management"=>   array(	"Manage Teacher"	=>	"adminzone/teacher"),				   

					  	

  "Orders Management"     =>array(	"Manage Orders"		=>	"adminzone/orders/",
									//"Manage Shipping"   =>	"adminzone/shipping/" ,

									//"Manage Tax"   		=>	"adminzone/tax/" ,
									"Manage Plan"   		=>	"adminzone/plan/" ,

					   				"Manage student plan"	=>	"adminzone/studentplan/" ,  	                 

                      ),

					  

 /*"Newsletter" 			=>array( "Manage Newsletter"	=>	"adminzone/newsletter/" , 

					  			 //"Newsletter Groups"			    =>	"adminzone/newsletter_group" , 						                

                      ),

 */					  

 /*"Manage Forum"=>   array(	"Manage Forum"				=>	"adminzone/forum",

  							"Manage Gallery"			=>	"adminzone/gallery/",

							"Manage Viedeo"				=>	"adminzone/video/", 

  							 ),	

	*/				   					  

  "Other Management"  =>array("Static Pages"			=>	"adminzone/staticpages/", 

							   "Mail Contents"			=>	"adminzone/mailcontents/",  

							   "Enquiry/Feedback"		=>	"adminzone/enquiry/",  

							  // "Manage Banners"			=>	"adminzone/banners/",

							   "Manage Home Banner"		=>	"adminzone/slide_banner/",

							   "Manage CustomSearch"		=>	"adminzone/customsearch/", 

							   "Manage Review"				=>	"adminzone/Review/",

							   "Manage  Meta Tags"		=>	"adminzone/meta/",

							 "location setting"	 	=> "adminzone/location",
							 "coupons setting"	 	=> "adminzone/coupons",                          

							   "Admin Settings"			=>	"adminzone/setting/"                      

							  ),

 );		

 

 

$lang['top_menu_icon'] = array(   

  "Product Management"	=>"maintenance.png",

  "Blog Management"	=>"maintenance.png", 

  "Members Management"	=>"manage-sec.png",  					  	

  "Orders Management"	=>"order2.png",

  "Manage Forum"		=>"order2.png",

  "Newsletter"			=>"news-lt-.png",  

  "Other Management"	=>"management.png",

 );			  



/* Location: ./application/modules/adminzone/language/admin_lang.php */