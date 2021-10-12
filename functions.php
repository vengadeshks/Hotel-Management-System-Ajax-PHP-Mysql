<?php 
include("include/dbConnect.php");

if(isset($_POST['Message'])){
    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $email = $_POST['Email'];
    $msg = $_POST['Message'];
    $insert_query = "INSERT INTO contact(FirstName,LastName,Email,Message) values('$fname','$lname','$email','$msg')";
    $sendData = array();
    if( mysqli_query($con,$insert_query)){
        $mesg="Thanks For Your Feedback!";
        $sendData = array(
            "msg"=>$mesg,
            "error"=>""
        );
    }else{
        $error="Server Down! Try After Sometimes...";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
    }
    
 
    echo json_encode($sendData);
}


?>