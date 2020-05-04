<?php
include_once('config.php');
class Lms extends DB{

	function __construct(){
		$this->connect();
		$this->connectTwo();
	}
	

	function CourseMaterialList($fields){
		
		$arr=array();
		if($fields['user_id']==""){
        	$arr = array("success"=>0,"code"=>0,"message"=>"UserId can not be blank");
    	}else{
			$sql="SELECT * FROM `wl_customers` WHERE `customers_id`='".$fields['user_id']."'";
			$select_query = mysqli_query($this->conn,$sql);
			$recs = mysqli_fetch_array($select_query);
			$arr['Result'] = array("success"=>1,"code"=>0);
			$course=  explode(",",$recs['lot']) ;
			$result = array();
			//print_r($course);
			for($i=0; $i<count($course); $i++)
			{
				if(!empty($course[$i])){
					//$sel_q ="SELECT * FROM `tbl_courses` where courses_id='".$course[$i]."' AND status='1' ORDER BY courses_id ASC";
					$result[]=$this->getCourse($course[$i]);
					
				}
			   } 
			   foreach($result as $key=>$rec){
				//while($result){
				$arr['Result']['data'][] = array(
											'courses_id'		=>$rec['courses_id'],
											'category_id'		=>$rec['category_id'],
											'category_name'		=>$this->getcategory($rec['category_id']),
											"lession_id"		=>$rec['lession_id'],
											"lession_name"		=>$this->lession($rec['lession_id']),
											"courses_name"		=>$this->test_input($rec['courses_name']),
											"courses_code"		=>$this->test_input($rec['courses_code']),
											'image'				=>$rec['image'],
											'price'				=>$rec['price'],
											'teacher_id'		=>$rec['teacher_id'],
											'courses_description'=>$this->test_input($rec['courses_description']),
											'str_total_time'	=>$rec['str_total_time'],
											'status'			=>$rec['status']
										);
				}
			}
		//print_r($arr);
		return json_encode($arr,JSON_UNESCAPED_SLASHES);
	
	}
	
	function getlessions($fields){
		$arr=array();
		if($fields['course_id']==""){
        	$arr = array("success"=>0,"code"=>0,"message"=>"courseId can not be blank");
    	}else{
		 	$sql="SELECT * FROM `tbl_course_lession` where subject_id='".$fields['course_id']."'";
			$sub_res = mysqli_query($this->connTwo,$sql);
			while($rec  = mysqli_fetch_array($sub_res)){	
			$arr['Result']['data'][] = array(
											'lession_id'		=>$rec['lession_id'],
											'subject_id'		=>$rec['subject_id'],
											//'course_name'		=>$rec['subject_id'],
											'lession'			=>$this->test_input($rec['lession']),
											'courses_description'=>$this->test_input($rec['courses_description']),
											'sort_order'		=>$rec['sort_order'],
											'status'			=>$rec['status']
										);
			}
		}
		return json_encode($arr,JSON_UNESCAPED_SLASHES);
		}
	
	function getlessionsDetail($fields){
		$arr=array();
		if($fields['lession_id']==""){
        	$arr = array("success"=>0,"code"=>0,"message"=>"lessionId can not be blank");
    	}else{
		 	$sql="SELECT * FROM `tbl_course_lession` where lession_id='".$fields['lession_id']."'";
			$sub_res = mysqli_query($this->connTwo,$sql);
			while($rec  = mysqli_fetch_array($sub_res)){	
			$arr['Result']['data'][] = array(
											'lession_id'		=>$rec['lession_id'],
											
											'subject_id'		=>$rec['subject_id'],
											//'subject_id'		=>$rec['subject_id'],
											
											
											//'course_name'		=>$rec['subject_id'],
											'lession'			=>$this->test_input($rec['lession']),
											'courses_description'=>$this->test_input($rec['courses_description']),
											'sort_order'		=>$rec['sort_order'],
											'status'			=>$rec['status']
										);
			}
		}
		return json_encode($arr,JSON_UNESCAPED_SLASHES);
		}
	
	function lession($fields){
		$sql="SELECT lession FROM `tbl_course_lession` where lession_id='".$fields."'";
		$sub_res = mysqli_query($this->connTwo,$sql);
		$result  = mysqli_fetch_array($sub_res);
		return $result['lession'];
	}
	
