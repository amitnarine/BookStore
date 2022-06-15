<?php
    require('database.php');
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="main.css">
        <script>
            // Java script to check user input in registration
            function required(){
                var name = document.forms["register"]["name"].value;
                var email = document.forms["register"]["email"].value;
                var pwd = document.forms["register"]["pwd"].value;
                var confirm = document.forms["register"]["confirm"].value;
                var birthdate = document.forms["register"]["birthdate"].value;
                var address = document.forms["register"]["address"].value;
                
                // Check if all inputs fields, if no error submit forum
                if (name_confirm(name)) {
                    if (email_confirm(email)) {
                        if (pwd_confirm(pwd)) {
                            if(birth_confirm(birthdate)) {
                                if(address_confirm(address)){
                                    if (conf_confirm(confirm, pwd)) {
                                        document.getElementById("register").submit();
                                    }
                            }   }
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

            // Check if birthdate is empty
            function birth_confirm(birthdate){
                var birth_len = birthdate.length;
                if (birth_len == 0) {
                    alert("Birthdate should not be empty");
                    birth.focus();
                    return false;
                } else {
                    return true;
                }
            }

            // Check if address is empty
            function address_confirm(address){
                var address_len = address.length;
                if (address_len == 0) {
                    alert("Address should not be empty");
                    address.focus();
                    return false;
                } else {
                    return true;
                }
            }
        </script>
    </head>

    <div class="header-bar">
        <div class="header-homepage">
            <h1>WELCOME TO THE BOOKSTORE</h1>
        </div>
    </div>

    <body>
        <form name = "register" onsubmit="return required()" action="reg.php" method="post">
            <!--New User-->
            <div class="reg-body"> 
                <h1>Registration Form</h1>
                <p>Please fill in the details to create an account with us.</p>
                <hr>
                <!--USERNAME-->
                <label for="Name"><b>Username:</b></label>
                    <input type="text" placeholder="Username" name="name">
                    <br><br>
                <!--EMAIL-->
                <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Enter Email" name="email">
                    <br><br>
                <!--Birthdate-->
                <label for="Birthdate"><b>Birthdate</b></label>
                    <input type="birthdate" placeholder="MM/DD/YEAR" name="birthdate">
                    <br><br>
                <!--Address-->
                <label for="address"><b>Address</b></label>
                    <input type="address" placeholder="Ex: 123 Baxter St" name="address">
                    <br><br>
                <!--PASSWORD-->
                <label for="pwd"><b>Password</b></label>
                    <input type="password" placeholder="Password" name="pwd">
                    <br><br>
                <label for="confirm"><b>Confirm Password</b></label>
                    <input type="password" placeholder="Confirm Password" name="confirm">
                    <br><br>
                <hr>
                <button type="submit" class="checkout-button">Register</button>

                <p>Already have an account? <a href="1Login.php">Sign in</a>.</p>
            </div>

            <!-- If username or email is already in use -->
            <?php
                if(isset($_SESSION["error"])){
                    $error = $_SESSION["error"];
                    echo "<span>$error</span>";
                }
            ?>
        </form>
    </body>
    <footer>
		<p>@ 2022 THE BOOKSTORE</p>	
	</footer>
</html>
<?php
    unset($_SESSION["error"]);
?>