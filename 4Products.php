<?php
    require('database.php');
	session_start();
    
	// receives two pieces of input from SearchAndSearchResults, ProductID and UserID
	// filters input
	$ProductID = filter_input(INPUT_GET, 'ProductID', FILTER_VALIDATE_INT);
	if ($ProductID == NULL || $ProductID == FALSE) {
		$ProductID = 1;
	}

	$UserID = filter_input(INPUT_GET, 'UserID', FILTER_VALIDATE_INT);
	if ($UserID == NULL || $UserID == FALSE) {
		$UserID = 1;
	}

	$ProductID = filter_input(INPUT_POST, 'ProductID');

	// finds the product in Products table where the ID is equal to the input
	$query = 'SELECT * FROM product WHERE ProductID = :ProductID';
	$statement = $db -> prepare($query);
	$statement -> bindValue('ProductID', $ProductID);
	$success = $statement -> execute();
	$product = $statement -> fetch();
	$statement -> closeCursor();

	// obtain user if if logged in
	if(isset($_SESSION['Username'])){
	$query1="SELECT * FROM user WHERE Username ='".$_SESSION['Username']."'";
    $statement1 = $db -> prepare($query1);
	$statement1 -> execute();
    $user = $statement1 -> fetch();
    $UserID = $user['UserID'];
    $statement1 -> closeCursor();
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Products</title>
		<link rel="stylesheet" href="search.css">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="main.css">
        <?php include("header.php"); ?>

    </head>

        
    <body>
		<div class="content-container">
			<main>
				<div class="photo-column">
					<!-- Print Image -->
					<img src="<?php echo $product['Image']; ?>" width="600" height="480">

				</div>
			</main>
			
			<aside>
				<div class="product-info">
					<!-- Print Name and Product Description -->
					<h1><?php echo $product['Name']; ?></h1>
					<p><?php echo $product['ProductDescription']; ?></p>
				</div>

				<div class="price-checkout">
					<!-- Print Price -->
					<h2>$<?php echo $product['Price']; ?></h2>
					<!-- Increases Quantity by 1 and brings user back to home page -->
					<form action="AddToCart.php" method="post">
						<button type = "submit" class="checkout-button">Add to Cart</button>
						<!-- gives three inputs to the AddToCart.php page -->
                    	<input type="hidden" name="ProductID" value="<?php echo $product['ProductID'] ?>">
						<input type="hidden" name="UserID" value="<?php echo $UserID ?>">
						<input type="hidden" name="Quantity" value="1">
					</form>
					
				</div>
			</aside>
		</div>
		
    </body>

	<footer>
		<p>@ 2022 THE BOOKSTORE</p>	
	</footer>
</html>