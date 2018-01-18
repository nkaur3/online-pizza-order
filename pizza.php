<!DOCTYPE html>
<html>
<head>
<title>PIZZA ITALIANO</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="css/admin.css" rel="stylesheet" type="text/css" media="all" />


<script type="text/javascript" src="js/order.js"></script>
<script type="text/javascript" src="js/loggedIn.js"></script>
<script type="text/javascript" src="js/search.js"></script>
<body>
<script type="text/javascript">
			$(document).ready(function() {
				var username = localStorage.getItem('username');

				if(username!= null)
				{
					document.getElementById("user").innerHTML += username;
				}
							 
				
				 var pdata = document.getElementsByTagName("p");
				 if (username=="admin")
				 {
				 	document.getElementsByClassName("admin-list")[0].style.display = "block";
				 }
				 else
				 {
				 	document.getElementsByClassName("admin-list")[0].style.display = "none";
				 }
				
	});


		function updateItem(evt, itemName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(itemName).style.display = "block";
    evt.currentTarget.className += " active";
}	
		</script>		
<script src="js/simpleCart.min.js"> </script>	
</head>
	
    <!-- header-section-starts -->
	<div class="header">
		<div class="container">
			<div class="top-header">
				<div class="logo">
					<img src="images/icon.png" width="60" height="55" />
					Pizza Italiano
				</div>
				<div class="header-right">
						<div class="cart box_1">
							<a href="checkout.php">
							<h3> Checkout<img src="images/bag1.png" alt=""></h3></a>
							
							<div class="clearfix"> </div>
							
							<div class="logout" id="logout-link">
								Logout
							</div>
							<h3 id="user">Welcome </h3>
						</div>
					</div>
				<div class="clearfix"></div>
			</div>
		</div>
			<div class="menu-bar">
			<div class="container">
				<div class="top-menu">
					<ul>
						<li><a href="index.html">Home</a></li>|
						<li class="active"><a href="pizza.php">Pizza</a></li>|
						<li><a href="contact.html">contact</a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="login-section">
					<ul>
						<li><a href="login.html">Login</a>  </li> |
						<li><a href="register.html">Register</a> </li> |
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	<!-- header-section-ends -->
	<!-- content-section-starts -->	
	<div class="content">
		<div class="container">
		
		<div class="admin-list">
			<a href="addItem.html"><button>Add Item</button></a>
			<a href="deleteItem.php"><button>Delete Item</button></a>
			<a href="updateItem.php"><button>Update Item</button></a>
		</div>
			<div class="tab">
				  <button class="tablinks active" onclick="updateItem(event, 'updatePizza')" id="all">All Pizzas</button>
				  <button class="tablinks" onclick="updateItem(event, 'updateVegPizza')" id="veg">Vegetarian</button>
				  <button class="tablinks" onclick="updateItem(event, 'updateNonvegPizza')" id="nonveg">Non Vegetarian</button>
				  
			</div>

	<div id="updatePizza" class="tabcontent" style="display:block;">
		<?php 
		session_start();
		echo '<input type="text" id="myInput" value="'. $_SESSION['search'] .'">'; 
		?>
		<button id="search" class ="searchButton">Search</button>
		<button id="clear" class ="searchButton">Clear</button>
	<?php
	session_start();
	$con=mysqli_connect('localhost','root','root','project',8889);
	
    if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	



	if($_SESSION['search'] == "")
	{
		$query1 = "SELECT * FROM items";
	}
	else
	{
		$search = $_SESSION['search'];
		$query1 = "SELECT * from items where `item_name` LIKE '%$search%' ";
	
	}
	
	
	$result1 = mysqli_query($con,$query1);
	
	
	$inc = 1;
	echo '<table>';
	while(($row1 = mysqli_fetch_array ($result1))){
		echo '<tr>';
		echo '<td><img src="images/pizzas/'. $row1["item_imagename"]. '" alt="'. $row1["item_imagename"]. '" style="width:10em;height:10em;"></td>';
		echo '<td><p class="result" id="result'.$inc.'">'.$row1["item_name"].'</p>';
		echo '<input type="button" value="Order Now" class="order" id="order'.$inc.'""></td>';
		echo '</tr>';
		$inc++;
	}
	echo '</table>';
	//$arrayp = json_encode($array);
	//echo $array;
	mysqli_close();
	
	?>
	<div class="pagination">
  
  		<a href="#">1</a>
  		<a href="#" class="active">2</a>
  
	</div>
	</div>
	<div id="updateVegPizza" class="tabcontent">
	<?php
	$con=mysqli_connect('localhost','root','root','project',8889);
	
    if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	

	$query1 = "SELECT item_name FROM items WHERE item_type='Vegetarian'";
	$query2 = "SELECT item_imagename FROM items WHERE item_type='Vegetarian'";
	$result1 = mysqli_query($con,$query1);
	$result2 = mysqli_query($con,$query2);
	$array1 = array();
	$array2 = array();
	$inc = 1;
	echo '<table>';
	while(($row1 = mysqli_fetch_array ($result1)) && ($row2 = mysqli_fetch_array ($result2))){
		echo '<tr>';
		echo '<td><img src="images/pizzas/'. $row2["item_imagename"]. '" alt="'. $row2["item_imagename"]. '" style="width:10em;height:10em;"></td>';
		echo '<td><p class="result" id="result'.$inc++.'">'.$row1["item_name"].'</p>';
		echo '<input type="button" class= "order" value="Order Now" id="order'.$inc++.'"></td>';
		echo '</tr>';	
	}
	echo '</table>';
	//$arrayp = json_encode($array);
	//echo $array;
	mysqli_close();
	?>
	</div>
	<div id="updateNonvegPizza" class="tabcontent">
	<?php
	$con=mysqli_connect('localhost','root','root','project',8889);
	
    if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	

	$query1 = "SELECT item_name FROM items WHERE item_type='Non Vegetarian'";
	$query2 = "SELECT item_imagename FROM items WHERE item_type='Non Vegetarian'";
	$result1 = mysqli_query($con,$query1);
	$result2 = mysqli_query($con,$query2);
	$array1 = array();
	$array2 = array();
	$inc = 1;
	echo '<table>';
	while(($row1 = mysqli_fetch_array ($result1)) && ($row2 = mysqli_fetch_array ($result2))){
		echo '<tr>';
		echo '<td><img src="images/pizzas/'. $row2["item_imagename"]. '" alt="'. $row2["item_imagename"]. '" style="width:10em;height:10em;"></td>';
		echo '<td><p class="result" id="result'.$inc++.'">'.$row1["item_name"].'</p>';
		echo '<input type="button" class="order" value="Order Now" id="order'.$inc++.'"></td>';
		echo '</tr>';	
	}
	echo '</table>';

	mysqli_close();
	?>
	</div>
	
		</div>
		</div>
	<!-- content-section-ends -->
</body>
</html>