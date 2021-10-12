<?php

include("../include/functions.php");

$userId = $_SESSION['loggedUserId'];
if(isset($_POST['graph'])){
    //sum of booking amount for the each month
    $query1 = "select year(rp.PaymentDate),month(rp.PaymentDate) as Month,sum(rp.Amount) as Sum from room_payment rp
                inner join room_booking rm on rp.BookingId = rm.BookingId
                where year(rp.PaymentDate) = year(CURDATE()) AND rm.User_id = '$userId'
                group by year(rp.PaymentDate),month(rp.PaymentDate) 
                order by year(rp.PaymentDate),month(rp.PaymentDate)";    

    $query2 ="select year(ep.PaymentDate),month(ep.PaymentDate) as Month,sum(ep.Amount) as Sum from event_payment ep
                inner join event_booking em on ep.BookingId = em.BookingId
                where year(ep.PaymentDate) = year(CURDATE()) AND em.User_id = '$userId'
                group by year(ep.PaymentDate),month(ep.PaymentDate) 
                order by year(ep.PaymentDate),month(ep.PaymentDate)";    

    $result1 = mysqli_query($con,$query1);
    $result2 = mysqli_query($con,$query2);

    $sendData = array();
    $roomMonthlyAmount = array(0,0,0,0,0,0,0,0,0,0,0,0);
    $eventMonthlyAmount = array(0,0,0,0,0,0,0,0,0,0,0,0);

    while($row = mysqli_fetch_assoc($result1)){
        $month = $row['Month']-1;
        $roomMonthlyAmount[$month] = $row['Sum'];
    }  
    while($row = mysqli_fetch_assoc($result2)){
        $month = $row['Month']-1;
        $eventMonthlyAmount[$month] = $row['Sum'];
    }
    $sendData = array(
        "Message"=>"Success",
        "roomMonthlyAmount"=>$roomMonthlyAmount,
        "eventMonthlyAmount"=>$eventMonthlyAmount
    );
    echo json_encode($sendData);
}

if(isset($_POST['card'])){

    $sendData = array();
    
    // Card 1
    // total room booking 
    $query1 = "SELECT Status,count(bookingId) as count FROM room_booking
               where year(date)=year(CURDATE()) AND User_id = '$userId'
               group by Status";
    $result1 = mysqli_query($con,$query1);

    $roomBookingStatus = array(
        "Booked"=>"0",
        "Paid"=>"0",
        "Rejected"=>"0",
        "Cancelled"=>"0",
        "CheckedOut"=>"0",
        "total"=>0
    );

    $totalCount = 0;
    while($row=mysqli_fetch_assoc($result1)){
        $status = $row['Status'];
        $roomBookingStatus[$status] =  $row['count'];
        $totalCount +=$row['count'];
    }
    $roomBookingStatus['total'] = $totalCount;

     //Card 2
     // total event booking 
     $query2 = "SELECT Status,count(bookingId) as count FROM event_booking 
                where  year(date)=year(CURDATE()) AND User_id = '$userId'
                 group by Status";
     $result2 = mysqli_query($con,$query2);
    
     $eventBookingStatus = array(
        "Booked"=>"0",
        "Paid"=>"0",
        "Rejected"=>"0",
        "Cancelled"=>"0",
        "CheckedOut"=>"0",
        "total"=>0
     );

     $totalCount = 0;
     while($row=mysqli_fetch_assoc($result2)){
        $status = $row['Status'];
        $eventBookingStatus[$status] =  $row['count'];
        $totalCount +=$row['count'];
     }
     $eventBookingStatus['total'] = $totalCount;


    
     // response
     $sendData = array(
         "roomBookingStatus"=>$roomBookingStatus,
         "eventBookingStatus"=>$eventBookingStatus
        
     );
    echo json_encode($sendData);
}



?>