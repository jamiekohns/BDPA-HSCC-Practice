<?php require 'init.php';?>
<?php $page_title = 'Dashboard' ?>
<?php include_once 'web-assets/tpl/app_header.php'; ?>
<?php include_once 'web-assets/tpl/app_nav.php'; ?>
<?php
use Flights\Database\User;

if($_SESSION['type'] == 1 || $_COOKIE['type'] == 1){
    header('location: user_dashboard.php');
}
if(!isset($_SESSION['user']) && !isset($_COOKIE['user']) ){
    header('location: login.php');
}
if(isset($_SESSION['user'])){
echo '<h1> Hello' . ' ' . $_SESSION['user']. '</h1>';
} elseif (isset($_COOKIE['user'])){
echo '<h1> Hello' . ' ' . $_COOKIE['user']. '</h1>';
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
        <form action="admin_add_user.php">
            <button type="submit"> Create User</button>
        </form>
