<?php include('include/header.php') ;

if(!isset($_SESSION['loggedUserId'])) {
 header('Location:../login.php');
}

?>
<section id="dashboard" class="ml-5 my-5">
<h1 class="mb-4 ml-5 pl-5">Dashboard</h1>
<h5 class="mb-4 ml-5 pl-5 ">Booking Summary</h5>
<div class = "container">
  <canvas id="myChart"></canvas>
</div>
 <br><br>

 
<div class="row ml-4" >

<div class="col-6">
<div class="card border-light mb-3" style="max-width: 36rem;">
  <div class="card-header  font-weight-bold">Room Booking Status<span class="text-muted"> (Current year)</span></div>
  <div class="card-body">
<div class="row">
<div class="col-6">
   
   <p class="font-weight-bold">Total Booking</p>
      <p id="room_total_booking">...</p>
      <p class="font-weight-bold">Rejected Booking</p>
      <p id="room_rejeted_booking">...</p>
      <p class="font-weight-bold">Cancalled Booking</p>
      <p id="room_cancelled_booking">...</p>
   </div>
   <div class="col-6">
     
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

<div class="col-6">
<div class="card border-light mb-3" style="max-width: 36rem;">
  <div class="card-header  font-weight-bold">Event Booking Status<span class="text-muted"> (Current year)</span></div>
  <div class="card-body">
<div class="row">
<div class="col-6">
   
   <p class="font-weight-bold">Total Booking</p>
      <p id="event_total_booking">...</p>
      <p class="font-weight-bold">Rejected Booking</p>
      <p id="event_rejeted_booking">...</p>
      <p class="font-weight-bold">Cancalled Booking</p>
      <p id="event_cancelled_booking">...</p>
   </div>
   <div class="col-6">
     
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
</section>


<!-- CDN For chart js  -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src ="js/dashboard_function.js" ></script>

<?php include('include/footer.php')?>

