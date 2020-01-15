<?php


namespace project_app\brain;


class View
{
	public $route;
	public $layout = 'layaut.php';

	function __construct($route)
	{
		$this->route = $route;
	}

	function render($content, $params = null)
	{
		ob_start();
		require 'project_app/views/' . $content . '.php';
		$content_view = ob_get_clean();
		require 'project_app/views/' . $this->layout;

	}
}