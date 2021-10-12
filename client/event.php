<?php 

include('include/header.php');
if(!isset($_SESSION['loggedUserId'])) {
    header('Location:../login.php');
}
   
?>

<section id="roomType" class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-2">
            <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
                <h2 class="my-3">Types of Events Available</h2>
            </div>
        </div>
 
 <!-- Filter Drop down  -->
 <div class="float-right ">
<select name="category" id="eventFilter" class="form-control custom-select bg-white border-md filter">
  <option disabled="" selected="">FilterBy  </option>
  <option value="1">All</option>
  <option value="2">below 1500</option>
  <option value="3">Cost between 1500 and 2000</option>
  <option value="4">Cost between 2000 and 2500</option>
  <option value="5">Cost above 2500</option>
</select>
</div>

<br>
<br>
<br>
        <div class="row" id="contentArea">
            
           
        </div>

    </div>
</section>

<script src ="js/eventType.js" ></script>

<?php include('include/footer.php')?>

