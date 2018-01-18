

$(document).ready(function(){
    

    $("#pizzaAdd").click(function()
    {
        $type = "pizza";
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
        if($pizzaimage == "")
        {
            $("#pizzaimageeerror").text( "Upload Pizza Image" );
            $checkAllData = 0;
                    
        }
        else
        {
            $("#pizzaimageeerror").text( "" );
            $checkAllData += 1;
        }
        

        if($checkAllData >=3)
        {
            var datastr ='type=' +$type + '&pizzaname=' +$('#pizzaname').val() + '&pizzatype=' +$("#pizzatype").val()+ '&pizzaimage=' +$pizzaimage;
            $.ajax({  
                type:'POST',
                url:'./addItem.php',
                data:datastr,
                success:function(data){
                   alert("Item added");
                   
              
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
                    if(response != 0){
                        
                    }else{
                        alert(response);
                    }
                }
            });
        }

        
    });
    $("#toppingAdd").click(function()
    {
        $type1 = "topping";
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
        if($toppingtype == "" || $toppingtype != "vegeterian" || $toppingtype != "non vegeterian")
        {
            $("#toppingtypeerror").text( "Invalid Topping Type(Enter vegeterian or non vegeterian)" );
            $checkAllData1 = 0;
                    
        }
        else
        {
            $("#toppingtypeerror").text( "" );
            $checkAllData1 += 1;
        }
         if($toppingcost == "" || !(/^[0-9]+$/).test($toppingcost))
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
            var datastr1 ='type=' +$type1 + '&toppingname=' +$('#toppingname').val() + '&toppingtype=' +$("#toppingtype").val() + '&toppingcost=' +$("#toppingcost").val();
            $.ajax({  
                type:'POST',
                url:'./addItem.php',
                data:datastr1,
                success:function(data){
                     alert("Item added");
                    
              
                }
            });
        }

    });

});