<?php
error_reporting(E_ALL);
include_once('autoloader.php');

// Write an autoloader function in autoloader.php.
// Then, create an instance of each class in /lib
// and output the return of each object's "getName" method
// you may NOT use any other includes!

use \Acidenlay\Den\Den;
use \FinatiTaing\Fashlorton\Fashlorton;

$den = new Den(1);
echo $den->getName() . "\n";
$denAlso = new Den(2);
echo $denAlso->getName() . "\n";


// echo 'getName()' for each class found in /lib
