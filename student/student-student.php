<?php
    ini_set("display_errors", "1");
    error_reporting(E_ALL);

    session_start();

    include("../connection.php");

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
            header("location: ../index.php");
        }else
        {
            $useremail=$_SESSION["user"];
        }

    }else
    {
        header("location: ../index.php");
    }


    $userrow = $connect_db->query("select * from student_account where email='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $fname=$userfetch["fname"];
    $lname=$userfetch["lname"];
    $studentnum=$userfetch["student_number"];

    date_default_timezone_set('Asia/Manila');
    $today = date('Y-m-d');
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link rel="stylesheet"  href="../styles/global.css">
        <link rel="stylesheet"  href="../styles/popup.css">
        <link rel="stylesheet"  href="../styles/dashboard.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>

    <body class="dash">
        <nav class="def-nav">
            <br>
            <div class="user-profile"><img class="user-profile" src="../default-profile.jpg"></div>
            <br>
            <p class="empahis wt"><?php echo $fname, " ", $lname?></p>
            <p class="wt" style="font-size: 0.8em"><?php echo $studentnum?></p>
            <br>

            <div class="nav-btn-group">
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
            </div>
            <button onclick="location.href = '../log-out.php';" class="nav-logout">Log Out</button>
            
        </nav>

        <section class="def-dash">
            <div class="dash-cont">
                <div class="dash-header">
                    <h2>HOME</h2>
                    <span class="dash-header">
                        <p><?php echo $today?></p>
                        <span class="material-symbols-outlined md-36">calendar_month</span>
                    </span>
                </div>
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
                        <p>Appointment</p>
                    </button>
                </div>
            </div>

            <div id="pop-payment" class="overlay">
                <div class="popup">
                    <h4>Balance</h4>
                    <hr class="pop-line">
                    <a class="close" href="#">
                        <span id="active-icon" class="material-symbols-outlined md-24">close</span>
                    </a>
                    <div class="content">
                        <p>Pay Balance</p>
                        <?php

                            include("../connection.php");

                            $date = $time = $appointment_ID = $student_ID = $concern = $type = $description = "";
                            date_default_timezone_set('Asia/Manila');
                            $today = date('Y-m-d');

                            if(isset($_POST["pay-balance-form"]))
                            {
                                $date = $_POST["date"];
                                $time = $_POST["time"];
                                $appointment_ID = $_POST["appointment_ID"];
                                $student_ID = $_POST["student_ID"];
                                $concern = $_POST["concern"];
                                $description = $_POST["concern"];
                                $type = $_POST["type"];
                                $student_ID = $studentnum;
                                $appointment_ID = generateRandomNumber();

                                $query = "INSERT INTO general_appointment (appointment_ID, student_ID, type, concern, description, date, time) 
                                    VALUES('$appointment_ID', '$student_ID', '$type', '$concern', '$concern', '$date', '$time')";

                                $insert_query = mysqli_query($connect_db, $query);
                                echo "<script>window.location.href = 'student-student.php'</script>";
                            }
                            
                        ?>
                        <form class="pop-form" name="pay-balance-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <p>Date:</p>
                            <input type="date" name="date" id="date" value="<?php echo $today;?>">
                            <p>Time:</p>
                            <select name="time" id="time">
                                <option value="08:00:00">08:00 AM</option>
                                <option value="10:00:00">10:00 AM</option>
                                <option value="12:00:00">12:00 NN</option>
                                <option value="14:00:00">02:00 PM</option>
                                <option value="16:00:00">04:00 PM</option>
                            </select>
                            <input type="hidden" id="concern" name="concern" value="Pay Balance">
                            <input type="hidden" id="type" name="type" value="1">
                            <button name="pay-balance-form" class="pop-submit-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div id="pop-book" class="overlay">
                <div class="popup">
                    <h4>Book</h4>
                    <hr class="pop-line">
                    <a class="close" href="#">
                        <span id="active-icon" class="material-symbols-outlined md-24">close</span>
                    </a>
                    <div class="content">
                        <p>Avail Book</p>
                        <?php

                            include("../connection.php");

                            $date = $time = $appointment_ID = $student_ID = $concern = $type = $description = "";
                            date_default_timezone_set('Asia/Manila');
                            $today = date('Y-m-d');

                            if(isset($_POST["avail-book"]))
                            {
                                $date = $_POST["date"];
                                $time = $_POST["time"];
                                $appointment_ID = $_POST["appointment_ID"];
                                $student_ID = $_POST["student_ID"];
                                $concern = $_POST["concern"];
                                $description = $_POST["concern"];
                                $type = $_POST["type"];
                                $student_ID = $studentnum;
                                $appointment_ID = generateRandomNumber();

                                $query = "INSERT INTO general_appointment (appointment_ID, student_ID, type, concern, description, date, time) 
                                    VALUES('$appointment_ID', '$student_ID', '$type', '$concern', '$concern', '$date', '$time')";

                                $insert_query = mysqli_query($connect_db, $query);
                                echo "<script>window.location.href = 'student-student.php'</script>";
                            }
                            
                        ?>
                        <form class="pop-form" name="avail-book" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <p>Date:</p>
                            <input type="date" name="date" id="date" value="<?php echo $today;?>">
                            <p>Time:</p>
                            <select name="time" id="time">
                                <option value="08:00:00">08:00 AM</option>
                                <option value="10:00:00">10:00 AM</option>
                                <option value="12:00:00">12:00 NN</option>
                                <option value="14:00:00">02:00 PM</option>
                                <option value="16:00:00">04:00 PM</option>
                            </select>
                            <input type="hidden" id="concern" name="concern" value="Avail Book">
                            <input type="hidden" id="type" name="type" value="2">
                            <button name="avail-book" class="pop-submit-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div id="pop-appt" class="overlay">
                <div class="popup">
                    <h4>Appointment</h4>
                    <hr class="pop-line">
                    <a class="close" href="#">
                        <span id="active-icon" class="material-symbols-outlined md-24">close</span>
                    </a>
                    <div class="content">
                        <p>Schedule an appointment</p>
                        <?php

                            include("../connection.php");

                            $date = $time = $appointment_ID = $student_ID = $concern = $type = $description = "";
                            date_default_timezone_set('Asia/Manila');
                            $today = date('Y-m-d');

                            if(isset($_POST["department-con"]))
                            {
                                $date = $_POST["date"];
                                $time = $_POST["time"];
                                $appointment_ID = $_POST["appointment_ID"];
                                $student_ID = $_POST["student_ID"];
                                $concern = $_POST["concern"];
                                $description = $_POST["description"];
                                $type = $_POST["type"];
                                $student_ID = $studentnum;
                                $appointment_ID = generateRandomNumber();

                                $query = "INSERT INTO general_appointment (appointment_ID, student_ID, type, concern, description, date, time) 
                                    VALUES('$appointment_ID', '$student_ID', '$type', '$concern', '$description', '$date', '$time')";

                                $insert_query = mysqli_query($connect_db, $query);
                                echo "<script>window.location.href = 'student-student.php'</script>";
                            }
                            
                        ?>
                        <form class="pop-form" name="department-con" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <p>Date:</p>
                            <input type="date" name="date" id="date" value="<?php echo $today;?>">
                            <p>Time:</p>
                            <select name="time" id="time">
                                <option value="08:00:00">08:00 AM</option>
                                <option value="10:00:00">10:00 AM</option>
                                <option value="12:00:00">12:00 NN</option>
                                <option value="14:00:00">02:00 PM</option>
                                <option value="16:00:00">04:00 PM</option>
                            </select>
                            <p>Department:</p>
                            <select name="description" id="description">
                                <option value="Admissions Office">Admissions Office</option>
                                <option value="Registrars Office">Registrar's Office</option>
                                <option value="Financial Aid Office">Financial Aid Office</option>
                                <option value="Student Affairs Office">Student Affairs Office</option>
                                <option value="Academic Affairs Office">Academic Affairs Office</option>
                                <option value="Career Services Office">Career Services Office </option>
                                <option value="International Student Services Office">International Student Services Office</option>
                                <option value="Office of the Dean">Office of the Dean</option>
                            </select>
                            <input type="hidden" id="concern" name="concern" value="Department">
                            <input type="hidden" id="type" name="type" value="3">
                            <button name="department-con" class="pop-submit-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>