<?php session_start();
require 'init.php';
<<<<<<< HEAD
=======
require 'vendor/autoload.php';
>>>>>>> f76fd9fecd161fe0792418d2867c3a644e99f611
if($_SESSION['type'] == 2 || $_COOKIE['type'] == 2){
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
