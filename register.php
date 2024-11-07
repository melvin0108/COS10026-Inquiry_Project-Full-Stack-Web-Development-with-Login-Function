<?php

function sanitise_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function checkRegex($input)
{
    return preg_match("/^[a-zA-Z0-9]*$/", $input);
}
function checkRegexReason($input)
{
    return preg_match("/^[a-zA-Z0-9 ]*$/", $input);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["fname"]) && isset($_POST["reason"])) {

        $username = sanitise_input($_POST["username"]);
        $password = sanitise_input($_POST["password"]);
        $fname = sanitise_input($_POST["fname"]);
        $reason = sanitise_input($_POST["reason"]);
        if (!checkRegex($username)) {
            header("Location: ./registerPage.php?error=3");
            die();
        }
        if (!checkRegex($password)) {
            header("Location: ./registerPage.php?error=3");
            die();
        }
        if (!checkRegex($fname)) {
            header("Location: ./registerPage.php?error=3");
            die();
        }
        if (!checkRegexReason($reason)) {
            header("Location: ./registerPage.php?error=3");
            die();
        }
    } else {
        header("Location: ./registerPage.php?error=3");
        die();
    }
    $password = md5($password);






    include './settings.php';
    $conn = @mysqli_connect($db_servername, $db_username, $db_password, $db_name);
    // connect to the database

    if ($conn == false) {
        header("Location: ./registerPage.php?error=2");
        die();
    }

    $sql = "SELECT * FROM `PROSPECT` WHERE `USERNAME` = '$username';";
    // sql query that collects all rows where the username is the one entered
    $result = mysqli_query($conn, $sql);
    $sql = "SELECT * FROM `USERS` WHERE `USERNAME` = '$username';";
    $resultUsers = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        header("Location: ./registerPage.php?error=1");
        die();
    } else if ($resultUsers->num_rows > 0) {
        header("Location: ./registerPage.php?error=1");
        die();
    } else {
        $sql = "INSERT INTO PROSPECT (`USERNAME`, `PASSWORDHASH`, `FIRSTNAME`, `REASON`) VALUES ('$username', '$password', '$fname', '$reason');";
        // sql query inserts all info into DB
        $result = mysqli_query($conn, $sql);
        header("Location: ./registerPage.php?error=0");
        die();
    }
} else {
    // if there is no post request
    // did not use the form correctly
    header("Location: ./registerPage.php");
    die();
}
?>