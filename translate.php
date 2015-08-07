<?php

include_once "vendor/autoload.php";
use diversen\translate\extractor;
$e = new extractor();

$e->setDirsInsideDir('modules/*');
//$e->setDirsInsideDir('vendor/diversen/simple-php-classes');

print_r($e->dirs);

$e->updateLang();


