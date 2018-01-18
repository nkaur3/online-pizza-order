<?php
if (ISSET($_POST)) 
{
	$type_item = $_POST['type'];
    $item_name = $_POST['name'];

    $con=mysqli_connect('localhost','root','root','project',8889);
    if (mysqli_connect_errno())
	{

	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	
	if($type_item == "pizza")
	{
	 	$query = mysqli_query($con,"SELECT * FROM `items` WHERE `item_name` =  '".$item_name."'");
	    
	    while ($row = mysqli_fetch_assoc($query))
	    {
		    $name = $row['item_name'];
		    $type = $row['item_type'];
		    $image = $row['item_imagename'];
		    $json = array('name' => $name, 'type' => $type, 'image' => $image);
	   		 echo json_encode($json);
		}
		
	}
	if($type_item == "topping")
	{
	 	$query = mysqli_query($con,"SELECT * FROM `toppings` WHERE `name` =  '".$item_name."'");
	    
	    while ($row = mysqli_fetch_assoc($query))
	    {
		    $toppingname = $row['name'];
		    $toppingtype = $row['type'];
		    $toppingcost = $row['cost'];
		    if($toppingtype =="0")
		    	$toppingtype = "vegeterian";
		    else
		    	$toppingtype = "non vegeterian";
		    
		    $json = array('toppingname' => $toppingname, 'toppingtype' => $toppingtype, 'toppingcost' => $toppingcost);
	   		echo json_encode($json);
		}
		
	}
}
?>