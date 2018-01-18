$(document).ready(function() {
	var username = localStorage.getItem('username');
	if(username!= null)
	{
		$("#logout-link").show();

	}
	else
	{
		$("#logout-link").hide();
	}

	$("#logout-link").click(function(){

		localStorage.removeItem('username');
		var datastr1 = ""; 
            $.ajax({  
                type:'POST',
                url:'./logout.php',
                data:datastr1,
                success:function(data){
                }
            });
		window.open("./index.html", "_self");

	});
});