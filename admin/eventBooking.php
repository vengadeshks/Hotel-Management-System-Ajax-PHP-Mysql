<?php include("include/header.php");
if(!isset($_SESSION['loggedUserId'])) {
  echo "<script> window.location.href = '../login.php';</script>";
}
?>


<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">

<h2 class="mb-4">Event Booking</h2>


    
<!-- Payment Modal -->

<div class="modal" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make Payment</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="modal-payment" action="status_functions.php" method="POST" autocomplete="off">
                  <!-- for getting the id when the form is submitted  -->
            <label for="eventPaymentType">Choose payment method</label>
            <select name="eventPaymentType" id="eventPaymentType" class="form-control custom-select bg-white border-md filter" required>
    
                <option value="Cash">Cash</option>
                <option value="Net Banking">Net Banking</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
            </select>
            <input type="hidden" id="eventBookingId" name="eventBookingId">

            
            
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Pay</button>
           
          </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Booking Details</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card card-margin" id="details">
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<br>

 <!-- Filter Drop down  -->
<div class="float-right filterBy">
<select name="category" id="eventBookingFilter" class="form-control custom-select bg-white border-md filter">
  <option disabled="" selected="">FilterBy </option>
  <option value="1">All Booking</option>
  <option value="2">Booked</option>
  <option value="3">Paid Booking</option>
  <option value="4">Cancelled Booking</option>
  <option value="5">Rejected Booking</option>
  <option value="6">Expired Booking</option>
  <option value="7">CheckedOut Events</option>
</select>
</div>


 <!-- table for the display the content  -->
 <div class="container-fluid" id="contentArea">

        
</div>


</div>

<script src="js/eventBooking.js" type="text/javascript"></script>

<?php include("include/footer.php"); ?>