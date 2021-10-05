<?php
ignore_user_abort(true);
set_time_limit(0);
include('smtp/PHPMailerAutoload.php');
$con=mysqli_connect("127.0.0.1","root","","");
$query="select distinct a.name, a.emailid, a.position, b.competition_name from pathshal_pathshala.wl_competition_winner a, pathshal_pathshala.wl_competition b where a.status=1 and a.competition_id=b.id";
$fire=mysqli_query($con,$query);
while($row=mysqli_fetch_array($fire))
{
	header('content-type:image/jpeg');
	$font="BRUSHSCI.TTF";+
	$image=imagecreatefromjpeg("competition.jpg");
	$color=imagecolorallocate($image,19,21,22);
	
		$name=$row['name'];
		imagettftext($image,100,0,1400,1200,$color,$font,ucwords($name));
		$position=$row['position'];
		imagettftext($image,100,0,1280,1780,$color,$font,$position);
		$competition_name=$row['competition_name'];
		imagettftext($image,100,0,1280,1550,$color,$font,$competition_name);
		echo $name;
		$file=$row['name'].$row['position'];
		imagejpeg($image,"competition/".$file.".jpg");
		imagedestroy($image);
		
					$mail=new PHPMailer();
					$mail->isSMTP();
					$mail->Host='smtp.gmail.com';
					$mail->Port=587;
					$mail->SMTPSecure="tls";
					$mail->SMTPAuth=true;
					$mail->Username="pathshalaonweb@gmail.com";
					$mail->Password="Pathshala@2a";
					$mail->setFrom("pathshalaonweb@gmail.com");
					$mail->addAddress($row['emailid']);
					$mail->isHTML(true);
					$mail->Subject ="Certificate of Appreciation - Pathshala";
					$mailContent = "<p>Dear Participant,<br>Pathshala thank you for participating in the online competition.<br>Attached is the Certificate of Appreciation<br>Don't forget to tag us on:<br>FB : https://wwwfacebook.com/pathshalaonweb<br>Linkedin : https://www.linkedin.com/company/pathshalaonweb<br> Instagram : https://www.instagram.com/pathshalaonline</p>
					<p><br>Thanks & Regards<br>Team Pathshala<br>https://www.pathshala.co</p>";
					$mail->Body = $mailContent;
					$mail->addAttachment("competition/".$file.".jpg");
					$mail->SMTPOptions=array("ssl"=>array(
						"verify_peer"=>false,
						"verify_peer_name"=>false,
						"allow_self_signed"=>false,
									));
if($mail->send()){
    echo "Send";
}else{
    echo $mail->ErrorInfo;
}
}
?>