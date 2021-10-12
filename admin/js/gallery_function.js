


// function to display content of user
function displayGallery(value,msg,err){
    var Data = {
      galleryFilter : value
    }
    if(msg!=""){
      Data.msg = msg;
    }
    if(err!=""){
      Data.error = err;
    }
  
    $.ajax({
      url:"fetchData.php",
      type:"POST",
      data:Data,
      beforeSend:function(){
        $('#contentArea').html("<span>Working...</span>");
      },
      success:function(data){
        $('#contentArea').html(data);
        $('table').DataTable({
          });
      },
      error: function(data){
        console.log("error");
        console.log(data);
    }
    });
  }


 
function deleteImage(url){
  
    $.ajax({
      url:"admin_functions.php",
      type:"POST",
      data:{
        Url : url,
        deleteImage:true
      },
      success:function(data){      
        console.log("success");
        console.log(data);
        var json = JSON.parse(data);
        if(json['error']!=""){
            displayGallery("","",json['error']);
        }else{
            displayGallery("",json['msg'],"");
        }
        
         
     },
     error: function(data){
         console.log("error");
         console.log(data);
     }
    });
  }
  
  
// Action when the document is ready
$(document).ready(function(){
    //display the data without filter
  
    displayGallery("","","");

    $('#addImageBtn').on('click',function(){
        $('#modelGallery').modal('show');
    });

     // Add image Operation From the form
     $('#model-addImage').on('submit',(function(e) {
       
        e.preventDefault();
       
        var formData = new FormData(this);
        for (var value of formData.values()) {
          console.log(value);
       }

        $.ajax({
            type:"POST",
            url: "admin_functions.php",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
         
            success:function(data){
            
              console.log(data);
               var json = JSON.parse(data);
               if(json['error']!=""){
                displayGallery("","",json['error']);
               }else{
                displayGallery("",json['msg'],"");
               }
               $('#modelGallery').modal('hide');
               $('#model-addImage')[0].reset(); 
               $('#addNewImage').attr('src','../assets/picture/icons/addImage.png'); 
            },
            error: function(data){
                console.log("error");
                console.log(data);
                $('#modelGallery').modal('hide');
            }
        });
    }));

    
  
});
  