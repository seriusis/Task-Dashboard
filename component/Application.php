<?php

namespace app\component;

use Illuminate\Database\Capsule\Manager as Capsule;


class Application{
    public static function run(){
        self::config();
    }

    public static function config(){
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => '127.0.0.1:3306',
            'database' => 'app_todo',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

// Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();

        require_once 'router.php';
    }
}
