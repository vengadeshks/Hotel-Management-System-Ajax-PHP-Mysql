<?php include("include/header.php");
if(!isset($_SESSION['loggedUserId'])) {
  echo "<script> window.location.href = '../login.php';</script>";
}
 ?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">

<h2 class="mb-4">Event Booking Payment</h2>


<br>
 <!-- Filter Drop down  -->
 <div class="float-right filterBy">
<select name="category" id="eventPaymentFilter" class="form-control custom-select bg-white border-md filter">
  <option disabled="" selected="">FilterBy  </option>
  <option value="1">All</option>
  <option value="2">Cash</option>
  <option value="3">Credit Card Payment</option>
  <option value="4">Debit Card payment</option>
  <option value="5">Net banking</option>
  <option value="6">Less than 5000</option>
  <option value="7">between 5000 and 10000</option>
  <option value="8">between 10000 and 15000</option>
  <option value="9">Above 15000</option>
</select>
</div>
 <!-- table for the display the content  -->
 <div class="container-fluid" id="contentArea">

        
</div>


</div>
<script src="js/eventPayment.js"></script>
<?php include("include/footer.php"); ?>

