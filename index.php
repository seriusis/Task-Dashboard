<?php

use app\component\Application;

use Illuminate\Database\Capsule\Manager as Capsule;


ini_set('display_errors',1);
ini_set('error_reporting',E_ALL);

require_once 'vendor/autoload.php';

Application::run();



