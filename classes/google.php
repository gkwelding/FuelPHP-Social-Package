<?php

namespace Social;

require_once PKGPATH.'social'.DS.'vendor'.DS.'Google'.DS.'src'.DS.'apiClient.php';

class Google {

	private $_client = NULL;
	private $_service = NULL;
	
	function __construct($app_name)
	{
		$config = \Config::load('google', true);
		
		$this->_client = new \apiClient();

		if($app_name!=null && $app_name!=""){
			$this->_client->setApplicationName($app_name);
		}

		foreach ($config as $key => $value) {
    			if($value!=null && $value!=""){
				switch ($key){
					case "client_id":
						$this->_client->setClientId($value);
						break;
					case "client_secret":
						$this->_client->setClientSecret($value);
						break;
					case "redirect_uri":
						$this->_client->setRedirectUri($value);
						break;
					case "developer_key":
						$this->_client->setDeveloperKey($value);
						break;
				}
			}		
		}

	}
	
	function __call($method, $args)
	{
		if ( method_exists($this, $method) )
		{
			return call_user_func_array(array($this, $method), $args);
		}
		
		return call_user_func_array(array($this->_client, $method), $args);
	}
	
	function getClientApi() {
		return $this->_client;
	}
	
	function getService($service)
	{
		if($this->_service == NULL){
			if(file_exists(APPPATH.'vendor'.DS.'Google'.DS.'src'.DS.'contrib'.DS.'api'.$service.'Service.php')){
				if($service != null && $service != ""){
					require_once APPPATH.'vendor'.DS.'Google'.DS.'src'.DS.'contrib'.DS.'api'.$service.'Service.php';
					$serviceClassName = 'api'.$service.'Service';
					$obj = new $serviceClassName();
					$this->_service = call_user_func_array(array($obj, '__construct'), $this->_client);
					return $this->_service;
				}
			}
		}else{
			return $this->_service;
		}
	}
}
