<?php

include("../include/functions.php");
if(isset($_POST['bookRoom'])){

    $roomTypeId = $_POST['roomTypeId'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $no_of_guest = $_POST['no_of_guest'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $totalCost = $_POST['totalCost'];
    $userId = $_SESSION['loggedUserId'];

    $checkIn = strtotime($checkIn);
    $checkIn = date('Y-m-d',$checkIn); 
    
    $checkOut = strtotime($checkOut);
    $checkOut = date('Y-m-d',$checkOut);

    $query_roomType = "select * from room_list where RoomTypeId = '$roomTypeId' AND Status = 'active' order by RoomId";
    $roomType  = mysqli_query($con,$query_roomType);
    if(mysqli_num_rows($roomType)>0)
{  
  while($row=mysqli_fetch_assoc($roomType))
{
      $flag = false;
      $ID=$row['RoomId'];
      if ($row['Booking_status']=='Available')
      { 
           $flag =true;
           $reg="INSERT into room_booking (RoomId,User_id,Date,CheckIn,CheckOut,NoOfGuest,Amount,Email,Phone_number)
            values('$ID','$userId',curdate(),'$checkIn','$checkOut','$no_of_guest','$totalCost','$email','$contactno') ";

           $update_query = "UPDATE room_list SET Booking_status = 'Booked' where RoomId = '$ID'";
            
           mysqli_query($con,$update_query);
           mysqli_query($con,$reg);
           break ; 
      }
      
  }
    if ($flag==false)
    {
       
        echo "<script>alert('Oops! Rooms are not available..'); window.location.href='room.php'; </script>";
        
    }
      else {
 
        echo "<script>alert('Booking Successfull..'); window.location.href='mybooking.php'; </script>";
}
     
}
else {
    echo "<script>alert('Oops! Rooms are not available'); window.location.href='room.php'; </script>";
}


}

if(isset($_POST['bookEvent'])){

    $eventTypeId = $_POST['eventTypeId'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $no_of_guest = $_POST['no_of_guest'];
    $eventDate = $_POST['eventDate'];
    $eventTime = $_POST['eventTime'];
    $eventTime = date("H:i", strtotime($eventTime));
    $total_hours = $_POST['total_hours'];
    $totalCost = $_POST['totalCost'];
    $userId = $_SESSION['loggedUserId'];

    $eventDate = strtotime($eventDate);
    $eventDate = date('Y-m-d',$eventDate); 
    

    $query_eventType = "select * from event_list where EventTypeId = '$eventTypeId' AND Status = 'active' order by EventId";
    $Type  = mysqli_query($con,$query_eventType);
    if(mysqli_num_rows($Type)>0)
{  
  while($row=mysqli_fetch_assoc($Type))
{
      $flag = false;
      $ID=$row['EventId'];
      if ($row['Booking_status']=='Available')
      { 
          
           $reg="INSERT into event_booking (EventId,User_id,Date,Event_date,NoOfGuest,EventTime,Package,Amount,Email,Phone_number)
            values('$ID','$userId',curdate(),'$eventDate','$no_of_guest','$eventTime','$total_hours','$totalCost','$email','$contactno') ";

           $update_query = "UPDATE event_list SET Booking_status = 'Booked' where EventId = '$ID'";
           
           if(mysqli_query($con,$update_query) &&  mysqli_query($con,$reg)){
             $flag =true;
           }
           break ; 
      }
      
  }
    if ($flag==false)
    {
       
        echo "<script>alert('Oops! Event hall are not available..'); window.location.href='event.php'; </script>";
        
    }
      else {
 
        echo "<script>alert('Booking Successfull..');window.location.href='mybooking.php'; </script>";

}
     
}
else {
    echo "<script>alert('Oops! Active Event halls are not available'); window.location.href='room.php'; </script>";
}


}

// ----------------------------------------- Account Action -----------------------------------------------
//update the datals of user table

if(isset($_POST['updateAccount'])){
             
  $user_id = mysqli_real_escape_string($con, $_POST['updateAccount']);
  $firstname = mysqli_real_escape_string($con, $_POST['firstName']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $contactno = mysqli_real_escape_string($con, $_POST['contactno']);  
  $gender = mysqli_real_escape_string($con, $_POST['gender']);

  // profile image upload
  $profileImageName = $_FILES["profileImage"]["name"];
  $tempname = $_FILES["profileImage"]["tmp_name"];   
  $folder = "../assets/picture/profiles/".$profileImageName;
       

  // $re_pass = base64_encode(mysqli_real_escape_string($conn, $_POST['reg_pass']));

  $User_details="SELECT * FROM users_details WHERE (Firstname='$firstname' OR Email='$email') AND UserId <> ' $user_id '";
  $result=mysqli_query($con,$User_details)or die("can't fetch");
  $num=mysqli_num_rows($result);


  $sendData = array();
 
  
 if ($firstname == "admin") {
      $error="Invalid Username (You cannot use the username as admin!)";
      $sendData = array(
          "msg"=>"",
          "error"=>$error
      );
      echo json_encode($sendData);
  } 
 else if ($num>0) {
      $error="Username or email id is already taken!";
      $sendData = array(
          "msg"=>"",
          "error"=>$error
      );
      echo json_encode($sendData);
  } else {

                  // query validation
                  $update="UPDATE users_details SET  FirstName='$firstname', LastName ='$lastname',Email='$email',ContactNo='$contactno',Gender='$gender',ProfileImage='$profileImageName' where UserId = '$user_id'" ;


                  if(mysqli_query($con,$update))
                  {
                      if(!move_uploaded_file($tempname, $folder)){
                      //if(false){
                          $error ="Error in Updation ...! Try after sometime";
                          $sendData = array(
                              "msg"=>"",
                              "error"=>$error
                          );
                          echo json_encode($sendData);
                      }else{
                        $message = "User details updated";
                        // message("user.php","User Added");
                        $sendData = array(
                          "msg"=>$message,
                          "error"=>""
                      );
                      echo json_encode($sendData);
                      }
                  }
                  else{
                        $error ="Error in Updation ...! Try after sometime";
                        $sendData = array(
                          "msg"=>"",
                          "error"=>$error
                      );
                      echo json_encode($sendData);

                }

           
      
 }

}

// -------------------------------- Change password -----------------------------------

if(isset($_POST["oldPassword"])){
  $old = $_POST['oldPassword'];
  $new = $_POST['newPassword'];
  $ID = $_POST['change_password'];

  $Q = "SELECT * FROM users_details Where UserId = '$ID'";
  $res = mysqli_query($con,$Q);
  $row = mysqli_fetch_assoc($res);
  $num = mysqli_num_rows($res);

 
  $sendData = array();
  if($num>0){

      if($old == $row['Password']){
          $Q_update = "UPDATE users_details us SET us.Password = '$new' Where UserId = '$ID'";
          $result = mysqli_query($con,$Q_update);
          $msg = "Password Changed";
          $sendData = array(
              "msg"=>$msg,
              "error"=>""
          );
      }else{
          $error ="Oops! Wrong Old Password";
          $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
      }
  }else{

      $error ="Invalid User ID ";
      $sendData = array(
        "msg"=>"",
        "error"=>$error
    );
  }
echo json_encode($sendData);
}
?>