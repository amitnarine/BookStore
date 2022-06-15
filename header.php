<head>
	<link rel="stylesheet" href="search.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="main.css">
</head>
<body>
<?php
        if(!isset($_SESSION['Username'])){
		?>
			<div class="header-bar">
				<div class="header-left">
					<p>HAVE FUN SHOPPING!</p>
				</div>
				<div class="header-homepage">
					<a href="search.php"><h1>THE BOOKSTORE</h1></a>
				</div>
				<div class="header-right">
					<div class="flex1">
						<a href="1Login.php"><p>LOGIN</p></a>
					</div>
				</div>
			</div> 
               
            <?php
                }else{
            ?>
			<div class="navbar">
				<a href="0Home.php">Home</a>
				<a href="productGrid.php">Products</a>
				<a href="search.php">Search</a>
				<div class="dropdown">
					<button class="dropbtn" onclick="myFunction()">Pages
						<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-content" id="myDropdown">
						<a href="profile.php">Profile</a>
						<a href="setting.php">Settings</a>
						<a href="signout.php">Sign Out</a>
					</div>
				</div> 
			</div>

			<script>
				/* When the user clicks on the button, 
				toggle between hiding and showing the dropdown content */
				function myFunction() {
				document.getElementById("myDropdown").classList.toggle("show");
				}

				// Close the dropdown if the user clicks outside of it
				window.onclick = function(e) {
					if (!e.target.matches('.dropbtn')) {
					var myDropdown = document.getElementById("myDropdown");
						if (myDropdown.classList.contains('show')) {
						myDropdown.classList.remove('show');
						}
					}
				}
			</script>
			<div class="header-bar">
				<div class="header-left">
					<p>HAVE FUN SHOPPING!</p>
				</div>
				<div class="header-homepage">
					<a href="search.php"><h1>THE BOOKSTORE</h1></a>
				</div>
				<div class="header-right">
					<div class="flex1">
						<a href="5ShoppingCart.php"><p>CART</p></a>
					</div>
				</div>
			</div>   

            <?php
                }                
            ?>   

</body>

<footer>
		<p>@ 2022 THE BOOKSTORE</p>	
</footer>