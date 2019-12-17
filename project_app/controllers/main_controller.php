<?php


namespace project_app\controllers;
use project_app\brain\Controller;

class main_controller extends Controller
{
    function registr(){
        $this->view->render("registr","Регистрация");
    }
}