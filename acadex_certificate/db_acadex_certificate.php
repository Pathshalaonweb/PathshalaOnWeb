<?php
//ignore_user_abort(true);
set_time_limit(0);
//include('smtp/PHPMailerAutoload.php');
$con=mysqli_connect("127.0.0.1","root","","");
$query="select distinct a.acadex_id,a.emailid,b.first_name,c.name from pathshal_pathshala.wl_acadex_register a, pathshal_pathshala.wl_customers b, pathshal_pathshala.wl_acadex c where a.emailid=b.user_name and a.acadex_id=c.id";
$fire=mysqli_query($con,$query);
while($row=mysqli_fetch_array($fire))
{
	header('content-type:image/jpeg');
	$font="BRUSHSCI.TTF";+
	$image=imagecreatefromjpeg("certificate.jpg");
	$color=imagecolorallocate($image,19,21,22);
	
		$name=$row['first_name'];
		imagettftext($image,100,0,1400,1200,$color,$font,ucwords($name));
		$name1=$row['name'];
		imagettftext($image,100,0,750,1530,$color,$font,$name1);
//		$d=strtotime($row['2020-11-22']);
		$date1=date("22") ;
		$date2=date("11");
		$date3=date("2020");
		imagettftext($image,100,0,800,1750,$color,$font,$date1);
		imagettftext($image,100,0,1800,1750,$color,$font,$date2);
		imagettftext($image,100,0,2800,1750,$color,$font,$date3);
		echo $name;
		$file=$row['first_name'].$row['acadex_id'];
		imagejpeg($image,"certificate/".$file.".jpg");
		imagedestroy($image);
		
//					$mail=new PHPMailer();
//					$mail->isSMTP();
//					$mail->Host='smtp.gmail.com';
//					$mail->Port=587;
//					$mail->SMTPSecure="tls";
//					$mail->SMTPAuth=true;
//					$mail->Username="pathshalaonweb@gmail.com";
//					$mail->Password="Pathshala@2a";
//					$mail->setFrom("pathshalaonweb@gmail.com");
//					$mail->addAddress($row['emailid']);
//					$mail->isHTML(true);
//					$mail->Subject ="Certificate of Participation - Pathshala";
//					$mailContent = "<p>Dear Participant,<br>Pathshala Thank you for attending the session.<br>Attached is the Certificate of Participation<br>Don't forget to tag us on:<br>FB : https://wwwfacebook.com/pathshalaonweb<br>Linkedin : https://www.linkedin.com/company/pathshalaonweb</p>
//									<p><br>Thanks & Regards<br>Team Pathshala<br>https://www.pathshala.co/</p>";
//					$mail->Body = $mailContent;
//					$mail->addAttachment("certificate/".$file.".jpg");
//					$mail->SMTPOptions=array("ssl"=>array(
//						"verify_peer"=>false,
//						"verify_peer_name"=>false,
//						"allow_self_signed"=>false,
//									));
//if($mail->send()){
//    echo "Send";
//}else{
//    echo $mail->ErrorInfo;
//}
}
?>