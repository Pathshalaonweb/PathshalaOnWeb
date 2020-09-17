<?php
include_once('config.php'); 
class Searchteacher extends DB{

	function __construct(){
		$this->connect();
	}
	
	function cityAction($fields){
		
		$response = array();
		//$result = $this->conn->query($sql);
		if(!empty($fields['state_id'])){
		$select_query = mysqli_query($this->conn,"Select * from tbl_cities where state_id='".$fields['state_id']."'");
		}else{
		$select_query = mysqli_query($this->conn,"Select * from tbl_cities");
		}
		//$rec = mysqli_fetch_array($select_query);
		mysqli_set_charset($this->conn, 'utf8');
		$response['Result'] = array("success"=>1,"code"=>0);
		while($rec = mysqli_fetch_array($select_query)) {
			
				$response['Result']['data'][] = array( 
					'id'			=>$rec['id'],
					'name'			=>$rec['name'],
					'state_id'		=>$rec['state_id']
				);
				
		}
		
		//$response['Result'] = array("status"=>1);
		//$response['Result']['Data'][] = array($rec);
		
	return json_encode($response);
	}
	
	
	function stateAction($fields){
		
		
		$response = array();
		if(!empty($fields['state_id'])){
		$select_query = mysqli_query($this->conn,"Select * from tbl_states where id='".$fields['state_id']."' AND country_id='101'");
		}else{
		$select_query = mysqli_query($this->conn,"Select * from tbl_states where  country_id='101'");
		}
		mysqli_set_charset($this->conn, 'utf8');
		$response['Result'] = array("success"=>1,"code"=>0);
		while($rec = mysqli_fetch_array($select_query)) {
			
				$response['Result']['data'][] = array( 
					'id'			=>$rec['id'],
					'name'			=>$rec['name'],
					'state_id'		=>$rec['state_id']
				);
				
		}
		return json_encode($response);

	}
	
	function categoryAction($fields){
		
		
		$response = array();
		if(!empty($fields['category_id'])){
		$select_query = mysqli_query($this->conn,"Select * from wl_categories where category_id='".$fields['category_id']."'");
		}else{
		$select_query = mysqli_query($this->conn,"Select * from wl_categories");
		}
		$rec = mysqli_fetch_array($select_query);
		while($rec = mysqli_fetch_array($select_query)) {
			
				$response['Result']['data'][] = array( 
					'category_id'			=>$rec['category_id'],
					'category_name'			=> $this->test_input($rec['category_name']),
					'status'				=>$rec['status'],
					'parent_id'				=>$rec['parent_id'],
				);
		}
		
		
		
		//$response['Result'] = array("status"=>1);
		//$response['Result']['Data'][] = array($rec);
		return json_encode($response);

	}	
	
