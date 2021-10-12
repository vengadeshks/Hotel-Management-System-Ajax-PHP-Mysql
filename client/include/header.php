<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Jquery Time Picker  -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <!-- Jquery Date Picker  -->
  <link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/
ui-lightness/jquery-ui.css'
        rel='stylesheet'>
      
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
    </script>
      
    <script src=
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    </script>
    <!-- Jquery Date Picker End -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <!-- Google Fonts  -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@900&display=swap" rel="stylesheet">

<!-- font awesome  -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Styling -->
 <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->

<link rel="stylesheet" href="../assets/css/clientStyle.css">
<link rel="stylesheet" href="../assets/css/booking_card.css">
<link rel="stylesheet" href="../assets/css/nav-tabs.css">


</head>
<body>

 
<?php 
include('../include/functions.php');

if(isset($_SESSION['loggedUserId'])) {
    $id = $_SESSION['loggedUserId'];
    $s="select * from  users_details where UserId='$id' ";
    $result=mysqli_query($con,$s) or die ('failed to query');
    $user_details= mysqli_fetch_assoc($result);
   
}
  
  if(isset($user_details['FirstName'])){
  ?>
   <!-- navbar two (when user log in)  -->
   <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <div class="container">
      <a class="navbar-brand " href="#"> <i class="fas fa-gem me-4"></i>Hotel Elite</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link"  href="../index.php">Home
                </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../about.php"> About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gallery.php">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../service.php">Services</a>
          </li>
        
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Booking
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="room.php">Rooms</a>
            <a class="dropdown-item" href="event.php">Events</a>
            <a class="dropdown-item" href="mybooking.php">Mybooking</a>
            
          </div>
          </li>   
        
          <li class="nav-item">
            <a class="nav-link" href="../events.php">Meeting & Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contact.php">Contact</a>
          </li>
          </ul >
          
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <!-- <img src="<" width="40" height="40" class="rounded-circle"> -->
          <?php echo $user_details['FirstName']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="dashboard.php">Dashboard</a>
          <a class="dropdown-item" href="account.php">Edit Profile</a>
          <a class="dropdown-item" href="../destroy.php">Log Out</a>
        </div>
      </li>   
        </ul>
        
      </div>
    </div>
  </nav>

  
 <?php } else{ ?>
  
    <!-- Navigation -->
 
<nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <div class="container">
      <a class="navbar-brand " href="#"> <i class="fas fa-gem me-4"></i>   Hotel Elite</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link"  href="../index.php">Home
                </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../about.php"> About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gallery.php">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../service.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../events.php">Meeting & Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contact.php">Contact</a>
          </li>
          </ul >
          <ul class="navbar-nav ml-auto">
           <li class="nav-item">
            <a class="nav-link " style="font-size: 18px !important;" href="../login.php">Log in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-size: 18px !important;" href="../signup.php">Sign up</a>
          </li>
      
        </ul>
      </div>
    </div>
  </nav>


 <?php } ?>