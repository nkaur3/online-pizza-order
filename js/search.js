$(document).ready(function(){
    


     $("#search").click(function()
    {
       
        $search = $('#myInput').val();
		
	
		var datastr ='search=' +$search;
            $.ajax({  
                type:'POST',
                url:'./search.php',
                data:datastr,
                success:function(data){
                    location.reload();
                 }
            });

	});
     $("#clear").click(function()
    {
       $clear = 1;
        var datastr ='search=' +$clear;
            $.ajax({  
                type:'POST',
                url:'./search.php',
                data:datastr,
                success:function(data){
                   location.reload();
                  
                 }
            });

    });
});