<?php session_start();
require 'init.php';
use Flights\Database\User;

$error = '';

//This part should be in Config.php since we didn;t make one yet I put it here
$dsn = 'mysql:dbname=flights;host=192.168.64.2;port=3306';
$user = 'flights';
$password = 'Password';

try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
//Until here

$make_user = new User();

if(isset($_POST['submit'])){
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = intval($_POST['phone']);

    $make_user->create_user($_POST['first_name'], $_POST['last_name'], $password_hash, $_POST['title'], $_POST['middle_name'],
    $_POST['suffix'], $_POST['dob'], $_POST['gender'], $phone, $_POST['email'], $_POST['security_question_1'], $_POST['security_question_2'],
    $_POST['security_question_3'], $_POST['security_answer_1'], $_POST['security_answer_2'], $_POST['security_answer_3'],
    1, $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['country']);
    $password_hash = NULL;
}
?>

<html>
    <head>
        <title>Create New User</title>
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
            <form action="user_signup.php" method="post">
                <div class="form-group col-md-6">
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
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Please Enter Your Email Address">
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
                <div class="col-md-6">

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
               </div>
           </form>
