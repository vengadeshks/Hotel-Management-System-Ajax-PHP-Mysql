

// function to display content of payment
function eventPayment(value,msg,err){
    var Data = {
      eventPayment : true,
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
  

$(document).ready(function(){
    eventPayment("","","");

    $("#eventPaymentFilter").on("change",function(){
        var value = $(this).val();
        eventPayment(value,"","");
    });
});