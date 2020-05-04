<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Astro_login extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user model
        $this->load->model('astro');
    }
    
    public function login_post() {
        // Get the post data
        $astro_phone = $this->post('phone');
        $password = $this->post('password');
        
        // Validate the post data
        if(!empty($astro_phone) && !empty($password)){
            
            // Check if any user exists with the given credentials
            $con['returnType'] = 'single';
            $con['conditions'] = array(
                'astro_phone' => $astro_phone,
                'password' =>$this->post('password'),
                'status' => '1',
			//	'is_verified'=>'1',
            );
            $user = $this->astro->getRows($con);
          // $sql= echo_sql();
            if($user){
                // Set the response and exit
                $this->response([
                    'status' => 1,
                    'message' => 'User login successful.',
                    'data' => $user
                ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                //BAD_REQUEST (400) being the HTTP response code
                $this->response(
				[
                    'status' => 0,
                    'message' => "Wrong email or password.",
                    
                ]
				
				, REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            // Set the response and exit
            $this->response(
                
                [
                    'status' => 0,
                    'message' => "Provide username and password.",
                    
                ]
                ,
            
            
            REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
   
    public function user_get($id = 0) {
        // Returns all the users data if the id not specified,
        // Otherwise, a single user will be returned.
        $con = $id?array('customers_id' => $id):'';
        $users = $this->user->getRows($con);
        
        // Check if the user data exists
        if(!empty($users)){
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response($users, REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => FALSE,
                'message' => 'No user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
   public function user_post() {
        $id = $this->uri->segment('4');
        
        // Get the post data
       /* $first_name = strip_tags($this->put('first_name'));
        $last_name = strip_tags($this->put('last_name'));
        $email = strip_tags($this->put('email'));
        $password = $this->put('password');
        $phone = strip_tags($this->put('phone'));*/
		
		$first_name = strip_tags($this->post('first_name'));
        $gender = strip_tags($this->post('gender'));
        $birth_date = strip_tags($this->post('birth_date'));
		
		$birth_time = strip_tags($this->post('birth_time'));
		$birth_location = strip_tags($this->post('birth_location'));
		$state = strip_tags($this->post('state'));
		$city = strip_tags($this->post('city'));
		
        $phone = strip_tags($this->post('phone'));
		//$dob = strip_tags($this->post('dob'));
        $country = strip_tags($this->post('country'));
		
		
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
			
			
			
            $update = $this->user->update($userData, $id);
            
            // Check if the user data is updated
            if($update){
                // Set the response and exit
                $this->response([
                    'status' => 1,
                    'message' => 'The user info has been updated successfully.',
					//'sql' => $this->db->last_query(),
					'id' =>$id
                ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                $this->response(
                    [
                    'status' => 0,
                    'message' => "Some problems occurred, please try again.",
				] , REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            // Set the response and exit
           $this->response(
                    [
                    'status' => 0,
                    'message' => "Some problems occurred, please try again.",
				] , REST_Controller::HTTP_BAD_REQUEST);
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
                    'status' => 1,
                    'message' => 'password  updated successfully.',
				 ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
			
			//if new and conform password not match
			}else{
				  $this->response([
                     'status' => 0,
                     'message' => 'old password and new password not Match.'
					], REST_Controller::HTTP_BAD_REQUEST);
			}
			
		//if old password not match
		}else{
			       $this->response([
                     'status' => 0,
                     'message' => 'old password not valid.'
					], REST_Controller::HTTP_BAD_REQUEST);
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

}