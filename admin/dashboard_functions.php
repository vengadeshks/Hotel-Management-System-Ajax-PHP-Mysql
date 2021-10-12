<?php

include('../include/dbConnect.php');

if(isset($_POST['graph'])){
    //sum of booking amount for the each month
    $query1 = "select year(PaymentDate),month(PaymentDate) as Month,sum(Amount) as Sum from room_payment
                where year(PaymentDate) = year(CURDATE())
                group by year(PaymentDate),month(PaymentDate) 
                order by year(PaymentDate),month(PaymentDate)";    

    $query2 = "select year(PaymentDate),month(PaymentDate) as Month,sum(Amount) as Sum from event_payment
                where year(PaymentDate) = year(CURDATE())
                group by year(PaymentDate),month(PaymentDate) 
                order by year(PaymentDate),month(PaymentDate)";

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
    $query1 = "SELECT Status,count(bookingId) as count FROM room_booking where year(date)=year(CURDATE()) group by Status";
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
     $query2 = "SELECT Status,count(bookingId) as count FROM event_booking where  year(date)=year(CURDATE()) group by Status";
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


     // Card 3

     $roomDetails = array(
         "NoRoomTypes"=>"0",
         "NoRooms"=>"0",
         "AvailRooms"=>"0"
     );
    
     $query3 = "SELECT count(RoomTypeId) as count FROM room_type where Status = 'active'";
     $query4 = "SELECT count(RoomId) as count FROM room_list where Status = 'active'";
     $query5 = "SELECT count(RoomId) as count FROM room_list where Status = 'active' AND Booking_status='Available' ";

     $result3 = mysqli_query($con,$query3);
     $result4 = mysqli_query($con,$query4);
     $result5 = mysqli_query($con,$query5);

     $row3 = mysqli_fetch_assoc($result3);
     $row4 = mysqli_fetch_assoc($result4);
     $row5 = mysqli_fetch_assoc($result5);

     $roomDetails["NoRoomTypes"] = $row3['count'];
     $roomDetails["NoRooms"] = $row4['count'];
     $roomDetails["AvailRooms"] = $row5['count'];



     // Card 4

     $roomDetails = array(
         "NoRoomTypes"=>"0",
         "NoRooms"=>"0",
         "AvailRooms"=>"0"
     );
    
     $query3 = "SELECT count(RoomTypeId) as count FROM room_type where Status = 'active'";
     $query4 = "SELECT count(RoomId) as count FROM room_list where Status = 'active'";
     $query5 = "SELECT count(RoomId) as count FROM room_list where Status = 'active' AND Booking_status='Available' ";

     $result3 = mysqli_query($con,$query3);
     $result4 = mysqli_query($con,$query4);
     $result5 = mysqli_query($con,$query5);

     $row3 = mysqli_fetch_assoc($result3);
     $row4 = mysqli_fetch_assoc($result4);
     $row5 = mysqli_fetch_assoc($result5);

     $roomDetails["NoRoomTypes"] = $row3['count'];
     $roomDetails["NoRooms"] = $row4['count'];
     $roomDetails["AvailRooms"] = $row5['count'];


     // Card 4

     $eventDetails = array(
        "NoEventTypes"=>"0",
        "NoHalls"=>"0",
        "AvailHalls"=>"0"
    );
    
    $query6 = "SELECT count(EventTypeId) as count FROM event_type where Status = 'active'";
    $query7 = "SELECT count(EventId) as count FROM event_list where Status = 'active'";
    $query8 = "SELECT count(EventId) as count FROM event_list where Status = 'active' AND Booking_status='Available' ";
    
    $result6 = mysqli_query($con,$query6);
    $result7 = mysqli_query($con,$query7);
    $result8 = mysqli_query($con,$query8);
    
    $row6 = mysqli_fetch_assoc($result6);
    $row7 = mysqli_fetch_assoc($result7);
    $row8 = mysqli_fetch_assoc($result8);
    
    $eventDetails["NoEventTypes"] = $row6['count'];
    $eventDetails["NoHalls"] = $row7['count'];
    $eventDetails["AvailHalls"] = $row8['count'];
    
    // card 5
    $amountDetails = array(
        "RoomBooking"=>"0",
        "EventBooking"=>"0",
        "Total"=>"0"

    );

    $query9 = "SELECT SUM(Amount) as sum  from room_payment";
    $query10 = "SELECT SUM(Amount) as sum from event_payment";

    $result9 = mysqli_query($con,$query9);
    $result10 = mysqli_query($con,$query10);
    
    $row9 = mysqli_fetch_assoc($result9);
    $row10 = mysqli_fetch_assoc($result10);

    $amountDetails["RoomBooking"] = $row9['sum'];
    $amountDetails["EventBooking"] = $row10['sum'];
    $amountDetails["Total"] = $row9['sum']+$row10['sum'];

     // response
     $sendData = array(
         "roomBookingStatus"=>$roomBookingStatus,
         "eventBookingStatus"=>$eventBookingStatus,
         "roomDetails"=>$roomDetails,
         "eventDetails"=>$eventDetails,
         "amountDetails"=>$amountDetails
     );
    echo json_encode($sendData);
}



?>