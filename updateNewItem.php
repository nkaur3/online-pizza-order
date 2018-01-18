<?php
	define("DOC_ROOT", $_SERVER['DOCUMENT_ROOT']."/");
	define("IMG_UPLOADS", DOC_ROOT."images/pizzas/");
    $added = 0;
	$con=mysqli_connect('localhost','root','root','project',8889);
    if (mysqli_connect_errno())
	{

	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	
	$type = $_POST["type"];
	
	
	if($type == "pizza")
	{
		$nameold = $_POST["nameold"];
		$pizzaname = $_POST["pizzaname"];
		$pizzatype = $_POST["pizzatype"];
		$pizzaimage = $_POST["pizzaimage"];

		if(!(empty($pizzaimage)))
		{
			$query = mysqli_query($con,"UPDATE `items` SET `item_name`='$pizzaname',`item_type`='$pizzatype', `item_imagename`='$pizzaimage' WHERE `item_name`='$nameold'");
		}
		else
		{
			$query = mysqli_query($con,"UPDATE `items` SET `item_name`='$pizzaname',`item_type`='$pizzatype' WHERE `item_name`='$nameold'");
		}
			
	}
	
	

	if($type == "topping")
	{
		$toppingtypeid = 0;
		$nameold = $_POST["nameold1"];
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
		$toppingcost = $_POST["toppingcost"];
		$toppingcost = floatval($_POST["toppingcost"]);
		$query = mysqli_query($con,"UPDATE `toppings` SET `name`='$toppingname',`cost`='$toppingcost',`type`='$toppingtypeid' WHERE `name`='$nameold'");
	}
	
?>