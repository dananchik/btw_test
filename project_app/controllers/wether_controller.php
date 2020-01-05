<?php


namespace project_app\controllers;

use project_app\brain\Controller;
use DiDom\Document;
use DiDom\Element;

class wether_controller extends Controller
{
    function show_wether()
    {
        $title = 'погода';
        $url = 'http://www.gismeteo.ua/city/daily/5093/';
        $document = new Document($url, true);

        $tab = $document->find('.tab_wrap')['1'];
        $img = $tab->first('.img')->html();
        $date = $tab->first('.date')->text();
        $values = $tab->find('.value');
        $tempa = [];
        foreach ($values as $value) {
            $tempa[] = $value->find('.unit_temperature_c')['0']->text();
        }
        $details = $document->first('.widget__container');
        $row_time = $details->first('.widget__row_time')->children();
        $tempa_values = $details->first('.values')->children();
        $veter_values = $details->first('.widget__row_wind-or-gust')->children();
        $fallout_values = $details->first('.widget__row_precipitation')->children();
        $fallout = [];
        $my_time = [];
        $my_tempa = [];
        $veter = [];
        foreach ($row_time as $time) {
            $my_time[] = $time->first('span')->text() . ':' . $time->first('sup')->text();
        }
        foreach ($tempa_values as $value) {
            $my_tempa[] = $value->first('.unit_temperature_c')->text();
        }
        foreach ($veter_values as $item) {
            $veter[] = $item->first('.unit_wind_m_s')->text();
        }
        foreach ($fallout_values as $item) {
            $fallout[] = $item->first('.w_prec__value');
        }
        $this->view->render('wether', [
            'min_tempa' => $tempa['0'],
            'max_tempa' => $tempa['1'],
            'date' => $date,
            'img' => $img,
            'title' => $title,
            'details'=>[$my_time,$my_tempa,$veter,$fallout],
        ]);
    }
}