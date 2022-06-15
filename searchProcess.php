<?php
require("database.php");
session_start();
include("header.php");

$search = $_POST['search'];
$servername = "localhost";
$username = "root";
$password = "";
$db = "bookstore1.0";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = " SELECT * FROM `product` WHERE Name LIKE '%$search%' OR Author LIKE '%$search%' OR ISBN LIKE '%$search%' OR Subject LIKE '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){?> 
    <title>Search Results</title>
    <br><br><div align="center"><h2>Search Results</h2></div> <?php
while($row = $result->fetch_assoc() ){

?>  
    <div class="user-cards">
        <div class="card">
            <div class="image-container">
                <form action="4Products.php" method="post">
                            <!-- print out image -->
                            <input type="image" src="<?php echo $row['Image']; ?>" width="150" height="150">
                            <input type="hidden" name="ProductID" value="<?php echo $product['ProductID']; ?>">
                            <input type="hidden" name="UserID" value="<?php echo $UserID; ?>">
                </form>            
            </div>

            <div class="header">
                <p><b><?php echo $row['Name']; ?></b></p>
            </div>
            <div class="product-container">
                <p><b><?php echo $row['Author']; ?></b></p>
                <!-- <input type="hidden" <?php echo $product['ISBN'];?>> -->
                <p><b><?php echo $row['Price']; ?></b></p> 
            </div>
        </div>
    </div><?php
}
} else {
	echo "<br><br><br><div align='center'><h2>There are no search results.</h2></div>";
}

$conn->close();
?>

<html>
    <head>
        <link rel="stylesheet" href="search.css">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="main.css">
    </head>
</html>
