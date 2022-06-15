<?php
    require('database.php');
    session_start();
    if(!isset($_SESSION['Username'])){
        header('Location: 1Login.php');
	} else {
		include("header.php");
	}

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bookstore1.0";

    $conn = new mysqli($servername, $username, $password, $database);

    $queryAllProducts = 'SELECT * FROM product ORDER BY ProductID';
    $result = $conn->query($queryAllProducts);
    // Get the total number of products
    $total_products = mysqli_num_rows($result);
    
    $ProductID = filter_input(INPUT_GET, 'ProductID',FILTER_VALIDATE_INT);
    if ($ProductID == NULL || $ProductID ==  FALSE) {
    $ProductID = 1;
    }

    // Query product list
    $queryAllProducts = 'SELECT * FROM product ORDER BY ProductID';
    $statement2 = $db -> prepare($queryAllProducts);
    $statement2 -> execute();
    $products = $statement2 -> fetchAll();
    $statement2 -> closeCursor();

    // Obtain user if logged in
    if(isset($_SESSION['Username'])){
    $query1="SELECT * FROM user WHERE Username ='".$_SESSION['Username']."'";
    $statement1 = $db -> prepare($query1);
	$statement1 -> execute();
    $user = $statement1 -> fetch();
    $UserID = $user['UserID'];
    $statement1 -> closeCursor();
    
    $query2 = 'SELECT * FROM user WHERE UserID = :UserID';
	$statement3 = $db -> prepare($query2);
	$statement3 -> bindValue('UserID', $UserID);
	$success = $statement3 -> execute();
	$user = $statement3 -> fetch();
	$statement3 -> closeCursor();
    }

?>

<!DOCTYPE html>
<hmtl>
    <head>
        <title>Products</title>
        <link rel="stylesheet" href="search.css">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="main.css">
    </head>

    
    <body> 
    <div align="center">
            <h2>Products</h2>
            <p><?=$total_products?> Products</p>
        </div>
        
        <div class="user-cards" data-user-cards-container>
            <?php foreach ($products as $product) : ?>
                <div class="card">
                    <div class="image-container">
                        <form action="4Products.php" method="post">
                            <!-- print out image -->
                            <input type="image" src="<?php echo $product['Image']; ?>" width="150" height="150">
                            <input type="hidden" name="ProductID" value="<?php echo $product['ProductID']; ?>">
                            <input type="hidden" name="UserID" value="<?php echo $UserID; ?>">
                        </form>
                    </div>
                    
                    <!-- print out name and price -->
                    <div class="header">
                        <p><b><?php echo $product['Name']; ?></b></p>
                    </div>
                    <div class="product-container">
                        <p><b><?php echo $product['Author']; ?></b></p>
                        <b><input type="hidden" <?php echo $product['ISBN']; ?>></b>
                        <p><b><?php echo $product['Price']; ?></b></p> 
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </body>

    <footer>
		<p>@ 2022 THE BOOKSTORE</p>	
	</footer>
</html>