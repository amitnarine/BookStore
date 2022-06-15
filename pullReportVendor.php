<?php
	include('database.php');

    session_start();
    $var3 = $_SESSION["name"];
    $vendorID = $_SESSION["vendorID"];

    //print_r($var3);
    //print_r($vendorID);
    $query= " SELECT * FROM product WHERE Author = '$var3' ";
	$books=$db->query($query);


    #Total Number of products
	$query = "SELECT * FROM product";
	$totalProducts = $db->query($query);
	$totalProducts = $totalProducts->rowCount();


    #Total Number of products where it is authors
    $query= " SELECT * FROM product WHERE Author = '$var3' ";
	$totalProductsVendor = $db->query($query);
	$totalProductsVendor = $totalProductsVendor->rowCount();


       #Total Number of users
	$query = "SELECT * FROM user";
	$totalUsers = $db->query($query);
	$totalUsers = $totalUsers->rowCount();

      #Total Number of vendors
	$query = "SELECT * FROM user WHERE type = 'vendor'";
	$totalVendors = $db->query($query);
	$totalVendors = $totalVendors->rowCount();

          #Total Number of order
	$query = "SELECT * FROM `order`";
	$totalOrders = $db->query($query);
	$totalOrders = $totalOrders->rowCount();


    #Total Sum of orders
	$query = "SELECT * FROM `order`";
	$orderSums = $db->query($query);
	
    $total = 0;
    foreach($orderSums as $orderSum) {
		$total = $total + $orderSum['Total'];
    }



    #Total Number of Ordered Items
	$query = "SELECT * FROM `order`";
	$orderedItems = $db->query($query);
	
    $totalItems = 0;
    foreach($orderedItems as $orderItem) {
		$totalItems = $totalItems + $orderItem['OrderItems'];
    }



        #Total Number of reserved Items
	$query = "SELECT * FROM reserved";
	$totalReserved = $db->query($query);
	$totalReserved = $totalReserved->rowCount();

     #Total Number of reserved Items from Vendor
	$query = "SELECT * FROM reserved WHERE UserID = '$vendorID' ";
	$reserveVendor = $db->query($query);
	$reserveVendor = $reserveVendor->rowCount();


    #total Number of Promos
    $query = "SELECT * FROM promo";
	$totalPromo = $db->query($query);
	$totalPromo = $totalPromo->rowCount();


     #Total Number of customers
     $query = "SELECT * FROM user WHERE type = 'user'";
	$totalCustomer = $db->query($query);
	$totalCustomer = $totalCustomer->rowCount();

?>
<head>
	<title>Edit Book</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
	<main>
	<aside id="asidefour">
    
	<h2>Reports</h2>
	<table id = "report">
		<tr>
			<th id="top">Total Number of Books</th>
			<th id="top">Total Number of Books by the Vendor</th>
			<th id="top">Total Number of Users</th>
            <th id="top">Total Number of Vendors</th>
            <th id="top">Total Number of Orders</th>
            <th id="top">Sum of Orders</th>
            
		</tr>
		<tr>
			<td id="numbers"> <?php echo $totalProducts?> </td>
			<td id="numbers"><?php echo $totalProductsVendor?></td>
			<td id="numbers"><?php echo $totalUsers?></td>
            <td id="numbers"><?php echo $totalVendors?></td>
            <td id="numbers"><?php echo $totalOrders?></td>
            <td id="numbers"><?php echo $total?></td>
            
		</tr>
		<tr>
        <th id="top">Total Number of Ordered Items</th>
        <th id="top">Total Number of Reserved Items</th>
        <th id="top">Total Number of Reserved Items from Vendor</th>
        <th id="top">Total Number of Promotions</th>
        <th id="top">Total Number of Customers</th>
		</tr>
		<tr>
        <td id="numbers"><?php echo $totalItems?></td>
        <td id="numbers"><?php echo $totalReserved?></td>
		<td id="numbers"><?php echo $reserveVendor?></td>
        <td id="numbers"><?php echo $totalPromo?></td>
        <td id="numbers"><?php echo $totalCustomer?></td>
		</tr>	
	</table>


<p><u><a href="ownerPage.php">Back to List</a></u></p>

</aside>

	</main>
</body>
<footer>
<p>@ 2022 THE BOOKSTORE</p>	
</footer>