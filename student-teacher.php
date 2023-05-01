<?php
    ini_set("display_errors", "1");
    error_reporting(E_ALL);

    session_start();

    include("connection.php");

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="")
        {
            header("location: index.php");
        }else
        {
            $useremail=$_SESSION["user"];
        }

    }else
    {
        header("location: index.php");
    }


    $userrow = $connect_db->query("select * from student_account where email='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $fname=$userfetch["fname"];
    $lname=$userfetch["lname"];
    $studentnum=$userfetch["student_number"];


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link rel="stylesheet"  href="style.css">
    </head>

    <body class="dash">
        <nav class="def-nav">
            <br>
            <div class="user-profile"><img class="user-profile" src="default-profile.jpg"></div>
            <br>
            <p class="empahis wt"><?php echo $fname, " ", $lname?></p>
            <p class="wt" style="font-size: 0.8em"><?php echo $studentnum?></p>
            <br>
            <button id="active" onclick="location.href = 'student-dash.php';" class="dash-button">Home</button>
            <button onclick="location.href = 'student-student.php';" class="dash-button">Student</button>
            <button onclick="location.href = 'student-teacher.php';" class="dash-button">Teacher</button>
            <button onclick="location.href = 'log-out.php';" class="default-btn">Log Out</button>
        </nav>
        <section class="def-dash">
        <div>
            <p class="empahis" >TEACHER</p>
        </div>

        </section>
    </body>


</html>