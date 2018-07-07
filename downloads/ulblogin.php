<?php 
  if(!isset($_SESSION)) 
    session_start(); 
  if(isset($_SESSION['uid']))
    header("location:ulbhome.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Online PMAY E-learning module for ULBs and general citizens">
  <meta name="keywords" content="PMAY, Pradhan Mantri Awas Yojna, ULBs, Urban Local Bodies, E-learning, State of Maharashtra, policies">

  <title>Login</title>
 
  <link href="other/bootstrap/css/bootstrap.min.css" rel="stylesheet">  
  <link href="other/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">    
  <link href="css/login1.css" rel="stylesheet">
  
</head>

<body>


<section class="login-block">
    <div class="container">
      <div class="row">

        <div class="col-md-4 login-sec">
            <h2 class="text-center">ULBs Login</h2>
            <form class="login-form" action="UlbLoginProcess.php" method="post">

              <div class="form-group">
                <span class="text-uppercase" style="color:red;">
                    <?php if(isset($_SESSION['error']))
                     echo $_SESSION['error']; ?></span><br/>
                <label for="UlbUserName" class="text-uppercase">Username</label>
                <input type="text" class="form-control" placeholder="" value="<?php if(isset($_COOKIE['remember'])){echo $_COOKIE['user'];} ?>" name="name">              
              </div>
              <div class="form-group">
                <label for="UlbPassword" class="text-uppercase">Password</label>
                <input type="password" class="form-control" placeholder="" value="<?php if(isset($_COOKIE['remember'])){echo $_COOKIE['pwd'];} ?>" name="pwd">
              </div>            
              
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="remember">
                  <small>Remember Me</small>
                </label>
                <button type="submit" class="btn btn-login float-right" name="submit">Login</button>
              </div>        
            </form>
        </div>

        <div class="col-md-8 banner-sec">
        <!--image is displayed-->          
        </div>
      </div>
</section>


<script src="other/jquery/jquery.min.js"></script>
<script src="other/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="other/jquery-easing/jquery.easing.min.js"></script>
<?php unset($_SESSION['error']); ?>
</body>
</html>