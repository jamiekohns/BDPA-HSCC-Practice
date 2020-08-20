<?php require '../../init.php';?>
<?php $page_title = 'Dashboard' ?>
<?php include_once '../../web-assets/tpl/app_header.php'; ?>
<?php include_once '../../web-assets/tpl/app_nav.php'; ?>
<?php
use Flights\Database\User;

if($_SESSION['type'] == 1 || $_COOKIE['type'] == 1||$_SESSION['type'] == 2 ||$_SESSION['type'] == 2 ||$_SESSION['type'] == 3 ||$_SESSION['type'] == 3){
    header('location: '. $_ENV['BASE_URL'] .'/dashboard');
}
if(!isset($_SESSION['user']) && !isset($_COOKIE['user']) ){
    header('location: '. $_ENV['BASE_URL'] .'/login.php');
}


 ?>

 <div class="jumbotron">
   <div class="container">
       <!-- Change the Admin to the persons actual name-->
     <h1 class="display-3"><?php echo 'Hello, ' . ucfirst($_SESSION['user_information']['first_name']); ?> </h1>
     <p>.</p>
   </div>
 </div>

 <div class="container">
   <div class="row">
     <div class="col-md-4">
       <h2>Search Tickets</h2>
       <p></p>
       <p><a class="btn btn-secondary" href="search_ticket.php" role="button">Search Tickets</a></p>
     </div>
     <div class="col-md-4">
       <h2>View Customers</h2>
       <p></p>
       <p><a class="btn btn-secondary" href="view_customers.php" role="button">View Customer</a></p>
     </div>
     <div class="col-md-4">
       <h2>Create Tickets</h2>
       <p></p>
       <p><a class="btn btn-secondary" href="create_tickets.php" role="button">Create Tickets</a></p>
     </div>
   </div>
   <hr>

 </div> <!-- /container -->


 <?php include_once $_ENV['BASE_DIRECTORY'] . '/web-assets/tpl/app_footer.php'; ?>
