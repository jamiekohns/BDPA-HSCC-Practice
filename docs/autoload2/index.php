<?php

include_once('autoloader.php');

// Write an autoloader function in autoloader.php.
// Then, create an instance of each class in /lib
// and output the return of each object's "getName" method
// you may NOT use any other includes!

use \Acidenlay\Den\Den;

$den = new Den();
echo $den->getName();

// echo 'getName()' for each class found in /lib
