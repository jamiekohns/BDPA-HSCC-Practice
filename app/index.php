<?php 
require 'init.php';
if(!isset($_SESSION['user']) && !isset($_COOKIE['user']) ){
    echo '<form action="login.php">
    <button type="submit" name="submit" class="btn btn-primary">Log in</button>';
}
?>
