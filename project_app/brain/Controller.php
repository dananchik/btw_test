<?php


namespace project_app\brain;
use project_app\brain\View;

abstract class Controller
{
    public $route;
    public $view;
    function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($this->view);
    }
}