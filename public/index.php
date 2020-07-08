<?php
//echo 'Hello MVC';

//echo 'Requested URL = "'.$_SERVER['QUERY_STRING'].'"';
//require '../App/Controllers/Posts.php';
//require '../Core/Router.php';

//twig
require_once dirname(__DIR__) . '/vendor/autoload.php';

//autoloader
// spl_autoload_register(function($class){
//     $root = dirname(__DIR__);
//     $file = $root . '/'. str_replace('\\','/',$class).'.php';
//     if(is_readable($file)){
//         require $root . '/' . str_replace('\\','/',$class).'.php';
//     }
// });

//error Handler
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new Core\Router();
//echo get_class($router);

//Adding the routes
$router->add('',['controller'=>'Home','action'=>'index']);
//$router->add('posts',['controller'=>'Posts','action'=>'index']);
//$router->add('posts/new',['controller'=>'Posts','action'=>'new']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}',['namespace' => 'Admin']);

// //displaying routing table
// echo '<pre>';
// //var_dump($router->getRoutes());
// echo htmlspecialchars(print_r($router->getRoutes(),true));
// echo '</pre>';

// $url=$_SERVER['QUERY_STRING'];

// if($router->match($url)){
//     echo '<pre>';
//     var_dump($router->getParams());
//     echo '</pre>';
// }else{
//    echo "No Route Found for '.$url.'";
// }
$router->dispatch($_SERVER['QUERY_STRING']);