<?php 



		



include('../db/config.php');



		

			

$register=$_REQUEST['value'];


echo "$register";

//$id=$_REQUEST['token'];



	

	





    $result=mysqli_query($con, "select * from persons where RegNo='18c140'")or die('Error In Session');

    $row=mysqli_fetch_array($result);





    $Roll=$row['RegNo'];

    

    $pass=$row['password'];



    echo $Roll;







    if(isset($_POST['Submit']))

    {

     $oldpass=$_POST['opwd'];

     $newpassword=md5($_POST['npwd']);

    $sql=mysqli_query($con,"SELECT * FROM persons where password='$oldpass' and RegNo='$Roll'");

    $num=mysqli_fetch_array($sql);

    if($num>0)

    {

     $con=mysqli_query($con,"update persons set password='$newpassword' where RegNo='$Roll'");

 



     $reg="";



			$mess = "Password Changed Successfully !!";

     

    }

    else

   {



    $err = "Please Check old password !!";

   } 

    }



?>



<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

  

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="../css/bootstrap.min.css" >

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.css" >

    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/materialdesignicons.min.css">





    <link type="text/css" rel="stylesheet" href="../css/password.min.css" />

<link rel='stylesheet' href='css/bootstrap-float-label.min.css'>

    <title>TCEPlacementPortal  | Signup Page</title>



 



  </head>



  <style>