	function getlession($fields){
		$sql="SELECT lession FROM `tbl_lession` where lession_id='".$fields."'";
		$sub_res = mysqli_query($this->connTwo,$sql);
		$result  = mysqli_fetch_array($sub_res);
		return $result['lession'];
	}
	
	public function getcategory($fields){
		    $sel_q ="SELECT * FROM `tbl_department` where category_id='".$fields."'  ORDER BY sort_order ASC";
			$sub_res = mysqli_query($this->connTwo,$sel_q);
			$result  = mysqli_fetch_array($sub_res);
		   return $result['category_name'];
		}
	
	
	
	function getCourse($fields) {
		$sel_q	 ="SELECT * FROM `tbl_courses` where courses_id='".$fields."' AND status='1' ORDER BY courses_id ASC";
		$sub_res = mysqli_query($this->connTwo,$sel_q);
		$result  = mysqli_fetch_array($sub_res);
		return $result;
	}	

	
	
	function test_input($data) {
		//$data = htmlentities($data, null, 'utf-8');
		
		$data = trim($data);
		$data = stripslashes($data);
		$data = strip_tags($data);
		$data = htmlspecialchars($data);
		
		
		$data = strip_tags($data);
		$data = html_entity_decode($data);
		//$data = preg_replace('/[^A-Za-z0-9 ]/', '', $data);
		$val  = array("\n","\r","\u","&nbsp;");
		$data = str_replace($val, "", $data);
		//$data = str_replace("&nbsp;", " ", $data);
		$data = str_replace("&mdash;", "-", $data);
		$data = str_replace("&rsquo;", "'", $data);
		//$data = str_replace(, "", $data);
	//	$data = html_entity_decode($data);
		
		
  		return $data;
	}
	
	
	
	
	function onlineExam(){
		$arr=array();
			if($fields['user_id']==""){
				$arr = array("success"=>0,"code"=>0,"message"=>"UserId can not be blank");
			}else{
				$sql="";
			}
		
		}
		
		
		
	function examResultList($fields){
			$arr=array();
			if($fields['user_id']==""){
				$arr = array("success"=>0,"code"=>0,"message"=>"UserId can not be blank");
			}else{
			 	$sql="SELECT * FROM `tbl_exam` where userId='".$fields['user_id']."' ORDER BY `exam_date` DESC";
				$sub_res = mysqli_query($this->connTwo,$sql);
				while($res  = mysqli_fetch_array($sub_res)){
					$arr['Result']['data'][] = array(
							"exam_id"	=>	$res['exam_id'],
							"lession_id"	=>	$res['lession_id'],
							"lession_name"	=>	$this->getlession($res['lession_id']),
							"t_que"			=>	$res['t_que'],
							"t_mark"	=>	$res['t_mark'],
							"n_mark"	=>	$res['n_mark'],
							"exam_date"	=>	$res['exam_date'],
							"exam_date"	=>	$res['exam_date'],
					);
				}
			}
		return json_encode($arr,JSON_UNESCAPED_SLASHES);
		}	
	
	
	
	
	
	
		public function getsubject($fields){
		    $sel_q ="SELECT * FROM `tbl_subject` where department_id='".$fields."'  ORDER BY sort_order ASC";
			$sub_res = mysqli_query($this->connTwo,$sel_q);
			$result  = mysqli_fetch_array($sub_res);
		   return $result;
		}
		
		
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	 function astrologerDetail($fields){
		
		$response = array();
		$arr=array();
		$select_query = mysqli_query($this->conn,"SELECT * FROM `wl_astrologer` where status='1' AND astrologer_id='".$fields['astrologer_id']."'");
		$arr['Result'] = array("success"=>1,"code"=>0);
		$rec = mysqli_fetch_array($select_query);
		
		if($rec['astrologer_image']==""){
		 $image_url=0;
		}else{
		   $image_url = "https://www.astropatrika.com/uploaded_files/astrologer/".$rec['astrologer_image'];
		}
		$arr['Result']['data'][] = array('astrologer_id'=>$rec['astrologer_id'],'astrologer_name'=>$rec['astrologer_name'],"astro_phone"=>$rec['astro_phone'],"astrologer_experience"=>$rec['astrologer_experience'],"astrologer_details"=>$rec['astrologer_details'],"astrologer_image"=>$image_url,'astrologer_expertise'=>$rec['astrologer_expertise']);
		 
		return json_encode($arr,JSON_UNESCAPED_SLASHES);
	}
	

}
	