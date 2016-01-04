<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require 'vendor/autoload.php';

use Parse\ParseClient;
use Parse\ParseQuery;
use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseException;
use Parse\ParseFile;

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
    		$thumbnail = $event->get("thumbnail");
            $eventObj->image = $thumbnail->getURL();
            $eventObj->date = $event->getCreatedAt();
    		array_push($events, $eventObj);
    	}
    	return $events;
    }

    public function save_event($features, $event_content, $credentials){
        ParseClient::initialize($credentials->app_id, $credentials->rest_key, $credentials->master_key);
        $iconPath = 'uploads/tmp/'.$features['icon_name'];
        $icon = ParseFile::createFromFile($iconPath, $features['icon_name']);
        $icon->save();
        $thumbnailPath = 'uploads/tmp/'.$features['thumbnail_name'];
        $thumbnail = ParseFile::createFromFile($thumbnailPath, $features['thumbnail_name']);
        $thumbnail->save();
        
        $event = new ParseObject('Events');
        $event->set("name", $features['event-name']);
        $event->set('description', $features['event-description']);
        $event->set("order", intval($features['order']));
        $event->set("accentColor", substr($features['accent-color'], 5, -3));
        $event->set("primaryColor", substr($features['primary-color'], 5, -3));
        $event->set('image', $icon);
        $event->set('thumbnail', $thumbnail);

        try {
            $event->save();
            $sidebarOrderFlag = 0;
            $sidebarLastbiggestOrder = 0;
            $switchEvent = false;
            foreach ($features['features'] as $feature) {
                if($feature != "0"){
                    $featureArray = explode("-", $feature);
                    $featureType = $featureArray[0];
                    $featureOrder = intval($featureArray[1]);

                    if($featureOrder > $sidebarLastbiggestOrder){
                        $sidebarLastbiggestOrder = $featureOrder;
                    }

                    if($featureType ==  'Speakers'){
                        $featureName = "Speakers";
                    }
                    elseif($featureType ==  "Messages"){
                        $featureName = "Messages";
                    }
                    elseif($featureType ==  "internalMap"){
                        $featureName = "Internal Map";
                    }
                    elseif($featureType ==  "externalMap"){
                        $featureName = "External Map";
                    }
                    elseif($featureType ==  "QR Code"){
                        $featureName = "QR Code";
                    }
                    elseif($featureType ==  "Agenda"){
                        $featureName = "Agenda";
                        $featureOrder = 0;
                        $sidebarOrderFlag = 1;
                    }
                    elseif($featureType ==  "Surveys"){
                        $featureName = "Surveys";
                    }
                    elseif($featureType ==  "Events"){
                        $switchEvent = true;
                        continue;
                    }
                    elseif($featureType ==  "Exhibitors"){
                        $featureName = "Exhibitors";
                    }
                    elseif($featureType ==  "Ask question"){
                        $featureName = "Ask question";
                    }
                    elseif($featureType ==  "People"){
                        $featureName = "People";
                    }
                    elseif($featureType ==  "Photos"){
                        $featureName = "Photos";
                    }
                    elseif($featureType ==  "Ideas"){
                        $featureName = "Wall of ideas";
                    }
                    elseif($featureType ==  "My profile"){
                        $featureName = "My profile";
                    }

                    $sidebarMenu = new ParseObject('SidebarMenu');
                    $sidebarMenu->set("event", $event);
                    $sidebarMenu->set("name", $featureName);
                    $sidebarMenu->set("type", $featureType);
                    if($featureType == "Agenda"){
                        $sidebarMenu->set("order", $featureOrder);
                    }else{
                        $sidebarMenu->set("order", $featureOrder + $sidebarOrderFlag);
                    }
                    try{
                        $sidebarMenu->save();
                    }catch (ParseException $ex){
                        $result = $ex->getMessage();
                    }
                }
            }
            if($switchEvent == true){
                $sidebarMenu = new ParseObject('SidebarMenu');
                $sidebarMenu->set("event", $event);
                $sidebarMenu->set("name", "Switch Event");
                $sidebarMenu->set("type", "Events");
                $sidebarMenu->set("order", $sidebarLastbiggestOrder + $sidebarOrderFlag + 1);
                $sidebarLastbiggestOrder++; 
                try{
                    $sidebarMenu->save();
                }catch (ParseException $ex){
                    $result = $ex->getMessage();
                }
            }

            $sidebarMenu = new ParseObject('SidebarMenu');
            $sidebarMenu->set("event", $event);
            $sidebarMenu->set("name", "Logout");
            $sidebarMenu->set("type", "Logout");
            $sidebarMenu->set("order", $sidebarLastbiggestOrder + $sidebarOrderFlag + 1);
            try{
                $sidebarMenu->save();
            }catch (ParseException $ex){
                $result = $ex->getMessage();
            }
            
        } catch (ParseException $ex) {  
            $result = $ex->getMessage();
        }
        
        unlink($thumbnailPath);
        unlink($iconPath);
        /* Add features content */

        if($features['features']['speakers'] != "0"){
            if(count($event_content['speakers']) != 0){
                foreach($event_content['speakers'] as $speaker){
                    if($speaker['name'] != ""){
                        $speakerImagePath = 'uploads/tmp/'.$speaker['image'];
                        $speakerImage = ParseFile::createFromFile($speakerImagePath, $speaker['image']);
                        $speakerImage->save();
                        $speakerObj = new ParseObject('Speaker');
                        $speakerObj->set('name', $speaker['name']);
                        $speakerObj->set('facebook', $speaker['facebook']);
                        $speakerObj->set('order', intval($speaker['order']));
                        $speakerObj->set('twitter', $speaker['twitter']);
                        $speakerObj->set('title', $speaker['title']);
                        $speakerObj->set('event', $event);
                        $speakerObj->set('image', $speakerImage);
                        $speakerObj->set('email', $speaker['email']);
                        $speakerObj->set('company', $speaker['company']);
                        $speakerObj->set('linkedIn', $speaker['linkedin']);
                        $speakerObj->set('introduction', $speaker['introduction']);
                        $speakerObj->save();
                        unlink($speakerImagePath);
                    }else{
                        $result = "Speaker name is required";
                        return $result;
                    }
                }
            }
        }

        if($features['features']['agenda'] != "0"){
            if(count($event_content['agenda']) != 0){
                foreach($event_content['agenda'] as $agenda_day){
                    if($agenda_day['date'] != ""){
                        $eventDayObject = new ParseObject("EventDays");
                        $eventDayObject->set("date", $agenda_day['date']);
                        $eventDayObject->set("day", $agenda_day['day']);
                        $eventDayObject->set('order', intval($agenda_day['dayorder']));
                        $eventDayObject->set('event', $event);
                        $eventDayObject->save();
                        //$agenda_day_id = $eventDayObject->getObjectId();
                        foreach($agenda_day['items'] as $item){
                            if($item['title'] != ""){
                                $itemImagePath = 'uploads/tmp/'.$item['image'];
                                $itemImage = ParseFile::createFromFile($itemImagePath, $item['image']);
                                $itemImage->save();
                                
                                $agendaObject = new ParseObject('Agenda');
                                $agendaObject->set("sessionTitle", $item['title']);
                                $agendaObject->set("from", $item['from']);
                                $agendaObject->set("to", $item['to']);
                                $agendaObject->set("order", intval($item['order']));
                                $agendaObject->set("day", $eventDayObject);
                                $agendaObject->set("description", $item['description']);
                                $agendaObject->set("image", $itemImage);
                                if($item['speaker'] != ""){
                                    $speakerQuery = new ParseQuery('Speaker');
                                    $speakerQuery->equalTo("name", $item['speaker']);
                                    $speakerQuery->equalTo("event", $event);
                                    $itemSpeakerQuery = $speakerQuery->find();
                                    $itemSpeaker = $itemSpeakerQuery[0];
                                    $agendaObject->set("speaker", $itemSpeaker);
                                }
                                $agendaObject->save();
                                unlink($itemImagePath);
                            }else{
                                $result = "Please fill the required information";
                                return $result;        
                            }
                        }
                    }else{
                        $result = "Please fill the required information";
                        return $result;
                    }    
                }
            }
        }

        if($features['features']['exhibitors'] != "0"){
             if(count($event_content['exhibitors']) != 0){
                foreach($event_content['exhibitors'] as $exhibitor){
                    if($exhibitor['name'] != ""){
                        $exhibitorImagePath = 'uploads/tmp/'.$exhibitor['image'];
                        $exhibitorImage = ParseFile::createFromFile($exhibitorImagePath, $exhibitor['image']);
                        $exhibitorImage->save();
                        $exhibitorObj = new ParseObject("Exhibitors");
                        $exhibitorObj->set("actionName", $exhibitor['action']);
                        $exhibitorObj->set('facebook', $exhibitor['facebook']);
                        $exhibitorObj->set("name", $exhibitor['name']);
                        $exhibitorObj->set('about', $exhibitor['about']);
                        $exhibitorObj->set('order', intval($exhibitor['order']));
                        $exhibitorObj->set('url', $exhibitor['url']);
                        $exhibitorObj->set('twitter', $exhibitor['twitter']);
                        $exhibitorObj->set('event', $event);
                        $exhibitorObj->set('image', $exhibitorImage);
                        $exhibitorObj->set('linkedin', $exhibitor['linkedin']);
                        $exhibitorObj->save();
                        unlink($exhibitorImagePath);
                    }else{
                        $result = "Exhibitor name is required";
                        return $result;
                    }
                }
            }
        }

        if($features['features']['surveys'] != "0"){
            if(count($event_content['surveys']) != 0){
                foreach($event_content['surveys'] as $survey){
                    if($survey['name'] != ""){
                        $surveyObj = new ParseObject('Surveys');
                        $surveyObj->set('name', $survey['name']);
                        $surveyObj->set('order', intval($survey['order']));
                        $surveyObj->set('description', $survey['description']);
                        $surveyObj->set('event', $event);
                        $surveyObj->save();
                        
                        if(count($survey['questions']) != 0){
                            if($survey['questions'][0] != ""){
                                $order = 0;
                                foreach($survey['questions'] as $question){
                                    $questionObj = new ParseObject('SurveyQuestions');
                                    $questionObj->set('order', $order);
                                    $questionObj->set('questionText', $question);
                                    $questionObj->set('surveyId', $surveyObj);
                                    $order++;
                                    $questionObj->save();
                                }
                            }else{
                                $result = "Question is required";
                                return $result;
                            }
                        }
                    }else{
                        $result = "Survey name is required";
                        return $result;
                    }
                }
            }
        }

        if($features['features']['exmap'] != "0"){
            if(count($event_content['exmapPoints']) != 0){
                foreach($event_content['exmapPoints'] as $point){
                    if($point['pin_name'] != ""){
                        $exmapPoint = new ParseObject("ExternalMap");
                        $exmapPoint->set("pinName", $point['pin_name']);
                        $exmapPoint->set("latitude", $point['lat']);
                        $exmapPoint->set('order', intval($point['order']));
                        $exmapPoint->set('longitude', $point['long']);
                        $exmapPoint->set('address', $point['address']);
                        $exmapPoint->set('event', $event);
                        $exmapPoint->save();
                    }else{
                        $result = "Pin name is required";
                        return $result;
                    }
                }
            }   
        }

        if($features['features']['inmap'] != "0"){
               if(count($event_content['inmapSections']) != 0){
                foreach($event_content['inmapSections'] as $section){
                    if($section['header'] != ""){
                        $sectionImagePath = 'uploads/tmp/'.$section['image'];
                        $sectionImage = ParseFile::createFromFile($sectionImagePath, $section['image']);
                        $sectionImage->save();

                        $sectionObj = new ParseObject('InternalMaps');
                        $sectionObj->set('event', $event);
                        $sectionObj->set('header', $section['header']);
                        $sectionObj->set('image', $sectionImage);
                        $sectionObj->save();
                        unlink($sectionImagePath);
                    }else{
                        $result = "header is required";
                        return $result;
                    }
                }
            }
        } 

        $result = $event_content;
        return $result;
    }
}

/* End of file Application_Parse.php */