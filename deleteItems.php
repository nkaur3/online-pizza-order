<?php
	$con=mysqli_connect('localhost','root','root','project',8889);
    if (mysqli_connect_errno())
	{

	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	
	$type = $_POST["type"];
	
	if($type == "pizza")
	{
		$pizzaname = $_POST["pizzaname"];
		$query = mysqli_query($con,"DELETE FROM `items` WHERE `item_name`='$pizzaname'");	
	}

	if($type == "topping")
	{
		$toppingname = $_POST["toppingname"];
		$query = mysqli_query($con,"DELETE FROM `toppings` WHERE `name`='$toppingname'");
	}
	
 	
 	
?>