<?php


namespace project_app\controllers;

use project_app\brain\Controller;
use project_app\models\Feadback;

class feadback_controller extends Controller
{
    function write_feadback()
    {
        if (isset($_POST['send_form'])) {
            if (isset($_POST['g-recaptcha-response'])) {
                if ($this->capcha($_POST['g-recaptcha-response'])) {
                    if (!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['subject']) and !empty($_POST['text'])) {
                        $name = htmlspecialchars(trim($_POST['name']));
                        $email = htmlspecialchars(trim($_POST['email']));
                        $subject = htmlspecialchars(trim($_POST['subject']));
                        $text = htmlspecialchars(trim($_POST['text']));
                        $time = date("Y-m-d H:i:s");
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $headers = 'From: ' . $email . "\r\n" .
                                'Reply-To: ' . $email . "\r\n";

                            if (mail('kuraveshka@gmail.com', $subject, $text, $headers)) {
                                $feadback = new Feadback($this->db);
                                $feadback->new_feadback($email, $text, $subject, $name, $time);
                            }

                        }
                    }
                }else{
                    echo '<p class="text-danger">че то вы на робота смахиваете</p>';
                }
            }
        }
        $this->view->render("feadback", "Отзыв о нас");
    }

    function show_feadbacks()
    {
        $sql = 'SELECT text,subject,time FROM feadbacs ORDER BY -time';
        $feadbacks = $this->db->query($sql);
        $this->view->render("all_feadbacs", ['feadbacks' => $feadbacks]);
    }

    function capcha($key)
    {
        $secret = '6LcnYMwUAAAAAG7cCfiwnXuo0vSPoPVZwVp-5L5y';
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
        $response = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $key . '&remoteip' . $_SERVER['REMOTE_ADDR'];
        //echo 'hello';
        $json = file_get_contents($response);
        $result = json_decode($json);
        //Попробывал все варианты после установки ssl сертификата всеравно не работает:(
        // этот вариант посоветовали в чатике помощи сказали 100% проверенный но тоже не работает
        if ($result->success == true) {
            return true;
        } else {
            return false;
        }
    }
}