<!DOCTYPE html>
<?php
session_start();
include("find_friends_function.php");

if(!isset($_SESSION['user_email'])){
	
	header("location: signin.php");

}
else{ ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/find_people.css">
</head>
<body>
 <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
   <a class="navbar-brand" href="#" >
       <?php   
           $user=$_SESSION['user_email'];
           $get_user="select * from users where user_email='$user'";
           $run_user=mysqli_query($con,$get_user);
           $row=mysqli_fetch_array($run_user);

           $user_name=$row['user_name'];
           echo" <a class='navbar-brand' href='../home.php?user_name=$user_name'>chatapp </a>";
       ?>
   </a>
   <ul class="navbar-nav">
    <li><a style="color: white;text-decoration:none;font-size:20px;" href="../account_settings.php">
    Setting</a></li>
   
   </ul>

    
 </nav><br>
 <div class="row">
    <div class="col-sm-4">
    
    </div>
    <div class="col-sm-4">
      <form class="search_form" action="">
      <input type="text" name="search_query" placeholder="Search Friend" autocomplete="off" required>
      <button class="btn" style="color: white;text-decoration:none;font-size:20px;" type="submit" name="search_btn">Search</button>
      </form>
    </div>
    <div class="col-sm--4">
     
    </div>
 </div><br><br>
 <?php search_user(); ?>
    
</body>
</html>

<?php } ?>