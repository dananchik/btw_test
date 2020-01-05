<?php

namespace project_app\brain;

class Router
{
    private $parametrs = [];
    private $routes = [];

    function __construct()
    {
        $arr = require 'project_app/config/routes.php';
        foreach ($arr as $key => $value) {
            $this->add_route($key, $value);
        }
    }

    function add_route($route, $values)
    {
        $this->routes[$route] = $values;
    }

    function match_routes($url)
    {
        foreach ($this->routes as $route => $values) {
            if ($route == $url) {
                $this->parametrs = $values;
                return true;
            }
        }
        return false;

    }

    function start()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        if ($this->match_routes($url)) {
            $role = $this->role();
            $allows = require 'project_app/config/roles.php';
            if (!in_array($url,$allows[$role])){
                header('Location:https://kurave02.tech017.net.in/registration');
            }
            $controller_path = 'project_app\controllers\\' . $this->parametrs['controller'] . '_controller';

            if (class_exists($controller_path)) {
                $action = $this->parametrs['action'];
                if (method_exists($controller_path, $action)) {
                    if ($this->parametrs['db'] == true) {
                        $db = require 'project_app/config/db.php';
                        $controller = new $controller_path($this->parametrs,$db);
                        $controller->$action();
                    } else {
                        $controller = new $controller_path($this->parametrs);
                        $controller->$action();
                    }

                } else {
                    echo 'Маршрут не найден';
                }
            } else {
                //404
                echo '404' . $controller_path;
            }


        }
    }
    function role(){
        if ($_COOKIE['login']==true){
            return 'chek_user';
        }
        else {
            return 'user';
        }
    }
}