<?php


namespace project_app\controllers;

use project_app\brain\Controller;
use GuzzleHttp\Client;

class wether_controller extends Controller
{
    function show_wether()
    {
        $url = 'http://www.gismeteo.ua/city/daily/5093/';
        $client = new Client();
        $res = $client->request('GET', 'https://api.github.com/dananchik', [
            'auth' => ['user', 'pass']
        ]);
        echo $res->getStatusCode();
        $this->view->render("wether", "Погода");
    }
}