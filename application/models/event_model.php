<?php
class Event_model extends CI_Model{

	function get_events($credentials){
		$events = $this->application_parse->get_events($credentials);
		return $events;
	}

	function save_event($event, $credentials){
		return $this->application_parse->save_event($event, $credentials);
	}
}