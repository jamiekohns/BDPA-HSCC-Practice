<?php session_start();
require 'init.php';
use Flights\Database\User;
if(isset($_SESSION['user']) && isset($_COOKIE['user'])){
    header('location: user_dashboard.php');
}
if(!isset($_SESSION['forgot_password'])){
    header('location: forgot_password.php');
}
$error = '';
if(isset($_POST['submit'])){
    if ($_POST['security_question_1'] == NULL){
        $error = 'Please Answer Your First Security Question';
    } elseif ($_POST['security_question_2'] == NULL){
        $error = 'Please Answer Your Second Security Question';
    } elseif ($_POST['security_question_3'] == NULL){
        $error = 'Please Answer Your Third Security Question';
    } else {
        $user = new User();
        if($user->verify_answers($_SESSION['forgot_password']['first_name'], $_SESSION['forgot_password']['last_name'], $_SESSION['forgot_password']['email'], $_POST['security_question_1'], $_POST['security_question_2'], $_POST['security_question_3'])){
            $_SESSION['forgot'] = 'YES';
            header('location: change_password.php');
        } else{
            $error = 'Your Answers Do Not Match Answers Given When The Account Was Made';
        }
    }

}



?>

<html>
<head>
    <title> Forgot Password </title>
    <script src="web-assets/js/jquery-3.5.1.min.js"></script>
    <script src="web-assets/js/bootstrap.min.js"></script>
    <link href="web-assets/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="web-assets/css/style.css" type="text/css" rel="stylesheet">
</head>

<body>
    <?php
        if ($error) {
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }
    ?>
    <form action="answer_questions.php" method="post">
        <div class="form-group col-md-6">
            <label for="security_question_1"><?php echo $_SESSION['forgot_password']['security_question_1'] ?></label>
            <input type="text" class="form-control" id="security_question_1" name="security_question_1">
        </div>
        <div class="form-group col-md-6">
            <label for="security_question_2"><?php echo $_SESSION['forgot_password']['security_question_2'] ?></label>
            <input type="text" class="form-control" id="security_question_2" name="security_question_2">
        </div>
        <div class="form-group col-md-6">
            <label for="security_question_3"><?php echo $_SESSION['forgot_password']['security_question_3'] ?></label>
            <input type="security_question_3" class="form-control" id="security_question_3" name="security_question_3">
        </div>
        <div class="col-md-6">

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
       </div>
    </form>
