<!DOCTYPE html>
<html lang="en">
<head>
	<title>Create new Password</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
	<link rel="stylesheet" type="text/css" href="css/signin.css">
</head>
<body>
<div class="signin-form">
    <form action="" method="post">
		<div class="form-header">
			<h2>Create New Password</h2>
			<p>MyChat</p>
		</div>
		<div class="form-group">
			<label>Enter Password</label>
        	<input type="password" class="form-control" placeholder="Password" name="pass1" autocomplete="off" required="required">
        </div>
        <div class="form-group">
			<label>Confirm Password</label>
            <input type="password" class="form-control" placeholder="Confirm Password" name="pass2" autocomplete="off" required="required">
        </div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block btn-lg" name="change">Change</button>
		</div>
    </form>
</div>
</body>
</html>
<?php 
session_start();

include("include/connection.php"); 



	if(isset($_POST['change'])){
		
		$user = $_SESSION['user_email'];
	    $pass1 = $_POST['pass1'];
	    $pass2 = $_POST['pass2'];

	    if($pass1 != $pass2){
	        echo"
	          <div class='alert alert-danger'>
	            <strong>Your new password did't match with each other</strong> 
	          </div>
	        ";
	    }
	    if($pass1 < 9 AND $pass2 < 9){
	        echo"
	          <div class='alert alert-danger'>
	            <strong>Use 9 or more than 9 characters</strong> 
	          </div>
	        ";
	    }
	    if($pass1 == $pass2){
            $update_pass = mysqli_query($con, "UPDATE users SET user_pass='$pass1' WHERE user_email='$user'");
            session_destroy();
            echo"
            	<script>alert('Go ahead and signin')</script>
            	<script>window.open('signin.php','_self')</script>
            ";
        }
	
	}


?>