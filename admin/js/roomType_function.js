// function to display content of user
function displayRoomType(value,msg,err){
  var Data = {
    roomTypeFilter : value
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
      $('#contentArea').html("<br><br><span>Working...</span>");
    },
    success:function(data){
      $('#contentArea').html(data);
     // data table from the Jquery dataTable.net
    $('table').DataTable({
      paging:true,
      ordering:true,
      searching:true
    });
    },
    error: function(data){
      console.log("error");
      console.log(data);
  }
  });
}



//function to delete the Type of room

function editRoomType(typeId){
  $('#roomTypeId').val(typeId);
  $.post('admin_functions.php',{roomTypeUpdateId:typeId},function(data,status){
    console.log(data);
     userData = JSON.parse(data);
     var path ='../assets/picture/RoomType/' +userData.RoomImage;
     console.log(path);
     $('#roomTypeImagePreviewEdit').attr("src",path);
     $('#editRoomTypeName').val(userData.RoomType);
     $('#editDescription').val(userData.Description);
     $('#editRoomCost').val(userData.Cost);
     $('#editStatus').val(userData.Status);
    
  });
  $('#updateModal').modal("show");
}

function deleteRoomType(typeId){
 
  $.ajax({
    url:"admin_functions.php",
    type:"POST",
    data:{
      typeId : typeId,
      deleteRoomType:true
    },
    success:function(data){      
      console.log("success");
      console.log(data);
      var json = JSON.parse(data);
      if(json['error']!=""){
        displayRoomType("","",json['error']);
      }else{
        displayRoomType("",json['msg'],"");
      }
      
       
   },
   error: function(data){
       console.log("error");
       console.log(data);
   }
  });
}



$(document).ready(function(){

    displayRoomType("","","");

    //Filter for the room type
    $('#roomTypeFilter').on('change',function(){
      var value = $(this).val();
      displayRoomType(value,"","");
    });


    // invoking the modal for add new type of room
    $('#addRoomTypeBtn').on('click',function(){
        $('#addModal').modal('show');
    });

    // Add User Operation From the form
    $('#model-addRoomType').on('submit',(function(e) {
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
              displayRoomType("","",json['error']);
            }else{
              displayRoomType("",json['msg'],"");
            }

            // hiding the modal and clearing the content
             $('#addModal').modal('hide');
             $('#model-addRoomType')[0].reset(); 
             $('#roomTypeImagePreview').attr('src','../assets/picture/icons/addImage.png'); 
          },
          error: function(data){
              console.log("error");
              console.log(data);
              $('#addModal').modal('hide');
          }
      });
  }));


  // update the room type

  
//update the content of user
$('#modal-editRoomType').on('submit',(function(e) {
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
        $('#updateModal').modal("hide");
         var json = JSON.parse(data);
         if(json['error']!=""){
          displayRoomType("","",json['error']);
         }else{
          displayRoomType("",json['msg'],"");
         }
          
      },
      error: function(data){
          console.log("error");
          console.log(data);
      }
  });
}));
})