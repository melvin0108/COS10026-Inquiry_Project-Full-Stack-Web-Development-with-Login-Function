<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body class="login-body">
    <?php
    include 'header.inc';
    ?>
    <div class="login-content">
        <form class="login" method="post" action="register.php">
            <fieldset>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["error"])) {
                    if ($_GET["error"] == 1)
                        echo "<p class='login-error'>That username is taken</p>";
                    else if ($_GET["error"] == 2)
                        echo "<p class='login-error'>Failed to connect to database<br>Please contact admin</p>";
                    else if ($_GET["error"] == 3)
                        echo "<p class='login-error'>You may only use alphanumeric characters within this form</p>";
                    else if ($_GET["error"] == 0)
                        echo"<p class='register-success'>You have successfully registered<br>Please wait to be approved</p>";
                }
                ?>
                <legend>Registration</legend>
                <label class="form-elements" for="fname">
                    <span>First Name:</span>
                    <input type="text" name="fname" id="fname" pattern="^[A-Za-z0-9]*$">
                </label>
                <label class="form-elements" for="username">
                    <span>Username:</span>
                    <input type="text" id="username" name="username" required pattern="^[A-Za-z0-9]*$">
                </label>
                <label class="form-elements" for="password">
                    <span>Password:</span>
                    <input type="password" name="password" id="password" pattern="^[A-Za-z0-9]*$">
                </label>
                <label class="form-elements" for="reason">
                    <span>Reason for Joining:</span>
                    <input type="text" name="reason" id="reason" pattern="^[A-Za-z0-9 ]*$">
                </label>
                <button type="submit">Register</button>
            </fieldset>
        </form>
    </div>
</body>
</html>