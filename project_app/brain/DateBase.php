<?php


namespace project_app\brain;

use PDO;
use PDOException;

class DateBase
{
	static $_instance = null;

	function __construct()
	{

		$settings = require 'project_app/config/settings.php';
		try {
			$this->_instance = new PDO('mysql:host=' . $settings['host'] . ';
        dbname=' . $settings['db'],
				$settings['user'], $settings['password']);
		} catch (PDOException $e) {
			print_r($e);
			//  exit();
		}
	}

	private function __clone()
	{
	}

	private function __wakeup()
	{
	}

	public static function getInstance()
	{
		if (self::$_instance != null) {
			return self::$_instance;
		}

		return new self;
	}

}