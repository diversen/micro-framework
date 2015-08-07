<?php

include "vendor/autoload.php";

session_start();
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 1);

// use framework and conf\ary
use diversen\micro;
use diversen\micro\conf;

// load config.php
conf::loadMain();

// add routes
$s = new micro();
$s->execute();
