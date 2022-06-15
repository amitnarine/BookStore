<?php
    require('database.php');
    session_start();
    $code = filter_input(INPUT_POST, 'Code');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registration Verification</title>
        <link rel="stylesheet" href="main.css">
        <script>
            // Java script to check user input in registration
            function required(){
                var Code = document.forms["codeMatch"]["Code"].value;

                if (codeConfirm(Code)) {
                    document.getElementById("codeMatch").submit();
                }
                return false;
            }

            // Check if code matches
            function codeConfirm(Code){
                if(Code.match('123456789')){
                    return true;
                } else {
                    alert("Code does not match");
                    confirm.focus();
                    return false;
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
        <form name = "codeMatch" onsubmit="return required()" action="codeCheck.php" method="post">
            <div class="reg-body"> 
                <h1>Registration Verification</h1>
                <p>Please enter the code that was sent to you by Email.</p>
                <hr>
                <label for="Code"><b>Code:</b></label>
                    <input type="text" placeholder="Code" name="Code">
                    <br><br>
                <hr>
                <button type="submit" class="checkout-button">Submit</button>

                <p>Already have an account? <a href="1Login.php">Sign in</a>.</p>
            </div>
            <!-- If username or password is incorrect -->
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