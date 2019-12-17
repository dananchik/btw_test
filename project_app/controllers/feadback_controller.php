<?php


namespace project_app\controllers;
use project_app\brain\Controller;

class feadback_controller extends Controller
{
    function write_feadback(){
        $this->view->render("feadback","Отзыв о нас");
    }
    function show_feadbacks(){
        $this->view->render("all_feadbacs","Все отзывы");
    }
}