<?php
   include("dbcon.php");
   session_start();
   
   if(isset($_POST["submit"])) {
      $myusername = $_POST['username'];
      $mypassword = $_POST['password'];
      $sql = "SELECT * FROM branch WHERE mobile = '$myusername' and pass = '$mypassword' and status = 'Yes'";
      
      $result = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($result);
      
      if($count >= 1) {
          while($row=mysqli_fetch_assoc($result))
          {
             $post = $row['post'];
             $_SESSION['login_mobile'] = $myusername;
             $_SESSION['login_password'] = $mypassword;
             $_SESSION['login_post'] = $post;
             header("location:dashboard.php"); 
          }
      }
      else
      {
          echo "<script>alert('Your Login Name or Password is invalid');</script>";
      }
   }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prompt Dairy Tech</title>
  <link rel="shortcut icon" type="x-icon" href="ekomilkultramb.jpg">

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="prompt.jpeg" height="150" width="150"/>
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <form role="form" method="POST">
                                    <hr />
                                    <h5>Enter Details to Login</h5>
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Username " name="username"/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Your Password" name="password"/>
                                        </div>
                                     <button type="submit" class="btn btn-primary" name="submit">Login Now </button>
                                    <!--hr />
                                    Not register ? <a href="index.html" >click here </a> or go to <a href="index.html">Home</a--> 
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
