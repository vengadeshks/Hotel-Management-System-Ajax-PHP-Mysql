
$(function() {
    let pageName = location.pathname.split('/').slice(-1)[0];
    let currentLink = $('.nav-item a[href="'+pageName+'"]');
  
    if (currentLink) {
      $('.navbar-nav nav-item').removeClass('active');
      currentLink.addClass('active');
    };
    
  });
  
  // For Demo Purpose [Changing input group text on focus] (used in )
  $(function () {
      $('input, select').on('focus', function () {
          $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
      });
      $('input, select').on('blur', function () {
          $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
      });
  });
  
  
  //  User registration proile picture preview 
  $(document).ready(function(){
    // Prepare the preview for profile picture - user
        $("#wizard-picture").change(function(){
            readURL(this,'#wizardPicturePreview');
        });
        $("#wizardUpdate-picture").change(function(){
            readURL(this,'#updatePicture');
        });
        //gallery
        $("#wizardUpdate-image").change(function(){
            readURL(this,'#addNewImage');
        });
        //Room Type
        $("#roomTypeImage").change(function(){
            readURL(this,'#roomTypeImagePreview');
        });
        $("#roomTypeImageEdit").change(function(){
            readURL(this,'#roomTypeImagePreviewEdit');
        });
       $("#eventTypeImage").change(function(){
            readURL(this,'#eventTypeImagePreview');
        });
        $("#editEventTypeImage").change(function(){
            readURL(this,'#eventTypeImagePreviewEdit');
        });
      
    });
   
    function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }