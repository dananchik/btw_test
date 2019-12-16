<?php
namespace project_app\brain;

class Router
{
    private $parametrs = [];
    private $routes = [];
    function __construct()
    {
        $arr = require_once 'project_app/config/routes.php';
        foreach ($arr as $key => $value) {
            $this->add_route($key, $value);
        }
    }
    function add_route($route,$values){
        $this->routes[$route] = $values;
    }
    function match_routes(){
        $url = trim($_SERVER['REQUEST_URI'],'/');
        print_r($url);
        foreach ($this->routes as $route => $values){
            if ($route == $url){
                echo $route;
                $this->parametrs = $values;
                return true;
            }
        }
        return false;

    }
    function start(){
        if($this->match_routes()){
            $controller_path = 'project_app\controllers\\'.$this->parametrs['controller'].'_controller';

            if(class_exists($controller_path)){
                echo 'hi';

                $action = $this->parametrs['action'];
                if (method_exists($controller_path,$action)){
                    echo 'Такой метод есть';
                }
                else{
                    echo 'Маршрут не найден';
                }
            }

            else{
                //404
                echo '404'.$controller_path;
            }


        }
    }
}