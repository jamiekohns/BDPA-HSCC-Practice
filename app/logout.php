<?php
require 'init.php';

    session_destroy();

if(isset($_COOKIE['user'])){
    setcookie('user', '', 1);
}
    header('location: login.php');






 ?>
