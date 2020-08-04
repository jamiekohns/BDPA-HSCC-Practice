
<!DOCTYPE html>
<?php require 'init.php';?>
<?php $page_title = 'Create New User' ?>
<?php include_once 'web-assets/tpl/app_header.php'; ?>
<?php include_once 'web-assets/tpl/app_nav.php'; ?>
<?php
use Flights\Database\User;
use Flights\RestRequest\ApiInfo;

if($_SESSION['type'] == 1 || $_COOKIE['type'] == 1){
    header('location: user_signup.php');
}
if(!isset($_SESSION['user']) && !isset($_COOKIE['user']) ){
    header('location: login.php');
}

$error = '';

    $make_user = new User();

    if(isset($_POST['submit'])){
        if($_POST['first_name'] == NULL){
            $error = 'Please Enter Your First Name';
        } elseif ($_POST['last_name'] == NULL){
            $error = 'Please Enter Your Last Name';
        } elseif ($_POST['password'] == NULL){
            $error = 'Please Enter Your Password';
        } elseif ($_POST['password2'] !== $_POST['password']){
            $error = 'The Two Passwords Do Not Match';
        } elseif ($_POST['email'] == NULL){
            $error = 'Please Enter Your Email Address';
        } else {
            $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
//17
    $make_user->create_user($_POST['first_name'], $_POST['last_name'], $password_hash, 'M.', $_POST['middle_name'], NULL,NULL,NULL,NULL,$_POST['email'],NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL, 0);

    $password_hash = NULL;
    //header('location: login.php');
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
        <h1 class="text-center"> Create an Account </h1>
        <div class="container">
            <?php
                if ($error) {
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            ?>
            <form action="admin_add_user.php" method="post">
                <div class="form-group col-md-6 ">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Please Enter Your First Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Optional">
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Please Enter Your Last Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Please Enter Your Last Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Please Enter Your Password">
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Confirm Password</label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Please Confirm Your Password">
                </div>
                <div class="col-md-6">

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
               </div>
           </form>
