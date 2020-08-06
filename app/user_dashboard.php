<?php require 'init.php';?>
<?php $page_title = 'Dashboard' ?>
<?php include_once 'web-assets/tpl/app_header.php'; ?>
<?php include_once 'web-assets/tpl/app_nav.php'; ?>
<?php
use Flights\Database\User;

if($_SESSION['type'] == 2 || $_COOKIE['type'] == 2||$_SESSION['type'] == 3 || $_COOKIE['type'] == 3){
    header('location: admin_dashboard.php');
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
 <?php include_once 'web-assets/tpl/app_footer.php'; ?>
