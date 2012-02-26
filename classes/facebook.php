<?php

namespace Social;

require_once PKGPATH.'social'.DS.'vendor'.DS.'Facebook'.DS.'src'.DS.'facebook.php';

class Facebook {

	public static function instance()
	{
		static $instance = null;

		if ($instance === null)
		{
			$instance = new static;
		}

		return $instance;
	}

	private $_facebook = NULL;
	
	function __construct()
	{
		$config = \Config::load('facebook', true);
		
		$this->_facebook = new \Facebook($config);
	}
	
	function __call($method, $args)
	{
		if ( method_exists($this, $method) )
		{
			return call_user_func_array(array($this, $method), $args);
		}
		
		return call_user_func_array(array($this->_facebook, $method), $args);
	}
	
	function check_login() {
		$user = Facebook::instance()->getUser();
		
		if ($user) {
			return true;
		} else {
			return false;
		}
	}
	
	function login()
	{
		return $this->_facebook->login();
	}
	
	function logout()
	{
		return $this->_facebook->logout();
	}
}