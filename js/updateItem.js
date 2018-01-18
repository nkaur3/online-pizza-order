$(document).ready(function(){
    $pizza = "pizza";
    $topping = "topping";

     $("#pizzaTab").click(function(){
    var name =  $("#updatePizzaSelect option:first").val();
    var dataString = "type=" + $pizza + "&name=" + name;
    $.ajax ({
        type: "POST",
        url: "./getUpdateData.php",
        data: dataString,
        dataType: 'json',
        success: function(data) {
             $('#pizzaname').val(data.name);
            $('#pizzatype').val(data.type);
            $url = "./images/pizzas/"+data.image
            $('#pizzaimage').attr("src",$url);
        }
    });
    });

    $("#toppingTab").click(function(){
    

        var toppingName =  $("#updateToppingSelect option:first").val();
        var dataString = "type=" + $topping + "&name=" + toppingName;
        $.ajax ({
            type: "POST",
            url: "./getUpdateData.php",
            data: dataString,
            dataType: 'json',
            success: function(data) {
                 $('#toppingname').val(data.toppingname);
                $('#toppingtype').val(data.toppingtype);
                $('#toppingcost').val(data.toppingcost);
            }
        });
    });

    $("#updatePizzaSelect").change(function(){
        var name1 = $(this).val();
        var dataString = "type=" + $pizza + "&name=" + name1;
        $.ajax ({
            type: "POST",
            url: "./getUpdateData.php",
            data: dataString,
            dataType: 'json',
            success: function(data) {
                $('#pizzaname').val(data.name);
                $('#pizzatype').val(data.type);
                $url = "./images/pizzas/"+data.image
                $('#pizzaimage').attr("src",$url);
                
            }
        });
    });

    $("#pizzaUpdate").click(function(){
        $nameold =  $( "#updatePizzaForm option:selected" ).text(); 
        $pizzaname = $('#pizzaname').val();
        $pizzatype = $('#pizzatype').val();
        $pizzaimage = $('input[type=file]').val().split('\\').pop();
        
        $checkAllData = 0;
        if($pizzaname == "")
        {
            $("#pizzanameerror").text( "Enter Pizza Name" );
            $checkAllData = 0;
        }
        else
        {
            $("#pizzanameerror").text( "" );
            $checkAllData += 1;
        }
        if($pizzatype == "")
        {
            $("#pizzatypeerror").text( "Invalid Pizza Type" );
            $checkAllData = 0;
                    
        }
        else
        {
            $("#pizzatypeerror").text( "" );
            $checkAllData += 1;
        }
        
        if($checkAllData >=2)
        {
            var datastr ='type=' +$pizza + '&nameold=' + $nameold +'&pizzaname=' +$('#pizzaname').val() + '&pizzatype=' +$("#pizzatype").val()+ '&pizzaimage=' +$pizzaimage;
            $.ajax({  
                type:'POST',
                url:'./updateNewItem.php',
                data:datastr,
                success:function(data){

                   location.reload();
                   
              
                }
            });
            var fd = new FormData();
            var files = $('#file')[0].files[0];
            fd.append('file',files);
            $.ajax({
                url: './upload.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    
                }
            });
        }
        
    });

    $("#updateToppingSelect").change(function(){
        var name2 = $(this).val();
        var dataString = "type=" + $topping + "&name=" + name2;
        $.ajax ({
            type: "POST",
            url: "./getUpdateData.php",
            data: dataString,
            dataType: 'json',
            success: function(data) {
                $('#toppingname').val(data.toppingname);
                $('#toppingtype').val(data.toppingtype);
                $('#toppingcost').val(data.toppingcost);  
            }
        });
    });

    $("#toppingUpdate").click(function()
    {
        $toppingnameold =  $( "#updateToppingForm option:selected" ).text(); 
        $toppingname = $('#toppingname').val();
        $toppingtype = $('#toppingtype').val();
        $toppingcost = $('#toppingcost').val();
        
        $checkAllData1 = 0;
        if($toppingname == "")
        {
            $("#toppingnameerror").text( "Enter Topping Name" );
            $checkAllData1 = 0;
        }
        else
        {
            $("#toppingnameerror").text( "" );
            $checkAllData1 += 1;
        }
        if($toppingtype == "")
        {
            $("#toppingtypeerror").text( "Invalid Topping Type(Enter vegeterian or non vegeterian)" );
            $checkAllData1 = 0;
                    
        }
        else
        {
            $("#toppingtypeerror").text( "" );
            $checkAllData1 += 1;
        }
         if($toppingcost == "")
        {
            $("#toppingcosterror").text( "Invalid Topping Cost" );
            $checkAllData1 = 0;
                    
        }
        else
        {
            $("#toppingcosterror").text( "" );
            $checkAllData1 += 1;
        }
        if($checkAllData1 >=3)
        {
            var datastr1 ='type=' +$topping + '&nameold1=' + $toppingnameold + '&toppingname=' +$("#toppingname").val() + '&toppingtype=' +$("#toppingtype").val() + '&toppingcost=' +$("#toppingcost").val();
            $.ajax({  
                type:'POST',
                url:'./updateNewItem.php',
                data:datastr1,
                success:function(data){
                    location.reload();
                 }
            });
        }

    });
});