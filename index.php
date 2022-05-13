<?php

session_start();

use app\component\Application;

use Illuminate\Database\Capsule\Manager as Capsule;


ini_set('display_errors',1);
ini_set('error_reporting',E_ALL);

ini_set('log_errors',1);
ini_set('error_log',__DIR__.'\error-log.txt');

require_once 'vendor/autoload.php';


Application::run();



