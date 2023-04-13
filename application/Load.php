<?php
class Load
{

	public function view($layout, $subview, array $vars = null)
	{
		$file = SITE_PATH . 'views/' . $layout . '.php';

		if (is_readable($file)) {

			if (isset($vars)) {
				extract($vars);
			}
			$subview =  SITE_PATH . 'views/' . $subview . '.php';
			require($file);
			return true;
		}
		throw new Exception('View issues');
	}
	public function model($name)
	{
		$model = ucfirst($name) . 'Model';
		$modelPath = SITE_PATH . 'models/' . $model . '.php';

		if (is_readable($modelPath)) {
			require_once($modelPath);

			if (class_exists($model)) {
				$registry = Registry::getInstance();
				$registry->$name = new $model;
				return true;
			}
		}
		throw new Exception('Model issues.');
	}
}
