<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    
    public function saveForm(){
        $event_id = $_POST['event_id'];
        $json = $_POST['Obj'];

        $subscribe = new \App\SubscriptionForms();
        $subscribe->admin_id = 1;
        $subscribe->JSONString = $json;
        $subscribe->event_id = $event_id;
        $subscribe->save();

        return "Details Saved";
    }

    public function getFormDetails(Request $req){
        $event_id = $req['event_id'];
        $form = \App\SubscriptionForms::where('event_id',$event_id)->first();
        return $form;
    }
}
