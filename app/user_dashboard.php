<?php session_start();
<<<<<<< HEAD
require 'init.php';
=======
require 'vendor/autoload.php';
>>>>>>> 0782ace9e66a28c6fe70729191e5d920e709ff54
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
