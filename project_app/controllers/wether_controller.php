<?php


namespace project_app\controllers;
use project_app\brain\Controller;

class wether_controller extends Controller
{
    function show_wether(){
        $this->view->render("wether","Погода");
    }
}