<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Teacher_model extends MY_Model
{
	 function __construct() {
        $this->tableName = 'wl_teacher';
        $this->primaryKey = 'teacher_id';
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
			$this->safe_insert('wl_teacher',$register_array,FALSE);
		}


	public function is_email_exits($data)
	{
		$this->db->select('teacher_id');
		$this->db->from('wl_teacher');
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
	

	
	public function get_teacher_row($id,$condtion='')
	{
		$id = (int) $id;
		
		if($id!='' && is_numeric($id))
		{
			$condtion = "status !='2' AND teacher_id=$id $condtion ";
			$fetch_config = array(
			  'condition'=>$condtion,							 					 
			  'debug'=>FALSE,
			  'return_type'=>"array"							  
			);
			$result = $this->find('wl_teacher',$fetch_config);
			return $result;		
		}
	
	}
	public function logout()
	{
		$data = array(
		'teacher_id' => 0,
		'email' => 0,
		'name'=>0,
		'user_photo'=>0,
		'teacher_logged_in' => FALSE
		);		
		$this->session->sess_destroy();
		$this->session->unset_userdata($data);
	}

	 public function get_teacher($limit='10',$offset='0',$param=array())
	 {		
		
		$status			    =   @$param['status'];	
		$teacher_id			=   @$param['teacher_id'];		
		$keyword			=   trim($this->input->get_post('keyword',TRUE));		
		$keyword			=   $this->db->escape_str($keyword);
		$where			    =	@$param['where'];
		if($teacher_id!='')
		{
			$this->db->where("teacher_id","$teacher_id");
		}		
		if($status!='')
		{
			$this->db->where("status","$status");
		}
		if($where!=''){
			$this->db->where($where);
		}
		if($keyword!='')
		{
		   $this->db->where("(user_name LIKE '%".$keyword."%' OR CONCAT_WS(' ',first_name,last_name) LIKE '%".$keyword."%' OR gender LIKE '%".$keyword."%' )");
			
		}
		$this->db->order_by('teacher_id','desc');	
		$this->db->limit($limit,$offset);
		$this->db->select("SQL_CALC_FOUND_ROWS *,CONCAT_WS(' ',first_name) AS name ",FALSE);
		$this->db->from('wl_teacher');
		$this->db->where('status !=','2');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
				
	}
	public function activate_account($actkey){
					$posted_user_data = array(						
						'email_verify'			 	 =>'1'
					);
					$where  = "actkey = '".$actkey."'"; 
					$update=$this->safe_update('wl_teacher',$posted_user_data,$where);	
					return $update;
		}
		
	
	// Save user rating
	public function userRating($userid,$postid,$rating){
		$this->db->select('*');
		$this->db->from('wl_rating');
		$this->db->where("entity_id", $postid);
		$this->db->where("customer_id", $userid);
		$this->db->where("rating!='0'");
		$userRatingquery = $this->db->get();
       	$userRatingResult = $userRatingquery->result_array();
       	if(count($userRatingResult) > 0){
			$postRating_id = $userRatingResult[0]['id'];
       		// Update
            $value=array('rating'=>$rating);
            $this->db->where('entity_id',$postRating_id);
            $this->db->update('wl_rating',$value);
       	}else{
       		$userRating = array(
               "entity_id" 		=> $postid,
               "customer_id" 	=> $userid,
               "rating" 		=> $rating,
			   'ip_address'		=>$this->input->ip_address(),
			   'rating_date'	=>$this->config->item('config.date.time')
            );
			$this->db->insert('wl_rating', $userRating);
			//echo_sql();
       	}
		// Average rating
       	$this->db->select('ROUND(AVG(rating),1) as averageRating');
		$this->db->from('wl_rating');
		$this->db->where("entity_id", $postid);
		$this->db->where("rating!='0'");
		$ratingquery = $this->db->get();
	    $postResult  = $ratingquery->result_array();
		$rating = $postResult[0]['averageRating'];
	    if($rating == ''){
	       	$rating = 0;
	    }

       	return $rating;
	}
	
	
	// Save user rating
	public function teachingRating($userid,$postid,$teachingstyle){
		$this->db->select('teachingstyle');
		$this->db->from('wl_rating');
		$this->db->where("entity_id", $postid);
		$this->db->where("customer_id", $userid);
		$this->db->where("teachingstyle!='0'");
		$userRatingquery = $this->db->get();
       	$userRatingResult = $userRatingquery->result_array();
		
       	if(count($userRatingResult) > 0){
			$postRating_id = $userRatingResult[0]['id'];
       		// Update
            $value=array('teachingstyle'=>$teachingstyle);
            $this->db->where('entity_id',$postRating_id);
			$this->db->update('wl_rating',$value);
       	}else{
       		$userRating = array(
               "entity_id" 		=> $postid,
               "customer_id" 	=> $userid,
               "teachingstyle" 	=> $teachingstyle,
			   'ip_address'		=> $this->input->ip_address(),
			   'rating_date'	=> $this->config->item('config.date.time')
            );
			$this->db->insert('wl_rating', $userRating);
			
       	}
		//echo_sql();die('testing');
		// Average rating
       	$this->db->select('ROUND(AVG(teachingstyle),1) as teachingstyleRating');
		$this->db->from('wl_rating');
		$this->db->where("teachingstyle!='0'");
		$this->db->where("entity_id", $postid);
		$ratingquery = $this->db->get();
	    $postResult  = $ratingquery->result_array();
		$teachingstylerating = $postResult[0]['teachingstyleRating'];
	    if($teachingstylerating == ''){
	       	$teachingstylerating = 0;
	    }
		
       	return $teachingstylerating;
	}
	
	// Save user rating
	public function disciplineRating($userid,$postid,$discipline){
		$this->db->select('discipline');
		$this->db->from('wl_rating');
		$this->db->where("entity_id", $postid);
		$this->db->where("customer_id", $userid);
		$this->db->where("discipline!='0'");
		$userRatingquery = $this->db->get();
       	$userRatingResult = $userRatingquery->result_array();
		
       	if(count($userRatingResult) > 0){
			$postRating_id = $userRatingResult[0]['id'];
       		// Update
            $value=array('discipline'=>$discipline);
            $this->db->where('entity_id',$postRating_id);
			$this->db->update('wl_rating',$value);
       	}else{
       		$userRating = array(
               "entity_id" 		=> $postid,
               "customer_id" 	=> $userid,
               "discipline" 	=> $discipline,
			   'ip_address'		=> $this->input->ip_address(),
			   'rating_date'	=> $this->config->item('config.date.time')
            );
			$this->db->insert('wl_rating', $userRating);
			
       	}
		//echo_sql();die('testing');
		// Average rating
       	$this->db->select('ROUND(AVG(discipline),1) as disciplineRating');
		$this->db->from('wl_rating');
		$this->db->where("discipline!='0'");
		$this->db->where("entity_id", $postid);
		$ratingquery = $this->db->get();
	    $postResult  = $ratingquery->result_array();
		$teachingstylerating = $postResult[0]['disciplineRating'];
	    if($teachingstylerating == ''){
	       	$teachingstylerating = 0;
	    }
		
       	return $teachingstylerating;
	}
	
	// Save user rating
	public function studymaterialRating($userid,$postid,$studymaterial){
		$this->db->select('studymaterial');
		$this->db->from('wl_rating');
		$this->db->where("entity_id", $postid);
		$this->db->where("customer_id", $userid);
		$this->db->where("studymaterial!='0'");
		$userRatingquery = $this->db->get();
       	$userRatingResult = $userRatingquery->result_array();
		if(count($userRatingResult) > 0){
			$postRating_id = $userRatingResult[0]['id'];
       		// Update
            $value=array('studymaterial'=>$studymaterial);
            $this->db->where('entity_id',$postRating_id);
			$this->db->update('wl_rating',$value);
       	}else{
       		$userRating = array(
               "entity_id" 		=> $postid,
               "customer_id" 	=> $userid,
               "studymaterial" 	=> $studymaterial,
			   'ip_address'		=> $this->input->ip_address(),
			   'rating_date'	=> $this->config->item('config.date.time')
            );
			$this->db->insert('wl_rating', $userRating);
		}
		//echo_sql();die('testing');
		// Average rating
       	$this->db->select('ROUND(AVG(studymaterial),1) as studymaterialRating');
		$this->db->from('wl_rating');
		$this->db->where("studymaterial!='0'");
		$this->db->where("entity_id", $postid);
		$ratingquery = $this->db->get();
	    $postResult  = $ratingquery->result_array();
		$teachingstylerating = $postResult[0]['studymaterialRating'];
	    if($teachingstylerating == ''){
	       	$teachingstylerating = 0;
	    }
		return $teachingstylerating;
	}
	
	// Save user rating 6.	
	public function locationsRating($userid,$postid,$locations){
		$this->db->select('locations');
		$this->db->from('wl_rating');
		$this->db->where("entity_id", $postid);
		$this->db->where("customer_id", $userid);
		$this->db->where("locations!='0'");
		$userRatingquery = $this->db->get();
       	$userRatingResult = $userRatingquery->result_array();
		if(count($userRatingResult) > 0){
			$postRating_id = $userRatingResult[0]['id'];
       		// Update
            $value=array('locations'=>$locations);
            $this->db->where('entity_id',$postRating_id);
			$this->db->update('wl_rating',$value);
       	}else{
       		$userRating = array(
               "entity_id" 		=> $postid,
               "customer_id" 	=> $userid,
               "locations" 		=> $locations,
			   'ip_address'		=> $this->input->ip_address(),
			   'rating_date'	=> $this->config->item('config.date.time')
            );
			$this->db->insert('wl_rating', $userRating);
		}
		//echo_sql();die('testing');
		// Average rating
       	$this->db->select('ROUND(AVG(locations),1) as locationsRating');
		$this->db->from('wl_rating');
		$this->db->where("locations!='0'");
		$this->db->where("entity_id", $postid);
		$ratingquery = $this->db->get();
	    $postResult  = $ratingquery->result_array();
		$teachingstylerating = $postResult[0]['locationsRating'];
	    if($teachingstylerating == ''){
	       	$teachingstylerating = 0;
	    }
		return $teachingstylerating;
	}
	
	public function infrastructureRating($userid,$postid,$infrastructure){
		$this->db->select('infrastructure');
		$this->db->from('wl_rating');
		$this->db->where("entity_id", $postid);
		$this->db->where("customer_id", $userid);
		$this->db->where("infrastructure!='0'");
		$userRatingquery = $this->db->get();
       	$userRatingResult = $userRatingquery->result_array();
		if(count($userRatingResult) > 0){
			$postRating_id = $userRatingResult[0]['id'];
       		// Update
            $value=array('infrastructure'=>$infrastructure);
            $this->db->where('entity_id',$postRating_id);
			$this->db->update('wl_rating',$value);
       	}else{
       		$userRating = array(
               "entity_id" 		=> $postid,
               "customer_id" 	=> $userid,
               "infrastructure" => $infrastructure,
			   'ip_address'		=> $this->input->ip_address(),
			   'rating_date'	=> $this->config->item('config.date.time')
            );
			$this->db->insert('wl_rating', $userRating);
		}
		//echo_sql();die('testing');
		// Average rating
       	$this->db->select('ROUND(AVG(infrastructure),1) as infrastructureRating');
		$this->db->from('wl_rating');
		$this->db->where("infrastructure!='0'");
		$this->db->where("entity_id", $postid);
		$ratingquery = $this->db->get();
	    $postResult  = $ratingquery->result_array();
		$teachingstylerating = $postResult[0]['infrastructureRating'];
	    if($teachingstylerating == ''){
	       	$teachingstylerating = 0;
	    }
		return $teachingstylerating;
	}
	
			
		
}
/* End of file users_model.php */
/* Location: ./application/modules/users/models/users_model.php */