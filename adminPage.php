<?php
    require('database.php');
    session_start();


	include('database.php');
	$query= 'SELECT * FROM product';
	$books= $db->query($query);
	$query= 'SELECT * FROM user';
	$users=$db->query($query);

	
	$query= 'SELECT * FROM `order`';
	$orders=$db->query($query);
	

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
        <link rel="stylesheet" href="main.css">
    </head>

    <div class="header-bar">
		<div class="header-homepage">
			<h1>Admin's page</h1></a>
		</div>
		<div class="header-right">
			<div class="flex1">
                <a href="signout.php"><p>SIGN OUT</p></a>
			</div>
		</div>
	</div>


    <body>
    <section id="edit">
	<p><a class="nav" href="addBook.php">Add a Book</a></p>
	<p><a class="nav" href="editBook.php">Edit a Book</a></p>
	<p><a class="nav" href="addUser.php">Add a User</a></p>
	<p><a class="nav" href="editUser.php">Edit a User</a></p>
	<p><a class="nav" href="addOrder.php">Add a Order</a></p>
	<p><a class="nav" href="editOrder.php">Edit a Order</a></p>
	
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
			<td class="button"><form action="deleteBook.php" method ="post">
			<input type ="hidden" name="product_id" value = <?php echo $book['ProductID']?>>
			<input type ="submit" value ="Delete">
		</form></td>
			</tr>
		<?php endforeach;?>
        
	</table>
</aside>
<aside >
<h2>Users</h2>
<table>
		<tr>
			<th id="top">Username</th>
            <th id="top">Email</th>
			<th id="top">Password</th>
			<th></th>
            
		<?php foreach($users as $user):?>
			<tr>
			<td><?php echo $user['Username']?></td>
			<td><?php echo $user['Email']?></td>
			<td><?php echo $user['Password']?></td>
			<td class="button"><form action="deleteUser.php" method ="post">
			<input type ="hidden" name="user_id" value = <?php echo $user['UserID']?>>
			<input type ="submit" value ="Delete">
		</form></td>
			</tr>
		<?php endforeach;?>
	</table>
</aside>

<aside id="asidethree">
<h2>Orders</h2>
<table>
		<tr>
			<th id="top">OrderNum</th>
            <th id="top">OrderDate</th>
			<th id="top">OrderItems</th>
			<th id="top">Total</th>
			<th></th>
            
		<?php foreach($orders as $order):?>
			<tr>
			<td><?php echo $order['OrderNum']?></td>
			<td><?php echo $order['OrderDate']?></td>
			<td><?php echo $order['OrderItems']?></td>
			<td><?php echo $order['Total']?></td>
			<td class="button"><form action="deleteOrder.php" method ="post">
			<input type ="hidden" name="ordernum" value = <?php echo $order['OrderNum']?>>
			<input type ="submit" value ="Delete">
		</form></td>
			</tr>
		<?php endforeach;?>
	</table>
</aside>

    </body>
    <footer>
		<p>@ 2022 THE BOOKSTORE</p>	
	</footer>
</html>
<?php
    unset($_SESSION["error"]);
?>