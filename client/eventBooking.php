<?php
 
 include('include/header.php');
 include('../include/dbConnect.php');
 
 ?>
<!-- Navbar-->
<?php

if(!isset($_SESSION['loggedUserId'])) {
    header('Location:../login.php');
}

$eventTypeId = $_POST['eventTypeId'];
$query_selectEvent  = "select * from event_type where EventTypeId = '$eventTypeId'";
$result = mysqli_query($con,$query_selectEvent);
while($row = mysqli_fetch_assoc($result)){


?>
<div class="container">
    <div class="row align-items-center my-5">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="../assets/picture/icons/thumbs-up.png" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Book a Event</h1>
            <p class="font-italic text-muted mb-0">Information provided below will be used to book a event in to your Hotel Elite account.</p>
           
        </div>

        <!-- Booking Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form action="client_functions.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="row">
                    <div class="container mb-4">
                        <h2 class="text-center">Make Your Booking</h2>
                        <?php
                        if (isset($_GET["error"])) {
                        echo '<div class="text-danger text-center">' . $_GET["error"] . '</div>';
                        }
                        ?>

                    </div>

                    <input type = "hidden" name = "eventTypeId" value ="<?php echo $eventTypeId ?>" />
            

                    <!--eventType-->
                    <div class="form-group col-lg-6 mb-4">
                     
                     <div class="ml-2">
                         <label for="eventType">Event Type</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class='fas fa-door-open'></i>
                            </span>
                        </div>
                        <input id="eventType" type="text" name="eventType" value="<?php echo $row['EventType'] ?>" class="form-control bg-white border-left-0 border-md" required readonly>
                    </div>
                    </div>

                    <!-- eventCost -->
                    <div class="form-group col-lg-6 mb-4">
                     
                     <div class="ml-2">
                         <label for="eventCost">Cost of Hall /per-hour</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-inr"></i>
                            </span>
                        </div>
                        <input id="eventCost" type="text" value="<?php echo $row['Cost'] ?>" name="eventCost" class="form-control bg-white border-left-0 border-md" required readonly>
                    </div>
                    </div>

                    <!-- Email Address -->
                    <div class="form-group col-lg-12 mb-4">
                     
                     <div class="ml-2">
                         <label for="email">Enter Email Id</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0" >
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>
                   
                    <!-- Phone Number -->
                    <div class="form-group col-lg-12 mb-4">
                     
                     <div class="ml-2">
                         <label for="phoneNumber">Enter Phone Number</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                      
                        <input id="contactno" type="tel" name="contactno" pattern="[789][0-9]{9}" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3" required>
                    </div>
                    </div>


                    <!-- number of guest -->
                    <div class="form-group col-lg-12 mb-4">
                     
                     <div class="ml-2">
                         <label for="no_of_guest">Number of Guest</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="no_of_guest" name="no_of_guest" class="form-control custom-select bg-white border-left-0 border-md" required>
                            <option value="" selected="true" disabled="true">Choose number of Guests</option>
                            <option value="100-200">100-200</option>
                            <option value="200-250">200-250</option>
                            <option value="250-300">250-300</option>
                            <option value="300-500">300-500</option>
                        </select>
                    </div>
                    </div>
                  
                       <!--checkin -->
                       <div class="form-group col-lg-6 mb-4">
                     
                     <div class="ml-2">
                         <label for="eventDate">Event Date</label>
                     </div>
                     <div class="input-group ">
                         <div class="input-group-prepend">
                             <span class="input-group-text bg-white px-4 border-md border-right-0">
                             <i class="fa fa-calendar" aria-hidden="true"></i>
                             </span>
                         </div>
                         <input id="eventDate" type="text" name="eventDate" placeholder="Check-In Data" class="form-control bg-white " required>
                     </div>
                     </div>
                  
                    <!--Time -->
                    <div class="form-group col-lg-6 mb-4">
                     
                    <div class="ml-2">
                        <label for="eventTime">Event Starting Time</label>
                    </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input id="eventTime" type="text" name="eventTime" placeholder="Event Time" class="form-control bg-white " required>
                    </div>
                    </div>

                  
                

                  <!-- Timing -->
                  <div class="form-group col-lg-6 mb-4">
                     
                     <div class="ml-2">
                         <label for="total_hours">Total Hours</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="total_hours" name="total_hours" class="form-control custom-select bg-white border-left-0 border-md" required>
                            <option value="" selected="true" disabled="true">Choose Event Timing</option>
                            <option value="4">2-4 hrs</option>
                            <option value="8">4-8 hrs</option>
                            <option value="16">8-16 hrs</option>
                            <option value="24">16-24 hrs</option>
                        </select>
                    </div>
                    </div>

                     <!-- total eventCost -->
                     <div class="form-group col-lg-6 mb-4">
                     
                     <div class="ml-2">
                         <label for="totalCost">Total Cost</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-inr"></i>
                            </span>
                        </div>
                        <input id="totalCost" type="text" name="totalCost" value="0" class="form-control bg-white border-left-0 border-md" required readonly>
                    </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" class="btn btn-primary btn-block py-2" name="bookEvent" >
                            <span class="font-weight-bold">Book</span>
                        </button>
                    </div>


                </div>
                </form>
        </div>
    </div>
</div>

          <?php          }
                    
?>


<script  src="js/dateValidation.js"></script>
<?php include('include/footer.php')?>
