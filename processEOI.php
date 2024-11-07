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
    include 'header.inc'
        ?>
    <h1>EOI Confirmation</h1>

    <!--Begin processing-->
    <?php
    // checks if processing was triggered by a form submit, if not display an error message
    if (isset($_POST["jrn"])) {
        $jrn = $_POST["jrn"];

    } else {
        //Display error message, if process not triggered by a form submit
        echo "<p>Error: Enter data in the <a href=\"apply.html\">form</a></p>";
    }
    //assign the reset of the form values to PHP variables here
    if (isset($_POST["fname"])) {
        $fname = $_POST["fname"];
    } else {
        //Display error message, if process not triggered by a form submit
        echo "<p>Error: Enter data in the <a href=\"apply.html\">form</a></p>";
    }
    if (isset($_POST["lname"])) {
        $lname = $_POST["lname"];
    } else {
        echo "<p>Error: Enter data in the <a href=\"apply.html\">form</a></p>";
    }

    if (isset($_POST["dob_day"])) {
        $dob_day = $_POST["dob_day"];

    } else {
        echo "<p>Error: Enter data in the <a href=\"apply.html\">form</a></p>";
    }
    if (isset($_POST["dob_month"])) {
        $dob_month = $_POST["dob_month"];

    } else {
        echo "<p>Error: Enter data in the <a href=\"apply.html\">form</a></p>";
    }
    if (isset($_POST["dob_year"])) {
        $dob_year = $_POST["dob_year"];

    } else {
        echo "<p>Error: Enter data in the <a href=\"apply.html\">form</a></p>";
    }

    if (isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    } else {
        echo "<p>Error: Enter data in the <a href=\"apply.html\">form</a></p>";
    }

    if (isset($_POST["street"])) {
        $street = $_POST["street"];

    } else {
        echo "<p>Error: Enter data in the <a href=\"apply.html\">form</a></p>";
    }

    if (isset($_POST["suburb"])) {
        $suburb = $_POST["suburb"];
    } else {
        echo "<p>Error: Enter data in the <a href=\"apply.html\">form</a></p>";
    }

    if (isset($_POST["state"])) {
        $state = $_POST["state"];
    } else {
        echo "<p>Error: Enter data in the <a href=\"apply.html\">form</a></p>";
    }
    if (isset($_POST["postcode"])) {
        $postcode = $_POST["postcode"];
    } else {
        echo "<p>Error: Enter data in the <a href=\"apply.html\">form</a></p>";
    }

    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    } else {
        echo "<p>Error: Enter data in the <a href=\"apply.html\">form</a></p>";
    }

    if (isset($_POST["phone"])) {
        $phone = $_POST["phone"];
    } else {
        echo "<p>Error: Enter data in the <a href=\"apply.html\">form</a></p>";
    }
    if (isset($_POST["skillcheck"])) {
        $skillcheck[] = $_POST["skillcheck"];
        // $skillcheck[] = sanitise_input($skillcheck[]);
    
    } else {
        echo "<p>Error: Enter data in the <a href=\"apply.html\">form</a></p>";
    }
    if (isset($_POST["skillother"])) {
        $skillother = $_POST["skillother"];
    }

    function sanitise_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Sanitize the input
    $jrn = sanitise_input($jrn);
    $fname = sanitise_input($fname);
    $lname = sanitise_input($lname);
    $dob_day = sanitise_input($dob_day);
    $dob_month = sanitise_input($dob_month);
    $dob_year = sanitise_input($dob_year);
    $gender = sanitise_input($gender);
    $street = sanitise_input($street);
    $suburb = sanitise_input($suburb);
    $state = sanitise_input($state);
    $postcode = sanitise_input($postcode);
    $email = sanitise_input($email);
    $phone = sanitise_input($phone);
    $skillother = sanitise_input($skillother);

    $errMsg = "";

    if ($jrn == "") {
        $errMsg .= "<p>You must enter your job reference number of desired job";
    } else if (!preg_match("/^\{d}5*$/", $jrn)) {
        $errMsg .= "Only numeric letters allowed in the job reference";
    }

    if ($fname == "") {
        $errMsg .= "<p>You must enter your first name.</p>";
    } else if (!preg_match("/^[a-zA-Z]*$/", $fname)) {
        $errMsg .= "<p>Only alpha letters allowed in your first name.</p>";
    }

    if ($lname == "") {
        $errMsg .= "<p>You must enter your last name.</p>";
    } else if (!preg_match("/^[a-zA-Z-]*$/", $lname)) {
        $errMsg .= "<p>Only alpha letters and hyphen allowed in your last name.</p>";
    }

    if ($dob_day == "") {
        $errMsg .= "<p>You must enter your day of birth.</p>";
    } else if (!preg_match("/^[{d}2]*$/", $dob_day)) {
        $errMsg .= "<p>Only 2 digits are allowed in your Day of Birth</p>";
    }
    if ($dob_month == "") {
        $errMsg .= "<p>You must enter your month of birth.</p>";
    } else if (!preg_match("/^[{d}2]*$/", $dob_month)) {
        $errMsg .= "<p>Only 2 digits are allowed in your Month of Birth</p>";
    }
    if ($dob_year == "") {
        $errMsg .= "<p>You must enter your year of birth.</p>";
    } else if (!preg_match("/^[{d}4]*$/", $dob_year)) {
        $errMsg .= "<p>Only 4 digits are allowed in your Year of Birth</p>";
    }


    if ($street == "") {
        $errMsg .= "<p>You must enter your street address";
    } else if (!preg_match("/[a-zA-Z0-9 ]*$/", $street)) {
        $errMsg .= "<p>Only alpha letters and numeric letter allowed in your street address.</p>";
    }

    if ($suburb == "") {
        $errMsg .= "<p>You must enter your suburb.</p>";
    } else if (!preg_match("/^[a-zA-Z-]*$/", $suburb)) {
        $errMsg .= "<p>Only alpha letters allowed in your suburb.</p>";
    }

    if ($postcode == "") {
        $errMsg .= "<p>You must enter your postcode.</p>";
    } else if (!preg_match("/^\{d}4$/", $postcode)) {
        $errMsg .= "<p>Only numbers allowed in your postcode.</p>";
    }

    if ($phone == "") {
        $errMsg .= "<p>You must enter your phone number";
    } else if (!preg_match("/^\{d}10$/", $phone)) {
        $errMsg .= "Only numeric letters allowed in your phone number.";
    }

    $dob = join("/", array($dob_day, $dob_month, $dob_year));
    $dobSQL = join("-", array($dob_year, $dob_month, $dob_day));
    $date = date("Y-m-d");
    $skillcheck = str_replace(array('[', ']', '"'), '', json_encode($skillcheck));
    echo "<p> Thank you $fname $lname for applying through our page!<br/>
                Applied to job with $jrn<br/>
                Your date of birth: $dobSQL<br/>
                Your gender: $gender<br/>
                Your address: $street $suburb $postcode<br/>
                Your phone number: $phone<br/>
                Your email: $email<br/>
                Your skills: $skillcheck <br/>
                Your other skills: $skillother <br/>
                Application Date: $date</p>";

    include './settings.php';
    $conn = @mysqli_connect($db_servername, $db_username, $db_password, $db_name);

    $sql = "INSERT INTO EOI (`JobReferenceNumber`,`FirstName`,`LastName`,`DOB`,`GENDER`,`StreetAddress`, `SuburbTown`,`STATE`,`Postcode`,`EmailAddress`, `PhoneNumber`,`SkillsCheck`, `OtherSkills`,`ApplicationDate`) VALUES ('$jrn', '$fname', '$lname', '$dobSQL','$gender','$street', '$suburb', '$state', '$postcode', '$email', '$phone', '$skillcheck','$skillother','$date');";
    // $sql = "INSERT INTO EOI (`JobReferenceNumber`,`FirstName`,`LastName`,`DOB`,`StreetAddress`, `SuburbTown`,`STATE`,`Postcode`,`EmailAddress`, `PhoneNumber`,`SkillsCheck`, `OtherSkills`,`ApplicationDate`) VALUES ('10444', 'Melvin', 'Nguyen','2001-08-01', '31 Pritchard Avenue','Footscray','VIC','3001','npbaominh182001@gmail.com','0466859319','Teamwork-Management','Meowww','2023-10-17');";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "<p class=\"wrong\">Something is wrong with ", $sql, "</p>";
    } else {
        echo "<p class=\"ok\">Successfully added new application record</p>";
    }
    mysqli_close($conn);


    ?>
</body>