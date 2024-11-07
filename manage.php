<?php
session_start();
$username = "";
$password = "";
if (!isset($_SESSION["username"])) {
    // if the user is NOT already logged in try to log in
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password = md5($password);

        include './settings.php';
        $conn = @mysqli_connect($db_servername, $db_username, $db_password, $db_name);
        // connect to the database
        if($conn == false) {
            echo "failed to connect to database";
            die();
        }

        $sql = "SELECT `PASSWORDHASH` FROM `USERS` WHERE `USERNAME` = '$username';";
        // sql query that collects the password hash from the row where the username is the one entered
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $passwordHash = $row["PASSWORDHASH"];
            if ($passwordHash == $password) {
                $_SESSION["username"] = $username;
            } else {
                // if the login fails returns the user to the login page
                // wrong password
                mysqli_close($conn);

                header("Location: ./login.php");
                die();
            }
        } else {
            // wrong username
            mysqli_close($conn);

            header("Location: ./login.php");
            die();
        }
    } else {
        // if user is not logged in and there was no post request return to login.php
        // did not use the login form correctly
        mysqli_close($conn);

        header("Location: ./login.php");
        die();
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php
    include 'header_manager.inc';
    ?>
    <?php
    echo "<p> You are currently logged in as <em>";
    echo $_SESSION["username"];
    echo "</em></p>";
    ?>

<h1>Search EOI Form</h1>
	
	<form method="post" action="manage.php">
	
		<fieldset><legend>Search by Job Reference Number</legend>
		<p class="row">	<label for="JRN">Job Reference Number </label>
			<input type="text" name="JRN" id="JRN" /></p>
		<p><input type="submit" value="Search EOI's" /></p>
		<p><input type="reset" value="Reset Form"/></p>
		</fieldset>
	
	</form>
	<form method="post" action="manage.php">
		
		<fieldset><legend>Search by Firstname and/or Lastname</legend>
		<p class="row">	<label for="FNAME">Firstname </label>
			<input type="text" name="FNAME" id="FNAME" /></p>
		<p class="row">	<label for="LNAME">Lastname </label>
			<input type="text" name="LNAME" id="LNAME" /></p>
		<p><input type="submit" value="Search EOI's" /></p>
		<p><input type="reset" value="Reset Form"/></p>
		</fieldset>
	
	</form>

    <form method="post" action="manage.php">
		
		<fieldset><legend>Delete Entries By Job Reference Number</legend>
		<p class="row">	<label for="DELENTRIESJRN">Job Reference Number </label>
			<input type="text" name="DELENTRIESJRN" id="DELENTRIESJRN" /></p>
		<p><input type="submit" value="Delete Entries" /></p>
		<p><input type="reset" value="Reset Form"/></p>
		</fieldset>
	
	</form>

	<form method="post" action="manage.php">
		
		<fieldset><legend>Delete Entries By EOI Number</legend>
		<p class="row">	<label for="DELENTRIESEOINUM">EOI Number </label>
			<input type="text" name="DELENTRIESEOINUM" id="DELENTRIESEOINUM" /></p>
		<p><input type="submit" value="Delete Entries" /></p>
		<p><input type="reset" value="Reset Form"/></p>
		</fieldset>
	
	</form>



    <?php
        require_once ("settings.php"); //connection info
        $conn = @mysqli_connect($db_servername, $db_username, $db_password, $db_name);
        if (!$conn) {
            echo "<p>Database connection failure</p>"; //not in production script
        }
        
        if (isset($_POST["DELENTRIESJRN"])) {
            $DELENTRIESJRN = $_POST["DELENTRIESJRN"];
            $query = "DELETE FROM EOI WHERE JobReferenceNumber LIKE '%$DELENTRIESJRN%'";
            $result = mysqli_query($conn, $query);
            echo "<p>Entries with Job Reference Number: $DELENTRIESJRN have been deleted.</p>";
             }
        

        else if (isset($_POST["DELENTRIESEOINUM"])) {
            $DELENTRIESEOINUM = $_POST["DELENTRIESEOINUM"];
            $query = "DELETE FROM EOI WHERE EOInumber LIKE '%$DELENTRIESEOINUM%'";
            $result = mysqli_query($conn, $query);
            echo "<p>Entry with EOI Number: $DELENTRIESEOINUM have been deleted.</p>";
        }
        else if (isset($_POST["EOIapprovereject"])){
            $EOIapprovereject = $_POST["EOIapprovereject"];
            $action = $_POST["action"];
            if ($action == "Approve") {
            $query = "UPDATE EOI SET `Status` = 'Approved' WHERE EOInumber = $EOIapprovereject";
            $result = mysqli_query($conn, $query);
            } else if ($action == "Deny") {
            $query = "UPDATE EOI SET `Status` = 'Rejected' WHERE EOInumber = $EOIapprovereject";
            $result = mysqli_query($conn, $query);
            }
        }

            $sql_table = "EOI";

            if (isset($_POST["JRN"])) {
                $JRN = $_POST["JRN"];
                $query = "SELECT * FROM EOI WHERE JobReferenceNumber LIKE '%$JRN%' ORDER BY EOInumber";
            }
              else if (isset($_POST["FNAME"]) || isset($_POST["LNAME"])) {
                $FNAME = $_POST["FNAME"];
                $LNAME = $_POST["LNAME"];
                if (isset($_POST["FNAME"]) && isset($_POST["LNAME"])) {
                    $query = "SELECT * FROM EOI WHERE Firstname LIKE '%$FNAME%' AND Lastname LIKE '%$LNAME%' ORDER BY EOInumber";
                } else if (isset($_POST["FNAME"])) {
                    $query = "SELECT * FROM EOI WHERE Firstname LIKE '%$FNAME%' ORDER BY EOInumber";
                } else if (isset($_POST["LNAME"])) {
                    $query = "SELECT * FROM EOI WHERE Lastname LIKE '%$LNAME%' ORDER BY EOInumber";
                }
            }

            else {
            $query = "select EOInumber, JobReferenceNumber, FirstName, LastName, DOB, GENDER, StreetAddress, SuburbTown, STATE, Postcode, EmailAddress, PhoneNumber, SkillsCheck, OtherSkills, ApplicationDate, Status FROM EOI ORDER BY EOInumber";
            }
            
            $result = mysqli_query($conn, $query);
            if(!$result) {
                echo "<p>Something is wrong with ", $query, "</p>";
            }
            else {
                echo "<table border=\"1\">\n";
                echo "<tr>\n ";
                echo "<th scope=\"col\">EOI Number</th>\n"
                    ."<th scope=\"col\">Job Reference Number</th>\n"
                    ."<th scope=\"col\">First Name</th>\n"
                    ."<th scope=\"col\">Last Name</th>\n"
                    ."<th scope=\"col\">Date Of Birth</th>\n"
                    ."<th scope=\"col\">Gender</th>\n"
                    ."<th scope=\"col\">Street Address</th>\n"
                    ."<th scope=\"col\">Suburb/Town</th>\n"
                    ."<th scope=\"col\">State</th>\n"
                    ."<th scope=\"col\">Postcode</th>\n"
                    ."<th scope=\"col\">Email Address</th>\n"
                    ."<th scope=\"col\">Phone Number</th>\n"
                    ."<th scope=\"col\">Skills Check</th>\n"
                    ."<th scope=\"col\">Other Skills</th>\n"
                    ."<th scope=\"col\">Application Date</th>\n"
                    ."<th scope=\"col\">Application Status</th>\n"
                    ."<th scope=\"col\">Approve/Deny</th>\n"
                    ."</tr>\n";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n 
                    <form method='post' action='manage.php'>";
                    echo "<td> <input type='hidden' name='EOIapprovereject' value='" . $row['EOInumber'] . "' />" . $row['EOInumber'] . "</td>\n";
                    echo "<td>", $row["JobReferenceNumber"], "</td>\n";
                    echo "<td>", $row["FirstName"], "</td>\n";
                    echo "<td>", $row["LastName"], "</td>\n";
                    echo "<td>", $row["DOB"], "</td>\n";
                    echo "<td>", $row["GENDER"], "</td>\n";
                    echo "<td>", $row["StreetAddress"], "</td>\n";
                    echo "<td>", $row["SuburbTown"], "</td>\n";
                    echo "<td>", $row["STATE"], "</td>\n";
                    echo "<td>", $row["Postcode"], "</td>\n";
                    echo "<td>", $row["EmailAddress"], "</td>\n";
                    echo "<td>", $row["PhoneNumber"], "</td>\n";
                    echo "<td>", $row["SkillsCheck"], "</td>\n";
                    echo "<td>", $row["OtherSkills"], "</td>\n";
                    echo "<td>", $row["ApplicationDate"], "</td>\n";
                    echo "<td>", $row["Status"], "</td>\n";
                    echo "<td> <input type='submit' name='action' value='Approve'/> <input type='submit' name='action' value='Deny'/> </td> </form>\n";
                    echo "</tr>\n";
                }
                echo "</table>\n";
                mysqli_free_result($result);
            }
        mysqli_close($conn);
        
            



            
    ?>

    <?php
    include 'footer_auth.inc';
    ?>
</body>
</html>