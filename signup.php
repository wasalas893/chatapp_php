<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <title>chatapp</title>


</head>
<body>
      <div class="signup-form">
         <form action="" method="post">
           <div class="form-header">
              <h2>Sign Up</h2>
              <p>Fill his From with your friends.</p>
           </div>
           <div class="form-group">
             <label>Username</label>
             <input type="text" class="form-control" name="user_name" placeholder="Example:sunanda" autocomplete="off" required>
             
             </div>
             <div class="form-group">
             <label>Email</label>
             <input type="email" class="form-control" name="user_email" placeholder="wasalas893@gmail.com" autocomplete="off" required>
             
             </div>
             <div class="form-group">
             <label>Password</label>
             <input type="password" class="form-control" name="user_pass" placeholder="Password" autocomplete="off" required>
             
             </div>
             <div class="form-group">
             <label>Country</label>
             <select class="form-control" name="user_country" required>
                 <option disabled="">Select a Country</option>
                 <option>Sri lanka</option>
                 <option>India</option>
                 <option>UK</option>
                 <option>France</option>
             </select>
                          
             </div>
             <div class="form-group">
             <label>Gender</label>
             <select class="form-control" name="user_gender" required>
                 <option disabled="">Select a Gender</option>
                 <option>Male</option>
                 <option>Female</option>
                 <option>Others</option>
                 
             </select>
                          
             </div>
             <div class="form-group">
                 <label class="checkbox-inline">
                     <input type="checkbox" required>
                     I accept the <a href="#">Term of User</a>
                     &amp;<a href="#">Privacy Policy</a>
                 </label>
             </div>

           
             <div class="form-group">
                 <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign Up</button>
             </div>
           <!--  <?php //include("signup_user.php"); ?> -->
         
         </form>
          <div class="text-center small" style="color: red;">Already have an account?<a href="signin.php">Signin here</a></div>
      </div>
    
</body>
</html>