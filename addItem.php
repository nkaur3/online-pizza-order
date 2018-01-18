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
		
		$pizzatype = $_POST["pizzatype"];
		$pizzaimage = $_POST["pizzaimage"];
		$query = mysqli_query($con,"INSERT INTO `items`(`item_name`, `item_type`, `item_imagename`) VALUES ('$pizzaname','$pizzatype','$pizzaimage')");
		
	}
	
	

	else if($type == "topping")
	{
		$toppingname = $_POST["toppingname"];
		$toppingtype = $_POST["toppingtype"];
		if($toppingtype == "vegeterian")
		{
			$toppingtypeid = 0;
		}
		else
		{
			$toppingtypeid = 1;
		}
		$toppingcost = floatval($_POST["toppingcost"]);
		$query = mysqli_query($con,"INSERT INTO `toppings`(`name`, `cost`, `type`) VALUES ('$toppingname','$toppingcost','$toppingtypeid')");

	}
	else
	{
		echo "0";
	}
	
 	
 	
?>