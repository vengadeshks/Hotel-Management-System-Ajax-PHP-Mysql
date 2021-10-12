

// display the room types with ajax
function roomBooking(value,msg,err){
    var Data = {
        roomBooking:true,
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
            $('#contentArea').html("<br><br><span>Working...</span>");
          },
          success:function(data){
            $('#contentArea').html(data);
    
         
          },
          error: function(data){
            console.log("error");
            console.log(data);
        }

    })
}

// set the status paid 
function setPaid(bID){
  $('#bookingId').val(bID);
  
  //modal show functio not found Error resolved
  jQuery.noConflict();
  $('#paymentModal').modal('show');


}

// set the status cancel

function setCancel(bookingId){
    console.log(bookingId);
    $.ajax({
      url:"status_functions.php",
      type:"POST",
      data:{
        roomBookingCancel : true,
        bookingId:bookingId
      },
      success:function(data){      
        console.log("success");
        console.log(data);
        var json = JSON.parse(data);
        if(json['error']!=""){
            roomBooking("","",json['error']);
        }else{
            roomBooking("",json['msg'],"");
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

    roomBooking("","","");
    $("#roomBookingFilter").on("change",function(){
        var value = $(this).val();
        roomBooking(value,"","");
    })

    $('#model-payment').on('submit',function(e){

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
          $('#paymentModal').modal('hide')
          var json = JSON.parse(data);
          if(json['error']!=""){
              roomBooking("","",json['error']);
          }else{
              roomBooking("",json['msg'],"");
          }
          
           
       },
       error: function(data){
           console.log("error");
           console.log(data);
       }
      });
    });
});