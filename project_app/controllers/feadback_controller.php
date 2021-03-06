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
				if ($this->captcha($_POST['g-recaptcha-response'])) {
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
								$feedback = new Feadback();
								$feedback->new_feedback($email, $text, $subject, $name, $time);
							} else {
								$errors[] = 'сообщение не отправлено!';
							}

						} else {
							$errors[] = 'не валидный емаил';
						}
					}
				} else {
					$errors[] = 'че то вы на робота смахиваете!';
				}
			}
		}
		$title = 'Отзыв о нас';
		$script = 'feedback';
		$this->view->render("feedback", ['title' => $title, 'script' => $script]);
	}

	function show_feedback()
	{
		$sql = 'SELECT text,subject,time FROM feadbacs ORDER BY -time';
		$feadbacks = $this->all_feedbacks($sql);
		$title = 'Все отзывы';
		$this->view->render("all_feadbacs", ['feadbacks' => $feadbacks, 'title' => $title]);
	}

	function captcha($key)
	{
		$secret = '6LcnYMwUAAAAAG7cCfiwnXuo0vSPoPVZwVp-5L5y';
		$response = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $key . '&remoteip' . $_SERVER['REMOTE_ADDR'];
		$json = file_get_contents($response);
		$result = json_decode($json);
		if ($result->success == true) {
			return true;
		} else {
			return false;
		}
	}
	function all_feedbacks($sql){
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}