function displayContacts(msg,err){
    var Data = {
        contactDetails : true
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
};

function deleteContact(id){
    
  $.ajax({
    url:"admin_functions.php",
    type:"POST",
    data:{
      ID : id,
      deleteContact:true
    },
    success:function(data){      
      console.log("success");
      console.log(data);
      var json = JSON.parse(data);
      if(json['error']!=""){
        displayContacts("","",json['error']);
      }else{
        displayContacts("",json['msg'],"");
      }
      
       
   },
   error: function(data){
       console.log("error");
       console.log(data);
   }
  });
}

$(document).ready(function(){
    displayContacts("","");
});