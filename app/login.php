<!DOCTYPE html>
<?php
require 'init.php';
?>
<?php
$page_title = 'Log In'?>
<?php
include_once 'web-assets/tpl/app_header.php';
?>
<?php
include_once 'web-assets/tpl/app_nav.php';
?>
<?php
use Flights\Database\User;
use Flights\RestRequest\ApiInfo;


$users = new User();
$error    = '';
$positive = '';

if(isset($_SESSION['user'])||isset($_COOKIE['user'])){
    header('location: user_dashboard.php');
}
if (isset($_POST['submit'])) {
    if ($_POST['first_name'] == NULL) {
        $error = 'Please Enter Your First Name';
    } elseif ($_POST['last_name'] == NULL) {
        $error = 'Please Enter Your Last Name';
    } elseif ($_POST['email'] == NULL) {
        $error = 'Please Enter Your Email Address';
    } elseif ($_POST['password'] == NULL) {
        $error = 'Please Enter Your Password';
    } elseif (!$users->login($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'])) {
        $error = 'Name or Password Do Not Match Please Try Again Later';

    } elseif ($_POST['password'] == NULL) {
        $error = 'Please Enter Your Password';
    } elseif (isset($_POST['remmemberPass'])) {
        setcookie('user', $_POST['first_name'], time() + (10 * 365 * 24 * 60 * 60));
        $_SESSION['user'] = $_POST['first_name'];
        $positive         = 'You Have Logged In';
        header('location: user_dashboard.php');
    } else {
        $_SESSION['last_active'] = time();
        $_SESSION['user']        = $_POST['first_name'];
        header('location: user_dashboard.php');
        $positive = 'You Have Logged In';
    }


}

?>
 <html>
     <head>
         <script src="web-assets/js/jquery-3.5.1.min.js"></script>
         <script src="web-assets/js/bootstrap.min.js"></script>
         <link href="web-assets/css/bootstrap.min.css" type="text/css" rel="stylesheet">
         <link href="web-assets/css/style.css" type="text/css" rel="stylesheet">
     </head>
     <body>
         <br>
         <br>
         <br>
         <br>
         <h1 class="text-center"> Log In </h1>
         <div class="container bg-light">
             <?php
if ($error) {
    echo '<div class="alert alert-danger">' . $error . '</div>';
}
?>
       <form action="login.php" method="post">
            <div class="row justify-content-center"> <!-- Start Row -->
                <div class="w-100"></div>
                 <div class="col-md-5 justify-content-center">
                     <label for="first_name">First Name</label>
                     <input type="text" class="form-control" id="first_name" name="first_name">
                 </div>
                 <div class="w-100"></div>
                 <div class="col-md-5 justify-content-center">
                     <label for="first_name">Last Name</label>
                     <input type="text" class="form-control" id="last_name" name="last_name">
                 </div>
                 <div class="w-100"></div>
                 <div class="col-md-5 justify-content-centerr">
                     <label for="email">Email</label>
                     <input type="email" class="form-control" id="email" name="email">
                 </div>
                 <div class="w-100"></div>
                 <div class="col-md-5 justify-content-center">
                     <label for="password">Password</label>
                     <input type="password" class="form-control" id="password" name="password">
                 </div>
                 <div class="w-100"></div>
                 <div class="col-md-5 justify-content-center">
                     <div class="form-check">
                         <input class="form-check-input" type="checkbox" id="gridCheck" value = 'remmemberPass' name="remmemberPass">
                         <label class="form-check-label" for="gridCheck">
                             Remember Password
                         </label>
                         <a class="offset-2 text-secondary" href="forgot_password.php"> Forgot Your Password? </a>
                     </div>
                 </div>
                 <div class="w-100"></div>
                 <div class="col-md-5 justify-content-center">

                 <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="w-100"></div>
            </div> <!-- End Row -->
        </form>

         </div>
     </body>
 </html>
