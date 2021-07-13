<?php 
error_reporting(0);
include('../db/server.php');

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
  
 Student Signup</p>


    <?php if($message){ ?>
<div class="alert alert-danger" role="alert">
<small>Oh snap!</small><br><?php echo htmlentities($message);?></div>
<?php } ?>

    <form class="needs-validation" name="form1" method="post" action="register.php" onclick="return ValidateEmail(this)" novalidate>
 
    




    <div class="form-group">
    <label class="has-float-label" for="validationServer01">
      <input type="text" class="form-control textname" onblur="AadharValidate();"  name="username" id="validationServer01" maxlength="30"  placeholder="Fullname"  required>


      <span style="margin-top: 0.3rem; background:white; 
    font-family: 'Google Sans',Roboto,Arial,sans-serif; 
  margin-left:-4px;">Student Name</span>
    </label>
    
   <span id="lblError" style="font-size:12px;color: red;"></span>

    <label class="has-float-label" for="validationServer02">
     

      <input type="text" class="form-control regno" id="validationServer02" name="Regno" maxlength="10" onblur="AadharValidate1();"  placeholder="Ex:18c.."  required>


      <span style="margin-top: 0.3rem; background:white; 
    font-family: 'Google Sans',Roboto,Arial,sans-serif; 
  margin-left:-4px;">Regno</span>
    </label>
    <span id="regerror" style="font-size:12px;color: red;"></span>
    
   
<!--  -->
      

<label class="has-float-label" for="">
     

<select id="sel_depart" class="form-control select" name="degree" required="required" data-rule-required="true" data-msg-required="Enter  your Degree in TCE">


<option value="">- Select -</option>


<?php 
// Fetch Department
$sql_department = "SELECT * FROM engineering";
$department_data = mysqli_query($db,$sql_department);
while($row = mysqli_fetch_assoc($department_data) ){
    $departid = $row['id'];
    $engg_name = $row['engg_name'];
  
    // Option
    echo "<option value='".$departid."' >".$engg_name."</option>";
}
?>
</select>


<div class="clear"></div>



   


     <span style="margin-top: 0.3rem; background:white; 
   font-family: 'Google Sans',Roboto,Arial,sans-serif; 
 margin-left:-4px;">Degree</span>
   </label>
   <span id="regerror" style="font-size:12px;color: red;"></span>



<!-- 



 -->


 
<label class="has-float-label" for="">
     

<select id="sel_user" class="form-control select" name="branch" required="required" data-rule-required="true" data-msg-required="Enter your Department">
            <option value="">- Select -</option>
            
        </select>


   
</select>


     <span style="margin-top: 0.3rem; background:white; 
   font-family: 'Google Sans',Roboto,Arial,sans-serif; 
 margin-left:-4px;">Department</span>
   </label>
   <span id="regerror" style="font-size:12px;color: red;"></span>






 <label class="has-float-label" for="validationServer03">
     
   <input type="text" class="form-control email" name="Email" id="validationServer03" onblur="validate()" placeholder="xyz@student.tce.edu" required>

      <span style="margin-top: 0.3rem; background:white; 
    font-family: 'Google Sans',Roboto,Arial,sans-serif; 
  margin-left:-4px;">Email</span>
    </label>
   <span id="mailerror" style="color: red; font-size:12px;"></span>
 
    <label class="has-float-label" for="validationServer04">
     
    <input type="password"  id="validationServer04" class="form-control password_1" minlength="0"  onblur="validate()"name="password_1"    placeholder="Password" required>
      

      <span style="margin-top: 0.3rem; background:white; 
    font-family: 'Google Sans',Roboto,Arial,sans-serif; 
  margin-left:-4px;">Password</span>
    </label>
   <span id="lblgmerror" style="color: red; font-size:12px;"></span>
  

    <label class="has-float-label" for="validationServer05">

    <input type="password"  class="form-control password_2" name="password_2"  id="validationServer05"   placeholder="Password"   onblur="validate()" required>
      

      <span style="margin-top: 0.3rem; background:white; 
    font-family: 'Google Sans',Roboto,Arial,sans-serif; 
  margin-left:-4px;">Confirm-Password</span>
    </label>
    </div>
   