	function searchteachers($fields){
		$response = array();
		$where="  AND `a`.`account_approved` = '1'";
		if(!empty($fields['state']) && $fields['state']!="null"){
			$where .=" AND `b`.`state_id` = '".$fields['state']."' ";
		}
		if(!empty($fields['city']) && $fields['city']!="null"){
			$where .=" AND `b`.`city_id` = '".$fields['city']."' ";
		}
		//echo $fields['pincode'];
		if(!empty($fields['pincode']) && $fields['pincode']!="null"){
			 $where .=" AND `a`.`pincode` = '".$fields['pincode']."' ";
		}
		if(!empty($fields['classes']) && $fields['classes']!="null"){
			$where .=" AND `b`.`class` = '".$fields['classes']."' ";
		}
		if(!empty($fields['subject']) && $fields['subject']!="null"){
			$where .=" AND `b`.`subject` = '".$fields['subject']."' ";
		}
		if(!empty($fields['category']) && $fields['category']!="null"){
			$where .=" AND `b`.`category` = '".$fields['category']."' ";
		}
		if(!empty($fields['bath_time']) && $fields['bath_time']!="null"){
			$where .=" AND `b`.`bath_time` = '".$fields['bath_time']."' ";
		}
		if(!empty($fields['minprice'])  && $fields['minprice']!="null" && !empty($fields['maxprice'])  && $fields['maxprice']!="null" ){
			$where .=" AND `b`.`fee` BETWEEN '".$fields['minprice']."' AND '".$fields['maxprice']."'";
			//$where .="AND `b`.`fee` >= '".$fields['minprice']."' AND `b`.`fee` <= '".$fields['maxprice']."'";
		}
		if(!empty($fields['short_by']) && $fields['short_by']!="null"){
			$orderBy =" ORDER BY  `b`.`fee`  ".$fields['short_by']." ";
		} else {
			$orderBy =" ORDER BY `b`.`teacher_id` ASC";
		}
		
		
	 	$sql="SELECT DISTINCT SQL_CALC_FOUND_ROWS* FROM `wl_teacher` `a` INNER JOIN `wl_teacher_profile` `b` ON
			`b`.`teacher_id`=`a`.`teacher_id` WHERE `a`.`status` ='1' ".$where." GROUP BY `b`.`teacher_id` ".$orderBy."";
		$select_query = mysqli_query($this->conn,$sql);
		mysqli_set_charset($this->conn, 'utf8');
		$arr['Result'] = array("success"=>1,"code"=>0);
		
		while($rec = mysqli_fetch_array($select_query)) {
			
			
			$image=NULL;
			if(!empty($rec['picture'])){
				$image .="https://www.pathshala.co/uploaded_files/teacher/".$rec['picture'];
			}else{
				$image .="https://www.pathshala.co/assets/designer/themes/default/images/logo_new.png";
			}
			
			$arr['Result']['data'][] = array(   'teacher_id'	=>$rec['teacher_id'],
												'user_name'		=>$rec['user_name'],
												"first_name"	=>$rec['first_name'],
												"customer_photo"=>$image,
												"status"		=>$rec['status'],
												"is_verified"	=>$rec['is_verified'],
												"is_blocked"	=>$rec['is_blocked'],
												"address"		=>$rec['address'], 
												//"description"	=>strip_tags($rec['description']),
												"experience_year"=>$rec['experience_year'],
												"experience_month"=>$rec['experience_month'],
												"youtube"		=>$rec['youtube'],
												"image1"		=>$rec['image1'],
												"image1"		=>$rec['image1'],
												"image1"		=>$rec['image1'],
												"image1"		=>$rec['image1'],
												"pdf"			=>$rec['pdf'],
												"pdf1"			=>$rec['pdf1'],
												"pdf2"			=>$rec['pdf2'],
												"current_credit"=>$rec['current_credit'],
												"plan_expire"	=>$rec['plan_expire'],
												"account_approved"=>$rec['account_approved'],
												"fee"			=>$rec['fee'],
												"pincode"		=>$rec['pincode'],
												"Class"			=>$this->get_cat_name($rec['class']),
												"Subject"		=>$this->get_cat_name($rec['subject']),
												"State"     	=>$rec['state_id'],
												"Location"    	=>$rec['location'],
												"bath_time"     =>$rec['bath_time'],
												"description"   =>$this->test_input($rec['description']),
												);
				}
				//print_r($arr);
		return json_encode($arr);
		}
	function liveteachers($fields)

		{
			if(!empty($fields['key']) && $fields['key']=="pathshala5572")
			{
				$currentDate =  date("Y-m-d");
				$sql		  ="SELECT `teacher_id`, `user_name`, `first_name`, `address`, `description`, `experience_year`, `plan_expire`, `picture` FROM `wl_teacher` where liveplan='1' AND status='1'";
				$select_query = mysqli_query($this->conn,$sql);
				while($rec  = mysqli_fetch_array($select_query))
				{
					if($rec['plan_expire'] > $currentDate)
					{
						$image=NULL;
			if(!empty($rec['picture'])){
				$image .="https://www.pathshala.co/uploaded_files/teacher/".$rec['picture'];
			}else{
				$image .="https://www.pathshala.co/assets/designer/themes/default/images/logo_new.png";
			}
			
			$arr['Result']['data'][] = array(   'teacher_id'	=>$rec['teacher_id'],
												'user_name'		=>$rec['user_name'],
												"first_name"	=>$rec['first_name'],
												"customer_photo"=>$image,
												"address"		=>$rec['address'], 
												//"description"	=>strip_tags($rec['description']),
												"experience_year"=>$rec['experience_year'],
												"description"   =>$this->test_input($rec['description']),
												);
					}
				}
				return json_encode($arr);

			}
		}	
		function searchliveclasses($fields)

