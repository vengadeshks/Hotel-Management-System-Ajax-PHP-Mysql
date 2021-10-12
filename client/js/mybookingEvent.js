

// display the event types with ajax
function eventBooking(value,msg,err){
    var Data = {
        eventBooking:true,
        filter : value
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
            $('#contentArea1').html("<br><br><span>Working...</span>");
          },
          success:function(data){
            $('#contentArea1').html(data);
    
         
          },
          error: function(data){
            console.log("error");
            console.log(data);
        }

    })
}

// set the status paid 
function setEventPaid(bID){
  $('#eventBookingId').val(bID);
  
  //modal show functio not found Error resolved
  jQuery.noConflict();
  $('#eventPaymentModal').modal('show');


}

// set the status cancel

function setEventCancel(bookingId){
    console.log(bookingId);
    $.ajax({
      url:"status_functions.php",
      type:"POST",
      data:{
        eventBookingCancel : true,
        bookingId:bookingId
      },
      success:function(data){      
        console.log("success");
        console.log(data);
        var json = JSON.parse(data);
        if(json['error']!=""){
            eventBooking("","",json['error']);
        }else{
            eventBooking("",json['msg'],"");
        }
        
         
     },
     error: function(data){
         console.log("error");
         console.log(data);
     }
    });

}


// Document Ready Function 
$(document).ready(function(){

    eventBooking("","","");
    $("#eventBookingFilter").on("change",function(){
        var value = $(this).val();
        eventBooking(value,"","");
    });

    $('#event-modal-payment').on('submit',function(e){

      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        url:"status_functions.php",
        type:"POST",
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){      
          console.log("success");
          console.log(data);
          $('#eventPaymentModal').modal('hide')
          var json = JSON.parse(data);
          if(json['error']!=""){
              eventBooking("","",json['error']);
          }else{
              eventBooking("",json['msg'],"");
          }
          
           
       },
       error: function(data){
           console.log("error");
           console.log(data);
       }
      });
    });


});