<?php
include_once('config.php');
class Teacher extends DB{

	function __construct(){
		$this->connect();
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
		//$result = $this->conn->query($sql);
		$select_query = mysqli_query($this->conn,"Select * from wl_teacher where user_name='".$fields['userName']."'");
		$chk_user = mysqli_num_rows($select_query);
		if($chk_user > 0){
		$rec = mysqli_fetch_array($select_query);
		if( $rec['password'] == $fields['pass'] ){
		//$response['Result'] = array("success"=>1,"code"=>0);
		$response = array("status"=>1);
		$response['Result']= array($rec,);
		}else{
		
		   $response = array("status"=>0,'message'=>"Invalid password");
		}
		}else{
		$response = array("status_code"=>0,"status"=>0,'message'=>"Invalid user");
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
				
				$date 	= date('m/d/Y h:i:s a', time()); 
				$actkey	= md5($date).md5($fields['email']);
				$date	= date('Y-m-d', strtotime($date. ' + 30 days'));
				$sql="INSERT INTO wl_teacher (`user_name`,`password`,`first_name`,`phone_number`,`account_created_date`,`status`,`is_verified`,`current_credit`,`plan_expire`,`actkey`) VALUE ('".$fields['email']."','".$fields['pass']."','".$fields['name']."','".$fields['phone']."','".$date."','1','1','5','".$date."','".$actkey."')";
				
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
		$select_query = mysqli_query($this->conn,"Select * from wl_teacher where teacher_id='".$fields['user_id']."'");
		$rec = mysqli_fetch_array($select_query);
		
		$response['Result'] = array("status"=>1);
		$response['Result']['user_data'][] = array($rec);
		
		return json_encode($response);
	
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
 

	public function teachernotified($fields){
		
		$response = array();
		$select_query = mysqli_query($this->conn,"Select * from wl_teacher_notified where teacher_id=".$fields['teacher_id']." ORDER BY `id` DESC");
		$arr['Result'] = array("success"=>1,"code"=>0);
		
		while($rec = mysqli_fetch_array($select_query)){
		
		$student=$this->getStudent($rec['student_id']);	
		
		//print_r($student);
		$arr['Result']['data'][]	= array(  
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
		}
		
		return json_encode($arr,JSON_UNESCAPED_SLASHES);
	}

 
 public function getStudent($fields){
	 
	 $sql="Select first_name,user_name,phone_number from wl_customers where customers_id=".$fields." ";
	 $select_query = mysqli_query($this->conn,$sql);
	 $rec = mysqli_fetch_array($select_query);
	 return $rec;
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
 
 
	 public function editProfile($fields){
		$response = array();
		if($fields['teacher_id']==""){
			$response = array("success"=>0,"code"=>0,"message"=>"UserId can not be blank");
		}else{
		
		if($fields['name']=="" || $fields['phone']=="" || $fields['address']==""){
			  $response = array("status"=>0,"message"=>"Fields cannot Blank");
		}else{	
			$sql="UPDATE wl_teacher SET first_name = '".$fields['name']."', phone_number = '".$fields['phone']."',address = '".$fields['address']."',pincode = '".$fields['pincode']."',description = '".$fields['description']."'  WHERE teacher_id='".$fields['teacher_id']."'";
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
		
		
		public function updateProfile($fields){
			$response = array();
			if($fields['teacher_id']=="" || $fields['id']==""){
			$response = array("success"=>0,"code"=>0,"message"=>"Teacher Id can not be blank");
			}else{
			/*$sql="INSERT INTO wl_teacher_profile (`teacher_id`,`category`,`subject`,`class`,`location`,`state_id`,`city_id`,`fee`,`bath_time`) VALUE ('".$fields['teacher_id']."','".$fields['category']."','".$fields['subject']."','".$fields['class']."','".$fields['location']."','".$fields['state_id']."','".$fields['city_id']."','".$fields['fee']."','".$fields['bath_time']."')";*/
			$sql="UPDATE wl_teacher_profile SET category = '".$fields['category']."', subject = '".$fields['subject']."',class = '".$fields['class']."',location = '".$fields['location']."',state_id = '".$fields['state_id']."',city_id = '".$fields['city_id']."',fee = '".$fields['fee']."',bath_time = '".$fields['bath_time']."'  WHERE teacher_id='".$fields['teacher_id']."' AND id='".$fields['id']."'";
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
		
 }
?>