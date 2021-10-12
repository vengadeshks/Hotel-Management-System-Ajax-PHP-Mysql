<?php
include("functions.php");

// -------------------------------------------- Room Bo0king Pdf ------------------------------------
if(isset($_POST['bookingId'])){
    $bId = $_POST['bookingId'];


    $SQL = "SELECT rm.*,rt.RoomType,rl.RoomNumber,us.FirstName FROM room_booking rm 
                        inner join room_list rl on rl.RoomId = rm.RoomId
                        inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                        inner join users_details us on us.Userid = rm.User_id 
                        WHERE BookingId ='$bId'"; 
    
    $query=mysqli_query($con,$SQL);
    $result=mysqli_fetch_assoc($query);
    echo $result;

    //  ob_end_clean();

    require('fpdf/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',16);
    $pdf->SetFont('helvetica','',10);
    $pdf->SetFont('Arial','B',30);
    $pdf->Cell(200,5,"THE HOTEL ELITE",0,0,'C');
    $pdf->Ln(15);

    $pdf->SetFont('Times','',20);
    $pdf->Cell(180,5,"ROOM BOOKING BILL",0,0,'C');
    $pdf->Ln(30);

    $pdf->SetFont('Arial','',15);	
    $pdf->Cell(100,5,"User Name ",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['FirstName'],0,0);
    $pdf->Ln(20);

    $pdf->Cell(100,5,"Email",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['Email'],0,0);
    $pdf->Ln(20);

    $pdf->Cell(100,5,"Phone Number",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['Phone_number'],0,0);
    $pdf->Ln(20);


    $pdf->Cell(100,5,"Checkin Date",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['CheckIn'],0,0);
    $pdf->Ln(20);

    $pdf->Cell(100,5,"Checkout Date",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['CheckOut'],0,0);
    $pdf->Ln(20);

    $pdf->Cell(100,5,"No of Guest",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['NoOfGuest'],0,0);
    $pdf->Ln(20);

    
    $pdf->Cell(100,5,"Room Type",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['RoomType'],0,0);
    $pdf->Ln(20);

    
    $pdf->Cell(100,5,"Room Number",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['RoomNumber'],0,0);
    $pdf->Ln(20);

    
    $pdf->Cell(100,5,"Date of Booking",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['Date'],0,0);
    $pdf->Ln(20);


    $pdf->Cell(100,5,"Total Amount",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['Amount'],0,0);
    $pdf->Ln(20);

    
    $pdf->Cell(100,5,"Status",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['Status'],0,0);
    $pdf->Ln(20);


    ob_clean() ;

    $pdf->output();
 
    
}

// -------------------------------------------- Event Bo0king Pdf ------------------------------------


if(isset($_POST['eventBookingId'])){
    $bId = $_POST['eventBookingId'];


    $SQL = "SELECT em.*,et.EventType,el.HallNumber,us.FirstName FROM event_booking em 
                        inner join event_list el on el.EventId = em.EventId
                        inner join event_type et on el.EventTypeId = et.EventTypeId 
                        inner join users_details us on us.Userid = em.User_id 
                        WHERE BookingId ='$bId'"; 
    
    $query=mysqli_query($con,$SQL);
    $result=mysqli_fetch_assoc($query);
    echo $result;

    //  ob_end_clean();

    require('fpdf/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',16);
    $pdf->SetFont('helvetica','',10);
    $pdf->SetFont('Arial','B',30);
    $pdf->Cell(200,5,"THE HOTEL ELITE",0,0,'C');
    $pdf->Ln(15);

    $pdf->SetFont('Times','',20);
    $pdf->Cell(200,5,"EVENT BOOKING BILL",0,0,'C');
    $pdf->Ln(30);

    $pdf->SetFont('Arial','',15);	
    $pdf->Cell(100,5,"User Name ",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['FirstName'],0,0);
    $pdf->Ln(15);

    $pdf->Cell(100,5,"Email",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['Email'],0,0);
    $pdf->Ln(15);

    $pdf->Cell(100,5,"Phone Number",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['Phone_number'],0,0);
    $pdf->Ln(15);


    $pdf->Cell(100,5,"Event Date",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['Event_date'],0,0);
    $pdf->Ln(15);
    

    $pdf->Cell(100,5,"Event Time",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['EventTime'],0,0);
    $pdf->Ln(15);

    $pdf->Cell(100,5,"Package",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['Package']."Hrs",0,0);
    $pdf->Ln(15);

    $pdf->Cell(100,5,"No of Guest",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['NoOfGuest'],0,0);
    $pdf->Ln(15);

    
    $pdf->Cell(100,5,"Event Type",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['EventType'],0,0);
    $pdf->Ln(15);

    
    $pdf->Cell(100,5,"Hall Number",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['HallNumber'],0,0);
    $pdf->Ln(15);

    
    $pdf->Cell(100,5,"Date of Booking",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['Date'],0,0);
    $pdf->Ln(15);


    $pdf->Cell(100,5,"Total Amount",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['Amount'],0,0);
    $pdf->Ln(15);

    
    $pdf->Cell(100,5,"Status",0,0,'C');
    $pdf->Cell(20,5,":",0,0);
    $pdf->Cell(50,5,$result['Status'],0,0);
    $pdf->Ln(15);


    ob_clean() ;

    $pdf->output();
 
    
}


?>