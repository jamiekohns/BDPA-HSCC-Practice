<?php session_start();
require 'vendor/autoload.php';
use Flights\Database\User;

$users = new User();

if(isset($_SESSION['user'])){
    header('location: user_dashboard.php');
}
if(isset($_COOKIE['user'])){
    header('location: user_dashboard.php');

}
$error = NULL;
$positive = NULL;
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


if(isset($_POST['submit'])){
    if($_POST['first_name'] == NULL){
        $error = 'Please Enter Your First Name';
    }
    elseif($_POST['last_name'] == NULL){
        $error = 'Please Enter Your Last Name';
    }
    elseif($_POST['email'] == NULL){
        $error = 'Please Enter Your Email Address';
    }
    elseif($_POST['password']== NULL){
        $error = 'Please Enter Your Password';
    }
    elseif(!$users->login($db, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'])){
        $error = 'Name or Password Do Not Match Please Try Again Later';

    }elseif (isset($_POST['remmemberPass'])) {
        $_SESSION['user'] = $_POST['first_name'];
        setcookie('user', $_POST['first_name'], time()+(10 * 365 * 24 * 60 * 60));
        $positive = 'You Have Logged In';
        header('location: user_dashboard.php');
    } else
        $_SESSION['user'] = $_POST['first_name'];
        header('location: user_dashboard.php');
        $positive = 'You Have Logged In';


}

 ?>
 <html>
     <head>
         <title>Login</title>
         <script src="web-assets/js/jquery-3.5.1.min.js"></script>
         <script src="web-assets/js/bootstrap.min.js"></script>
         <link href="web-assets/css/bootstrap.min.css" type="text/css" rel="stylesheet">
         <link href="web-assets/css/style.css" type="text/css" rel="stylesheet">
     </head>
     <body>
         <div class="container">
             <?php
                 if ($error) {
                     echo '<div class="alert alert-danger">'.$error.'</div>';
                 }
             ?>
             <form action="login.php" method="post">
                 <div class="form-group col-md-6">
                     <label for="first_name">First Name</label>
                     <input type="text" class="form-control" id="first_name" name="first_name">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="first_name">Last Name</label>
                     <input type="text" class="form-control" id="last_name" name="last_name">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="email">Email</label>
                     <input type="email" class="form-control" id="email" name="email">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="password">Password</label>
                     <input type="password" class="form-control" id="password" name="password">
                 </div>
                 <div class="form-group form-group col-md-6">
                     <div class="form-check">
                         <input class="form-check-input" type="checkbox" id="gridCheck" value = 'remmemberPass' name="remmemberPass">
                         <label class="form-check-label" for="gridCheck">
                             Remember Password
                         </label>
                     </div>
                 </div>
                 <div class="col-md-6">

                 <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
             </form>
             <form action="user_signup.php">
                 <div class="col-md-6">

                 <button type="submit" name="submit" class="btn btn-success">Sign Up</button>
                </div>
            </form>

         </div>
     </body>
 </html>
