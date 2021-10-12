

// function to display content of user
function displayEvents(value,msg,err){
    var Data = {
      eventFilter : value
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
  
  //function to delete the user 
  
  function deleteEvent(eventId){
  
    console.log(eventId);
    $.ajax({
      url:"admin_functions.php",
      type:"POST",
      data:{
        eventId : eventId,
        deleteEvent:true
      },
      success:function(data){      
        console.log("success");
        console.log(data);
        var json = JSON.parse(data);
        if(json['error']!=""){
         displayEvents("","",json['error']);
        }else{
          displayEvents("",json['msg'],"");
        }
        
         
     },
     error: function(data){
         console.log("error");
         console.log(data);
     }
    });
  }
  
  //function to delete the user 
  function editEvent(eventId){
     $('#updateEventId').val(eventId);
     $.post('admin_functions.php',{eventUpdateId:eventId},function(data,status){
       console.log(data);
        eventData = JSON.parse(data);
       
       
        $('#editEventType').val(eventData.EventTypeId);
        $('#editHallNumber').val(eventData.HallNumber);
        $('#editStatus').val(eventData.Status);
     });
     $('#updateModal').modal("show");
  }
  
  $(document).ready(function(){
      displayEvents('','','');
        
  
      //Filter for the event type
      $('#eventFilter').on('change',function(){
        var value = $(this).val();
        displayEvents(value,"","");
      });
  
      // invoking the modal for add new type of event
        $('#addEventBtn').on('click',function(){
          $('#addModal').modal('show');
        });
  
      // Add User Operation From the form
      $('#modal-addEvent').on('submit',(function(e) {
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
                    displayEvents("","",json['error']);
                }else{
                  displayEvents("",json['msg'],"");
                }
  
              $('#addModal').modal('hide');
              $('#modal-addEvent')[0].reset(); 
            
              },
              error: function(data){
                  console.log("error");
                  console.log(data);
                  $('#addModal').modal('hide');
              }
          });
      }));
  
      //update the content of event
  $('#modal-updateEvent').on('submit',(function(e) {
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
            displayEvents("","",json['error']);
           }else{
            displayEvents("",json['msg'],"");
           }
            
        },
        error: function(data){
            console.log("error");
            console.log(data);
        }
    });
  }));
  
  })
  