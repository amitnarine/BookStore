<?php
    require('database.php');
    session_start();

    // if user is logged in
    if (isset($_SESSION['Username'])) {
    // get user id
    $query1="SELECT * FROM user WHERE Username = '".$_SESSION['Username']."'";
    $statement1 = $db -> prepare($query1);
	$statement1 -> execute();
    $users = $statement1 -> fetch();
    $UserID = $users['UserID'];
    $statement1 -> closeCursor();
    
    // get correct cart of the user logged in
    $ProductID = filter_input(INPUT_POST, 'ProductID');
	$query = "SELECT P.ProductID, P.Name, P.Price, C.Quantity FROM Product P INNER JOIN Cart C ON P.ProductID = C.ProductID WHERE C.UserID = '".$UserID."' ORDER BY P.ProductID;";
	$statement = $db -> prepare($query);
	$success = $statement -> execute();
	$products = $statement -> fetchAll(PDO::FETCH_ASSOC);
	$statement -> closeCursor();
    
    // variables for cart
    $totalquantity = 0;
    $totalamount = 0;
	$todaysDate = date('Y/m/d');
	// 2d array for products
	$rID = array();
	$rName = array();
	$rQuantity = array();
	$rDate = array();
	// data array key - 0:ID 1:Name 2:Quantity 3:Date
	$data = array($rID,$rName,$rQuantity,$rDate);
    } else {
        // if user is not logged in return to login
        header('location: 1Login.php');
    }
?>

<!DOCTYPE html>
<hmtl>
<head>
        <title>ShoppingCart</title>
        <link rel="stylesheet" href="main.css">
    </head>

    <?php include("header.php"); ?>

    <body>
        <div class="cart-body">
            <h2>YOUR CART</h2>
            <table>
                <tr>
                    <div class="table-stuff">
                        <th><b><p>Name</p><b></th>
                        <th><b><p>Quantity</p><b></th>
                        <th><b><p>Price</p><b></th>
                        <th><b><p>Total</p><b></th>
                    </div>
                </tr>
                <form action="removeCart.php" method="post">
                    <?php foreach ($products as $product) : ?>
                        <?php
                        // total number of items
                        $totalquantity = $totalquantity + $product['Quantity'];

                        // total cost
                        $totalamount = $totalamount + $product['Price'] * $product['Quantity'];
                        ?>
                        <tr>
                            <td><p><?php echo $product['Name']; ?></p></td>
                            <td><p><?php echo $product['Quantity']; ?></p></td>
                            <td><p>$<?php echo $product['Price']; ?></p></td>
                            <td><p>$<?php echo $product['Price'] * $product['Quantity']; ?></p></td>
                            <td>
                            <!-- Button to remove item from cart-->
                            <button type = "submit" class="remove-button">Remove</button>
                                <input type="hidden" name="ProductID" value="<?php echo $product['ProductID']; ?>">
                                <input type="hidden" name="UserID" value="<?php echo $UserID; ?>">
                            </td>
                        </tr>
                        
                    <?php endforeach; ?>
                    <tr>
                        <!-- Print total -->
                        <td><b><p>Total</b></p></td>
                        <td><b><p><?php echo $totalquantity ?></b></p></td>
                        <td></td>
                        <td><b><p>$<?php echo $totalamount ?></b></p></td>
                    </tr>
                </form>
            </table>
            <form action="5ShoppingCart.php" method="post">
                    <button type = "submit" class="promocode">Promo Code</button>
                    <input type="text" name="promo" placeholder="promo"><br>
                    <?php
                        $promo = filter_input(INPUT_POST, 'promo');
                        if($promo == "10OFF") {
                            $totalamount = $totalamount*0.9;               
                        }
                        if($promo == "20OFF") {
                            $totalamount = $totalamount*0.8;         
                        }
                    ?>
            </form>
            <tr>
                        <!-- Print total -->
                        <td><b><p>New Total</b></p></td>
                        <td></td>
                        <td><b><p>$<?php echo $totalamount ?></b></p></td>
                    </tr>
            <?php
                        $_SESSION["total_items"] = $totalquantity;
                        $_SESSION["total_amount"] = $totalamount;
                    ?>
			<form action="reserve.php" method="post">
				<?php foreach ($products as $product) : ?>
                    <?php
						array_push($data[0],$product['ProductID']);
						array_push($data[1],$product['Name']);
						array_push($data[2],$product['Quantity']);
						array_push($data[3],$todaysDate);
					?>
                <?php endforeach; ?>
				<?php $_SESSION['data'] = $data; ?>
                <button type = "submit" class="checkout-button">Reserve(In-Store 5Days)</button><br></br>
            </form>
            <form action="6CheckOut.php" method="post">
                <button type = "submit" class="checkout-button">Checkout</button>
            </form>
        </div>
    </body>

    <footer>
		<p>@ 2022 THE BOOKSTORE</p>	
	</footer>
</html>