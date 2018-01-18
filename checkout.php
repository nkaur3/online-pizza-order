<!DOCTYPE html>
<html>
<head>
<title>Pizza Italiano</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/admin.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--webfont-->
<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


<script type="text/javascript" src="js/loggedIn.js"></script>	

<script type="text/javascript" src="js/cartActivity.js"></script>		
<script type="text/javascript" src="js/cartupdate.js"></script>
<script src="js/simpleCart.min.js"> </script>	
<script>
	$(document).ready(function() {
				var username = localStorage.getItem('username');

				if(username!= null)
				{
					document.getElementById("user").innerHTML += username;
				}
});
	function updateCheckout(evt, itemName) {
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
</head>
<body>
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
						<li><a href="pizza.php">Pizza</a></li>|
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
	<!-- checkout -->
	<div class="cart-items">
		<div class="container">
			<div class="tab">
				  <button class="tablinks active" onclick="updateCheckout(event, 'cartItems')">Cart Items</button>
				  <button class="tablinks" onclick="updateCheckout(event, 'orderHistory')">Order History</button>
				  
			</div>
			
			
				<?php
					session_start();
					$con=mysqli_connect('localhost','root','root','project',8889);
				    if (mysqli_connect_errno())
					{
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();

					}
					
					$username = $_SESSION['user'];

					if($username!= null || $username!= "")
					{
						$checkout = 0;
						$query2 = "SELECT * FROM `customer_order`  NATURAL JOIN `items` WHERE `customer_id`='$username' AND `check_out`='$checkout' AND `is_delete`='0'";
						
						$result2 = mysqli_query($con,$query2);
						
						$inc = 1;
						
						echo '<div id="cartItems" class="tabcontent" style="display:block;">';
						echo '<table>';
						
						while(($row1 = mysqli_fetch_array ($result2))){
							echo '<tr>';
							echo '<td><img src="images/pizzas/'. $row1["item_imagename"]. '" alt="'. $row1["item_imagename"]. '" style="width:10em;height:10em;"></td>';
							echo '<td><h3 class="result" id="result'.$inc++.'">'.$row1["item_name"].'</h3>';	
							echo '<h4 class="result">Cost : $'.$row1["cost"].'</h4>';
							echo '<input type="button" class="del" id="del" value="Delete Item"></a>';
							echo '<input type="button" class="check" id="check" value="Checkout"></a></td>';
							echo '<td>Quantity:<select name="quantity" class="colortext" id="quantity">
								<option value=""></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								</select></td>';
							echo '</tr>';
							
						}
						echo '</table>';							
						echo '</div>';
						
					}
				?>
				
			
				<?php
					session_start();
					$con=mysqli_connect('localhost','root','root','project',8889);
					
				    if (mysqli_connect_errno())
					{
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();

					}
					
					$username = $_SESSION['user'];
					if($username!= null || $username!= "")
					{
						$checkout1 = 1;
						$query3 = "SELECT * FROM `customer_order`  NATURAL JOIN `items` WHERE `customer_id`='$username' AND `check_out`='$checkout1'";
						
						$result3 = mysqli_query($con,$query3);
						
						$inc = 1;
						
						echo '<div id="orderHistory" class="tabcontent">';

						echo '<table>';
						
						while(($row1 = mysqli_fetch_array ($result3))){
							echo '<tr>';
							echo '<td><p class="result" id="result'.$inc++.'">'.$row1["item_name"].'</p></td>';
							echo '<td><img src="images/pizzas/'. $row1["item_imagename"]. '" alt="'. $row1["item_imagename"]. '" style="width:10em;height:10em;"></td>';
							echo '</tr>';	
						}
						echo '</table>';
						echo '</div>';
				}
					
				?>
			
			
		 </div>
	</div>

	
	<!-- content-section-ends -->
	
</body>
</html>