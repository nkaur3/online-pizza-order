<?php
	session_start();

	$search = $_POST["search"];
	

	if($search == "" || $search==1)
	{
		 $_SESSION['search'] = "";

	}
	else
	{
		$_SESSION['search'] = $search;
	}
 	
 	echo $_SESSION['search'];
 	
?>