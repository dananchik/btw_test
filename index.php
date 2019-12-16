<?php
//require_once 'brain/Router.php';
use project_app\brain\Router;
spl_autoload_register(function ($class) {
    $path = str_replace('\\','/',$class);
    require_once $path . '.php';
});

$router = new Router;
$router->start();
?>
