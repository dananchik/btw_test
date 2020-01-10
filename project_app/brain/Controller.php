<?php

namespace project_app\brain;

use project_app\brain\View;

abstract class Controller
{
    public $route;
    public $view;
    public $db;

    function __construct($route, $db = null)
    {
        $this->route = $route;
        if (!empty($db)) {
            $this->db = $db;
        }
        $this->view = new View($this->view);
    }

    function check_role()
    {
        if ($_COOKIE['login'] == true) {
            return 'check_user';
        } else {
            return 'user';
        }
    }
}