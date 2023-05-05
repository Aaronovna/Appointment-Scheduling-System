<?php
    ini_set("display_errors", "1");
    error_reporting(E_ALL);

    include("connection.php");

    $email = $password = $student_number = $fname = $lname = $address = $birthdate = "";
    $emailErr = "";
    /*
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        if(empty($_POST["email"]))
      {
          $emailErr = "Email is Required!";
          //die("FILL UP ALL THE INFORMATION NEEDED");
      }
      else
      {
              $email = $_POST["email"];
      }

    }
    */

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $student_number = $_POST["student_number"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $address = $_POST["address"];
        $birthdate = $_POST["birthdate"];
    }

    $query = "INSERT INTO student_account (email, password, student_number, fname, lname, address, birthdate) 
              VALUES('$email', '$password', '$student_number', '$fname', '$lname', '$address', '$birthdate')";

    if($email && $password && $student_number && $fname && $lname && $address && $birthdate)
    {
        $check_email = mysqli_query($connect_db, "SELECT * FROM student_account WHERE email = '$email'");
        $check_email_row = mysqli_num_rows($check_email);
        if($check_email_row > 0)
        { 
            $emailErr = "Email is already registered!";
        }
        else
        {
            $insert_query = mysqli_query($connect_db, $query);
            echo "<script>window.location.href = 'index.php'</script>";
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link rel="stylesheet"  href="style.css">
    </head>

    <body>
    <div class="center-div">
            <p class="emphasis wt">Register</p>
            <span> <p class="error"><?php echo $emailErr;?> </p> </span>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="fname">Name</label>
                <div class="div-inline">
                    <input  type="text" name="fname" id="fname" placeholder="First Name" title="First Name is required" required>
                    <input  type="text" name="lname" id="lname" placeholder="Last Name" title="Last Name is required" required>
                </div>
                <label for="address">Address</label>
                <input  type="text" name="address" id="address" placeholder="Address" title="Address is required" required>
                
                <div class="space-bet">
                    <label for="studno">Student Number</label>
                    <label for="birthday">Birthday</label>
                </div>
                <div class="space-bet">
                    <input  type="text" name="student_number" id="student_number" placeholder="Student Number" title="Student Number is required" required>
                    <input  style="width: 325px" type="date" name="birthdate" id="birthdate" placeholder="Birthday" title="Birthday is required" required>
                </div>

                <div class="space-bet">
                    <label for="email">Email</label>
                    <label for="password">Password</label>
                </div>
                <div class="space-bet">
                    <input  type="email" name="email" id="email" placeholder="Email" title="Email is required" required>
                    <input  type="password" name="password" id="password" placeholder="Password" title="password is required" required>
                </div>
                <button class="default-btn">Register</button>
            </form>
            <div class="div-inline" style="align-items: baseline">
                <p class="wt">Already have an Account?</p>
                <button  id="loginBtnID" onclick="location.href = 'index.php';" class="default-btn" >Log In</button>
            </div>
        </div>
        
    </body>

<html>