<?php


namespace project_app\brain;


abstract class Model
{
	public $db;

	function __construct()
	{
		$this->db = DateBase::getInstance();
	}

	function query($sql, $papams = null)
	{
		$stmt = $this->db->prepare($sql);
		if (!empty($papams)) {
			foreach ($papams as $key => $val) {
				$stmt->bindValue(':' . $key, $val);
			}
		}
		$stmt->execute();
		return $stmt->fetchAll();
	}
}