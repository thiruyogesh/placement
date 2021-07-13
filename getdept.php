<?php
	$con = mysqli_connect('localhost', 'hosttech_tce', '8?$[9=?YHQib', 'hosttech_placementportal');

$departid = 0;



if(isset($_POST['depart'])){

   $departid = mysqli_real_escape_string($con,$_POST['depart']); // department id

}



$users_arr = array();



if($departid != Null){

    $sql = "SELECT id,depart_name FROM department WHERE department=".$departid;



    $result = mysqli_query($con,$sql);

    

    while( $row = mysqli_fetch_array($result) ){

        $id = $row['id'];

        $name = $row['depart_name'];

    

        $users_arr[] = array("id" => $id, "name" => $name);

    }

}



// encoding array to json format

echo json_encode($users_arr);