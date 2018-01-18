<?php

  	$con=mysqli_connect('localhost','root','root','project',8889);
    if (mysqli_connect_errno())
	{

	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();

	}
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$phonenumber = $_POST["phonenumber"];
	$email = $_POST["email"];
	$address1 = $_POST["address1"];
	$address2 = $_POST["address2"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zipcode = $_POST["zipcode"];
	$username = $_POST["username"];
	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

	/*$query = mysqli_query($con,"INSERT INTO `customer` VALUES('".$username."','".$password"','".$firstname"','".$lastname"','".$address"','
		"$.email"','"$.username"','"$.password"'");*/
	
	$query = mysqli_query($con,"INSERT INTO `customer` (`customer_id`, `password`, `firstname`, `lastname`, `email`, `phone`, `address_line1`, `address_line2`, `city`, `state`, `zipcode`) VALUES('$username','$password','$firstname','$lastname','$email','$phonenumber', '$address1','$address2','$city','$state','$zipcode')");
	mysqli_close($con);
	echo ("1");

?>