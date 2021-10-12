<?php include("include/header.php");
if(!isset($_SESSION['loggedUserId'])) {
  echo "<script> window.location.href = '../login.php';</script>";
}
?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">

<h2 class="mb-4">Contact Details</h2>


<br>


 <!-- table for the display the content  -->
 <div class="container-fluid" id="contentArea">

        
</div>
  <!-- end of container  -->

</div>
<script src="js/contact_function.js" type="text/javascript"></script>


<?php include("include/footer.php"); ?>