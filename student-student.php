<?php
    ini_set("display_errors", "1");
    error_reporting(E_ALL);

    session_start();

    include("connection.php");

    function generateRandomNumber()
    {
        $num = "";
        for ($i = 0; $i < 8; $i++) {
          $num .= rand(0, 9);
        }
        return $num;
    }
    

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
        <link rel="stylesheet"  href="popup.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>

    <body class="dash">
        <nav class="def-nav">
            <br>
            <div class="user-profile"><img class="user-profile" src="default-profile.jpg"></div>
            <br>
            <p class="empahis wt"><?php echo $fname, " ", $lname?></p>
            <p class="wt" style="font-size: 0.8em"><?php echo $studentnum?></p>
            <br>

            <button onclick="location.href = 'student-dash.php';" class="dash-button">
                <span class="material-symbols-outlined md-36">home</span>
                <p>Home</p>
            </button>

            <button id="active" onclick="location.href = 'student-student.php';" class="dash-button">
                <span id="active-icon" class="material-symbols-outlined md-36">school</span>
                <p>Student</p>
            </button>

            <button onclick="location.href = 'student-teacher.php';" class="dash-button">
                <span class="material-symbols-outlined md-36">account_balance</span>
                <p>Professor</p>
            </button>
            <button onclick="location.href = 'log-out.php';" class="default-btn">Log Out</button>
            
        </nav>
        <section class="def-dash">
            <div>
                <h2>STUDENT</h2>
                <hr>
                <br>
                <h2>Concerns</h2>
                <br>
                

            </div>

           
        </section>
    </body>


</html>