<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends MY_Model
{
	 function __construct() {
        $this->tableName = 'wl_customers';
        $this->primaryKey = 'customers_id';
    }
	public function create_user()
	{
	
		  $password = $this->safe_encrypt->encode($this->input->post('password',TRUE));
		  $register_array = array ( 					
					'user_name'        => $this->input->post('user_name',TRUE),
					'password'         	=> $password,
					//'title'            => $this->input->post('title',TRUE),
					'first_name'       	=> $this->input->post('first_name',TRUE),
					'last_name'        	=> $this->input->post('last_name',TRUE),
					'phone_number'    	=> $this->input->post('phone_number',TRUE),	
					'actkey'           	=>md5($this->input->post('user_name',TRUE)),
					'account_created_date'=>$this->config->item('config.date.time'),
					'current_login'    	=>$this->config->item('config.date.time'),
					'status'		   	=>'1',
					'is_verified'		=>'1',									
					'ip_address'  		=>$this->input->ip_address()
				);
			$this->safe_insert('wl_customers',$register_array,FALSE);
		}


	public function is_email_exits($data)
	{
		$this->db->select('customers_id');
		$this->db->from('wl_customers');
		$this->db->where($data);	
		$this->db->where('status !=', '2');
		
		$query = $this->db->get();
		if ($query->num_rows() == 1)
		{
			return TRUE;
			
		}else
		{
			return FALSE;
	
		}
		
	}	
	
	public function checkUser($userData = array()){
        
		if(!empty($userData)){
            //check whether user data already exists in database with same oauth info
            $this->db->select($this->primaryKey);
            $this->db->from($this->tableName);
            $this->db->where(array(
				'login_type'	=>$userData['login_type'],
			 	'oauth_uid'		=>$userData['oauth_uid']));
            $prevQuery = $this->db->get();
            $prevCheck = $prevQuery->num_rows();
            if($prevCheck > 0){
                $prevResult = $prevQuery->row_array();
                //update user data
                $userData['account_updated_date'] = $this->config->item('config.date.time');
                $update = $this->db->update(	$this->tableName, 
												$userData, array('customers_id' => $prevResult['customers_id']));
                //get user ID
                $userID = $prevResult['customers_id'];
            }else{
                //insert user data
                $userData['account_created_date']  = $this->config->item('config.date.time');
                $userData['account_updated_date'] = $this->config->item('config.date.time');
                $insert = $this->db->insert($this->tableName, $userData);
                
                //get user ID
                $userID = $this->db->insert_id();
            }
        }
        
        //return user ID
        return $userID?$userID:FALSE;
    }
	
	public function get_member_row($id,$condtion='')
	{
		$id = (int) $id;
		
		if($id!='' && is_numeric($id))
		{
			$condtion = "status !='2' AND customers_id=$id $condtion ";
			
			$fetch_config = array(
			  'condition'=>$condtion,							 					 
			  'debug'=>FALSE,
			  'return_type'=>"array"							  
			);
			
			$result = $this->find('wl_customers',$fetch_config);
			return $result;		
		}
	
	}
	public function logout()
	{
		$data = array(
		'user_id' => 0,
		'email' => 0,
		'name'=>0,
		'user_photo'=>0,
		'logged_in' => FALSE
		);		
		$this->session->sess_destroy();
		$this->session->unset_userdata($data);
	}


	
}
/* End of file users_model.php */
/* Location: ./application/modules/users/models/users_model.php */