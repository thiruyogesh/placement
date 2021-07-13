<?php

session_start();
error_reporting(0);
include('../includes/config.php');




  





if(isset($_POST['login']))
  {
 
	$username = $_POST['username'];
	$password1 = $_POST['password'];

    // echo $username, "<br>";
    // echo $password;
	// make sure form is filled properly

		$password = md5($password1);
//  echo $password;



        $query=mysqli_query($con,"SELECT * FROM tbladmin WHERE (AdminUserName='$username' || AdminEmailId='$username') AND AdminPassword='$password'");
        $results=mysqli_num_rows($query);

        $admin      = mysqli_fetch_array($query);
   



        
        $query1=mysqli_query($con,"SELECT * FROM facultytbl WHERE email='$username' and password='$password' AND ad_control='0' ");
   
        $num_row1 	= mysqli_num_rows($query1);

   


        
        $query2=mysqli_query($con,"SELECT * FROM facultytbl WHERE email='$username' and password='$password' AND ad_control='1' ");
        
        $num_row 	= mysqli_num_rows($query2);
        $row2      = mysqli_fetch_array($query2);
        
        
    

        $query3=mysqli_query($con,"SELECT * FROM persons WHERE Email='$username' and password='$password' AND ad_control='0'  ");
        $num_row3 	= mysqli_num_rows($query3);
      

    
        $query4=mysqli_query($con,"SELECT * FROM persons WHERE Email='$username' and password='$password' AND ad_control='1'  ");
        $num_row4 	= mysqli_num_rows($query4);

        $row4      = mysqli_fetch_array($query4);
        
        $val=$row4['RegNo'];
        // echo $val;




			if ($admin['user_type'] == 'admin') {

        $_SESSION['start'] = time();


        $_SESSION['adminexpire'] = $_SESSION['start'] + (10) ; 
				$_SESSION['user'] = $admin;
                $_SESSION['login']=$_POST['username'];
                $_SESSION['id']=$admin['id'];

                
                   echo "<script type='text/javascript'> document.location = '../admin/pages/admindashboard.php'; </script>";	    
            }
            
            else if ($num_row > 0)         {

                $_SESSION['start'] = time();


                $_SESSION['expire'] = $_SESSION['start'] + (6000) ; 
                
                $_SESSION['login']=$row2['username'];
                
                $_SESSION['id']=$row2['id'];
                
                
                            header('location:../faculty/pages/facultydashboard.php');
                            
                
            }
        else if ($num_row1 >  0) 
            {
                $message="  Account may be deactivated";
                
         
            }
            else if ($num_row4 > 0)         {

                
                $_SESSION['start'] = time();


                $_SESSION['expire'] = $_SESSION['start'] + (6000) ; 
                                $_SESSION['id']=$row4['id'];
            
            
            
                                header('location:../pages/dashboard.php');
                                

                            
                
            }
        else if ($num_row3 >  0) 
            {
                $message="  Account may be deactivated";
                
         
            }


            else{

                $message= " Invalid Username / Password ";
                                
           
            }

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



    <title>TCEPlacementPortal  | login </title>

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
  
      TCEPlacement Login
</p>

    <?php if($message){ ?>
<small class="text-danger " style="font-size: 14px; font-weight: 500;"><?php echo htmlentities($message);?></small>
<?php } ?>


<br>

<br>






    <form class="needs-validation" method="post" action="login.php" novalidate>
 
 
  


    <div class="col-md-18 mx-auto">


      <div class="form-group">
    <label class="has-float-label" for="validationServer01">
      <input class="form-control a1"  type="text" name="username"id="validationServer01" placeholder="mail@tce.edu" required/>
      <span class="ff" style="margin-top: 0.3rem; background:white; 
    font-family: 'Google Sans',Roboto,Arial,sans-serif; 
  margin-left:-4px;">Login</span>
    </label>
    </div>


    
      <div class="form-group">
      <label class="has-float-label">
    <input class="form-control" id="password" name="password" type="password" placeholder="........." required/>
    <span class="ff" style="margin-top:0.3rem; background:white; 
    font-family: 'Google Sans',Roboto,Arial,sans-serif; 
  margin-left:-4px;">Password</span>
      </label>
      </div>
    </div>





  
 

<a href="forgetpass.php" class="float-right" style="font-size: 14px; font-weight: 400;">Forgot password?</a>

 
 
</div>
<div class="card-footer bg-white">
      
   <a href="register.php" class="float-left btn btn-sm  text-primary" name="login">SIGNUP

    </a>

<button  type="submit" class="float-right btn btn-sm  text-success" name="login">LOGIN

</button>

</form>
  </div>
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