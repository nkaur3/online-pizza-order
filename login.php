<?php
	session_start();

  	$con=mysqli_connect('localhost','root','root','project',8889);
    if (mysqli_connect_errno())
	{

	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	
 	$query = mysqli_query($con,"SELECT `password` FROM `customer` WHERE `customer_id` =  '".$username."'");
 	$row    = mysqli_fetch_assoc($query);
 	
 	if(password_verify($password, $row['password']))
 	{
 		 $_SESSION['user'] = $username;
 		 
 		
 	}
 	else
 	{
 		$_SESSION['user'] = "";
 		echo ("0");
 	}
?>