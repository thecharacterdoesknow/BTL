<?php

class Router
{

	public static function route(Request $request)
	{

		$controller = $request->getController();
		$method = $request->getMethod();
		$path = $request->getPath();
		$agrs = $request->getArgs();

		$controllerFile = SITE_PATH . 'controllers/' . $path . $controller .  'Controller.php';

		if (is_readable($controllerFile)) {
			require_once $controllerFile;
			$controller = $controller . "Controller";
			$controller = new $controller;
			$method = (is_callable(array($controller, $method))) ? $method : 'index';

			if (!empty($agrs)) {
				call_user_func_array(array($controller, $method), $agrs);
			} else {
				call_user_func(array($controller, $method));
			}
			return;
		}
		throw new Exception('404 - ' . $request->getController() . ' not found');
	}
}
