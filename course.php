<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="Shortcut Icon" href="image/logo.png">
    <title>ENABLE Online Learning</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="stylesheet/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <img src="image/enable-banner.png" alt="ENABLE banner">
    </header>
    <nav>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">HOME</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="topics.php" role="button" aria-haspopup="true" aria-expanded="false">TOPICS</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="topics.php?year=2019">YEAR 2019</a>
                    <a class="dropdown-item" href="topics.php?year=2018">YEAR 2018</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="topics.php" role="button" aria-haspopup="true" aria-expanded="false">ENABLE PROJECT</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="https://enable.unc.edu/boot-camp-day-by-day-schedule/">YEAR 2019</a>
                    <a class="dropdown-item" href="https://enable.unc.edu/2018-hidav-participants/">YEAR 2018</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://learnonline.chip.unc.edu:8000/hub/login">JUPYTERHUB</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="lecturer.php">LECTURERS</a>
            </li>
        </ul>
    </nav>
    <section>
            <?php 
                require "dbconnect.php";
                $course_id = $_GET['course'];
                $course_number = 0;
                $course_name = '';
                $topic_id = 0;
                $slide_link = '';
                $overview = '';
                $query_course = "SELECT * FROM course WHERE course_id = " . $course_id;
                if ($result = $mysqli->query($query_course)) {
                    while ($row = $result->fetch_assoc()) { 
                        $course_number = $row['course_number'];
                        $topic_id = $row['topic_id'];
                        $slide_link = $row['slide_link'];
                        $course_name = $row['course_name'];
                        $overview = $row['overview'];
                    } 
                }
            ?>
        <h1 class="topic-head">Topic: 
            <?php 
                $query_topic = "SELECT * FROM curriculum WHERE topic_id = " . $topic_id;
                if ($result = $mysqli->query($query_topic)) {
                    while ($row = $result->fetch_assoc()) { 
                        echo $row['topic_name'];
                    } 
                }
            ?>
        </h1>
        <h2>Lecture 
            <?php 
                echo $course_number;
                echo " - " . $course_name;
            ?>
        </h2>
        <h3>Overview</h3>
        <p>
            <?php 
                echo $overview;
            ?>
        </p>
        <div class="video-wrapper">
            <?php
                echo '<iframe src="' . $slide_link . '" width="350px" height="221px" frameborder="0">';
                echo 'This is an embedded <a target="_blank" href="https://office.com">Microsoft Office</a> presentation, powered by <a target="_blank" href="https://office.com/webapps">Office Online</a>.</iframe>';
            ?>
        </div>
        <h3>Materials</h3>
        <table class="table table-striped">
            <tr>
                <td>Slide</td>
                <td>Transcript</td>
                <td>Video</td>
            </tr>
            <tr>
                <td>
                    <a href="materials/text-mining/slides/1.TextMining.Introduction.pdf" download>pdf</a>
                </td>
                <td>
                    <a href="#" download="">txt</a>
                </td>
                <td>
                    <a href="#" download>mp4</a>
                </td>
            </tr>
        </table>
    </section>
    <footer>
        <div class="footer-col1">
            <a href="https://chip.unc.edu/">
                <img src="image/chip-banner.png" alt="CHIP banner" height="40px">
            </a>
            <p>
                This program is funded by United Health Foundation.
            </p>
            <a href="http://www.unitedhealthfoundation.org/">
                <img src="image/uhf-banner.png" alt="UHF banner" height="40px">
            </a>
            <p>
                <a href="https://twitter.com/Enable_UNC/" class="footer-icon"><i class="fab fa-twitter-square fa-2x"></i></a>
                <a href="https://www.facebook.com/unc.enable/" class="footer-icon"><i class="fab fa-facebook-square fa-2x"></i></a>
                <a href="https://www.instagram.com/enable.unc/" class="footer-icon"><i class="fab fa-instagram fa-2x"></i></a>
            </p> 
            <p>Copyright © 2018 ENABLE</p>
        </div>
        <div class="footer-col2">
            <p>
                Mailing Address: <br>
                Carolina Health Informatics Program <br>
                100 Manning Hall <br>
                Chapel Hill, NC USA <br>
                27599-3360 <br>
            </p>
            <p>Email: enable@unc.edu</p>
            <p>Phone: 919.962.2208</p>
            <a class="btn btn-second" href="login.php">Admin Login</a>
        </div>
    </footer>
</body>
</html>