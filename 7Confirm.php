<?php
  include('database.php');
  session_start();

  if( isset($_SESSION['Username']) ){
    $username = $_SESSION['Username'];
    $totalquantity = $_SESSION["total_items"];
    $totalamount = $_SESSION["total_amount"];

    //print_r($totalquantity);
    //print_r($totalamount);

    // Get userid
    $user_query = "SELECT * FROM user WHERE Username = :username";
    $user_stmt = $db->prepare($user_query);
    $user_stmt->bindValue(':username', $username);
    $user_stmt->execute();
    $user = $user_stmt->fetch();
    $user_stmt -> closeCursor();

    // Delete items from the cart
    $cart_del_query = "DELETE FROM cart WHERE UserID = :userid";
    $cart_del_stmt = $db->prepare($cart_del_query);
    $cart_del_stmt->bindValue(':userid', $user['UserID']);
    $cart_del_stmt->execute();
    $cart_del_stmt->closeCursor();

  } else{
    // if user is not logged in return to login
    header('location: 1Login.php');
  }

  $email_customer = "itsteevo@gmail.com";
  $headers = "From: bookstore@gmail.com";
  $subject = "Bookstore Order Confirmed!";
  $message = "Your order is confirmed";
  


mail($email_customer, $subject, $message, $headers);
  //order date
  $order_date= date('Y/m/d');
  
  $query="INSERT INTO `order`
        (OrderDate, OrderItems, Total) VALUES 
  ('$order_date', '$totalquantity', '$totalamount')";
  $db->exec($query);  
?>

<!DOCTYPE html>
<hmtl>
    <head>
        <title>Order Confirm</title>
        <link rel="stylesheet" href="main.css">
    </head>

    <?php include("header.php"); ?>
    
    <body>
    <div class="confirm-container">
        <h2 style="text-align:center;">Order Confirmed</h2>
        <h2 style="text-align:center;">Confirmation Email should arrive shortly!</h2>
    </div>
    </body>

    <footer>
		<p>@ 2022 THE BOOKSTORE</p>	
	</footer>
</html>