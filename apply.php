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

    <main>
        <h2>Apply Here</h2>
        <form class="form" id="application" method="post" action="processEOI.php">
            <fieldset>
                <legend>Personal Information:</legend>
                <label class="form-elements">
                    <span>Job Reference Number:</span>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["jrn"])) {
                        $jrn = $_POST["jrn"];
                        echo "<input id='jrn' name='jrn' minlength='5' maxlength='5' type='text' pattern='^[0-9]*$' value='$jrn' required>";
                    } else
                        echo "<input id='jrn' name='jrn' minlength='5' maxlength='5' type='text' pattern='^[0-9]*$' required>";
                    ?>
                </label>
                <label class="form-elements">
                    <span>First Name: </span>
                    <input id="fname" name="fname" type="text" maxlength="20" pattern="^[a-zA-Z]*$" required>
                </label>
                <label class="form-elements">
                    <span>Last Name:</span>
                    <input id="lname" name="lname" type="text" maxlength="20" pattern="^[a-zA-Z]*$" required>
                </label>

                <div class="row"><!--Gonna make this into one row of entries-->
                    <span>Date Of Birth:</span>
                    <br>
                    <label class="dob form-elements">
                        <input id="dob_day" name="dob_day" type="text" pattern="\d{2}" placeholder="DD" maxlength="2"
                            required>
                    </label>
                    <span>/</span>
                    <label class="dob form-elements">
                        <input id="dob_month" name="dob_month" type="text" pattern="\d{2}" placeholder="MM"
                            maxlength="2" required>
                    </label>
                    <span>/</span>
                    <label class="dob form-elements">
                        <input id="dob_year" name="dob_year" type="text" pattern="\d{4}" placeholder="YYYY"
                            maxlength="4" required>
                    </label>
                </div>

                <label class="form-elements">Gender:</label>
                <label>
                    <input type="radio" name="gender" value="male">
                    <span class="flex-1">Male</span>
                </label>
                <label>
                    <input type="radio" name="gender" value="female">
                    <span class="flex-1">Female</span>
                </label>
                <label>
                    <input type="radio" name="gender" value="NA" checked>
                    <span class="flex-1">Prefer Not to Say</span>
                </label>
            </fieldset>
            <fieldset>
                <legend>Address:</legend>
                <label for="street" class="form-elements">
                    <span>Street Address</span>
                    <input id="street" name="street" type="text" maxlength="40" pattern="^[a-zA-Z0-9 ]*$" required>
                </label>
                <label for="suburb" class="form-elements">
                    <span>Suburb / Town</span>
                    <input id="suburb" name="suburb" type="text" maxlength="40" pattern="^[a-zA-Z]*$" required>
                </label>
                <label for="state" class="form-elements ">
                    <span>State</span>
                    <select name="state" id="state">
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>
                </label>

                <label for="postcode" class="form-elements">
                    <span>Postcode</span>
                    <input id="postcode" name="postcode" type="text" maxlength="4" minlength="4" pattern="^[0-9]*$"
                        required>
                </label>
            </fieldset>
            <fieldset>
                <legend>Contact Information:</legend>
                <label for="email" class="form-elements">
                    <span>Email:</span>
                    <input id="email" name="email" type="email" required>
                </label>
                <label for="phone" class="form-elements">
                    <span>Phone Number:</span>
                    <input id="phone" name="phone" type="text" minlength="8" maxlength="12" pattern="^[0-9]*$" required>
                </label>
            </fieldset>
            <fieldset class="border border-solid border-neutral-500 px-4 py-2 space-y-4">
                <legend>Skills:</legend>
                <label for="Management">
                    <input id="Management" class="skill-checkbox" type="checkbox" name="skillcheck[]" value="Management"
                        checked>
                    <span>Management</span>
                </label>
                <br>
                <label for="Organisation">
                    <input id="Organisation" class="skill-checkbox" type="checkbox" name="skillcheck[]"
                        value="Organisation">
                    <span>Organisation</span>
                </label>
                <br>
                <label for="Teamwork">
                    <input id="Teamwork" class="skill-checkbox" type="checkbox" name="skillcheck[]" value="Teamwork">
                    <span>Teamwork</span>
                </label>
                <br>
                <label for="OtherSkills">
                    <input id="OtherSkills" class="skill-checkbox" type="checkbox" name="skillcheck[]"
                        value="Other Skills:">
                    <span>Other Skills</span>
                </label>
                <br>
                <label for="skillother">
                    <span>Enter your other skills here:</span>
                    <br>
                    <textarea id="skillother" name="skillother" cols="30" rows="10"
                        placeholder="Add your other skills here..."></textarea>
                </label>
            </fieldset>
            <input class="button" type="submit" value="Apply"> <input class="button" type="reset" value="Reset">
        </form>

        <?php
        include 'footer.inc'
            ?>

    </main>
</body>
</html>