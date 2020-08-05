<!DOCTYPE html>
<?php require 'init.php';?>
<?php $page_title = 'Sign In Info' ?>
<?php include_once 'web-assets/tpl/app_header.php'; ?>
<?php include_once 'web-assets/tpl/app_nav.php'; ?>
<?php

if(!isset($_SESSION['user_info'])){
    header('location: login.php');
}

use Flights\Database\User;
use Flights\RestRequest\ApiInfo;
$error = '';

if(isset($_POST['submit'])){
    if($_POST['captcha'] !== '4'){
        $error = 'Invalid Captcha Please Try Again';
    } elseif ($_POST['password'] == NULL){
        $error = 'Please Enter Your Password';
    } elseif ($_POST['password2'] !== $_POST['password']){
        $error = 'The Two Password Do Not Match';
    }elseif ($_POST['dob'] == NULL){
        $error = 'Please Enter Your Date Of Birth';
    }elseif ($_POST['phone'] == NULL){
        $error = 'Please Enter Your Phone Number';
    }elseif ($_POST['security_question_1'] == NULL){
        $error = 'Please Enter Your Security Questions';
    }elseif ($_POST['security_answer_1'] == NULL){
        $error = 'Please Answer Your Security Questions';
    }elseif ($_POST['security_question_2'] == NULL){
        $error = 'Please Enter Your Security Questions';
    }elseif ($_POST['security_answer_2'] == NULL){
        $error = 'Please Answer Your Security Questions';
    }elseif ($_POST['security_question_3'] == NULL){
        $error = 'Please Enter Your Security Questions';
    }elseif ($_POST['security_answer_3'] == NULL){
        $error = 'Please Answer Your Security Questions';
    } else {
        $user = new User();
        $user->confirmed($_SESSION['user_info']['first_name'],$_SESSION['user_info']['last_name'],$_SESSION['user_info']['email'], $_POST['password'],$_POST['title'],$_POST['suffix'],$_POST['dob'],$_POST['gender'],
        $_POST['phone'], $_POST['security_question_1'],
        $_POST['security_question_2'], $_POST['security_question_3'], $_POST['security_answer_1'],
        $_POST['security_answer_2'], $_POST['security_answer_3'],
        $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['country']);
        $user->login($_SESSION['user_info']['first_name'], $_SESSION['user_info']['last_name'], $_SESSION['user_info']['email'], $_POST['password']);
        $_SESSION['last_active'] = time();
        $_SESSION['user'] = $_POST['first_name'];
        $_SESSION['user_info'] = NULL;
        header('location: user_dashboard.php');



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
        <form action="sign_in_info.php" method="post">
        <div class="form-group col-md-6">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Please Enter Your Password">
        </div>
        <div class="form-group col-md-6">
            <label for="password">Confirm Password</label>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Please Confirm Your Password">
        </div>
        <div class="form-group col-md-6">
            <label for="Suffix">Suffix</label>
            <input type="text" class="form-control" id="Suffix" name="suffix" placeholder="Optional">
        </div>
        <div class="form-group col-md-6">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
        </div>
        <div class="form-group col-md-6">
            <label for="phone">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Please Enter Your Phone Number">
        </div>
        <div class="form-group col-md-6">
            <label for="security_question_1">Security Question 1</label>
            <input type="text" class="form-control" id="security_question_1" name="security_question_1" placeholder="Enter a Security Question(This Can Be Used to Access Your Account)">
        </div>
        <div class="form-group col-md-6">
            <label for="security_answer_1">Security Answer 1</label>
            <input type="text" class="form-control" id="security_answer_1" name="security_answer_1" placeholder="Enter the Answer to The Security Question Above">
        </div>
        <div class="form-group col-md-6">
            <label for="security_question_2">Security Question 2</label>
            <input type="text" class="form-control" id="security_question_2" name="security_question_2" placeholder="Enter a Security Question(This Can Be Used to Access Your Account)">
        </div>
        <div class="form-group col-md-6">
            <label for="security_answer_2">Security Answer 2</label>
            <input type="text" class="form-control" id="security_answer_2" name="security_answer_2" placeholder="Enter the Answer to The Security Question Above">
        </div>
        <div class="form-group col-md-6">
            <label for="security_question_3">Security Question 3</label>
            <input type="text" class="form-control" id="security_question_3" name="security_question_3" placeholder="Enter a Security Question(This Can Be Used to Access Your Account)">
        </div>
        <div class="form-group col-md-6">
            <label for="security_answer_3">Security Answer 3</label>
            <input type="text" class="form-control" id="security_answer_3" name="security_answer_3" placeholder="Enter the Answer to The Security Question Above">
        </div>
        <div class="form-group col-md-6">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Please Enter Your Address">
        </div>
        <div class="form-group col-md-6">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Please Enter Your City">
        </div>
        <div class="form-group col-md-6">
            <label for="state">State</label>
            <input type="text" class="form-control" id="state" name="state" placeholder="Please Enter Your State">
        </div>
        <div class="form-group col-md-6">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="country" name="country" placeholder="Please Enter Your Country">
        </div>
        <div class="form-group col-md-6">
            <label for="zip">Zip/Postel Code</label>
            <input type="text" class="form-control" id="zip" name="zip" placeholder="Please Enter Your Zip/Postel Code">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender">
                <option value="Select Option">--Select Option--</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="O">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <select name="title" id="title">
                <option value="Select Option">--Select Option--</option>
                <option value="M.">M.</option>
                <option value="Mr.">Mr.</option>
                <option value="Ms.">Ms.</option>
                <option value="Mrs.">Mrs.</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="Captcha">Captcha</label>
            <input type="text" class="form-control" id="captcha" name="captcha" placeholder="2+2">
        </div>
        <div class="col-md-5 justify-content-center">

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
       </div>
   </form>

</html>
