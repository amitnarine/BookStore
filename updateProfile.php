<?php
    require('database.php');
    session_start();

    if(!isset($_SESSION['Username'])){
        header('location: 1Login.php');
    } else {
        include("header.php");
    }
    $currentUser = $_SESSION['Username'];
    $con = mysqli_connect("localhost","root","","bookstore1.0");
    $sql = "SELECT * FROM user WHERE Username ='$currentUser'";
    $gotResuslts = mysqli_query($con, $sql);

	if($gotResuslts){
		if(mysqli_num_rows($gotResuslts)>0){
			while($row = mysqli_fetch_array($gotResuslts)){
                $UserID = $row['UserID'];
            } // while
        } // if
    } // if

    if(isset($_POST['submit'])){
        $fullname = $_POST['Username'];
        $email = $_POST['Email'];
        $password = $_POST['pwd'];
        $query = "UPDATE user SET Username = '$fullname', Email = '$email', Password = $password WHERE UserID = '$UserID'";
        $statement = $db -> prepare($query);
        $statement -> bindValue('Username', $fullname);
        $statement -> bindValue('Email', $email);
        $statement -> bindValue('Password', $password);
        $result = mysqli_query($con, $query);
    } // if
   
?>	


<!DOCTYPE html>
<hmtl>
    <head>
        <title>Updated Profile</title>
    </head>
<body> 
    <?php
        if ($result) {?>
            <script type="text/javascript">
                alert("Profile updated successfully");
                window.location = "profile.php";
            </script><?php
            //header("location: profile.php");
        } else {?>
            <script type="text/javascript">
                alert("Profile did not successfully update");
                window.location = "profile.php";
            </script><?php
            //header("location: profile.php");
        } // if 
        //header("");
    ?>
</body>

</html>
