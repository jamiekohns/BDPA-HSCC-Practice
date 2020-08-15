<?php require '../../init.php';?>
<?php $page_title = 'Dashboard' ?>
<?php include_once '../../web-assets/tpl/app_header.php'; ?>
<?php include_once '../../web-assets/tpl/app_nav.php'; ?>
<?php
use Flights\Database\User;

if($_SESSION['type'] == 1 || $_COOKIE['type'] == 1){
    header('/dashboard');
}
if(!isset($_SESSION['user']) && !isset($_COOKIE['user']) ){
    header('location: login.php');
}
if(isset($_SESSION['user'])){
$user_name = $_SESSION['user'];
} elseif (isset($_COOKIE['user'])){
$user_name = $_COOKIE['user'];
}
 ?>
 <div class="jumbotron">
   <div class="container">
       <!-- Change the Admin to the persons actual name-->
     <h1 class="display-3"><?php echo 'Hello, ' . $user_name; ?></h1>
     <p>.</p>
   </div>
 </div>

 <div class="container">
   <div class="row">
     <div class="col-md-6">
       <h2>Create new user</h2>
       <p>Create new user accounts</p>
       <p><a class="btn btn-secondary" href="admin_add_user.php" role="button">Create Accounts</a></p>
     </div>
     <div class="col-md-6">
       <h2>Modify Users</h2>
       <p>View, edit, and delete accounts</p>
       <p><a class="btn btn-secondary" href="/account_modify.php" role="button">View Accounts</a></p>
     </div>
   </div>
   <hr>

 </div> <!-- /container -->


 <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_footer.php'; ?>
