<?php

session_start();
	
$db = mysqli_connect('127.0.0.1', 'hosttech_tce', '8?$[9=?YHQib', 'hosttech_placementportal');




  





if(isset($_POST['create']))
  {
 

    $username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$utype = mysqli_real_escape_string($db, $_POST['utype']);
		
		$password_1 = mysqli_real_escape_string($db, $_POST['password1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password2']);





		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($utype)) { array_push($errors, "Regno is required"); }
	


		if ($password_1 != $password_2) {
			
			$mese = "The two passwords do not match";
			
  echo "<script type='text/javascript'>alert('$mese');</script>";
  header("demo.php");
		}




            
    $password = md5($password_1);
        
         

			$query = "INSERT INTO tbladmin (AdminUserName, AdminPassword, is_Active, AdminEmailId,user_type) 
					  VALUES('$username', '$password', '1', '$email', '$utype')";
			mysqli_query($db, $query);

			
			$mess = "created SucessFully !! )";
  echo "<script type='text/javascript'>alert('$mess');</script>";
	 header("Refresh: 0; ../control/demo.php");
		}
        

  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" href="../css/open-iconic-bootstrap.css" >
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/materialdesignicons.min.css">


<link rel='stylesheet' href='css/bootstrap-float-label.min.css'>



    <title>TCEPlacementPortal  | admin </title>

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
  <?php include('../includes/topnav.php');?>



  <div class="container">

  <div class= " shadow-lg p-2 mb-5 bg-white rounded card mx-auto  rounded  fixed-center" style="width: 14rem; height: auto;  border-radius: 5px;
  box-shadow: 0px 1px 10px #999;  border-color:#DFDFDF;">
  
 


  <div class="card-body">
    <!-- <p class="text-center text-dark" style="font-size: 80px;"> -->
    <!-- <i class="fa fa-user-secret " aria-hidden="true"></i> -->

 <!-- </p> -->
 <p class="card-tittle text-left bg-white  text-dark" style="font-size: 20px; font-weight:400; font-style:initial; margin-left:-10px; margin-top:-10px;">
  
      TCEPlacement Admin Creation
</p>

    

<br>

<br>






    <form class="needs-validation" method="post" action="demo.php" novalidate>
 
 
  


    <div class="col-md-18 mx-auto">


      <div class="form-group">
    <label class="has-float-label" for="validationServer01">
      <input class="form-control a1"  type="text" name="username"id="validationServer01" placeholder="mail@tce.edu" required/>
      <span class="ff" style="margin-top: 0.3rem; background:white; 
    font-family: 'Google Sans',Roboto,Arial,sans-serif; 
  margin-left:-4px;">username</span>
    </label>
    </div>

    
    <div class="form-group">
    <label class="has-float-label" for="validationServer01">
      <input class="form-control a1"  type="text" name="email"id="validationServer01" placeholder="mail@tce.edu" required/>
      <span class="ff" style="margin-top: 0.3rem; background:white; 
    font-family: 'Google Sans',Roboto,Arial,sans-serif; 
  margin-left:-4px;">email</span>
    </label>
    </div>

    
    <div class="form-group">
    <label class="has-float-label" for="validationServer01">
      <input class="form-control a1"  type="text" name="utype"id="validationServer01" placeholder="mail@tce.edu" required/>
      <span class="ff" style="margin-top: 0.3rem; background:white; 
    font-family: 'Google Sans',Roboto,Arial,sans-serif; 
  margin-left:-4px;">user type</span>
    </label>
    </div>

  


    
      <div class="form-group">
      <label class="has-float-label">
    <input class="form-control" id="password" name="password1" type="password" placeholder="••••••••" required/>
    <span class="ff" style="margin-top:0.3rem; background:white; 
    font-family: 'Google Sans',Roboto,Arial,sans-serif; 
  margin-left:-4px;">Password</span>
      </label>
      </div>
    </div>



    <div class="form-group">
      <label class="has-float-label">
    <input class="form-control" id="password" name="password2" type="password" placeholder="••••••••" required/>
    <span class="ff" style="margin-top:0.3rem; background:white; 
    font-family: 'Google Sans',Roboto,Arial,sans-serif; 
  margin-left:-4px;">Password</span>
      </label>
      </div>





  
 

<a href="#" class="float-right" style="font-size: 14px; font-weight: 400;">Forgot password?</a>

 
 
</div>
<div class="card-footer bg-white">
  

<button  type="submit" class="float-right btn btn-sm  text-success" name="create">CREATE

</button>

</form>
  </div>
   </div>

  






   <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<script>
$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.2.1.slim.min.js" ></script>
    <script src="../js/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="../js/bootstrap.min.js" ></script>


  </body>
</html>