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

$router->get('/dashboard/(\d+)/task/(\d+)', 'TaskController@task');
$router->get('/dashboard/(\d+)/task/create', 'TaskController@create');
$router->post('/dashboard/(\d+)/task/create', 'TaskController@create');

$router->get('/dashboard/(\d+)/task/(\d+)/update/', 'TaskController@update');
$router->post('/dashboard/(\d+)/task/(\d+)/update/', 'TaskController@update');

$router->get('/dashboard/(\d+)/task/(\d+)/delete/','TaskController@delete');


$router->post('/login/', 'AuthController@login');
$router->get('/logout/', 'AuthController@logout');

$router->get('/register/','RegisterController@index');
$router->post('/register/','RegisterController@register');

$router->get('/dashboard','DashboardController@list');
$router->get('/dashboard/(\d+)','DashboardController@get');

$router->before('GET|POST','list|task*|create|update*|delete*',function (){
    if(!UserController::isAuth())  {
        header('Location:/');
    }
});


$router->run();
