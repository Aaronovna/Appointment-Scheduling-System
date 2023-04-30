<?php
    $connect_db = mysqli_connect ("localhost","root","","ass_db");

    if(mysqli_connect_errno())
    {
        echo "Failed to connect to Mysqli; " . mysqli_connect_error();
    }
?>