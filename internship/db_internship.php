<?php
//ignore_user_abort(true);
//set_time_limit(0);
//include('smtp/PHPMailerAutoload.php');
$con=mysqli_connect("127.0.0.1","root","","");
$query="select distinct a.name, a.designation, a.start, a.end, a.date from pathshal_pathshala.wl_internship a";
$fire=mysqli_query($con,$query);
while($row=mysqli_fetch_array($fire))
{
	header('content-type:image/jpeg');
	$font="BRUSHSCI.TTF";+
	$image=imagecreatefromjpeg("internship.jpg");
	$color=imagecolorallocate($image,19,21,22);
	
		$name=$row['name'];
		imagettftext($image,100,0,1400,1100,$color,$font,ucwords($name));
		$designation=$row['designation'];
		imagettftext($image,100,0,1280,1380,$color,$font,$designation);
		$d=$row['date'];
		$date1=$row['start'] ;
		$date2=$row['end'];
		imagettftext($image,100,0,350,2290,$color,$font,$d);
		imagettftext($image,100,0,1100,1550,$color,$font,$date1);
		imagettftext($image,100,0,2100,1550,$color,$font,$date2);
		echo $name;
		$file=$row['name'].$row['designation'];
		imagejpeg($image,"internship/".$file.".jpg");
		imagedestroy($image);
		
					//$mail=new PHPMailer();
					//$mail->isSMTP();
					//$mail->Host='smtp.gmail.com';
					//$mail->Port=587;
					//$mail->SMTPSecure="tls";
					//$mail->SMTPAuth=true;
					//$mail->Username="pathshalaonweb@gmail.com";
					//$mail->Password="Pathshala@2a";
					//$mail->setFrom("pathshalaonweb@gmail.com");
					//$mail->addAddress($row['emailid']);
					//$mail->isHTML(true);
					//$mail->Subject ="internship of Participation - Pathshala";
					//$mailContent = "<p>Dear Participant,<br>Pathshala Thank you for attending the session.<br>Attached is the internship of Participation<br>Don't forget to tag us on:<br>FB : https://wwwfacebook.com/pathshalaonweb<br>Linkedin : https://www.linkedin.com/company/pathshalaonweb</p>
					//				<p><br>Thanks & Regards<br>Team Pathshala<br>https://www.pathshala.co/</p>";
					//$mail->Body = $mailContent;
					//$mail->addAttachment("internship/".$file.".jpg");
					//$mail->SMTPOptions=array("ssl"=>array(
					//	"verify_peer"=>false,
					//	"verify_peer_name"=>false,
					//	"allow_self_signed"=>false,
					//				));
//if($mail->send()){
//    echo "Send";
//}else{
//    echo $mail->ErrorInfo;
//}
}
?>