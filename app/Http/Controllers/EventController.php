<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function createEvent(){
        $data = $_POST['event_name'];

        $event = new \App\Events();
        $event->event_name = $data;
        $event->created_by = 1;
        $flag = $event->save();
        
        if($flag){
            return "Details Saved";
        }else{
            return "Could Not Save Details";    
        }
    }

    public function getEventDetails(){
        $event = \App\Events::all();
        json_encode($event);
        return $event;
    }
}
