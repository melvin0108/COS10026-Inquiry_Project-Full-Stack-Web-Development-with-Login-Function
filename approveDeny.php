<?php
session_start();
include './settings.php';
if ($dev_mode == true)
    $_SESSION["username"] = "devmode enabled";
// if devmode is enabled in settings.php bypass the login
if (!isset($_SESSION["username"])) {
    // if there is no one logged in return to the landing page
    header("Location: ./index.php");
    die();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prospectUsername = $_POST["prospectUsername"];
    $action = $_POST["action"];
    $page = $_POST["page"];
    $conn = @mysqli_connect($db_servername, $db_username, $db_password, $db_name);
    // connect to the database
    if ($conn == false) {
        echo "Failed to connect to database";
        die();
    }
    if ($action == "Approve") {
        $sql = "SELECT * FROM `PROSPECT` WHERE `USERNAME` = '$prospectUsername';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $passwordHash = $row['PASSWORDHASH'];
        $sql = "INSERT INTO USERS (`USERNAME`, `PASSWORDHASH`) VALUES ('$prospectUsername', '$passwordHash');";
        $result = mysqli_query($conn, $sql);
        $sql = "DELETE FROM `PROSPECT` WHERE `USERNAME` = '$prospectUsername';";
        $result = mysqli_query($conn, $sql);
    } else if ($action == "Deny") {
        $sql = "DELETE FROM `PROSPECT` WHERE `USERNAME` = '$prospectUsername';";
        $result = mysqli_query($conn, $sql);
    }
    mysqli_close($conn);
    header("Location: ./prospects.php?page=$page");
    die();
}
?>