<?php
	include('database.php');
	$query='SELECT * FROM product';
	$books=$db->query($query);
?>
<head>
	<title>Edit Book</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
	<main>
		<h2>Edit a book</h2>
		<form action="editBook2.php" method="post" class="post">	
		<label> Book to Edit:</label>
		<select name ="ProductID">
		<?php foreach($books as $book):?>
		<option value = "<?php echo $book['ProductID']?>"> <?php echo $book['Name']?></option>
		<?php endforeach;?>
		</select><br>
	
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

		
		<input type="submit" id="button" value="Edit Book">
		</form>

		<p><u><a href="adminPage.php">Back to List</a></u></p>

	</main>
</body>
<footer>
<p>@ 2022 THE BOOKSTORE</p>	
</footer>