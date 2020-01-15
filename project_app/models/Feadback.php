<?php


namespace project_app\models;


use project_app\brain\Model;

class Feadback extends Model
{
	function new_feedback($email, $text, $subject, $name, $time)
	{
		$sql = 'INSERT INTO feadbacs (id, name, subject, email, text,time) VALUES (NULL, :name, :subject, :email, :text,:time);';
		$params = [
			'email' => $email,
			'name' => $name,
			'text' => $text,
			'subject' => $subject,
			'time' => $time,
		];
		$this->query($sql,$params);
	}
}