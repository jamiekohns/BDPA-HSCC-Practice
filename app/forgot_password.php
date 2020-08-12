
<?php require 'init.php';?>
<?php $page_title = 'Forgot Password' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_header.php'; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_nav.php'; ?>
<?php
use Flights\Database\User;
if(isset($_SESSION['user']) && isset($_COOKIE['user']) ){
    header('location: user_dashboard.php');
}
$error = '';
if(isset($_POST['submit'])){
    if ($_POST['first_name'] == NULL){
        $error = 'Please Enter Your First Name';
    } elseif ($_POST['last_name'] == NULL){
        $error = 'Please Enter Your Last Name';
    } elseif ($_POST['email'] == NULL){
        $error = 'Please Enter Your Email Address';
    } else {
        $user = new User();
        $user->get_questions($_POST['first_name'], $_POST['last_name'], $_POST['email']);
        header('location: answer_questions.php');
    }

}

?>

    <?php
        if ($error) {
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }
    ?>
    <br>
    <h1 class="text-center"> Forgot Password </h1>

<form class="container mt-4" action="forgot_password.php" method="post">
    <div class="row justify-content-center"> <!-- Start Row -->
        <div class="w-100"></div>
         <div class="col-md-4 justify-content-center">
             <label for="first_name">First Name</label>
             <input type="text" class="form-control" id="first_name" name="first_name">
         </div>
         <div class="w-100"></div>
         <div class="col-md-4 justify-content-center">
             <label for="last_name">Last Name</label>
             <input type="text" class="form-control" id="last_name" name="last_name">
         </div>
         <div class="w-100"></div>
         <div class="col-md-4 justify-content-centerr">
             <label for="email">Email</label>
             <input type="email" class="form-control" id="email" name="email">
         </div>
         <div class="w-100"></div>
         <div class="col-md-4 justify-content-center">
         <hr>
         <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="w-100"></div>
    </div>
</form>

    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_footer.php'; ?>
