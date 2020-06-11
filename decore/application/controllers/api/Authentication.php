<?php
@ob_start();
//session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!defined('BASEPATH')) exit('No direct script access allowed');
//Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';
class Authentication extends REST_Controller {
    public function __construct() { 
 	//ob_end_flush();
	
	
        parent::__construct();
       
        // Load the user model
        $this->load->model('user');
        
        print_r($_REQUEST);die;
			$this->db->select('admin_email,address,admin_type');
			$this->db->from('tbl_admin');
			$this->db->where('admin_id','1');		
			$query = $this->db->get();			
			if( $query->num_rows() > 0 )
			{
				$this->admin_info = $query->row(); 
				
			}	  
    }
    
    public function login_post() {
		
        // Get the post data
        $email = $this->post('email');
        $password = $this->post('password');
        
        // Validate the post data
        if(!empty($email) && !empty($password)){
            
            // Check if any user exists with the given credentials
            $con['returnType'] = 'single';
            $con['conditions'] = array(
                'user_name' => $email,
                'password'  =>$this->safe_encrypt->encode($this->input->post('password',TRUE)),
                'status'    => '1',
				'is_verified'=>'1',
            );
            $user = $this->user->getRows($con);
           //$sql= echo_sql();
            if($user){
                // Set the response and exit
                
                $this->response([
                    'status'    => "1",
                    'message'   => 'User login successful.',
                    'data'      => $user
                ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                //BAD_REQUEST (400) being the HTTP response code
                $a=array('key'=>'22');
              $arr=  $response=array(
                    'status' => "0",
                    'message' => "Wrong email or password.",
                    'data'=> $a,
                );
              echo json_encode($arr);  
				
            }
        }else{
            // Set the response and exit
            $arr=array('key'=>'22');
             $this->response(
				[
                    'status' => "0",
                    'message' => "Provide email and password.",
                    'data'=>$arr
                ]
				, REST_Controller::HTTP_OK);
            //$this->response("Provide email and password.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    
    public function registration_post() {
        // Get the post data
       
	    $first_name = strip_tags($this->post('first_name'));
        $email      = strip_tags($this->post('email'));
        $password   = $this->post('password');
        $phone      = strip_tags($this->post('phone'));
		$dob        = strip_tags($this->post('dob'));
        $country    = strip_tags($this->post('country'));
		
		// Validate the post data
        if(!empty($first_name) && !empty($dob) && !empty($email)&& !empty($country)  && !empty($password)){
            
        // Check if the given email already exists
            
            $con['returnType'] = 'count';
            
            $con['conditions'] = array(
                'user_name'     => $email,
               // 'phone_number'  => $phone,
            );
            $cons=array();
            $cons['conditions'] = array(
              //  'user_name'     => $email,
                'phone_number'  => $phone,
            );
            
             $param = array(    'status'=>'1',
                                'email'=>$email
                           );
             $userCount               = $this->user->get_members($param);	
             
             $param1 = array(    'status'=>'1',
                                 'phone_number'=>$phone
                           );
             $phoneCount               = $this->user->get_members($param1);
           // $userCount = $this->user->getRows($con);
          //  $phoneCount = $this->user->getRows($cons);
            
            
             if(count($phoneCount) >0){ 
                 $this->sms_for_allready_exits_phone($first_name,$phone);  
             }
             if(count($userCount) >0){
                 $this->sms_for_allready_exits_email($first_name,$phone,$email);
             }
            
            if(count($userCount) > 0 && count($phoneCount) > 0){
              
              //if email is exits
            
                $this->response([
                        'status' => "0",
                        'message' => 'The given email or phone number already exists.',
                        
                    ], REST_Controller::HTTP_OK);
                
                // Set the response and exit
               // $this->response(".", REST_Controller::HTTP_BAD_REQUEST);
            }else{
				
				$password = $this->safe_encrypt->encode($this->input->post('password',TRUE));
				
				$register_array = array
				( 					
					'user_name'         => $email,
					'password'          => $password,
					'first_name'        => $first_name,
					'last_name'         => $this->input->post('last_name',TRUE),
					'phone_number'      => $phone,
					'birth_date'     	=> $this->input->post('dob',TRUE),
					'country'			=> $this->input->post('country',TRUE),
					'actkey'            => md5($this->input->post('email',TRUE)),
					'account_created_date'=>$this->config->item('config.date.time'),
					'current_login'     => $this->config->item('config.date.time'),
					'status'			=> '0',
					'is_verified'		=> '0',		
					'ip_address' 	 	=> $this->input->ip_address()
					
				);
			$insert = $this->user->insert($register_array);
			$data = array( 
			   'last_id'=>$this->db->insert_id()
			   );
			  $this->session->set_userdata($data);
            
            //send otp to mobile 
				 $otp=rand('1111','9999');
				
				
				 $otp_data = array(
					'otp'  => $otp,
				  );
		    
		    $this->db->where('customers_id',$this->session->userdata('last_id'));
            $this->db->update('wl_customers', $otp_data);
            $data=$this->sms_for_otp($first_name,$phone,$otp);
            
                // Check if the user data is inserted
                if($insert){
                    // Set the response and exit
                  
                  /* $this->response([
                        'status'     => "1",
                        'message'    => "The user has been added successfully.",
                        'otp'        =>  "$otp",    
                        'customerId' => "$insert",
                        'data'=> []
                    ], REST_Controller::HTTP_OK);*/
                    
                }else{
                    // Set the response and exit
                   $this->response([
                        'status' => "0",
                        'message' => "Not added data.",
                        'data' => "$insert"
                    ], REST_Controller::HTTP_OK);
                }
            }
        }else{
            $this->response([
                        'status' => "0",
                        'message' => 'Provide complete user info to add.',
                        'data' => $insert
                    ], REST_Controller::HTTP_OK);
            // Set the response and exit
            //$this->response("Provide complete user info to add.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    

 function otp_verification_post()
	{
	    $otp = strip_tags($this->post('otp'));
	    $phone_number = strip_tags($this->post('phone_number'));
	    
			if($this->post('phone_number')!=""){
			  $otp_input = $this->post('otp',TRUE);	
			  $param = array(   
			                    'otp'          => $otp,
                                'phone_number' =>$phone_number
                           );
                  $mem_info               = $this->user->get_members($param);
                  
                //  print_r($mem_info);
				//  $mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND phone_number='".$phone_number."' AND otp='".$otp."'");
			
				   if($otp_input==$mem_info[0]['otp']){
					
					//update the tale value 	
						$update_data = array(
							'status'       => '1',
							'is_verified'  => '1',
						 );
						 
						
				//	$sql="UPDATE `wl_customers` SET status='1' , is_verified='1' where phone_number='".$phone_number."' ";
				 //   $update=	$this->db->query($sql);
					
                     $this->db->set('status','is_verified',false); 
			         $this->db->where('phone_number',$phone_number);
			         $this->db->where('otp',$otp);
                     $update=  $this->db->update('wl_customers', $update_data); 
							  
							  if($update) { 
							 // $mem_info               = $this->user->get_members($param);
								 $this->response([
    								'status'    =>  "1",
    								'message'   => 'The user has been added successfully.',
    								//'otp'     => $otp,
    								'data'      => $mem_info[0]
							], REST_Controller::HTTP_OK);
							}else{
							
									 $this->response([
										'status' => "0",
										'message' => "Wrong OTP",
									],
									REST_Controller::HTTP_BAD_REQUEST);
									
							}
					}
				
			}
	}				
			
	
	
	
	
    public function user_get($id = 0) {
        // Returns all the users data if the id not specified,
        // Otherwise, a single user will be returned.
        $con = $id?array('customers_id' => $id):'';
        $users = $this->user->getRows($con);
        
        // Check if the user data exists
        if(!empty($users)){
            
            $this->response([
                'status' =>  '1',
                'message' => 'success',
                'data'      => $users
            ], REST_Controller::HTTP_OK);    
                
                
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $arr=array('key'=>'22');
            $this->response([
                'status' =>  '0',
                'message' => 'No user was found.',
                'data'      => $arr
            ], REST_Controller::HTTP_OK);
        }
    }
    
   public function user_post() {
        
        $id = $this->post('customers_id');
        
        // Get the post data
       /* $first_name = strip_tags($this->put('first_name'));
        $last_name = strip_tags($this->put('last_name'));
        $email = strip_tags($this->put('email'));
        $password = $this->put('password');
        $phone = strip_tags($this->put('phone'));*/
		
		$first_name = strip_tags($this->post('first_name'));
        $gender = strip_tags($this->post('gender'));
        $birth_date = strip_tags($this->post('birth_date'));
		
		$country = strip_tags($this->post('country'));
		$birth_time = strip_tags($this->post('birth_time'));
		$birth_location = strip_tags($this->post('birth_location'));
		$state = strip_tags($this->post('state'));
		$city = strip_tags($this->post('city'));
		$address = strip_tags($this->post('address'));
		
        // Validate the post data
        if(!empty($first_name)  && !empty($country) && !empty($gender) && !empty($birth_date)){
        
        
            // Update user's account data
            $userData = array();
            if(!empty($first_name)){
                $userData['first_name'] = $first_name;
            }
			if(!empty($birth_location)){
                $userData['birth_location'] = $birth_location;
            }
			if(!empty($state)){
                $userData['state'] = $state;
            }
			if(!empty($city)){
                $userData['city'] = $city;
            }
			
			if(!empty($birth_time)){
                $userData['birth_time'] = $birth_time;
            }
			
			
			if(!empty($gender)){
                $userData['gender'] = $gender;
            }
			if(!empty($birth_date)){
                $userData['birth_date'] = $birth_date;
            }
			
			
			 if(!empty($phone)){
                $userData['country'] = $country;
            }
			
			if(!empty($address)){
                $userData['address'] = $address;
            }
			
            $update = $this->user->update($userData, $id);
            
            $con = $id?array('customers_id' => $id):'';
            $users = $this->user->getRows($con);
            // Check if the user data is updated
            if($update){
                // Set the response and exit
                $this->response([
                    'status' => "1",
                    'message' => 'Your password has been sent to your Registered Email Id.',
                    'data'    => $users,
					//'sql' => $this->db->last_query(),
				//	'id' =>$id
                ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                $this->response(
                    [
                    'status' => "0",
                    'message' => "Some problems occurred, please try again.",
                    'data'    => $users,
				] , REST_Controller::HTTP_OK);
            }
        }else{
            // Set the response and 
            $arr=array('key'=>'22');
           $this->response(
                    [
                    'status' => "0",
                    'message' => "Some problems occurred, please try again.",
                    'data'   => $arr
				] , REST_Controller::HTTP_OK);
        }
    }
	
	
public function forgotten_password_post()
	{
	  $email = $this->input->post('email',TRUE);
	  //AND password='".$this->safe_encrypt->encode($old_password)."'\
	  
	 $condtion = array('field'=>"user_name,password,first_name,last_name",'condition'=>"user_name ='$email' AND status ='1' ");
	 $res = $this->user->find('wl_customers',$condtion);
	  if( is_array($res) && !empty($res)) {
	       
	                    $first_name  = $res['first_name'];
						$last_name   = $res['last_name'];	
						$username    = $res['user_name'];	
						$password    = $res['password'];
						$password = $this->safe_encrypt->decode($password);					
						/* Send  mail to user */
						
						$content    =  get_content('wl_auto_respond_mails','2');		
						$subject    =  $content->email_subject;						
						$body       =  $content->email_content;	
											
						$verify_url = "<a href=".base_url()."users/login>Click here </a>";				
												
						$name = $first_name;
											
						$body			=	str_replace('{mem_name}',$name,$body);
						$body			=	str_replace('{username}',$username,$body);
						$body			=	str_replace('{password}',$password,$body);
						$body			=	str_replace('{admin_email}',$this->admin_info->admin_email,$body);
						$body			=	str_replace('{site_name}',$this->config->item('site_name'),$body);
						$body			=	str_replace('{url}',base_url(),$body);
						$body			=	str_replace('{link}',$verify_url,$body);
						
						$mail_conf =  array(
    						'subject'=>$subject,
    						'to_email'=>$username,
    						'from_email'=>$this->admin_info->admin_email,
    						'from_name'=> $this->config->item('site_name'),
    						'body_part'=>$body
						);	
							
					$this->dmailer->mail_notify($mail_conf);
	      
	      $this->response(
                    [
                    'status' => "1",
                    'message' => "The user info has been send to email successfully.",
               	] , REST_Controller::HTTP_OK);  
	   }else{
	       
	      // Set the response and 
           
           $this->response(
                    [
                    'status' => "0",
                    'message' => "Some problems occurred, please try again.",
                    
				] , REST_Controller::HTTP_OK); 
	       
	       
	   }
	}
	
	public function change_password_post(){
		$id = $this->uri->segment('4');
		
		$old_password = $this->post('old_password');
		$new_password = $this->post('new_password');
		$conf_password = $this->post('conf_password');
		// Validate the post data
		
        if(!empty($old_password) && !empty($new_password) && !empty($conf_password) ){
		
		//checking the old password	
		$query = $this->db->query("SELECT * FROM wl_customers where status='1' AND customers_id='".$id."' AND password='".$this->safe_encrypt->encode($old_password)."'");
		if($query->num_rows() >0){
			//match password
			if($conf_password===$new_password){
			
			if(!empty($new_password)){
                $userData['password'] = $this->safe_encrypt->encode($this->input->post('new_password',TRUE));
            }
			$update = $this->user->update($userData, $id);
				if($update){
                // Set the response and exit
                $this->response([
                    'status' => "1",
                    'message' => 'password  updated successfully.',
				 ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                $this->response([
                    'status' => "0",
                    'message' => 'Some problems occurred, please try again.',
				 ], REST_Controller::HTTP_OK);
               // $this->response("", REST_Controller::HTTP_BAD_REQUEST);
            }
			
			//if new and conform password not match
			}else{
				  $this->response([
                     'status' => "0",
                     'message' => 'old password and new password not Match.'
					], REST_Controller::HTTP_OK);
			}
			
		//if old password not match
		}else{
			       $this->response([
                     'status' => '0',
                     'message' => 'old password not valid.'
					], REST_Controller::HTTP_OK);
		}
			
			
			
			
			
			
			/*if(!empty($new_password)){
                $userData['password'] = $this->safe_encrypt->decode($this->input->post('new_password',TRUE));
            }
			$update = $this->user->update($userData, $id);
            
            // Check if the user data is updated
            if($update){
                // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'The user info has been updated successfully.',
					'sql' => $this->db->last_query(),
					'id' =>$id
                ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }*/
			
		}else{
            // Set the response and exit
            $this->response("Provide Password.", REST_Controller::HTTP_BAD_REQUEST);
        }
		
		
		
	}
	
	
	
public function astro_post(){
	
	     $config['upload_path']   = '../uploaded_files/'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
         $config['max_size']      = 1000; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 1024;  
         $this->load->library('upload', $config);
		 
		 if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors()); 
          
		   $this->response([
                    'status' => TRUE,
                    'message' => 'no no',
                    'data' => $error
                ], REST_Controller::HTTP_OK);
         }
			
         else { 
            $data = array('upload_data' => $this->upload->data()); 
           $this->response([
                    'status' => TRUE,
                    'message' => 'successful.',
                    'data' => $data
                ], REST_Controller::HTTP_BAD_REQUEST);
         } 	
	
	
	
	
	}
	
public function sms_for_otp($first_name,$phone_number,$otp){
	
$loginID="SEOINDIA";
$password="123123";
$coding="0";
$from='astrop';
$text='Hello '.$first_name.',Please Use this '.$otp.' OTP for verifying your mobile number with Astropatrika';
$texts=urlencode($text);
$data="username=".$loginID."&password=".$password."&from=".$from."&to=".$phone_number."&text=".$texts."&coding=".$coding;
$url = "http://49.50.67.32/smsapi/httpapi.jsp?".$data;//die;

/*
http://49.50.67.32/smsapi/httpapi.jsp?username=SEOINDIA&password=Seo@31#&from=SEOIND&to=7503066930&text=hello+world&flash=1*/
//echo $url;
// create a new cURL resource

	$ch = curl_init();
        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        // grab URL and pass it to the browser
        curl_exec($ch);
        curl_close($ch);
		
	return true;					
//__________________________sms end___________________________
}
	
public function sms_for_thanku_post(){

$phone_number=$this->post('phone');
$first_name=$this->post('first_name');
//$user_name=$this->post('user_name');


$loginID="SEOINDIA";
$password="123123";
$coding="0";
$from='astrop';
$text='Dear '.$first_name.',
Thank You for connecting with Astropatrika your registerd Mobile Number is
'.$phone_number.' to help call on this Number (+91) 9116077772 and you can email us customer@astropatrika@gmail.com';

$texts=urlencode($text);
$data="username=".$loginID."&password=".$password."&from=".$from."&to=".$phone_number."&text=".$texts."&coding=".$coding;
$url = "http://49.50.67.32/smsapi/httpapi.jsp?".$data;//die;

/*
http://49.50.67.32/smsapi/httpapi.jsp?username=SEOINDIA&password=Seo@31#&from=SEOIND&to=7503066930&text=hello+world&flash=1*/
//echo $url;
// create a new cURL resource

	$ch = curl_init();
        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        // grab URL and pass it to the browser
        curl_exec($ch);
        curl_close($ch);
		
	return true;					
//__________________________sms end___________________________
}

public function sms_for_allready_exits_phone($first_name,$phone_number){
	
$loginID="SEOINDIA";
$password="123123";
$coding="0";
$from='astrop';
$text='Hello '.$first_name.',The given  Phone number already exists with Astropatrika';
$texts=urlencode($text);
$data="username=".$loginID."&password=".$password."&from=".$from."&to=".$phone_number."&text=".$texts."&coding=".$coding;
$url = "http://49.50.67.32/smsapi/httpapi.jsp?".$data;//die;

/*
http://49.50.67.32/smsapi/httpapi.jsp?username=SEOINDIA&password=Seo@31#&from=SEOIND&to=7503066930&text=hello+world&flash=1*/
//echo $url;
// create a new cURL resource

	$ch = curl_init();
        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        // grab URL and pass it to the browser
        curl_exec($ch);
        curl_close($ch);
		
	return true;					
//__________________________sms end___________________________
}


public function sms_for_allready_exits_email($first_name,$phone_number,$email){
	
$loginID="SEOINDIA";
$password="123123";
$coding="0";
$from='astrop';
$text='Hello '.$first_name.',The given  EmailID already exists with Astropatrika';
$texts=urlencode($text);
$data="username=".$loginID."&password=".$password."&from=".$from."&to=".$phone_number."&text=".$texts."&coding=".$coding;
$url = "http://49.50.67.32/smsapi/httpapi.jsp?".$data;//die;

/*
http://49.50.67.32/smsapi/httpapi.jsp?username=SEOINDIA&password=Seo@31#&from=SEOIND&to=7503066930&text=hello+world&flash=1*/
//echo $url;
// create a new cURL resource

	$ch = curl_init();
        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        // grab URL and pass it to the browser
        curl_exec($ch);
        curl_close($ch);
		
	return true;					
//__________________________sms end___________________________
}




}