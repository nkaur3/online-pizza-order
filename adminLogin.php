<?php
	session_start();

  	$con=mysqli_connect('localhost','root','root','project',8889);
    if (mysqli_connect_errno())
	{

	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	
 	$query = mysqli_query($con,"SELECT `admin_password` FROM `admin` WHERE `admin_id` =  '".$username."'");
 	$row    = mysqli_fetch_assoc($query);
 	$_SESSION['user'] = "";
 	if($password == $row['admin_password'])
 	{
 		
 		echo ("1");
 		
 	}
 	else
 	{
 		
 		echo "0";
 	}
?>