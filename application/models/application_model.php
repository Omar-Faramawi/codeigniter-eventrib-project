<?php
class Application_model extends CI_Model{

	function get_applications($user){
		$apps = $this->router_parse->get_applications($user);
		return $apps;
	}

	function get_application_credentials($appId, $userId){
		$credentials = $this->router_parse->get_application_credentials($appId, $userId);
		return $credentials;
	}
}