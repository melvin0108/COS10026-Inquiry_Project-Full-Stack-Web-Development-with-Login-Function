<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/style.css">
    <title>Lukewarm Associates</title>
</head>
<body>

    <?php
    include 'header.inc';
    ?>

    <main class="page">
        <section class="enhancements">
            <h2>Login Page</h2>
            <hr>
            <div>
                <p>
                    This website has the login page which restricts unapproved end users from accessing the
                    administration tools.
                </p>
                <ul>
                    <li>The username and password of each account will be stored in database.</li>
                    <li>Passwords are stored as MD5 hashes for added security as it obfuscates the plaintext password</li>
                    <li>Admins can login and view the manager page that holds a table of job applicants and their
                        details. ↝ <a href="manage.php">HERE</a></li>
                    <li>Only 3 failed login attempts are allowed before the user account is locked. This timer is reset
                        after a successful login.</li>
                </ul>
                <em>You must be logged in to view any of the listed links</em>
            </div>
        </section>

        <section class="enhancements">
            <h2>Register Page</h2>
            <hr>
            <p>
                There is a registration form that user's can use to apply for administrator status
            </p>
            <ul>
                <li>End users can register to request an admin account. ↝ <a href="registerPage.php">HERE</a></li>
                <li>End users that register for an admin account have their details go to the database where they
                    await approval by an admin. ↝ <a href="prospects.php">HERE</a></li>
                <li>Passwords are stored as MD5 hashes for added security as it obfuscates the plaintext password</li>
            </ul>
            <em>You must be logged in to view any of the listed links</em>
        </section>

        <?php
        include 'footer.inc';
        ?>

    </main>


</body>