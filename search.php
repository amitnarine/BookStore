<?php
    require('database.php');

    session_start();
    
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
        <title>Search</title>
        <link rel="stylesheet" href="search.css">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>

    <?php include('header.php'); ?>
    
    <body> 
 
        <div class="search-wrapper">
        <form action="searchProcess.php" method="POST" class="search-wrapper">
            <br><label for="search">Search Books</label><br>
            <input type="text" name="search" id="live_search" placeholder="Search by Title, Author, Subject or ISBN">
            <input type="submit" value="SEARCH"/>

        </form>
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

                    <div class="header">
                        <p><b><?php echo $product['Name']; ?></b></p>
                    </div>

                    <div class="product-container">
                        <p><b><?php echo $product['Author']; ?></b></p>
                        <p><b><?php echo $product['Price']; ?></b></p> 
                        <b><input type="hidden" <?php echo $product['ISBN']; ?>></b>
                        
                    </div>
                </div>
            <?php endforeach; ?>
        </div>



    </body>

    <footer>
		<p>@ 2022 THE BOOKSTORE</p>	
	</footer>
</html>