		{
			if(!empty($fields['key']) && $fields['key']=="pathshala5572")
			{
				// $currentDate =  date("Y-m-d");
				$sql = "SELECT * FROM wl_addclass";

				$select_query = mysqli_query($this->conn,$sql);
				while($rec  = mysqli_fetch_array($select_query))
				{
					$sql1		  ="SELECT `teacher_id`, `user_name`, `first_name`, `address`, `description`, `experience_year`, `plan_expire`, `picture` FROM `wl_teacher` WHERE teacher_id = '".$rec['teacher_id']."'";
					$select_query1 = mysqli_query($this->conn,$sql1);
					$recc  = mysqli_fetch_array($select_query1);
					if(true)
					{
						$image=NULL;
			if(!empty($rec['picture'])){
				$image .="https://www.pathshala.co/uploaded_files/teacher/".$recc['picture'];
			}else{
				$image .="https://www.pathshala.co/assets/designer/themes/default/images/logo_new.png";
			}
			
			$arr['Result']['data'][] = array(
												'id'  => $rec["Id"],
											   'teacher_id'	=>$recc['teacher_id'],
												'user_name'		=>$recc['user_name'],
												"first_name"	=>$recc['first_name'],
												"customer_photo"=>$image,
												"address"		=>$recc['address'], 
												//"description"	=>strip_tags($rec['description']),
												"experience_year"=>$recc['experience_year'],
												"description"   =>$this->test_input($recc['description']),
												"event_id"   => $rec['event_id'],
												"class_title" => $rec['class_title'],
												"class_schedule_time" => $rec['class_schedule_time'],
												"class_duration" => $rec['class_duration'],
												"class_date" => $rec['class_date'],
												"class_credit_amount" => $rec['class_credit_amount'] 
												

												);
					}
				}
				return json_encode($arr);

			}
		}	

	
	
/*	SELECT DISTINCT SQL_CALC_FOUND_ROWS* FROM `wl_teacher`
`a` INNER JOIN `wl_teacher_profile` `b` ON
`b`.`teacher_id`=`a`.`teacher_id` WHERE `b`.`class` =
'171' AND `b`.`category` = '170' AND `a`.`status` = '1' AND
`a`.`account_approved` = '1' GROUP BY `b`.`teacher_id` ORDER
BY `b`.`teacher_id` ASC*/
	public function get_cat_name($id){
		$sql		  ="SELECT * FROM `wl_categories` where category_id='".$id."' AND status='1'";
		$select_query = mysqli_query($this->conn,$sql);
		$rec 		  = mysqli_fetch_array($select_query);
		return $rec['category_name'];
	}	

 function itemListing(){
		
		$response = array();
		$select_query = mysql_query("Select * from items order by name asc");
		$arr['Result'] = array("success"=>1,"code"=>0);
		while($rec = mysql_fetch_array($select_query)){
			if($rec['item_image']==""){
			 $image_url=0;
			}else{
			   $image_url = "http://kishrita.com/development/webservice/item_image/".$rec['item_image'];

			}
			
			
			$arr['Result']['data'][] = array('name'=>$rec['name'],'item_id'=>$rec['item_id'],"serial_number"=>$rec['box_id'],"replacement_cost"=>$rec['replacement_cost'],"description"=>$rec['description'],"category_id"=>$rec['category_id'],"location_id"=>$rec['location_id'],"box_id"=>$rec['box_id'],"item_image"=>$image_url,"project_id"=>$rec['project_id']);
		    
		}
		
		//$response['response']['success'] = 1;
		return json_encode($arr);
	
	}
	
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = strip_tags($data);
		//$data = preg_replace('/[^A-Za-z0-9 ]/', '', $data);
		$val = array("\n","\r");
		$data = str_replace($val, "", $data);
  		return $data;
	}
 
 }





?>
