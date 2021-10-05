<?php
/*require('fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->Image("certificate.jpg",0,0,210,150);
$pdf->Output("test.pdf","F");*/

include('smtp/PHPMailerAutoload.php');
$mail=new PHPMailer();
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPSecure="tls";
$mail->SMTPAuth=true;
$mail->Username="pathshalaonweb@gmail.com";
$mail->Password="Pathshala@2a";
$mail->setFrom("pathshalaonweb@gmail.com");
$mail->addAddress("smritiwadhwa3@gmail.com");
$mail->isHTML(true);
$mail->Subjet="Certificate Generated for Webinar";
$mail->Body="Pathsala Thank you for attending the session! Certificate Generated";
$mail->addAttachment("certificate/1594140512_17.jpg");
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
?>