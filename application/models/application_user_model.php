<?php
class Application_user_model extends CI_Model{

	function get_user_data($username, $credentials){
		$avatar = $this->application_parse->get_user_data($username, $credentials);
		return $avatar;
	}
}