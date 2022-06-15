<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
	<main>
		<h2>Create a Book</h2>
		<form action="addBook2Vendor.php" method="post" class="post">	

		<label> Name:</label>
		<input type="text" name="name"><br>
		<label> Author:</label>
		<input type="text" name="author"><br>
		<label> ISBN:</label>
		<input type="text" name="ISBN"><br>
		<label> Price:</label>
		<input type="text" name="price"><br>
        <label> Image:</label>
		<input type="text" name="image"><br>
        <label> ProductDescription:</label>
		<input type="text" name="ProductDescription"><br>

		<label> Category:</label>
		<input type="text" name="category"><br>
		
		<input type="submit" id="button" value="Add Book">
		</form>

		<p><a href="ownerPage.php">Back to List</a></p>

	</main>
</body>
<footer>
<p>@ 2022 THE BOOKSTORE</p>
</footer>