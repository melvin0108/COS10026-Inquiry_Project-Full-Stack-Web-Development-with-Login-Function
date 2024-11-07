<?php
session_start();

include './settings.php';
if ($dev_mode == true)
    $_SESSION["username"] = "devmode enabled";
// if devmode is enabled in settings.php bypass the login

// If you are already logged in redirect to manage page
if (isset($_SESSION["username"])) {
    header("Location: ./manage.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body class="login-body">
    <?php
    include 'header.inc';
    ?>
    <div class="login-content">
        <form class="login" method="post" action="manage.php">
            <fieldset>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["error"])) {
                    if($_GET["error"] == 1)
                        echo "<p class='login-error'>Wrong username or password</p>";
                    else if ($_GET["error"] == 2)
                        echo "<p class='login-error'>Failed to connect to database<br>Please contact admin</p>";
                    else if ($_GET["error"] == 3)
                        echo "<p class='login-error'>Too many failed login attempts<br>Please contact admin</p>";
                }
                ?>
                <legend>login</legend>
                <label class="form-elements" for="username">
                    <span>Username:</span>
                    <input type="text" id="username" name="username" required>
                </label>

                <label class="form-elements" for="password">
                    <span>Password:</span>
                    <input type="password" name="password" id="password">
                </label>
                <button type="submit">Login</button>
                <br>
                <a href="./registerPage.php">Register to be manager</a>
            </fieldset>
        </form>
    </div>
</body>
</html>