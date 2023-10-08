<?php
    ini_set("display_errors", "1");
    error_reporting(E_ALL);

    $message='';

    session_start();
    $_SESSION["user"]="";

    include("connection.php");

    if($_POST)
    {
        $email=$_POST['email'];
        $password=$_POST['password'];

        $error='';

        $result= $connect_db->query("select * from student_account where email='$email'");

        if($result->num_rows==1)
        {
            $checker = $connect_db->query("select * from student_account where email='$email' and password='$password'");

            if ($checker->num_rows==1)
            {
                $_SESSION['user']=$email;
                header('location: student/student-dash.php');
            }
            else
            {
                $error='Wrong credentials: Invalid email or password';
            }
        }
        else
        {
            $error='We cant found any acount for this email.';
        }
    }
    else
    {
        $error='&nbsp;';
    }

    if (isset($_GET['action']) && $_GET['action'] == 'logout')
    {
        $message="You have been logged out successfully.";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Log In</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link rel="stylesheet"  href="styles/global.css">
    </head>

    <body>
        <h1 class="emphasis wt index">Appointment Scheduling System</h1>
        
        <div class="center-div">
            <p class="emphasis wt">Log In</p>
            <p class="error"><?php echo $error ?></p>
            
            <!-- <span> <p class="error"><?php echo $emailErr;?> </p> </span> -->
            <!-- <span> <p class="error"><?php echo $passwordErr;?> </p> </span> -->

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input  type="email" name="email" placeholder="Email" title="Email is required">
                <input  type="password" name="password" placeholder="password" title="Password is required">
                <button class="default-btn">Log In</button>
            </form>

            <p class="success"><?php echo $message ?></p>

            <div class="div-inline">
                <button id="forgotBtnID" onclick="location.href = 'forgot.php';" class="default-btn">Forgot Password</button>
                <button id="registerBtnID" onclick="location.href = 'register.php';" class="default-btn">Register</button>
            </div>
        </div>

        <p class="wt" style="margin-bottom: 5%;font-size: 28px">something@email.com | 09123456789</p>
    </body>

</html>