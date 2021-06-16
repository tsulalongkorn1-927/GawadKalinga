$(document).ready(function(){

// this is for displaying all registered members in database
    displayData();

  function displayData(){
      var handle = $("#result");
      handle.html("");

        $.ajax({
            method: "POST",
            url: "index.php",
            data:"",
            success: function(data){
                
                var holder=JSON.parse(data);
                $.each(holder,function(key,val){
                 var row = $("<tr>"); 
                  row.html("<td>"+val.id+"</td>"
                    +"<td>"+val.fullname + "</td>"
                    +"<td>"+val.username+"</td>"
                    +"<td>"+val.password+"</td>"
                handle.append(row);

                });
            }                    
         });

    }

 $("#regis").click(function(){
        
         var id = $("#id").val();
         var fullname = $("#fn").val();
         var username = $("#un").val();
         var password = $("#passW").val();
        $.ajax({
            type : "POST",
            url : "index.php",
            data : {
                'done':1,
                'id':id,
                 'fn':fullname,
                 'un':username,
                'passW':password,
                
            },
            
        });
    });

});