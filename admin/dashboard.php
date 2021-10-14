<?php include("include/header.php");
if(!isset($_SESSION['loggedUserId'])) {
  echo "<script> window.location.href = '../login.php';</script>";
}
?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">

<h2 class="mb-4">Dashboard</h2>
<h6 class="mb-4">Booking Summary</h6>
<div class = "container">
  <canvas id="myChart"></canvas>
</div>
 <br><br>

 
<div class="row ml-4" >

<div class="col-md-6 col-sm-12">
<div class="card border-light mb-3" style="max-width: 36rem;">
  <div class="card-header  font-weight-bold">Room Booking Status<span class="text-muted"> (Current year)</span></div>
  <div class="card-body">
<div class="row">
<div class="col-md-6 col-sm-12">
   
   <p class="font-weight-bold">Total Booking</p>
      <p id="room_total_booking">...</p>
      <p class="font-weight-bold">Rejected Booking</p>
      <p id="room_rejeted_booking">...</p>
      <p class="font-weight-bold">Cancalled Booking</p>
      <p id="room_cancelled_booking">...</p>
   </div>
   <div class="col-md-6 col-sm-12">
     
   <p class="font-weight-bold">Booked Booking</p>
      <p id="room_booked_booking">...</p>
      <p class="font-weight-bold">Paid Booking</p>
      <p id="room_paid_booking">...</p>
      <p class="font-weight-bold">Checked Out Booking</p>
      <p id="room_checkedout_booking">...</p>
   </div>
</div>
    
  </div>
</div>
</div>

<div class="col-md-6 col-sm-12">
<div class="card border-light mb-3" style="max-width: 36rem;">
  <div class="card-header  font-weight-bold">Event Booking Status<span class="text-muted"> (Current year)</span></div>
  <div class="card-body">
<div class="row">
<div class="col-md-6 col-sm-12">
   
   <p class="font-weight-bold">Total Booking</p>
      <p id="event_total_booking">...</p>
      <p class="font-weight-bold">Rejected Booking</p>
      <p id="event_rejeted_booking">...</p>
      <p class="font-weight-bold">Cancalled Booking</p>
      <p id="event_cancelled_booking">...</p>
   </div>
   <div class="col-md-6 col-sm-12">
     
   <p class="font-weight-bold">Booked Booking</p>
      <p id="event_booked_booking">...</p>
      <p class="font-weight-bold">Paid Booking</p>
      <p id="event_paid_booking">...</p>
      <p class="font-weight-bold">Checked Out Booking</p>
      <p id="event_checkedout_booking">...</p>
   </div>
</div>
    
  </div>
</div>
</div>

</div>

<div class="row ml-4" >

<div class="col-md-4 col-sm-12">
<div class="card border-light mb-3" style="max-width: 18rem;">
  <div class="card-header  font-weight-bold">Room Details <span class="text-muted"> (Current year)</span></div>
  <div class="card-body">
 
    <p class="font-weight-bold">Available Room Type</p>
    <p id="room_type">...</p>
    <p class="font-weight-bold">Total Rooms</p>
    <p id="rooms">...</p>
    <p class="font-weight-bold">Available Rooms</p>
    <p id="avail_room">...</p>
    
  </div>
</div>
</div>

<div class="col-md-4 col-sm-12">
<div class="card border-light mb-3" style="max-width: 18rem;">
  <div class="card-header  font-weight-bold">Event Details <span class="text-muted"> (Current year)</span></div>
  <div class="card-body">
 
    <p class="font-weight-bold">Available Event Type</p>
    <p id="event_type">...</p>
    <p class="font-weight-bold">Total Halls</p>
    <p id="events">...</p>
    <p class="font-weight-bold">Available Halls</p>
    <p id="avail_event">...</p>
   
  </div>
</div>
</div>

<div class="col-md-4 col-sm-12">
<div class="card border-light mb-3" style="max-width: 18rem;">
  <div class="card-header font-weight-bold">Amount Details <span class="text-muted"> (Current year)</span></div>
  <div class="card-body">
 
    <p class="font-weight-bold">Room Booking Total</p>
    <p id="room_booking">...</p>
    <p class="font-weight-bold">Event Booking Total</p>
    <p id="event_booking">...</p>
    <p class="font-weight-bold">Total Amount</p>
    <p id="total_amount">...</p>
   
  </div>
</div>
</div>