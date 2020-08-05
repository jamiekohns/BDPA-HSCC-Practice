<?php
//This file is just to test the User class
require 'vendor/autoload.php';

use \Flights\Database\User;

$dsn = 'mysql:dbname=flights;host=192.168.64.2;port=3306';
$user = 'flights';
$password = 'Password';

try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$login = new User();

$first_name = 'Suchit';

$last_name = 'Vemula';

$password = 'ThisIsAPassword';

$resonse = $login->login($db, $first_name, $last_name, $password);

echo $resonse;


 ?>
