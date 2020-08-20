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
    header('location: ' . $_ENV['BASE_URL'] .'/dashboard');
}
if (isset($_POST['submit'])) {
     if ($_POST['email'] == NULL) {
        $error = 'Please Enter Your Email Address';
    } elseif ($_POST['password'] == NULL) {
        $error = 'Please Enter Your Password';
    } elseif (!$users->login($_POST['email'], $_POST['password'])) {
        $error = 'Name or Password Do Not Match Please Try Again Later';

    } elseif ($_POST['password'] == NULL) {
        $error = 'Please Enter Your Password';
    } elseif (isset($_POST['remmemberPass'])) {
        die($_ENV['BASE_URL'] . '/dashboard');
        setcookie('user', $_POST['first_name'], time() + (10 * 365 * 24 * 60 * 60));
        $_SESSION['user'] = $_POST['email'];
        $positive         = 'You Have Logged In';
        header('location: ' . $_ENV['BASE_URL'] .'/dashboard');
    } else {
        $_SESSION['last_active'] = time();
        $_SESSION['user'] = $_POST['email'];
        //$_SESSION['email'] = $_POST['email'];
        header('location: ' . $_ENV['BASE_URL'] .'/dashboard');
        die($_ENV['BASE_URL'] . '/dashboard');
        $positive = 'You Have Logged In';
    }


}

?>

<div class="container mt-4">
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
                 <div class="w-100"></div>
                 <div class="col-md-4 justify-content-centerr">
                     <label for="email">Email</label>
                     <input type="email" class="form-control" id="email" name="email">
                 </div>
                 <div class="w-100"></div>
                 <div class="col-md-4 justify-content-center">
                     <label for="password">Password</label>
                     <input type="password" class="form-control" id="password" name="password">
                 </div>
                 <div class="w-100"></div>
                 <div class="col-md-4 justify-content-center">
                     <div class="form-check">
                         <input class="form-check-input" type="checkbox" id="gridCheck" value = 'remmemberPass' name="remmemberPass">
                         <label class="form-check-label" for="gridCheck">
                             Remember Password
                         </label>
                         <a class="text-secondary offset-1" href="forgot_password.php"> Forgot Password? </a>
                     </div>
                 </div>
                 <div class="w-100"></div>
                 <div class="col-md-4 justify-content-center">

                 <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="w-100"></div>
            </div> <!-- End Row -->
        </form>

         </div>
     </div>
