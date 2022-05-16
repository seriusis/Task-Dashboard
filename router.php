<?php

namespace app;
use Bramus\Router\Router;
use app\controller\UserController;

//$route = $_SERVER['REQUEST_URI'];
//$action = 'index';

//switch ($route){
//    case '/' : $controller = new app\controller\HomeController();
//    break;
//
//    case '/form' : $controller = new app\controller\FormController();
//        break;
//}
//$controller->$action();


$router = new Router();

$router->setNamespace('app\controller');

$router->get('/', 'HomeController@index');

$router->get('/form', 'FormController@index');
$router->post('/success', 'FormController@success');

$router->get('/list', 'TaskController@list');
$router->get('/task/{id}', 'TaskController@task');
$router->get('/create', 'TaskController@create');
$router->post('/create', 'TaskController@create');

$router->get('/update/{id}', 'TaskController@update');
$router->post('/update/{id}', 'TaskController@update');

$router->get('/delete/{id}','TaskController@delete');

$router->post('/login/', 'AuthController@login');
$router->get('/logout/', 'AuthController@logout');

$router->get('/register/','RegisterController@index');
$router->post('/register/','RegisterController@register');


$router->before('GET|POST','/list|task*|create|update*|delete*',function (){
    if(!UserController::isAuth())  {
        header('Location:/');
    }
});


$router->run();
