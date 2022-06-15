<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
	<main>
		<h2>Create a User</h2>
		<form action="addUser2.php" method="post" class="post">	

		<label> Username:</label>
		<input type="text" name="username"><br>
		<label> Email:</label>
		<input type="text" name="email"><br>
		<label> Birthdate:</label>
		<input type="text" name="birthdate"><br>
		<label> Address:</label>
		<input type="text" name="address"><br>
		<label> Password:</label>
		<input type="text" name="password"><br>
		<label> Type:</label>
		<input type="text" name="type"><br>
		<input type="submit" id="button" value="Add User">
		</form>

		<p><a href="adminPage.php">Back to List</a></p>

	</main>
</body>
<footer>
<p>@ 2022 THE BOOKSTORE</p>
</footer>