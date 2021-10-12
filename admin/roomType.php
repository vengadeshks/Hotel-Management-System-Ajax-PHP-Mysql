<?php include("include/header.php");
if(!isset($_SESSION['loggedUserId'])) {
  echo "<script> window.location.href = '../login.php';</script>";
}
 ?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">

<h2 class="mb-4">Room Type</h2>


<!-- Model For adding new User  -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-dark" id="addRoomTypeBtn">
+ Add New Room Type
</button>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Room Type</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="admin_functions.php" method="POST" id="model-addRoomType" autocomplete="off">
            <div class="row">
                <!-- Room Type Image  -->
                <div class="container mb-4">
                            <div class="picture-container">
                                <div class="picture">
                                <img src="../assets/picture/icons/addImage.png" class="picture-src" id="roomTypeImagePreview" title="">
                                <input type="file" id="roomTypeImage" class="" name="roomTypeImage" required>
                            </div>
                        <h6 class="">Choose Picture</h6>
                        
                    </div>
                   
                  </div>
               

                    <!-- Type name  -->
                    <div class="input-group col-lg-11 ml-3 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="typeName" type="text" name="roomTypeName" placeholder="Room Type Name" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    <!-- Cost -->
                    <div class="input-group col-lg-11 ml-3 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="cost" type="text" name="roomCost" placeholder="Cost" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    <!-- Desc -->
                    <div class="input-group col-lg-11 ml-3 mb-4">
                      
                        <textarea  name="description" id="roomDescription" cols="200" rows="2" style="width:500px !important;height:100px !important;" placeholder="Description" class="form-control bg-white "  required></textarea>
                        
                    </div>

            </div>
           <div class="modal-footer">
             <button type="submit" class="btn btn-primary">Add</button>
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="admin_functions.php" method="POST" id="modal-editRoomType" autocomplete="off">
            <div class="row">
                <!-- Room Type Image  -->
                <div class="container mb-4">
                            <div class="picture-container">
                                <div class="picture">
                                <img src="../assets/picture/icons/addImage.png" class="picture-src" id="roomTypeImagePreviewEdit" title="">
                                <input type="file" id="roomTypeImageEdit" class="" name="editRoomTypeImage" required>
                            </div>
                        <h6 class="">Choose Picture</h6>
                        
                    </div>
                   
                  </div>
               

                    <!-- Type name  -->
                    <div class="input-group col-lg-11 ml-3 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="editRoomTypeName" type="text" name="editRoomTypeName" placeholder="Room Type Name" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    <!-- Cost -->
                    <div class="input-group col-lg-11 ml-3 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="editRoomCost" type="text" name="editRoomCost" placeholder="Cost" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    
                    

                   
                    <div class="input-group col-lg-11 ml-3 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="editStatus" name="editStatus" class="form-control custom-select bg-white border-left-0 border-md" required>
                            <option disabled="" selected="">choose a status</option>
                            <option value="active">Active</option>
                            <option value="in-active">In-active</option>
                        </select>
                    </div>

                    
                     <!-- Desc -->
                     <div class="input-group col-lg-11 ml-3 mb-4">
                      
                      <textarea  name="editDescription" id="editDescription" cols="200" rows="2" style="width:500px !important;height:100px !important;" placeholder="Description" class="form-control bg-white "  required></textarea>
                      
                  </div>
                    
                   <!-- for getting the id when the form is submitted  -->
                    <input type="hidden" id="roomTypeId" name="roomTypeId">

            </div>
           <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<br>

 <!-- Filter Drop down  -->
<div class="float-right filterBy">
<select name="category" id="roomTypeFilter" class="form-control custom-select bg-white border-md filter">
  <option disabled="" selected="">FilterBy  </option>
  <option value="1">All</option>
  <option value="2">Active</option>
  <option value="3">In-active</option>
  <option value="4">Cost below 500</option>
  <option value="5">Cost between 500 and 1000</option>
  <option value="6">Cost above 1000</option>
</select>
</div>


 <!-- table for the display the content  -->
<div class="container-fluid" id="contentArea">

        
</div>

</div>
<!-- Page Content end here-->
<script src="js/roomType_function.js" type="text/javascript"></script>
<?php include("include/footer.php"); ?>