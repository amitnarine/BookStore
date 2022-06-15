<?php
include('database.php');
$iduser=$_POST['UserID'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$address=$_POST['address'];
$birthdate=$_POST['birthdate'];
$type=$_POST['type'];


$query="UPDATE user SET Username = '$username', Email = '$email', Birthdate = '$birthdate', Address = '$address', Password = '$password', type = '$type' WHERE UserID = '$iduser'";
$db->exec($query);

include('adminPage.php');