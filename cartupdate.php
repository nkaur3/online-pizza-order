<?php
	session_start();
	$quant = $_POST["quantity"];
	$pizza = $_POST["pizza"];
	$username = $_SESSION["user"];
	$con=mysqli_connect('localhost','root','root','project',8889);
    if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$sql2 = "SELECT `size_name` FROM `customer_order` WHERE `customer_id`='$username' AND `item_name`='$pizza'";
	$result = mysqli_query($con,$sql2);
	$size_name = mysqli_fetch_array ($result);
	
	$sql3 = "SELECT `cost` FROM `customer_order` WHERE `customer_id`='$username' AND `item_name`='$pizza'";
	$result1 = mysqli_query($con,$sql3);
	$cost = mysqli_fetch_array($result1);
	
	$sql5 = "SELECT `cost` FROM `size_and_base` WHERE `size_name`='$size_name'";
	$result2 = mysqli_query($con,$sql5);
	$size_cost = mysqli_fetch_array($result2);
	
	$sql6 = "SELECT `quantity` FROM `customer_order` WHERE `customer_id`='$username' AND `item_name`='$pizza'";
	$result3 = mysqli_query($con,$sql6);
	$q = mysqli_fetch_array ($result3);
	
	$costeach = $cost[0]/$q[0];
	$totalcost = ($quant*$costeach);
	$sql4 = "UPDATE `customer_order` SET `quantity`='$quant', `cost`='$totalcost'  WHERE `item_name`='$pizza' AND `customer_id`='$username'";
	mysqli_query($con,$sql4);
	
?>
