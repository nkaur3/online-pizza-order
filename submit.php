
<!DOCTYPE html>
<html>
<head>
<title>PIZZA ITALIANO</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--webfont-->
<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<script type="text/javascript" src="js/loggedIn.js"></script>
</head>
<body>
	<script type="text/javascript">
			$(document).ready(function() {
			 var username = localStorage.getItem('username');
			  var pizza = sessionStorage.getItem("pizza");
			  if(username!= null)
				{
					document.getElementById("user").innerHTML += username;
				}
					
			  //document.getElementById("result").innerHTML = pizza;
			  var username = localStorage.getItem('username');
			  
			
		});
		
				</script>
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
						
						<li><a href="contact.html">Contact</a></li>
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
	</div>
	<!-- header-section-ends -->
	<!-- content-section-starts -->	
	<div class="container">
	<?php
	
		session_start();
		$pizzaname = $_SESSION['pizza'];
		$con=mysqli_connect('localhost','root','root','project',8889);
	
    if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
		$query2 = "SELECT item_imagename FROM items WHERE item_name='".$pizzaname."'";
		$result2 = mysqli_query($con,$query2);
		$row2 = mysqli_fetch_array ($result2);
		echo '<div class="imagedisplay"><p name="result" id="result">'.$pizzaname.'</p>';
		echo '<img src="images/pizzas/'. $row2["item_imagename"]. '" alt="'. $row2["item_imagename"]. '" style="width:12em;height:12em;">';
		echo '</div>';
	?>
	<div class="imagedisplay2">
	<form class="ordering_form" action="order.php" method="post">
		<table class="container">
		<tr class="ordering_form">				
			<td class="result" >	
				<input type="checkbox" name="thincrust" value="1">THIN CRUST<br>				
			</td></tr>
			<tr class="ordering_form">
			<td class="result">
				<select class="colortext" name="size">
				  <option value="small">SMALL</option>
				  <option value="medium">MEDIUM</option>
				  <option value="large">LARGE</option>
				</select>		
			</td>
			
			</tr>
			<tr class="ordering_form">
			<td class="result">QUANTITY
				<select class="colortext" name="quantity">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option></select>			
			</td></tr><tr class="ordering_form">
		<td class="result">
	<ul>
		<?php
		$con=mysqli_connect('localhost','root','root','project',8889);
		$sql = mysqli_query($con, "SELECT * FROM `toppings`");
		$row = mysqli_num_rows($sql);
		echo 'TOPPINGS:';
		while ($row = mysqli_fetch_array($sql)){
			
			echo '<li class="checking"><input type="checkbox" name="topping[] value="'.$row['name'].'">'.$row['name'].'</input></li>';
			
	    }
		echo '*$1 will be added per topping.';
		?></ul></td>
		</tr>
	
		</table>	
					<input type="submit" class="order"value="PROCEED TO CHECKOUT">
	</form> 
	</div>
	</div>


</body>
</html>