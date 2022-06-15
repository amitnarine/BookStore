<?php
	include('database.php');
	$query= 'SELECT * FROM `order`';
	$orders=$db->query($query);
?>
<head>
	<title>Edit a Order</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
	<main>
		<h2>Edit an Order</h2>
		<form action="editOrder2.php" method="post" class="post">	
		<label> Order to Edit:</label>
		<select name ="OrderNum">
		<?php foreach($orders as $order):?>
		<option value = "<?php echo $order['OrderNum']?>"> <?php echo $order['OrderNum']?></option>
		<?php endforeach;?>
		</select><br>
	
        <label> Order Date:</label>
		<input type="text" name="orderdate"><br>
		<label> Order Items:</label>
		<input type="text" name="orderitems"><br>
        <label> Total:</label>
		<input type="text" name="total"><br>
		<input type="submit" id="button" value="Edit Order">
		</form>

		<p><u><a href="adminPage.php">Back to List</a></u></p>

	</main>
</body>
<footer>
<p>@ 2022 THE BOOKSTORE</p>	
</footer>