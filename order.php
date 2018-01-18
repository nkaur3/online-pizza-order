<?php
	session_start();
	$username = $_SESSION["user"];
	$pizzaname = $_SESSION["pizza"];
 	$con=mysqli_connect('localhost','root','root','project',8889);
    if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if (isset($_POST['thincrust'])) {
		$crust =  $_POST['thincrust'];
	}
	else{
		$crust = 0;
	}
	$size = $_POST['size'];
	$quantity = $_POST['quantity'];
	$topping = $_POST['topping'];
	//$pizzaname = $_POST['pizza'];
	//$username = $_POST['username'];\
	$count=count($topping);
	
	$sql2 = "SELECT cost FROM size_and_base WHERE size_name='$size'";
	$result = mysqli_query($con,$sql2);
	$cost = mysqli_fetch_array($result);

	
	$totalcost = ($quantity*$cost[0])+($count*$quantity);

	$sql4="INSERT INTO `customer_order` ( `item_name`, `size_name`, `customer_id`, `thin_crust`, `quantity`, `check_out`, `cost`, `is_delete`) VALUES ('$pizzaname', '$size', '$username', '$crust', '$quantity', '0', '$totalcost', '0')"; 
	if ( mysqli_query($con,$sql4))
	{
		header("Location: checkout.php");
	}
?>