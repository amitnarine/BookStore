<?php
	include('database.php');
	$query='SELECT * FROM user';
	$users=$db->query($query);
?>
<head>
	<title>Edit User</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
	<main>
		<h2>Edit a User</h2>
		<form action="editUser2.php" method="post" class="post">	
		<label> User to Edit:</label>
		<select name ="UserID">
		<?php foreach($users as $user):?>
		<option value = "<?php echo $user['UserID']?>"> <?php echo $user['Username']?></option>
		<?php endforeach;?>
		</select><br>
	
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
		<input type="submit" id="button" value="Edit User">
		</form>
		<p><u><a href="adminPage.php">Back to List</a></u></p>

	</main>
</body>
<footer>
<p>@ 2022 THE BOOKSTORE</p>	
</footer>