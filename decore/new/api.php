
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
  case "fPass" :
      echo $response = $usrObj->fpass($_REQUEST);
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
  case "studentPlanBuyhistory" : 
     echo $response = $usrObj->userPlanBuyhistory($_REQUEST);
  break; 
  case "studentenquiry" : 
     echo $response = $usrObj->enquiry($_REQUEST);
  break; 
  case "normalenquiry" : 
     echo $response = $usrObj->normalenquiry($_REQUEST);
  break; 
  case "StudentPlanBuystart" : 
    echo $response = $usrObj->byPlanStart($_REQUEST);
  break;
  case "StudentbyPlanAfterpayment" : 
    echo $response = $usrObj->byPlanAfterpayment($_REQUEST);
  break;
  case "getStudentCourse" :  
    echo $response = $usrObj->getStudentCourse($_REQUEST);
  break;
   case "getStudentMock" :  
    echo $response = $usrObj->getMockExam($_REQUEST);
  break;
   case "getStudentMockSubject" :  
    echo $response = $usrObj->MockSubject($_REQUEST);
  break;
  case "getStudentMockQuestion" :  
    echo $response = $usrObj->MockQuestion($_REQUEST);
  break;
  case "studentLiveClassDropdown" :
      echo $response =$usrObj->studentLiveClassDropdown($_REQUEST);
  break;
  
  
   case "getStudentOnline" :  
    echo $response = $usrObj->getOnlineExam($_REQUEST);
  break;
  case "getStudentOnlineSubject" :  
    echo $response = $usrObj->OnlineSubject($_REQUEST);
  break;
  case "getStudentOnlineQuestion" :  
    echo $response = $usrObj->OnlineQuestion($_REQUEST);
  break;
  
  case "Blog" : 
     echo $response = $usrObj->blog($_REQUEST);
  break;
  
  case "coursebooking":
  echo  $response = $usrObj->coursebooking($_REQUEST);
  break;
  
  case "referralHistory":
  echo  $response = $usrObj->referralHistory($_REQUEST);
  break;
//   case "testr":
//    echo $response = $usrObj->testr($_REQUEST);
//   break;
  case "userCreditLogs":
   echo $response = $usrObj->usercreditslogs($_REQUEST);
  break;
  case "UserCreditHistory":
   echo $response = $usrObj->creditHistory($_REQUEST);
  break;
  case "Studentorderhistory":
   echo $response = $usrObj->Studentorderhistory($_REQUEST);
  break;
  case "StudentacadexRegister":
   echo $response = $usrObj->acadexRegister($_REQUEST);
  break;
  case "acadexDetails":
   echo $response = $usrObj->acadexDetails($_REQUEST);
  break;
//   acadexDropdownDetails
case "acadexDropdownDetails":
   echo $response = $usrObj->acadexDropdownDetails($_REQUEST);
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
    case "TeacherLivePlan":
      echo $response = $teacherObj->teacherLivePlan($_REQUEST);
   break;
   case "ListClass":
      echo $response = $teacherObj->listclass($_REQUEST);
   break;
	
	case "editProfileTeacher" : 
     	/*
		$data = $_REQUEST;
        $data['img'] ='';
		
        $file_name =date("YmdHis").basename($_FILES['fileName']['name']);
        $file = "../../uploaded_files/teacher/".$file_name;
        if(move_uploaded_file($_FILES['fileName']['tmp_name'], $file)) {
            //$data['status'] ='Ok';
            $data['img'] =basename($_FILES['fileName']['name']);
        } else {
            $data['status'] ="Error";
        }*/
	
	//echo $response = $teacherObj->editProfile($data,$file_name);
	
	echo $response = $teacherObj->editProfile($_REQUEST);
    break;
	case "Teachernotified" : 
     echo $response = $teacherObj->teachernotifieds($_REQUEST);
	 break;
	 case "TeachernotifiedAction" : 
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
	case "TeacherdeletProfile" : 
     echo $response = $teacherObj->deletProfile($_REQUEST); 
	break;
	case "TeacherProfileList" : 
     echo $response = $teacherObj->ProfileList($_REQUEST); 
	break;
	case "TeacherProfileList" : 
     echo $response = $teacherObj->ProfileList($_REQUEST); 
	break;
	case "teacherCourseList" : 
    echo $response = $teacherObj->teacherCourseList($_REQUEST);
  	break;
	
	case "TeachePlanBuyhistory" : 
    echo $response = $teacherObj->teacherPlanBuyhistory($_REQUEST);
  	break;
	
	case "TeachePlanBuystart" : 
    echo $response = $teacherObj->byPlanStart($_REQUEST);
  	break;
	
	case "byPlanAfterpayment" : 
    echo $response = $teacherObj->byPlanAfterpayment($_REQUEST);
  	break;
	
	case "addNotification" : 
    echo $response = $teacherObj->addNotification($_REQUEST);
  	break;
	

	case "Teacherenquiry" : 
     echo $response = $teacherObj->enquiry($_REQUEST);
     break;
   case "TeacherCreditHistory":
      echo $response = $teacherObj->teachercreditshistory($_REQUEST);
   break;
   case "OrderHistory":
      echo $response = $teacherObj->orderhistory($_REQUEST);
   break;
   case "acadexRegisterTeacher":
      echo $response = $teacherObj->acadexRegisterTeacher($_REQUEST);
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
	case "searchliveteachers":
      echo $response = $searchteacherObj->liveteachers($_REQUEST);
     break;
   case "searchliveclasses":
      echo $response = $searchteacherObj->searchliveclasses($_REQUEST);
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
