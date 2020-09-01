<?php
include_once('config.php');
class user extends DB{

	function __construct(){
		$this->connect();
		$this->connectTwo();
	}
	
	function loginAction($fields){
	 $response = array();
		 if($fields['userName']=="" || $fields['pass']==""){
			  $response = array("success"=>0,"code"=>0,"message"=>"Email ID or password can not be blank");
   	 }else{ 
		//$result = $this->conn->query($sql);
		$select_query = mysqli_query($this->conn,"Select * from wl_customers where user_name='".$fields['userName']."'");
		$chk_user = mysqli_num_rows($select_query);
		if($chk_user > 0){
		$rec = mysqli_fetch_array($select_query);
		if( $rec['password'] == $fields['pass'] ){
		
		//$response = array("status"=>1);
		$response['Result'] = array("success"=>1,"code"=>0);
		if($rec['picture']==""){
			 $image_url="https://www.pathshala.co/assets/designer/themes/default/images/logo_new.png";
			}else{
			   $image_url = "https://www.pathshala.co/uploaded_files/userfiles/images".$rec['picture'];

			}
		$response['Result']['data'][] = array( 
		  					"customers_id"  =>	$rec['customers_id'],
							"user_name"  	=>	$rec['user_name'],
							"first_name" 	=>	$rec['first_name'],
							"picture" 	 	=>	$image_url,
							"address" 		=>	$rec['address'],
							"pincode"  		=>	$rec['pincode'],
							"status"  		=>	$rec['status'],
							"is_verified"   =>	$rec['is_verified'],
							"phone_number"  =>	$rec['phone_number'],
							"credit_point"  =>	$rec['credit_point'],
							"lot"  			=>	$rec['lot'],
							"description"	=>	$rec['description'],
							"credit_point"	=>	$rec['credit_point'],
							"referral_code"	=>	$rec['referral_code'],
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
	
	function generatecode(){
 			$incSql 	   ="SHOW TABLE STATUS LIKE 'wl_customers'";
			$incQuery  	   = mysqli_query($this->conn,$incSql);
			$INcinfo 	   = mysqli_fetch_array($incQuery);
			return $invoice_number= "pco".$INcinfo['Auto_increment']; 
	
	}
	
	
	
	function registerUser($fields){
   
    if($fields['email']=="" || $fields['pass']=="") {
		$response = array("success"=>0,"code"=>0,"message"=>"Email ID or password can not be blank");
    }else{
		$sql="Select * from wl_customers where user_name='".$fields['email']."'";
        $check_user = mysqli_query($this->conn,$sql);
		$rec 		= mysqli_fetch_array($check_user);
        $num_rows 	= mysqli_num_rows($check_user);
		if($num_rows > 0){
			$response['Result'] = array("status"=>0,"message"=>"This email id is already registered");
        }else{
			$date 	= date('m/d/Y h:i:s a', time()); 
			$actkey	= md5($date).md5($fields['email']);
			//check referal
			if($fields['referral_code']!="") {
				$referal=$this->checkreferral($fields['referral_code']);
				if ($referal) {
				$this->generatecode();	
			 	$sql	= "INSERT INTO wl_customers (`user_name`,`password`,`first_name`,`phone_number`,`status`,`is_verified`,`account_created_date`,`actkey`,`referral_code`) VALUE ('".$fields['email']."','".$fields['pass']."','".$fields['name']."','".$fields['phone']."','1','1','".$date."','".$actkey."','".$this->generatecode()."')";//die;
			$insert_qry = mysqli_query($this->conn,$sql);
			$last_id 	= $this->conn->insert_id;	
			$row		= $this->getStudent_from_referal($fields['referral_code']);
			$this->addreferralPoint($row['customers_id'],$row['user_name'],$row['referral_code'],$last_id,$fields['email']);
				
			} else {
					$response['Result'] = array("status"=>0,"message"=>"referral code Code not valid");
			}
				
			} else {
				
			 $sql	= "INSERT INTO wl_customers (`user_name`,`password`,`first_name`,`phone_number`,`status`,`is_verified`,`account_created_date`,`actkey`,`referral_code`) VALUE ('".$fields['email']."','".$fields['pass']."','".$fields['name']."','".$fields['phone']."','1','1','".$date."','".$actkey."','".$this->generatecode()."')";
			$insert_qry = mysqli_query($this->conn,$sql);
			}
			
		$response['Result'] = array("success"=>1,"code"=>0,"msg"=>"Item has been added");
		}
	 }
    return json_encode($response);
}
	
	
	function checkreferral($code){
		
		$sql = "SELECT * FROM `wl_customers` where  referral_code='".$code."'";
		$check_user = mysqli_query($this->conn,$sql);
        $num_rows 	= mysqli_num_rows($check_user);
		if($num_rows > 0){
			return true;
		}else{
			return false;
		}
	}	
	
	function addreferralPoint($pid,$pemail,$pcode,$cid,$cemail) {
		$date 	= date('m/d/Y h:i:s a', time()); 
		$data=array(
			'parent_id'		=> $pid,
			'parent_email'	=> $pemail,
			'child_id'		=> $cid,
			'child_email'	=> $cemail,
			'referral_code' => $pcode,
			'point_added'	=>'2',
			'created_at'=>$date,
		);
		$insert=$this->qry_insert('customer_referral_history',$data);
		
		//insert in to user credit
		if($insert){
			$row			= $this->getStudent($pid);
			$currentCredit  = $row['credit_point'];
			$newCredit		= $currentCredit+2;
			$sql="UPDATE wl_customers SET credit_point = '".$newCredit."' WHERE customers_id='".$pid."'";
			$select_query 	= mysqli_query($this->conn,$sql);
		}
		/*$data2=array(
			'student_id' => $cid
		);
		$insert=$this->qry_insert('wl_student_credit_record',$data2);
		*/
	}
	
	
	function referralHistory($fields){
		$arr=array();
		if($fields['customers_id']==""){
        	$arr = array("success"=>0,"code"=>0,"message"=>"Student Id can not be blank");
    	}else{
		 	$sql="SELECT * FROM `customer_referral_history` where parent_id='".$fields['customers_id']."'";
			$sub_res = mysqli_query($this->conn,$sql);
			while($rec  = mysqli_fetch_array($sub_res)){
					
			$childRow=$this->getStudent($rec['child_id']);
			//print_r($childRow);die;
			$arr['Result']['data'][] = array(
										'parent_id'			=>$rec['parent_id'],
										'parent_email'		=>$rec['parent_email'],
										'child_id'			=>$rec['child_id'],
										'child_name'		=>$childRow['first_name'],
										'child_email'		=>$rec['child_email'],
										'point_added'		=>$rec['point_added'],
										'created_at'		=>$rec['created_at']
									);
			}
		}
		return json_encode($arr,JSON_UNESCAPED_SLASHES);
	}
	
	

	function forgotPassword($fields){
		if(isset($fields['teacher']) && isset($fields['email']))
		{

		
		if($fields['teacher'] == '0')
		{
			$check_user = mysqli_query($this->conn,"Select * from wl_customers where user_name='".$fields['email']."'");
		}
		else if($fields['teacher'] == '1')
		{
			$check_user = mysqli_query($this->conn,"Select * from wl_teacher where user_name='".$fields['email']."'");
		}
		
      $num_rows = mysqli_num_rows($check_user);
	  if($num_rows > 0){
	  $rec = mysqli_fetch_array($check_user);
	  // multiple recipients
	  $to  = $fields['email']; // note the comma
		$name = $rec['first_name'];
		// subject
		$subject = 'Forgot Password';
		$rand = $rec['password'];
		//$update_user = mysql_query("update users set password='".$rand."' where email='".$fields['email']."'");
		
		// message
		
		// To send HTML mail, the Content-type header must be set
		require 'lib/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->SMTPDebug = 0;

		$mail->Debugoutput = 'html';

		$mail->Host = 'email-smtp.us-east-1.amazonaws.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->SMTPKeepAlive =true;
		//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
		$mail->Username = "AKIA4X2JTRS5MLC572NV"; //from address
		$mail->Password = "BOT+lOCDlv+X3KFuBetzniF1jIIxqnPzPoKkAwNmEC7k"; //app-specific password
		$mail->setFrom('info@pathshala.co', 'Pathshala'); //change the email here to your email
		$mail->addReplyTo('pathshalaonweb@gmail.com', 'Pathshala'); //change the email to your email
		$mail->isHTML(true);
		$mail->addAddress($to, $name); //to-address
		$mail->Subject = $subject;
			$mail->Body    = "Hi $name,<br> <br>
			We have received password reset request.<br>
			Here is your password $rand<br><br>
			
			Best<br>
			Team Pathshala";

		if (!$mail->send()) {
			$response = array("status"=>1,"Message"=>"Email Not Sent");
		} else {
			$response = array("status"=>1,"Message"=>"Email Sent");
		}
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();
		
		// Mail it
		// $ismail = mail($to, $subject, $message, $headers);
	   	//print_r($ismail);
	   
	   
	   }else{
	   	        $response = array("status"=>0,"Message"=>"Email Id Not Registred");

	   }
	}
	else
	   {
		$response = array("status"=>-1,"Message"=>"Invalid request");
	   }
		    return json_encode($response);

	}
	
	
	
	function userDetail($fields){
		
		$response = array();
		$select_query = mysqli_query($this->conn,"Select * from wl_customers where customers_id='".$fields['user_id']."'");
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
        $pw=$this->conn->query("select password from wl_customers where customers_id= '" . $fields["user_id"] . "'");
                $row = $pw->fetch_object();
                $pawo = $row->password ; 
		
		if($fields['oldpw']== $pawo){
        if ($fields['newpw']==$fields['conpw']){
         $this->conn->query("UPDATE wl_customers SET password='" . $fields['newpw'] . "' WHERE customers_id='" . $fields['user_id'] . "'");
		 $response['Result'] = array("status"=>1,"message"=>"successfully changed");
         }
        else { 
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
 	
	
	 
	
	 
	public function editProfile($fields){
	
	$response = array();
	if($fields['user_id']==""){
        $response = array("success"=>0,"code"=>0,"message"=>"UserId can not be blank");
    }else{
	
	if($fields['name']=="" || $fields['phone']=="" || $fields['address']=="" || $fields['classdropdown'] == ""){
	      $response = array("status"=>0,"message"=>"Fields cannot Blank");
	}else{	
		$sql="UPDATE wl_customers SET first_name = '".$fields['name']."', phone_number = '".$fields['phone']."',address = '".$fields['address']."',pincode = '".$fields['pincode']."',class_dropdown = '".$fields['classdropdown']."'  WHERE customers_id='".$fields['user_id']."'";
        $insert_qry = mysqli_query($this->conn,$sql);
        $response['Result'] = array("success"=>1,"code"=>0,"msg"=>"Updated ");
     }
	}
    return json_encode($response);
	
	
	}  
	
	
	 public function blog() {
		$response = array();
		$sql="SELECT * FROM `wl_blog` WHERE `status`='1' ORDER BY `blog_id` DESC ";
		$select_query = mysqli_query($this->conn,$sql);
		mysqli_set_charset($this->conn, 'utf8');
		$arr['Result'] = array("success"=>1,"code"=>0);
		while($rec = mysqli_fetch_array($select_query)) {
			//print_r($rec['detail']);
			$arr['Result']['data'][] = array(  
									'blog_id'				=> $rec['blog_id'],
									'category_id'			=> $rec['category_id'],
									'category_name'			=> $this->getblogcat($rec['category_id']),
									'title'					=> $this->test_input($rec['title']),
									"detail"				=> $this->test_input($rec['detail']),
									"blog_image"			=> "https://www.pathshala.co/uploaded_files/blog/".$rec['blog_image'],
									"blog_image_thumbnail"	=> "https://www.pathshala.co/uploaded_files/blog/".$rec['blog_image_thumbnail'],
									"blog_date_added"		=> $rec['blog_date_added'],
									);
				}
			return json_encode($arr,JSON_UNESCAPED_SLASHES);
	 }
	 
	function test_input($data) {
		
		$data = trim($data);
		//$data = stripslashes($data);
		//$data = htmlspecialchars($data);
		//$data = html_entity_decode($data);
		$data = strip_tags($data);
		$data = preg_replace('/[^A-Za-z0-9 ]/', '', $data);
		$val  = array("\n","\r");
		$data = str_replace($val, "", $data);
  		return $data;
		
	}
	
	function strip_tags_content($text) {

    return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);

 }
 
  public function getStudent($fields){
	  $sql="Select * from wl_customers where customers_id='".$fields."' ";//die;
	 $select_query = mysqli_query($this->conn,$sql);
	 $rec = mysqli_fetch_array($select_query);
	 return $rec;
  }
  
  public function getStudent_from_referal($fields){
	 $sql="Select * from wl_customers where referral_code='".$fields."'";
	 $select_query = mysqli_query($this->conn,$sql);
	 $rec = mysqli_fetch_array($select_query);
	 return $rec;
  }
	 
	
	 function getStudentAddress($id){
			
				$sql		  = "SELECT * FROM `wl_customers` where customers_id='".$id."'";
				$select_query = mysqli_query($this->conn,$sql);
				$rec 		  = mysqli_fetch_array($select_query);
				return 		  $rec['address'];
				
		}
 /*course booking*/
 
	 public function coursebooking($fields){
		 $response=array();
		 if ($fields['user_id']=="" || $fields['courses_id']==""){
	      	$response = array("status"=>0,"message"=>"Fields cannot Blank");
		 } else {
			$incSql 	   ="SHOW TABLE STATUS LIKE 'wl_order'";
			$incQuery  	   = mysqli_query($this->conn,$incSql);
			$INcinfo 	   = mysqli_fetch_array($incQuery);
			$invoice_number= "Wl_".$INcinfo['Auto_increment']; 
			$student	   =$this->getStudent($fields['user_id']);
			$date 		   = date('m/d/Y h:i:s ', time());
			$data_order    = 
				array(
						'customers_id'        => $fields['user_id'],
						'courses_id'          => $fields['courses_id'],
						'invoice_number'      => $invoice_number,					
						'first_name'          => $student['first_name'],
						'last_name'           => $student['last_name'],
						'phone'				  => $student['phone_number'],
						'email'               => $student['user_name'],
						'address'			  => $this->getStudentAddress($fields['user_id']),
						'tax_amount'     	  => '00:00',
						'tax_type'     		  => '00:00',
						'discount_amount'	  => '00:00',
						'total_amount'        => '00:00',
						'order_received_date' => $date,
						'payment_method'      => '',
						'payment_status'      => 'paid',
						'type'				  => '1',
						'payment_mode'		  => 'free',
					);
				$this->qry_insert('wl_order',$data_order);
				$orderId =  mysqli_insert_id($this->conn);
				
				$abc=$student['lot'];
				if(!empty($abc)){
					$course=  explode(",",$abc) ;
				}else{
					$course=array();
				}
				$course=  explode(",",$abc) ;
				$original_array =$course; 
				
				$inserted_value = $fields['courses_id']; 
				$position = count($original_array); 
				//array_splice() function  
				array_splice($original_array,$position, 0,$inserted_value);  
				$newLot=implode(",",$original_array);
				
				$sql="UPDATE wl_customers SET lot = '".$newLot."'WHERE customers_id='".$fields['user_id']."'";
			$insert_qry = mysqli_query($this->conn,$sql);
				
			    $response['Result'] = array("success"=>1,"code"=>0,'orderId'=>$orderId,"msg"=>"Item has been added");	
		 }
		return json_encode($response,JSON_UNESCAPED_SLASHES);			
	 }
 
 
 
 
 
 
 public function studentCreditRecord($fields){
	 		$arr=array();
			if($fields['user_id']==""){
				$arr = array("success"=>0,"code"=>0,"message"=>"UserId can not be blank");
			}else{
				$sql="SELECT * FROM `wl_student_credit_record` where student_id='".$fields['user_id']."'";
				$sub_res = mysqli_query($this->conn,$sql);
				while($res  = mysqli_fetch_array($sub_res)){
					$arr['Result']['data'][] = array(
							"id"			=>	$res['id'],
							"plan_id"		=>	$res['plan_id'],
							"transaction_id"=>	$res['transaction_id'],
							"phone"			=>	$res['phone'],
							"email"			=>	$res['email'],
							"invoice_number"=>	$res['invoice_number'],
							"credit"		=>	$res['credit'],
							"credit_amount"	=>	$res['credit_amount'],
							"total_amount"	=>	$res['total_amount'],
							"tax_amount"	=>	$res['tax_amount'],
							"tax_type"		=>	$res['tax_type'],
							"previous_amount"	=>	$res['previous_amount'],
							"after_payment_amount"	=>	$res['after_payment_amount'],
							"order_status"		=>	$res['order_status'],
							"order_received_date"	=>	$res['order_received_date'],
							"payment_received_date"	=>	$res['payment_received_date'],
							"payment_method"	=>	$res['payment_method'],
							"payment_status"	=>	$res['payment_status'],
							"bank_ref_num"		=>	$res['bank_ref_num'],
							"bankcode"			=>	$res['bankcode'],
							"coupon_id"			=>	$res['coupon_id'],
							"coupon_code"		=>	$res['coupon_code'],
							"discount_amount"	=>	$res['discount_amount']
							
							
					);
				}
			}
	 return json_encode($arr,JSON_UNESCAPED_SLASHES);
	 }
	
	public function enquiry($fields){
	
	if($fields['userid']=="" ){
		$response = array("success"=>0,"code"=>0,"message"=>"User ID can not be blank");
    }else{
		
		$id=$fields['userid'];
		$sql1			= "SELECT * FROM `wl_customers` where customers_id='".$id."'";
		$select_query1  = mysqli_query($this->conn,$sql1);
		$rec 		    = mysqli_fetch_array($select_query1);
		$date 	= date('m/d/Y h:i:s a', time()); 
		
		$sql="INSERT INTO wl_enquiry_custom (`email`,`name`,`phone_number`,`mobile`,`subject`,`message`,`type`,`customers_id`,`receive_date`) VALUE ('".$rec['user_name']."','".$rec['first_name']."','".$fields['phone']."','".$rec['mobile_number']."','".$fields['subject']."','".$fields['message']."','0','".$rec['customers_id']."','".$date."')";
		$insert_qry = mysqli_query($this->conn,$sql);
		
        $response['Result'] = array("success"=>1,"code"=>0,"msg"=>"Item has been added");
		
    }
    return json_encode($response);
	}
	
	
	
	public function normalenquiry($fields){
		
		if($fields['email']=="" ||$fields['name']==""){
			$response = array("success"=>0,"code"=>0,"message"=>"User ID can not be blank");
		}else{
			$date 	= date('m/d/Y h:i:s a', time()); 
			$sql="INSERT INTO wl_enquiry (`type`,`email`,`first_name`,`phone_number`,`mobile`,`subject`,`message`,`receive_date`) VALUE ('1','".$fields['email']."','".$fields['name']."','".$fields['phone_number']."','".$fields['mobile']."','".$fields['subject']."','".$fields['message']."','".$date."')";
			$insert_qry = mysqli_query($this->conn,$sql);
			$response['Result'] = array("success"=>1,"code"=>0,"msg"=>"Item has been added");
			
		}
		
    	return json_encode($response);
	}
	
	
	
	
	
	
	
	/*++++++++++++++++++++++++++++++++++++++++ user plan++++++++++++++++++++++++++++++++++*/
	
	public function userplan() {
		$response = array();
		$sql="SELECT * FROM `wl_studentplan` WHERE `status`='1' ORDER BY `plan_id` DESC ";
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
	 
	public function byPlanStart($fields){
		$response = array();
		if($fields['customers_id']=="" || $fields['plan_id']==""){
			 $response = array("success"=>0,"code"=>0,"message"=>"Student ID or Plan Id can not be blank");
		} else {
			$date 	= date('m/d/Y h:i:s a', time());
			
			
			$incSql 	   ="SHOW TABLE STATUS LIKE 'wl_order'";
			$incQuery  	   = mysqli_query($this->conn,$incSql);
			$INcinfo 	   = mysqli_fetch_array($incQuery);
			$invoice_number= "Wl_".$INcinfo['Auto_increment'];
			//die();
			$sql		   = "SELECT * FROM `wl_customers` WHERE `customers_id` = '".$fields['customers_id']."'";
			$select_query  = mysqli_query($this->conn,$sql);
			$mem_info 	   = mysqli_fetch_array($select_query);
			
			$sql1		   = "SELECT * FROM `wl_studentplan` WHERE `plan_id` = '".$fields['plan_id']."'";
			$select_query1 = mysqli_query($this->conn,$sql1);
			$plan_info 	   = mysqli_fetch_array($select_query1);
			
			$sql11		    = "SELECT * FROM `wl_tax` WHERE `tax_id` = '1'";
			$select_query11 = mysqli_query($this->conn,$sql11);
			$tax_res 	    = mysqli_fetch_array($select_query11);
			
			$tax_amount		=$tax_res['tax_rate']*$plan_info['price']/100;
			$totalAmount	=$price+$tax_amount;
			
			$data_order   = 
					   array(
							'customers_id'        => $fields['customers_id'],
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
							'type'				  => '1'
							
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
	
	public function userPlanBuyhistory($fields){
		$response = array();
		if($fields['userid']=="" ) {
		$response = array("success"=>0,"code"=>0,"message"=>"User ID can not be blank");
   		} else {
		$sql="SELECT * FROM `wl_student_credit_record` WHERE `student_id`='".$fields['userid']."' ORDER BY `id` DESC ";
		$select_query = mysqli_query($this->conn,$sql);
		mysqli_set_charset($this->conn, 'utf8');
		$arr['Result'] = array("success"=>1,"code"=>0);
		while($rec = mysqli_fetch_array($select_query)) {
		$arr['Result']['data'][] = array(   
										'plan_id'		=>$rec['plan_id'],
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
										"previous_amount"		=>$rec['previous_amount'],
										"after_payment_amount"	=>$rec['after_payment_amount'],
										"order_status"			=>$rec['order_status'],
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
	function getblogcat($id){
			$sql		  = "SELECT * FROM `wl_blogcategory` where blogcategory_id='".$id."'";
			$select_query = mysqli_query($this->conn,$sql);
			$rec 		  = mysqli_fetch_array($select_query);
			
			return 		$rec['name'];
	}
		
	function getplanName($id){
			$sql		  = "SELECT * FROM `wl_studentplan` where plan_id='".$id."'";
			$select_query = mysqli_query($this->conn,$sql);
			$rec 		  = mysqli_fetch_array($select_query);
			/*if(!empty($rec['customer_photo'])){
				$image =	"https://www.pathshala.co/uploaded_files/userfiles/images/".$rec['customer_photo'];
			}else{
				$image =	$rec['customer_photo'];
			}*/
			return 		$rec['name'];
	}
	
	
	public function getStudentCourse($fields){
		$response = array(); 
		if($fields['userid']=="" ) {
		$response = array("success"=>0,"code"=>0,"message"=>"User ID can not be blank");
   		} else {
		$res['Result'] = array("success"=>1,"code"=>0);
		$sql			= "SELECT * FROM `wl_customers` WHERE `customers_id`='".$fields['userid']."'";
		$select_query 	= mysqli_query($this->conn,$sql);
		$row 			= mysqli_fetch_array($select_query);
		$course			= explode(",",$row['lot']);
		$result 		= array();
		for ($i=0; $i<count($course); $i++) {
			$sel_q ="SELECT * FROM `tbl_courses` where courses_id='".$course[$i]."' AND status='1' ORDER BY courses_id ASC";
			$selectQuery 	= mysqli_query($this->connTwo,$sel_q);
			//$sub_res 		= mysqli_fetch_array($selectQuery);
			while($sub_res 	= mysqli_fetch_array($selectQuery)) {
				//echo "<pre>";print_r($sub_res);
				$res['Result']['data'][] = array(   
								'courses_id'		=>$sub_res['courses_id'],
								'courses_name'		=>$this->test_input($sub_res['courses_name']),
								'courses_code'		=>$this->test_input($sub_res['courses_code']),
								//'image'				=>$sub_res['image'],
				);
			}
			$arr=array_merge($response,$res);
		}
		//mysqli_set_charset($this->conn, 'utf8');
	}
	
		
	return json_encode($arr);	
	}
	
	 
	public function getMockExam($fields) {
		$response = array(); 
		if($fields['userid']=="" ) {
			$response = array("success"=>0,"code"=>0,"message"=>"User ID can not be blank");
   		} else {
			$res['Result'] = array("success"=>1,"code"=>0);
			$sql			= "SELECT * FROM `wl_customers` WHERE `customers_id`='".$fields['userid']."'";
			$select_query 	= mysqli_query($this->conn,$sql);
			$row 			= mysqli_fetch_array($select_query);
			//$course			= explode(",",$row['lot']);
			$result 		= array();
			//print_r($row );die;
			if(!empty($row['lot'])) {
			$courses =  explode(",",$row['lot']);
			$course1 =  array_filter(array_unique($courses));
			$course2 =  implode(',',$course1);
			$course  =  explode(",",$course2);
			//print_r($course ); 
			if(!empty($course)) {
			for ($i=0; $i<count($course); $i++) {
				$sel_q ="SELECT * FROM `tbl_mock` where course_id='".$course[$i]."'  ORDER BY mock_id ASC";
				$selectQuery 	= mysqli_query($this->connTwo,$sel_q);
				//$row 			= mysqli_fetch_array($select_query);
				while($sub_res 	= mysqli_fetch_array($selectQuery)) {
						$res['Result']['data'][] = array(   
								'mock_id'			=>$sub_res['mock_id'],
								'course_id'			=>$sub_res['course_id'],
								'exam_date'			=>$sub_res['exam_date'],
								'mock_title'		=>$this->test_input($sub_res['mock_title']),
								'mock_description'	=>$this->test_input($sub_res['mock_description']),
								'mode_of_exam'		=>$sub_res['mode_of_exam'],
								'str_total_time'	=>$sub_res['str_total_time'],
								'str_negative_mark'	=>$sub_res['str_negative_mark'],
								'date_of_exam'		=>$sub_res['date_of_exam'],
								'total_question'	=>$sub_res['total_question'],
								//'exam_date'		=>$sub_res['exam_date'],
				  );
				  
				}	
				$arr=array_merge($response,$res);
			}
		  }//first if
		 }//second if
		}
		return json_encode($arr);	
	} 
	  
	public function MockSubject($fields){
		$response = array(); 
			if($fields['mock_id']=="" ) {
				$response = array("success"=>0,"code"=>0,"message"=>"Mock ID can not be blank");
			} else {
				$res['Result'] = array("success"=>1,"code"=>0);
				$sel_q ="SELECT * FROM `tbl_mock_subject` where mock_id='".$fields['mock_id']."' ORDER BY subject_id ASC"; 
				$selectQuery 	= mysqli_query($this->connTwo,$sel_q);
				while($sub_res 	= mysqli_fetch_array($selectQuery)) {
					$response['Result']['data'][] = array(   
								'subject_id'		=>$sub_res['subject_id'],
								'mock_id'			=>$sub_res['mock_id'],
								'subject_name'		=>$this->test_input($sub_res['subject_name']),
								'status'			=>$sub_res['status'],
								'total_mark'		=>$sub_res['total_mark'],
								'total_que'			=>$sub_res['total_que'],
								//'status'			=>$sub_res['status'],
					);
				}
			}
			
		return json_encode($response,JSON_UNESCAPED_SLASHES);	
		} 
	 
	 
	 public function MockQuestion($fields){
		$response = array(); 
			if($fields['subject_id']=="" ) {
				$response = array("success"=>0,"code"=>0,"message"=>"Subject ID can not be blank");
			} else {
				$res['Result'] = array("success"=>1,"code"=>0);
				$sel_q ="SELECT * FROM `tbl_mock_question` where subject_id='".$fields['subject_id']."'"; 
				$selectQuery 	= mysqli_query($this->connTwo,$sel_q);
				while($sub_res 	= mysqli_fetch_array($selectQuery)) {
					$response['Result']['data'][] = array(   
								'question_id'		=>$sub_res['question_id'],
								'department_id'		=>$sub_res['department_id'],
								'subject_id'		=>$sub_res['subject_id'],
								'question'			=>$this->test_input($sub_res['question']),
								'que_img'			=>$sub_res['que_img'],
								'option_i'			=>$this->test_input($sub_res['option_i']),
								'option_ii'			=>$this->test_input($sub_res['option_ii']),
								'option_iii'		=>$this->test_input($sub_res['option_iii']),
								'option_iv'			=>$this->test_input($sub_res['option_iv']),
								'option_v'			=>$this->test_input($sub_res['option_v']),
								'option_vi'			=>$this->test_input($sub_res['option_vi']),
								
								'answer'			=>$this->test_input($sub_res['answer']),
								
								'status'			=>$sub_res['status'],
					);
				}
			}
			
		return json_encode($response,JSON_UNESCAPED_SLASHES);	
		} 
	 
	 
	 
	 
	 
	 public function getOnlineExam($fields) {
		$response = array(); 
		if($fields['userid']=="" ) {
			$response = array("success"=>0,"code"=>0,"message"=>"User ID can not be blank");
   		} else {
			$res['Result'] = array("success"=>1,"code"=>0);
			$sql			= "SELECT * FROM `wl_customers` WHERE `customers_id`='".$fields['userid']."'";
			$select_query 	= mysqli_query($this->conn,$sql);
			$row 			= mysqli_fetch_array($select_query);
			//$course			= explode(",",$row['lot']);
			$result 		= array();
			//print_r($row );die;
			if(!empty($row['lot'])) {
			$courses =  explode(",",$row['lot']);
			$course1 =  array_filter(array_unique($courses));
			$course2 =  implode(',',$course1);
			$course  =  explode(",",$course2);
			//print_r($course ); 
			if(!empty($course)) {
			for ($i=0; $i<count($course); $i++) {
				$sel_q ="SELECT * FROM `tbl_subject` where course_id='".$course[$i]."'  ORDER BY sort_order ASC";
				$selectQuery 	= mysqli_query($this->connTwo,$sel_q);
				//$row 			= mysqli_fetch_array($select_query);
				while($sub_res 	= mysqli_fetch_array($selectQuery)) {
						$res['Result']['data'][] = array(   
								'subject_id'		=>$sub_res['subject_id'],
								'course_id'			=>$sub_res['course_id'],
								'subject_name'		=>$this->test_input($sub_res['subject_name']),
								'status'			=>$sub_res['status'],
					 );
				  
				}	
				$arr=array_merge($response,$res);
			}
		  }//first if
		 }//second if
		}
		return json_encode($arr);	
	}  
	
	public function OnlineSubject($fields){
		$response = array(); 
			if($fields['subject_id']=="" ) {
				$response = array("success"=>0,"code"=>0,"message"=>"Subject ID can not be blank");
			} else {
				$res['Result'] = array("success"=>1,"code"=>0);
				$sel_q ="SELECT * FROM `tbl_lession` where subject_id='".$fields['subject_id']."' ORDER BY sort_order ASC";
				$selectQuery 	= mysqli_query($this->connTwo,$sel_q);
				while($sub_res 	= mysqli_fetch_array($selectQuery)) {
					$response['Result']['data'][] = array(   
								'lession_id'		=>$sub_res['lession_id'],
								'subject_id'		=>$sub_res['subject_id'],
								'lession'			=>$this->test_input($sub_res['lession']),
								'exam_type'			=>$sub_res['exam_type'],
								'total_question'		=>$sub_res['total_question'],
								'str_total_mark'		=>$sub_res['str_total_mark'],
								'courses_description'	=>$this->test_input($sub_res['courses_description']),
								'exam_date'			=>$sub_res['exam_date'],
								'str_total_time'	=>$sub_res['str_total_time'],
								'sort_order'		=>$sub_res['sort_order'],
								'status'			=>$sub_res['status'],
					);
				}
			}
			
		return json_encode($response,JSON_UNESCAPED_SLASHES);	
		} 
	
	 public function OnlineQuestion($fields){
		$response = array(); 
			if($fields['lession_id']=="" ) {
				$response = array("success"=>0,"code"=>0,"message"=>"Subject ID can not be blank");
			} else {
				$res['Result'] = array("success"=>1,"code"=>0);
				$sel_q ="SELECT * FROM `tbl_question` where lession_id='".$fields['lession_id']."'";
				$selectQuery 	= mysqli_query($this->connTwo,$sel_q);
				while($sub_res 	= mysqli_fetch_array($selectQuery)) {
					$response['Result']['data'][] = array(   
								'question_id'		=>$sub_res['question_id'],
								'lession_id'		=>$sub_res['lession_id'],
								'question'			=>$this->test_input($sub_res['question']),
								'option_i'			=>$this->test_input($sub_res['option_i']),
								'option_ii'			=>$this->test_input($sub_res['option_ii']),
								'option_iii'		=>$this->test_input($sub_res['option_iii']),
								'option_iv'			=>$this->test_input($sub_res['option_iv']),
								'answer'			=>$this->test_input($sub_res['answer']),
								'status'			=>$sub_res['status'],
					);
				}
			}
			
		return json_encode($response,JSON_UNESCAPED_SLASHES);	
		} 
	
	public function qry_insert($table,$data){
			 $fields = array_keys($data );  
			 $values = array_values( $data );
			 $sql="INSERT INTO $table(".implode(",",$fields).") VALUES ('".implode("','", $values )."')";
			 //echo $sql;//die;
			 $result=$this->conn->query($sql);
			 return $result;

	}
	function studentLiveClassDropdown($fields)

		{
			if(!empty($fields['key']) && $fields['key']=="pathshala5572" && !empty($fields['email_id']))
			{
				$sql		  ="SELECT `class_dropdown` FROM `wl_customers` where `user_name`='".$fields['email_id']."'";
				$select_query = mysqli_query($this->conn,$sql);
				$rec  = mysqli_fetch_array($select_query);
				
					if($rec['class_dropdown']=="")
					{
						$arr = array("success"=>0,"code"=>0,"message"=>"ClassDrownIsNull");
					}
					else
					{
						$arr = array("success"=>1,"code"=>1,"message"=>$rec['class_dropdown']);
					}
				
				return json_encode($arr);

			}
		}	

 }
?>