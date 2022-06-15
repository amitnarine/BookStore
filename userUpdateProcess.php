<?php
require("database.php");
session_start();
// Report all PHP errors
error_reporting(E_ALL);

$con = mysqli_connect("localhost","root","","bookstore1.0");

if(isset($_POST['update'])){

         $userNewName  =    $_POST['UserName'];
         $userNewEmail =    $_POST['Email'];
         $userNewPassword =    $_POST['Password'];

        if(!empty($userNewName) && !empty($userNewEmail) && !empty($userNewPassword)){                
            $sql = "UPDATE users SET Username = '$userNewName', Email ='$userNewEmail', Password = '$userNewPassword' WHERE Username = '$loggedInUser'";

            $results = mysqli_query($con,$sql);

            header('Location: profile.php?success=userUpdated');
            exit;
        }else{
            header('Location: profile.php?error=emptyNameAndEmail');
            exit;
        }
}

?>