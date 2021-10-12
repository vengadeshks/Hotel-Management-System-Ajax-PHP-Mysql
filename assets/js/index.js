window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar_top").style.padding = "10px 10px";
    document.getElementById("navbar_top").style.fontSize = "15px";
    
  } else{
    document.getElementById("navbar_top").style.padding = "22px 12px";
    document.getElementById("navbar_top").style.fontSize = "16px";
    
  } 
  
}

document.addEventListener("DOMContentLoaded", function(){
  window.addEventListener('scroll', function() {
      if (window.scrollY > 2) {
        document.getElementById('navbar_top').classList.add('fixed-top');
      
        // add padding top to show content behind navbar
        navbar_height = document.querySelector('.navbar').offsetHeight;
        document.body.style.paddingTop = navbar_height + 'px';
      } else {
        document.getElementById('navbar_top').classList.remove('fixed-top');

         // remove padding top from body
        document.body.style.paddingTop = '0';
      } 
  });
});
// ----------------------------------------------- 

$(function() {
  let pageName = location.pathname.split('/').slice(-1)[0];
  let currentLink = $('.nav-item a[href="'+pageName+'"]');
  console.log(currentLink);

  if (currentLink) {
    $('.navbar-nav nav-item').removeClass('active');
    currentLink.addClass('active');
  };

  if(pageName.includes("room") || pageName.includes("event") || pageName.includes("mybooking")){
    currentLink.parent().parent('li').addClass('active');
  } 
  
  if(pageName.includes("dashboard") || pageName.includes("account") ){
    currentLink.parent().parent('li').addClass('active');
  }
  
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

  