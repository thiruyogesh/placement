<?php

define('DB_SERVER','localhost');
define('DB_USER','hosttech_tce');
define('DB_PASS' ,'8?$[9=?YHQib');
define('DB_NAME','hosttech_placementportal');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
echo "connect" ;
}

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

function PhpMail($to,$message,$subject){

    $mail = new PHPMailer(true);

    try {

			//Server settings
			$mail->SMTPDebug = 0;                                 // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP

			$mail->isSMTP();

            $mail->Host = 'localhost';

            $mail->SMTPAuth = false;

            $mail->SMTPAutoTLS = false; 

            $mail->Port = 25;                                   // TCP port to connect to



			//Recipients

			$mail->setFrom('admin@TCEPlacement.com', 'TCEPlacement Reset Password');

			

				$to_mail=$to;

				$mail->addAddress($to_mail); 

				// Add a recipient

			

			$mail->addReplyTo('admin@TCEPlacement.com', 'TCEPlacement Reset Password');

			$mail->setFrom('admin@TCEPlacement.com', 'TCEPlacement');

			

			//$mail->addCC($cc_mail);

			//$mail->addBCC('niranjan@weavertec.com');

			//Content

			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = $subject;

			$mail->Body =$message;

			$mail->send();

		    $message=1;

			

		} catch (Exception $e) {

			echo 'Mail could not be sent. Mailer Error: ', $mail->ErrorInfo;

			$message=0;

		}

		return $message;



}

function test_input($data) {

  $data = trim($data);

  $data = stripslashes($data);

  $data = htmlspecialchars($data);

  return $data;

}

?>