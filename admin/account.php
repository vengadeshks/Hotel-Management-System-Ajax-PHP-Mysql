<?php 
include("include/header.php");
if(!isset($_SESSION['loggedUserId'])) {
    echo "<script> window.location.href = '../login.php';</script>";
}
?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">


<br>


 <!-- table for the display the content  -->
 <div class="container-fluid " id="contentArea">
     <div class="col-9">
         
         <h4 class="mb-4 text-center">Account Details</h4>
         
         <div class="accountMessage">
            
             </div>
 <!-- update New User Form  -->
 <form id="updateUser" method="POST" action="admin_functions.php" enctype="multipart/form-data" autocomplete="off">
 
 <input type="hidden" id="user_Id" name="updateAccount" value="<?php echo $_SESSION['loggedUserId'];?>">
                <div class="row">
                        <div class="container mb-4">
                            <div class="picture-container">
                                <div class="picture">
                                <img  class="picture-src" id="updatePicture" title="" />
                                <input type="file" id="wizardUpdate-picture" class="" name="profileImage" required>
                            </div>
                        <h6 class="">Choose Picture</h6>
                        
                    </div>
                   
                </div>
               


                    <!-- Last Name -->
                    <div class="input-group col-lg-12 mb-4">
                    <div class="ml-2">
                         <label for="updatelastName">Last Name</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="updatelastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>
           
                  
                   
                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                    <div class="ml-2">
                         <label for="updatephoneNumber">Contact No</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                       
                      
                        <input id="updatephoneNumber" type="tel" name="contactno" pattern="[789][0-9]{9}" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3" required>
                    </div>
                    </div>


                    <!-- Job -->
                    <div class="input-group col-lg-12 mb-4">
                    <div class="ml-2">
                         <label for="updategender">Gender</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="updategender" name="gender" class="form-control custom-select bg-white border-left-0 border-md" required>
                            <option value="">Choose your Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    </div>
                    

          
                </div>
         
                <div class="form-group col-lg-6 mx-auto mb-0">
                        <button id="updateUser" type="submit" class="btn btn-primary btn-block py-2" name="updateUser" >
                            <span class="font-weight-bold">Save Changes</span>
                        </button>
                    </div>
               
            
        </form>
        </div>
        <div class="col-9">
        <div class="passwordMessage mt-4">
            
        </div>
        <h5 class="mb-4 mt-5 text-center">Change Password</h5>
            <form id="change_password" autocomplete="off">
            <input type="hidden" id="userId" name="change_password" value="<?php echo $_SESSION['loggedUserId'];?>">
               <!--old Password -->
               <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="oldPassword" type="password" name="oldPassword" placeholder="Old Password" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- newPassword  -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="newPassword" type="password" name="newPassword" placeholder="New Password" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                   
                <div class="form-group col-lg-6 mx-auto mb-0">
                        <button id="changePassword" type="submit" class="btn btn-primary btn-block py-2" name="changePassword" >
                            <span class="font-weight-bold">Change Password</span>
                        </button>
                    </div>
            </form>
        </div>
</div>
  <!-- end of container  -->

</div>
<script src="js/account.js" type="text/javascript"></script>


<?php include("include/footer.php"); ?>