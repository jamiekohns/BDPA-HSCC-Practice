<!DOCTYPE html>
<?php require 'init.php';?>
<?php $page_title = 'Forgot Password' ?>
<?php include_once 'web-assets/tpl/app_header.php'; ?>
<?php include_once 'web-assets/tpl/app_nav.php'; ?>
<?php
use Flights\Database\User;
if(isset($_SESSION['user']) && isset($_COOKIE['user']) ){
    header('location: user_dashboard.php');
}
$error = '';
if(isset($_POST['submit'])){
        if ($_POST['email'] == NULL){
        $error = 'Please Enter Your Email Address';
    } else {
        $user = new User();
        $user->get_questions($_POST['email']);
        header('location: answer_questions.php');
    }

}

?>

    <br>
    <br>
    <?php
        if ($error) {
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }
    ?>
    <br>
    <h1 class="text-center"> Forgot Password </h1>
    <br>
    <form action="forgot_password.php" method="post">
        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="col-md-6">

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
       </div>
    </form>
