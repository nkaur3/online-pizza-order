<?php
	$pizza = $_POST["pizza"];
	$con=mysqli_connect('localhost','root','root','project',8889);
    if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$sql1 = "UPDATE `customer_order` SET `check_out`='1' WHERE `item_name`='$pizza'";
	mysqli_query($con,$sql1);
?>
