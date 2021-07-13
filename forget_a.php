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
}

include_once 'database.php';

if($_POST['submit']){

    require 'mailer/src/Exception.php';

    require 'mailer/src/PHPMailer.php';

    require 'mailer/src/SMTP.php';

    $email_id=$_POST['email'];

	$subject ="Forgot Password !";
date_default_timezone_set("Asia/Kolkata");
$date = date("h:i:sa");     


	$to=$email_id;

	$rs=mysqli_query($conn,"select * from persons where Email='$email_id'");

	$row=mysqli_fetch_array($rs);

 $pass=$row['password'];

	    $regno=$row['RegNo'];

 $name=$row['username'];
//echo "$name";
//echo "$pass";
//echo "$regno";
	if(mysqli_num_rows($rs)>0){

	   




$headers .= 'From:Admin | Password Reset For $email_id '."\r\n";

$ms.="<html></body><div><div>Dear $name,</div></br></br>";

$ms.="<div style='padding-top:8px;'>Please click The following link For Reset your account Password</div>

<div style='padding-top:10px;'><a href='http://hosttech.in/hosttech.in/tce/control/change-password.php?value=$regno'>Click Here</a></div>



<p>Time:$date</p></div></div>



</body></html>";


	        PhpMail($to,$ms,$subject,$headers);

			echo "<script>alert('Mail Sent Successfully ! Check The mail');</script>";
?>

<script>
     window.location = "login.php"; 
</script>

<?php

	}else{
		    echo "<script>alert('Email ID not Exists !');</script>";
?>

<script>
     window.location = "login.php"; 
</script>

<?php

		}
	


	

}

?>