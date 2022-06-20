<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index(){

    }

    public function readAll(){
        $notifications= Notification::where('read_at', null)->get();
        if(count($notifications)!=0){
            foreach($notifications as $notify){
                $notify->read_at= now();
                $notify->save();
            }
            return 'all read';
        }else{
            return 'already read';
        }
    }
}
