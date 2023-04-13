<?php
class Request
{
	private $_controller;

	private $_method;

	private $_path;

	private $_agrs = array();

	private $NUM_KEY_REGEX = "/:num\([a-zA-z][a-zA-z0-9]*\)/is";

	private $STR_KEY_REGEX = "/:str\([a-zA-z][a-zA-z0-9]*\)/is";

	private $NUM_OR_STR_KEY_REGEX = "/:(num|str)\([a-zA-z][a-zA-z0-9]*\)/is";

	public function __construct()
	{

		$parts = explode('?', $_SERVER['REQUEST_URI']);
		$parts = array_filter($parts);
		$path = $parts[0];
		$path = $this->handleURI($path);
		$segments = explode("/", $path);
		$segments = array_filter($segments);
		$this->_method = ($c = array_pop($segments)) ? $c : "index";
		$this->_controller = ($c = array_pop($segments)) ? ucfirst($c) : "Index";
		$this->_path = sizeof($segments) > 0 ? join("/", $segments) . '/' : '';
	}

	private function handleURI($requestUri)
	{
		global $routes;
		$requestUri = trim($requestUri, "/");
		foreach ($routes as $key => $value) {
			$key_temp = preg_replace($this->NUM_KEY_REGEX, "[+-]?[1-9][0-9]*", $key);
			$key_temp = preg_replace($this->STR_KEY_REGEX, ".+", $key_temp);
			$key_temp = preg_replace("/\\//is", "\\/", $key_temp);
			if (preg_match("#^" . $key_temp . "$#is", $requestUri) && sizeof(explode("/", $key)) == sizeof(explode("/", $requestUri))) {
				$this->auth($value["roles"]);
				$this->calculateAgr($key,  $requestUri);
				return $value["handler"];
			}
		}
		throw new Exception('404 - Not found');
	}
	private function calculateAgr($key, $path)
	{
		$segments_path = explode("/", $path);
		$segments_path = array_filter($segments_path);
		$segments_key = explode("/", $key);
		$segments_key = array_filter($segments_key);

		$segment_curr = array_pop($segments_key);
		while ($segment_curr && preg_match($this->NUM_OR_STR_KEY_REGEX, $segment_curr)) {
			if (preg_match($this->NUM_KEY_REGEX, $segment_curr)) {
				$this->_agrs[substr($segment_curr, 5, -1)] = (int)array_pop($segments_path);
			} else {
				$this->_agrs[substr($segment_curr, 5, -1)] = array_pop($segments_path);
			}
			$segment_curr = array_pop($segments_key);
		}
		$this->_agrs = array_reverse($this->_agrs);
	}
	private function auth($roles)
	{
		if (in_array("all", $roles)) {
			return;
		}
		if (!isset($_SESSION["role"])) {
			header('Location: /login');
			return;
		}
		if (!in_array($_SESSION["role"], $roles)) {
			header('Location: /notpermission');
			return;
		}
	}

	public function getController()
	{
		return $this->_controller;
	}
	public function getMethod()
	{
		return $this->_method;
	}
	public function getPath()
	{
		return $this->_path;
	}
	public function getArgs()
	{
		return $this->_agrs;
	}
}
