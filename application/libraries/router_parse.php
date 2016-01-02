<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require 'vendor/autoload.php';

use Parse\ParseClient;
use Parse\ParseQuery;
use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseException;

class Router_Parse
{
    
    private $app_id = "sSvcaBRDtBEd36QucZPbyauy4L8QscjUrcueZulg";
    private $rest_key = "CjpwVXF7dradvrRBERmotrs4OpvlYVQdq7ZtByQf";
    private $master_key = "lmF2m73M34hKw8vZABr93cZVvnwIjk7vRATVSgiY";
    
    public function __construct()
    {
        ParseClient::initialize($this->app_id, $this->rest_key, $this->master_key);
    }
    
    public function get_applications($id)
    {
        $query = ParseUser::query();
        $query->equalTo('objectId', $id);
        $result            = $query->find();
        $user              = $result[0];
        $apps              = $user->getRelation("Organization");
        $query             = $apps->getQuery();
        $applications      = $query->find();
        $applicationsArray = array();
        foreach ($applications as $app) {
            $appObject              = new stdClass;
            $appObject->id          = $app->getObjectId();
            $appObject->name        = $app->get("name");
            $appObject->description = $app->get("description");
            $appObject->image       = $app->get("image");
            array_push($applicationsArray, $appObject);
        }
        return $applicationsArray;
    }
    
    public function user_login($username, $password)
    {
        try {
            $user = ParseUser::logIn($username, $password);
            return $user->getObjectId();
        }
        catch (ParseException $error) {
            return $error->getMessage();
        }
    }
    
    public function user_logut($username, $password)
    {
        try {
            $user = ParseUser::logIn($username, $password);
            $user->set("remember_token", "");
            $user->save();
        }
        catch (ParseException $error) {
            return $error->getMessage();
        }
        
        ParseUser::logOut();
        $currentUser = ParseUser::getCurrentUser();
        if (is_null($currentUser)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_current_user()
    {
        $currentUser = ParseUser::getCurrentUser();
        return $currentUser;
    }
    
    public function set_remember_me($username, $password)
    {
        $token = md5(uniqid($username, true));
        try {
            $user = ParseUser::logIn($username, $password);
            $user->set("remember_token", $token);
            $user->save();
        }
        catch (ParseException $error) {
            return $error->getMessage();
        }
        return $token;
    }
    
    public function get_user_object_by_id($id)
    {
        $query = ParseUser::query();
        $query->equalTo('objectId', $id);
        $result = $query->find();
        $user   = $result[0];
        return $user;
    }
    
    public function get_user_from_token($token)
    {
        $query = ParseUser::query();
        $query->equalTo('remember_token', $token);
        $result = $query->find();
        $user   = $result[0];
        return $user->getObjectId();
    }
    
    public function get_application_credentials($appId, $userId)
    {
        $authority = false;
        $userApplications = $this->get_applications($userId);
        foreach ($userApplications as $app) {
            if ($app->id == $appId) {
                $authority = true;
            }
        }
        if ($authority == true) {
            $query = new ParseQuery("Organization");
            $application = $query->get($appId);
            $credentials = array("credentials" => $application->get("credentials"), "name" => $application->get("name"), "logo" => $application->get("image"), "type" => $application->get("type"));
            return $credentials;
        } else {
            $error = "You are not authorized to access this application !";
            return $error;
        }
    }
    
}

/* End of file Router_Parse.php */