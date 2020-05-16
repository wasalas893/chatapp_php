<?php

session_start();

include("include/connection.php");

       if(isset($_POST['sign_in'])){
       
        $email=htmlentities(mysqli_real_escape_string($con,$_POST['user_email']));
        $pass=htmlentities(mysqli_real_escape_string($con,$_POST['user_pass']));


        

       }


?>