</div>

<div class="card-footer bg-white">
      

<a href="login.php" class="float-left btn btn-sm d-inline p-2  text-primary" name="login">Back

</a>



<button  type="submit" class="d-inline p-2 float-right btn btn-sm  text-success" style="margin-left:45px" id="btn-submit" disabled="disabled"  name="reg_user">SIGNUP</button>


</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $("#sel_depart").change(function(){
            var deptid = $(this).val();

            $.ajax({
                url: 'getdept.php',
                type: 'post',
                data: {depart:deptid},
                dataType: 'json',
                success:function(response){

                    var len = response.length;

                    $("#sel_user").empty();
                    for( var i = 0; i<len; i++){
                        var id = response[i]['id'];
                        var name = response[i]['name'];

                        $("#sel_user").append("<option value='"+name+"'>"+name+"</option>");

                    }
                }
            });
        });

    });
</script>

  </div>

   </div>
  </div>

   <script type="text/javascript" src="../js/jquery.min.js"></script>
       

   <script type="text/javascript">
    function AadharValidate() {
        var aadhar = document.getElementById("validationServer01").value;
        var rule = /^[A-Z a-z ]+$/;


        if (aadhar != '') {
            if (aadhar.match(rule)) {
                return true;
            }
            else {
                alert("Alphabets only allowed.");
                  $("#lblError").html("Alphabets only allowed.");
                return false;
            }
        }
    }
</script>


<script type="text/javascript">
    function AadharValidate1() {
        var aadhar1 = document.getElementById("validationServer02").value;
        var rule1 = /^[A-Za-z0-9]*$/;


        if (aadhar1 != '') {
            if (aadhar1.match(rule1)) {
                return true;
                
            }
            else {
                alert("Alphabets and numberic only allowed.");
                  $("#regerror").html("Alphabets and numberic only allowed.");
                return false;
            }
        }
    }
</script>




<!-- 
   <script type="text/javascript">

        $(function () {

          var keyCode = document.getElementsByClassName(".txtName").value;

                $("#lblError").html("");

                //Regex for Valid Characters i.e. Alphabets.
                var regex = /^[A-Z a-z ]+$/;

                //Validate TextBox value against the Regex.
                var isValid = regex.test(String.fromCharCode(keyCode));
                if (!isValid) {
                    $("#lblError").html("Only Alphabets allowed.");
                }

                return isValid;
            });
        
    </script>
 -->

   
<script>
function validate() {
	
	var valid = true;

	valid = valid && checkEmail($(".email"));
	
    $("#btn-submit").attr("disabled",true);
	if(valid) {
		$("#btn-submit").attr("disabled",false);
	}	
}
function checkEmpty(obj) {
	var name = $(obj).attr("name");
	$("."+name+"-validation").html("");	
	$(obj).css("border","");
	if($(obj).val() == "") {
		$(obj).css("border","#FF0000 1px solid");
		$("."+name+"-validation").html("Required");
		return false;
	}
	
	return true;	
}
function checkEmail(obj) {
	var result = true;
	
	var name = $(obj).attr("name");
	$("."+name+"-validation").html("");	

			$(obj).css("border","green 1px solid");

	result = checkEmpty(obj);
	
	if(!result) {
		$(obj).css("border","#FF0000 1px solid");
		$("."+name+"-validation").html("Required");
		return false;
	}
	var email_regex = /.+@(student.tce)\.edu$/;

    //var email_regex = /.+@(gmail)\.com$/;


	// var email_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,3})+$/;
	result = email_regex.test($(obj).val());
	
	if(!result) {
		$(obj).css("border","#FF0000 1px solid");
    window.alert("PLease Use Student ID");
    
    $("#mailerror").html("Use Student Id");
		$("."+name+"-validation").html("Invalid");
		return false;
	}
  else{
    
		$(obj).css("border","Green 1px solid");

    
  }
	
	return result;	
}
</script>		

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







  </body>
</html>





