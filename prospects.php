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
include './settings.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prospects</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php
    include "./header_manager.inc";
    ?>
<main class="prospects">
    <?php

    if (isset($_GET["page"]))
        $page = $_GET["page"];
    else
        $page = 1;
    $nextPage = $page + 1;
    $prevPage = $page - 1;
    $limitFloor = ($page - 1) * 20;
    $conn = @mysqli_connect($db_servername, $db_username, $db_password, $db_name);
    // connect to the database
    if ($conn == false) {
        echo "Failed to connect to database";
        die();
    }
    $sql = "SELECT * FROM `PROSPECT` ORDER BY `USERNAME` LIMIT $limitFloor,20";
    $result = mysqli_query($conn, $sql);
    if ($result == false || $result->num_rows == 0) {
        echo "Failed to recieve any data<br>";
        if ($page == 1)
            echo "<a href='./manage.php'>Return</a>";
        else
            echo "<a href='?page=1'>Return</a>";
        mysqli_close($conn);
        die();
    }
    echo "<table>
            <tr>
                <th>Username</th>
                <th>Firstname</th>
                <th>Reason For Request</th>
                <th>Approve</th>
                <th>Deny</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <tr>
        <form method='post' action='approveDeny.php'>
        <input type='hidden' name='page' value='$page' />
        <td>
            <input type='hidden' name='prospectUsername' value='" . $row['USERNAME'] . "' />" . $row['USERNAME'] . "
        </td>
        <td>" . $row['FIRSTNAME'] . "</td>
        <td>" . $row['REASON'] . "</td>
        <td>
            <input type='submit' name='action' value='Approve'/>
        </td>
        <td>
            <input type='submit' name='action' value='Deny'/>
        </td>
        </form>
        </tr>";
    }
    echo "</table>";
    ?>
    <?php

echo "<div>";
    if ($prevPage == 0)
        echo "<a class='page-link' href='?page=$nextPage'>Next Page</a>";
    else
        echo "<a class='page-link' href='?page=$prevPage'>Previous Page</a><a class='page-link' href='?page=$nextPage'>Next Page</a>";
    ?>
    </div>
    </main>
</body>
</html>