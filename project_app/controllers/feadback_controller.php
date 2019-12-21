<?php


namespace project_app\controllers;

use project_app\brain\Controller;

class feadback_controller extends Controller
{
    function write_feadback()
    {
        if (isset($_POST['send_form'])) {
            echo 'hello';
            if (isset($_POST['g-recaptcha-response'])) {
                echo 'hello';
                $this->capcha($_POST['g-recaptcha-response']);
                echo 'hello';

            }
        }
        $this->view->render("feadback", "Отзыв о нас");
    }

    function show_feadbacks()
    {
        $this->view->render("all_feadbacs", "Все отзывы");
    }

    function capcha($key)
    {
        $secret = '6Lc9ZMgUAAAAANEMpqaK6GKMHZRl11tLXO8znm5q';
        // найдено в инете не работает. 2 вариант
        // $curl = curl_init('https://www.google.com/recaptcha/api/siteverify');
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_POST, true);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, 'secret=' . $secret . '&response=' . $key);
        // $out = curl_exec($curl);
        // echo $out;
        // curl_close($curl);

        //     $out = json_decode($out);
        //    if ($out->success == true) {
        //      echo 'ну наконецто';
        //}
        //else{
        //  echo 'вы робот!!!';
        // }
        // самый первый вариант тоже не работает $result пуст
        //$response = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $key . '&remoteip' . $_SERVER['REMOTE_ADDR'];
        //echo 'hello';
        //$json = file_get_contents($response);
        //$result = json_decode($json);
        //Попробывал все варианты после установки ssl сертификата всеравно не работает:(
        // этот вариант посоветовали в чатике помощи сказали 100% проверенный но тоже не работает
         $url = 'https://www.google.com/recaptcha/api/siteverify';
         $data = array(
          'secret' => $secret,
          'response' => 'g-recaptcha'
         );
        $options = array(
          'http' => array(
            'header' => "Content-type:application/x-www-form-urlencoded\r\n",
          'method' => 'POST',
           'content' => http_build_query($data)
         )
         );
         $context = stream_context_create($options);
         $response = file_get_contents($url, false, $context);
         $response_keys = json_decode($response);
        print_r($response_keys);
        if ($response_keys->success == true) {
            echo 'success';
        } else {
            echo 'а я знаю что ты робот';
        }
    }
}