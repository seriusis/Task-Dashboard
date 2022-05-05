<?php



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


$router = new \Bramus\Router\Router();

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


$router->run();
