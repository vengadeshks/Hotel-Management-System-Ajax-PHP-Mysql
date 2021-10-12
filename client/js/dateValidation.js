$(document).ready(function(){

      // var todayDate = new Date();
      // var month = todayDate.getMonth()+1; 
      // var year = todayDate.getUTCFullYear() - 0; 
      // var tdate = todayDate.getDate(); 
      // if(month < 10){
      //   month = "0" + month 
      // }
      // if(tdate < 10){
      //   tdate = "0" + tdate;
      // }
      // var maxDate = year + "-" + month + "-" + tdate;
      // var maxDate = month + "/" + tdate + "/" + year ;
      // $("#checkIn").attr("min", maxDate);
      // $("#checkOut").attr("min", maxDate);
      // console.log(maxDate);

      
$("#checkIn").datepicker({
  minDate: 0,
  maxDate: '+1Y+6M',
  onSelect: function (dateStr) {
      var min = $(this).datepicker('getDate'); // Get selected date
      $("#checkOut").datepicker('option', 'minDate', min || '0'); // Set other min, default to today
  }
});

$("#checkOut").datepicker({
  minDate: '0',
  maxDate: '+1Y+6M',
  onSelect: function (dateStr) {
      var max = $(this).datepicker('getDate'); // Get selected date
      $('#datepicker').datepicker('option', 'maxDate', max || '+1Y+6M'); // Set other max, default to +18 months
      var start = $("#checkIn").datepicker("getDate");
      var end = $("#checkOut").datepicker("getDate");
      var days = (end - start) / (1000 * 60 * 60 * 24);
      var cost = $("#roomCost").val();
      var totalCost = cost*days;
      $("#totalCost").val(totalCost);
  }
});

      
$("#eventDate").datepicker({
  minDate: 0,
  maxDate: '+1Y+6M',
 
});


$('#total_hours').on('change',function(){
  var package = this.value;
  var eventCost = $('#eventCost').val();
  var cost = package * eventCost;
  $('#totalCost').val(cost);

});

// Jquery Time picker
$('#eventTime').timepicker({
  timeFormat: 'h:mm p',
  interval: 30,
  minTime: '5',
  maxTime: '11:00pm',
  defaultTime: '9',
  startTime: '10:00',
  dynamic: true,
  dropdown: true,
  scrollbar: true
});

});

