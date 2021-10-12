<?php include("include/header.php"); 
if(!isset($_SESSION['loggedUserId'])) {
  echo "<script> window.location.href = '../login.php';</script>";
}
?>
<!-- Page Content  -->
<style>
    
  .hovereffect {
    width: 100%;
    height: 100%;
    float: left;
    overflow: hidden;
    position: relative;
    text-align: center;
    cursor: default;
  }
  
  .hovereffect .overlay {
    width: 100%;
    height: 100%;
    position: absolute;
    overflow: hidden;
    top: 0;
    left: 0;
    opacity: 0;
    filter: alpha(opacity=0);
    background-color: rgba(0,0,0,0.5);
    -webkit-transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
    transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
  }
  
  .hovereffect img {
    display: block;
    position: relative;
    -webkit-transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
    transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
  }
  
 
  .hovereffect a.info {
    text-decoration: none;
    display: inline-block;
    text-transform: uppercase;
    color: #fff;
    border: 1px solid #fff;
    background-color: transparent;
    opacity: 0;
    filter: alpha(opacity=0);
    -webkit-transition: all 0.4s ease;
    transition: all 0.4s ease;
    margin: 50px 0 0;
    padding: 7px 14px;
  }
  
  .hovereffect a.info:hover {
    box-shadow: 0 0 5px #fff;
  }
  
  .hovereffect:hover img {
    -ms-transform: scale(1.2);
    -webkit-transform: scale(1.2);
    transform: scale(1.2);
  }
  
  .hovereffect:hover .overlay {
    opacity: 1;
    filter: alpha(opacity=100);
  }
  
.hovereffect:hover a.info {
    opacity: 1;
    filter: alpha(opacity=100);
    -ms-transform: translatey(0);
    -webkit-transform: translatey(0);
    transform: translatey(0);
  }
  
  .hovereffect:hover a.info {
    -webkit-transition-delay: .2s;
    transition-delay: .2s;
  }
  .addImage{
     width:30rem;
     height :20rem;
  }

</style>
<div id="content" class="p-4 p-md-5 pt-5">


<!-- Button trigger modal -->
<button type="button" class="btn btn-dark ml-3" id="addImageBtn">
+ Add New Image
</button>

<div class="modal fade" id="modelGallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  id="model-addImage" method="POST" action="admin_functions.php" enctype="multipart/form-data" autocomplete="off">
      
                <div class="picture-container">
                  <div class="picture">
                      <img src="../assets/picture/icons/addImage.png" class="picture-src" id="addNewImage" title="">
                      <input type="file" id="wizardUpdate-image" class="addImage" name="galleryImage" required>
                  </div>
                  <h6 class="">Choose Picture</h6>
                </div>

            
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add Image</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container">
            <div class="intro">
                <h2 class="text-center">Hotel Elite Gallery</h2>
                <p class="text-center">All the gallery images, Hover and Delete the images</p>
            </div>
           
            <div class="row photos" id="contentArea">
           
                                
              
            </div>
        </div>

        <script src="js/gallery_function.js" type="text/javascript"></script>



<?php include("include/footer.php"); ?>