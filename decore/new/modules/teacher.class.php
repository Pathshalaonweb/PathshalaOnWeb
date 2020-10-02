<?php
include_once('config.php');
class Teacher extends DB{

	function __construct(){
		$this->connect();
		$this->connectTwo();
	}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = strip_tags($data);
		$data = preg_replace('/[^A-Za-z0-9 ]/', '', $data);
		$val = array("\n","\r");
		$data = str_replace($val, "", $data);
  		return $data;
	}
	
	function loginAction($fields){
		
		$response = array();
		 if($fields['userName']=="" || $fields['pass']==""){
			  $response = array("success"=>0,"code"=>0,"message"=>"Email ID or password can not be blank");
   	 	}else{ 
		$select_query = mysqli_query($this->conn,"Select * from wl_teacher where user_name='".$fields['userName']."'");
		$chk_user = mysqli_num_rows($select_query);
		if($chk_user > 0){
		$rec = mysqli_fetch_array($select_query);
		if( $rec['password'] == $fields['pass'] ){
		$response['Result'] = array("success"=>1,"code"=>0);
		//$response = array("status"=>1);
		if($rec['picture']==""){
			
			$image_url="https://www.pathshala.co/assets/designer/themes/default/images/logo_new.png";
			}else{
			   $image_url = "https://www.pathshala.co//uploaded_files/teacher/".$rec['picture'];

			}
		$response['Result']['data'][] = array( 
		  					"teacher_id"  	=>$rec['teacher_id'],
							"user_name"  		=>$rec['user_name'],
							"first_name" 		=>$rec['first_name'],
							"picture" 	 		=>$image_url,
							"address" 			=>$rec['address'],
							"pincode"  			=>$rec['pincode'],
							"status"  			=>$rec['status'],
							"is_verified"   	=>$rec['is_verified'],
							"phone_number"  	=>$rec['phone_number'],
							"mobile_number"  	=>$rec['mobile_number'],
							"current_credit"  	=>$rec['current_credit'],
							"youtube"		  	=>$rec['youtube'],
							"account_approved"	=>$rec['account_approved'],
							"account_type"		=>$rec['account_type'],
							"description"		=>$rec['description'],
							
						);
		}else{
			$response = array("status"=>0,'message'=>"Invalid password");
		}
		}else{
			$response = array("status_code"=>0,"status"=>0,'message'=>"Invalid user");
		}
		}
		return json_encode($response);

	}
	
	
	
	function registerUser($fields){
		
		if($fields['email']=="" || $fields['pass']==""){
			$response = array("success"=>0,"code"=>0,"message"=>"Email ID or password can not be blank");
		}else{
			$sql="Select * from wl_teacher where user_name='".$fields['email']."'";
			$check_user = mysqli_query($this->conn,$sql);
			$num_rows = mysqli_num_rows($check_user);
			if($num_rows > 0){
				$response['Result'] = array("status"=>0,"message"=>"This email id is already registered");
			}else{
				
				$date 	= date('Y-m-d h:i:s a', time()); 
				$actkey	= md5($date).md5($fields['email']);
				$date_validity	= date('Y-m-d', strtotime($date. ' + 10 days'));
				$sql="INSERT INTO wl_teacher (`user_name`,`password`,`first_name`,`phone_number`,`account_created_date`,`status`,`is_verified`,`current_credit`,`plan_expire`,`actkey`) VALUE ('".$fields['email']."','".$fields['pass']."','".$fields['name']."','".$fields['phone']."','".$date."','1','1','5','".$date_validity."','".$actkey."')";
				
				$insert_qry = mysqli_query($this->conn,$sql);
				$response['Result'] = array("success"=>1,"code"=>0,"msg"=>"Item has been added");
			}
		}
		return json_encode($response);
	}
	

	function forgotPassword($fields){
	  $check_user = mysqli_query($this->conn,"Select * from wl_teacher where user_name='".$fields['email']."'");
      $num_rows = mysqli_num_rows($check_user);
	  if($num_rows > 0){
	  $rec = mysqli_fetch_array($check_user);
	  // multiple recipients
	  $to  = $fields['email']; // note the comma
		
		// subject
		$subject = 'Forgot Password';
		$rand = $rec['password'];
		//$update_user = mysql_query("update users set password='".$rand."' where email='".$fields['email']."'");
		
		// message
		$message = '
		
		<p>Here is the password!</p>
		<table>
		
		<tr>
		<td>Password : </td> <td>'.$rand.'</td>
		</tr>
		</table>
		
		';
		
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Additional headers
		$headers .= 'From: Info' . "\r\n";
		
		// Mail it
		$ismail = mail($to, $subject, $message, $headers);
	   	
	   	if($ismail){
	   		$response = array("status"=>1,"Message"=>"Email Sent");

	   	}else{
	        $response = array("status"=>1,"Message"=>"Email Not Sent");
	        }
	   
	   
	   }else{
	   	        $response = array("status"=>0,"Message"=>"Email Id Not Registred");

	   } 
		    return json_encode($response);

	}
	
	
	
	function userDetail($fields){
		$response = array();
		if($fields['teacherid']=="" ) {
			$response = array("success"=>0,"code"=>0,"message"=>"Teacher ID can not be blank");
   		} else {
		$sql="Select * from wl_teacher where teacher_id='".$fields['teacherid']."'";	
		$select_query = mysqli_query($this->conn,$sql);
		//$rec = mysqli_fetch_array($select_query);
		
		while($rec = mysqli_fetch_array($select_query)){
		
		if($rec['picture']==""){
		$image_url="https://www.pathshala.co/assets/designer/themes/default/images/logo_new.png";
		}else{
		$image_url = "https://www.pathshala.co//uploaded_files/teacher/".$rec['picture'];
		}
		if($rec['image1']==""){
		$image_url1="https://www.pathshala.co/assets/designer/themes/default/images/logo_new.png";
		}else{
		$image_url1= "https://www.pathshala.co//uploaded_files/gallery/".$rec['image1'];
		}
		if($rec['image2']==""){
		$image_url2="https://www.pathshala.co/assets/designer/themes/default/images/logo_new.png";
		}else{
		$image_url2= "https://www.pathshala.co//uploaded_files/gallery/".$rec['image2'];
		}
		if($rec['image3']==""){
		$image_url3="https://www.pathshala.co/assets/designer/themes/default/images/logo_new.png";
		}else{
		$image_url3 = "https://www.pathshala.co//uploaded_files/gallery/".$rec['image3'];
		}
		if($rec['image4']==""){
		$image_url4="https://www.pathshala.co/assets/designer/themes/default/images/logo_new.png";
		}else{
		$image_url4 = "https://www.pathshala.co//uploaded_files/gallery/".$rec['image4'];
		}
		
		if($rec['pdf']==""){
		$pdf="https://www.pathshala.co//uploaded_files/teacher/".$rec['pdf'];
		}
		if($rec['pdf']==""){
		$pdf1="https://www.pathshala.co//uploaded_files/teacher/".$rec['pdf1'];
		}
		if($rec['pdf']==""){
		$pdf2="https://www.pathshala.co//uploaded_files/teacher/".$rec['pdf2'];
		}
		
		$rating			=	$this->rating($rec['teacher_id']);
		$teachingstyle	=	$this->teachingstyle($rec['teacher_id']);
		$discipline		=	$this->discipline($rec['teacher_id']);
		$studymaterial	=	$this->studymaterial($rec['teacher_id']);
		$locations		=	$this->locations($rec['teacher_id']);
		$infrastructure	=	$this->infrastructure($rec['teacher_id']);
		$averagerating  = 	$rating+$teachingstyle+$discipline+$studymaterial+$locations+$infrastructure;
		$allratingAveragerating=number_format($averagerating/6, 1, '.', '');
		
		$response['Result']['data'][] = array( 
		  					"teacher_id"  		=>$rec['teacher_id'],
							"user_name"  		=>$rec['user_name'],
							"first_name" 		=>$rec['first_name'],
							"picture" 	 		=>$image_url,
							"address" 			=>$rec['address'],
							"pincode"  			=>$rec['pincode'],
							"status"  			=>$rec['status'],
							"is_verified"   	=>$rec['is_verified'],
							"phone_number"  	=>$rec['phone_number'],
							"mobile_number"  	=>$rec['mobile_number'],
							"current_credit"  	=>$rec['current_credit'],
							"youtube"		  	=>$rec['youtube'],
							"account_approved"	=>$rec['account_approved'],
							"account_type"		=>$rec['account_type'],
							"nationality"		=>$rec['nationality'],
							"certificate"		=>$rec['certificate'],
							"experience_year"	=>$rec['experience_year'],
							"experience_month"	=>$rec['experience_month'],
							"image1" 	 		=>$image_url1,
							"image2" 	 		=>$image_url2,
							"image3" 	 		=>$image_url3,
							"image4" 	 		=>$image_url4,
							"pdf" 	 			=>$pdf,
							"pdf1" 	 			=>$pdf1,
							"pdf2" 	 			=>$pdf2,
							"plan_expire"		=>$rec['plan_expire'],
							"profile_edit"		=>$rec['profile_edit'],
							
							'rating'			=>$rating,
							'teachingstyle'		=>$teachingstyle,
							'discipline'		=>$discipline,
							'studymaterial'		=>$studymaterial,
							'locations'			=>$locations,
							'infrastructure'	=>$infrastructure,
							'averagerating'		=>$allratingAveragerating,
							
						);
		
			}
		}
		
		return json_encode($response);
	
	}
	
	public function rating($id){
		$sql1="SELECT ROUND(AVG(rating),1) as averageRating FROM `wl_rating` where status='1' AND entity_id='".$id."'  AND rating!=0";
		$select_query1  = mysqli_query($this->conn,$sql1);
		$row 			= mysqli_fetch_array($select_query1);
		return $row['averageRating'];
	}
	
	public function teachingstyle($id){
		$sql1="SELECT ROUND(AVG(teachingstyle),1) as teachingstyles FROM `wl_rating` where status='1' AND entity_id='".$id."'  AND teachingstyle!=0";
		$select_query1  = mysqli_query($this->conn,$sql1);
		$row 			= mysqli_fetch_array($select_query1);
		return $row['teachingstyles'];
	}
	
	public function discipline($id){
		$sql1="SELECT ROUND(AVG(discipline),1) as disciplines FROM `wl_rating` where status='1' AND entity_id='".$id."'  AND discipline!=0";
		$select_query1  = mysqli_query($this->conn,$sql1);
		$row 			= mysqli_fetch_array($select_query1);
		return $row['disciplines'];
	}
	
	public function studymaterial($id){
		$sql1="SELECT ROUND(AVG(studymaterial),1) as studymaterials FROM `wl_rating` where status='1' AND entity_id='".$id."'  AND studymaterial!=0";
		$select_query1  = mysqli_query($this->conn,$sql1);
		$row 			= mysqli_fetch_array($select_query1);
		return $row['studymaterials'];
	}
	
	public function locations($id){
		$sql1="SELECT ROUND(AVG(locations),1) as locationss FROM `wl_rating` where status='1' AND entity_id='".$id."'  AND locations!=0";
		$select_query1  = mysqli_query($this->conn,$sql1);
		$row 			= mysqli_fetch_array($select_query1);
		return $row['locationss'];
	}
	
	public function infrastructure($id){
		$sql1="SELECT ROUND(AVG(infrastructure),1) as infrastructure FROM `wl_rating` where status='1' AND entity_id='".$id."'  AND infrastructure!=0";
		$select_query1  = mysqli_query($this->conn,$sql1);
		$row 			= mysqli_fetch_array($select_query1);
		return $row['infrastructure'];
	}
	
	
	function changepassword($fields){
		
		
		$response = array();
		if($fields['oldpw']=="" || $fields['newpw']=="" || $fields['conpw']==""){
	      $response = array("status"=>0,"message"=>"Password Fields cannot Blank");
	    }else{
        $pw=$this->conn->query("select password from wl_teacher where teacher_id= '" . $fields["teacher_id"] . "'");
                $row = $pw->fetch_object();
                $pawo = $row->password ; 
		if($fields['oldpw']== $pawo){
        if ($fields['newpw']==$fields['conpw']){
         $this->conn->query("UPDATE wl_teacher SET password='" . $fields['newpw'] . "' WHERE teacher_id='" . $fields['teacher_id'] . "'");
		 $response['Result'] = array("status"=>1,"message"=>"successfully changed");
         } else { 
			//echo ""; 
			$response['Result'] = array("status"=>0,"message"=>"Passwords do not match");
			}
        }else { 
		$response['Result'] = array("status"=>0,"message"=>"Wrong password entered");
		  //echo "";
		}
    }
	return json_encode($response);
   }
 
	/*-------------------------notification------------------------*/
	
	public function addNotification($fields){
		
		$response = array();
		if($fields['user_id']=="" || $fields['teacher_id']==""){
	      $response = array("status"=>0,"message"=>"Fields cannot Blank");
	    }else{
			$date 	= date('m/d/Y h:i:s a', time()); 
			$sql="INSERT INTO wl_teacher_notified (`student_id`,`teacher_id`,`subjects`,`classes`,`keyword`,`category`,`created_at`) VALUE ('".$fields['user_id']."','".$fields['teacher_id']."','".$fields['subjects']."','".$fields['classes']."','".$fields['keyword']."','".$fields['category']."','".$date."')";
			$insert_qry = mysqli_query($this->conn,$sql);
			$response['Result'] = array("success"=>1,"code"=>0,"msg"=>"Item has been added");
		}
	 	return json_encode($response);
		
	}
	
	
	 public function getnotification($fields){
	 	 $sql="Select * from wl_teacher_cradit_recode where notified_id=".$fields." ";
		 $select_query = mysqli_query($this->conn,$sql);
		 $rec = mysqli_fetch_array($select_query);
		 return $rec;
	 }
	 public function viewUpdate($teacherId,$studentId,$notifiedId){
		 
		  $sql="SELECT * FROM `wl_teacher_cradit_recode` where student_id=".$studentId." AND  notified_id=".$notifiedId." AND teacher_id=".$teacherId."";
		  $select_query = mysqli_query($this->conn,$sql);
		  $row = mysqli_fetch_array($select_query);
		  
		  $sql1="SELECT teacher_id,current_credit FROM `wl_teacher` where teacher_id=".$teacherId."";
		  $select_query1 = mysqli_query($this->conn,$sql1);
		  $row1 = mysqli_fetch_array($select_query1);
		  $currentCredit=$row1['current_credit'];
		  if(empty($row)){
			  if(!empty($notifiedId)){
				
				$data_array=array(
					'teacher_id' =>  $teacherId,
					'student_id' =>  $studentId,
					'notified_id'=>  $notifiedId,
					'value'		 =>  $currentCredit-1,
					'view'		 =>  1, 
					'comment'	 =>  "view profile",
					'created_at' =>  date('Y-m-d H:i:s')
				);
				$insert=$this->qry_insert('wl_teacher_cradit_recode',$data_array,true);
				$current_credit=$currentCredit-1;
				$sql2="UPDATE wl_teacher SET current_credit = '".$current_credit."'  WHERE teacher_id='".$teacherId."'";
        		$insert_qry = mysqli_query($this->conn,$sql2);
				return true;
			
			}
			return false;
		  }
		 
	
	 }
	public function teachernotified($fields){
		//die('tests');
		
		 $arr=array();
		 if ($fields['teacher_id']==""){
	      	$arr = array("status"=>0,"message"=>"Fields cannot Blank");
		 } else {
			 
		if(!empty($fields['notified_id'])) {
		
			$sql="Select * from wl_teacher_notified where teacher_id=".$fields['teacher_id']." AND id=".$fields['notified_id']." ORDER BY `id` DESC";	
		
		}else{
		
				$sql="Select * from wl_teacher_notified where id=".$fields['notified_id']." ORDER BY `id` DESC";	
		
		}
	  	$select_query = mysqli_query($this->conn,$sql);//die;
		$arr['Result'] = array("success"=>1,"code"=>0);
		while($rec = mysqli_fetch_array($select_query)){
		
		$notifiedId=$rec['id'];
		$student=$this->getStudent($rec['student_id']);
		if($fields['operation']=='debited') {	
		//echo "1";
			$view=$this->viewUpdate($rec['teacher_id'],$rec['student_id'],$notifiedId);
		}
		if(!empty($this->getnotification($notifiedId))) {
			$arr['Result']['data'][]	= array(  
						 'id'				=> $notifiedId,
						 'student_id'		=> $rec['student_id'],
						 'first_name'		=> $student['first_name'],
						 'phone_number'		=> $student['phone_number'],
						 'user_name'		=> $student['user_name'],
						 "address"			=> $this->getStudentAddress($rec['student_id']),
						 "image"			=> $this->getStudentImage($rec['student_id']),
						 'status'			=> $rec['status'],
						 "category"			=> $rec['category'],
						 "category_name"	=> $this->get_category($rec['category']),
						 "subjects"			=> $rec['subjects'],
						 "subjects_name"	=> $this->get_category($rec['subjects']),
						  "classes"			=> $rec['classes'],
						 "classes_name"		=> $this->get_category($rec['classes']),
						  "keyword"			=> $this->test_input($rec['keyword']),
						 "created_at"		=> $rec['created_at']
					);
		}else {
			
			$arr['Result']['data'][]	= array(  
						 'msg'		=>"No data found",
						
					);
			 }
			
		   }
		   
		 }
		
		return json_encode($arr,JSON_UNESCAPED_SLASHES);
	}
	
	
	
	public function teachernotifieds($fields){
		//die('tests');
		
		 $arr=array();
		 if ($fields['teacher_id']==""){
	      	$arr = array("status"=>0,"message"=>"Fields cannot Blank");
		 } else {
			$sql="Select * from wl_teacher_notified where teacher_id=".$fields['teacher_id']." ORDER BY `id` DESC";	
			$select_query = mysqli_query($this->conn,$sql);//die;
			$arr['Result'] = array("success"=>1,"code"=>0);
			while($rec = mysqli_fetch_array($select_query)){
			$notifiedId=$rec['id'];
			$student=$this->getStudent($rec['student_id']);
		
		if(!empty($this->getnotification($notifiedId))) {
			
			$arr['Result']['data'][]	= array(  
						 'id'				=> $notifiedId,
						 'student_id'		=> $rec['student_id'],
						 'first_name'		=> $student['first_name'],
						 'phone_number'		=> $student['phone_number'],
						 'user_name'		=> $student['user_name'],
						 "address"			=> $this->getStudentAddress($rec['student_id']),
						 "image"			=> $this->getStudentImage($rec['student_id']),
						 'status'			=> $rec['status'],
						 "category"			=> $rec['category'],
						 "category_name"	=> $this->get_category($rec['category']),
						 "subjects"			=> $rec['subjects'],
						 "subjects_name"	=> $this->get_category($rec['subjects']),
						  "classes"			=> $rec['classes'],
						 "classes_name"		=> $this->get_category($rec['classes']),
						  "keyword"			=> $this->test_input($rec['keyword']),
						 "created_at"		=> $rec['created_at']
					);
		}else {
			$arr['Result']['data'][]	= array(  
						 'id'				=> $notifiedId,
						 'student_id'		=> $rec['student_id'],
						 'first_name'		=> $student['first_name'],
						 'phone_number'		=> "******",
						 'user_name'		=> "******",
						 "address"			=> "******",
						 "image"			=> $this->getStudentImage($rec['student_id']),
						 'status'			=> $rec['status'],
						 "category"			=> $rec['category'],
						 "category_name"	=> $this->get_category($rec['category']),
						 "subjects"			=> $rec['subjects'],
						 "subjects_name"	=> $this->get_category($rec['subjects']),
						  "classes"			=> $rec['classes'],
						 "classes_name"		=> $this->get_category($rec['classes']),
						  "keyword"			=> $this->test_input($rec['keyword']),
						 "created_at"		=> $rec['created_at']
					);
	 	    }
			
		   }
		   
		 }
		
		return json_encode($arr,JSON_UNESCAPED_SLASHES);
	}

 
		 public function getStudent($fields){
			 
			 $sql="Select first_name,user_name,phone_number from wl_customers where customers_id=".$fields." ";
			 $select_query = mysqli_query($this->conn,$sql);
			 $rec = mysqli_fetch_array($select_query);
			 return $rec;
		  }
 

 
	 public function editProfile($fields,$file_name){
		$response = array();
		if($fields['teacher_id']==""){
			$response = array("success"=>0,"code"=>0,"message"=>"UserId can not be blank");
		}else{
		
		if($fields['name']=="" || $fields['phone']=="" || $fields['address']==""){
			  $response = array("status"=>0,"message"=>"Fields cannot Blank");
		}else{	
			$sql="UPDATE wl_teacher SET first_name = '".$fields['name']."', phone_number = '".$fields['phone']."',address = '".$fields['address']."',pincode = '".$fields['pincode']."',description = '".$fields['description']."',image1='".$file_name."'  WHERE teacher_id='".$fields['teacher_id']."'";
			$insert_qry = mysqli_query($this->conn,$sql);
			$response['Result'] = array("success"=>1,"code"=>0,"msg"=>"Updated ");
		 }
		}
		 return json_encode($response);
		}  
		
		
		public function addProfile($fields){
			$response = array();
			if($fields['teacher_id']==""){
				$response = array("success"=>0,"code"=>0,"message"=>"UserId can not be blank");
			}else{
				
			$sql="INSERT INTO wl_teacher_profile (`teacher_id`,`category`,`subject`,`class`,`location`,`state_id`,`city_id`,`fee`,`bath_time`,`created_at`) VALUE ('".$fields['teacher_id']."','".$fields['category']."','".$fields['subject']."','".$fields['class']."','".$fields['location']."','".$fields['state_id']."','".$fields['city_id']."','".$fields['fee']."','".$fields['bath_time']."','".date('Y-m-d h:i:s')."')";
            $insert_qry = mysqli_query($this->conn,$sql);	
			$response['Result'] = array("success"=>1,"code"=>0,"msg"=>"Updated ");	
			}
			
			return json_encode($response);	
		}
		
		
		public function deletProfile($fields) {
			$response = array();
			if($fields['teacher_id']=="" || $fields['id']=="" ){
				$response = array("success"=>0,"code"=>0,"message"=>"Teacher Id can not be blank");
			}else{
				$sql="DELETE FROM wl_teacher_profile  WHERE teacher_id='".$fields['teacher_id']."' AND id='".$fields['id']."'";
				$insert_qry = mysqli_query($this->conn,$sql);	
				$response['Result'] = array("success"=>1,"code"=>0,"msg"=>"Updated ");	
			}
			return json_encode($response);	
		}
		
		public function updateProfile($fields){
			$response = array();
			if($fields['teacher_id']=="" || $fields['id']==""){
				$response = array("success"=>0,"code"=>0,"message"=>"Teacher Id can not be blank");
			}else{
			$sql="UPDATE wl_teacher_profile SET category = '".$fields['category']."', subject = '".$fields['subject']."',class ='".$fields['class']."',location = '".$fields['location']."',state_id = '".$fields['state_id']."',city_id = '".$fields['city_id']."',fee = '".$fields['fee']."',bath_time = '".$fields['bath_time']."'  WHERE teacher_id='".$fields['teacher_id']."' AND id='".$fields['id']."'";
			$insert_qry = mysqli_query($this->conn,$sql);	
			$response['Result'] = array("success"=>1,"code"=>0,"msg"=>"Updated ");	
			}
			return json_encode($response);	
		}
		
		
		
		public function ProfileList($fields){
			$arr = array();
			if($fields['teacher_id']==""){
				$arr = array("success"=>0,"code"=>0,"message"=>"Teacher Id can not be blank");
			}else{
				$sql="SELECT * FROM `wl_teacher_profile` where teacher_id = '".$fields['teacher_id']."' ORDER BY `id` DESC ";
				$select_query = mysqli_query($this->conn,$sql);
				mysqli_set_charset($this->conn, 'utf8');
				$arr['Result'] = array("success"=>1,"code"=>0);
				while($rec = mysqli_fetch_array($select_query)) {
				$arr['Result']['data'][] = array(   
												'id'				=>$rec['id'],
												'teacher_id'		=>$rec['teacher_id'],
												"category"			=>$rec['category'],
												"category_name"		=>$this->get_category($rec['category']),
												"subject"			=>$rec['subject'],
												"subject_name"		=>$this->get_category($rec['subject']),
												"class"				=>$rec['class'],
												"class_name"		=>$this->get_category($rec['class']),
												"state_id"			=>$rec['state_id'],
												"state_name"		=>$this->get_cat_state($rec['state_id']),
												"city_id"			=>$rec['city_id'],
												"city_name"			=>$this->get_cat_city($rec['city_id']),
												"fee"				=>$rec['fee'],
												//"city_id"			=>$rec['city_id'],
												"bath_time"			=>$rec['bath_time'],
												"status"			=>$rec['status'],
												"created_at"		=>$rec['created_at']
												);
				}
			//return json_encode($arr);
			}
			
			return json_encode($arr);	
		}
		
		
		public function get_cat_city($id){
			$sql		  ="SELECT * FROM `tbl_cities` where id='".$id."'";
			$select_query = mysqli_query($this->conn,$sql);
			$rec 		  = mysqli_fetch_array($select_query);
			return $rec['name'];
		}
		
		public function get_cat_state($id){
			$sql		  ="SELECT * FROM `tbl_states` where id='".$id."'";
			$select_query = mysqli_query($this->conn,$sql);
			$rec 		  = mysqli_fetch_array($select_query);
			return $rec['name'];
		}
		
		public function get_category($id){
			$sql		  ="SELECT * FROM `wl_categories` where category_id='".$id."'";
			$select_query = mysqli_query($this->conn,$sql);
			$rec 		  = mysqli_fetch_array($select_query);
			return $rec['category_name'];
		}	
		
		 function getStudentAddress($id){
			
				$sql		  = "SELECT * FROM `wl_customers` where customers_id='".$id."'";
				$select_query = mysqli_query($this->conn,$sql);
				$rec 		  = mysqli_fetch_array($select_query);
				return 		  $rec['address'];
				
		}
		
		function getStudentImage($id){
			
				$sql		  = "SELECT * FROM `wl_customers` where customers_id='".$id."'";
				$select_query = mysqli_query($this->conn,$sql);
				$rec 		  = mysqli_fetch_array($select_query);
				
				if(!empty($rec['customer_photo'])){
					$image =	"https://www.pathshala.co/uploaded_files/userfiles/images/".$rec['customer_photo'];
				}else{
					$image =	$rec['customer_photo'];
				}
				return 		 $image;
				
		}
		
	public function enquiry($fields){
	
	if($fields['teacherid']=="" ){
		$response = array("success"=>0,"code"=>0,"message"=>"Teacher ID can not be blank");
    }else{
		$id=$fields['teacherid'];
		$sql1			= "SELECT * FROM `wl_teacher` where teacher_id='".$id."'";
		$select_query1  = mysqli_query($this->conn,$sql1);
		$rec 		    = mysqli_fetch_array($select_query1);
		
		//print_r($rec);
		//echo $rec['first_name'];die('test');
		$date 	= date('m/d/Y h:i:s a', time()); 
		$sql="INSERT INTO wl_enquiry_custom (`email`,`name`,`phone_number`,`mobile`,`subject`,`message`,`type`,`teacher_id`,`receive_date`) VALUE ('".$rec['user_name']."','".$rec['first_name']."','".$fields['phone']."','".$rec['mobile_number']."','".$fields['subject']."','".$fields['message']."','1','".$fields['teacherid']."','".$date."')";
		$insert_qry = mysqli_query($this->conn,$sql);
        $response['Result'] = array("success"=>1,"code"=>0,"msg"=>"Item has been added");
		
    }
    return json_encode($response);
	}
	
	public function teacherCourseList($fields) {
		
		$arr = array();
		if($fields['teacherid']=="" ) {
			$arr = array("success"=>0,"code"=>0,"message"=>"Teacher ID can not be blank");
   		} else {
			$sql="SELECT * FROM `tbl_courses` WHERE `teacher_id`='".$fields['teacherid']."' ORDER BY `courses_id` DESC ";
			$select_query = mysqli_query($this->connTwo,$sql);
			mysqli_set_charset($this->connTwo, 'utf8');
			$arr['Result'] = array("success"=>1,"code"=>0);
			while($rec = mysqli_fetch_array($select_query)) {
				if($rec['status']=='1'){
					$status ="Active";
				} else {
					$status ="InActive";
				}
				
				$arr['Result']['data'][] = array( 
						 'courses_id'			=>$rec['courses_id'],
						 'courses_name'			=>$this->test_input($rec['courses_name']),
						 'courses_code'			=>$this->test_input($rec['courses_code']),
						 'courses_friendly_url'	=>"https://www.pathshala.co/courses/detail/".$rec['courses_friendly_url'],
						 'price'				=>$rec['price'],
						 'image'				=>"https://www.pathshala.co/lms/uploaded_files/courses/".$rec['image'],
						 'status'				=>$status,
						 'courses_added_date'	=>$rec['courses_added_date'],
				);
			}
		}
		return json_encode($arr);
	}
	
	
	
	/*_________________________________plan________________________________*/
	
	public function byPlanStart($fields){
		$response = array();
		if($fields['teacher_id']=="" || $fields['plan_id']==""){
			 $response = array("success"=>0,"code"=>0,"message"=>"Teacher ID or Plan Id can not be blank");
		} else {
			$date 	= date('m/d/Y h:i:s a', time());
			
			
			$incSql 	   ="SHOW TABLE STATUS LIKE 'wl_order'";
			$incQuery  	   = mysqli_query($this->conn,$incSql);
			$INcinfo 	   = mysqli_fetch_array($incQuery);
			$invoice_number= "Wl_".$INcinfo['Auto_increment'];
			//die();
			$sql		   = "SELECT * FROM `wl_teacher` WHERE `teacher_id` = '".$fields['teacher_id']."'";
			$select_query  = mysqli_query($this->conn,$sql);
			$mem_info 	   = mysqli_fetch_array($select_query);
			
			$sql1		   = "SELECT * FROM `wl_plan` WHERE `plan_id` = '".$fields['plan_id']."'";
			$select_query1 = mysqli_query($this->conn,$sql1);
			$plan_info 	   = mysqli_fetch_array($select_query1);
			
			$sql11		    = "SELECT * FROM `wl_tax` WHERE `tax_id` = '1'";
			$select_query11 = mysqli_query($this->conn,$sql11);
			$tax_res 	    = mysqli_fetch_array($select_query11);
			
			$tax_amount		=$tax_res['tax_rate']*$plan_info['price']/100;
			$totalAmount	=$plan_info['price']+$tax_amount;
			
			$data_order   = 
					   array(
							'teacher_id'          => $fields['teacher_id'],
							'plan_id'        	  => $fields['plan_id'],
							'invoice_number'      => $invoice_number,					
							'first_name'          => $mem_info['first_name'],
							'last_name'           => $mem_info['last_name'],
							'phone'				  => $mem_info['phone_number'],
							'email'               => $mem_info['user_name'],
							'address'			  => $fields['address'],
							'tax_amount'     	  => $tax_amount,
							'tax_type'     		  => $tax_res['tax_type'],
							//'currency_code'	  => $this->session->userdata('currency_code'),
							//'coupon_id'		  => $this->session->userdata('coupon_id'),
							//'coupon_code'		  => $this->session->userdata('coupon_code'),
							//'discount_amount'	  => $this->input->post('discount_amount'),
							'total_amount'        => $totalAmount,
							'order_received_date' => $date,
							'payment_method'      => $fields['payment_method'],
							'payment_status'      => 'Unpaid',
							'payment_mode'		  => 'online',
							'type'				  => '0'
							
					);
					
			$this->qry_insert('wl_order',$data_order);
			$orderId =  mysqli_insert_id($this->conn);
			$response['Result'] = array("success"=>1,"code"=>0,'orderId'=>$orderId,"msg"=>"Item has been added");
		}
		return json_encode($response,JSON_UNESCAPED_SLASHES);
	}
	
	public function byPlanAfterpayment($fields){
		$response = array();
		if($fields['orderId']==""){
			 $response = array("success"=>0,"code"=>0,"message"=>"orderId can not be blank");
		} else {
			$date 		= date('m/d/Y h:i:s ', time());
			$sql	= "UPDATE wl_order  SET payment_status='Paid',
			payment_received_date='".$date."',
			transaction_id='".$fields['transaction_id']."',
			bank_ref_num='".$fields['bank_ref_num']."',
			bankcode='".$fields['bankcode']."' Where order_id='".$fields['orderId']."'";//die;
		$insert_qry = mysqli_query($this->conn,$sql);
        $response['Result'] = array("success"=>1,"code"=>0,"msg"=>"Updated ");
			
		}
		return json_encode($response,JSON_UNESCAPED_SLASHES);
	}
	
	
	
	public function teacherplan() {
		$response = array();
		$sql="SELECT * FROM `wl_plan` WHERE `status`='1' ORDER BY `plan_id` DESC ";
		$select_query = mysqli_query($this->conn,$sql);
		mysqli_set_charset($this->conn, 'utf8');
		$arr['Result'] = array("success"=>1,"code"=>0);
		while($rec = mysqli_fetch_array($select_query)) {
		$arr['Result']['data'][] = array(   'plan_id'		=>$rec['plan_id'],
												'name'			=>$rec['name'],
												"price"			=>$rec['price'],
												"credit_point"	=>$rec['credit_point'],
												"detail"		=>strip_tags($rec['detail']),
												"sort_order"	=>$rec['sort_order'],
												"status"		=>$rec['status']
												);
				}
			return json_encode($arr);
	}
 
	
	
	public function teacherPlanBuyhistory($fields){
		$response = array();
		if($fields['teacherid']=="" ) {
		$response = array("success"=>0,"code"=>0,"message"=>"User ID can not be blank");
   		} else {
		$sql="SELECT * FROM `wl_order` WHERE `teacher_id`='".$fields['teacherid']."' ORDER BY `order_id` DESC ";
		$select_query = mysqli_query($this->conn,$sql);
		mysqli_set_charset($this->conn, 'utf8');
		$arr['Result'] = array("success"=>1,"code"=>0);
		while($rec = mysqli_fetch_array($select_query)) {
		$arr['Result']['data'][] = array(   
										'order_id'		=>$rec['order_id'],
										'plan_id'		=>$rec['plan_id'],
										'plan_name'		=>$this->getplanName($rec['plan_id']),
										"transaction_id"=>$rec['transaction_id'],
										"first_name"	=>$rec['first_name'],
										"phone"			=>$rec['phone'],
										"email"			=>$rec['email'],
										"invoice_number"=>$rec['invoice_number'],
										"credit"		=>$rec['credit'],
										"credit_amount"	=>$rec['credit_amount'],
										"total_amount"	=>$rec['total_amount'],
										"tax_amount"	=>$rec['tax_amount'],
										//"previous_amount"		=>$rec['previous_amount'],
										//"after_payment_amount"	=>$rec['after_payment_amount'],
										//"order_status"			=>$rec['order_status'],
										"order_received_date"	=>$rec['order_received_date'],
										"payment_received_date"	=>$rec['payment_received_date'],
										"payment_method"		=>$rec['payment_method'],
										"payment_status"		=>$rec['payment_status'],
										"bank_ref_num"			=>$rec['bank_ref_num'],
										"bankcode"				=>$rec['bankcode'],
										"payment_status"		=>$rec['payment_status']
										//"status"		=>$rec['status']
									);
				}
		}
		return json_encode($arr);
	}
	
	
	function getplanName($id){
			$sql		  = "SELECT * FROM `wl_plan` where plan_id='".$id."'";
			$select_query = mysqli_query($this->conn,$sql);
			$rec 		  = mysqli_fetch_array($select_query);
			/*if(!empty($rec['customer_photo'])){
				$image =	"https://www.pathshala.co/uploaded_files/userfiles/images/".$rec['customer_photo'];
			}else{
				$image =	$rec['customer_photo'];
			}*/
			return 		$rec['name'];
	}
	
	
	public function qry_insert($table,$data){
			 $fields = array_keys($data );  
			 $values = array_values( $data );
			 $sql="INSERT INTO $table(".implode(",",$fields).") VALUES ('".implode("','", $values )."')";
			 //echo $sql;//die;
			 $result=$this->conn->query($sql);
			 return $result;

	}	
  function teacherLivePlan($fields)

		{
			if(!empty($fields['key']) && $fields['key']=="pathshala5572" && !empty($fields['email_id']))
			{
				$sql		  ="SELECT `liveplan`,`plan_expire` FROM `wl_teacher` where `user_name`='".$fields['email_id']."'";
				$select_query = mysqli_query($this->conn,$sql);
				$rec  = mysqli_fetch_array($select_query);
				$date = new DateTime('now');
				$currentDate = $date->format('Y-m-d h:i:s');
				
					if($rec['liveplan']=="0" || $rec['plan_expire']<$currentDate)
					{
						$arr = array("success"=>0,"code"=>0,"message"=>"Please Buy a Plan or Plan is Expired.");
					}
					else
					{
						$arr = array("success"=>1,"code"=>1,"message"=>"Success.");					}

			}
			else
			{
				$arr = array("success"=>-1,"code"=>-1,"message"=>"Invalid Request");
			}

			return json_encode($arr);
		
		 }
		function getScoboticToken($id)
	{
			if(isset($id))
			{
			//$id = $this->session->userdata('teacher_id');
			$sqs = "SELECT * FROM `wl_teacher` WHERE teacher_id='".$id."'";
			$select_query = mysqli_query($this->conn,$sqs);
			$values  = mysqli_fetch_array($select_query);
			//return $values;
			//$values= $qus->result_array();
			//$name = $values[0]['first_name'];
			$ch = curl_init();  
			$url = "LiveApi.Scobotic.com/api/Teacher/Registration?frAppId=pathshala&frAppPass=pathshala5572&emailId=".$values['user_name']."&password=pathshala5572&name=".$values['user_name']."&mobile=".$values['phone_number']."&city=delhi&gender=".$values['gender']."&subjectIds=001&batchIds=001";
			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			$output=curl_exec($ch);
			//echo $url;
			curl_close($ch);
			$jsonOutput = json_decode($output,true);
			//print_r($output);
			//var_dump($jsonOutput);
			if($jsonOutput['Token']=="" && $jsonOutput['Status']=="0")
			{
				if($jsonOutput['Message']== "EmailId already registered")
				{
					//Proceed with Login API
					$loginURL = "LiveApi.Scobotic.com/api/Teacher/Login?frAppId=pathshala&frAppPass=pathshala5572&emailId=".$values['user_name'];
					$loginCh = curl_init();
					curl_setopt($loginCh,CURLOPT_URL,$loginURL);
					curl_setopt($loginCh,CURLOPT_RETURNTRANSFER,true);
					$loginOutput=curl_exec($loginCh);
					//print_r($loginOutput);
					curl_close($loginCh);
					$loginArr = json_decode($loginOutput,true);
					if($loginArr['Token'] != "")
					{
						return $loginArr['Token'];
					}
					// else
					// {
					// 	echo "<script>alert('Error Occured! Please try Again.');</script>";
					// }

				}
			}
			elseif($jsonOutput['Token'] != "")
			{
				return $jsonOutput['Token'];
			}
		}
	}
	function listclass($fields)
	{
		if(!empty($fields['teacher_id']) || !empty($fields['class_title']) || !empty($fields['class_schedule_time']) || !empty($fields['class_duration']) || !empty($fields['class']) || !empty($fields['class_date']) || !empty($fields['class_credit_amount']) || !empty($fields['category']))
		{
			if(trim($fields['teacher_id'])!="" && trim($fields['class_title'])!="" && trim($fields['class_schedule_time'])!="" && trim($fields['class_duration'])!="" && trim($fields['class'])!="" && trim($fields['class_date'])!="" && trim($fields['class_credit_amount'])!="" && trim($fields['category'])!="")
			{
				// Create Login token from Scobotic API
				$token = Teacher::getScoboticToken($fields['teacher_id']);
				// Refractor the date according to the API needs
				$d=date("m/d/Y",strtotime($fields['class_date']));
				// Refractor the date to get the Frequency
				$day = date("D",strtotime($fields['class_date']));
				switch ($day) {
					case 'Sun':
						$freq = 1;
						break;
					case 'Mon':
						$freq = 2;
						break;
					case 'Tue':
						$freq = 3;
						break;
					case 'Wed':
						$freq = 4;
						break;
					case 'Thu':
						$freq = 5;
						break;
					case 'Fri':
						$freq = 6;
						break;
					case 'Sat':
						$freq = 7;
						break;    
				}
				// Fetching corresponding Scobotic Batch ID
				$batch_sql = "SELECT batch_id FROM `wl_batchid` WHERE `category`='".$fields['class']."'";
				$batch_query = mysqli_query($this->conn,$batch_sql);
				$batch_arr  = mysqli_fetch_array($batch_query);
				$batch_id = $batch_arr['batch_id'];
				$ch = curl_init();
				// Call the Add Class API
				$url = "https://LiveApi.Scobotic.com/api/Event/Create?frAppId=pathshala&frAppPass=pathshala5572&eventName=".$fields['class_title']."&eventStartDate=".$d."&eventEndDate=".$d."&eventScheduleTime=".$fields['class_schedule_time']."&eventDuration=".$fields['class_duration']."&SubjectIds=5209&batchIds=".$batch_id."&frequencies=".$freq."&token=".$token;
				curl_setopt($ch,CURLOPT_URL,$url);
				curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
				$output=curl_exec($ch);
				curl_close($ch);
				$jsonOutput = json_decode($output,true);
				if($jsonOutput["Message"] == "Success" && $jsonOutput['Status'] == "1")
				{
					$eventId = $jsonOutput['EventId'];
				// Insert the data in our DB as well
				$sql = "INSERT INTO `wl_addclass` (`teacher_id`, `class_title`, `class_schedule_time`, `class_duration`, `class`, `class_date`, `class_credit_amount`, `category`, `event_id`) values('".$fields['teacher_id']."', '".$fields['class_title']."', '".$fields['class_schedule_time']."', '".$fields['class_duration']."','".$fields['class']."', '".$fields['class_date']."', '".$fields['class_credit_amount']."', '".$fields['category']."', '".$eventId."')";
				$insert_qry = mysqli_query($this->conn,$sql);
				

				$arr = array("success"=>1,"code"=>1,"message"=>"Success","batch-id"=>$batch_id);
				}
				else
				{
					$arr = array("success"=>-1,"code"=>0,"message"=>"Batch-ID MisMAtch");
				}

			}
			else
			{
				$arr = array("success"=>0,"code"=>0,"message"=>"Fields cannot be empty");
			}
		}
		else
		{
			$arr = array("success"=>-1,"code"=>-1,"message"=>"Invalid Request");
		}
		return json_encode($arr);
	}
	function teachercreditshistory($fields)
	{
		if(!empty($fields['teacher_id']) && !empty($fields['key']))
		{
			if($fields['key'] == '0adbf2be-ff5e-11ea-adc1-0242ac120002')
			{
				$sql="SELECT * FROM `wl_teacher_cradit_recode` where `teacher_id`='".$fields['teacher_id']."'";
				$select_query = mysqli_query($this->conn,$sql);
				$i =0;
				while($rec  = mysqli_fetch_array($select_query))
				{
					//$rec['event_id'];
					if($rec['id'])
					{
						$sql2="SELECT `first_name` FROM `wl_customers` where `customers_id`='".$rec['student_id']."'";
						$select_query2 = mysqli_query($this->conn,$sql2);
						$rec2  = mysqli_fetch_array($select_query2);
						$i++;
						$arr['Data'] = array("success"=>1,"code"=>1, "message"=>"success");
						$arr['Result']['data'][] = array(
							'id' => $rec['id'],
							'credits_used' => "1",
							'student_name' => strtoupper($rec2['first_name']),
							'time' => $rec['created_at'],
						);					

					}
					// else
					// {
					// 	$arr = array("success"=>1,"code"=>0,"message"=>"No Data");	
					// }
				}
			}
			else
			{
				$arr = array("success"=>-1,"code"=>-1,"message"=>"Incorrect Key");
			}
		}
		else
		{
			$arr = array("success"=>-1,"code"=>0,"message"=>"Invalid Request.");
		}
		if($i==0)
		{
			$arr = array("success"=>1,"code"=>0,"message"=>"No Data");
		}
		return json_encode($arr);
	}


	function orderhistory($fields)
	{
		if(!empty($fields['id']) && !empty($fields['key']) && $fields['teacher'])
		{
			if($fields['key'] == '0adbf2be-ff5e-11ea-adc1-0242ac120002')
			{
				if($fields['teacher'] == '1')
				{
					$sql="SELECT * FROM `wl_order` where `teacher_id`='".$fields['id']."'";
					$select_query = mysqli_query($this->conn,$sql);
					//$i =0;
					if(mysqli_num_rows($select_query)>0)
					{
					while($rec  = mysqli_fetch_array($select_query))
					{
						//echo mysqli_num_rows($select_query);
						
						//$rec['event_id'];
						if($rec['order_id'] && $rec['payment_status'] == 'Paid')
						{
							$amount = str_replace('.0000','',$rec['total_amount']);
							// $final_amount = $amount[0];
							// var_dump($amount);
							//$i++;
							$sql2="SELECT `name` FROM `wl_plan` where `plan_id`='".$rec['plan_id']."'";
							$select_query2 = mysqli_query($this->conn,$sql2);
							$rec2  = mysqli_fetch_array($select_query2);
							$arr['Data'] = array("success"=>1,"code"=>1, "message"=>"success");
							$arr['Result']['data'][] = array(
								'order_id' => $rec['order_id'],
								'plan_name' => $rec2['name'],
								'amount' => $amount,
								'order_status' => $rec['payment_status'],
								'time' => $rec['order_received_date'],
							);	
						}				

						}
					}
						else
						{
							$arr = array("success"=>1,"code"=>0,"message"=>"No Data");
						}
					
				}
				else if($fields['teacher'] == '-1')
				{
					$sql="SELECT * FROM `wl_order` where `customers_id`='".$fields['id']."'";
					$select_query = mysqli_query($this->conn,$sql);
					//$i =0;
					while($rec  = mysqli_fetch_array($select_query))
					{
						//$rec['event_id'];
						if($rec['plan_id']!=0 && $rec['payment_status'] == 'Paid')
						{
							$amount = str_replace('.0000','',$rec['total_amount']);
							//$i++;
							$sql2="SELECT `name` FROM `wl_studentplan` where `plan_id`='".$rec['plan_id']."'";
							$select_query2 = mysqli_query($this->conn,$sql2);
							$rec2  = mysqli_fetch_array($select_query2);
							$arr['Data'] = array("success"=>1,"code"=>1, "message"=>"success");
							$arr['Result']['data'][] = array(
								'order_id' => $rec['order_id'],
								'amount' => $amount,
								'type' => 'plan',
								'plan_name' => $rec2['name'],
								'order_status' => $rec['payment_status'],
								'time' => $rec['order_received_date'],
							);					

						}
						if($rec['courses_id']!=0 && $rec['payment_status'] == 'Paid' && $rec['payment_mode'] != 'credit' && $rec['payment_mode'] != 'free')
						{
							$sql3="SELECT `price`,`courses_name` FROM `tbl_courses` where `courses_id`='".$rec['courses_id']."'";
							$select_query3 = mysqli_query($this->connTwo,$sql3);
							$rec3  = mysqli_fetch_array($select_query3);
							$arr['Data_course'] = array("success"=>1,"code"=>1, "message"=>"success");
							if($rec3['price'] == '1')
							{
								$price = 'Free';
							}
							else
							{
								$price = $rec3['price'];
							}
							$oid = "COURSE-".$rec['order_id'];
							$arr['Result']['data'][] = array(
								'order_id' => $rec['order_id'],
								'amount' => $price,
								'type' => 'course',
								'order_status' => 'paid',
								'course_name' => $rec3['courses_name'],
								'time' => $rec['order_received_date'],
							);					
						}
					}
				}
				else
				{
					$arr = array("success"=>-1,"code"=>0,"message"=>"Invalid Request");

				}
			}
			else
			{
				$arr = array("success"=>-1,"code"=>-1,"message"=>"Incorrect Key");
			}
		}
		else
		{
			$arr = array("success"=>-1,"code"=>0,"message"=>"Invalid Request.");
		}
		// if($i==0)
		// {
		// 	$arr = array("success"=>1,"code"=>0,"message"=>"No Data");
		// }
		return json_encode($arr);
	}
	public function acadexRegisterTeacher($fields)
	 {
		 if(!empty($fields['password']) && !empty($fields['email']) && !empty($fields['name']) && !empty($fields['phone']))
		 {
			$password = $fields['password'];
			$email = $fields['email'];
			$name = $fields['name'];
			$phone = $fields['phone'];
		$ch = curl_init();  
		$url = "https://www.pathshala.co/decore/new/api.php?action=TeacherLogin&userName=".$email."&pass=nullpass";
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$output=curl_exec($ch);
		curl_close($ch);
		$jsonOutput = json_decode($output,true);
		//var_dump($jsonOutput);
		if($jsonOutput['message'] == "Invalid user")
		{
			// New User ***** Call SignUP API
			$chh = curl_init();  
			$nameUrl = str_replace(" ", "%20", $name);
			$urll = "https://www.pathshala.co/decore/new/api.php?action=TeacherRegistration&email=".$email."&pass=".$password."&name=".$nameUrl."&phone=".$phone;
			curl_setopt($chh,CURLOPT_URL,$urll);
			curl_setopt($chh,CURLOPT_RETURNTRANSFER,true);
			$outputt=curl_exec($chh);
			curl_close($chh);
			//echo $outputt;
			$jsonSignup = json_decode($outputt, true);

			//var_dump($jsonSignup); 
			if($jsonSignup['msg'] == "Item has been added")
			{
				$arr = array("success"=>0,"code"=>1,"message"=>"Error");
			}
			else
			{
				$ip=$_SERVER['REMOTE_ADDR'];
				$sqq = "INSERT INTO `wl_acadex_Teacher` (`emailid`, `ip`, `user_type`) values ('".$email."','".$ip."', '1')";
				$sqq_query = mysqli_query($this->conn,$sqq); 
				$arr = array("success"=>1,"code"=>1,"message"=>"Success");

			}


		}
		else if($jsonOutput['message'] == "Invalid password")
		{
			// Old User
			$ip=$_SERVER['REMOTE_ADDR'];
			$sqq = "INSERT INTO `wl_acadex_Teacher` (`emailid`, `ip`) values ('".$email."','".$ip."')";
			$sqq_query = mysqli_query($this->conn,$sqq);  
			$arr = array("success"=>1,"code"=>1,"message"=>"Success");

		}
	 }
	 else
	 {
		$arr = array("success"=>-1,"code"=>-1,"message"=>"Invalid Request.");
	 }
	 return json_encode($arr);
	}
	
}
?>
