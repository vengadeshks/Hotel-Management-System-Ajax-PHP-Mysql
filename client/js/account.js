

//function to delete the user 
function editUser(){
    UserID = $('#user_Id').val();
    console.log(UserID);
    $.post('../admin/admin_functions.php',{userUpdateId:UserID},function(data,status){
      console.log(data);
       userData = JSON.parse(data);
       var path ='../assets/picture/profiles/' +userData.ProfileImage;
       console.log(path);
       $('#updatePicture').attr("src",path);
       $('#updatefirstName').val(userData.FirstName);
       $('#updatelastName').val(userData.LastName);
       $('#updateemail').val(userData.Email);
       $('#updatephoneNumber').val(userData.ContactNo);
       $('#updategender').val(userData.Gender);
    });
  
 }
 
$(document).ready(function(){
    editUser();
    
//update the content of user
$('#updateUser').on('submit',(function(e) {
   
    e.preventDefault();
   
    var formData = new FormData(this);

    $.ajax({
        type:"POST",
        url: "client_functions.php",
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
     
        success:function(data){
          console.log("success");
          console.log(data);
         
           var json = JSON.parse(data);
           if(json['error']!=""){
            editUser();
            $('.accountMessage').html(`<div class="alert alert-danger" role="alert"> ${json['error']}  </div>`);
           }else{
            editUser();
            $('.accountMessage').html(`<div class="alert alert-success" role="alert"> ${json['msg']}  </div>`);
           }
            
        },
        error: function(data){
            console.log("error");
            console.log(data);
        }
    });
}));  

//update the password
$('#change_password').on('submit',(function(e) {
   
    e.preventDefault();
   
    var formData = new FormData(this);

    $.ajax({
        type:"POST",
        url: "client_functions.php",
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
     
        success:function(data){
          console.log("success");
          console.log(data);
         
           var json = JSON.parse(data);
           if(json['error']!=""){
            editUser();
            $('.passwordMessage').html(`<div class="alert alert-danger" role="alert"> ${json['error']}  </div>`);
           }else{
            editUser();
            $('.passwordMessage').html(`<div class="alert alert-success" role="alert"> ${json['msg']}  </div>`);
           }
            
        },
        error: function(data){
            console.log("error");
            console.log(data);
        }
    });
}));
})