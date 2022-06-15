
<?php
    require('database.php');
    session_start();
        
	if(!isset($_SESSION['Username'])){
        header('Location: 1Login.php');
	} else {
		include("header.php");
	}

?>

<!DOCTYPE html>
<hmtl>
	<head>
        <title>Profile</title>
        <link rel="stylesheet" href="search.css">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="main.css">
		<script>
            // Java script to check user input in registration
            function required(){
                var name = document.forms["update"]["name"].value;
                var email = document.forms["update"]["email"].value;
                var pwd = document.forms["update"]["pwd"].value;
                var confirm = document.forms["update"]["confirm"].value;
                
                // Check if all inputs fields, if no error submit forum
                if (name_confirm(name)) {
                    if (email_confirm(email)) {
                        if (pwd_confirm(pwd)) {
                            if (conf_confirm(confirm, pwd)) {
                                document.getElementById("update").submit();
                            }
                        }
                    }
                }
                return false;
            }

            // Check if username is empty
            function name_confirm(name){
                var name_len = name.length;
                if (name_len == 0) {
                    alert("Username should not be empty");
                    name.focus();
                    return false;
                } else {
                    return true;
                }
            }

            // Check if email is empty
            function email_confirm(email){
                var email_len = email.length;
                if (email_len == 0) {
                    alert("Email should not be empty");
                    email.focus();
                    return false;
                } else {
                    return true;
                }
            }

            // Check if password is empty
            function pwd_confirm(pwd){
                var pwd_len = pwd.length;
                if (pwd_len == 0){
                    alert("Password should not be empty")
                    pwd.focus();
                    return false;
                } else {
                    return true;
                }
            }

            // Check if passwords match
            function conf_confirm(confirm, pwd){
                if(confirm.match(pwd)){
                    return true;
                } else {
                    alert("Passwords do not match")
                    confirm.focus();
                    return false;
                }
            }
        </script>
    </head>
	
	<body>
		<div align="center">
            <?php $currentUser = $_SESSION['Username'];?>
            <br><h2>Welcome <?php echo ucfirst($currentUser); ?></h2>
            
            <form action="updateProfile.php"  onsubmit="return required()" method="POST" enctype="multipart/form-data">
                <?php
                    $con = mysqli_connect("localhost","root","","bookstore1.0");
                    $sql = "SELECT * FROM user WHERE Username ='$currentUser'";
                    $gotResuslts = mysqli_query($con, $sql);

                    if($gotResuslts){
                        if(mysqli_num_rows($gotResuslts)>0){
                            while($row = mysqli_fetch_array($gotResuslts)){
                                $UserID = $row['UserID'];
                                ?>
                                    <label>USERNAME:</label><br>
                                    <input type="text" name="Username" value="<?php echo $row['Username']; ?>"> <br><br>
                                    <label>EMAIL:</label><br>
                                    <input type="text" name="Email" value="<?php echo $row['Email']; ?>">
                                    <br><br><br>
                                    <label>ENTER NEW PASSWORD:</label><br>
                                    <input type="password" name="pwd">
                                    <br><br><br>
                                    <label>REENTER NEW PASSWORD:</label><br>
                                    <input type="password" name="confirm">
                                    <br><br>				
                                    <button type ="submit" name="submit" class="checkout-button">UPDATE PROFILE</button>
                                <?php
                            } // while
                        } // if
                    } // if
                ?>
            </form>	
		</div>
	</body>
</html>
       
