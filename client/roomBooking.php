<?php
 
 include('include/header.php');
 include('../include/dbConnect.php');
 
 ?>
<!-- Navbar-->
<?php

if(!isset($_SESSION['loggedUserId'])) {
  header('Location:../login.php');
 }
 

$roomTypeId = $_POST['roomTypeId'];
$query_selectRoom  = "select * from room_type where RoomTypeId = '$roomTypeId'";
$result = mysqli_query($con,$query_selectRoom);
while($row = mysqli_fetch_assoc($result)){


?>
<div class="container">
    <div class="row align-items-center my-5">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="../assets/picture/icons/thumbs-up.png" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Book a Room</h1>
            <p class="font-italic text-muted mb-0">Information provided below will be used to book a room in to your Hotel Elite account.</p>
           
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

                    <input type = "hidden" name = "roomTypeId" value ="<?php echo $roomTypeId ?>" />
            

                    <!--roomType-->
                    <div class="form-group col-lg-6 mb-4">
                     
                     <div class="ml-2">
                         <label for="roomType">Room Type</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class='fas fa-door-open'></i>
                            </span>
                        </div>
                        <input id="roomType" type="text" name="roomType" value="<?php echo $row['RoomType'] ?>" class="form-control bg-white border-left-0 border-md" required readonly>
                    </div>
                    </div>

                    <!-- roomCost -->
                    <div class="form-group col-lg-6 mb-4">
                     
                     <div class="ml-2">
                         <label for="roomCost">Cost of Room /per-day</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-inr"></i>
                            </span>
                        </div>
                        <input id="roomCost" type="text" value="<?php echo $row['Cost'] ?>" name="roomCost" class="form-control bg-white border-left-0 border-md" required readonly>
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
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    </div>
                  
                    <!--checkin -->
                    <div class="form-group col-lg-6 mb-4">
                     
                    <div class="ml-2">
                        <label for="checkIn">Check-In Date</label>
                    </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input id="checkIn" type="text" name="checkIn" placeholder="Check-In Data" class="form-control bg-white " required>
                    </div>
                    </div>

                    <!--checkOut-->
                    <div class="form-group col-lg-6 mb-4">
                        <div class="ml-2">
                        <label for="checkOut">Check-Out Date</label>
                        </div>
                        <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                       
                        <input id="checkOut" type="text" name="checkOut" placeholder="Check-Out Data" class="form-control bg-white " required>
                        </div>
                    </div>

                     <!-- total roomCost -->
                     <div class="form-group col-lg-6 mb-4">
                     
                     <div class="ml-2">
                         <label for="roomCost">Total Cost</label>
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
                        <button type="submit" class="btn btn-primary btn-block py-2" name="bookRoom" >
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
