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
    $data = $_SESSION['data'];
	//print_r($data);

	while(!empty($data[0])){
		//print_r($data);
		$resID = array_pop($data[0]);
		$resName = array_pop($data[1]);
		$resQuantity = array_pop($data[2]);
		$resDate = array_pop($data[3]);
		$query2 = "INSERT INTO reserved (UserID,ProductID,Name,Quantity,DateAdded) VALUES ('$UserID','$resID','$resName','$resQuantity','$resDate')";
		$statement2 = $db -> prepare($query2);
	    $statement2 -> execute();
	}
		$query3 = "DELETE FROM cart WHERE UserID = '$UserID'";
		$statement3 = $db -> prepare($query3);
	    $statement3 -> execute();
		// set event if not already set to auto remove reserved items after 5 days
		$query4 = "CREATE EVENT IF NOT EXISTS Delete_Event
		ON SCHEDULE EVERY 1 HOUR 
		ON COMPLETION PRESERVE 
		ENABLE 
		DO 
		DELETE from reserved WHERE DateAdded < DATE_SUB(NOW(), INTERVAL 5 DAY);";
		$statement4 = $db -> prepare($query4);
	    $statement4 -> execute();
		
		
	}
?>



<!DOCTYPE html>
<hmtl>
<head>
        <title>ShoppingCart</title>
        <link rel="stylesheet" href="main.css">
    </head>

	<?php include('header.php'); ?>

    <body>
        <div class="cart-body">
            <h2>Thank you for choosing us!</h2>
			<h3>Your items will be held for 5 days In-Store pickup</h3>
         
        </div>
    </body>

    <footer>
		<p>@ 2022 THE BOOKSTORE</p>	
	</footer>
</html>