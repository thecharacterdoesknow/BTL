<?php
abstract class BaseController
{

	protected $_registry;

	protected $load;

	public function __construct()
	{
		$this->_registry = Registry::getInstance();
		$this->load = new Load;
	}

	final public function __get($key)
	{
		if ($return = $this->_registry->$key) {
			return $return;
		}
		return false;
	}
	public function sendData($userId, $event, $data)
	{
		require SITE_PATH . 'vendor/autoload.php';
		$options = array(
			'cluster' => 'ap1',
			'useTLS' => true
		);
		$pusher = new Pusher\Pusher(
			'1dac25ccd137e736019b',
			'c620c42d93ea424b4aeb',
			'1289950',
			$options
		);
		$channel = "c_".$userId;
		$pusher->trigger($channel, $event, $data);
	}
}
