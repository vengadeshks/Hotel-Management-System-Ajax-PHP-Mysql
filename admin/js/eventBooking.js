

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
            $('#contentArea').html("<br><br><span>Working...</span>");
          },
          success:function(data){
            $('#contentArea').html(data);
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

    })
}

//showing the details of booking through modal
function showDetails(bookingId){
  $.post('admin_functions.php',{bookingId:bookingId,eventBookingDetail:true},function(data,status){
    
     bookingData = JSON.parse(data);
     var newDate = new Date(bookingData.Date);
     var bookingDate = newDate.getDate();
     var bookingMonth = newDate.toLocaleString('default', { month: 'short' });
    

     var inserCard =`<div class="card-header no-border">
     <h5 class="card-title">${bookingData.Status}</h5>
 </div>
 <div class="card-body pt-0">
     <div class="widget-49">
         <div class="widget-49-title-wrapper">
             <div class="widget-49-date-warning">
                 <span class="widget-49-date-day">${bookingDate}</span>
                 <span class="widget-49-date-month">${bookingMonth}</span>
             </div>
             <div class="widget-49-meeting-info">
                                 <span class="font-weight-bold text-uppercase">${bookingData.EventType}</span> 
                                 <span class="widget-49-meeting-time">Hall No: ${bookingData.HallNumber} </span>
                                 <span class="widget-49-meeting-time">Date : ${bookingData.Date}</span>
             </div>
         </div>
         <ol class="widget-49-meeting-points">
             <li class="widget-49-meeting-item"><span>Username : ${bookingData.FirstName} </span></li>
             <li class="widget-49-meeting-item"><span>User Contact No : ${bookingData.ContactNo} </span></li>
             <li class="widget-49-meeting-item"><span></span></span>Event Date : ${bookingData.Event_date} </span></li>
             <li class="widget-49-meeting-item"><span>Event Time : ${bookingData.EventTime}</span></li>
             <li class="widget-49-meeting-item"><span>Package Limit : ${bookingData.Package} hrs</span></li>
             
             <li class="widget-49-meeting-item"><span>Total Cost : <i class="fa fa-inr" aria-hidden="true"></i>${bookingData.Amount}</span></li>
     
             <li class="widget-49-meeting-item"><span>No of Guest : ${bookingData.NoOfGuest} </span></li>
             <li class="widget-49-meeting-item"><span>Email : ${bookingData.Email}</span></li>
             <li class="widget-49-meeting-item"><span>Phone number : ${bookingData.Phone_number}</span></li>
         </ol>
         <div class="time">                 
            <span class="pull-right">Modified Date : ${bookingData.Modified_date}</span>
         </div>	
     </div>
 </div>`;
   
    $('#details').html(inserCard);
    
  });
  $('#detailModal').modal("show");
}

// set the status paid 
function setPaid(bID){

  $('#eventBookingId').val(bID);
  $('#paymentModal').modal('show');

}

// set the status cancel

function setReject(bookingId){
    console.log(bookingId);
    $.ajax({
      url:"status_functions.php",
      type:"POST",
      data:{
        eventBookingRejected : true,
        bookingId : bookingId
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

function setFree(bookingId){
    console.log(bookingId);
    $.ajax({
      url:"status_functions.php",
      type:"POST",
      data:{
        eventBookingCheckedOut : true,
        bookingId : bookingId
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

    //payment listener
    $('#modal-payment').on('submit',function(e){

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