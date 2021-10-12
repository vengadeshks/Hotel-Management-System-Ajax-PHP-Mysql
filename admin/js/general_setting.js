

//function to delete the user 
function setData(){
 
    $.post('admin_functions.php',{generalSettings:true},function(data,status){
      console.log(data);
       Data = JSON.parse(data);
     
       $('#companyName').val(Data.Name);
       $('#address1').val(Data.Address_line1);
       $('#address2').val(Data.Address_line2);
       $('#city').val(Data.City);
       $('#state').val(Data.State);
       $('#country').val(Data.Country);
       $('#zip').val(Data.Zip_code);
       $('#description').val(Data.Description);
       $('#email').val(Data.Email);
       $('#phoneNumber').val(Data.Phone_number);
       $('#teleNumber').val(Data.Telephone_number);
       $('#gs_id').val(Data.ID);
      
    });
  
 }
 
$(document).ready(function(){
    setData();
    
//update the content of user
$('#gs_form').on('submit',(function(e) {
   
    e.preventDefault();
   
    var formData = new FormData(this);

    $.ajax({
        type:"POST",
        url: "admin_functions.php",
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
     
        success:function(data){
          console.log("success");
          console.log(data);
         
           var json = JSON.parse(data);
           if(json['error']!=""){
         
            $('.Message').html(`<div class="alert alert-danger" role="alert"> ${json['error']}  </div>`);
           }else{
            
            $('.Message').html(`<div class="alert alert-success" role="alert"> ${json['msg']}  </div>`);
           }
            
        },
        error: function(data){
            console.log("error");
            console.log(data);
        }
    });
}));  

})