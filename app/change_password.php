<!DOCTYPE html>
<?php require 'init.php';?>
<?php $page_title = 'Forgot Password' ?>
<?php include_once 'web-assets/tpl/app_header.php'; ?>
<?php include_once 'web-assets/tpl/app_nav.php'; ?>
<?php
require 'init.php';
use Flights\Database\User;

if(isset($_SESSION['user']) && isset($_COOKIE['user'])){
    header('location: user_dashboard.php');
}
if(!isset($_SESSION['forgot'])){
    header('location: forgot_password.php');
}
$error = '';
if(isset($_POST['submit'])){
    if ($_POST['password'] == NULL){
        $error = 'Please Enter Your Password';
    } elseif ($_POST['password'] !== $_POST['password2']){
        $error = 'The Two Passwords Do Not Match';
    } else {
        $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user = new User();
        $user->change_password($_SESSION['forgot_password']['first_name'], $_SESSION['forgot_password']['last_name'], $_SESSION['forgot_password']['email'], $password_hash);
        $password_hash = NULL;
        $_SESSION['forgot_password'] = NULL;
        $_SESSION['forgot'] = NULL;
        header('location: login.php');
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
    <?php
        if ($error) {
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }
    ?>
    <h1> Please Reset Password </h1>
    <br>
    <form action="change_password.php" method="post">

        <div class="form-group col-md-6">
            <label for="password"> Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Please Enter Your New Password">
        </div>
        <div class="form-group col-md-6">
            <label for="password"> Confirm Password</label>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Please Confirm Your New Password">
        </div>
        <div class="col-md-6">

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
       </div>
    </form>
