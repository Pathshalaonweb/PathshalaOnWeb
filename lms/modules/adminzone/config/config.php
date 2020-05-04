<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*

|--------------------------------------------------------------------------

| Global

|--------------------------------------------------------------------------

*/

$config['site_admin']              = "LMS Administrator";

$config['site_admin_name']         = "LMS";



$config['category.best.image.view']= "( File should be .jpg, .png, .gif format and file size should not be more then 2 MB (2048 KB)) ( Best image size 195X150 )";



$config['product.best.image.view'] = "( File should be .jpg, .png, .gif format and file size should not be more then 2 MB (2048 KB)) ( Best image size 390X305 )";



$config['news.best.image.view']   = "( File should be .jpg, .png, .gif format and file size should not be more then 2 MB (2048 KB)) ( Best image size 200X110 )";



$config['pagesize']                = "10000";

$config['total_product_images']    = "4";



$config['adminPageOpt']            = array(       

                                            $config['pagesize'],

                                            2*$config['pagesize'],

                                            3*$config['pagesize'],

                                            4*$config['pagesize'],

                                            5*$config['pagesize']											

                                    );

											



$config['bannersz']                =  array(

                                                'Top'=>"940x173",

                                                'Left'=>"200x200",

                                                'Bottom'=>"940x120",

                                                'Footer'=>'480x190'

                                            );	



$config['bannersections']          = array(

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

                                            //'testimonials'=>'Testimonials',

                                            'faq'=>'FAQ',

                                            'sitemap'=>'Sitemap',

                                            /*'video'=>'Video',

                                            'wholesale inquiry'=>'Wholesale Inquiry'*/

                                        );	



$config['admin_groups']          =  array(

                                        '2'=>"Half Admin Rights",

                                        '3'=>"Low Admin Rights",

                                    );											



/* End of file account.php */

/* Location: ./application/modules/sitepanel/config/sitepanel.php */