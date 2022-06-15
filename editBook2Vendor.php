<?php
include('database.php');
$idbook=$_POST['ProductID'];
$name=$_POST['name'];
$author=$_POST['author'];
$ISBN=$_POST['ISBN'];
$price=$_POST['price'];
$image=$_POST['image'];
$ProductDescription=$_POST['ProductDescription'];
$category=$_POST['category'];


$query="UPDATE product SET Name = '$name', Author = '$author', ISBN = '$ISBN', Image = '$image' , Price = '$price', ProductDescription = '$ProductDescription', Subject = '$category'  WHERE ProductID = '$idbook'";
$db->exec($query);

include('ownerPage.php');

?>