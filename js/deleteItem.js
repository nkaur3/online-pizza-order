$(document).ready(function(){
    
    $("#pizzaDelete").click(function()
    {
		$pizzaname = $( "#deletePizzaForm option:selected" ).text();	
		$type = "pizza";	
		var datastr ='type=' +$type + '&pizzaname=' +$pizzaname;
            $.ajax({  
                type:'POST',
                url:'./deleteItems.php',
                data:datastr,
                success:function(data){
                    alert("Item deleted");
                    location.reload();
                }
            });

	});
	$("#toppingDelete").click(function()
    {
		$toppingname = $( "#deleteToppingForm option:selected" ).text();	
		$type1 = "topping";		
		var datastr ='type=' +$type1 + '&toppingname=' +$toppingname;
            $.ajax({  
                type:'POST',
                url:'./deleteItems.php',
                data:datastr,
                success:function(data){
                    alert("Item deleted");
                   location.reload();
                 }
            });

	});
});