<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Users_model extends MY_Model

{


 public function getTownData()
  {
      $DistricId = $_POST['data'];
      //$selectedId = '';
      
        $query = $this->db->query("SELECT category_id,category_name FROM tbl_city where parent_id ='".$DistricId."' order by category_id ASC")or die(mysql_error());;
     
        $result = $query->result_array();
      return $result;
  }
	
	public function verify_user($id)
	{
		$arr=array('uid'=>$id);
		$query=$this->db->get_where('tbl_customers',$arr);
		return $query->result_array();
		
	}
	 public function creat_user($data)
	 {
		
			  $insId =  $this->safe_insert('tbl_customers',$data,FALSE);
		      return $insId;
		 
	 }

	public function create_user()
	{
		  $password = $this->safe_encrypt->encode($this->input->post('password',TRUE));

				$register_array = array
				( 
					'user_name'              => $this->input->post('email',TRUE),
					'password'               => $password,
					'first_name'             => $this->input->post('user_name',TRUE),
					'state'                  => $this->input->post('state',TRUE),
					'city'                   => $this->input->post('city',TRUE),
					'phone_number'           => $this->input->post('mob_no',TRUE),
					'lot'  => $this->input->post('lot',TRUE),
					'actkey'                 =>md5($this->input->post('user_name',TRUE)),
					'account_created_date'   =>$this->config->item('config.date.time'),
					'current_login'          =>$this->config->item('config.date.time'),
					'status'                 =>'1',
					'is_verified'            =>'1',	
					'ip_address'             =>$this->input->ip_address()
					
				);

			  $insId =  $this->safe_insert('tbl_customers',$register_array,FALSE);



	}





	public function is_email_exits($data)

	{

		$this->db->select('customers_id');

		$this->db->from('tbl_customers');

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