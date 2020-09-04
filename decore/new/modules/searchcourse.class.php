<?php
include_once('config.php');
class Searchcourse extends DB{

	function __construct(){
		$this->connectTwo();
		$this->connect();
	}
	
	function DepartmentAction($fields){
		
		$response = array();
		$response = array();
		if(!empty($fields['category_id'])){
		$select_query = mysqli_query($this->connTwo,"Select * from tbl_department where category_id='".$fields['category_id']."'");
		}else{
		$select_query = mysqli_query($this->connTwo,"Select * from tbl_department");
		}
		$rec = mysqli_fetch_array($select_query);
		
		$response['Result'] = array("status"=>1);
		$response['Result']['user_data'][] = array($rec);
		
		return json_encode($response);
	
	}
	
	
	function coursesAction($fields){
		
		
		$response = array();
		if(!empty($fields['courses_id'])){
		$select_query = mysqli_query($this->connTwo,"Select * from tbl_courses where courses_id='".$fields['courses_id']."'");
		}else{
		$select_query = mysqli_query($this->connTwo,"Select * from tbl_courses");
		}
		$rec = mysqli_fetch_array($select_query);
		$response['Result'] = array("status"=>1);
		$response['Result']['Data'][] = array(
						'courses_id'			=>	$rec['courses_id'],
						'category_id'			=>	$rec['category_id'],
						'category_name'			=>	$this->get_cat_name($rec['category_id']),
						'lession_id'			=>	$rec['lession_id'],
						'lession_name'			=>	$this->get_lession_name($rec['lession_id']),
						'teacher_id'			=>	$rec['teacher_id'],
						'teacher_name'			=>	$this->get_teacher_name($rec['teacher_id']),
						'courses_name'			=>	$this->test_input($rec['courses_name']),
						'courses_code'			=>	$this->test_input($rec['courses_code']),
						'image'					=>	"https://www.pathshala.co/lms/uploaded_files/courses/".$rec['image'],
						'price'					=>	$rec['price'],
						'credit_price'			=>	$rec['credit_price'],
						'courses_description'	=>	$this->test_input($rec['courses_description']),
						'str_total_time'		=>	$rec['str_total_time'],
						'courses_added_date'	=>	$rec['courses_added_date'],
		);
		return json_encode($response);

	}
	
	function searchcourse($fields){
		//print_r($_REQUEST);
		$response = array();
		$where="AND `status` = '1'";
		
		if(!empty($fields['courses_id']) && $fields['courses_id']!="null"){
			$where .=" AND `courses_id` = '".$fields['courses_id']."' ";
		}
		if(!empty($fields['category_id']) && $fields['category_id']!="null"){
			$where .=" AND `category_id` = '".$fields['category_id']."' ";
		}
		if(!empty($fields['lession_id']) && $fields['lession_id']!="null"){
			$where .=" AND `lession_id` = '".$fields['lession_id']."' ";
		}
		if(!empty($fields['teacher_id'])  && $fields['teacher_id']!="null"){
			$where .=" AND `teacher_id` = '".$fields['teacher_id']."' ";
		}
		
		$sql="SELECT * FROM `tbl_courses` WHERE `category_id` != '23' AND `category_id` != '24' ".$where."";
		echo $sql;
		$select_query = mysqli_query($this->connTwo,$sql);
		mysqli_set_charset($this->connTwo, 'utf8');
		$arr['Result'] = array("success"=>1,"code"=>0);
		while($rec = mysqli_fetch_array($select_query)) {
			$arr['Result']['data'][] = array(  
			 
						'courses_id'			=>	$rec['courses_id'],
						'category_id'			=>	$rec['category_id'],
						'category_name'			=>	$this->get_cat_name($rec['category_id']),
						'lession_id'			=>	$rec['lession_id'],
						'lession_name'			=>	$this->get_lession_name($rec['lession_id']),
						'teacher_id'			=>	$rec['teacher_id'],
						'teacher_name'			=>	$this->get_teacher_name($rec['teacher_id']),
						'courses_name'			=>	$this->test_input($rec['courses_name']),
						'courses_code'			=>	$this->test_input($rec['courses_code']),
						'image'					=>	"https://www.pathshala.co/lms/uploaded_files/courses/".$rec['image'],
						'price'					=>	$rec['price'],
						'credit_price'			=>	$rec['credit_price'],
						'courses_description'	=>	$this->test_input($rec['courses_description']),
						'str_total_time'		=>	$rec['str_total_time'],
						'courses_added_date'	=>	$rec['courses_added_date'],
					);
		}
		//print_r($arr);
		return json_encode($arr);
	}

	public function get_cat_name($id){
		$sql		  ="SELECT * FROM `tbl_department` where category_id='".$id."' AND status='1'";
		$select_query = mysqli_query($this->connTwo,$sql);
		$rec 		  = mysqli_fetch_array($select_query);
		return $rec['category_name'];
	} 
	
	public function get_teacher_name($id){
		$sql		  ="SELECT * FROM `wl_teacher` where teacher_id='".$id."' AND status='1'";
		$select_query = mysqli_query($this->conn,$sql);
		$rec 		  = mysqli_fetch_array($select_query);
		return $rec['first_name'];
	} 
	
	public function get_lession_name($id){
		$sql		  ="SELECT * FROM `tbl_courses` where category_id='".$id."' AND status='1'";
		$select_query = mysqli_query($this->connTwo,$sql);
		$rec 		  = mysqli_fetch_array($select_query);
		return $rec['category_name'];
	} 
 	
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = strip_tags($data);
  		return $data;
	}
	
	
 
 }
?>