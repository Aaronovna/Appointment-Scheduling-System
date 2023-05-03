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
            <div class="dash-cont">
                <h2>STUDENT</h2>
                <hr>
                <br>
                <h2>Appointment</h2>
                <br>
                <div class="dash-cont-appt">
                    <button onclick="location.href = '#pop-payment';" class="appt-button">
                        <span class="material-symbols-outlined">local_atm</span>
                        <p>Balance</p>
                    </button>

                    <button onclick="location.href = '#pop-book';" class="appt-button">
                        <span class="material-symbols-outlined">library_books</span>
                        <p>Book</p>
                    </button>

                    <button onclick="location.href = '#pop-appt';" class="appt-button">
                        <span class="material-symbols-outlined">date_range</span>
                        <p>Appoinment</p>
                    </button>
                </div>
            </div>

            <div id="pop-payment" class="overlay">
                <div class="popup">
                    <h4>Balance</h4>
                    <a class="close" href="#">
                        <span id="active-icon" class="material-symbols-outlined md-24">close</span>
                    </a>
                    <div class="content">
                        <p>Pay Balance</p>
                        <form action="">
                            <p>Date:</p>
                            <input type="date">
                            <p>Time:</p>
                            <select name="pay-balance" id="pay-balance">
                                <option value="08:00">08:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="12:00">12:00 NN</option>
                                <option value="14:00">02:00 PM</option>
                                <option value="16:00">04:00 PM</option>
                            </select>

                            <button class="default-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div id="pop-book" class="overlay">
                <div class="popup">
                    <h4>Book</h4>
                    <a class="close" href="#">
                        <span id="active-icon" class="material-symbols-outlined md-24">close</span>
                    </a>
                    <div class="content">
                        <p>Pay Book</p>
                        <form action="">
                            <p>Date:</p>
                            <input type="date">
                            <p>Time:</p>
                            <select name="pay-balance" id="pay-balance">
                                <option value="08:00">08:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="12:00">12:00 NN</option>
                                <option value="14:00">02:00 PM</option>
                                <option value="16:00">04:00 PM</option>
                            </select>

                            <button class="default-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div id="pop-appt" class="overlay">
                <div class="popup">
                    <h4>Appointment</h4>
                    <a class="close" href="#">
                        <span id="active-icon" class="material-symbols-outlined md-24">close</span>
                    </a>
                    <div class="content">
                        <p>Schedule an appointment</p>
                        <form action="">
                            <p>Date:</p>
                            <input type="date">
                            <p>Time:</p>
                            <select name="pay-balance" id="pay-balance">
                                <option value="08:00">08:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="12:00">12:00 NN</option>
                                <option value="14:00">02:00 PM</option>
                                <option value="16:00">04:00 PM</option>
                            </select>
                            <p>Department:</p>
                            <select name="department" id="department">
                                <option value="0">Admissions Office</option>
                                <option value="1">Registrar's Office</option>
                                <option value="2">Financial Aid Office</option>
                                <option value="3">Student Affairs Office</option>
                                <option value="4">Academic Affairs Office</option>
                                <option value="5">Career Services Office </option>
                                <option value="6">International Student Services Office</option>
                                <option value="7">Office of the Dean</option>
                            </select>
                            <button class="default-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>


</html>