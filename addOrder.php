<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
	<main>
		<h2>Create an Order</h2>
		<form action="addOrder2.php" method="post" class="post">	

		
		<label> Order Date:</label>
		<input type="text" name="orderdate"><br>
		<label> Order Items:</label>
		<input type="text" name="orderitems"><br>
        <label> Total:</label>
		<input type="text" name="total"><br>
		<input type="submit" id="button" value="Add Order">
		</form>

		<p><a href="adminPage.php">Back to List</a></p>

	</main>
</body>
<footer>
<p>@ 2022 THE BOOKSTORE</p>
</footer>