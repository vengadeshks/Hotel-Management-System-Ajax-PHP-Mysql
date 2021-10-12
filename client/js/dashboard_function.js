

function drawChart(roomData,eventDate){
    
    const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
      ];
      
      const data = {
        labels: labels,
        datasets: [{
          label: 'Total Amount for Room Booking',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: roomData,
        },
        {
          label: 'Total Amount for Event Booking',
          backgroundColor: 'rgb(1, 104, 254)',
          borderColor: 'rgb(1, 104, 254)',
          data: eventDate,
        }]
      };
      
      const config = {
        type: 'line',
        data: data,
        options: {}
      };
      
      var myChart = new Chart(
          document.getElementById('myChart'),
          config
      );
  }

  function getGraghData(){
    var Data = {
      graph:true
  }
  $.ajax({
      url:"dashboard_client_functions.php",
      type:"POST",
      data:Data,
      beforeSend:function(){
      //   $('#contentArea').html("<br><br><span>Working...</span>");
      },
      success:function(data){
          var dbData = JSON.parse(data);
          console.log(dbData.roomMonthlyAmount);
          console.log(dbData.eventMonthlyAmount);
      
          drawChart(dbData.roomMonthlyAmount,dbData.eventMonthlyAmount);
      },
      error: function(data){
        console.log("error");
        console.log(data);
    }
    });

  }

  function getDetails(){
    var Data = {
      card:true
  }
  $.ajax({
      url:"dashboard_client_functions.php",
      type:"POST",
      data:Data,
      beforeSend:function(){
      //   $('#contentArea').html("<br><br><span>Working...</span>");
      },
      success:function(data){
          var dbData = JSON.parse(data);
          console.log(dbData);
          setDetails(dbData);
      },
      error: function(data){
        console.log("error");
        console.log(data);
    }
    });

  }

  function setDetails(data){

    //card 1
    $('#room_total_booking').html(data.roomBookingStatus.total);
    $('#room_rejeted_booking').html(data.roomBookingStatus.Rejected);
    $('#room_cancelled_booking').html(data.roomBookingStatus.Cancelled);
    $('#room_booked_booking').html(data.roomBookingStatus.Booked);
    $('#room_paid_booking').html(data.roomBookingStatus.Paid);
    $('#room_checkedout_booking').html(data.roomBookingStatus.CheckedOut);

        
    //card 2
    $('#event_total_booking').html(data.eventBookingStatus.total);
    $('#event_rejeted_booking').html(data.eventBookingStatus.Rejected);
    $('#event_cancelled_booking').html(data.eventBookingStatus.Cancelled);
    $('#event_booked_booking').html(data.eventBookingStatus.Booked);
    $('#event_paid_booking').html(data.eventBookingStatus.Paid);
    $('#event_checkedout_booking').html(data.eventBookingStatus.CheckedOut);
   
  }


$(document).ready(function(){
  getGraghData();
  getDetails();
   
});
