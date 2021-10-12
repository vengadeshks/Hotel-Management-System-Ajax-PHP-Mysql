
// display the room types with ajax
function displayEventTypes(value){

    $.ajax({
        url:"fetchData.php",
        type:"POST",
        data:{
            eventType:true,
            filter : value
        },
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

$(document).ready(function(){

    displayEventTypes("");
    $("#eventFilter").on("change",function(){
        var value = $(this).val();
        displayEventTypes(value);
    })
});