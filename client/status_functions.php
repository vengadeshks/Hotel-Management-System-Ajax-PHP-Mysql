<?php

include("../include/functions.php");


//set paid 
if(isset($_POST['paymentType'])){
    $bookingID = $_POST['bookingId'];
    $Type = $_POST['paymentType'];
    $query_updateStatus = "UPDATE room_booking SET Status='Paid' where BookingId= '$bookingID'";

    // Room Id -> to set Available
    $query_fetchRoomId = "SELECT * from room_booking where BookingId= $bookingID ";
    $result = mysqli_query($con,$query_fetchRoomId);
    $row = mysqli_fetch_assoc($result);

    $query_insert = "INSERT INTO room_payment(BookingId,PaymentType,PaymentDate,Amount) values('$bookingID','$Type',CURDATE(),".$row['Amount'].")";
    
    $sendData = array();
    if( (mysqli_query($con,$query_updateStatus)) && (mysqli_query($con,$query_insert)) ){
        $message = "Payment Successful!";
        $sendData = array(
            "msg"=>$message,
            "error"=>""
        );
       
    }else{
        $error = "Oh no ! Your Payment is Failed , Try After sometimes";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
      
    }

    echo json_encode($sendData);
}

// cancal the room booking from client side 
if(isset($_POST['roomBookingCancel'])){
    $bookingID = $_POST['bookingId'];
    $query_updateStatus = "UPDATE room_booking SET Status='Cancelled' where BookingId= '$bookingID'";

    // Room Id -> to set Available
    $query_fetchRoomId = "SELECT RoomId from room_booking where BookingId= $bookingID ";
    $result = mysqli_query($con,$query_fetchRoomId);
    $row = mysqli_fetch_assoc($result);
    $query_updateAvail = "UPDATE room_list SET Booking_status='Available' where RoomId= '".$row["RoomId"]."'";


    $sendData = array();
    if(mysqli_query($con,$query_updateStatus)  &&  mysqli_query($con,$query_updateAvail) ){
        $error = "Your Booking Was Cancelled";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
       
    }else{
        $error = "Oh no ! Your Action is Failed , Try After sometimes";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
      
    }
    
    echo json_encode($sendData);
}

// -------------------------------------- Event Action ------------------------------------------

//set paid for Event Booking

if(isset($_POST['eventPaymentType'])){
    $bookingID = $_POST['eventBookingId'];
    $Type = $_POST['eventPaymentType'];
    $query_updateStatus = "UPDATE event_booking SET Status='Paid' where BookingId= '$bookingID'";

    // Room Id -> to set Available
    $query_fetchRoomId = "SELECT * from event_booking where BookingId= $bookingID ";
    $result = mysqli_query($con,$query_fetchRoomId);
    $row = mysqli_fetch_assoc($result);

    $query_insert = "INSERT INTO event_payment(BookingId,PaymentType,PaymentDate,Amount) values('$bookingID','$Type',CURDATE(),".$row['Amount'].")";
    
    $sendData = array();
    if( (mysqli_query($con,$query_updateStatus)) && (mysqli_query($con,$query_insert)) ){
        $message = "Payment Successful!";
        $sendData = array(
            "msg"=>$message,
            "error"=>""
        );
       
    }else{
        $error = "Oh no ! Your Payment is Failed , Try After sometimes";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
      
    }

    echo json_encode($sendData);
}


// cancel the event booking from client side


if(isset($_POST['eventBookingCancel'])){
    $bookingID = $_POST['bookingId'];
    $query_updateStatus = "UPDATE event_booking SET Status='Cancelled' where BookingId= '$bookingID'";

    // Event Id -> to set Available
    $query_fetchEventId = "SELECT EventId from event_booking where BookingId= $bookingID ";
    $result = mysqli_query($con,$query_fetchEventId);
    $row = mysqli_fetch_assoc($result);
    $query_updateAvail = "UPDATE event_list SET Booking_status='Available' where EventId= '".$row["EventId"]."'";


    $sendData = array();
    if(mysqli_query($con,$query_updateStatus)  &&  mysqli_query($con,$query_updateAvail) ){
        $error = "Your Booking Was Cancelled";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
       
    }else{
        $error = "Oh no ! Your Action is Failed , Try After sometimes";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
      
    }
    
    echo json_encode($sendData);
}

?>