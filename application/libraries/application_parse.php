<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require 'vendor/autoload.php';

use Parse\ParseClient;
use Parse\ParseQuery;
use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseException;

class Application_Parse
{
    public function get_user_data($username, $credentials){
        ParseClient::initialize($credentials->app_id, $credentials->rest_key, $credentials->master_key);
        $query = ParseUser::query();
        $query->equalTo('username', $username);
        $result = $query->find();
        $user = $result[0];
        $data = new stdClass;
        $data->fullName = $user->get("fullName");
        $data->avatar = $user->get("avatar");
        $data->title = $user->get("title");
        return $data;
    }

    public function get_events($credentials){
    	ParseClient::initialize($credentials->app_id, $credentials->rest_key, $credentials->master_key);
    	$query = new ParseQuery("Events");
        $query->descending("createdAt");
    	$result = $query->find();
    	$events = array();
    	foreach($result as $event){
    		$eventObj = new stdClass;
    		$eventObj->id = $event->getObjectId();
    		$eventObj->name = $event->get("name");
    		$eventObj->description = $event->get("description");
    		$eventObj->image = $event->get("thumbnail");
            $eventObj->date = $event->getCreatedAt();
    		array_push($events, $eventObj);
    	}
    	return $events;
    }

    public function save_event($event, $credentials){
        ParseClient::initialize($credentials->app_id, $credentials->rest_key, $credentials->master_key);
        return $event;
    }
}

/* End of file Application_Parse.php */