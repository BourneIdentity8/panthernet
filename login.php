<?php
require 'config/config.php';

// Declaring variables
$username = "";
$password = "";

if(isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username'] = $username; // Stores username into session.
    
    $check_database_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $check_login_query = mysqli_num_rows($check_database_query);

    if($check_login_query == 1) {
		$update_logindate = mysqli_query($con, "UPDATE users SET last_online=CURRENT_TIMESTAMP WHERE username='$username'");
        $row = mysqli_fetch_array($check_database_query);
        $username = $row['username'];
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PantherNet - Login</title>
</head>
<body>
    <div class = "loginform">
        <img src = "panthernetlogo2.png" alt = "Panthernet Logo" class = "forphoto">
    <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" style="display:block; margin : 0 auto;" value="
                <?php
                    if(isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    }
                ?>
            ">
            <br>
            <input type="password" name="password" style="display:block; margin : 0 auto;" placeholder="Password">
            <br>
            <input type="submit" name="signin" style = "display: inline-block;"value="Login">
            <input type="submit" name="signup" style = "display: inline-block;" value="Sign Up">
        </form>
    </div>
</body>
</html>