::-webkit-input-placeholder { text-align: right; color: #DDD; font-size: 13px; font-weight: 300; }

:-moz-placeholder { text-align: right; color: #DDD; font-size: 13px; font-weight: 300; }

::-moz-placeholder { text-align: right; color: #DDD; font-size: 13px; font-weight: 300; }

:-ms-input-placeholder { text-align: right; color: #DDD; font-size: 13px; font-weight: 300; }





input[type=text]:focus{

  outline: border;

  display: block;

  width: 100%;

  border: 1px solid #429CF9;

  -webkit-border-radius: 3px;

  -moz-border-radius: 3px;

  border-radius: 3px;

  color: #000000;

  font-size: 14px;

 

  box-shadow: 0px 1px 10px #EEF2F3;

}



.select:focus{

  outline: border;

  display: block;

  width: 100%;

  border: 1px solid #429CF9;

  -webkit-border-radius: 3px;

  -moz-border-radius: 3px;

  border-radius: 3px;

  color: #000000;

  font-size: 14px;

 

  box-shadow: 0px 1px 10px #EEF2F3;

}



.regno:focus{

  outline: border;

  display: block;

  width: 100%;

  border: 1px solid #429CF9;

  -webkit-border-radius: 3px;

  -moz-border-radius: 3px;

  border-radius: 3px;

  color: #000000;

  font-size: 14px;

 

  box-shadow: 0px 1px 10px #EEF2F3;

}



input[type=password]:focus{

  outline: border;

  display: block;

  width: 100%;

  border: 1px solid #429CF9;

  -webkit-border-radius: 3px;

  -moz-border-radius: 3px;

  border-radius: 3px;

  color: #000000;

  font-size: 14px;

 

  box-shadow: 0px 1px 10px #EEF2F3;

}









label {

  position: relative;

  top: 0; 

  left: 0;

  width: auto;

  height: auto;

  line-height: 72px;

  font-size: 12px;

  background: transparent;

  color: #000000;

  margin: 0px 0px;

  cursor: text;

  transition: all .15s ease-in-out;

    font-family: 'Google Sans',Roboto,Arial,sans-serif;

 

  padding-bottom: 2px;

  padding-top: 2px;



}











@media only screen {



body{

    margin-top: 120px;            }

}

  </style>

  </head>

  <body >



  <div id="wrapper">

  <?php include('../includes/topnav.php');?>

</div>

<br>







  <div class="container">

  <div class= " shadow-lg p-2 mb-5 bg-white rounded card mx-auto  rounded  fixed-center" style="width: 14rem; height: auto;  border-radius: 5px;

  box-shadow: 0px 1px 10px #999;  border-color:#DFDFDF;">

  

 





  

  <div class="card-body">

  <p class="card-tittle text-left bg-white  text-dark" style="font-size: 20px; font-weight:400; font-style:initial; margin-left:-10px; margin-top:-10px;">

  

  TCEPlacement<br></p>

   

  <p class="card-tittle text-left bg-white  text-dark" style="font-size: 16px; font-weight:400; font-style:initial; margin-left:-10px; margin-top:-10px;">

  

 Change Password</p>



<!---Success Message--->  

<?php if($mess){ ?>

<div class="alert alert-success" role="alert">

<strong>Well done!</strong> <?php echo htmlentities($mess);?>

</div>

<?php } ?>



<!---Error Message--->

<?php if($err){ ?>

<div class="alert alert-danger" role="alert">

<strong>Oh snap!</strong> <?php echo htmlentities($err);?></div>

<?php } ?>







    <form class="needs-validation"  action="change-password.php" name="chngpwd" action="" method="post" onSubmit="return valid();" novalidate>

 

    









    <div class="form-group">



    

   







 

    <label class="has-float-label" for="npwd">

     

    <input type="password"  id="npwd" class="form-control password_1" minlength="6"  name="npwd"   placeholder="Password" required>

      



      <span style="margin-top: 0.3rem; background:white; 

    font-family: 'Google Sans',Roboto,Arial,sans-serif; 

  margin-left:-4px;">Password</span>

    </label>







   <span id="lblgmerror" style="color: red; font-size:12px;"></span>

  









    <label class="has-float-label" for="cpwd">



    <input type="password"  class="form-control password_2" name="cpwd" minlength="6" id="cpwd"   placeholder="Password"   required>

      



      <span style="margin-top: 0.3rem; background:white; 

    font-family: 'Google Sans',Roboto,Arial,sans-serif; 

  margin-left:-4px;">Confirm-Password</span>

    </label>

    </div>

   





      <label for="validationCustom01" hidden>Old Password:</label>

      <input type="text" class="form-control" id="validationCustom01" placeholder="Old Password: " name="opwd" id="opwd"  value="<?php echo $pass; ?>" hidden>

    

    

    </div>





  







<div class="card-footer bg-white">

      









<button  type="submit" class="d-inline p-2 float-right btn btn-sm  text-success" style="margin-left:45px"  name="Submit" value="Submit" type="submit">SUBMIT</button>





  </div>



   </div>

  </div>



   <script type="text/javascript" src="../js/jquery.min.js"></script>

       











    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

   

     <script src="js/jquery-3.2.1.slim.min.js" ></script>

    <script src="js/popper.min.js" ></script>

    

    <script src="js/popper.js" ></script>

    <script src="js/bootstrap.min.js" ></script>



  <script src="js/jquery.min.js"></script>

    

    <script src="js/bootstrap.bundle.min.js" ></script>





  <script src="vendor/jquery/jquery.min.js"></script>

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>





  <script type="text/javascript">

        jQuery(document).ready(function($) {

          // emojis ??! See #password5 for more details

          emojione.imageType = 'svg';

          emojione.sprints = true;

  



          // Showing the progress bar since the first moment.

          $('#password').password({

            animate: false

            // Check out the readme or directly jquery.password.js

            // for a detailed list of properties.

          });



          // Default behavior

          $('#default').password();



          // Linked to field input

          $('#linked').password({

            field: '#username',

            showPercent: true

          });



          // Custom events (enables button on certain score)

          // Check the readme for a detailed list of events

          $('#submit').attr('disabled', true);

          $('#password').password().on('password.score', function (e, score) {

            if (score > 5) {

              $('#submit').removeAttr('disabled');

            } else {

              $('#submit').attr('disabled', true);

            }

          });



          // Change translations

         

        });

    </script>





<script src="js/jquery-3.1.1.min.js"></script>

    <script src="js/jquery-migrate-git.min.js"></script>





    <script src="js/emojione.min.js"></script>



    <script src="js/password.min.js"></script>

    <script type="text/javascript">

        jQuery(document).ready(function($) {

          // emojis ??! See #password5 for more details

          emojione.imageType = 'svg';

          emojione.sprints = true;

       



          // Showing the progress bar since the first moment.

          $('#password').password({

            animate: false

            // Check out the readme or directly jquery.password.js

            // for a detailed list of properties.

          });



          // Default behavior

          $('#default').password();



          // Linked to field input

          $('#linked').password({

            field: '#username',

            showPercent: true

          });



          // Custom events (enables button on certain score)

          // Check the readme for a detailed list of events

          $('#submit').attr('disabled', true);

          $('.password_1').password().on('password.score', function (e, score) {

            if (score > 5) {

              $('#submit').removeAttr('disabled');

            } else {

              $('#submit').attr('disabled', true);

            }

          });



     

        });

    </script>











<script type="text/javascript">

function valid()

{

if(document.chngpwd.opwd.value=="")

{

alert("Old Password Filed is Empty !!");

document.chngpwd.opwd.focus();

return false;

}

else if(document.chngpwd.npwd.value=="")

{

alert("New Password Filed is Empty !!");

document.chngpwd.npwd.focus();

return false;

}

else if(document.chngpwd.cpwd.value=="")

{

alert("Confirm Password Filed is Empty !!");

document.chngpwd.cpwd.focus();

return false;

}

else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)

{

alert("Password and Confirm Password Field do not match  !!");

document.chngpwd.cpwd.focus();

return false;

}

return true;

}

</script>





  </body>

</html>