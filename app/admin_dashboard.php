<?php session_start();
if($_SESSION['type'] == 1 || $_COOKIE['type'] == 1){
    header('location: user_dashboard.php');
}
if(isset($_SESSION['user'])){
echo '<h1> Hello' . ' ' . $_SESSION['user']. '</h1>';
} elseif (isset($_COOKIE['user'])){
echo '<h1> Hello' . ' ' . $_COOKIE['user']. '</h1>';
}
 ?>
