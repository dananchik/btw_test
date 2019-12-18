<?php

namespace project_app\brain;

use project_app\brain\View;
use project_app\brain\DateBase as DB;

abstract class Controller
{
    public $route;
    public $view;
    public $db;

    function __construct($route)
    {
        $this->route = $route;
        $this->db = new DB;
        $this->view = new View($this->view);
        //   $sql = 'INSERT INTO users (ff) VALUES (80);';
        //   $this->db->query($sql);
    }
}