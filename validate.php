<?php

  	$con=mysqli_connect('localhost','root','root','project',8889);
    if (mysqli_connect_errno())
	{

	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	
	$username = $_POST["username"];

	$query = mysqli_query($con,"SELECT * FROM `customer` WHERE `customer_id` =  '".$username."'");

	$find = mysqli_num_rows($query);

	echo $find;
	mysqli_close($con);

?>