</div>
    <!-- <script src="js/jquery.min.js"></script> -->
    <!-- <script src="js/popper.js"></script> -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script  src="../assets/js/index2.js"></script>
    
<script>


$(function() {
  
  let pageName = location.pathname.split('/').slice(-1)[0];
  let currentLink = $('.nav-item a[href="'+pageName+'"]');
 
  if (currentLink) {
    $('.nav-item').removeClass('active');
    currentLink.parent('li').addClass('active');
  };
  
  
  if(pageName.includes('roomPayment')|| pageName.includes('eventPayment')){
      $("#paymentSubmenu").collapse("toggle");
  }

  else if(pageName.includes("event")){
      $("#eventSubmenu").collapse("toggle");
  } 
   
  else if(pageName.includes('room')){
    $('#roomSubmenu').collapse("toggle");
  }  

});

</script>

  </body>
</html>