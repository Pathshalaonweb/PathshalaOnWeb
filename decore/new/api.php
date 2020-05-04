<?php
include("config.php");
include("modules/user.class.php");
include("modules/teacher.class.php");
include("modules/searchteacher.class.php");
include("modules/searchcourse.class.php");
include("modules/lms.class.php");

$usrObj 			= new user;
$teacherObj 		= new teacher;
$searchteacherObj	= new Searchteacher;
$searchcourseObj 	= new Searchcourse;
$lmsObj 			= new Lms;

header('Content-Type: application/json');
$action = $_REQUEST['action'];


//echo $date = date('m/d/Y h:i:s a', time()); 
switch($action){

  case "Login" : 
     echo $response = $usrObj->loginAction($_REQUEST);
  break; 
  case "registerUser" : 
     echo $response = $usrObj->registerUser($_REQUEST);
  break; 
  case "Detail" : 
     echo $response = $usrObj->userDetail($_REQUEST);
  break; 
  case "Changepassword" : 
     echo $response = $usrObj->changepassword($_REQUEST);
  break; 
  case "forgotPassword" : 
     echo $response = $usrObj->forgotPassword($_REQUEST);
  break; 	 
  case "editProfile" : 
     echo $response = $usrObj->editProfile($_REQUEST);
  break;
  case "UserPlan" : 
     echo $response = $usrObj->userplan($_REQUEST);
  break; 
  case "studentCreditRecord" : 
     echo $response = $usrObj->studentCreditRecord($_REQUEST);
  break; 
  case "Blog" : 
     echo $response = $usrObj->blog($_REQUEST);
  break;
  
  
//teacher details
	case "TeacherLogin" : 
     echo $response = $teacherObj->loginAction($_REQUEST);
  	break; 
  	case "TeacherRegistration" : 
     echo $response = $teacherObj->registerUser($_REQUEST);
	break; 
  	case "TeacherDetail" : 
     echo $response = $teacherObj->userDetail($_REQUEST);
	break; 
  	case "TeacherChangepassword" : 
     echo $response = $teacherObj->changepassword($_REQUEST);
	break; 
  	case "TeacherforgotPassword" : 
     echo $response = $teacherObj->forgotPassword($_REQUEST);
	break;
	case "editProfileTeacher" : 
     echo $response = $teacherObj->editProfile($_REQUEST);
    break;
	case "Teachernotified" : 
     echo $response = $teacherObj->teachernotified($_REQUEST);
	 break;
	case "Teacherplan" : 
     echo $response = $teacherObj->teacherplan($_REQUEST); 
	break;
	case "TeacherAddProfile" : 
     echo $response = $teacherObj->addProfile($_REQUEST); 
	break;
	case "TeacherEditProfile" : 
     echo $response = $teacherObj->updateProfile($_REQUEST); 
	break;
	case "TeacherProfileList" : 
     echo $response = $teacherObj->ProfileList($_REQUEST); 
	break;
	


//teacher search
	  case "cityList" : 
		 echo $response = $searchteacherObj->cityAction($_REQUEST);
	  break;
	  case "stateList" : 
		 echo $response = $searchteacherObj->stateAction($_REQUEST);
	  break;
	  case "categoryList" : 
		 echo $response = $searchteacherObj->categoryAction($_REQUEST);
	  break;
	  case "Search" : 
		 echo $response = $searchteacherObj->searchteachers($_REQUEST);
	  break;


//search course 
	
	case "departmentList" : 
     echo $response = $searchcourseObj->DepartmentAction($_REQUEST);
  	break;
	case "courseList" : 
     echo $response = $searchcourseObj->coursesAction($_REQUEST);
  	break;
    case "CourseSearch" : 
     echo $response = $searchcourseObj->searchcourse($_REQUEST);
  	break;
	  
//Lms courses
	case "CourseMaterialList" : 
     echo $response = $lmsObj->CourseMaterialList($_REQUEST);
  	break;
	
	case "GetlessionsList" : 
     echo $response = $lmsObj->getlessions($_REQUEST);
  	break;
	
	case "GetlessionsDetail" : 
     echo $response = $lmsObj->getlessionsDetail($_REQUEST);
  	break;
	
	case "ExamResultlList" : 
     echo $response = $lmsObj->examResultList($_REQUEST);
  	break;
 
  
}




//echo json_decode($response);


?>