<?php 


//$to="highyogesh@gmail.com";

$msg= "Thanks for new Registration.";   

$subject="TCEPlacement - Email verification ";

$headers .= "MIME-Version: 1.0"."\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

$headers .= 'From:TCEPlacement | <info@hosttech.com>'."\r\n";

date_default_timezone_set("Asia/Kolkata");
$date = date("h:i:sa");     

$ms.="<html></body><div><div>Dear.. $name,</div></br></br>";

$ms.="<div style='padding-top:8px;'>Please click The following link For verifying and activation of your account</div>

<div style='padding-top:10px;'><a href='http://www.phpgurukul.com/demos/emailverify/email_verification.php?code=$activationcode'>Click Here</a></div>



<p>Time:$date</p></div></div>



</body></html>";



$CodeWallTutorialArray = ["highyogesh@gmail.com", "tcethiru@gmail.com"];
$arrayLength = count($CodeWallTutorialArray);

$i = 0;
while ($i < $arrayLength)
{
    

$to = $CodeWallTutorialArray[$i] ;

mail($to,$subject,$ms,$headers);

    echo $CodeWallTutorialArray[$i] ."<br />";
    $i++;
}


?>  