<?php
include_once('config.php');
class user extends DB{

	function __construct(){
		$this->connect();
	}
	
	function loginAction($fields){
		
		
		$response = array();
		//$result = $this->conn->query($sql);
		$select_query = mysqli_query($this->conn,"Select * from wl_customers where user_name='".$fields['userName']."'");
		$chk_user = mysqli_num_rows($select_query);
		if($chk_user > 0){
		$rec = mysqli_fetch_array($select_query);
		if( $rec['password'] == $fields['pass'] ){
		//$response['Result'] = array("success"=>1,"code"=>0);
		$response = array("status"=>1);
		$response['Result']= array(
		  					$rec,
						);
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
									'title'					=> $this->test_input($rec['title']),
									"detail"				=> $this->test_input($rec['detail']),
									"blog_image"			=> $rec['blog_image'],
									"blog_image_thumbnail"	=> $rec['blog_image_thumbnail'],
									"blog_date_added"		=> $rec['blog_date_added'],
									);
				}
			return json_encode($arr,JSON_UNESCAPED_SLASHES);
	 }
	 
	function test_input($data) {
		
		$data = trim($data);
		//$data = stripslashes($data);
		//$data = htmlspecialchars($data);
		$data = html_entity_decode($data);
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
	 function usercredit($fields){
		
		
		$response = array();
		//$result = $this->conn->query($sql);
		$select_query = mysqli_query($this->conn,"Select credit_point from wl_customers where user_name='".$fields['userName']."'");
		$chk_user = mysqli_num_rows($select_query);
		if($chk_user > 0){
		$rec = mysqli_fetch_array($select_query);
		if( $rec['credit_point'] >=1 ){
		//$response['Result'] = array("success"=>1,"code"=>0);
		$response = array("status"=>1);
		$response['Result']= array(
		  					$rec,
						);
		}else{
		
		   $response = array("status"=>0,'message'=>"Out of Credits");
		}
		}else{
		$response = array("status_code"=>0,"status"=>0,'message'=>"Invalid user");
		}
		return json_encode($response);

    }


 }
?>