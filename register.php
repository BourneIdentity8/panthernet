<?php
    $user = "";
    $pass = "";

    if (isset($_POST['signup'])) {
    
    }
    if (isset($_POST['signin'])) {
        include('login.php');
    }
?>

<html>
    <head>
        <title>
            Registration
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class = "registerform">
        <form action = "registered.html" method = "POST">
        <h1>
            Register
        </h1>
        <p>
            Please fill out this form to complete your registration.
        </p>
        <hr>
        <label for = "user"><b>Username</b></label>
        <input type = "text" placeholder = "Username" name = "user" id = "user" required>
        <br>
        <br> 
        <label for = "pass"><b>Password</b></label>
        <input type = "text" placeholder="Enter password" name = "pass" id = "pass" required>
        <br>
        <br>
        <label for = "pass2"><b>Verify Password</b></label>
        <input type = "password" placeholder="Verify Password" name = "pass2" id = "pass2" required>
        <br>
        <br>
        <input type = "checkbox" id = "terms" name = "terms" value = "agreed" required>
        <label for = "terms">Do you agree to all the <a href = "terms.html">terms<a>?</label>
        <br>
        <br>
        <input type="submit" name="signup"  value="Sign Up">
        <input type="submit" name="signin"  value="Login" src = "login.php">
        </form>
    </div> 
    </body>
</html>