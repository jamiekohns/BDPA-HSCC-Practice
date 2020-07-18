<?php

include 'Acidenlay.php';
include 'AcidenlayChild.php';

use \Acidenlay\Acidenlay;
use \Acidenlay\AcidenlayChild;

$foo = new AcidenlayChild();

echo $foo->getName();
