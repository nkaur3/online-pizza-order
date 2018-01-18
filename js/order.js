$(document).ready(function() {
$( ".order" ).click(function(){
	
	var pizza = $(this).closest("tr").first().first().text();
	if(localStorage.getItem('username')==null)
	{ 
		window.alert("Please login/register to order");
	}
	else{
	//sessionStorage.pizza = pizza;
	var datastr = 'pizza='+pizza;
		$.ajax({
            type:'POST',
            url:'./pizzaname.php',
            data:datastr,
            success:function(data){
           	}
            
         });
	window.open("./submit.php", "_self");
	}
});
});

