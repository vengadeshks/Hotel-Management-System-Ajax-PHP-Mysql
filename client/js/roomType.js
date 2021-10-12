
// display the room types with ajax
function displayRoomTypes(value){

    $.ajax({
        url:"fetchData.php",
        type:"POST",
        data:{
            roomType:true,
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

    displayRoomTypes("");
    $("#roomFilter").on("change",function(){
        var value = $(this).val();
        displayRoomTypes(value);
    })
});