<?php
    ini_set("display_errors", "1");
    error_reporting(E_ALL);

    $email = $password = "";
    $emailErr = $passwordErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
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
      if(empty($_POST["password"]))
      {
          $passwordErr = "Password is Required!";
          //die("FILL UP ALL THE INFORMATION NEEDED");
      }
      else
      {
        $password = $_POST["password"];
      }
    }
    
    if($email && $password)
    {
	    include("connection.php");

        $check_email = mysqli_query ($connect_db, "SELECT * FROM student_account WHERE email = '$email'");
        $check_email_row = mysqli_num_rows($check_email);

        if($check_email_row > 0)
        {
	        while($row = mysqli_fetch_assoc($check_email))
            {
                $account_password = $row ["password"];
            
                if($password == $account_password)
                {
                    echo "<script>window.location.href = 'test.php'</script>";
                }
                else
                {
                    $passwordErr = "Password is Incorrect!";
                }
            }
	        
	    }
		else
		{
		  $emailErr = "Email is not registered";
		}
   }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Log In</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link rel="stylesheet"  href="style.css">
    </head>

    <body>
        <h1 class="emphasis wt">Appointment Scheduling System</h1>
        
        <div class="center-div">
            <p class="emphasis wt">Log In</p>
            <span> <p class="error"><?php echo $emailErr;?> </p> </span>
            <span> <p class="error"><?php echo $passwordErr;?> </p> </span>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input  type="email" name="email" placeholder="Email" title="Email is required">
                <input  type="password" name="password" placeholder="password" title="Password is required">
                <button class="default-btn">Log In</button>
            </form>
            <div class="div-inline">
                <button id="forgotBtnID" onclick="location.href = 'forgot.php';" class="default-btn">Forgot Password</button>
                <button id="registerBtnID" onclick="location.href = 'register.php';" class="default-btn">Register</button>
            </div>
        </div>

        <p class="wt" style="margin-bottom: 5%;font-size: 28px">something@gmail.com | 09935184912</p>
    </body>

<html>