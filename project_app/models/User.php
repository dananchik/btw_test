<?php

namespace project_app\models;

use project_app\brain\Model;

class User extends Model
{

	function new_user($email, $surname, $name, $password, $gender = null, $date_birthday = null)
	{

		$sql = 'INSERT INTO users (id, name, surname, birthday, email, gender, password)
        VALUES (NULL, :name,:surname,:date_birthday,:email,:gender,:password);';
		$params = [
			'email' => $email,
			'surname' => $surname,
			'name' => $name,
			'date_birthday' => $date_birthday,
			'gender' => $gender,
			'password' => $password,
		];
		$this->query($sql,$params);
	}

	function avtorizate($email)
	{
		session_start();
		$_SESSION['email'] = $email;
		$_SESSION['login'] = true;
		header('Location: http://kurave02.tech017.net.in');
	}


}
//INSERT INTO `users` (`id`, `name`, `surname`, `birthday`, `email`, `gender`, `password`) VALUES (NULL, 'dffd', 'fddfdf', NULL, 'jfgjkgfjkgf', 'mule', '1111');
