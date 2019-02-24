<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    
    public function saveForm(){
        $title = $_POST['form_title'];
        $desc = $_POST['form_description'];
        $json = $_POST['Obj'];

        $subscribe = new \App\SubscriptionForms();
        $subscribe->form_name = $title;
        $subscribe->title = $title;
        $subscribe->admin_id = 1;
        $subscribe->event_id = 1;
        $subscribe->description = $desc;
        $subscribe->JSONString = $json;
        $subscribe->save();

        return "Details Saved";
    }
}
