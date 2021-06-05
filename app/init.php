<?php
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

if(isset($_SESSION['user'])){
    if(!isset($_COOKIE['user'])){
        if(time() - $_SESSION['last_active'] > 900){
            header('location:' . $_ENV['BASE_URL'] .  '/logout.php');
        } else {
            $_SESSION['last_active'] = time();
        }
    }

}
