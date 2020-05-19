<!DOCTYPE html>
<?php
session_start();
include("include/connection.php");
include("include/header.php");
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
<div class="row">
  <div class="col-sm-2">
  </div>
  <?php 
      $user = $_SESSION['user_email'];
      $get_user = "select * from users where user_email='$user'"; 
      $run_user = mysqli_query($con,$get_user);
      $row=mysqli_fetch_array($run_user);
            
      $user_name = $row['user_name'];
      $user_pass = $row['user_pass'];
      $user_email = $row['user_email'];
      $user_profile = $row['user_profile'];
      $user_country = $row['user_country'];
      $user_gender = $row['user_gender'];
  ?>
  <div class="col-sm-8">
    <form action="" method="post" enctype="multipart/form-data">
          <table class="table table-bordered table-hover">
            <tr align="center">
              <td colspan="6" class="active"><h2>Change Account Settings</h2></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Change Your Username</td>
              <td>
              <input class="form-control" type="text" name="u_name" required="required" value="<?php echo $user_name;?>"/>
              </td>
            </tr>
            
            <tr><td></td><td><a class="btn btn-default" style="text-decoration: none;font-size: 15px;" href="upload.php"><i class="fa fa-user" aria-hidden="true"></i> Change Profile</a></td></tr>

            <tr>
              <td style="font-weight: bold;">Email</td>
              <td>
              <input class="form-control" type="email" name="u_email" required="required" value="<?php echo $user_email;?>"></td>
            </tr>

            <tr>
              <td style="font-weight: bold;">Country</td>
              <td>
              <select class="form-control" name="u_country">
                <option><?php echo $user_country;?></option>
                <option>Afghanistan</option>
                <option>India</option>
                <option>Pakistan</option>
                <option>United States</option>
                <option>United Arab Emirates</option>
              </select>
              </td>
            </tr>
            
            <tr>
              <td style="font-weight: bold;">Gender</td>
              <td>
              <select class="form-control" name="u_gender">
                <option><?php echo $user_gender;?></option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
              </select>
              </td>
            </tr>
            

            <!-- recovery option start -->

            <tr>
              <td style="font-weight: bold;">Forgotten Password</td>
              <td>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Forgotten Password</button>

              <!-- Modal -->
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form action="recovery.php?id=<?php echo $user_id;?>" method="post" id="f">
                      <strong>What is your School Best Friend Name?</strong>
                      <textarea class="form-control" cols="83" rows="4" name="content" placeholder="Someone"></textarea><br/>
                      <input class="btn btn-default" type="submit" name="sub" value="Submit" style="width:100px;" /><br><br>
                      <pre >Answer the above question we will ask you this question if you forgot your <br>password.
                      </pre>
                      <br><br>
                      </form>
                      <?php
                      if(isset($_POST['sub'])){
                        $bfn = htmlentities($_POST['content']);

                        if($bfn==''){
                
                        echo "<script>alert('Please Enter Something!')</script>";
                        echo "<script>window.open('account_settings.php','_self')</script>";
                        
                        exit();
                        
                        }
                        else {

                        $update = "update users set forgotten_answer='$bfn' where user_email='$user'";
              
                        $run = mysqli_query($con,$update);
                        
                        if($run){
                        
                        echo "<script>alert('Working...!')</script>";
                        echo "<script>window.open('account_settings.php?','_self')</script>";
                        }else{
                        echo "<script>alert('Error while Updating information...!')</script>";
                        echo "<script>window.open('account_settings.php','_self')</script>";
                        }
                        }
                      }
                      ?>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
            </tr>
            <!-- recovery option ends -->

            <tr><td></td><td><a class="btn btn-default" style="text-decoration: none;font-size: 15px;" href="change_password.php"><i class="fa fa-key fa-fw" aria-hidden="true"></i> Change Password</a></td></tr>

            <tr align="center">
              <td colspan="6">
              <input class="btn btn-info" style="width: 250px;" type="submit" name="update" value="Update"/>
              </td>
            </tr>
          </table>
        </form>
        <?php

          if(isset($_POST['update'])){
          
          $user_name = htmlentities($_POST['u_name']);
          $email = htmlentities($_POST['u_email']);
          $u_country = htmlentities($_POST['u_country']);
          $u_gender = htmlentities($_POST['u_gender']);
          
          
          $update = "update users set user_name='$user_name',user_email='$email',user_country='$u_country',user_gender='$u_gender' where user_email='$user'";
          
          $run = mysqli_query($con,$update); 
          
          if($run){
              echo "<script>window.open('account_settings.php','_self')</script>";
          }
        }

        ?>
  </div>
  <div class="col-sm-2">
  </div>
</div>


    
</body>
</html>

<?php } ?>