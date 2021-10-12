<?php include('include/currentPage_header.php') ?>

<!-- Dynamically fetching the photos from GALLERY -->
<div class="photo-gallery">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Hotel Elite Gallery</h2>
                <p class="text-center">All of the images are capture inside our hotel Elite </p>
            </div>
            <div class="row photos">
            <?php 
                    $dirname = "assets/picture/gallery/";
                    $images = glob($dirname."*.*");

                    foreach($images as $image) {
                        echo ' <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="'.$image.'" data-lightbox="photos"><img class="img-fluid gallery-images img-thumbnail" src="'.$image.'"></a></div>';
                    }
                    

            ?>
                                
              
            </div>
        </div>
    </div>
<?php include('include/footer.php')?>