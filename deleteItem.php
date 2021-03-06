<!DOCTYPE html>
<html>
<head>
<title>Pizza Italiano</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/deleteItem.js"> </script>	
<script type="text/javascript" src="js/loggedIn.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/admin.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--webfont-->
<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<script type="text/javascript">
			$(document).ready(function() {
				var username = localStorage.getItem('username');
				if(username!= null)
				{
					document.getElementById("user").innerHTML += username;
				}
			});
</script>	
<script>
	
	function deleteItem(evt, itemName) {
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
						<li class="active"><a href="register.html">Register</a> </li> |
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
			<div class="tab">
				  <button class="tablinks active" onclick="deleteItem(event, 'deletePizza')">Delete Pizza</button>
				  <button class="tablinks" onclick="deleteItem(event, 'deleteTopping')">Delete Topping</button>
				  
			</div>

				<div id="deletePizza" class="tabcontent" style="display:block;">
				  			
								<form id="deletePizzaForm" class="admin-form">
								
									<span>Pizza Name: </span>
									<select name="to_user1">
									<?php
												
   													
												$con=mysqli_connect('localhost','root','root','project',8889);
													if (mysqli_connect_errno())
													{
													  echo "Failed to connect to MySQL: " . mysqli_connect_error();
													}													$sql = mysqli_query($con, "SELECT * FROM `items`");
													$row = mysqli_num_rows($sql);
													
													while ($row = mysqli_fetch_array($sql)){
														echo '<option value="'.$row['item_name'].'">'.$row['item_name'].'</option>';
													}
												?> 
									</select>
									<button type="button" id="pizzaDelete" class="admin-btn">Delete Item</button>
				    			</form>
			   			
				</div>

				<div id="deleteTopping" class="tabcontent">
							<form method="post" id="deleteToppingForm" class="admin-form">
									<span>Topping Name: </span>
										<select name="to_user2">
											
												<?php
													$con=mysqli_connect('localhost','root','root','project',8889);
													if (mysqli_connect_errno())
													{
													  echo "Failed to connect to MySQL: " . mysqli_connect_error();
													}
													$sql = mysqli_query($con, "SELECT * FROM `toppings`");
													$row = mysqli_num_rows($sql);
													
													while ($row = mysqli_fetch_array($sql)){
														echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
													}
												?> 
										</select>
									
									

					  				<button type="button" id="toppingDelete" class="admin-btn">Delete Item</button>
				    			</form>
				  </div>

			
		</div>
	</div>
	

</body>
</html>
<