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
			   $image_url = "https://www.pathshala.co//uploaded_files/userfiles/images".$rec['picture'];

			}
		$response['Result']['data'][] = array( 
		  					"customers_id"  =>$rec['customers_id'],
							"user_name"  	=>$rec['user_name'],
							"first_name" 	=>$rec['first_name'],
							"picture" 	 	=>$image_url,
							"address" 		=>$rec['address'],
							"pincode"  		=>$rec['pincode'],
							"status"  		=>$rec['status'],
							"is_verified"   =>$rec['is_verified'],
							"phone_number"  =>$rec['phone_number'],
							"credit_point"  =>$rec['credit_point'],
							"lot"  			=>$rec['lot'],
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
		$sql="Select * from wl_customers where user_name='".$fields['email']."'";
        $check_user = mysqli_query($this->conn,$sql);
        $num_rows = mysqli_num_rows($check_user);
        if($num_rows > 0){
            $response['Result'] = array("status"=>0,"message"=>"This email id is already registered");
        }else{
			
			$date 	= date('m/d/Y h:i:s a', time()); 
			$actkey	= md5($date).md5($fields['email']);
           
		    $sql="INSERT INTO wl_customers (`user_name`,`password`,`first_name`,`phone_number`,`status`,`is_verified`,`account_created_date`,`actkey`) VALUE ('".$fields['email']."','".$fields['pass']."','".$fields['name']."','".$fields['phone']."','1','1','".$date."','".$actkey."')";
			
			
            $insert_qry = mysqli_query($this->conn,$sql);
            
			
			$response['Result'] = array("success"=>1,"code"=>0,"msg"=>"Item has been added");
			
        }
    }
    return json_encode($response);
}
	

	function forgotPassword($fields){
	  $check_user = mysqli_query($this->conn,"Select * from wl_customers where user_name='".$fields['email']."'");
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
	
	if($fields['name']=="" || $fields['phone']=="" || $fields['address']==""){
	      $response = array("status"=>0,"message"=>"Fields cannot Blank");
	}else{	
		$sql="UPDATE wl_customers SET first_name = '".$fields['name']."', phone_number = '".$fields['phone']."',address = '".$fields['address']."',pincode = '".$fields['pincode']."',description = '".$fields['description']."'  WHERE customers_id='".$fields['user_id']."'";
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
	
	  
	  
	  
	  
	
	
	public function qry_insert($table,$data){
			 $fields = array_keys($data );  
			 $values = array_values( $data );
			 $sql="INSERT INTO $table(".implode(",",$fields).") VALUES ('".implode("','", $values )."')";
			 //echo $sql;//die;
			 $result=$this->conn->query($sql);
			 return $result;

	}

 }
?>