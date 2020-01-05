<?php

namespace project_app\brain;

use project_app\brain\View;

abstract class Controller
{
    public $route;
    public $view;
    public $db;

    function __construct($route,$db = null)
    {
        $this->route = $route;
        if (!empty($db)){
            $this->db = $db;
        }
        $this->view = new View($this->view);
        //   $sql = 'INSERT INTO users (ff) VALUES (80);';
        //   $this->db->query($sql);
    }
    function check_role(){
        if($_COOKIE['login'] == true){
            return 'check_user';
        }
        else{
            return 'user';
        }
    }
}