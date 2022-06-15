<?php
    require('database.php');
    session_start();

	$var3 = $_SESSION["id"]; 

	
	//print_r($var3);

	include('database.php');
	//$query= 'SELECT * FROM product WHERE Author = '$var3'';
	$query= " SELECT * FROM user WHERE UserID = '$var3' ";
	$vendors= $db->query($query);

	foreach ($vendors as $vendor){
		$username = $vendor['Username'];
	}

	//$query= 'SELECT * FROM product';
	$query= " SELECT * FROM product WHERE Author = '$username' ";
	$books= $db->query($query);
	//print_r($username);
	$_SESSION["name"] = $username;
	$_SESSION["vendorID"] = $var3;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Owner Page</title>
        <link rel="stylesheet" href="main.css">
    </head>

    <div class="header-bar">
		<div class="header-homepage">
			<h1>Vendor Page</h1></a>
		</div>
		<div class="header-right">
			<div class="flex1">
                <a href="signout.php"><p>SIGN OUT</p></a>
			</div>
		</div>
	</div>


    <body>
    <section id="edit">
	<p><a class="nav" href="addBookVendor.php">Add a Book</a></p>
	<p><a class="nav" href="editBookVendor.php">Edit a Book</a></p>
	<p>

	<form method="POST" action="pullReportVendor.php">
    <input type="submit" value="Pull Report"/> 
  </form>

	
	</p>
	
</section>
<aside>
<h2>Book List</h2>
<table>
		<tr>
			<th id="top">Name</th>
			<th id="top">Author</th>
            <th id="top">ISBN</th>
			<th id="top">Price</th>
			<th></th>
            
		<?php foreach($books as $book):?>
			<tr>
			<td><?php echo $book['Name']?></td>
			<td><?php echo $book['Author']?></td>
			<td><?php echo $book['ISBN']?></td>
			<td><?php echo $book['Price']?></td>
			<td class="button"><form action="deleteBookVendor.php" method ="post">
			<input type ="hidden" name="product_id" value = <?php echo $book['ProductID']?>>
			<input type ="submit" value ="Delete">
		</form></td>
			</tr>
		<?php endforeach;?>
        
	</table>


    </body>
    <footer>
		<p>@ 2022 THE BOOKSTORE</p>	
	</footer>
</html>
<?php
    unset($_SESSION["error"]);
?>