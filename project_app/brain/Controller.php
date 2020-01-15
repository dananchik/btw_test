<?php

namespace project_app\brain;

use project_app\brain\View;

abstract class Controller
{
    public $route;
    public $view;
    public $db;

    function __construct($route)
    {
        $this->route = $route;
        $this->db = DateBase::getInstance();
        $this->view = new View($this->view);
    }

    function check_role()
    {
        if ($_SESSION['login'] == true) {
            return 'check_user';
        } else {
            return 'user';
        }
    }
}