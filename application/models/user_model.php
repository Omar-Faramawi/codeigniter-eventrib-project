<?php
class User_model extends CI_Model{

	function login($username, $password){
		$login = $this->router_parse->user_login($username, $password);
		return $login;
	}

	function logout($username, $password){
		$logout = $this->router_parse->user_logut($username, $password);
		return $logout;
	}

	function get_current_user(){
		$currentUser = $this->router_parse->get_current_user();
		return $currentUser; 
	}

	function set_remember_me($username, $password){
		$token = $this->router_parse->set_remember_me($username, $password);
		return $token;
	}

	function get_user_from_token($token){
		$login = $this->router_parse->get_user_from_token($token);
		return $login;
	}
}