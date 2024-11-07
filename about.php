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
        <h1>Group Details</h1>
        <h2>Lukewarm Associates</h2>
        <hr>
        <div>
            <article>
                <h3>Josh</h3>
                <p>
                    I have always been very fascinated by technology.
                    I was always more into the physical side of computing when I was younger.
                    However that passion has caused me to fall in love with the challenge and reward of the software
                    side of computers.
                    Knowing that the computer will never be wrong and it is always something I have done.
                    Is a very rewarding feeling for me.
                    I also love the ability to travel that is afforded by alot of tech jobs as travel is a big passion
                    of mine.
                    I enjoy learning of different cultures and interfacing with global connections. <br>
                    I love where being where software and hardware meet. Networking and cyber security are my main
                    specialities.<br>
                    <br>If you would like to contact me, my details are :
                    <br>Email - Joshua@LukeWarmAssociates.com
                    <br>Phone - 0123456789
                    <br>or <a href="mailto:Joshua@LukewarmAssociates.com">click here to email me.</a>
                </p>
            </article>
            <!--
                    I have changed the about us for each member to reflect more the way that Alfandi instructed us to.
                -->
            <article>
                <h3>Luke</h3>
                <p>
                    I've always been interested in computing and programming.
                    Starting with scratch on a raspberry pi 1 in the early 2010s making small games and animations.
                    I like to be on the cutting edge of technology.
                    Engaging with the most recent software news and updates.
                    I love modularity and having the ability to know alot of different ways to do things. <br>
                    My speciality is complex, reliable and verbose software development.<br>
                    <br>If you would like to contact me, my details are :
                    <br>Email - Luke@LukeWarmAssociates.com
                    <br>Phone - 0123456789
                    <br>or <a href="mailto:Luke@LukewarmAssociates.com">click here to email me.</a>
                </p>
            </article>

            <article>
                <h3>Melvin</h3>

                <p>
                    I adore to be the place where business and technology meets. I love data and data analysis.
                    I enjoy seeing why people do things the way they do and ensuring I can demonstrate reliably with
                    data.<br>
                    My specialty is data analysis and business intelligence. <br>
                    <br>If you would like to contact me, my details are :
                    <br>Email - Melvin@LukeWarmAssociates.com
                    <br>Phone - 0123456789
                    <br>or <a href="mailto:Melvin@LukewarmAssociates.com">click here to email me.</a>
                </p>
            </article>

        </div>
        <h2 class="group-detail-headers" >Group Photo</h2>
        <hr>
        <img class="group-photo" src="./images/group-photo.jpg" alt="Photo of Our Group">

        <h2 class="group-detail-headers">Course information</h2>
        <hr>
        <dl>
            <dt>MTC101:</dt>
            <dd>The best outsourcing web development team</dd> <!-- Italicise this pls -->
            <dt>Course's instructor:</dt> <!--Header -->
            <dd>Alfandi Yahya</dd> <!-- Can we swap these around, make the "course Instructor" A large heading. -->
            <dt>COS10026-Computing Technology Inquiry Project:</dt>
            <dd>Project Assignment 1 & 2</dd><!-- Can we swap these around, make them both medium headings. -->
        </dl>

        <table>
            <caption>Working hours schedule</caption>
            <tr>
                <th>Day</th>
                <th>Time</th>
            </tr>
            <tr>
                <td>Monday</td>
                <td>10h30:17h30</td>
            </tr>
            <tr>
                <td>Tuesday</td>
                <td>10h30:17h30</td>
            <tr>
                <td>Wednesday</td>
                <td>10h30:17h30</td>
            </tr>
            <tr>
                <td>Thursday</td>
                <td>10h30:17h30</td>
            </tr>
            <tr>
                <td>Friday</td>
                <td>10h30:17h30</td>
            </tr>
        </table>

        <?php
        include 'footer.inc';
        ?>

    </main>

</body>

</html>