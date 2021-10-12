// function to display content of user
function displayEventType(value,msg,err){
    var Data = {
      eventTypeFilter : value
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
  
  
  
  //function to delete the Type of event
  
  function editEventType(typeId){
    $('#eventTypeId').val(typeId);
    $.post('admin_functions.php',{eventTypeUpdateId:typeId},function(data,status){
      console.log(data);
       userData = JSON.parse(data);
       var path ='../assets/picture/EventType/' +userData.EventImage;
      
       $('#eventTypeImagePreviewEdit').attr("src",path);
       $('#editEventTypeName').val(userData.EventType);
       $('#editDescription').val(userData.Description);
       $('#editEventCost').val(userData.Cost);
       $('#editStatus').val(userData.Status);
      
    });
    $('#updateModal').modal("show");
  }
  
  function deleteEventType(typeId){
   
    $.ajax({
      url:"admin_functions.php",
      type:"POST",
      data:{
        typeId : typeId,
        deleteEventType:true
      },
      success:function(data){      
        console.log("success");
        console.log(data);
        var json = JSON.parse(data);
        if(json['error']!=""){
            displayEventType("","",json['error']);
        }else{
            displayEventType("",json['msg'],"");
        }
        
         
     },
     error: function(data){
         console.log("error");
         console.log(data);
     }
    });
  }
  
  
  
  $(document).ready(function(){
  
      displayEventType("","","");
  
      //Filter for the event type
      $('#eventTypeFilter').on('change',function(){
        var value = $(this).val();
        displayEventType(value,"","");
      });
  
  
      // invoking the modal for add new type of event
      $('#addEventTypeBtn').on('click',function(){
          $('#addModal').modal('show');
      });
  
      // Add User Operation From the form
      $('#modal-addEventType').on('submit',(function(e) {
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
                displayEventType("","",json['error']);
              }else{
                displayEventType("",json['msg'],"");
              }
  
              // hiding the modal and clearing the content
               $('#addModal').modal('hide');
               $('#modal-addEventType')[0].reset(); 
               $('#eventTypeImagePreview').attr('src','../assets/picture/icons/addImage.png'); 
            },
            error: function(data){
                console.log("error");
                console.log(data);
                $('#addModal').modal('hide');
            }
        });
    }));
  
  
    // update the event type
  
    
  //update the content of user
  $('#modal-editEventType').on('submit',(function(e) {
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
            displayEventType("","",json['error']);
           }else{
            displayEventType("",json['msg'],"");
           }
            
        },
        error: function(data){
            console.log("error");
            console.log(data);
        }
    });
  }));
  })