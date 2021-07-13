<?php

session_start();
include('../includes/config.php');



if(isset($_POST['login']))
  {
 
	$username = $_POST['username'];
	$password = $_POST['password'];

    // echo $username;
    // echo $password;
	// make sure form is filled properly

		$hashpassword = md5($password);
// echo $hashpassword;
		$query = "SELECT * FROM tbladmin WHERE (AdminUserName='$username' || AdminEmailId='$username') AND AdminPassword='$hashpassword' LIMIT 1";
        $results = mysqli_query($con, $query);
        
        
        $query2 		= mysqli_query($con, "SELECT * FROM persons WHERE  username='$username' and password='$hashpassword'  AND ad_control='1' ");
        $num_row 	= mysqli_num_rows($query2);
        

        
        $query1 		= mysqli_query($con, "SELECT * FROM persons WHERE  username='$username' and password='$hashpassword' AND ad_control='0'");
        
        $num_row1 	= mysqli_num_rows($query1);
        

            $admin = mysqli_fetch_array($results);
            
        $row1		= mysqli_fetch_array($query1);
            
            
        $row		= mysqli_fetch_array($query2);

			if ($admin['user_type'] == 'admin') {

				$_SESSION['user'] = $admin;
                $_SESSION['login']=$_POST['username'];
                
                   echo "<script type='text/javascript'> document.location = '../admin/pages/admindashboard.php'; </script>";	  
            }
            
            else if ($num_row > 0)         {			   
$_SESSION['start'] = time();
$_SESSION['expire'] = $_SESSION['start'] + (0.5 * 60) ; 
                $_SESSION['id']=$row['id'];



                header('location:../pages/dashboard.php');
                
            }
        else if ($num_row1 >  0) 
            {
                $message="  Account may be deactivated";
                
                header('location:login.php');
            }


            else{

                $message= " Invalid Username / Password ";
                                
                header('location:login.php');
            }

        }
        
     
	

    



?>