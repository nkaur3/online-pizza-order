$(document).ready(function() {
		$checkData = 0;

		var username = localStorage.getItem('username');

				if(username!= null)
				{
					$("#login-form").hide();
					$("#login-page").show();
					
				}
				else
				{
					$("#login-form").show();
					$("#login-page").hide();
					
				}

	$( "#loginSubmit" ).click(function(e){
		
		var $username = $("#username").val();
		if($username != "" )
		{
			$.post('./validate.php',{username: $('#username').val()}, function(data){
			if(data==1)
			{
	        	$("#usernameerror").text( "" );
	        	$checkData += 1;
	        }
	        else
	        {
	        	$("#usernameerror").text( "User Name does not exist" );
	        	$checkData = 0;
	        	
	        }
	    	});

	    }
	    else
	    {
	    	$("#usernameerror").text( "Enter User Name" );
	    }
		var $password = $("#password").val();
		
		if($password == "")
		{
			$("#passworderror").text( "Enter Password" );
			$checkData = 0;
		}
		else
		{
			$("#passworderror").text( "" );
			$checkData += 1;
			
		}

		if($username == "admin")
		{
			$.post('./adminLogin.php',{username: $('#username').val(), password: $('#password').val()}, function(data){
					if(data=="1")
					{
						$(".admin-list").show();
						window.open("./pizza.php", "_self");
						window.localStorage.setItem('username', "admin");
					}
			       	else
			       	{
			       		$("#passworderror").text( "Incorrect Password" );
						$checkData = 0;
			       	}
			        
			    });
			
		}
		else
		{
			if($checkData >= 2)
			{
				
				$.post('./login.php',{username: $('#username').val(), password: $('#password').val()}, function(data){
					if(data=='0')
					{
						$("#passworderror").text( "Incorrect Password" );
						$checkData = 0;
						
					}
			       	else
			       	{
			       		window.localStorage.setItem('username', $('#username').val());
			       		window.open("./pizza.php", "_self");
			       	}
			        
			    });
				
			}
		}

	
});



	
});
    	